<?php
	session_start();
	$u=$_SESSION['client_id'];
    //echo $u;
	//$u=$_GET['u'];
	
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
							<a href="user_dashboard.php" class="list-group-item list-group-item-action bg-light">Dashboard</a><!--this page-->
							<a href="user_profile.php" class="list-group-item list-group-item-action bg-light">Edit Profile</a><!--user_profile page-->
							<a href="user_booking.php" class="list-group-item list-group-item-action bg-light">My booking requests</a><!--booking page-->
                            <a href="lawyers.php" class="list-group-item list-group-item-action bg-light">Lawyers</a><!--booking page-->
							<a href="user_case.php" class="list-group-item list-group-item-action bg-light">Case Reports</a><!--booking page-->
							<!--<a href="update_password.php" class="list-group-item list-group-item-action bg-light">Update Password</a>-->
						</div>
					</div>
           
					<section class="payment">
						<div class="container">
							<div class="span7">  
								<div class="col-md-12">
                                    <form action="" method="POST">
                            <div class="form-row">
                                <div class="form-group col-md-5">
								
										
									<label  for="lname">Booked Cases</label>
									<select id="booking" name="booking" class="form-control">
									<option value=" ">Select</option>
									<?php
										$con =mysqli_connect("localhost","root","","lawyermanagement");
										$query = "select * from booking,client,lawyer,user 
                                        where booking.client_id=client.client_id 
										and booking.lawyer_id = lawyer.lawyer_id 
										and lawyer.lawyer_id = user.u_id 
										and booking.client_id='$u' 
										and booking.status = 'Accepted'";
										$res = mysqli_query($con,$query);
										while($f = mysqli_fetch_array($res))

                                        
										{ ?>
											
											
											<option value="<?php echo $f['booking_id'];?>"><?php echo $f['first_Name'],'&nbsp;', $f['last_Name'],'&nbsp;(',$f['date'],')';?></option>
											
											<?php } ?>
										</select> 
                                           
								</div>
                                <div class="form-group col-md-1">
                                    <label for=""><br></label>
                                    <input name="submit" type="submit" class="btn btn-block btn-info form-control" value="Go" />
                                </div>
                            </div>
                                        </form>
                                        
                            <?php
                                        if(isset($_POST["submit"]))
                                        {
                                        $con =mysqli_connect("localhost","root","","lawyermanagement");
                                        $a = $_POST['booking'];
                                        
										
                                    
                                       
                                    ?>
									<div class="card">
                                	    <div class="card-header">
                                	      
                                	    </div>
										<div class="card-body">

                                           
										<br>
													
											<?php 
                                                        
														$con =mysqli_connect("localhost","root","","lawyermanagement");
														$query = "select * from case_details,booking where case_details.booking_id=booking.booking_id and case_details.booking_id = '$a' and case_details.client_id='$u'";
														$res = mysqli_query($con,$query);
														while($f = mysqli_fetch_array($res))
														
														{
															$case_num = $f['case_num'];
															$query1 = "select case_num from result where case_num contains $case_num";
															//echo $query1;
															$res1 = mysqli_query($con,$query1);
															if(!$res1){
																
																$query2 = "select * from result,case_details where result.case_num = '$case_num' and case_details.case_num = result.case_num";
																$res2 = mysqli_query($con,$query2);
											
																while($row = mysqli_fetch_array($res2)){
																
															
													?>
													<div class=" container col-md-11 bg-light text-dark">
														<div class="form-row">
															<?php if($row["result"]!='Select'){?>
															<div class=" form-group col-md-2">
															<label  for="lname">Result</label>
															<input type="text" class="form-control" name="case_num"  id="case_num" value="<?php echo $row["result"]; ?>" readonly>
															</div>
															<?php} if($row["status"]!=''){?>
															<div class=" form-group col-md-2">
															<label  for="lname">Status</label>
															<input type="text" class="form-control" name="case_num"  id="case_num" value="<?php echo $row["status"]; ?>" readonly>
															</div><?php } if($row["details"]!=''){?>
															<div class=" form-group col-md-3">
															<label  for="lname">comments</label>
															<input type="text" class="form-control" name="case_num"  id="case_num" value="<?php echo $row["details"]; ?>" readonly>
															</div><?php } if($row["hdate"]!='0000-00-00'){?>
															<div class=" form-group col-md-3">
															<label  for="lname">Next Hearing Date</label>
															<input type="text" class="form-control" name="case_num"  id="case_num" value="<?php echo $row["hdate"];?>" readonly>
															</div><?php } if($row["num"]!='0'){?>
															<div class=" form-group col-md-2">
															<label  for="lname">Sitting Count</label>
															<input type="text" class="form-control" name="num" value="<?php echo $row['num'];?>" readonly>
															</div><?php } ?>
															
														</div>
														
													</div>
													<?php } }?>
													<br>
													<div class=" container col-md-11 bg-light text-dark">
													<?php  if($f["case_num"]!=''){?>
													<br><div class="infogroup row">
													
										            			<div class="col-md-4">
										            				<label for="email"><b>Case num </b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["case_num"]; ?></p>
										            			</div>
										            		</div>
															<?php } if($f["status"]!=''){?>
															<div class="infogroup row">
										            			<div class="col-md-4">
										            				<label for="email"><b>Status</b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["status"]; ?></p>
										            			</div>
										            		</div><?php } if($f["ctype"]!=''){?>
															<div class="infogroup row">
										            			<div class="col-md-4">
										            				<label for="email"><b>Case Type</b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["ctype"]; ?></p>
										            			</div>
										            		</div><?php } if($f["sub"]!=''){?>
															<div class="infogroup row">
										            			<div class="col-md-4">
										            				<label for="email"><b>Sub Category </b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["sub"]; ?></p>
										            			</div>
										            		</div><?php } if($f["court"]!='Select'){?>
															<div class="infogroup row">
										            			<div class="col-md-4">
										            				<label for="email"><b>Court</b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["court"]; ?></p>
										            			</div>
										            		</div><?php } if($f["act"]!=''){?>
															<div class="infogroup row">
										            			<div class="col-md-4">
										            				<label for="email"><b>Act </b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["act"]; ?></p>
										            			</div>
										            		</div>
															<?php } if($f["filing_date"]!=''){?>
															<div class="infogroup row">
										            			<div class="col-md-4">
										            				<label for="email"><b>Act </b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["filing_date"]; ?></p>
										            			</div>
										            		</div><?php } if($f["statement"]!=''){?>
															<div class="infogroup row">
										            			<div class="col-md-4">
										            				<label for="email"><b>Statement </b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["statement"]; ?></p>
										            			</div>
										            		</div>
															<?php } if($f['evidence']!=""){?>
															<div class="infogroup row">
										            			<div class="col-md-4">
										            				<label for="email"><b>Evidence</b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["evidence"]; ?></p>
										            			</div>
										            		</div>
															<?php } 
															if($f['witness']!=""){?>
															<div class="infogroup row">
										            			<div class="col-md-4">
										            				<label for="email"><b>witness</b></label>
										            			</div>
										            			<div class="col-md-8">
										            				<p><?php echo $f["witness"]; ?></p>
										            			</div>
										            		</div>
															<?php } ?>
													</div>		
															
															
															
                                                <?php }
                                                        
														$con =mysqli_connect("localhost","root","","lawyermanagement");
														$query = "select * from booking,station where station.booking_id = booking.booking_id and station.booking_id='$a'";
														$res = mysqli_query($con,$query);
														while($fw = mysqli_fetch_array($res))
														
														{
															
															
															
														
													?>
											<br><div class=" container-fluid col-md-11 bg-light text-dark"><?php if($fw['name']!=""){?>
											<br><div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Police Station</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fw["name"]; ?></p>
										            	</div>
										            </div><?php } if($fw['address']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Address</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fw["address"]; $fw['location']; $fw['pincode'];?></p>
										            	</div>
										            </div><?php } if($fw['o_date']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>offense Date</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fw["o_date"];?></p>
										            	</div>
										            </div><?php } if($fw['c_date']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Charge sheet filing Date</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fw["c_date"];?></p>
										            	</div>
										            </div><?php } if($fw['firtype']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>FIR Type</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fw["firtype"];?></p>
										            	</div>
										            </div><?php } if($fw['firno']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>FIR Number</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fw["firno"];?></p>
										            	</div>
										            </div><?php } if($fw['officer1']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Ofiicers</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fw["officer1"];echo(", ");echo $fw['officer2'];?></p>
										            	</div>
										            </div><?php } if($fw['contact']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Contacts</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fw["contact"];echo(", ");echo $fw['alt_phn'];?></p>
										            	</div><?php } ?>
										            </div>
											</div>
													
													<?php } 
                                                        $con =mysqli_connect("localhost","root","","lawyermanagement");
														
														$query2 = "select * from booking,opponent where opponent.booking_id = booking.booking_id and opponent.booking_id='$a'";
														$res2 = mysqli_query($con,$query2);
														while($fs = mysqli_fetch_array($res2))
														
														{
												?>	
											<br><div class=" container-fluid col-md-11 bg-light text-dark"><?php if($fs['op_name']!=""){?>
													<br><div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Respondent</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fs["op_name"];?></p>
										            	</div>
										            </div><?php } if($fs['relation']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Relation with client</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fs["relation"];?></p>
										            	</div>
										            </div><?php } if($fs['op_add']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Address</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fs["op_add"],'&nbsp;',$fs['op_city'],'&nbsp;', $fs['op_pin'];?></p>
										            	</div>
										            </div><?php } if($fs['op_gender']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Gender</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fs["op_gender"];?></p>
										            	</div>
										            </div><?php } if($fs['op_age']!=0){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Age</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fs["op_age"];?></p>
										            	</div>
										            </div><?php } if($fs['op_religion']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Religion</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fs["op_religion"];?></p>
										            	</div>
										            </div><?php } if($fs['op_caste']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Caste</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fs["op_caste"];?></p>
										            	</div>
										            </div><?php } if($fs['op_occu']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Occupation</b></label>
										            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fs["op_occu"];?></p>
										            	</div>
										            </div><?php } if($fs['op_contact']!=""){?>
													<div class="infogroup row">
										            	<div class="col-md-4">
										            		<label for="email"><b>Contact</b></label>
							            	</div>
										            	<div class="col-md-8">
										            		<p><?php echo $fs["op_contact"],',',$fs['op_alt'];?></p>
										            	</div>
										            </div><?php } ?>
											</div>
											<?php }} ?>
											
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
