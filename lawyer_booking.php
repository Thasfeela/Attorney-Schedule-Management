<?php
	session_start();
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
		
		//session_start();
		include("db_con/dbCon.php");
		$conn = connect();
		if(isset($_GET['unblock_id'])){
			
			$id = $_GET['unblock_id'];
			$t = $_POST['t'];
			$sql = "UPDATE `booking` SET `status`='Accepted' WHERE booking_id='$id'";
			echo $sql;
			$conn->query($sql);
			header("Location:lawyer_booking.php");
		}
		if(isset($_GET['block_id'])){
			
			$id = $_GET['block_id'];
			//echo $id;exit;
			
			$sql = "UPDATE `booking` SET `status`='Blocked' WHERE booking_id='$id'";
			//echo $sql;
			$conn->query($sql);
			header("Location:lawyer_booking.php");
		}
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
								<a class="navbar-brand cus-a" href="#">Lawyer Management System</a>
								
								
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
							<a href="lawyer_dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a><!--lawyer dashboard page-->
							<a href="lawyer_edit_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--lawyer_edit_profile page-->
							<a href="lawyer_booking.php" class="list-group-item list-group-item-action bg-light">Booking requests</a><!--this page-->
							<a href="case_dashboard.php" class="list-group-item list-group-item-action bg-light">Add Cases</a><!--this page-->
							<!--<a href="update_password_admin.php" class="list-group-item list-group-item-action bg-light">Update Password</a>-->
						</div>
					</div>
					<!-- /#sidebar-wrapper -->
					
					<section class="bookingrqst">
						<div class="container">
							<div class="span7">   
								<div class="widget stacked widget-table action-table">
									
									<div class="widget-header">
										<i class="icon-th-list"></i>
										<h3>Booking Request</h3>
									</div> <!-- /widget-header -->
									
									<div class="widget-content">
									
										<table class="table table-hover table-responsive">
											<thead>
												<tr>
													<th>No.</th>
													<th>Client Name</th>
													<th>Date</th>
													<th>Description</th>
													
													<th>Action</th>
													<th></th>
													
												</tr>
											</thead>
											<?php
												include_once 'db_con/dbCon.php';
												$a=$_SESSION['lawyer_id'];
												
												$conn = connect();
												$result = mysqli_query($conn,"SELECT paid,booking_id,u_id,first_Name,last_Name,date,description,client.client_id,booking.status as 'statuss' FROM booking,client,user WHERE booking.client_id=client.client_id AND client.client_id=user.u_id and booking.lawyer_id='$a'");
												$counter = 0;
												while($row = mysqli_fetch_array($result)) {
													//echo $row['statuss'];
													
													if(($row["paid"]!="yes") && ($row['statuss']!="Blocked") && ($row['statuss']!="Cancelled")){
														
														
												?>
												<tbody id="myTable">
													<tr>
													<input type="hidden" name="u_id"  value="<?php echo $row['u_id']; ?>">
													
														<td><?php echo ++$counter ;?></td>
														<?php
														if($row['paid'] != 'yes'){ ?>
														<td><?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"]; ?></td>		
														
														<?php }else{?>
															<td><a href="single_client.php?name=<?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"];  ?> & des=<?php echo $row["description"]; ?> & u=<?php echo $row['u_id']; ?> & d=<?php echo $row["date"]; ?>"><?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"]; ?></a></td>																								
														<?php 
														}?>																			
														<td><?php echo $row["date"]; ?></td>
														
														<td><?php echo $row["description"]; ?></td>
														
														
														<!--<td><?php echo $row["u_id"]; ?></td>
														<td><?php echo $_SESSION["lawyer_id"]; ?></td> -->
															<?php if ($row['statuss']=='Pending'){ ?>
															<td>
															<a class="btn btn-sm btn-warning" href="lawyer_booking.php?unblock_id=<?=$row['booking_id']?>"><i class="fas fa-hourglass"></i>&nbsp; Pending</a>
															</td>
															
															<?php }
															else{?>
															<td>
																Active
																
															</td>
															
															
															
														   
															
														<?php }?>
														
														<td>
																<a class="btn btn-sm btn-outline-secondary" href="settime.php?b=<?php echo $row['booking_id'];?> & name=<?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"];  ?> & des=<?php echo $row["description"]; ?> & u=<?php echo $row['u_id']; ?> & d=<?php echo $row["date"]; ?>"">Set Time</a>
															</td>
															<td>
															<a class="btn btn-sm btn-danger" href="lawyer_booking.php?block_id=<?=$row['booking_id']?>"><i class="fa fa-ban"></i>&nbsp; Block</a>
															</td>
														</td>
														
													</tr>
													<?php
													}}
												?>
												
											</table>
										
										</div> <!-- /widget-content -->
										
									</div> <!-- /widget-content -->
												
								</div> <!-- /widget -->
							</div>
						</div>
					</section>
					
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