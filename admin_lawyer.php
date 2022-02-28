<?php
	session_start();
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
		
		//session_start();
		include("db_con/dbCon.php");
		$conn = connect();
		if(isset($_GET['block_id'])){
			
			$id = $_GET['block_id'];
			//echo $id;exit;
			
			$sql = "UPDATE `user` SET `status`='Blocked' WHERE u_id='$id'";
			//echo $sql;
			$conn->query($sql);
			header("Location:admin_lawyer.php");
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
										<li class="active">
											<a class="nav-link cus-a" href="admin_dashboard.php">Home <span class="sr-only">(current)</span></a>
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
				
				
					
					<section class="bookingrqst">
						<div class="container">
							<div class="span7">   
								<div class="widget stacked widget-table action-table">
									
									<div class="widget-header">
										<i class="icon-th-list"></i>
										<CENTER><h3>REGISTERED LAWYERS</h3></CENTER>
									</div> <!-- /widget-header -->
									
									<div class="widget-content">
										
										<table class="table table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">BAR ID</th>
													<th scope="col">PHOTO</th>
													
													
													<th scope="col">FULL NAME</th>
													
													<th scope="col">EMAIL</th>
													<th scope="col">CONTACT</th>
													
													
													<th scope="col">EDUCATION</th>
													
													<th scope="col">EXPERIENCE</th>
													
													<th scope="col">CASES HANDLE</th>
													<th scope="col">SPECIALITY</th>
													<th scope="col">AADHAR</th>
													<th scope="col">CERTIFICATE</th>
													<th scope="col">STATUS</th>
												</tr>
											</thead>
											<?php
												include_once 'db_con/dbCon.php';
												$conn = connect();
												$result = mysqli_query($conn,"SELECT * FROM user INNER JOIN lawyer on user.u_id=lawyer.lawyer_id and user.status!='Blocked'");
												$counter = 0;
												while($row = mysqli_fetch_array($result)) {
												?>
												<tbody id="myTable">
													<tr>
													<td><?php echo $row["u_id"]; ?></td>
														<td><img src="images/upload/<?php echo $row["image"]; ?>" class="img-fluid" alt="<?php echo $row["image"]; ?>"></td>
														
														
														<td><?php echo $row["first_Name"],'&nbsp;',$row["last_Name"]; ?></td>
														
														<td><?php echo $row["email"]; ?></td>
														<td><?php echo $row["contact_Number"]; ?></td>
													
													
														<td><?php echo $row["degree"],'&nbsp;from&nbsp;',$row["university_College"],'&nbsp;(',$row["passing_year"],')'; ?></td>
														
														<td><?php echo $row["practise_Length"],'&nbsp;practising&nbsp;in&nbsp;',$row["court"]; ?></td>
														
														<td><?php echo $row["case_handle"]; ?></td>
														<td><?php echo $row["speciality"]; ?></td>
														<td><img src="images/upload/<?php echo $row["aadhar"]; ?>" class="img-fluid" alt="<?php echo $row["aadhar"]; ?>"></td>
														<td><img src="images/upload/<?php echo $row["cert"]; ?>" class="img-fluid" alt="<?php echo $row["cert"]; ?>"></td>
														
														<?php if ($row['status']=='Active'){ ?>
															<td>
																Active
															</td>
															<?php }
															else{?>
															<td>
																<a class="btn btn-sm btn-warning" href="approve_lawyer.php?unblock_id=<?=$row['u_id']?>"><i class="fas fa-hourglass"></i>&nbsp; Pending</a>
															</td>
														<?php }?>
															<td>
																<a class="btn btn-sm btn-danger" href="admin_lawyer.php?block_id=<?=$row['u_id']?>"><i class="fa fa-ban"></i>&nbsp; Block</a>
															</td>
															
													</tr>
													<?php
													}
												?>
											</table>
											
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