<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$final_dest='../userdata/images/banner';
 if(is_dir( $final_dest)==FALSE){
	mkdir($final_dest,0777,TRUE);
}
copy('../temp/'.$_POST['photo_name'],$final_dest.'/'.$_POST['photo_name']);

$title= date("Y-m-d", strtotime($_POST['block_date']));
$description=str_replace("'","^",$_POST['description']);
$sql= "INSERT INTO  tbl_appointment_block (block_date,created_by,create_date) VALUES('".$title."','".$log."','".date('Y-m-d H:i:s')."')";
	
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