<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	


$link=str_replace("'","^",$_POST['link']);
$description=str_replace("'","^",$_POST['finaldescp']);

$sql= "update  tbl_appointment_link set link='".$link."',description='".$description."' where id='1'";
	
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