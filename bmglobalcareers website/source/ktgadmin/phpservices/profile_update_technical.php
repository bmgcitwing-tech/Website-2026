<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$smsusername=str_replace("'","^",$_POST['smsusername']);
$smspassword=str_replace("'","^",$_POST['smspassword']);

if(isset($_REQUEST['smsenable'])){
	$smsenable = $_REQUEST['smsenable'];
}else
	$smsenable =0;


$sql= "update tbl_admin set smsenable='".$smsenable."',smsusername='".$smsusername."',smspassword='".$smspassword."' where admin_id='1'";
	
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