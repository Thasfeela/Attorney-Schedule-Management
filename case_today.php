<?php
	session_start();
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
		
		//session_start();
		include("db_con/dbCon.php");
		$conn = connect();
		
		if(isset($_GET['block_id'])){
			
			$id = $_GET['block_id'];
			//echo $id;exit;
			
			$sql = "UPDATE `booking` SET `status`='Cancelled' WHERE booking_id='$id'";
			//echo $sql;
			$conn->query($sql);
			header("Location:user_booking.php");
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
							<!--<a href="update_password.php" class="list-group-item list-group-item-action bg-light">Update Password</a>-->
						</div>
					</div>
					<!-- /#sidebar-wrapper -->
					
					<section class="bookingrqst">
						<div class="container">
							<div class=span3></div>
							<div class="span7">  
								
								
								<div class="widget stacked widget-table action-table">
									
									<div class="widget-header">
										<i class="icon-th-list"></i>
										<h3></h3>
									</div> <!-- /widget-header -->
									
									<div class="widget-content">
									<!--<form method="POST" action="payment.php">	-->
										<table class="table table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">SL NO.</th>
													
													<th scope="col">LAWYER</th>
													
													<th scope="col">STATUS</th>
                                                    <th scope="col">RESULT</th>
													<th></th>
													<th></th>
												</tr>
											</thead>
											<?php
												include_once 'db_con/dbCon.php';
												$a=$_SESSION['client_id'];
												$conn = connect();
												$result = mysqli_query($conn,"SELECT first_Name,last_Name,date,time,booking.booking_id as bk,lawyer.lawyer_id as l,booking.status as statuss
												FROM booking,lawyer,user
												WHERE booking.lawyer_id=lawyer.lawyer_id 
												AND lawyer.lawyer_id=user.u_id 
												and booking.client_id='$a'
												");
												$counter = 0;
												while($row = mysqli_fetch_array($result)) {
													
													date_default_timezone_set('Asia/Kolkata');
											   $date = date('Y-m-d');
											   $query2 = mysqli_query($conn,"select * from case_details,result where case_details.case_num=result.case_num and case_details.client_id='$a' and hdate='$date'");
                                               while($r = mysqli_fetch_array($query2)) {
													
														
												?>
												<tbody id="myTable">
													<tr>
													<input type="hidden" name="booking_id"  value="<?php echo $row['bk']; ?>">
														<input type="hidden" name="lawyer_id"  value="<?php echo $row['l']; ?>">
														<input type="hidden" name="client_id"  value="<?php echo $a; ?>">
														<th scope="row"><?php echo ++$counter ;?></th>
														
														<td id="lw"><?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"]; ?></td>
														
														
														
														
                                                        <td><?php echo $r["status"]; ?></td>
                                                        <td><?php echo $r["case_num"]; ?></td>
														<?php 
														 if ($row['statuss'] == 'Accepted'){
															
															?>

									
														<td><a class="nav-link btn btn-block btn-info"  href="invoice.php?bk=<?php echo $row['bk']; ?>" role="tab" aria-controls="deals" >View Invoice</a></td>
															<!--<script>
															 document.getElementById("statbut").disabled = true; 
															 echo "yah";
															 </script> -->
															 
												        <?php
														 }else{?>
															
															<td><a class="nav-link btn btn-block btn-info disabled"  href="invoice.php?bk=<?php echo $row['bk']; ?>" role="tab" aria-controls="deals" >View Invoice</a></td>
														<?php }
														?>
														</td>
														
													</tr>
													<?php
													}}
												?>
												
											</table>
												<!--</form>	-->
										</div> <!-- /widget-content -->
										
									</div> <!-- /widget -->
								</div>
							
							</div>
						</section>
						
					</div>
					<!-- /#wrapper -->
				<script>
					
				</script>

				
				
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