<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	


$disabled_date=str_replace("'","^",$_POST['disabled_date']);
$description=str_replace("'","^",$_POST['description']);
$sql= "update  tbl_disabled_dates set disabled_date='".$disabled_date."',description='".$description."',  updated_by='".$log."',update_date='".date('Y-m-d H:i:s')."' where id='".$_POST['id']."'";
	
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