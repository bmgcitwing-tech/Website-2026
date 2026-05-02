<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	


$center_id=str_replace("'","^",$_POST['center_id']);
$duration=str_replace("'","^",$_POST['duration']);
$timiings=str_replace("'","^",$_POST['timiings']);
$sql= "INSERT INTO  tbl_counselling_centers_timings (center_id,duration,timiings,created_by,create_date) VALUES('".$center_id."','".$duration."','".$timiings."','".$log."','".date('Y-m-d H:i:s')."')";
	
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