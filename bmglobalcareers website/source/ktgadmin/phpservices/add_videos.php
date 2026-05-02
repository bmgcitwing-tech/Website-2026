<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$title=str_replace("'","^",$_POST['title']);
$link=str_replace("'","^",$_POST['link']);
$cat_id=str_replace("'","^",$_POST['cat_id']);
// $send_notification=str_replace("'","^",$_POST['send_notification']);

  $sql= "INSERT INTO  tbl_videos_details (title,cat_id,url,created_by,create_date) VALUES('".$title."','".$cat_id."','".$link."','".$log."','".date('Y-m-d H:i:s')."')";
	
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