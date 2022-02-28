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
							<a href="admin_user.php" class="list-group-item list-group-item-action bg-light">See Users</a><!--admin_user page-->
							<a href="court.php" class="list-group-item list-group-item-action bg-light">Add Court</a><!--admin_user page-->
							<a href="casetype.php" class="list-group-item list-group-item-action bg-light">Case Category</a><!--admin_user page-->
							<a href="case_result.php" class="list-group-item list-group-item-action bg-light">Case Result</a>
						</div>
					</div>
				
					<!-- /#sidebar-wrapper -->
					
					<section class="payment"><br><br>
			
						<div class="container col-md-8 bg-light text-dark" ><br>
							<div class="row">
<div class="col-md-2"></div>
								
								<div class="col-md-7">
									<form action="" method="post" enctype="multipart/form-data" id="validateForm">
		
										<div class="form-group">
											<label for="email">Court Name</label>
											<input type="text" class="form-control"  name="cname" id="cname" placeholder="Enter court name" required>
										</div>
										<div class="form-group">
											<label for="num">Location</label>
											<input type="text" class="form-control" name="location" id="location" placeholder="Enter Location" required>
										</div>
                            			<div class="form-group">
											<label for="num">State</label>
											<input type="text" class="form-control" name="State" id="State" placeholder="Enter State" required>
										</div>
                            			<div class="form-group">
											<label for="num">Pin code</label>
											<input type="text" class="form-control" name="Pin" id="Pin" placeholder="Enter Pin code">
										</div>
                            			<div class="form-group">
											<label for="num">contact</label>
											<input type="text" class="form-control" name="contact" id="contact" placeholder="Enter Location" required>
										</div>
		
										<input name="submit" type="submit" class="btn btn-block btn-success" value="submit" />
										<br><!--after signup redirect user dashboard page-->
									</form>
		
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
		
	<?php
//the update query to update the details edited by the user.
if(isset($_POST["submit"]))
{
	$con =mysqli_connect("localhost","root","","lawyermanagement");
	$cname=$_POST["cname"];
	$location=$_POST["location"];
	$State=$_POST["State"];
	$Pin=$_POST["Pin"];
	$contact=$_POST["contact"];
	//$booking_id = $_POST["booking_id"];
	$query="insert into court (court_name,Location,State,Pin_code,contact) values ('$cname','$location','$State','$Pin','$contact')";

	$res = mysqli_query($con, $query);
	if($res)
	{
	    echo"<script type='text/javascript'>alert('inserted Successfully!');</script>";
	   echo "<script type='text/javascript'>
	            window.location.href = 'admin_dashboard.php';
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
<script>
			$('#validateForm').bootstrapValidator({
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					contact: {
						validators: {
							stringLength: {
								min: 10,
								max:13,
								message: 'Contract Number Must be 10 Digit',
							},
							numeric: {
								message: 'The phone no must be a number'
							},
							notEmpty: {
								message: 'Please Enter your phone number'
							}
						}
					},
					Pin: {
						validators: {
							stringLength: {
								
								max:6,
								message: 'Pin Code Must be 6 Digit',
							},
							numeric: {
								message: 'Pin Code must be a number'
							},
							notEmpty: {
								message: 'Please Enter Pin Code'
							}
						}
					}
				}
			});

		</script>
												</body>
	</html>