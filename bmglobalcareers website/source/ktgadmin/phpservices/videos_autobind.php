<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$sql= "SELECT * FROM  tbl_videos_details where vcat_dt_id='".$_POST['vcat_dt_id']."'";
	
$exec_query=mysqli_query($conn, $sql);

$fetch=mysqli_fetch_array($exec_query);
$title=str_replace("^","'",$fetch['title']);
$link=str_replace("^","'",$fetch['url']);
$vcat_id=str_replace("^","'",$fetch['vcat_id']);


$json = array("title" =>$title,"link" =>$link,"vcat_id" =>$vcat_id);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json); 
				
?>