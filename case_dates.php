<?php
	session_start();
	$a=$_SESSION['lawyer_id'];
	$u= $_GET['u'];
	$b=$_GET['b'];
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
        <li class="nav-item"><a href="case_police.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link">Police Station</a></li>
        <li class="nav-item"><a href="case_dates.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link active" aria-current="page">Case Updates</a></li>
      </ul>
    </header>
  </div>
											<hr style="width:100%;text-align:left;margin-left:0">	
										</div>	
										<?php
												include_once 'db_con/dbCon.php';
												
												$conn = connect();
												$result = mysqli_query($conn,"SELECT * FROM booking,client,user WHERE booking.client_id=client.client_id AND client.client_id=user.u_id and booking.lawyer_id='$a' and booking.client_id='". $u . "'");
												$counter = 0;
												while($row = mysqli_fetch_array($result)) {
													
													
                                                        
								                    		
								                    		$query2 = "select * from case_details,booking where case_details.booking_id=booking.booking_id and case_details.lawyer_id = '$a' and case_details.client_id='$u'";
								                    		$res2 = mysqli_query($conn,$query2);
								                    		while($f = mysqli_fetch_array($res2))
								                    		{
																$case_num = $f['case_num'];
																//echo $case_num;
												$result = mysqli_query($conn,"SELECT * from case_details where case_num='$case_num'
												");
												$counter = 0;
												while($row = mysqli_fetch_array($result)) {
													
													
												?>
					
			
				
           						 <form class="cusform" action="" method="post">
									<div class="form-group">
									<input type="text" class="form-control" name="case_num"  value="<?php echo $case_num; ?>" readonly>
									</div>
									
									<div class="form-group">
										<label for="num">Case result</label>
										<select id="result" name="result" class="form-control" onchange='CheckColors(this.value);'>
                                                                                        <option>Select</option>
																						<option>Win</option>
                                                                                        <option>Lose</option>
																						<option>postponed</option>
                                                                                    </select>
									</div>
									
									<div class="form-group">
										<label for="enum">Next Hearing Date</label>
										<input class="form-control" type="date" name="hdate" >
									</div>
									<div class="form-group">
										<label for="enum">Count</label>
										<input class="form-control" type="text" name="num" >
									</div>
									<div class="form-group">
										<label for="enum">Comments</label>
										<input type="text" class="form-control" name="details">
									</div>   
									
									<input type="submit" value="SUBMIT" name="submit" class="btn btn-block btn-info">
				
            					</form>
							<?php }}} ?>
											</div>
                           						                
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
//the update query to update the details edited by the user.

//the update query to update the details edited by the user.
if(isset($_POST["submit"]))
{
	$con =mysqli_connect("localhost","root","","lawyermanagement");
	$case=$_POST["case_num"];
	//echo $case_num;
    $result=$_POST["result"];
    $details=$_POST["details"];
    $hdate=$_POST["hdate"];
	$num=$_POST['num'];
	//$booking_id = $_POST["booking_id"];
	$query="insert into result(case_num,result,details,hdate,num)values('$case','$result','$details','$hdate','$num')";

	$res = mysqli_query($con, $query);
	if($res)
	{
	    echo"<script type='text/javascript'>alert('inserted Successfully!');</script>";
	   echo "<script type='text/javascript'>
	            window.location.href = 'booking.php?u=$u & b=$b';
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



	<!-- Footer -->





	<!-- Footer -->
