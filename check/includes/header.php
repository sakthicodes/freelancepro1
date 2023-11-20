<?php $username = $_SESSION['username']; ?>
<section id="navbar">
		<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light shadow">
		<div class="container">
			<a class="navbar-brand" href="dashboard.php">Admin</a>
				<button type="button" class="navbar-toggler" arial-expanded="false" arial-label="Toggle navigation" data-toggle="collapse" data-target="#navbarNav" arial-controls="navbarNav">
					<span class="navbar-toggler-icon"></span>
				</button>
				
			<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<?php 
				if (isset($_SESSION['role'])) {
					echo '<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" arial-haspopup="true" arial-expanded="false" href="#" id="navbarDropdown"><i class="fa fa-user mr-1 text-primary"></i>Users</a>
					<div class="dropdown-menu" arial-labelledby="navbarDropdown" >
						<a href="adduser.php" class="dropdown-item"><i class="fa fa-user-plus mr-1 text-primary"></i>Add Netbanking user</a>
						<a href="users.php" class="dropdown-item"><i class="fa fa-users mr-1 text-primary"></i>Manage users</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="profile.php?aid='.$_SESSION['id'].'"><i class="fa fa-user-circle mr-1 text-primary"></i>Profile</a></li>';
				}
				else {
					echo '<li class="nav-item"><a class="nav-link" href="profile.php?uid='.$_SESSION['id'].'"><i class="fa fa-user-circle mr-1 text-primary"></i>Profile</a></li>';
				}
				?>
				
         	</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item"><a class="nav-link text-secondary" href="#"><?= 'welcome, '.$username; ?></a></li>
				<li class="nav-item"><a class="nav-link text-danger" href="logout.php"><i class="fas fa-sign-out-alt mr-1"></i>Logout</a></li>
         	</ul>
		</div>
	</div>
</nav>
</section>
    							    <!-- breadcrum section---->
								
								
					
							<!-- header section--->
							<header id="header">
								<div class="container">
									<div class="row bg-light py-2">
										<div class="col-md-10">
											<h4 class="card-title my-2">Dashboard <small class="card-text"></small></h4>
										</div>
										<div class="col-md-2">
										
										</div>
									</div>
								</div>
							</header>
							
								
							<!-- header section ends-->
			