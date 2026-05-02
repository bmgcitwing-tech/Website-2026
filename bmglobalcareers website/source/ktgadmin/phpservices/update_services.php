<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	


$title=str_replace("'","^",$_POST['title']);
$description=str_replace("'","^",$_POST['finaldescp']);
$short_description=str_replace("'","^",$_POST['short_description']);
$sql= "update  tbl_services set title='".$title."',description='".$description."',short_description='".$short_description."' where id='1'";
	
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