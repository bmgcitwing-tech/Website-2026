<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

if($_POST['photo_new_name']!=''){
	$final_dest='../userdata/images/about';
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
$description=str_replace("'","^",$_POST['finaldescp']);
$short_description=str_replace("'","^",$_POST['short_description']);
$sql= "update  tbl_about set title='".$title."',description='".$description."',short_description='".$short_description."' ,imgname='".$photo."' where id='1'";
	
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