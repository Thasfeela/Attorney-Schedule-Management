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
		<link rel="stylesheet" href="css/bootstrap.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/media.css">
		<title>Log In here</title>
<style>
  .has-error .help-block {
  color: red;
}
  </style>
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
										<a class="nav-link cus-a" href="index.php">Home <span class="sr-only">(current)</span></a>
									</li>
									<li class="">
										<a class="nav-link cus-a" href="lawyers.php">Lawyers</a><!--lawyers.html page-->
									</li>
									
									<li class="">
										<a class="nav-link cus-a" href="login.php">Login</a>
									</li>
									<li class="nav-item dropdown">
										<a class="nav-link dropdown-toggle cus-a" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											Register
										</a>
										<div class="dropdown-menu" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="lawyer_register.php">Register as a lawyer</a><!--redirect lawyer register page-->
											<a class="dropdown-item" href="user_register.php">Register as a user</a><!--redirect user register page-->

										</div>
									</li>


								</ul>

							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<section class="registerform">
			<div class="container">
				<div class="row">
					<div class="col-md-3">
					
					</div>
					<div class="col-md-6">
						<form  action="lawyer_registation.php"  method="post" enctype="multipart/form-data"  id="validateForm">
						<div class="form-group">
								<label for="enum">Enrollment Number</label>
								<input type="text" class="form-control" name="enum" id="enum" placeholder="Enrollment Number" required>
							</div>
							<div class="form-group">
								<label for="court">Court</label>
								<select id="court" name="court" class="form-control" required>
									<option value=" ">Select</option>
									<?php
										$con =mysqli_connect("localhost","root","","lawyermanagement");
										$query = "select court_name,Location from court ";
										$res = mysqli_query($con,$query);
										while($f = mysqli_fetch_array($res))
										{
											?>
											<option><?php echo $f[0],'&nbsp;',$f[1]?></option>
											<?php
										}
									?>
									</select>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="fname">First Name</label>
									<input type="text" class="form-control" id="first_Name" name="first_Name" placeholder="first name">
								</div>
								<div class="form-group col-md-6">
									<label for="lname">Last Name</label>
									<input type="text" class="form-control" id="lname" name="last_Name" placeholder="last name">
								</div>
							</div>

							<div class="form-group">
								<label for="num">Contact Number</label>
								<input type="text" class="form-control" name="contact_number" id="contact_number" placeholder="contact number">
							</div>
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="email address">
							</div>
							<div class="form-group">
								<label for="email">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="password">
							</div>
							<div class="form-row"><label for="edu"><small>Put Your chamber Location </small></label></div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="address">Full Address</label>
										<input type="text" class="form-control" id="full_address" name="full_address">
									</div>
									<div class="form-group col-md-3">
										<label for="city">City</label>
										<input type="text" class="form-control" id="city" name="city">
									</div>
									<div class="form-group col-md-3">
										<label for="zip">Pin code</label>
										<input type="text" class="form-control" id="zip_code" name="zip_code">
									</div>
								</div>
							
							<div class="form-row"><label for="edu"><small><i>Put Your Last Education..</i></small></label></div>
								<div class="form-row">
									<div class="form-group col-md-6">
										<label for="institute">University / College Name</label>
										<input type="text" class="form-control" id="institute" name="university_College" placeholder="Institute name">
									</div>
									<div class="form-group col-md-3">
										<label for="degree">Degree</label>
										<select id="degree" name="degree" class="form-control">
											<option value=" " selected>Choose...</option>
											<option value="LLB">LLB</option>
											<option value="LLM">LLM</option>
										</select>
									</div>
									<div class="form-group col-md-3">
										<label for="pyear">Passing Year</label>
										<select id="passing_year" name="passing_year" class="form-control">
											<option value=" " selected>Choose...</option>
											<option value="2000">2000</option>
											<option value="2001">2001</option>
											<option value="2002">2002</option>
											<option value="2003">2003</option>
											<option value="2004">2004</option>
											<option value="2005">2005</option>
											<option value="2006">2006</option>
											<option value="2007">2007</option>
											<option value="2008">2008</option>
											<option value="2009">2009</option>
											<option value="2010">2010</option>
											<option value="2011">2011</option>
											<option value="2012">2012</option>
											<option value="2013">2013</option>
											<option value="2014">2014</option>
											<option value="2015">2015</option>
											<option value="2016">2016</option>
											<option value="2017">2017</option>
											<option value="2018">2018</option>
											<option value="2019">2019</option>
										</select>
									</div>
								</div>
							
							
							<div class="form-group">
								<label for="practise">Length of practise</label>
								<select id="practise" name="practise_Length" class="form-control">
									<option value=" " selected>Choose...</option>
									<option value="fresher">fresher</option>
									<option value="1-5 years">1-5 years</option>
									<option value="6-10 years">6-10 years</option>
									<option value="11-15 years">11-15 years</option>
									<option value="16-20 years">16-20 years</option>
									<option value="Most Senior">Most Senior</option>
								</select>
							</div>
							<!--<div class="form-row"><label for="edu">Type of cases handle</label></div>-->
							<!--<div class="form-row">
							<div class="form-group col-md-3">	
										<select id="case1" name="case1" class="form-control">
											<option value=" " selected>Case 1</option>
											<option value="Criminal matter">Criminal matter</option>
											<option value="Civil matter">Civil matter</option>
											<option value="Writ Jurisdiction">Writ Jurisdiction</option>
											<option value="Company law">Company law</option>
											<option value="Contract law">Contract law</option>
											<option value="Commercial matter">Commercial matter</option>
											<option value="Construction law">Construction law</option>
											<option value="Information Technology">Information Technology</option>
											<option value="Family Law">Family Law</option>
											<option value="Religious Matter">Religious Matter</option>
											<option value="Investment Matter">Investment Matter</option>
											<option value="Labour Law">Labour Law</option>
											<option value="Property Law">Property Law</option>
											<option value="Taxation Matter">Taxation Matter</option>
											<option value="Others">Others</option>
										</select>
									</div>
									<div class="form-group col-md-2">	
										<select id="case2" name="case2" class="form-control">
											<option value=" " selected>Case 2</option>
											<option value="Criminal matter">Criminal matter</option>
											<option value="Civil matter">Civil matter</option>
											<option value="Writ Jurisdiction">Writ Jurisdiction</option>
											<option value="Company law">Company law</option>
											<option value="Contract law">Contract law</option>
											<option value="Commercial matter">Commercial matter</option>
											<option value="Construction law">Construction law</option>
											<option value="Information Technology">Information Technology</option>
											<option value="Family Law">Family Law</option>
											<option value="Religious Matter">Religious Matter</option>
											<option value="Investment Matter">Investment Matter</option>
											<option value="Labour Law">Labour Law</option>
											<option value="Property Law">Property Law</option>
											<option value="Taxation Matter">Taxation Matter</option>
											<option value="Others">Others</option>
										</select>
									</div>
									<div class="form-group col-md-2">	
										<select id="case3" name="case3" class="form-control">
											<option value=" " selected>Case 3</option>
											<option value="Criminal matter">Criminal matter</option>
											<option value="Civil matter">Civil matter</option>
											<option value="Writ Jurisdiction">Writ Jurisdiction</option>
											<option value="Company law">Company law</option>
											<option value="Contract law">Contract law</option>
											<option value="Commercial matter">Commercial matter</option>
											<option value="Construction law">Construction law</option>
											<option value="Information Technology">Information Technology</option>
											<option value="Family Law">Family Law</option>
											<option value="Religious Matter">Religious Matter</option>
											<option value="Investment Matter">Investment Matter</option>
											<option value="Labour Law">Labour Law</option>
											<option value="Property Law">Property Law</option>
											<option value="Taxation Matter">Taxation Matter</option>
											<option value="Others">Others</option>
										</select>
									</div>
									<div class="form-group col-md-2">	
										<select id="case4" name="case4" class="form-control">
											<option value=" " selected>Case 4</option>
											<option value="Criminal matter">Criminal matter</option>
											<option value="Civil matter">Civil matter</option>
											<option value="Writ Jurisdiction">Writ Jurisdiction</option>
											<option value="Company law">Company law</option>
											<option value="Contract law">Contract law</option>
											<option value="Commercial matter">Commercial matter</option>
											<option value="Construction law">Construction law</option>
											<option value="Information Technology">Information Technology</option>
											<option value="Family Law">Family Law</option>
											<option value="Religious Matter">Religious Matter</option>
											<option value="Investment Matter">Investment Matter</option>
											<option value="Labour Law">Labour Law</option>
											<option value="Property Law">Property Law</option>
											<option value="Taxation Matter">Taxation Matter</option>
											<option value="Others">Others</option>
										</select>
									</div>
									<div class="form-group col-md-3">	
										<select id="case5" name="case5" class="form-control">
											<option value=" " selected>Case 5</option>
											<option value="Criminal matter">Criminal matter</option>
											<option value="Civil matter">Civil matter</option>
											<option value="Writ Jurisdiction">Writ Jurisdiction</option>
											<option value="Company law">Company law</option>
											<option value="Contract law">Contract law</option>
											<option value="Commercial matter">Commercial matter</option>
											<option value="Construction law">Construction law</option>
											<option value="Information Technology">Information Technology</option>
											<option value="Family Law">Family Law</option>
											<option value="Religious Matter">Religious Matter</option>
											<option value="Investment Matter">Investment Matter</option>
											<option value="Labour Law">Labour Law</option>
											<option value="Property Law">Property Law</option>
											<option value="Taxation Matter">Taxation Matter</option>
											<option value="Others">Others</option>
										</select>
									</div>
								</div>-->

							<div class="form-group">
								<!--a lawyer can choose 5 category at max-->
								<div>
									<label for="speciality">Types of case handle</label>
								</div>	
								<div class="form-check form-check-inline col-md-4">
									<input class="form-check-input" type="checkbox" name="case_handle[]"  value="Criminal matter" id="crime">
									<label class="form-check-label" for="crime">
										Criminal matter
									</label>
								</div>
								<div class="form-check form-check-inline col-md-3">
									<input class="form-check-input" type="checkbox"  name="case_handle[]" value="Civil matter" id="civil">
									<label class="form-check-label" for="civil">
										Civil matter
									</label>
								</div>
								<div class="form-check form-check-inline ">
									<input class="form-check-input" type="checkbox"  name="case_handle[]" value="Writ Jurisdiction" id="civil">
									<label class="form-check-label" for="civil">
										Writ Jurisdiction
									</label>
								</div>
								<div class="form-check form-check-inline col-md-4 ">
									<input class="form-check-input" type="checkbox" name="case_handle[]"  value="Taxation Matter" id="tax">
									<label class="form-check-label"  for="tax">
										Taxation Matter
									</label>
								</div>
								
								<div class="form-check form-check-inline col-md-3">
									<input class="form-check-input" type="checkbox"  name="case_handle[]" value="Contract law" id="con">
									<label class="form-check-label"  for="con">
										Contract law
									</label>
								</div>
								<div class="form-check form-check-inline col-md-4">
									<input class="form-check-input" type="checkbox"  name="case_handle[]" value="Commercial matter" id="comm">
									<label class="form-check-label" for="comm">
										Commercial matter
									</label>
								</div>
								<div class="form-check form-check-inline col-md-4">
									<input class="form-check-input" type="checkbox" name="case_handle[]" value="Construction law" id="cons">
									<label class="form-check-label" for="cons">
										Construction law
									</label>
								</div>
								
								<div class="form-check form-check-inline col-md-3">
									<input class="form-check-input" type="checkbox" name="case_handle[]"  value="Family Law" id="fam">
									<label class="form-check-label" for="fam">
										Family Law
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="case_handle[]" value="Information Technology" id="it">
									<label class="form-check-label"  for="it">
										Cyber Law
									</label>
								</div>
								<div class="form-check form-check-inline col-md-4">
									<input class="form-check-input" type="checkbox" name="case_handle[]"  value="Investment Matter" id="inv">
									<label class="form-check-label" for="inv">
										Investment Matter
									</label>
								</div>
								
								
								<div class="form-check form-check-inline col-md-3">
									<input class="form-check-input" type="checkbox" name="case_handle[]" value="Labour Law" id="lab">
									<label class="form-check-label" for="lab">
										Labour Law
									</label>
								</div>
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="case_handle[]"  value="Property Law" id="prop">
									<label class="form-check-label" value="Labour Law" for="prop">
										Property Law
									</label>
								</div>
								<div class="form-check form-check-inline col-md-4">
									<input class="form-check-input" type="checkbox" name="case_handle[]"  value="Religious Matter" id="rel">
									<label class="form-check-label"  for="rel">
										Religious Matter
									</label>
								</div>
								<div class="form-check form-check-inline col-md-3">
									<input class="form-check-input" type="checkbox"  name="case_handle[]" value="Company law" id="com">
									<label class="form-check-label" for="com">
										Company law
									</label>
								</div>
								
								<div class="form-check form-check-inline">
									<input class="form-check-input" type="checkbox" name="case_handle[]"  value="Others" id="oth">
									<label class="form-check-label"  for="oth">
										Others
									</label>
								</div>
							</div>
							<div class="form-group">
							<label for="type">Case Type</label>
							<select id="speciality" name="speciality" class="form-control">
								<option value="select">Select</option>
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
							<div class="form-row">
								<div class="form-group col-md-4">  
									<label for="num">Image</label>
									<input type="file" class="form-control" name="fileToUpload" id="image" oninput="CheckValue(this);"  >
								</div>
								<div class="form-group col-md-4">
									<label for="num">Aadhar</label>
									<input type="file" class="form-control" name="fileToUploads" id="aadhar" oninput="CheckValue(this);"  >
								</div>
								<div class="form-group col-md-4">
									<label for="num">Certificate</label>
									<input type="file" class="form-control" name="cert" id="cert" oninput="CheckValue(this);"  >
								</div>
							</div>
							<div class="form-group">
								<div class="form-check">

									<input id="accept" name="agree" type="checkbox" value="y" /><strong>I Agree with terms & conditions </strong>
								</div>
							</div>
							<input name="post" type="submit" class="btn btn-block btn-success" value="Register" />
							<!--after signup redirect lawyer dashboard page-->
						</form>
					</div>
				</div>
			</div>
		</section>
		<footer>
			<div class="container">
				<div class="row">
					<div class="col">
						
					</div>
				</div>
			</div>
		</footer>



		<!-- Optional JavaScript -->
		<!-- jQuery -->

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
					first_Name: {
						validators: {
						notEmpty: {
							message: 'Please Enter your First name'
						},
						regexp: {
                        	regexp: /^[a-zA-Z.\.]+$/,
                        	message: 'The username can only consist of letters'
                    }
					}
					},
					last_Name: {
						validators: {
						notEmpty: {
							message: 'Please Enter your First name'
						},
						regexp: {
                        	regexp: /^[a-zA-Z.\.]+$/,
                        	message: 'The username can only consist of letters'
                    }
					}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Please Enter your email address'
							},
							emailAddress: {
								message: 'Please Enter a valid email address'
							}
						}
					},
					contact_number: {
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
					fileToUpload: {
						validators: {
							notEmpty: {
								message: 'Please Upload Your Image'
							}
						}
					},
					fileToUploads: {
						validators: {
							notEmpty: {
								message: 'Please Upload Your aadhar'
							}
						}
					},
					fileToUploadss: {
						validators: {
							notEmpty: {
								message: 'Please Upload Your valid certificate'
							}
						}
					},
					university_College: {
						validators: {
							notEmpty: {
								message: 'Please Enter Your University or College'
							}
						}
					},
					degree: {
						validators: {
							notEmpty: {
								message: 'Choose your Degree'
							}
						}
					},
					passing_year: {
						validators: {
							notEmpty: {
								message: 'Choose Passing Year'
							}
						}
					},
					full_address: {
						validators: {
							notEmpty: {
								message: 'Please enter address'
							}
						}
					},
					zip_code: {
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
					},
					city: {
						validators: {
							notEmpty: {
								message: 'Choose your user City'
							}
						}
					},
					agree: {
						validators: {
							notEmpty: {
								message: 'Please Check Terms & Conditions is required'
							}
						}
					},
					practise_Length: {
						validators: {
							notEmpty: {
								message: 'Choose your Practise Length'
							}
						}
					},
					case1: {
						validators: {
							notEmpty: {
								message: 'Please Select case of case handle'
							}
						}
					},
					speciality: {
						validators: {
							notEmpty: {
								message: 'Choose your Speciality'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Please enter password'
							},
							stringLength: {
								min: 8,
								max: 15,
								message: 'password must be atleast 8 and atmost 15 characters '
							}
						}
					}
				}
			});

		</script>

	</body>
</html>
