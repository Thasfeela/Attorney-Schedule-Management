<?php
	session_start();
	$u=$_SESSION['client_id'];
	$un = $_SESSION['first_Name'];
	$nm = $_SESSION['last_Name'];
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
		
		//session_start();
		include("db_con/dbCon.php");
		
	?>
	<!doctype html>
	<html lang="en">
		<head>
			<!-- Required meta tags -->
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
			
			<!-- Bootstrap CSS -->
			<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous"> -->
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
			<link rel="stylesheet" href="css/all.css">
			<link rel="stylesheet" href="css/simple-sidebar.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/style.css">
			<link rel="stylesheet" href="css/media.css">
			<title></title>
		</head>
		<body>
			<header class="customnav">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<nav class="navbar navbar-expand-lg ">
								<a class="navbar-brand cus-a" href="index.php">Lawyer Management System</a>
								
								
								<div class="collapse navbar-collapse" id="navbarSupportedContent">
									<ul class="navbar-nav ml-auto ">
										<li class="">
											<a class="nav-link cus-a" href="#">Full Name: <?php echo $_SESSION['first_Name'];?> <?php echo $_SESSION['last_Name'];?></a>
											</li>
										<li class="">
											<a class="nav-link cus-a" href="logout.php">Log Out</a>
										</li>
										
									</ul>
									
								</div>
							</nav>
						</div>
					</div>
				</div>
			</header>
			<body>
				
				<div class="d-flex" id="wrapper">
					
					<!-- Sidebar -->
					<div class="bg-light border-right" id="sidebar-wrapper">
						<div class="sidebar-heading">My Profile</div>
						<div class="list-group list-group-flush">
							<a href="user_dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a><!--this page-->
							<a href="user_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--user_profile page-->
							<a href="user_booking.php" class="list-group-item list-group-item-action bg-light">My booking requests</a><!--booking page-->
							<a href="lawyers.php" class="list-group-item list-group-item-action bg-light">Lawyers</a><!--booking page-->
							<a href="user_case.php" class="list-group-item list-group-item-action bg-light">Case Reports</a><!--booking page-->
							
							<!--<a href="update_password.php" class="list-group-item list-group-item-action bg-light">Update Password</a><!--booking page-->
						</div>
					</div>
					<!-- /#sidebar-wrapper -->
					
					<!-- Page Content -->
					<div id="page-content-wrapper">
						<?php if(isset($_GET['done'])){
							echo "<div class='alert alert-danger alert-dismissible fade show'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							<strong>Welcome!</strong> $un $nm.
							</div>";
						}?>
						<div class="container-fluid"><br><br>
						<div class="row">
							   <div class="col-xl-3 col-md-6 mb-4">
								   <div class="card card border-primary border-bottom-0 border-right-0 border-top-0  shadow h-100 py-2">
									   <div class="card-body">
									   <div class="row no-gutters align-items-center"> 
										   <div class="col mr-2"> 
											   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">My cases</div>
											   <div class="h5 mb-0 font-weight-bold text-gray-800">
											   <?php

												include_once 'db_con/dbCon.php';
												$conn = connect();
																	
												$result = mysqli_query($conn,"SELECT case_num  FROM case_details where client_id = '$u' ORDER BY case_num");
																	
												$row = mysqli_num_rows($result) ;
												echo '<h1> '.$row.' </h1>'
												?>
												</div>
											</div>
										  
									   </div>
									   </div>

								   </div>
							   </div>
							   <div class="col-xl-3 col-md-6 mb-4">
								   <div class="card card border-primary border-bottom-0 border-right-0 border-top-0  shadow h-100 py-2">
									   <div class="card-body">
									   <div class="row no-gutters align-items-center"> 
										   <div class="col mr-2"> 
											   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href="case_today.php">Cases Today</a></div>
											   <div class="h5 mb-0 font-weight-bold text-gray-800">
											   <?php
											   date_default_timezone_set('Asia/Kolkata');
											   $date = date('Y-m-d');
											   //echo $date;
											   include_once 'db_con/dbCon.php';
											   $conn = connect();
											   $query2 = mysqli_query($conn,"select * from case_details,result where case_details.case_num=result.case_num and case_details.client_id='$u' and hdate='$date' order by r_id");
												$row = mysqli_num_rows($query2) ;
												echo '<h1> '.$row.' </h1>';
														
												?>
												</div>
											</div>
										  
									   </div>
									   </div>

								   </div>
							   </div>
							   <div class="col-xl-3 col-md-6 mb-4">
								   <div class="card card border-primary border-bottom-0 border-right-0 border-top-0  shadow h-100 py-2">
									   <div class="card-body">
									   <div class="row no-gutters align-items-center"> 
										   <div class="col mr-2"> 
											   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href='blocked_case.php'>Blocked / Cancelled cases</a></div>
											   <div class="h5 mb-0 font-weight-bold text-gray-800">
											   <?php

												include_once 'db_con/dbCon.php';
												$conn = connect();
																	
												$result = mysqli_query($conn,"SELECT *  FROM booking where client_id = '$u' and status!='Accepted'");
																	
												$row = mysqli_num_rows($result) ;
												echo '<h1> '.$row.' </h1>'
												?>
												</div>
											</div>
										  
									   </div>
									   </div>

								   </div>
							   </div>
							   <div class="col-xl-3 col-md-6 mb-4">
								   <div class="card card border-primary border-bottom-0 border-right-0 border-top-0  shadow h-100 py-2">
									   <div class="card-body">
									   <div class="row no-gutters align-items-center"> 
										   <div class="col mr-2"> 
											   <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><a href='closed_cases.php'>Closed cases</a></div>
											   <div class="h5 mb-0 font-weight-bold text-gray-800">
											   <?php

												include_once 'db_con/dbCon.php';
												$conn = connect();
																	
												$result = mysqli_query($conn,"SELECT * FROM case_details where client_id = '$u' and status = 'Closed' ");
												//echo $result;					
												$row = mysqli_num_rows($result) ;
												echo '<h1> '.$row.' </h1>'
												?>
												</div>
											</div>
										  
									   </div>
									   </div>

								   </div>
							   </div>
							<p></p>
						</div>
					</div>
					<!-- /#page-content-wrapper -->
					
				</div>
				<!-- /#wrapper -->
				
				
				
			</body>
			<footer>
				<div class="container">
					<div class="row">
						<div class="col">
							<h5></h5>
						</div>
					</div>
				</div>
			</footer>
			<!-- Optional JavaScript -->
			<!-- jQuery -->
			
			<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
			<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		</body>
	</html>				
	<?php
		
	}else 
	header('location:login.php?deactivate');
?>