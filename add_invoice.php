<?php
	session_start();
    $bk = $_GET['bk'];
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
							<a href="user_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--user_profile page-->
							<a href="user_booking.php" class="list-group-item list-group-item-action bg-light">My booking requests</a><!--booking page-->
							<a href="lawyers.php" class="list-group-item list-group-item-action bg-light">Lawyers</a><!--booking page-->
							<a href="user_case.php" class="list-group-item list-group-item-action bg-light">Case Reports</a><!--booking page-->
							<!--<a href="update_password.php" class="list-group-item list-group-item-action bg-light">Update Password</a>-->
						</div>
					</div>
					<!-- /#sidebar-wrapper -->
					
					<!-- edit profile Content -->
					<section class="payment">
						<div class="container">
							<div class="span7">  
												
							<?php
												include_once 'db_con/dbCon.php';
												$a = $_SESSION['lawyer_id'];
												$conn = connect();
												$result = mysqli_query($conn,"SELECT *
												FROM booking,client,user
												WHERE booking.client_id=client.client_id
												AND client.client_id=user.u_id 
												and booking.lawyer_id='$a'
												and booking.booking_id='$bk'
												");
												$counter = 0;
                                                $count=0;
												while($row = mysqli_fetch_array($result)) {
													
													
												?>
								<br>
									<div class="card">
									<div class=" container col-md-12 bg-light text-dar">
                                        <br>
										<div class="form-row">
										<div class=" form-group col-md-3">
										<label  for="lname">From</label>
										<input type="text" class="form-control" name="case_num"  id="case_num" value="<?php echo $row['first_Name'],'&nbsp;',$row['last_Name']; ?>" disabled>
										</div>
										<div class=" form-group col-md-6">

										</div>
										<div class=" form-group col-md-3">
										<label  for="lname">To</label>
										<input type="text" class="form-control" name="case_num"  id="case_num" value="<?php echo $_SESSION['first_Name'];?> <?php echo $_SESSION['last_Name'];?>" disabled>
										</div>
										</div>
									</div>
									
                                	
										<div class="card-body">
										<div class=" container bg-light text-dark">
											
										<table class="table table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">Payment Id</th>
													<th scope="col">Details</th>
													<th scope="col">Amount</th>
													<th scope="col">Paid Date</th>
													<th scope="col">Paid Time</th>	
													
												</tr>
											</thead>
                                            <?php $result1 = mysqli_query($conn,"SELECT * from payment,booking,more_pay where payment.booking_id = booking.booking_id and payment.lawyer_id = '$a' and more_pay.booking_id= '$bk' and more_pay.mpid= payment.mpid and payment.client_id = '" .$row['client_id'] ."'");
													while($row1 = mysqli_fetch_array($result1)) {?>
														
												<tbody id="myTable">
                                                <?php
                                                        $r = mysqli_query($conn,"SELECT mpid FROM more_pay where more_pay.booking_id = '$bk' ORDER BY mpid");
																	
                                                        $ro = mysqli_num_rows($r) ;
                                                        
                                                        ?>
													<tr>
													
														<td><input type="text" class="form-control" value="<?php echo $row1["id"]; ?>" disabled></td>
                                                        <td><input type="text" class="form-control" value="<?php echo $row1["pay_for"]; ?>" disabled></td>
                                                        <?php $ab = ++$count;
                                                       // echo $ab;?>

                                                        <td><input type="text" id="<?php echo $ab; ?>" class="form-control" value="<?php echo $row1["amount"]; ?>" name="<?php echo $ab; ?>" disabled></td>
                                                        
                                                        <td><input type="text" class="form-control" value="<?php echo $row1["pay_date"]; ?>" disabled></td>
														<td><input type="text" class="form-control" value="<?php echo $row1["pay_time"]; ?>" disabled></td>
													
                                                       
                                                        <?php
													}
												?>
                                                <?php
													}
												?>
										</table>
                                        
										</div>
											<div class="row"></div>
                                            	<div class="col-md-12"> 
											<div class="row">
											
											<hr style="width:100%;text-align:left;margin-left:0">	
                                            <div class=" container col-md-12 ">
                                        <br>
										<div class="form-row">
										<div class=" form-group col-md-3">
										
										</div>
										<div class=" form-group col-md-6">

										</div>
                                        <?php
                                                        $f = mysqli_query($conn,"SELECT sum(amount) FROM payment where payment.booking_id = '$bk'");
																	
                                                        $rw = mysqli_fetch_array($f);
                                                        
                                                        ?>
										<div class=" form-group col-md-3">
										<label  for="lname">Total</label>
										<input type="text" class="form-control" name="s"  id="s" value="<?php echo $rw[0];?>" disabled>
										</div>
										</div>
									</div>
                                    
                                    <script>
                                        var sum=0;
                                        var ab = <?php echo $ro;?>;
                                        for for (let i = 1; i < =ab; i++) {
                                           var sd = document.getElementById("i").value;
                                           sum = sum + sd;
                                        }
                                         document.getElementById("s").value = sum;
                                    
                                    
                                    </script>
														
													</tr>
													
													
										</div>	
										
                                                </div>  
												 
										</div>
									</div>	
								</div>
							</div>	
						</div>
					</section>
					<!-- edit profile Content -->
					
					
					
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
		
	}else 
	header('location:login.php?deactivate');
?>
<script type="text/javascript">
$(document).ready(function()
{
for($j=1;$j<=$ro;$j++)
{
  $('#amount'+$j).val('0');
}
});
$sum=0;
$(".amount').keyup(function(){
for($j=1;$j<=5;$j++)
{
   $sum=$sum+$('#amount'+$j).val();
   alert($sum);
 }
 $(".sum").php('$sum');
 });
 </script>