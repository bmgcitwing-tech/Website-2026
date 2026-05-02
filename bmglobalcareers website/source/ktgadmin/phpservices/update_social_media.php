<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

if($_POST['photo_new_name']!=''){
	$final_dest='../userdata/images/social_media';
	 if(is_dir( $final_dest)==FALSE){
		mkdir($final_dest,0777,TRUE);
	}
	copy('../temp/'.$_POST['photo_new_name'],$final_dest.'/'.$_POST['photo_new_name']);
	$photo=$_POST['photo_new_name']	;
}
else if($_POST['photo_new_name']==''){
	$photo=$_POST['photo_old_name']	;
}

$title=str_replace("'","^",$_POST['title']);
$link=$_POST['link'];

$sql= "update  tbl_social_media set title='".$title."', link='".$link."',imgname='".$photo."', updated_by='".$log."',update_date='".date('Y-m-d H:i:s')."' where social_media_id='".$_POST['social_media_id']."'";
	
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