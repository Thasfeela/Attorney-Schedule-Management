<?php
	session_start();
	$a=$_SESSION['lawyer_id'];
	$b= $_GET['b'];
	//echo $u;
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
                                	          <a class="nav-link"  href="single_client.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" role="tab" aria-controls="history" aria-selected="false">Client Profile</a>
                                	        </li>
                                	        <li class="nav-item">
                                	          <a class="nav-link active" href="booking.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" role="tab" aria-controls="deals" >Case Details</a>
                                	        </li>
                                            <li class="nav-item ml-auto">
                                	          <a class="nav-link btn btn-block btn-info" href="case_report.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" role="tab" aria-controls="deals" >Case Report</a>
                                	        </li>
                                	      </ul>
                                	    </div>
										<div class="card-body">
											<div class="row"></div>
                         <div class="col-md-12"> 
						 <div class="row">
						 <div class="container-fluid-sm bg-light text-dark square rounded">
    <header class="d-flex justify-content-left py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="booking.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link">Case Details</a></li>
        <li class="nav-item"><a href="case_responent.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link" >Responent</a></li>
        <li class="nav-item"><a href="case_police.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link active" aria-current="page">Police Station</a></li>
        <li class="nav-item"><a href="case_dates.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link">case updates</a></li>
      </ul>
    </header>
  </div>
											<hr style="width:100%;text-align:left;margin-left:0">	
										</div>	
												<?php

					                        	include_once 'db_con/dbCon.php';
					                        	$conn = connect();

					                        	$result = mysqli_query($conn,"SELECT * FROM user,client WHERE user.u_id=client.client_id AND user.status='Active' AND user.u_id='" . $u . "'");

					                        	while($row = mysqli_fetch_array($result)) 
												{
													
													$query2 = "select * from case_details,booking where case_details.booking_id=booking.booking_id and case_details.lawyer_id = '$a' and case_details.client_id='$u'";
													$res2 = mysqli_query($conn,$query2);
													while($f1 = mysqli_fetch_array($res2))
													{
														
														$case_num = $f1['case_num'];
														$query3 = "select * from station where case_num='$case_num'";
                                                                $res3 = mysqli_query($conn,$query3);
								                    		    while($f = mysqli_fetch_array($res3))
								                    		    {
														
													
											
					                			?>
            												<form action="" method="POST">
															<input type="hidden" name="case_num"  value="<?php echo $f1['case_num']; ?>">
															<input type="hidden" name="booking_id"  value="<?php echo $f['booking_id']; ?>">
																				
																			<input type="hidden" name="client"  value="<?php echo $row['client_id']; ?>">
																			<input type="hidden" name="lawyer"  value="<?php echo $a; ?>">
																				
																				
																				
																			<div class="container p-3 my-3 bg-light text-dark" id="c1">
																				<div class="col-md-10">
																						
																									<div class="form-group">
																										<label  for="lname">Police Station Name</label>
																										<input type="text" class="form-control" name="pname" value="<?php echo $f['name']; ?>">
																									</div>
                                    						                                        <div class="form-row">
                                    						                                        <div class="form-group col-md-4">
																											<label  for="lname">Address</label>
																											<input type="text" class="form-control" name="paddr" value="<?php echo $f['address']; ?>">
																									</div>
																									<div class="form-group col-md-4">
																											<label  for="lname">Location</label>
																											<input type="text" class="form-control" name="ploc" value="<?php echo $f['location']; ?>">
																									</div>
																									<div class="form-group col-md-4">
																										<label  for="lname">PinCode</label>
																										<input type="text" class="form-control" name="pin" value="<?php echo $f['pincode']; ?>">
																									</div>
																								</div>
                                    						                                
																						
																							<div class="form-row">
                                    						                                <div class="form-group col-md-6">
																											<label  for="lname">FIR Type</label>
																											<select name="ftype" class="form-control">
                                    						                                                    <option><?php echo $f['firtype']; ?></option>
																												<option>General FIR</option>
                                    						                                                    <option>Zero FLR</option>
																												<option>Cross FIR</option>
																												<option>Multiple FIR</option>
																				
                                    						                                                </select>
																									</div>
																									<div class="form-group col-md-6">
																											<label  for="lname">FIR No</label>
																											<input type="text" class="form-control" name="fno" value="<?php echo $f['firno']; ?>">
																									</div>
																					
																								</div>
																								<div class="form-row">
																									<div class="form-group col-md-6">
																											<label  for="lname">Investigating Officer</label>
																											<input type="text" class="form-control" name="off1" value="<?php echo $f['officer1']; ?>">
																									</div>
																									<div class="form-group col-md-6">
																										<label  for="lname">Investigating Officer 1</label>
																										<input type="text" class="form-control" name="off2" value="<?php echo $f['officer2']; ?>" >
																									</div>
																								</div>
																						
																						
																							
																								<div class="form-row">
																									<div class="form-group col-md-6">
																										<label  for="lname">Contact Number</label>
																										<input type="text" class="form-control" name="num" value="<?php echo $f['contact']; ?>">
																									</div>
																									<div class="form-group col-md-6">
																										<label  for="lname">Alternate Number</label>
																										<input type="text" class="form-control" name="alt" value="<?php echo $f['alt_phn']; ?>">
																									</div>
																						</div>
																							</div>
																						</div>
																						
																							
																							                           
																				
																						
																			   <div class="form-row col-md-3">
																				
																									<input name="submit" type="submit" class="btn btn-block btn-info" value="Submit" />
																									</div>
																			   				
																				
																					
																			</form>
                                                 <?php
															}
														}
												}
												  ?>
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
$p_id = uniqid("pid");
$pname = $_POST['pname'];
$paddr = $_POST['paddr'];
$ploc = $_POST['ploc'];
$pin = $_POST['pin'];
$ftype = $_POST['ftype'];
$fno = $_POST['fno'];
$off1=$_POST['off1'];
$off2=$_POST['off2'];
$num=$_POST['num'];
$alt = $_POST['alt'];
$booking_id = $_POST['booking_id'];
$case_num = $_POST['case_num'];
$query3 = "update station set name='$pname', address='$paddr', location='$ploc', pincode='$pin', firtype='$ftype', firno='$fno', officer1='$off1', officer2='$off2', contact='$num', alt_phn='$alt' where case_num='$case_num'";
echo $query3;
            $res3 = mysqli_query($con, $query3);
            
            if($res3)
            {
    	echo"<script type='text/javascript'>alert('inserted Successfully!');</script>";
  		 echo "<script type='text/javascript'>
            window.location.href = 'case_police.php?u=$u & b=$b';
       	 </script>";
}
 else {
   echo"<script type='text/javascript'>alert('Error');</script>"; 
}
}

				
}else 
header('location:login.php?deactivate');
?>	




	<!-- Footer -->





	<!-- Footer -->
