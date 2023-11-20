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
    $userid = $_GET['uid'];
    $query = "SELECT * FROM admin_detail WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i',$id);
    $stmt->execute();
    $process = $stmt->get_result();
    $result = $process->fetch_assoc();
    $username = $result['username'];
    $sqql = "SELECT sum(deposit) as total from `subusers` WHERE `id`='$userid'";
    $result = $conn->query($sqql);
    $sql = "SELECT sum(withd) as total1 from `subusers` WHERE `id`='$userid'";
    $result2 = $conn->query($sql);
    
// if post is submitted
// signing up new users from the admin dashboard
    if ($_SERVER['REQUEST_METHOD']== 'POST') {
        if (isset($_POST['update'])) {
            $userid = $_GET['uid'];
            $datet = mysqli_real_escape_string($conn,strip_tags($_POST['datet']));
			$narration = mysqli_real_escape_string($conn,strip_tags($_POST['narration']));
			$deposit = mysqli_real_escape_string($conn,strip_tags($_POST['deposit']));
			$withdraw = mysqli_real_escape_string($conn,strip_tags($_POST['withdraw']));
            $query = "INSERT INTO `subusers` (`id`,`narration`,`deposit`,`withd`)
            VALUES(?,?,?,?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('isii',$userid,$narration,$deposit,$withdraw);
            $execute = $stmt->execute();
                if ($execute) {
                    
                    $error = '<div class="alert alert-success">New user added successfully!.</div>';
                }
                else{
                    $error = '<div class="alert alert-danger">Error registering user!.</div>';
                }
            

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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body>
                                <!--- include header file-->
                                 <?php include '../includes/headeru.php';?>  
                                <!-- include header file ends-->
                                <!--- === error and success of the comment starts-->
								<div class="container"><?php echo $error;?></div>
								<!--- === error and success of the comment ends-->
								<section id="maincontent">
									<!-- including sidebar file-->
									<?php include '../includes/sidebaru.php'; ?>
                    <!--Admin users management-->
                    <div class="col-md-9 my-3">
                        <div class="card bg-light">
                        <?php  
                        while ($row = $result->fetch_object()): 
                        while ($row1 = $result2->fetch_object()): 
                        ?>
                            <p class="list-group-item active">Edit User</p>
                            
                            <div class="card-body d-flex flex-column">
                                <div class="shadow p-3">
                                 <p>Available balance : INR <?php echo $row->total-$row1->total1; ?></p>
								<form class="form-group" enctype="multipart/form-data" method="POST" action="">
                                    <label for="narration">Narration</label>
                                    <input type="text" required name="narration" id="narra" class="form-control"><br>
                                    <label for="deposit">Deposit</label>
                                    <input type="number" required name="deposit" id="dept"  placeholder="if null type 0 " class="form-control"><br>
                                    <label for="withdraw">Withdrawl</label>
                                    <input type="number" required name="withdraw" id="withd" placeholder="if null type 0 " class="form-control"><br>
                                 
                                <button type="submit" name="update" class="btn btn-primary">Submit</button>
                               
                                </form>
                               
                                </div>
                            </div>
                            <?php endwhile; ?>
                            <?php endwhile; ?>
                        </div>
                       
                    </div>
                    </section>
                    <?php include '../includes/modal.php';?>
=					<script src="../js/jquery.min.js"></script>
                    <script src="../js/popper.min.js"></script>
					<script src="../js/bootstrap.min.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
                 
              
</body>
</html>//