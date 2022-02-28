<?php
	session_start();
	$name=$_GET['name'];	
	$d=$_GET['d'];
	$a=$_SESSION['lawyer_id'];
	$des=$_GET['des'];
	$u=$_GET['u'];
	$b = $_GET['b'];
	
	//$booking_id=$_SESSION['booking_id'];
	if($_SESSION['login']==TRUE AND $_SESSION['status']=='Active'){
		
		//session_start();
		include("db_con/dbCon.php");
		$conn = connect();
		if(isset($_GET['unblock_id'])){
			
			$id = $_GET['unblock_id'];
			//echo $id;exit;
			
			$sql = "UPDATE `booking` SET `status`='Accepted' WHERE booking_id='$id'";
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
									
												<div class="col-md-3"></div>
            									<form class="cusform col-md-6" action="" method="post">
												<input type="hidden" class="form-control" name="booking_id" value="<?php echo $b; ?>" readonly>
														<div class="form-group">
															<label for="enum">Client name</label>
															<input type="text" class="form-control" name="cl" value="<?php echo $name; ?>" readonly>
														</div>
														<div class="form-group">
															<label for="enum">Lawyer name</label>
															<input type="text" class="form-control" name="lwy" value="<?php echo $_SESSION['first_Name'];?> <?php echo $_SESSION['last_Name'];?>" readonly>
														</div>
														<div class="form-group">
															<label for="enum">Date</label>
															<input type="date" name="edate" value="<?php echo $d; ?>" class="form-control">
														</div>
														<div class="form-group">
															<label for="enum">Time</label>
															<input type="time" name="etime" required class="form-control">
														</div>
														<div class="form-group">
															<label for="enum">Amount</label>
															<input type="text" class="form-control" name="amt">
														</div>
														
														
														<input type="submit" value="Submit" name="submit" class="btn btn-block btn-info"/>
													
            									</form>
										
								</div>
							</div>	
						</div>
					</section>
				</div>	
                                
        </body>
		</html>
	<?php
//the update query to update the details edited by the user.
if(isset($_POST["submit"]))
{
$con =mysqli_connect("localhost","root","","lawyermanagement");
$cl=$_POST["cl"];	
$lwy=$_POST["lwy"];
$edate=$_POST["edate"];
$etime=$_POST["etime"];
$amt=$_POST["amt"];
$booking_id=$_POST["booking_id"];

//$descrp=$_POST["descrp"];
$u_id = $_POST['u_id'];
$lawyer_id = $_POST['lawyer_id'];
//$booking_id = $_POST["booking_id"];
 $query="update booking set time='$etime' where client_id='$u' and lawyer_id='$a' and description='$des'";  

$res = mysqli_query($con, $query);
if($res)
    {
		$query1="insert into more_pay(booking_id,amount,pay_for)values('$booking_id','$amt','Initial amount')";
		$res1 = mysqli_query($con, $query1);
		if($res1){
    echo"<script type='text/javascript'>alert('Updated Successfully!');</script>";
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
