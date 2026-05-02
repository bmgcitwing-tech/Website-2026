<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$title=str_replace("'","^",$_POST['title']);
$link=str_replace("'","^",$_POST['link']);
$cat_id=str_replace("'","^",$_POST['cat_id']);

// $send_notification=str_replace("'","^",$_POST['send_notification']);

$sql= "update  tbl_videos_details set title='".$title."',cat_id='".$cat_id."',url='".$link."', updated_by='".$log."',update_date='".date('Y-m-d H:i:s')."' where vcat_dt_id='".$_POST['vcat_dt_id']."'";
	
$exec_query=mysqli_query($conn, $sql);

if($exec_query){
	$result=1;
	}
else
{
	$result=0;	
}
// function sendNotification($title, $msg, $token) {
//     $url = "https://fcm.googleapis.com/fcm/send";

//     $serverKey = 'AAAAqneujWk:APA91bFri6a1y21koNy_mgfBVk0X3ke9qFYGIKmYmdQMbTbbX2JEab_FxJRt3AMoLyfkGW2JIYRax3Vy1RgYF1UNiEOnophNkt-WOrO3N497zmENapALL-qbrSxmldJsQIJ0N2tWAOb0';

//     $notification = array('title' =>$title , 'body' => $msg, 'sound' => 'default', 'badge' => '1');
//     $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
//     $json = json_encode($arrayToSend);
//     $headers = array();
//     $headers[] = 'Content-Type: application/json';
//     $headers[] = 'Authorization: key='. $serverKey;
//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $url);
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
//     curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     //Send the request
//     $response = curl_exec($ch);
//     //Close request
//     curl_close($ch);
// }

$json = array("op" =>$result);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json); 
				
?>