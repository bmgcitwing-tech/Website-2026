<?php


include_once("../sessionservices.php");	
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	
class appointments_services{
	function __construct($conn){
		$this->mySQLconn=$conn;
	}

	function appointments_insert($curdate){
		// $center_id = str_replace("'", "^", $_POST['country']);
		// $duration = str_replace("'", "^", $_POST['duration']);
		$sur_name = str_replace("'", "^", $_POST['sur_name']);
		$person_name = str_replace("'", "^", $_POST['person_name']);
		$person_email = str_replace("'", "^", $_POST['person_email']);
		$person_phone = str_replace("'", "^", $_POST['person_phone']);
		$person_dob=date('Y-m-d',strtotime($_POST['person_dob']));	
		$tenth_percentage = str_replace("'", "^", $_POST['tenth_percentage']);
		$twelfth_percentage = str_replace("'", "^", $_POST['twelfth_percentage']);
		$diploma = str_replace("'", "^", $_POST['diploma']);
		$twelfth_english_percentage = str_replace("'", "^", $_POST['twelfth_english_percentage']);
		$ug_percentage = str_replace("'", "^", $_POST['ug_percentage']);
		$country_id = str_replace("'", "^", $_POST['country_id']);
		$pg_percentage = str_replace("'", "^", $_POST['pg_percentage']);
		$ielts_score = str_replace("'", "^", $_POST['ielts_score']);
		$intake_year_id = str_replace("'", "^", $_POST['intake_year_id']);
		$intake_year_id = str_replace("'", "^", $_POST['intake_year_id']);
		$intake_month = str_replace("'", "^", $_POST['intake_month']);
		$intented_study = str_replace("'", "^", $_POST['intented_study']);
		$additional_comment = str_replace("'", "^", $_POST['additional_comment']);		
		$appoint_date=date('Y-m-d',strtotime($_POST['appoint_date']));
			 $sql = "INSERT INTO  tbl_counselling_appointments (sur_name,person_name,person_email,person_phone,person_dob,tenth_percentage,diploma,twelfth_percentage,twelfth_english_percentage,ug_percentage,country_id,pg_percentage,ielts_score,intake_year_id,intake_month,intented_study,additional_comment,appoint_date,created_by,create_date) VALUES('".$sur_name. "','" . $person_name . "','" . $person_email . "','" . $person_phone . "','" . $person_dob . "','" . $tenth_percentage . "','" . $diploma . "','" . $twelfth_percentage . "','" . $twelfth_english_percentage . "','" . $ug_percentage . "','" . $country_id . "','" . $pg_percentage . "','" . $ielts_score . "','" . $intake_year_id . "','" . $intake_month . "','" . $intented_study . "','" . $additional_comment . "','" . $appoint_date . "','" . $person_name . "','" . $curdate . "')";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function appointments_delete($curdate){
		$sql= "update tbl_counselling_appointments set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where ban_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
			if($exec_query){
				return true;
			}
			else{
				 return false;
			}
	}
	function appointments_autobind($curdate){
		$bannerData=array();
		$sql= "select *,date_format(person_dob,'%m/%d/%Y') as person_dob,date_format(appoint_date,'%m/%d/%Y') as appoint_date from tbl_counselling_appointments where ban_id='".$_POST['ban_id']."' and delete_status='NDL'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		$rows=mysqli_num_rows($exec_query);
		if($rows>0){
			while($row=mysqli_fetch_array($exec_query,MYSQLI_ASSOC)){
				$bannerData[]=str_replace("^","'",$row);		
			}
		}
		return $bannerData;
	}
	function appointments_update($curdate){
		$sur_name = str_replace("'", "^", $_POST['sur_name']);
		$person_name = str_replace("'", "^", $_POST['person_name']);
		$person_email = str_replace("'", "^", $_POST['person_email']);
		$person_phone = str_replace("'", "^", $_POST['person_phone']);
		$person_dob=date('Y-m-d',strtotime($_POST['person_dob']));	
		$tenth_percentage = str_replace("'", "^", $_POST['tenth_percentage']);
		$twelfth_percentage = str_replace("'", "^", $_POST['twelfth_percentage']);
		$twelfth_english_percentage = str_replace("'", "^", $_POST['twelfth_english_percentage']);
		$ug_percentage = str_replace("'", "^", $_POST['ug_percentage']);
		$country_id = str_replace("'", "^", $_POST['country_id']);
		$pg_percentage = str_replace("'", "^", $_POST['pg_percentage']);
		$ielts_score = str_replace("'", "^", $_POST['ielts_score']);
		$intake_year_id = str_replace("'", "^", $_POST['intake_year_id']);
		$intake_year_id = str_replace("'", "^", $_POST['intake_year_id']);
		$intake_month = str_replace("'", "^", $_POST['intake_month']);
		$intented_study = str_replace("'", "^", $_POST['intented_study']);
		$additional_comment = str_replace("'", "^", $_POST['additional_comment']);		
		$appoint_date=date('Y-m-d',strtotime($_POST['appoint_date']));
		$diploma = str_replace("'", "^", $_POST['diploma']);
		// print_r($appoint_date);
		$sql= "update tbl_counselling_appointments set diploma='".$diploma."',sur_name='".$sur_name."',person_name='".$person_name."',person_email='".$person_email."',
		person_phone='".$person_phone."',person_dob='".$person_dob."',tenth_percentage='".$tenth_percentage."',twelfth_percentage='".$twelfth_percentage."',twelfth_english_percentage='".$twelfth_english_percentage."',ug_percentage='".$ug_percentage."',country_id='".$country_id."',pg_percentage='".$pg_percentage."',ielts_score='".$ielts_score."',intake_year_id='".$intake_year_id."',intake_month='".$intake_month."',
		additional_comment='".$additional_comment."',appoint_date='".$appoint_date."',intented_study='".$intented_study."',
		updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where ban_id='".$_POST['ban_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	
}		
$objVDS=new appointments_services($conn);
$curdate=date('Y-m-d H:i:s');
if($_POST['req']=='INS'){
	$rtnMsg=$objVDS->appointments_insert($curdate);
}
else if($_POST['req']=='DEL'){
	$rtnMsg=$objVDS->appointments_delete($curdate);
}
else if($_POST['req']=='AUB'){
	$rtnMsg=$objVDS->appointments_autobind($curdate);
}
else if($_POST['req']=='UPD'){
	$rtnMsg=$objVDS->appointments_update($curdate);
}
mysqli_close($conn);
$json = array("op" =>$rtnMsg);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json);
?>