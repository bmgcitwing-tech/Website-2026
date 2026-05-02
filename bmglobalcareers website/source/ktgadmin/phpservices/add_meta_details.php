<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	


$title=str_replace("'","^",$_POST['title']);
$description=str_replace("'","^",$_POST['description']);
$sql= "INSERT INTO  tbl_meta_details (title,description,created_by,create_date) VALUES('".$title."','".$description."','".$log."','".date('Y-m-d H:i:s')."')";
	
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