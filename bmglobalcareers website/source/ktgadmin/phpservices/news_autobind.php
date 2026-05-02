<?php
header('Access-Control-Allow-Origin: *');
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$sql= "SELECT *,date_format(news_date,'%m/%d/%Y') as news_date FROM tbl_news where news_id='".$_POST['news_id']."'";
	
$exec_query=mysqli_query($conn, $sql);

$fetch=mysqli_fetch_array($exec_query);

$title=str_replace("^","'",$fetch['title']);
$description=str_replace("^","'",$fetch['descp']);
$news_date=str_replace("^","'",$fetch['news_date']);

$json = array("title" =>$title,"description" =>$description,"news_date" =>$news_date);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json); 
				
?>