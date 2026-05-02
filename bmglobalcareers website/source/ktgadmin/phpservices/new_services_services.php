<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$bannerData=array();
$sql="select * from tbl_services where id='".$_REQUEST['prod_id']."'";
$exec_sql=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($exec_sql);

$bannerData[]=str_replace("^","'",$rows);		


$json = array("op" =>$bannerData);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json); 
				
?>