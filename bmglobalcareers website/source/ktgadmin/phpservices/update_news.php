<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

if($_POST['photo_new_name']!=''){
	$final_dest='../userdata/images/news';
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
$descp=str_replace("'","^",$_POST['finaldescp']);
$news_date=date('Y-m-d',strtotime($_POST['news_date']));
$send_notification=str_replace("'","^",$_POST['send_notification']);

$sql= "update tbl_news set title='".$title."',imgname='".$photo."',send_notification='".$send_notification."',descp='".$descp."',news_date='".$news_date."', updated_by='".$log."',update_date='".date('Y-m-d H:i:s')."' where news_id='".$_POST['news_id']."'";
	
$exec_query=mysqli_query($conn, $sql);

if($exec_query){
	$result=1;
	if($send_notification==1){
		$notiTitle= "LATESTNEWS"."-".$title."";
		$notiMessage =$descp;
	
		$sql_insert_notification= "INSERT INTO  tbl_notification (notication_title,notication_descp,created_by,create_date) VALUES('".$notiTitle."','".$notiMessage."','".$log."','".date('Y-m-d H:i:s')."')";
		
		$exec_query_notification=mysqli_query($conn, $sql_insert_notification);
		$notification_id=$conn->insert_id;
	
	
		$sql_member="SELECT * FROM `tbl_mem_personal_mbl_details` where delete_status='NDL' and user_key!=''";
		$query_member=mysqli_query($conn,$sql_member) ;
		$result_member=array();
		while($row_member=mysqli_fetch_array($query_member)){
	
	
			$token = $row_member['user_key'];		
			$notiTitle= "LATESTNEWS"."-".$title."";
			$notiMessage =$descp;
	
	
	
			$sql_notification_details= "INSERT INTO  tbl_notification_details (notification_id,mem_id,created_by,create_date) VALUES('".$notification_id."','".$row_member['mem_id']."','".$log."','".date('Y-m-d H:i:s')."')";
		
			$exec_details=mysqli_query($conn, $sql_notification_details);
	
			sendNotification($notiTitle, $notiMessage, $token);
		}
	 }
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