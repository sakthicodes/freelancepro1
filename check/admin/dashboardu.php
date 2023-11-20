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
		if (isset($_POST['save'])) {
			$p_title = mysqli_real_escape_string($conn,strip_tags($_POST['post-title']));
			$p_body = $_POST['editor1'];
			$meta_tag = mysqli_real_escape_string($conn,strip_tags($_POST['meta-tag']));
			$meta_dsc = mysqli_real_escape_string($conn,strip_tags($_POST['meta-dsc']));
			$post_ctg = mysqli_real_escape_string($conn,strip_tags($_POST['post-ctg']));
			$author = mysqli_real_escape_string($conn,strip_tags($_POST['author']));
			if (!preg_match("!image!",$_FILES['post-img']['type'])) {
				$error= '<div class="alert alert-danger"> Error! check if it is image, not large size and file type is valid</div>'."<br>"; 		
			}
			else{
				$image_path = "../images/".$_FILES['post-img']['name'];
				move_uploaded_file($_FILES['post-img']['tmp_name'],$image_path);
				//inserting to the database with prepared statement method
			$query = "INSERT INTO posts(post_title,post_content,post_tag,post_desc,post_category,post_author,image_dir)
			 VALUES(?,?,?,?,?,?,?)";
			$stmt = $conn->prepare($query);
			$stmt->bind_param('sssssss',$p_title,$p_body,$meta_tag,$meta_dsc,$post_ctg,$author,$image_path);
			if ($stmt->execute()) {
				$error= '<div class="alert alert-success">Content uploaded successfully!</div>';
			}
			else {
				$error = '<div class="alert alert-danger">Error posting content! Try again later.</div>';
			}
		}
	}
}
				// looping posts from the database to the table
				$query = "SELECT * FROM posts ORDER BY id DESC LIMIT 7";
				$stmt = $conn->prepare($query);
				if($stmt->execute()){
					$process = $stmt->get_result();
				}
				else{
					$error = '<div class="alert alert-danger">Error fetching contents! Try again later.</div>';
				}
				
				
?>
			<!DOCTYPE html>
			<html>
			<head>
				<title>Admin | Dashboard</title>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
				<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
				<link rel="stylesheet" type="text/css" href="../css/style.css">
				<link rel="stylesheet" type="text/css" href="../css/all.css">
				<link rel="stylesheet" type="text/css" href="../css/fontawesome.min.css">
				<style type="text/css">
					td > button{
						margin-right: 5px;
					}
				</style>
				    <script src="https://kit.fontawesome.com/5164f520d9.js" crossorigin="anonymous"></script>

			</head>
		<body>		
							<!-- header section-->
								<?php include '../includes/headeru.php'; ?>
							<!-- header section ends-->
							<!--- === error and success of the comment starts-->
							<div class="container"><?php echo $error;?></div>
							<!--- === error and success of the comment ends-->
								<section id="maincontent">
									<?php include '../includes/sidebaru.php';?>
										<div class="col-md-9 my-3">
											<div class="card">
												<div>
													<h5 class="list-group-item active" href="#">Website Overview</h5>
												</div>
												<div class="row p-2">
													<div class="col-md-4 my-2 card-body text-center">
														
													<h2><?php echo $fetch_users['reg_users'];?></h2>
															<h4>Total Users</h4>
														
														
													</div>
														<div class="col-md-4 my-2 text-center card-body ">
														
															
													</div>
													<div class="col-md-4 my-2 text-center card-body ">
														
															<h2><?php echo $fetch_cat['category'];?></h2>
															<h4>Total Admin</h4>
														
													</div>													
												</div>
											</div><br>

											<!-- latest post--->
											
											</div>
											
											
										</div>
										<div class="card shadow">
												<div class="card-body">
												<img src="../../images/hdfc_logo.jpg" class="rounded mx-auto d-block" alt="...">
											   </div>
												</div>
										</div>
									</div>							
					</section>
					<!-- modal section-->
					<?php include '../includes/modal.php';?>
					<!-- modal section ends-->
					<!-- footer section -->
					<?php include '../includes/footer.php'; ?>
					<!-- footer section ends-->
					<script src="../js/jquery.min.js"></script>
					<script src="../js/popper.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
</body>
</html>