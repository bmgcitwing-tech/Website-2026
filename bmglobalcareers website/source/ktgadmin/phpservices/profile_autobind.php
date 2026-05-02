<?php
header('Access-Control-Allow-Origin: *');
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	

$sql= "SELECT * FROM  tbl_admin where admin_id='1'";
	
$exec_query=mysqli_query($conn, $sql);

$fetch=mysqli_fetch_array($exec_query);

$cname=str_replace("^","'",$fetch['company_name']);
$cemail=str_replace("^","'",$fetch['company_email']);
$mobile=str_replace("^","'",$fetch['mbl_no']);
$address=str_replace("^","'",$fetch['address']);
$uname=str_replace("^","'",$fetch['uname']);
$pass=str_replace("^","'",$fetch['pass']);
$city=str_replace("^","'",$fetch['city']);
$state=str_replace("^","'",$fetch['state']);
$pcode=str_replace("^","'",$fetch['postal_code']);


$smsenable=str_replace("^","'",$fetch['smsenable']);
$smsusername=str_replace("^","'",$fetch['smsusername']);
$smspassword=str_replace("^","'",$fetch['smspassword']);

// $one_super_coin_credited_for=str_replace("^","'",$fetch['one_super_coin_credited_for']);
// $super_coin_credited_above=str_replace("^","'",$fetch['super_coin_credited_above']);
// $one_super_coin_equals_to=str_replace("^","'",$fetch['one_super_coin_equals_to']);
// $one_super_coin_for=str_replace("^","'",$fetch['one_super_coin_for']);
// $super_coin_applied_above=str_replace("^","'",$fetch['super_coin_applied_above']);
// $offer_code_applied_above=str_replace("^","'",$fetch['offer_code_applied_above']);
// $emergency_time_charges=str_replace("^","'",$fetch['emergency_time_charges']);
// $hang_on_fix_charges=str_replace("^","'",$fetch['hang_on_fix_charges']);
// $convenience_charges=str_replace("^","'",$fetch['convenience_charges']);
// $travelling_charges=str_replace("^","'",$fetch['travelling_charges']);
// $worker_app_version=str_replace("^","'",$fetch['worker_app_version']);


$json = array("cemail" =>$cemail,"cname" =>$cname,"pcode" =>$pcode,"mblno" =>$mobile,"addr" =>$address,"uname" =>$uname,"pass" =>$pass,"city" =>$city,"state" =>$state,"smsenable"=>$smsenable,"smsusername"=>$smsusername,"smspassword"=>$smspassword);


// ,"worker_app_version" =>$worker_app_version,"travelling_charges" =>$travelling_charges,"convenience_charges" =>$convenience_charges,"hang_on_fix_charges" =>$hang_on_fix_charges,"emergency_time_charges" =>$emergency_time_charges,"offer_code_applied_above" =>$offer_code_applied_above,"super_coin_applied_above" =>$super_coin_applied_above,"one_super_coin_for" =>$one_super_coin_for,"one_super_coin_equals_to" =>$one_super_coin_equals_to,"super_coin_credited_above" =>$super_coin_credited_above,"one_super_coin_credited_for" =>$one_super_coin_credited_for);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json); 
				
?>