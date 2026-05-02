<?php
header('Access-Control-Allow-Origin: *');
include_once("connection.php");	
	
	$sql = "select active_status from tbl_mem_personal_details where mem_id='".$_POST['statusid']."'";
    $exec_query = mysqli_query($conn,$sql);
	$fetch=mysqli_fetch_array($exec_query);
	$status=$fetch['active_status'];
	if($status=='Y'){
		$sql1 = "update tbl_mem_personal_details set active_status='N' where mem_id='".$_POST['statusid']."'";
		$exec_query1 = mysqli_query($conn,$sql1);
	}
	else if($status=='N'){
		$sql1 = "update tbl_mem_personal_details set active_status='Y' where mem_id='".$_POST['statusid']."'";
		$exec_query1 = mysqli_query($conn,$sql1);
	}
	
	if($exec_query1){
		$result=1;
	}
	else{
		$result=0;
	}
	
$json = array("op" =>$result);
header("Content-Type: application/json",true);
echo json_encode($json); 	
	
?>