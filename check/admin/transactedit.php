<?php
    error_reporting(0);
    session_start();
    require_once '../connection/db.php';
    if (strlen($_SESSION['id'] == 0)) {
        header('location:login.php');
        exit();
	}
			$error = '';
            $id = $_SESSION['id'];
            $query = "SELECT * FROM admin_detail WHERE id=?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('i',$id);
            $stmt->execute();
            $process = $stmt->get_result();
            $result = $process->fetch_assoc();
			$username = $result['username'];
            $stmt->close();

            //looping the table with the users data
            $select = "SELECT * FROM admin_detail";
            $stmt = $conn->prepare($select);
            $stmt->execute();
            $process = $stmt->get_result();
            
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | users</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/fontawesome.min.css">
    <style type="text/css">
        td > button{
            margin-right: 5px;
        }
	</style>
    <script src="https://kit.fontawesome.com/5164f520d9.js" crossorigin="anonymous"></script>
</head>
<body>
                        <!--including the header file -->
                        <?php include '../includes/header.php'; ?>
                        <!--including the header file ends -->
                     	<!--- === error and success of the comment starts-->
								<div class="container"><?php echo $error;?></div>
								<!--- === error and success of the comment ends-->
								<section id="maincontent">
                                    <!--including sidebar file-->
									<?php include '../includes/sidebar.php';?>
                    <!--Admin users management-->
                    <div class="col-md-9 bg-light mt-3">
                        <div class="card shadow">
                            <div>
                                <p class="list-group-item active">Users Management</p>
                            </div>
                            <div class="card-body">
                                <div>
                                    <table class="table table-responsive table-bordered table-hover">
                                        <tr>
                                        <thead>
                                            <th>S/N</th>
                                            <th>Full name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Reg Date</th>
                                            <th>Trans Entry</th>
                                            <th>Trans Edit</th>
                                        </thead>
                                        </tr>
                                        <tbody>
                                            <?php
                                                $count = 1;
                                            while($array = $process->fetch_array()){?>
                                                <tr>
                                                    <td><?php echo $count; ?></td>
                                                    <td><?php echo $array['fullname']; ?></td>
                                                    <td><?php echo $array['username']; ?></td>
                                                    <td><?php echo $array['email']; ?></td>
                                                    <td><?php echo $array['regdate']; ?></td>
                                                    <td>
                                                    <a style="color:white;text-decoration:none;" href="transact.php?uid=<?php echo $array['id'];?>">
                                                            <i class="fas fa-pen text-primary mr-3"></i>
                                                    </a>
                                                </td>
                                                    <td style="display: flex;">
                                                        <a style="color:white;text-decoration:none;" href="transtabedit.php?uid=<?php echo $array['id'];?>">
                                                            <i class="fas fa-pen text-primary mr-2"></i>
                                                        </a>
                                                
                                                        		
                                                </tr>
                                            <?php $count= $count+1; }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                   <!-- modal section-->
					<?php include '../includes/modal.php';?>
					<!-- modal section ends-->
					<!-- footer section -->
						<!-- footer section ends-->
					<script src="../js/jquery.min.js"></script>
                    <script src="../js/popper.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
                    
</body>
</html>