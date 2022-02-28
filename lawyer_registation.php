<header>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
	
	<script>
		function MySucessFn(){
			swal({
				title: "Dear Lawyer...Your Registration Sucessfully Complete! Please Wait for Approval",
				text: "",
				type: "success",
				
				showConfirmButton: true,
			},
			window.load = function(){
				window.location='http://localhost/lawyermanagementsystem-main/login.php';
			});
		}
		function MyCheckFn(){
			swal({
				title: "Sorry Lawyer!! This Email already exists..Please Fill up the form again",
				text: "",
				type: "warning",
				
				showConfirmButton: true,
			},
			window.load = function(){
				window.location='http://localhost/lawyermanagementsystem-main/lawyer_register.php';
			});
		}
	</script>
</header>
<?php
	include_once 'db_con/dbCon.php';
	
	$okFlag = TRUE;
	if($okFlag){
		
		if(isset($_FILES["fileToUpload"]["name"]) && $_FILES["fileToUpload"]["name"] != ''){
			//echo 123;exit;
			$target_dir = "images/upload/";
			$newName = date('YmdHis_');
			$newName .= basename($_FILES["fileToUpload"]["name"]);
			$target_file = $target_dir . $newName;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
				} else {
				$uploadOk = 0;
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 5000000) {
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$uploadOk = 0;
			}
			
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$checkFlag = FALSE;
				// if everything is ok, try to upload file
				} else {
				if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
					} else {
					$checkFlag = FALSE;
				}
			}
			//echo $newName;exit;
			}else{
			$newName = $_POST['image'];
			//echo $newName;exit;
		}
		if(isset($_FILES["fileToUploads"]["name"]) && $_FILES["fileToUploads"]["name"] != ''){
			//echo 123;exit;
			$target_dir = "images/upload/";
			$n = date('YmdHis_');
			$n .= basename($_FILES["fileToUploads"]["name"]);
			$target_file = $target_dir . $n;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["fileToUploads"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
				} else {
				$uploadOk = 0;
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUploads"]["size"] > 5000000) {
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$uploadOk = 0;
			}
			
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$checkFlag = FALSE;
				// if everything is ok, try to upload file
				} else {
				if(move_uploaded_file($_FILES["fileToUploads"]["tmp_name"], $target_file)) {
					} else {
					$checkFlag = FALSE;
				}
			}
			//echo $newName;exit;
			}else{
			$n = $_POST['aadhar'];
		    echo $n;exit;
		}
		if(isset($_FILES["cert"]["name"]) && $_FILES["cert"]["name"] != ''){
			//echo 123;exit;
			$target_dir = "images/upload/";
			$cert = date('YmdHis_');
			$cert .= basename($_FILES["cert"]["name"]);
			$target_file = $target_dir . $cert;
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			$check = getimagesize($_FILES["cert"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
				} else {
				$uploadOk = 0;
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["cert"]["size"] > 5000000) {
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				$uploadOk = 0;
			}
			
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$checkFlag = FALSE;
				// if everything is ok, try to upload file
				} else {
				if(move_uploaded_file($_FILES["cert"]["tmp_name"], $target_file)) {
					} else {
					$checkFlag = FALSE;
				}
			}
			//echo $newName;exit;
			}else{
			$cert = $_POST['cert'];
		    echo $cert;exit;
		}
		
		$u_id = $_REQUEST['enum'];
		$first_Name = $_REQUEST['first_Name'];
		$last_Name = $_REQUEST['last_Name'];
		$contact_Number = $_REQUEST['contact_number'];
		$email = $_REQUEST['email'];
		$university_College = $_REQUEST['university_College'];
		$degree = $_REQUEST['degree'];
		$full_address = $_REQUEST['full_address'];
		$city = $_REQUEST['city'];
		$zip_code = $_REQUEST['zip_code'];
		$passing_year = $_REQUEST['passing_year'];
		$practise_Length = $_REQUEST['practise_Length'];
		#$case1 = $_REQUEST['case1'];
		#$case2 = $_REQUEST['case2'];
		#$case3 = $_REQUEST['case3'];
		#$case4 = $_REQUEST['case4'];
		#$case5 = $_REQUEST['case5'];
		$court = $_REQUEST['court'];
		$case_handle = $_POST['case_handle'];
		$chk="";  
		foreach($case_handle as $chk1)  
		{  
			$chk .= $chk1.",";  
			echo $chk1;
		}
		
		$speciality = $_REQUEST['speciality'];
		
		$password = $_REQUEST['password'];
		
		include 'send_mail_lawyer.php';
		
		$conn = connect();
		//Check duplicate value
        $duplicate=mysqli_query($conn,"select * from user where email='$email'");
        if (mysqli_num_rows($duplicate)>0)
        {
			echo "<script type= 'text/javascript'>MyCheckFn();</script>";
			//echo "Duplicate";
		}
        else
        {
            // sql query for inserting data into database
            $sql = "INSERT INTO `user` (`u_id`,`first_Name`, `last_Name`, `email`, `password`, `status`, `role`) 
			VALUES ('$u_id','$first_Name', '$last_Name', '$email ', '$password ', 'Pending', 'Lawyer')";
          //echo $sql;exit;
		   $result=mysqli_query($conn, $sql) or die(mysqli_error ($conn));
            if($result==1)
            {
                $sql2= "INSERT INTO lawyer(lawyer_id,contact_Number,university_College,degree,passing_year,full_address,city,zip_code,practise_Length,case_handle,speciality,image,aadhar,court,cert) 
				VALUES ('$u_id','$contact_Number','$university_College','$degree','$passing_year','$full_address','$city','$zip_code','$practise_Length','$chk','$speciality','$newName','$n','$court','$cert')";
				
                $result2=mysqli_query($conn, $sql2) or die(mysqli_error ($conn));
                if ($result2==1)
                {
                    echo "<script type= 'text/javascript'>MySucessFn();</script>";
					
				}
			}
		}
	}
?>