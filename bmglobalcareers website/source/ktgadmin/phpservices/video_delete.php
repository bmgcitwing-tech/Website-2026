<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$sql= "update tbl_videos_details set delete_status='0', deleted_by='".$log."',deleted_date='".date('Y-m-d H:i:s')."' where vcat_dt_id='".$_POST['delid']."'";
	
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