<?php
    error_reporting(0);
    session_start();
    require_once '../connection/db.php';
    if (strlen($_SESSION['id'] == 0)) {
        header('location:login.php');
        exit();
    }
            // setting session username
			$username = $_SESSION['username'];
           
            $error = '';
            //fetching the users data and filling in the form for making changes
            if (isset($_GET['uid'])) {
                $query = "SELECT * FROM subusers WHERE id= ?";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i',$_GET['uid']);
                $stmt->execute();
                $get_data = $stmt->get_result();
                $fetch_data = $get_data->fetch_assoc();
                
            }
		//updating the user
		if (isset($_POST['update'])) {
            $datet = $_GET['uid'];
    		$narration = mysqli_real_escape_string($conn,strip_tags($_POST['narration']));
			$deposit = mysqli_real_escape_string($conn,strip_tags($_POST['deposit']));
			$withd = mysqli_real_escape_string($conn,strip_tags($_POST['withd']));
			$query = "UPDATE `subusers` SET `narration`=?,`deposit`=?,`withd`=? WHERE datet ='$datet'";
			$stmt = $conn->prepare($query);
            $stmt->bind_param('sii',$narration,$deposit,$withd);
			if ($stmt->execute()) {
				$error= '<div class="alert alert-success">User updated successfully!</div>';
			}
			else {
				$error = '<div class="alert alert-danger">Error updating user! Try again later.</div>';
			}
		
    }
                
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Users</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <style type="text/css">
		td > button{
			margin-right: 10px;
		}
	</style>
    <script src="https://kit.fontawesome.com/5164f520d9.js" crossorigin="anonymous"></script>

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
                        <div class="card bg-light">
                            <p class="list-group-item active">Edit Transaction</p>
                            <div class="card-body">
                                <div class="shadow p-2">
								<form class="form-group" enctype="multipart/form-data" method="POST" action="">
                                    <label for="narration">Narration</label>
                                    <input type="text" required name="narration"  class="form-control"><br>
                                    <label for="deposit">Deposit</label>
                                    <input type="text" required name="deposit"  class="form-control"><br>
                                    <label for="withd">Withdrawal</label>
                                    <input type="text" required name="withd"  class="form-control"><br>
                                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
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