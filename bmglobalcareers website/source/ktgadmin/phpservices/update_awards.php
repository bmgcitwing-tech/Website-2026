<?php
include_once("../sessionservices.php");
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$title=str_replace("'","^",$_POST['title']);
$cat_id=str_replace("'","^",$_POST['cat_id']);
$descp=str_replace("'","^",$_POST['finaldescp']);
$event_date=date('Y-m-d',strtotime($_POST['event_date']));
$send_notification=str_replace("'","^",$_POST['send_notification']);

$sql= "update tbl_awards set title='".$title."',cat_id='".$cat_id."',send_notification='".$send_notification."',descp='".$descp."',event_date='".$event_date."', updated_by='".$log."',update_date='".date('Y-m-d H:i:s')."' where awards_id='".$_POST['awards_id']."'";
	
$exec_query=mysqli_query($conn, $sql);

if($exec_query){
	if($send_notification==1){
		$sql_member="SELECT * FROM `tbl_mem_personal_mbl_details` where delete_status='NDL' and user_key!=''";
		$query_member=mysqli_query($conn,$sql_member) ;
		$result_member=array();
		while($row_member=mysqli_fetch_array($query_member)){
			$token = $row_member['user_key'];			
			$notiTitle= "AWARDS"."-".$title."";
			$notiMessage =$descp;
			sendNotification($notiTitle, $notiMessage, $token);
		}
	 }
	$result=1;
}
else
{
	$result=0;	
}
function sendNotification($title, $msg, $token) {
    $url = "https://fcm.googleapis.com/fcm/send";

    $serverKey = 'AAAAqneujWk:APA91bFri6a1y21koNy_mgfBVk0X3ke9qFYGIKmYmdQMbTbbX2JEab_FxJRt3AMoLyfkGW2JIYRax3Vy1RgYF1UNiEOnophNkt-WOrO3N497zmENapALL-qbrSxmldJsQIJ0N2tWAOb0';

    $notification = array('title' =>$title , 'body' => $msg, 'sound' => 'default', 'badge' => '1');
    $arrayToSend = array('to' => $token, 'notification' => $notification,'priority'=>'high');
    $json = json_encode($arrayToSend);
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Authorization: key='. $serverKey;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST,"POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
    curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //Send the request
    $response = curl_exec($ch);
    //Close request
    curl_close($ch);
}

$json = array("op" =>$result);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json); 
				
?>