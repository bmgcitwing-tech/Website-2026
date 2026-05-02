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
$sql = "SELECT prod_st_mi_id";
$sql.=" FROM tbl_portfolio_multi_images";
$query=mysqli_query($conn, $sql) or die("tbl_prpty-grPrpty_Id-data.php: get tbl_prptys");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


$sql = "SELECT prod_st_mi_id,title,imgname,date_format(create_date,'%d/%m/%Y %H:%i:%s') as create_date,date_format(update_date,'%d/%m/%Y %H:%i:%s') as update_date FROM tbl_portfolio_multi_images where delete_status='NDL' and prod_st_mi_dt_id='".$_POST['prod_st_mi_dt_id']."'";

if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
	$sql.=" AND ( title LIKE '".$requestData['search']['value']."%' )";   
	
}
$query=mysqli_query($conn, $sql) or die("tbl_prpty-grPrpty_Id-data.php: get	 tbl_prptys");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result. 
$sql.=" order by prod_st_mi_id  desc  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";

/* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */	
$query=mysqli_query($conn, $sql) or die("tbl_prpty-grPrpty_Id-data.php: get tbl_prptys");

$data = array();
$i=1+$requestData['start'];
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 

	$nestedData[] = "#".$i ;
	if($row['title']==''){
		$nestedData[] = "-";
	}
	else{
		$nestedData[] = str_replace("^","'",$row["title"]);
	}
	
	$nestedData[] = "<img src='../ktgadmin/userdata/images/portfolio/".str_replace("^","'",$row["imgname"])."' style='width:100px'>";
	if($row['update_date']!=''){
		$nestedData[] ='<a href="javascript:void(0)" class="badge badge-primary" style="color:#fff">'.$row['update_date'].'</a>';
	}
	else{
		$nestedData[] ='<a href="javascript:void(0)" class="badge badge-primary" style="color:#fff">'.$row['create_date'].'</a>';
	}
    $nestedData[] ="<div class='btn-group' role='group' aria-label='Basic example'>
	<a href='javascript:void(0)' class='deleteTriger' data-value='".$row['prod_st_mi_id']."' data-photo_name='".$row['imgname']."'><button type='button' class='btn btn-danger' style='padding:6px 8px;'>
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
	