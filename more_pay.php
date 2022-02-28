<?php
	session_start();
    $b = $_GET['b'];
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
		
		//session_start();
		include("db_con/dbCon.php");
		
		
	?>
	<!doctype html>
	<html lang="en">
		<head>
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
								<div class="">
									
									<div class="widget-header">
										<i class="icon-th-list"></i>
										<?php if(isset($_GET['ok'])){
											echo "<div class='alert alert-success alert-dismissible fade show'>
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
											<strong>Sucessfully!</strong> update your Profile.
											</div>";
										}?>
									</div> <!-- /widget-header -->
									
									<div class="widget-content">
										<div class="row">
											<div class="col-md-1"></div>
											
											<?php
												include_once 'db_con/dbCon.php';
												$a=$_SESSION['lawyer_id'];
												$conn = connect();
												$result = mysqli_query($conn,"SELECT *
												FROM booking,client,user
												WHERE booking.client_id=client.client_id
												AND client.client_id=user.u_id 
												and booking.lawyer_id='$a'
                                                and booking.booking_id='$b'

												");
												$counter = 0;
                                                $count = 0;
												while($row = mysqli_fetch_array($result)) {
													
													
												?>
												<div class="col-md-10">
													<form  action=""  method="post">
                                                    <input type="hidden" name="booking_id" value="<?php echo $b; ?>">
														<div class="form-group">
															<label for="enum">Client</label>
															<input type="text" class="form-control" name="client" id="client" value="<?php echo $row["first_Name"]; ?>" readonly>
														</div>
                                                        <div class="form-group">
															<label for="enum">Lawyer</label>
															<input type="text" class="form-control" name="lawyer" id="lawyer" value="<?php echo $_SESSION["first_Name"]; ?>" readonly>
														</div>
                                                        <div class="form-group">
															<label for="enum">Amount</label>
															<input type="text" class="form-control" name="amount" id="amount" >
														</div>
														<div class="form-group">
															<label for="enum">Payment for</label>
															<input type="text" class="form-control" name="pay_for" id="pay_for" >
														</div>
														
														<div class="form-group">
															
														</div>
														<input name="submit" type="submit" class="btn btn-block btn-info" value="Submit" />
														<!--after signup redirect lawyer dashboard page-->
													</form>
													
												</div>
												<?php
												}
											?>
											<div class="col-md-1"></div>
										</div>
										
										
									</div> <!-- /widget -->
								</div>
							</div>
						</section>
						
						
						
						
					</div>
					<!-- /#wrapper -->
					
					
					
				</div>
				
				
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
if(isset($_POST["submit"]))
{
$con =mysqli_connect("localhost","root","","lawyermanagement");
$booking_id = $_POST['booking_id'];
$amount = $_POST['amount'];
$pay = $_POST['pay_for'];
$query1="insert into more_pay(booking_id,amount,pay_for)
values('$booking_id','$amount','$pay')";
$res1 = mysqli_query($con, $query1);
if($res1){
	echo"<script type='text/javascript'>alert('inserted Successfully!');</script>";
			echo "<script type='text/javascript'>
					 window.location.href = 'case_dashboard.php';
				 </script>";
}
 else {
   echo"<script type='text/javascript'>alert('Error');</script>"; 
}
}

 ?>
	<?php
		
	}else 
	header('location:login.php?deactivate');
?>	