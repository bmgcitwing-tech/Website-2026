<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$cname=str_replace("'","^",$_POST['cname']);
$cemail=str_replace("'","^",$_POST['cemail']);
$mblno=str_replace("'","^",$_POST['mblno']);
$addr=str_replace("'","^",$_POST['addr']);
$pcode=str_replace("'","^",$_POST['pcode']);
$city=str_replace("'","^",$_POST['city']);
$state=str_replace("'","^",$_POST['state']);
$uname=str_replace("'","^",$_POST['uname']);
$pass=str_replace("'","^",$_POST['pass']);


$sql= "update tbl_admin set company_email='".$cemail."', company_name='".$cname."',mbl_no='".$mblno."',state='".$state."',postal_code='".$pcode."',address='".$addr."',city='".$city."',uname='".$uname."',pass='".$pass."' where admin_id='1'";
	
$exec_query=mysqli_query($conn, $sql);

if($exec_query){
	$result=1;
}
else
{
	$result=0;	
}


$json = array("op" =>$result);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json); 
				
?>