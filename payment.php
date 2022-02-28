<?php
	session_start();
	$b=$_GET['b'];
	

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
							<!--<a href="user_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--user_profile page-->
							<a href="user_booking.php" class="list-group-item list-group-item-action bg-light">My booking requests</a><!--booking page-->
							<!--<a href="update_password.php" class="list-group-item list-group-item-action bg-light">Update Password</a>-->
						</div>
					</div>
		
           
    <section class="payment">
		<div class="container">
		
		<div class="col-md-8"><br>
		<?php
		include_once 'db_con/dbCon.php';
		$a=$_SESSION['client_id'];
		$conn = connect();
			$result1 = mysqli_query($conn,"select * from more_pay where booking_id = '$b' order by mpid desc limit 1");
			
			$row1 = mysqli_fetch_array($result1);
			if($row1){
				$q1 = mysqli_query($conn,"select mpid from payment where mpid ='" . $row1['mpid'] . "'");
				$rw = mysqli_num_rows($q1);
				if($rw){ 
					echo "<div class='alert alert-danger alert-dismissible fade show'>
							<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
							<strong>Already Paid.
							</div>";
				}else{?>
					<div class="form-row">
					<div class="form-group col-md-5">
					<label for="num">Amount to be paid</label>
					<input class="form-control" type="text" name="cl" value = "<?php echo $row1['amount']; ?>" readonly>
					</div>
					<div class="form-group col-md-5">
					<label for="enum">Payment for</label>
					<input type="text" class="form-control" name="lwy" value = "<?php echo $row1['pay_for']; ?>">
					</div>
					</div>
			
			
		
		
		</div>

			<div class="col-md-7">
				<hr>

				<?php
				
				$result = mysqli_query($conn,"SELECT *
				FROM booking,lawyer,user
				WHERE booking.booking_id = '$b' and
				booking.lawyer_id=lawyer.lawyer_id 
				AND lawyer.lawyer_id=user.u_id 
				and booking.client_id='$a'
				");
				$counter = 0;
				while($row = mysqli_fetch_array($result)) {
				
					
					
				?>		
												
					
			
				<br>
           						 <form action="" method="post">
									<input type="hidden" name="mpid" value = "<?php echo $row1['mpid']; ?>">
									<input type="hidden" name="client"  value="<?php echo $a; ?>">
									<input type="hidden" name="lawyer"  value="<?php echo $row['lawyer_id']; ?>">
									<input type="hidden" name="booking"  value="<?php echo $row['booking_id']; ?>">
									<div class="form-group">
										<label for="num">Client name</label>
										<input class="form-control" type="text" name="cl" readonly value="<?php echo $_SESSION['first_Name'];?> <?php echo $_SESSION['last_Name'];?>">
									</div>
									<div class="form-group">
										<label for="enum">Lawyer name</label>
										<input type="text" class="form-control" name="lwy" value="<?php echo $row['first_Name'],'&nbsp;',$row['last_Name'] ?>" readonly>
									</div>
									<div class="form-group">
										<label for="enum">Card number</label>
										<input class="form-control" type="text" name="dc" pattern="[1-9][0-9]{15}" required>
									</div>
									<div class="form-group">
										<label for="enum">Cvv</label>
										<input class="form-control" type="text" pattern="[1-9][0-9]{2}" name="sc" required>
									</div>
									<div class="form-group">
										<label for="enum">Amount</label>
										<input class="form-control" type="text" name="amount" value="<?php echo $row1['amount'];?>" readonly >
									</div>
									<?php date_default_timezone_set('Asia/Kolkata');
											   $date = date('Y-m-d'); 
											   $time = date('H:i:s a'); ?>
									<div class="form-group">
										<label for="enum">expiry date</label>
										<input class="form-control" type="date" required name="edate" min="<?php echo $date; ?>" required>
									</div>
									
											  
									<input type="hidden"  name="pay_date" value="<?php echo $date;?>">
									<input type="hidden"  name="pay_time" value="<?php echo $time;?>">		   
									
									<input type="submit" value="PAY" name="submit" class="btn btn-block btn-info">
				
            					</form>
							<?php } }}?>
				
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
$client=$_POST["client"];
$lawyer=$_POST["lawyer"];
$booking=$_POST["booking"];
$mpid=$_POST["mpid"];
print($lawyer);
$dc=$_POST["dc"];
$amount=$_POST["amount"];
$pay_date = $_POST['pay_date'];
$pay_time = $_POST['pay_time'];
//$booking_id = $_POST["booking_id"];
 $query="insert into payment(client_id,lawyer_id,booking_id,mpid,cardno,amount,pay_date,pay_time)values('$client','$lawyer','$booking','$mpid','$dc','$amount','$pay_date','$pay_time')";

$res = mysqli_query($con, $query);
if($res)
    {
		$query2 = "update booking set paid='yes' where booking_id='$booking'";
		$res2= mysqli_query($con,$query2);
		if($res2)
		{
			
    	echo"<script type='text/javascript'>alert('inserted Successfully!');</script>";
  		 echo "<script type='text/javascript'>
            window.location.href = 'user_booking.php';
       	 </script>";
}
 else {
   echo"<script type='text/javascript'>alert('Error');</script>"; 
}
}
}
 ?>
<?php
				
}else 
header('location:login.php?deactivate');
?>	


	<!-- Footer -->
