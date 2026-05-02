<?php

include_once("../sessionservices.php");	
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	
class master_services{
	function __construct($conn){
		$this->mySQLconn=$conn;
	}
	function practice_session_timing_insert($curdate){
		$start_time=date("Y-m-d ".$_POST['start_time']."");
		$end_time=date("Y-m-d ".$_POST['end_time']."");
		
		$sql= "INSERT INTO tbl_practice_session_timing_details (start_time,end_time,created_by,create_date) VALUES('".$start_time."','".$end_time."','".$_SESSION['login_user']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$last_id=mysqli_insert_id($this->mySQLconn);
			
			$pql= "update tbl_practice_session_timing_details set order_by='".$last_id."' where pr_session_timing_id='".$last_id."'";			
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			 return false;
		}
	}
	function practice_session_timing_delete($curdate){
		$data_ids = $_REQUEST['data_ids'];
		$data_id_array = explode(",", $data_ids); 
		if(!empty($data_id_array)) {
			foreach($data_id_array as $id) {
				$sql = "update tbl_practice_session_timing_details set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where pr_session_timing_id='".$id."'";
				$query=mysqli_query($this->mySQLconn, $sql);
			}
			return true;
		}
	}
	function up_sort($curdate){
		$actual_val = $_POST['order_by'];
		$new_val = $_POST['order_by']-1;
		
		$rql="select ".$_POST['id_name']." from ".$_POST['table']." where order_by='".$actual_val."' and delete_status='NDL'";
		$exec_rql=mysqli_query($this->mySQLconn, $rql);
		$fetch_rql=mysqli_fetch_array($exec_rql);
		
		$sql= "update ".$_POST['table']." set order_by='".$new_val."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where order_by='".$actual_val."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$pql= "update ".$_POST['table']." set order_by='".$actual_val."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where order_by='".$new_val."' and ".$_POST['id_name']."<>'".$fetch_rql[$_POST['id_name']]."'";
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	function down_sort($curdate){
    
		$actual_val = $_POST['order_by'];
		$new_val = $_POST['order_by']+1;
		
		$rql="select ".$_POST['id_name']." from ".$_POST['table']." where order_by='".$actual_val."' and delete_status='NDL'";
		$exec_rql=mysqli_query($this->mySQLconn, $rql);
		$fetch_rql=mysqli_fetch_array($exec_rql);
		
		$sql= "update ".$_POST['table']." set order_by='".$new_val."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where order_by='".$actual_val."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
		 $pql= "update ".$_POST['table']." set order_by='".$actual_val."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where order_by='".$new_val."' and ".$_POST['id_name']."<>'".$fetch_rql[$_POST['id_name']]."'";
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	function practice_session_timing_update($curdate){
		$start_time=date("Y-m-d ".$_POST['start_time']."");
		$end_time=date("Y-m-d ".$_POST['end_time']."");
		
		$sql= "update tbl_practice_session_timing_details set start_time='".$start_time."',end_time='".$end_time."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where pr_session_timing_id='".$_POST['pr_session_timing_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function group_details_insert($curdate){
		$group_name=str_replace("'","^",$_POST['group_name']);
		$monthly_fee=str_replace("'","^",$_POST['monthly_fee']);
		$sessions_per_week=str_replace("'","^",$_POST['sessions_per_week']);
		
		$sql= "INSERT INTO tbl_group_details (group_name,monthly_fee,sessions_per_week,created_by,create_date) VALUES('".$group_name."','".$monthly_fee."','".$sessions_per_week."','".$_SESSION['login_user']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$last_id=mysqli_insert_id($this->mySQLconn);
			
			$pql= "update tbl_group_details set order_by='".$last_id."' where group_id='".$last_id."'";			
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			 return false;
		}
	}
	function group_details_delete($curdate){
		$data_ids = $_REQUEST['data_ids'];
		$data_id_array = explode(",", $data_ids); 
		if(!empty($data_id_array)) {
			foreach($data_id_array as $id) {
				$sql = "update tbl_group_details set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where group_id='".$id."'";
				$query=mysqli_query($this->mySQLconn, $sql);
			}
			return true;
		}
	}
	function group_details_update($curdate){
		$group_name=str_replace("'","^",$_POST['group_name']);
		$monthly_fee=str_replace("'","^",$_POST['monthly_fee']);
		$sessions_per_week=str_replace("'","^",$_POST['sessions_per_week']);
		
		$sql= "update tbl_group_details set group_name='".$group_name."',monthly_fee='".$monthly_fee."',sessions_per_week='".$sessions_per_week."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where group_id='".$_POST['group_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function group_day_session_details_insert($curdate){
		
		$sql= "INSERT INTO tbl_group_day_session_details (group_id,day_id,pr_session_timing_id,created_by,create_date) VALUES('".$_POST['group_id']."','".$_POST['day_id']."','".$_POST['pr_session_timing_id']."','".$_SESSION['login_user']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$last_id=mysqli_insert_id($this->mySQLconn);
			
			$pql= "update tbl_group_day_session_details set order_by='".$last_id."' where group_ds_id='".$last_id."'";			
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			 return false;
		}
	}
	function group_day_session_details_delete($curdate){
		$data_ids = $_REQUEST['data_ids'];
		$data_id_array = explode(",", $data_ids); 
		if(!empty($data_id_array)) {
			foreach($data_id_array as $id) {
				$sql = "update tbl_group_day_session_details set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where group_ds_id='".$id."'";
				$query=mysqli_query($this->mySQLconn, $sql);
			}
			return true;
		}
	}
	function group_day_session_details_update($curdate){
		
		$sql= "update tbl_group_day_session_details set group_id='".$_POST['group_id']."',day_id='".$_POST['day_id']."',pr_session_timing_id='".$_POST['pr_session_timing_id']."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where group_ds_id='".$_POST['group_ds_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function staff_designation_insert($curdate){
		$desig_name=str_replace("'","^",$_POST['desig_name']);
		$descp=str_replace("'","^",$_POST['descp']);
		
		$sql= "INSERT INTO tbl_staff_designation_details (desig_name,descp,created_by,create_date) VALUES('".$desig_name."','".$descp."','".$_SESSION['login_user']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$last_id=mysqli_insert_id($this->mySQLconn);
			
			$pql= "update tbl_staff_designation_details set order_by='".$last_id."' where desig_id='".$last_id."'";			
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			 return false;
		}
	}
	function staff_designation_delete($curdate){
		$data_ids = $_REQUEST['data_ids'];
		$data_id_array = explode(",", $data_ids); 
		if(!empty($data_id_array)) {
			foreach($data_id_array as $id) {
				$sql = "update tbl_staff_designation_details set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where desig_id='".$id."'";
				$query=mysqli_query($this->mySQLconn, $sql);
			}
			return true;
		}
	}
	function staff_designation_update($curdate){
		$desig_name=str_replace("'","^",$_POST['desig_name']);
		$descp=str_replace("'","^",$_POST['descp']);
		
		$sql= "update tbl_staff_designation_details set desig_name='".$desig_name."',descp='".$descp."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where desig_id='".$_POST['desig_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function match_format_insert($curdate){
		$match_format_name=str_replace("'","^",$_POST['match_format_name']);
		$descp=str_replace("'","^",$_POST['descp']);
		
		$sql= "INSERT INTO tbl_match_format_details (match_format_name,test_match,descp,created_by,create_date) VALUES('".$match_format_name."','".$_POST['test_match_status']."','".$descp."','".$_SESSION['login_user']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$last_id=mysqli_insert_id($this->mySQLconn);
			
			$pql= "update tbl_match_format_details set order_by='".$last_id."' where match_format_id='".$last_id."'";			
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			 return false;
		}
	}
	function match_format_delete($curdate){
		$data_ids = $_REQUEST['data_ids'];
		$data_id_array = explode(",", $data_ids); 
		if(!empty($data_id_array)) {
			foreach($data_id_array as $id) {
				$sql = "update tbl_match_format_details set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where match_format_id='".$id."'";
				$query=mysqli_query($this->mySQLconn, $sql);
			}
			return true;
		}
	}
	function match_format_update($curdate){
		$match_format_name=str_replace("'","^",$_POST['match_format_name']);
		$descp=str_replace("'","^",$_POST['descp']);
		
		$sql= "update tbl_match_format_details set match_format_name='".$match_format_name."',test_match='".$_POST['test_match_status']."',descp='".$descp."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where match_format_id='".$_POST['match_format_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function proficiency_insert($curdate){
		$proficiency_name=str_replace("'","^",$_POST['proficiency_name']);
		
		$sql= "INSERT INTO tbl_proficiency_details (player_type,proficiency_name,created_by,create_date) VALUES('".$_POST['player_type']."','".$proficiency_name."','".$_SESSION['login_user']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$last_id=mysqli_insert_id($this->mySQLconn);
			
			$pql= "update tbl_proficiency_details set order_by='".$last_id."' where profi_id='".$last_id."'";			
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			 return false;
		}
	}
	function proficiency_delete($curdate){
		$data_ids = $_REQUEST['data_ids'];
		$data_id_array = explode(",", $data_ids); 
		if(!empty($data_id_array)) {
			foreach($data_id_array as $id) {
				$sql = "update tbl_proficiency_details set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where profi_id='".$id."'";
				$query=mysqli_query($this->mySQLconn, $sql);
			}
			return true;
		}
	}
	function proficiency_update($curdate){
		$proficiency_name=str_replace("'","^",$_POST['proficiency_name']);
		
		$sql= "update tbl_proficiency_details set player_type='".$_POST['player_type']."',proficiency_name='".$proficiency_name."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where profi_id='".$_POST['profi_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function how_out_insert($curdate){
		$out_type=str_replace("'","^",$_POST['out_type']);
		
		$sql= "INSERT INTO tbl_how_out_details (out_type,not_out,created_by,create_date) VALUES('".$out_type."','".$_POST['not_out_status']."','".$_SESSION['login_user']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$last_id=mysqli_insert_id($this->mySQLconn);
			
			$pql= "update tbl_how_out_details set order_by='".$last_id."' where how_out_id='".$last_id."'";			
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			 return false;
		}
	}
	function how_out_delete($curdate){
		$data_ids = $_REQUEST['data_ids'];
		$data_id_array = explode(",", $data_ids); 
		if(!empty($data_id_array)) {
			foreach($data_id_array as $id) {
				$sql = "update tbl_how_out_details set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where how_out_id='".$id."'";
				$query=mysqli_query($this->mySQLconn, $sql);
			}
			return true;
		}
	}
	function how_out_update($curdate){
		$out_type=str_replace("'","^",$_POST['out_type']);
		
		$sql= "update tbl_how_out_details set out_type='".$out_type."',not_out='".$_POST['not_out_status']."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where how_out_id='".$_POST['how_out_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function agewise_category_insert($curdate){
		$agewise_cat_name=str_replace("'","^",$_POST['agewise_cat_name']);
		
		$sql= "INSERT INTO tbl_agewise_category_details (agewise_cat_name,agewise_age_below,created_by,create_date) VALUES('".$agewise_cat_name."','".$_POST['agewise_age_below']."','".$_SESSION['login_user']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$last_id=mysqli_insert_id($this->mySQLconn);
			
			$pql= "update tbl_agewise_category_details set order_by='".$last_id."' where aw_cat_id='".$last_id."'";			
			$exec_puery=mysqli_query($this->mySQLconn, $pql);
			if($exec_puery){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			 return false;
		}
	}
	function agewise_category_delete($curdate){
		$data_ids = $_REQUEST['data_ids'];
		$data_id_array = explode(",", $data_ids); 
		if(!empty($data_id_array)) {
			foreach($data_id_array as $id) {
				$sql = "update tbl_agewise_category_details set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where aw_cat_id='".$id."'";
				$query=mysqli_query($this->mySQLconn, $sql);
			}
			return true;
		}
	}
	function agewise_category_update($curdate){
		$agewise_cat_name=str_replace("'","^",$_POST['agewise_cat_name']);
		
		$sql= "update tbl_agewise_category_details set agewise_cat_name='".$agewise_cat_name."',agewise_age_below='".$_POST['agewise_age_below']."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where aw_cat_id='".$_POST['aw_cat_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	
	function citystatuschange($curdate){
		if($_POST['status']=='Y'){
			$qql="update tbl_city set active_status='N' where city_id='".$_POST['city_id']."'";
		}
		else if($_POST['status']=='N'){
			$qql="update tbl_city set active_status='Y' where city_id='".$_POST['city_id']."'";
		}
		$exec_qql=mysqli_query($this->mySQLconn,$qql);
		if($exec_qql){
			return true; 
		}
		else{
			return false; 
		}
	}
	
}

$objVDS=new master_services($conn);
$curdate=date('Y-m-d H:i:s');
if($_POST['req']=='PST_INS'){
	$rtnMsg=$objVDS->practice_session_timing_insert($curdate);
}
else if($_POST['req']=='PST_DEL'){
	$rtnMsg=$objVDS->practice_session_timing_delete($curdate);
}
else if($_POST['req']=='UP_SORT'){
	$rtnMsg=$objVDS->up_sort($curdate);
}
else if($_POST['req']=='DOWN_SORT'){

	$rtnMsg=$objVDS->down_sort($curdate);
}
else if($_POST['req']=='PST_UPD'){
	$rtnMsg=$objVDS->practice_session_timing_update($curdate);
}
else if($_POST['req']=='GRP_INS'){
	$rtnMsg=$objVDS->group_details_insert($curdate);
}
else if($_POST['req']=='GRP_DEL'){
	$rtnMsg=$objVDS->group_details_delete($curdate);
}
else if($_POST['req']=='GRP_UPD'){
	$rtnMsg=$objVDS->group_details_update($curdate);
}
else if($_POST['req']=='GRP_DS_INS'){
	$rtnMsg=$objVDS->group_day_session_details_insert($curdate);
}
else if($_POST['req']=='GRP_DS_DEL'){
	$rtnMsg=$objVDS->group_day_session_details_delete($curdate);
}
else if($_POST['req']=='GRP_DS_UPD'){
	$rtnMsg=$objVDS->group_day_session_details_update($curdate);
}
else if($_POST['req']=='DESIG_INS'){
	$rtnMsg=$objVDS->staff_designation_insert($curdate);
}
else if($_POST['req']=='DESIG_DEL'){
	$rtnMsg=$objVDS->staff_designation_delete($curdate);
}
else if($_POST['req']=='DESIG_UPD'){
	$rtnMsg=$objVDS->staff_designation_update($curdate);
}
else if($_POST['req']=='MFORMAT_INS'){
	$rtnMsg=$objVDS->match_format_insert($curdate);
}
else if($_POST['req']=='MFORMAT_DEL'){
	$rtnMsg=$objVDS->match_format_delete($curdate);
}
else if($_POST['req']=='MFORMAT_UPD'){
	$rtnMsg=$objVDS->match_format_update($curdate);
}
else if($_POST['req']=='PROFI_INS'){
	$rtnMsg=$objVDS->proficiency_insert($curdate);
}
else if($_POST['req']=='PROFI_DEL'){
	$rtnMsg=$objVDS->proficiency_delete($curdate);
}
else if($_POST['req']=='PROFI_UPD'){
	$rtnMsg=$objVDS->proficiency_update($curdate);
}
else if($_POST['req']=='HOWOUT_INS'){
	$rtnMsg=$objVDS->how_out_insert($curdate);
}
else if($_POST['req']=='HOWOUT_DEL'){
	$rtnMsg=$objVDS->how_out_delete($curdate);
}
else if($_POST['req']=='HOWOUT_UPD'){
	$rtnMsg=$objVDS->how_out_update($curdate);
}
else if($_POST['req']=='AWCAT_INS'){
	$rtnMsg=$objVDS->agewise_category_insert($curdate);
}
else if($_POST['req']=='AWCAT_DEL'){
	$rtnMsg=$objVDS->agewise_category_delete($curdate);
}
else if($_POST['req']=='AWCAT_UPD'){
	$rtnMsg=$objVDS->agewise_category_update($curdate);
}
else if($_POST['req']=='STATUSCHANGE1'){
	$rtnMsg=$objVDS->citystatuschange($curdate);
}
mysqli_close($conn);
$json = array("op" =>$rtnMsg);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json);		
?>