<?php
	session_start();
    $case_num = $_GET['case_num'];
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
											<a class="nav-link cus-a" href="#">Home <span class="sr-only">(current)</span></a>
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
							<!--<a href="admin_user.php" class="list-group-item list-group-item-action bg-light">See Users</a>admin_user page-->
                            <a href="court.php" class="list-group-item list-group-item-action bg-light">Add Court</a><!--admin_user page-->
							<a href="casetype.php" class="list-group-item list-group-item-action bg-light">Case Category</a><!--admin_user page-->
						</div>
					</div>
				
					<!-- /#sidebar-wrapper -->
					
					<section class="payment"><br>
		<div class=" container bg-light text-dark">
			
			<table class="table table-hover table-responsive">
											<thead>
												<tr>
													<th scope="col">Result</th>
													<th scope="col">Details</th>
													<th scope="col">Next hearing date</th>
													<th scope="col">Hearing count</th>
													<th></th>
													
													
												</tr>
											</thead>
												<?php
												include_once 'db_con/dbCon.php';
												
												$conn = connect();
												$result = mysqli_query($conn,"SELECT * from result where case_num='$case_num'
												");
												$counter = 0;
												while($row = mysqli_fetch_array($result)) {
													
													
												?>
					
			
				<tbody>
           						 <form action="" method="post">
									<input type="hidden" name="case_num"  value="<?php echo $case_num; ?>">
									
									<tr><td>
										
										<select id="result" name="result" class="form-control" onchange='CheckColors(this.value);'>
                                                                                        <option><?php echo $row['result'];?></option>
																						<option>Win</option>
                                                                                        <option>Lose</option>
																						<option>postponed</option>
                                                                                    </select>
									</td>
									<td>
										
										<input type="text" class="form-control" name="details" value="<?php echo $row['details'];?>">
									</td>
									<td>
										<input class="form-control" type="date" name="hdate" value="<?php echo $row['hdate'];?>" >
									</td>
									<td>
										<input class="form-control" type="text" name="num" value="<?php echo $row['num'];?>" >
									</td>
									
												 
									
									
				
            					</form>
												</tbody>
							<?php } ?>
												</table>				
			
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
<script type="text/javascript">
function CheckColors(val){
 var element=document.getElementById('color');
 if(val=='pick a color'||val=='others')
   element.style.display='block';
 else  
   element.style.display='none';
}

</script> 																			