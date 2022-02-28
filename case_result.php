<?php
	session_start();
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
		
		//session_start();
		include("db_con/dbCon.php");
		$conn = connect();

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
				
				<div class="d-flex" id="wrapper">
					
					<!-- Sidebar -->
					<div class="bg-light border-right" id="sidebar-wrapper">
						<div class="sidebar-heading">Admin Panel</div>
						<div class="list-group list-group-flush">
							<a href="admin_dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a><!--this page-->
							<a href="admin_lawyer.php" class="list-group-item list-group-item-action bg-light">See lawyers</a><!--admin_lawyer page-->
							<a href="admin_user.php" class="list-group-item list-group-item-action bg-light">See Users</a>
							<a href="court.php" class="list-group-item list-group-item-action bg-light">Add Court</a><!--admin_user page-->
							<a href="casetype.php" class="list-group-item list-group-item-action bg-light">Case Category</a>
                            <a href="case_result.php" class="list-group-item list-group-item-action bg-light">Case Result</a>
						</div>
					</div>
					<!-- /#sidebar-wrapper -->
					
					<section class="payment"><br><br><br>
						<div class="container">
							<div class="row">  
								<div class="col-md-2"></div>
								<div class="col-md-7">
                           
                                     
                           
									<div class="card">
                                	    <div class="card-header"><h4><b><i><center>CASE REPORTS</center></b></h4></div>
                                        <div class="card-body">
										<div class="row">  
										<div class="col-md-1"></div>
											<div class="col-md-10">
                                        <table class="table table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">Case Num</th>
													
													
													<th scope="col">Court</th>
													<th scope="col">Case Type</th>
													
												</tr>
											</thead>
												<?php
												$con =mysqli_connect("localhost","root","","lawyermanagement");
												$result = mysqli_query($con,"SELECT * from case_details ");
												$counter = 0;
												while($row = mysqli_fetch_array($result)) { 
                                                    ?>
												<tbody id="myTable">
													<tr>
													
														
														
														<td id="lw"><a href="admin_report.php?b=<?php echo $row['booking_id'];?>"><?php echo $row["case_num"]; ?></a></td>
														
														<td><?php echo $row["court"]; ?></td>
														<td><?php echo $row["ctype"]; ?></td>
                                                        
														
															<!--<script>
															 document.getElementById("statbut").disabled = true; 
															 echo "yah";
															 </script> -->
															 
												        
														
													</tr>
													<?php
													}
												?>
                                                
											</table>
												</div>
												</div>
												</div>
											
                                	    </div>
										
                                          
								        </div>
							        </div>
												
						        </div>
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