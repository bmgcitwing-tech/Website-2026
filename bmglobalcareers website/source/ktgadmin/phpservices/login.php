<?php
session_start(); // Starting Session
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');	

$error=''; // Variable To Store Error Message

if ( ! empty( $_POST['uname'] ) ) {
include_once("connection.php");	
$username=$_POST['uname'];
$password=$_POST['pass'];

$uname=$username;
$pass=$password;

// SQL query to fetch information of registerd users and finds user match.
$sql ="select admin_id,pass from tbl_admin where uname='$uname'";
$query=mysqli_query($conn, $sql) or die("Error");
$rows=mysqli_num_rows($query);

if ($rows == 1) {
	 $row= mysqli_fetch_assoc($query);
	if($pass==$row['pass']){
		// $_SESSION['login_user']=$row['admin_id'];
		if($row['admin_id']=='1'){
			$_SESSION['login_user']=$row['admin_id'];
			$_SESSION['login_id']=$row['admin_id'];
		}
		else{
			$_SESSION['login_user']='superadmin';
			$_SESSION['login_id']=$row['admin_id'];
		}



		$pql="insert into tbl_login_details (admin_id,login_date) values ('".$row['admin_id']."','".date('Y-m-d H:i:s')."')";
		$exec_pql=mysqli_query($conn,$pql);
		if($exec_pql){
			$error='1';
		}
		else{
			$error="Error...";
		}
	}
	else{
		$error='Password is incorrect';	
	}
} 
else
{
	$error='Username is incorrect';	
}
}
$json = array("op"=>$error);
header("Content-Type: application/json", true);
echo json_encode($json);

?>
