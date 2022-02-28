<?php
	session_start();
	$a=$_SESSION['lawyer_id'];
	$u=$_GET['u'];
	$b=$_GET['b'];

	
	//$booking_id=$_SESSION['booking_id'];
	
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
							<a href="case_dashboard.php" class="list-group-item list-group-item-action bg-light">Add Cases</a><!--this page-->
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
                                	          <a class="nav-link active"  href="single_client.php?u=<?php echo $u;?>" role="tab" aria-controls="history" aria-selected="false">Client Profile</a>
                                	        </li>
                                	        <li class="nav-item">
                                	          <a class="nav-link" href="booking.php?u=<?php echo $u;?> & b=<?php echo $b; ?>" role="tab" aria-controls="deals" >Case Details</a>
                                	        </li>
                                	      </ul>
                                	    </div>
										<div class="card-body">
                                            <div class="row">
					                            <?php

					                        	include_once 'db_con/dbCon.php';
					                        	$conn = connect();

					                        	$result = mysqli_query($conn,"SELECT * FROM user,client WHERE user.u_id=client.client_id AND user.status='Active' AND user.u_id='" . $_GET['u'] . "'");

					                        	while($row = mysqli_fetch_array($result)) {
					                        	?>
					                        	<div class="col-md-3">
							                        <div class="sideprofile">
							                        	<img src="images/upload/<?php echo $row["image"]; ?>" class="img-fluid profile_img" alt="profile picture">
							                        	<h2><?php echo $row["first_Name"]; ?> <?php echo $row["last_Name"]; ?></h2>


							                        </div>
						                        </div>
					
						
									            <input type="hidden" name="u_id"  value="<?php echo $row['u_id']; ?>">
									
												<div class="col-md-9">
													<div class="mainprofile">
										            
										            <div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Contact </b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $row["contact_number"]; ?></p>
										            	</div>
										            </div>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Alternate Number </b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $row["alt_number"]; ?></p>
										            	</div>
										            </div>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Email </b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $row["email"]; ?></p>
										            	</div>
										            </div>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Age </b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $row["Age"]; ?></p>
										            	</div>
										            </div>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Gender</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $row["Gender"]; ?></p>
										            	</div>
										            </div>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Occupation</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $row["Occupation"]; ?></p>
										            	</div>
										            </div>
										            <div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Email </b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $row["email"]; ?></p>
										            	</div>
										            </div>
										            <div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Full Address</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $row["full_address"]; ?></p>
										            	</div>
										            </div>
										            <div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>City </b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $row["city"]; ?></p>
										            	</div>
										            </div>
												</div>
												</div>
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
	

    






	<!-- Footer -->





	<!-- Footer -->
