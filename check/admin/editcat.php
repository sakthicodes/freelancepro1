<?php
				error_reporting(0);
				session_start();
				require_once '../connection/db.php';
				if (strlen($_SESSION['id'] == 0)) {
					header('location:login.php');
					exit();
				}
						$username = $_SESSION['username'];
						$error = '';
						//fetching the post data from the database
						if (isset($_GET['pid'])) {
						$pid = $_GET['pid'];
						//looping the table with the users data
						$select = "SELECT * FROM post_cat WHERE id=?";
						$stmt = $conn->prepare($select);
						$stmt->bind_param('i',$pid);
						$stmt->execute();
						$process = $stmt->get_result();
						$result = $process->fetch_assoc();
					}
					//updating the post
					if (isset($_POST['updatecat'])) {
						$pid = $_GET['pid'];
						$p_title = mysqli_real_escape_string($conn,strip_tags($_POST['cat_name']));
							$query = "UPDATE post_cat SET cat_name=?
							WHERE id =?";
							$stmt = $conn->prepare($query);
							$stmt->bind_param('si',$p_title,$pid);
							if ($stmt->execute()) {
								$error= '<div class="alert alert-success">Content updated successfully!</div>';
								echo ("<script LANGUAGE='JavaScript'>
    window.alert('Content updated successfully!');
    window.location.href='cat_list.php';
    </script>");
							}
							else {
								$error = '<div class="alert alert-danger">Error updating content! Try again later.</div>';
							}
						
				}
				

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | posts</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
    <style type="text/css">
		td > button{
			margin-right: 10px;
		}
	</style>
</head>
<body>
                    <!--- include header file-->
                     <?php include '../includes/header.php';?>  
                     <!-- include header file ends-->
                     	<!--- === error and success of the comment starts-->
								<div class="container"><?php echo $error;?></div>
								<!--- === error and success of the comment ends-->
								<section id="maincontent">
									<!-- including sidebar file-->
									<?php include '../includes/sidebar.php'; ?>
                    <!--Admin users management-->
                    <div class="col-md-9 my-3">
                        <div class="bg-light">
                            <div class="p-1 mt-1">
                                <p class="list-group-item active">Edit Post Category</p>
                            </div>
                            <div class="card-body shadow p-1">
                                <div class="">
								<form class="form-group" enctype="multipart/form-data" method="POST" action="">
										<label for="page">Category Name</label>
											<input type="text" name="cat_name" value="<?php echo $result['cat_name'];?>" required class="form-control"><br>										
										<button type="submit" class="btn btn-primary" name="updatecat">Save Changes</button>
									</form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                    <?php include '../includes/modal.php';?>
					<?php include '../includes/footer.php';?>
					<script src="../js/jquery.min.js"></script>
					<script src="../js/popper.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
</body>
</html>