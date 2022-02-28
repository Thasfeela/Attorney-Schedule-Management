<?php
	session_start();
	$a=$_SESSION['lawyer_id'];
	//$_SESSION['num'] = $_POST['case_num'];
	//$_SESSION['u'] = $_POST['client'];
	$u=$_GET['u'];
	
	//$booking_id=$_SESSION['booking_id'];
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
							<a href="lawyer_dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a><!--lawyer dashboard page-->
							<a href="lawyer_edit_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--lawyer_edit_profile page-->
							<a href="lawyer_booking.php" class="list-group-item list-group-item-action bg-light">Booking requests</a><!--this page-->
							<!--<a href="update_password_admin.php" class="list-group-item list-group-item-action bg-light">Update Password</a>-->
						</div>
					</div>
           
					<section class="payment">
						<div class="container">
							<div class="span7">  
								<div class="col-md-12">
									<div class="card">
                                	    <div class="card-header">
                                	      <ul class="nav nav-tabs card-header-tabs" id="bologna-list" role="tablist">
                                	        
                                	        <li class="nav-item">
                                	          <a class="nav-link"  href="single_client.php?u=<?php echo $u; ?>" role="tab" aria-controls="history" aria-selected="false">Client Profile</a>
                                	        </li>
                                	        <li class="nav-item">
                                	          <a class="nav-link active" href="booking.php?u=<?php echo $u; ?>" role="tab" aria-controls="deals" >Case Details</a>
                                	        </li>
                                            <li class="nav-item ml-auto">
                                	          <a class="nav-link btn btn-block btn-info" href="case_report.php?u=<?php echo $u; ?>" role="tab" aria-controls="deals" >Case Report</a>
                                	        </li>
                                	      </ul>
                                	    </div>
										<div class="card-body">
											<div class="row"></div>
                         <div class="col-md-12"> 
						 <div class="row">
						 <header class="d-flex justify-content-left py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="booking.php?u=<?php echo $u; ?>" class="nav-link" aria-current="page">Case Details</a></li>
        <li class="nav-item"><a href="case_responent.php?u=<?php echo $u; ?>" class="nav-link">Responent</a></li>
        <li class="nav-item"><a href="case_police.php?u=<?php echo $u; ?>" class="nav-link">Police Station</a></li>
        <li class="nav-item"><a href="case_dates.php?u=<?php echo $u; ?>" class="nav-link">Hearing Dates</a></li>
      </ul>
    </header>
											<hr style="width:100%;text-align:left;margin-left:0">	
										</div>	
													<?php

					                        	include_once 'db_con/dbCon.php';
					                        	$conn = connect();

					                        	$result = mysqli_query($conn,"SELECT * FROM user,client WHERE user.u_id=client.client_id AND user.status='Active' AND user.u_id='" . $u . "'");

					                        	while($row = mysqli_fetch_array($result)) {
													echo $row['u_id'];
					                ?>
            						<form action="" method="POST">
													<input type="hidden" name="client"  value="<?php echo $row['u_id']; ?>">
													<input type="hidden" name="lawyer"  value="<?php echo $a; ?>">
													<div class="container p-3 my-3 bg-light text-dark" id="c1">
														<div class="col-md-10">
																	<div class="form-row">
																			<div class="form-group col-md-6">
																				<label  for="lname">First Name</label>
																				<input type="text" class="form-control" name="fname"  value="<?php echo $row['first_Name']; ?>">
																			</div>
																			<div class="form-group col-md-6">
																				<label  for="lname">Last Name</label>
																				<input type="text" class="form-control" name="lname"  value="<?php echo $row['last_Name']; ?>"">
																			</div>
																	</div>
																	<div class="form-row">
																			<div class="form-group col-md-6">
																					<label  for="lname">Gender</label>
																					<input type="text" class="form-control" name="gender"  value="<?php echo $row['Gender']; ?>">
																			</div>
																			<div class="form-group col-md-6">
																				<label  for="lname">Age</label>
																				<input type="text" class="form-control" name="age"  value="<?php echo $row['Age']; ?>">
																			</div>
																		</div>
																		<div class="form-row">
																			<div class="form-group col-md-6">
																					<label  for="lname">Caste</label>
																					<input type="text" class="form-control" name="caste"  >
																			</div>
																			<div class="form-group col-md-6">
																				<label  for="lname">Religion</label>
																				<input type="text" class="form-control" name="religion"  >
																			</div>
																		</div>
																
																
																		<div class="form-group" >
																			<label for="type">Occupation</label>
																			<input type="text" class="form-control" name="occ"  value="<?php echo $row['Occupation']; ?>">
																		</div>
																		<div class="form-row">
																				<div class="form-group col-md-4">
																						<label for="lname">Address</label>
																						<input type="text" class="form-control" name="add"  value="<?php echo $row['full_address']; ?>">
																				</div>
																
																				<div class="form-group col-md-4 ">
																						<label  for="lname">City</label>
																						<input type="date" class="form-control" name="city"  value="<?php echo $row['city']; ?>">
																				</div>
																				<div class="form-group col-md-4 ">
																						<label  for="lname">Pin Code</label>
																						<input type="date" class="form-control" name="pin"  value="<?php echo $row['zip_code']; ?>">
																				</div>
																		</div>
																		<div class="form-row">
																			<div class="form-group col-md-6">
																				<label  for="lname">Contact Number</label>
																				<input type="text" class="form-control" name="phn"  id="case_num"value="<?php echo $row['contact_number']; ?>">
																			</div>
																			<div class="form-group col-md-6">
																				<label  for="lname">Alternate Number</label>
																				<input type="text" class="form-control" name="alt" value="<?php echo $row['alt_number']; ?>">
																			</div>
																</div>
																	</div>
																</div>
																
																	
																	                           
                                                                           
												

																			<input name="submit" type="submit" class="btn btn-block btn-info" value="Submit" />
													
																		
                                                                            
															
													</form>
                           <?php } ?>                         
                                                </div>  
												 
										</div>
									</div>	
								</div>
							</div>	
						</div>
					</section>
				</div>	
                                
        </body>
		</html>
<?php

if(isset($_POST["submit"]))
{
$con =mysqli_connect("localhost","root","","lawyermanagement");
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$caste = $_POST['caste'];
$religion = $_POST['religion'];
$occ = $_POST['occ'];
$add = $_POST['add'];
$city = $_POST['city'];
$pin = $_POST['pin'];
$phn = $_POST['phn'];
$alt = $_POST['alt'];

$query="insert into case_details (case_id,client_id,lawyer_id,op_id,court,filing_date,case_num,ctype,sub,status,idate,itime,statement,evidence,witness,hdate)
values('$case_id','$client','$lawyer','$op_id','$court','$fdate','$case_num','$ctype','$sub','$status','$idate','$itime','$facts','$evidence','$witness','$hdate')";
echo $query;
$res = mysqli_query($con, $query);
echo"<script type='text/javascript'>alert('yes');</script>"; 
if($res)
 {
	 	$query2 = "insert into opponent (op_id,case_id,client_id,lawyer_id,op_name,op_gender,op_age)
		 values ('$op_id','$case_id','$client','$lawyer','$fname','$gender','$age')";
		$res2= mysqli_query($con,$query2);
		if($res2)
		{
			echo"<script type='text/javascript'>alert('inserted Successfully!');</script>";
			echo "<script type='text/javascript'>
					 window.location.href = 'lawyer_booking.php';
				 </script>";
		}
	 
	 
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




	<!-- Footer -->





	<!-- Footer -->
