<header>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
	
	<script>
		function MySucessFn(){
			swal({
				title: "Dera User...Booking Details Saved Sucessfully",
				text: "",
				type: "success",
				
				showConfirmButton: true,
			},
			window.load = function(){
				window.location='http://localhost/lawyermanagementsystem-main/index.php';
			});
		}
	</script>
</header>
<?php
	include_once 'db_con/dbCon.php';
	
	$okFlag = TRUE;
	if($okFlag){
		
$con =mysqli_connect("localhost","root","","lawyermanagement");
$case_num = $_POST['case_num'];
$client = $_POST['client'];
$lawyer = $_POST['lawyer'];
$court = $_POST['court'];
$fdate = $_POST['fdate'];
$ctype = $_POST['ctype'];
$sub = $_POST['sub'];
$status = $_POST['status'];
$facts=$_POST['facts'];
$evidence=$_POST['evidence'];
$witness=$_POST['witness'];
$act = $_POST['act'];
$booking_id = $_POST['booking_id'];


$op_id = uniqid("opp");
$fname = $_POST['name'];
$color = $_POST['color'];
$gender = $_POST['gender'];
$age = $_POST['age'];
$caste = $_POST['caste'];
$religion = $_POST['religion'];
$occ = $_POST['occ'];
$addr = $_POST['addr'];
$city = $_POST['city'];
$pin = $_POST['pin'];
$phn = $_POST['phn'];
$alt = $_POST['alt'];

$p_id = uniqid("pid");
$client = $_POST['client'];
$lawyer = $_POST['lawyer'];
$pname = $_POST['pname'];
$paddr = $_POST['paddr'];
$ploc = $_POST['ploc'];
$pin = $_POST['pin'];
$odate = $_POST['odate'];
$cdate = $_POST['cdate'];
$ftype = $_POST['ftype'];
$fno = $_POST['fno'];
$off1=$_POST['off1'];
$off2=$_POST['off2'];
$num=$_POST['num'];
$alt = $_POST['alt'];

$query1="insert into case_details(case_num,client_id,lawyer_id,op_id,court,filing_date,ctype,sub,status,statement,evidence,witness,act,booking_id)
        values('$case_num','$client','$lawyer','$op_id','$court','$fdate','$ctype','$sub','$status','$facts','$evidence','$witness','$act','$booking_id')";
        echo $query1;
        $res1 = mysqli_query($con, $query1);
        
        if($res1)


 {
    $query="insert into opponent (op_id,case_num,client_id,lawyer_id,op_name,relation,op_gender,op_age,op_caste,op_religion,op_occu,op_add,op_city,op_pin,op_contact,op_alt)
    values('$op_id','$case_num','$client','$lawyer','$fname','$color','$gender','$age','$caste','$religion','$occ','$addr','$city','$pin','$phn','$alt')";
    echo $query;
    $res = mysqli_query($con, $query);
    
    if($res)
        
        {
            $query3 = "insert into station (p_id,client_id,lawyer_id,case_num,name,address,location,pincode,o_date,c_date,firtype,firno,officer1,officer2,contact,alt_phn)
            values ('$p_id','$client','$lawyer','$case_num','$pname','$paddr','$ploc','$pin','$odate','$cdate','$ftype','$fno','$off1','$off2','$num','$alt')";
            echo $query3;
            $res3 = mysqli_query($con, $query3);
            
            if($res3)
            {
			echo"<script type='text/javascript'>alert('inserted Successfully!');</script>";
			echo "<script type='text/javascript'>
					 window.location.href = 'case_report.php';
				 </script>";
             }
             else {
                  echo"<script type='text/javascript'>alert('Error');</script>"; 
            }
        }
        else {
             echo"<script type='text/javascript'>alert('Error');</script>"; 
        }
}
else {
    echo"<script type='text/javascript'>alert('Error');</script>"; 
 }
		
    }	
	
?>