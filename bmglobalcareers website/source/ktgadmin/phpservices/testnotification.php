<?php 
$url = "https://fcm.googleapis.com/fcm/send";
$token = "c7v8WXG1QfykWtZ8d6agr4:APA91bGdF_CwsLAEASr0YOU8dwM51vrtMXyxtpoawGYlpu5-j4-iSea_C25UBsBaPXtozV0Rz41XXf6MYLjvPqrPiUucCUgtnXEgwDOBROPVA0Qy-6RTfy1tgm7rUqQ8JXY25gQ8wwuA";

//$token ="ffkwkrfNSlq96riaOAMafx:APA91bGRx_Dhz6LiJtRtu-VyatlNIasrJDYX_OcAI5zz9SoGAPv509vzC3Ms7bwG9KOWvu-jSXJ9fWVZc2iXOZgzlO4g80SNV21D25YpykjeayeZeVfLdpdXu0lQXsyFmxnk_5xkGZ7K";
$serverKey = 'AAAAqneujWk:APA91bFri6a1y21koNy_mgfBVk0X3ke9qFYGIKmYmdQMbTbbX2JEab_FxJRt3AMoLyfkGW2JIYRax3Vy1RgYF1UNiEOnophNkt-WOrO3N497zmENapALL-qbrSxmldJsQIJ0N2tWAOb0';
$title = "test by kani";
$body = "kanimozhi";
$notification = array('title' =>$title , 'body' => $body, 'sound' => 'default', 'badge' => '1');
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
//Send the request
$response = curl_exec($ch);
//Close request
if ($response === FALSE) {
die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);

?>