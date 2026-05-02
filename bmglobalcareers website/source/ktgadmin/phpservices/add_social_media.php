<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$final_dest='../userdata/images/social_media';
 if(is_dir( $final_dest)==FALSE){
	mkdir($final_dest,0777,TRUE);
}
copy('../temp/'.$_POST['photo_name'],$final_dest.'/'.$_POST['photo_name']);

$title=str_replace("'","^",$_POST['title']);
// $year=str_replace("'","^",$_POST['year']);
$link=$_POST['link'];

 $sql= "INSERT INTO  tbl_social_media (title,imgname,link,created_by,create_date) VALUES('".$title."','".$_POST['photo_name']."','".$link."','".$log."','".date('Y-m-d H:i:s')."')";
	
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