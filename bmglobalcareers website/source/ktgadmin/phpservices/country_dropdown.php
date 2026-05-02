<?php 
header('Access-Control-Allow-Origin: *');
include_once("connection.php");
 
$sql="SELECT ban_id,title FROM tbl_counselling_centers where delete_status='NDL' order by ban_id desc";

$query=mysqli_query($conn,$sql) ;
while($row=mysqli_fetch_array($query)){
	$fetchresult['ban_id']=$row['ban_id'];
	$fetchresult['title']=str_replace("^", "'", $row['title']);
	$result[]=$fetchresult;
}

$json =$result;
header("Content-Type: application/json", true);
		echo json_encode($json);
	
?> 