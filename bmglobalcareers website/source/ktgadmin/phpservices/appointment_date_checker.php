<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	


$appoint_date=date('Y-m-d',strtotime($_POST['appoint_date']));

$sql= "SELECT * FROM `tbl_disabled_dates` WHERE disabled_date = '$appoint_date' AND delete_status ='NDL'";
$exec_query=mysqli_query($conn, $sql);
$fetch_sql=mysqli_fetch_array($exec_query);

if($fetch_sql['id'] > 0){
	$result['description']=str_replace("^","'",$fetch_sql['description']);
	$result['appoint_date_valid']= FALSE;
}
else
{
	$result['appoint_date_valid']= TRUE;
}


$json = array("op" =>$result);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json); 
				
?>