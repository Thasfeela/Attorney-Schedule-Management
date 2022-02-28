<?php
	session_start();
	$a=$_SESSION['lawyer_id'];
	$u=$_GET['u'];
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
			<?php include('lheader.php'); ?>
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
                                	          <a class="nav-link"  href="single_client.php?u=<?php echo $u;?>& b=<?php echo $b;?>" role="tab" aria-controls="history" aria-selected="false">Client Profile</a>
                                	        </li>
                                	        <li class="nav-item">
                                	          <a class="nav-link active" href="booking.php?u=<?php echo $u;?> & b=<?php echo $b; ?>" role="tab" aria-controls="deals" >Case Details</a>
                                	        </li>
                                            <li class="nav-item ml-auto">
                                	          <a class="nav-link btn btn-block btn-info" href="case_report.php?u=<?php echo $u;?> & b=<?php echo $b; ?>" role="tab" aria-controls="deals" >Case Report</a>
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
        <li class="nav-item"><a href="booking.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link active" aria-current="page">Case Details</a></li>
        <li class="nav-item"><a href="case_responent.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link">Responent</a></li>
        <li class="nav-item"><a href="case_police.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link">Police Station</a></li>
        <li class="nav-item"><a href="case_dates.php?u=<?php echo $u; ?> & b=<?php echo $b; ?>" class="nav-link">case updates</a></li>
      </ul>
    </header>
  </div>
											<hr style="width:100%;text-align:left;margin-left:0">	
										</div>	
										<?php
												include_once 'db_con/dbCon.php';
												$a=$_SESSION['lawyer_id'];
												
												$conn = connect();
												$result = mysqli_query($conn,"SELECT * FROM case_details where booking_id = '$b'");
												$counter = 0;
												while($row = mysqli_fetch_array($result)) {
													echo $row['client_id'];
													echo $row['booking_id'];
					                ?>
            										<form action="" method="POST">
													<input type="hidden" name="lawyer"  value="<?php echo $a; ?>">
																	<div class="container p-3 my-3 bg-light text-dark" id="c1">
																		<div class="col-md-10">
																		<div class="form-row">
																				<div class="form-group col-md-6">
																					<label  for="lname">Case Number</label>
																					<input type="text" class="form-control" name="case_num"  id="case_num" value="<?php echo $row['case_num']; ?>" disabled>
																				</div>
																				<div class="form-group col-md-6">
																					<label  for="lname">Current Status</label>
																					<select id="status" name="status" class="form-control" >
                                                                                        <option><?php echo $row['status']; ?></option>
																						<option>Pending</option>
                                                                                        <option>On-trial</option>
																						<option>In-Progress</option>
																						<option>Final-Stage</option>
                                                                                        <option>Closed</option>
                                                                                    </select>
																				</div>
																				
																				
																			</div>
																			<div class="form-row">
																			<div class="form-group col-md-6">
																				<label for="type">Case Type</label>
																				<select id="ctype" onchange='CheckColors(this.value)' name="ctype" class="form-control" >
																					<option><?php echo $row['ctype']; ?></option>
																					<?php
																						$con =mysqli_connect("localhost","root","","lawyermanagement");
																						$query = "select type from case_type ";
																						$res = mysqli_query($con,$query);
																						while($f = mysqli_fetch_array($res))
																						{
																							?>
																							<option value="<?php echo $f[0]?>"><?php echo $f[0]?></option>
																							<?php
																						}
																					?>
																					</select>
																			</div>
																			
																			<div class="form-group col-md-6">
																				<label for="lname">Sub Category</label>
																				<input type="text" class="form-control" name="sub"  id="sub" value="<?php echo $row['sub']; ?>">
																			</div>
																			
																			</div>
																			<div class="form-row">
																			<div class="form-group col-md-6">
																				<label  for="lname">Filing Court</label>
																				<select id="court" name="court" class="form-control" value="<?php echo $row['court']; ?>">
																					<option value=" "><?php echo $row['court']; ?></option>
																					<?php
																						$con =mysqli_connect("localhost","root","","lawyermanagement");
																						$query = "select court_name,Location from court ";
																						$res = mysqli_query($con,$query);
																						while($f = mysqli_fetch_array($res))
																						{
																							?>
																							<option ><?php echo $f[0],'&nbsp;',$f[1]?></option>
																							<?php
																						}
																					?>
																					</select>
																				</div>
																				<div class="form-group col-md-6">
																					<label  for="lname">Filing Date</label>
																					<input type="date" class="form-control" name="fdate"  id="fdate" value="<?php echo $row['filing_date']; ?>">
																				</div>
																				
																			</div>
																			
																			
																			<div class="form-row">
																			<div class="form-group col-md-6">
																					<label  for="lname">Act</label>
																					<input type="text" class="form-control" name="act"  id="hdate" value="<?php echo $row['act']; ?>">
																				</div>
																				
																			</div>

																				
																				<div class="form-group">
																					
																				<label  for="practise">Case Facts</label>
																				<textarea class="form-control" name="facts" id="" cols="20" rows="1"><?php echo $row['statement']; ?></textarea>
																			</div>
                                                                            
                                                                            <div class="form-group" id="evi">
																					
																				<label  for="practise">Evidence</label>
																				<textarea class="form-control" name="evidence" id="evi" cols="20" rows="1"><?php echo $row['evidence']; ?></textarea>
																			</div>
																			<div class="form-group" id="wit">
																					
																				<label  for="practise">witness</label>
																				<textarea class="form-control" name="witness" id="wit" cols="20" rows="1" ><?php echo $row['witness']; ?></textarea>
																			</div>
												
																			</div>
																		</div>
																	</div>
													
												
																	<div class="form-row">
													
													<div class="form-group col-md-2">
														<input name="submit" type="submit" class="btn btn-block btn-info" value="update"/>
													</div>
												</div>
																			
													
																		
                                                                            
															
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
$case_num = $_POST['case_num'];
$court = $_POST['court'];
$fdate = $_POST['fdate'];
$ctype = $_POST['ctype'];
$sub = $_POST['sub'];
$status = $_POST['status'];
$facts=$_POST['facts'];
$evidence=$_POST['evidence'];
$witness=$_POST['witness'];
$act = $_POST['act'];

$query1="update case_details set court='$court', filing_date='$fdate', ctype='$ctype', sub='$sub', status='$status', statement='$facts', evidence='$evidence', witness='$witness' where booking_id='$b'";
$res1 = mysqli_query($con, $query1);
if($res1){
	echo"<script type='text/javascript'>alert('updated Successfully!');</script>";
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

<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('evi');
 var witness=document.getElementById('wit');
 if(val=='Family law'){
   element.style.display='none';
   witness.style.display='none';
 }else  {
   element.style.display='block';
   witness.style.display='block';
}
}

</script> 	
			


	<!-- Footer -->





	<!-- Footer -->
