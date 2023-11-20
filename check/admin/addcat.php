<?php
	error_reporting(0);
	// starting session
	session_start();	
	require_once '../connection/db.php';
	//redirecting to the login page  if no id is found
    if (strlen($_SESSION['id'] == 0)) {
        header('location:login.php');
        
	}         
			
		// if post is submitted
	if ($_SERVER['REQUEST_METHOD']=='POST') {
		if (isset($_POST['savecat'])) {
			$cats_name = mysqli_real_escape_string($conn,strip_tags($_POST['cat_name']));
				//inserting to the database with prepared statement method
			$query = "INSERT INTO post_cat(cat_name)
			 VALUES(?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('s',$cats_name);
			if ($stmt->execute()) {
				$error= '<div class="alert alert-success">Content uploaded successfully!</div>';
			}
			else {
				$error = '<div class="alert alert-danger">Error posting content! Try again later.</div>';
			}
		}
	}
				// looping posts from the database to the table
				$query = "SELECT * FROM post_cat ORDER BY id DESC LIMIT 7";
				$stmt = $conn->prepare($query);
				if($stmt->execute()){
					$process = $stmt->get_result();
				}
				else{
					$error = '<div class="alert alert-danger">Error fetching contents! Try again later.</div>';
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
							<!-- header section-->
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
                                <p class="list-group-item active">Add Post Category</p>
                            </div>
                            <div class="card-body shadow p-1">
                                <div class="">
								<form class="form-group" enctype="multipart/form-data" method="POST" action="">
										<label for="page">Category Name</label>
											<input type="text" name="cat_name" placeholder="Category Name" required class="form-control"><br>										
										<button type="submit" class="btn btn-primary" name="savecat">Save Changes</button>
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