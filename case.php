<?php
	session_start();
	$name=$_GET['name'];	
    $bk=$_GET['bk'];
	#$d=$_GET['d'];
	#$a=$_SESSION['lawyer_id'];
	#$des=$_GET['des'];
	#$u=$_GET['u'];
	#print($a);
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
							<a href="update_password_admin.php" class="list-group-item list-group-item-action bg-light">Update Password</a>
						</div>
					</div>
           </body>
        <body>
        <section class="bgwhite p-t-66 p-b-60">
		<div class="container">
			<div class="row">
				
            <form action="" method="post">
				<div class="col-md-12 p-b-80">
				<table class= "table" border="1">
				<thead>
                <?php
												include_once 'db_con/dbCon.php';
												$a=$_SESSION['lawyer_id'];
												$conn = connect();
												$result = mysqli_query($conn,"SELECT booking_id,case_type FROM booking WHERE booking_id='$bk'");
												$counter = 0;
												while($row = mysqli_fetch_array($result)) {
                                                    
												?>
                <tr>
				<th style="text-align:center">Case number</th>
				<td><input type="text" name="etime" required></td>
				</tr>
				<tr>
				<th style="text-align:center">Client name</th>
				<td><input type="text" name="cl" value="<?php echo $name; ?>"></td>
				</tr>
				<tr>
				<th style="text-align:center">Lawyer name</th>
				<td><input type="text" name="lwy" value="<?php echo $_SESSION['first_Name'];?> <?php echo $_SESSION['last_Name'];?>"></td>
				</tr>
				<tr>
				<div class="form-group">
								<th><label for="practise">Case Type</label></th>
								<td><select id="practise" name="spec"  class="form-control">
                                
									<option value=" " selected>Choose...</option>
									<option value="Criminal Law" <?php if($row['case_type'] == "Criminal Law") echo "selected"; ?>>Criminal law</option>
									<option value="Civil Law" <?php if($row['case_type'] == "Civil Law") echo "selected"; ?>>Civil law</option>
									<option value="Writ Jurisdiction" <?php if($row['case_type'] == "Writ Jurisdiction") echo "selected"; ?>>Writ Jurisdiction</option>
									<option value="Company Law" <?php if($row['case_type'] == "Company Law") echo "selected"; ?>>Company law</option>
									<option value="Contract Law" <?php if($row['case_type'] == "Contract Law") echo "selected"; ?>>Contract law</option>
									<option value="Commercial Law" <?php if($row['case_type'] == "Commercial Law") echo "selected"; ?>>Commercial law</option>
									<option value="Construction Law" <?php if($row['case_type'] == "Construction Law") echo "selected"; ?>>Construction law</option>
									<option value="IT Law" <?php if($row['case_type'] == "IT Law") echo "selected"; ?>>IT law</option>
									<option value="Family Law" <?php if($row['case_type'] == "Family Law") echo "selected"; ?>>Family law</option>
									<option value="Religious Law" <?php if($row['case_type'] == "Religious Law") echo "selected"; ?>>Religious law</option>
									<option value="Investment Law" <?php if($row['case_type'] == "Investment Law") echo "selected"; ?>>Investment law</option>
									<option value="Labour Law" <?php if($row['case_type'] == "Labour Law") echo "selected"; ?>>Labour law</option>
									<option value="Property Law" <?php if($row['case_type'] == "Property Law") echo "selected"; ?>>Property law</option>
									<option value="Taxation Law" <?php if($row['case_type'] == "Taxation Law") echo "selected"; ?>>Taxation law</option>

								</select></td>
							</div>
							</tr>
				
				<tr>
				<th style="text-align:center">Facts</th>
				<td><textarea name="facts" id="" cols="20" rows="4" placeholder="Details needed"></textarea></td>
				</tr>
                <tr>
				<th style="text-align:center">Date</th>
				<td><input type="date" name="etime" required></td>
				</tr>
                <tr>
				<th style="text-align:center">Action</th>
				<td><input type="text" name="etime" required></td>
				</tr>
				<!--<tr>
				<th style="text-align:center">Details needed</th>
				<td><textarea name="descrp" id="" cols="20" rows="4" placeholder="Details needed"></textarea></td>
				</tr> -->
				
                <tr><th colspan="2"style="text-align:center"><input type="submit" value="Submit" name="submit"></th></tr>
				</thead>
                                </table>
                                </div>
            </form>
            <?php
													}
												?>
                                
				</thead>
                                </table>
                                </div>
                            </form>
     
        </body>
    </body>
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
$spec=$_POST["spec"];
//$descrp=$_POST["descrp"];
$u_id = $_POST['u_id'];
$lawyer_id = $_POST['lawyer_id'];
//$booking_id = $_POST["booking_id"];
 $query="update booking set time='$etime' , amount ='$amt' , case_type = '$spec' where client_id='$u' and lawyer_id='$a' and description='$des'";  

$res = mysqli_query($con, $query);
if($res)
    {
    echo"<script type='text/javascript'>alert('Updated Successfully!');</script>";
   echo "<script type='text/javascript'>
            window.location.href = 'lawyer_booking.php';
        </script>";
}
 else {
   echo"<script type='text/javascript'>alert('Error');</script>"; 
}
}
 ?>

    
</html>

<?php
				
}else 
header('location:login.php?deactivate');
?>	



	<!-- Footer -->





	<!-- Footer -->
