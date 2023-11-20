<?php 
        require_once '../connection/db.php';
        // counting the totalpost from the database
				$count = "SELECT COUNT(*) as posted FROM posts";
				$number = $conn->query($count);
				$fetch = mysqli_fetch_array($number);
				
				//counting the total registered users except the admin
				$count_user = "SELECT COUNT(*) AS reg_users FROM admin_detail";
				$users_num = $conn->query($count_user);
				$fetch_users = mysqli_fetch_array($users_num);


				$count_cat = "SELECT COUNT(*) AS category FROM adminu";
				$cat_num = $conn->query($count_cat);
				$fetch_cat = mysqli_fetch_array($cat_num);
				

?>

                            <div class="container"  style="background-color:#E9ECEF;">
										<div class="row">
											<div class="col-md-3 my-3">
												<div class="list-group shadow">
												<a href="#" class="list-group-item active">Service</a>													
													<a href="users1.php" class="list-group-item">Manage banking<span class="badge badge-pill badge-warning"></span></a>
													<a href="transactedit1.php" class="list-group-item">User Transaction Write<span class="badge badge-pill badge-warning"></span></a>
													<a href="logout.php" class="list-group-item">User Login<span class="badge badge-pill badge-warning"></span></a>
												</div><br>
												<!-- well---->
										
										</div>
									