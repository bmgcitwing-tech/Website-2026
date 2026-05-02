<?php
header('Access-Control-Allow-Origin: *');
	//include connection file 
	include_once("connection.php");
	 
	
// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;

$columns = array( 
// datatable column index  => database column name
	0 =>'title', 
	
		
	
);

// getting total number records without any search
$sql = "SELECT t1.ban_id ";
$sql.=" FROM tbl_counselling_appointments t1";
$query=mysqli_query($conn, $sql) or die("tbl_prpty-grPrpty_Id-data.php: get tbl_prptys");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.

if ($_POST['cond'] == "firstbind") {

//$sql = "SELECT t2.title as country,t1.*,date_format(t1.create_date,'%d/%m/%Y %H:%i:%s') as create_date,date_format(t1.update_date,'%d/%m/%Y %H:%i:%s') as update_date FROM tbl_counselling_appointments t1 inner join tbl_counselling_centers t2 on t1.country_id=t2.ban_id  WHERE t1.delete_status='NDL' and  t2.delete_status='NDL'";

$sql = "SELECT t1.*,date_format(t1.create_date,'%d/%m/%Y %H:%i:%s') as create_date,date_format(t1.update_date,'%d/%m/%Y %H:%i:%s') as update_date FROM tbl_counselling_appointments t1   WHERE t1.delete_status='NDL' ";
}

else{
	$fdate = date('Y-m-d', strtotime($_POST['fdate']));
    $tdate = date('Y-m-d', strtotime($_POST['tdate']));
	
	//$sql = "SELECT t2.title as country,t1.*,date_format(t1.create_date,'%d/%m/%Y %H:%i:%s') as create_date,date_format(t1.update_date,'%d/%m/%Y %H:%i:%s') as update_date FROM tbl_counselling_appointments t1 inner join tbl_counselling_centers t2 on t1.country_id=t2.ban_id  WHERE t1.delete_status='NDL' and  t2.delete_status='NDL' and  t1.appoint_date between '" . $fdate . "' and '" . $tdate . "'";
	
	$sql = "SELECT t1.*,date_format(t1.create_date,'%d/%m/%Y %H:%i:%s') as create_date,date_format(t1.update_date,'%d/%m/%Y %H:%i:%s') as update_date FROM tbl_counselling_appointments t1  WHERE t1.delete_status='NDL' and  t1.appoint_date between '" . $fdate . "' and '" . $tdate . "'";
	 

}

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( t1.mobile_no LIKE '".$requestData['search']['value']."%' )";   
	
}
$query=mysqli_query($conn, $sql) or die("tbl_prpty-grPrpty_Id-data.php: get	 tbl_prptys");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 

if($requestData['length']==-1){
     
	$sql .= " order by t1.ban_id desc";

}
else{
	
$sql.=" order by t1.ban_id  desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";


}

/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("tbl_prpty-grPrpty_Id-data.php: get tbl_prptys");

$data = array();
$i=1+$requestData['start'];
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = $i ;
	$nestedData[] = date("d M Y", strtotime($row['appoint_date'])); 

	 $nestedData[] = str_replace("^","'",$row['person_name']);
	 $nestedData[] = str_replace("^","'",$row['sur_name']);
	 $nestedData[] = str_replace("^","'",$row['person_email']);
	 $nestedData[] = str_replace("^","'",$row['person_phone']);
	 $nestedData[] = date("d/m/Y", strtotime($row['person_dob'])); 
	 $nestedData[] = str_replace("^","'",$row['tenth_percentage']);	
	 $nestedData[] = str_replace("^","'",$row['twelfth_percentage']);	
	 if(!empty($row['diploma'])){

	 $nestedData[] = str_replace("^","'",$row['diploma']);	
	 }
	 else{
		$nestedData[] ="-";	
	 }
	 $nestedData[] = str_replace("^","'",$row['twelfth_english_percentage']);	
	 $nestedData[] = str_replace("^","'",$row['ug_percentage']);	
	 $nestedData[] = str_replace("^","'",$row['pg_percentage']);
	 //$nestedData[] = str_replace("^","'",$row['country']); 	
	if($row['country_id']=='2')
	{
	 $nestedData[] = 'UNITED KINGDOM (UK)';	
	 }
	 else{
		$nestedData[] =str_replace("^","'",$row['country_id']); 		
	 }	
	 $nestedData[] = str_replace("^","'",$row['ielts_score']);	
	 $nestedData[] = str_replace("^","'",$row['intake_year_id']);	
	 $nestedData[] = str_replace("^","'",$row['intake_month']);	
	 $nestedData[] = str_replace("^","'",$row['intented_study']);
	 $nestedData[] = str_replace("^","'",$row['additional_comment']);
	 
	 	
	 
	
		

   						 $nestedData[] ="<div class='btn-group' role='group' aria-label='Basic example'>	
																	<a href='update_appointments.php?id=".$row['ban_id']."'><button type='button' class='btn btn-success' style='padding:6px 8px;margin-right:5px'>
																		<i class='fa fa-edit' style='color: #fff;padding: 0;margin: 0;font-size: 18px;'></i>
																	</button></a>
																	<a href='javascript:void(0)' class='deleteTriger' data-value='".$row['ban_id']."' ><button type='button' class='btn btn-danger' style='padding:6px 8px;'>
																		<i class='fa fa-trash' style='color: #fff;padding: 0;margin: 0;font-size: 18px;'></i>
																	</button></a>
																</div>";


	
	
	$data[] = $nestedData;
	$i++;
}



$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientsPrpty_Ide , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data   // total data array
			);

echo json_encode($json_data);  // send data as json format


?>
	