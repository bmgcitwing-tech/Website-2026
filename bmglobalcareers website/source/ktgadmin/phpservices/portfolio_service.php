<?php
	include_once("connection.php");                                                                                                                                                                                 
	include_once("../sessionservices.php");
date_default_timezone_set('Asia/Kolkata');	

class gallery_services{
	function __construct($conn){
		$this->mySQLconn=$conn;
	}
	
	function products_sidetab_title_insert($curdate){
		$title=str_replace("'","^",$_POST['cat_name']);
		
		$sql= "INSERT INTO tbl_products_sidetab_title (title,created_by,create_date) VALUES('".$title."','".$_SESSION['login_code']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_title_delete($curdate){
		$sql= "update tbl_products_sidetab_title set delete_status='0',deleted_by='".$_SESSION['login_code']."',deleted_date='".$curdate."' where prod_st_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_title_autobind($curdate){
		$bannerData=array();
		$sql= "select * from tbl_products_sidetab_title where prod_st_id='".$_POST['prod_st_id']."' and delete_status='NDL'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		$rows=mysqli_num_rows($exec_query);
		if($rows>0){
			while($row=mysqli_fetch_array($exec_query,MYSQLI_ASSOC)){
				$bannerData[]=str_replace("^","'",$row);		
			}
		}
		return $bannerData;
	}
	function products_sidetab_title_update($curdate){
		$title=str_replace("'","^",$_POST['cat_name']);
		
		$sql= "update tbl_products_sidetab_title set title='".$title."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where prod_st_id='".$_POST['prod_st_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_details_insert($curdate){
		$title=str_replace("'","^",$_POST['title']);
		$descp=str_replace("'","^",$_POST['finaldescp']);
		
		$sql= "INSERT INTO tbl_products_sidetab_details (title,descp,imgname,created_by,create_date) VALUES('".$_POST['title']."','".$descp."','".$_POST['photo_name']."','".$_SESSION['login_code']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$final_dest='../userdata/images/portfolio';
			if(is_dir( $final_dest)==FALSE){
				mkdir($final_dest,0777,TRUE);
			}
			copy('temp/'.$_POST['photo_name'],$final_dest.'/'.$_POST['photo_name']);
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_details_delete($curdate){
		$sql= "update tbl_products_sidetab_details set delete_status='0',deleted_by='".$_SESSION['login_code']."',deleted_date='".$curdate."' where prod_st_dt_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_details_update($curdate){
		$descp=str_replace("'","^",$_POST['finaldescp']);
		$title=str_replace("'","^",$_POST['title']);
		
		if($_POST['photo_new_name']==''){
			$photo=$_POST['photo_old_name'];
		}
		else{
			$photo=$_POST['photo_new_name'];
		}
		
		$sql= "update tbl_products_sidetab_details set title='".$_POST['title']."',descp='".$descp."',imgname='".$photo."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where prod_st_dt_id='".$_POST['prod_st_dt_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			if($_POST['photo_new_name']!=''){
				$final_dest='../userdata/images/portfolio';
				 if(is_dir( $final_dest)==FALSE){
					mkdir($final_dest,0777,TRUE);
				}
				copy('temp/'.$_POST['photo_new_name'],$final_dest.'/'.$_POST['photo_new_name']);
			}
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_details_autobind($curdate){
		$bannerData=array();
		$sql= "select * from tbl_products_sidetab_details where prod_st_dt_id='".$_POST['prod_st_dt_id']."' and delete_status='NDL'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		$rows=mysqli_num_rows($exec_query);
		if($rows>0){
			while($row=mysqli_fetch_array($exec_query,MYSQLI_ASSOC)){
				$bannerData[]=str_replace("^","'",$row);		
			}
		}
		return $bannerData;
	}
	function products_sidetab_multi_image_details_insert($curdate){
		$title=str_replace("'","^",$_POST['title']);
		$descp=str_replace("'","^",$_POST['finaldescp']);
		
		 $sql= "INSERT INTO tbl_portfolio_sidetab_multi_image_details (title,descp,order_by,created_by,create_date) VALUES('".$_POST['title']."','".$descp."','".$_POST['order_by']."','".$_SESSION['login_code']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_multi_images_insert($curdate){
		$title=str_replace("'","^",$_POST['title']);
		
		 $sql= "INSERT INTO tbl_portfolio_multi_images (prod_st_mi_dt_id,title,imgname,created_by,create_date) VALUES('".$_POST['prod_st_mi_dt_id']."','".$title."','".$_POST['photo_name']."','".$_SESSION['login_code']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$final_dest='../userdata/images/portfolio';
			if(is_dir( $final_dest)==FALSE){
				mkdir($final_dest,0777,TRUE);
			}
			copy('../temp/'.$_POST['photo_name'],$final_dest.'/'.$_POST['photo_name']);
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_multi_images_delete($curdate){
		$sql= "update tbl_portfolio_multi_images set delete_status='0',deleted_by='".$_SESSION['login_code']."',deleted_date='".$curdate."' where prod_st_mi_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			//unlink('userdata/images/banner/'.$_POST['photo_name']);
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_multi_image_details_delete($curdate){
		$sql= "update tbl_portfolio_sidetab_multi_image_details set delete_status='0',deleted_by='".$_SESSION['login_code']."',deleted_date='".$curdate."' where prod_st_mi_dt_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_sidetab_multi_image_details_autobind($curdate){
		$bannerData=array();
		$sql= "select * from tbl_portfolio_sidetab_multi_image_details where prod_st_mi_dt_id='".$_POST['prod_st_mi_dt_id']."' and delete_status='NDL'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		$rows=mysqli_num_rows($exec_query);
		if($rows>0){
			while($row=mysqli_fetch_array($exec_query,MYSQLI_ASSOC)){
				$bannerData[]=str_replace("^","'",$row);		
			}
		}
		return $bannerData;
	}
	function products_sidetab_multi_image_details_update($curdate){
		$title=str_replace("'","^",$_POST['title']);
		$descp=str_replace("'","^",$_POST['finaldescp']);
		
		$sql= "update tbl_portfolio_sidetab_multi_image_details set title='".$_POST['title']."',descp='".$descp."',order_by='".$_POST['order_by']."', updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where prod_st_mi_dt_id='".$_POST['prod_st_mi_dt_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_insert($curdate){
		$mcat_name=str_replace("'","^",$_POST['mcat_name']);
		
		$sql= "INSERT INTO tbl_products_main_category (title,created_by,create_date) VALUES('".$mcat_name."','".$_SESSION['login_code']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_delete($curdate){
		$sql= "update tbl_products_main_category set delete_status='0',deleted_by='".$_SESSION['login_code']."',deleted_date='".$curdate."' where prod_mcat_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_autobind($curdate){
		$bannerData=array();
		$sql= "select * from tbl_products_main_category where prod_mcat_id='".$_POST['prod_mcat_id']."' and delete_status='NDL'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		$rows=mysqli_num_rows($exec_query);
		if($rows>0){
			while($row=mysqli_fetch_array($exec_query,MYSQLI_ASSOC)){
				$bannerData[]=str_replace("^","'",$row);		
			}
		}
		return $bannerData;
	}
	function products_maincategory_update($curdate){
		$mcat_name=str_replace("'","^",$_POST['mcat_name']);
		
		$sql= "update tbl_products_main_category set title='".$mcat_name."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where prod_mcat_id='".$_POST['prod_mcat_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_sidetab_insert($curdate){
		$cat_name=str_replace("'","^",$_POST['cat_name']);
		
		$sql= "INSERT INTO tbl_products_maincategory_sidetab_title (prod_mcat_id,title,created_by,create_date) VALUES('".$_POST['prod_mcat_id']."','".$cat_name."','".$_SESSION['login_code']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_sidetab_delete($curdate){
		$sql= "update tbl_products_maincategory_sidetab_title set delete_status='0',deleted_by='".$_SESSION['login_code']."',deleted_date='".$curdate."' where prod_mcat_st_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_sidetab_autobind($curdate){
		$bannerData=array();
		$sql= "select * from tbl_products_maincategory_sidetab_title where prod_mcat_st_id='".$_POST['prod_mcat_st_id']."' and delete_status='NDL'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		$rows=mysqli_num_rows($exec_query);
		if($rows>0){
			while($row=mysqli_fetch_array($exec_query,MYSQLI_ASSOC)){
				$bannerData[]=str_replace("^","'",$row);		
			}
		}
		return $bannerData;
	}
	function products_maincategory_sidetab_update($curdate){
		$cat_name=str_replace("'","^",$_POST['cat_name']);
		
		$sql= "update tbl_products_maincategory_sidetab_title set prod_mcat_id='".$_POST['prod_mcat_id']."',title='".$cat_name."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where prod_mcat_st_id='".$_POST['prod_mcat_st_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_sidetab_multiimage_descp_insert($curdate){
		$title=str_replace("'","^",$_POST['title']);
		
		$sql= "INSERT INTO tbl_products_maincategory_sidetab_multi_image_details (prod_mcat_id,title,descp,created_by,create_date) VALUES('".$_POST['prod_mcat_id']."','".$title."','".$_POST['finaldescp']."','".$_SESSION['login_code']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_sidetab_multiimage_descp_delete($curdate){
		$sql= "update tbl_products_maincategory_sidetab_multi_image_details set delete_status='0',deleted_by='".$_SESSION['login_code']."',deleted_date='".$curdate."' where prod_mcat_st_mi_dt_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_sidetab_multiimage_descp_autobind($curdate){
		$bannerData=array();
		$sql= "select * from tbl_products_maincategory_sidetab_multi_image_details t1 where prod_mcat_st_mi_dt_id='".$_POST['prod_mcat_st_mi_dt_id']."' and t1.delete_status='NDL'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		$rows=mysqli_num_rows($exec_query);
		if($rows>0){
			while($row=mysqli_fetch_array($exec_query,MYSQLI_ASSOC)){
				$bannerData[]=str_replace("^","'",$row);		
			}
		}
		return $bannerData;
	}
	function products_maincategory_sidetab_multiimage_descp_update($curdate){
		$title=str_replace("'","^",$_POST['title']);
		
		$sql= "update tbl_products_maincategory_sidetab_multi_image_details set prod_mcat_id='".$_POST['prod_mcat_id']."',title='".$title."',descp='".$_POST['finaldescp']."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where prod_mcat_st_mi_dt_id='".$_POST['prod_mcat_st_mi_dt_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_sidetab_multiimage_insert($curdate){
		$title=str_replace("'","^",$_POST['title']);
		
		$sql= "INSERT INTO tbl_products_maincategory_sidetab_multi_images (prod_mcat_st_mi_dt_id,title,imgname,created_by,create_date) VALUES('".$_POST['prod_mcat_st_mi_dt_id']."','".$title."','".$_POST['photo_name']."','".$_SESSION['login_code']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			
			$final_dest='../userdata/images/portfolio';
			if(is_dir( $final_dest)==FALSE){
				mkdir($final_dest,0777,TRUE);
			}
			copy('../temp/'.$_POST['photo_name'],$final_dest.'/'.$_POST['photo_name']);
			return true;
		}
		else{
			 return false;
		}
	}
	function products_maincategory_sidetab_multiimage_delete($curdate){
		$sql= "update tbl_products_maincategory_sidetab_multi_images set delete_status='0',deleted_by='".$_SESSION['login_code']."',deleted_date='".$curdate."' where prod_mcat_st_mi_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			//unlink('userdata/images/banner/'.$_POST['photo_name']);
			return true;
		}
		else{
			 return false;
		}
	}
	
}		
$objVDS=new gallery_services($conn);
$curdate=date('Y-m-d H:i:s');
if($_POST['req']=='PRODSTINS'){
	$rtnMsg=$objVDS->products_sidetab_title_insert($curdate);
}
else if($_POST['req']=='PRODSTDEL'){
	$rtnMsg=$objVDS->products_sidetab_title_delete($curdate);
}
else if($_POST['req']=='PRODSTAUB'){
	$rtnMsg=$objVDS->products_sidetab_title_autobind($curdate);
}
else if($_POST['req']=='PRODSTUPD'){
	$rtnMsg=$objVDS->products_sidetab_title_update($curdate);
}
else if($_POST['req']=='PRODSTIDINS'){
	$rtnMsg=$objVDS->products_sidetab_details_insert($curdate);
}
else if($_POST['req']=='PRODSTIDDEL'){
	$rtnMsg=$objVDS->products_sidetab_details_delete($curdate);
}
else if($_POST['req']=='PRODSTIDUPD'){
	$rtnMsg=$objVDS->products_sidetab_details_update($curdate);
}
else if($_POST['req']=='PRODSTIDAUB'){
	$rtnMsg=$objVDS->products_sidetab_details_autobind($curdate);
}
else if($_POST['req']=='PRODSTMIDINS'){
	$rtnMsg=$objVDS->products_sidetab_multi_image_details_insert($curdate);
}
else if($_POST['req']=='PRODSTMIINS'){
	$rtnMsg=$objVDS->products_sidetab_multi_images_insert($curdate);
}
else if($_POST['req']=='PRODSTMIDEL'){
	$rtnMsg=$objVDS->products_sidetab_multi_images_delete($curdate);
}
else if($_POST['req']=='PRODSTMIDDEL'){
	$rtnMsg=$objVDS->products_sidetab_multi_image_details_delete($curdate);
}
else if($_POST['req']=='PRODSTMIDAUB'){
	$rtnMsg=$objVDS->products_sidetab_multi_image_details_autobind($curdate);
}
else if($_POST['req']=='PRODSTMIDUPD'){
	$rtnMsg=$objVDS->products_sidetab_multi_image_details_update($curdate);
}
else if($_POST['req']=='PRODMCINS'){
	$rtnMsg=$objVDS->products_maincategory_insert($curdate);
}
else if($_POST['req']=='PRODMCDEL'){
	$rtnMsg=$objVDS->products_maincategory_delete($curdate);
}
else if($_POST['req']=='PRODMCAUB'){
	$rtnMsg=$objVDS->products_maincategory_autobind($curdate);
}
else if($_POST['req']=='PRODMCUPD'){
	$rtnMsg=$objVDS->products_maincategory_update($curdate);
}
else if($_POST['req']=='PRODMCSTINS'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_insert($curdate);
}
else if($_POST['req']=='PRODMCSTDEL'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_delete($curdate);
}
else if($_POST['req']=='PRODMCSTAUB'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_autobind($curdate);
}
else if($_POST['req']=='PRODMCSTUPD'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_update($curdate);
}
else if($_POST['req']=='PRODMCSTMIINS'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_multiimage_descp_insert($curdate);
}
else if($_POST['req']=='PRODMCSTMIDEL'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_multiimage_descp_delete($curdate);
}
else if($_POST['req']=='PRODMCSTMIAUB'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_multiimage_descp_autobind($curdate);
}
else if($_POST['req']=='PRODMCSTMIUPD'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_multiimage_descp_update($curdate);
}
else if($_POST['req']=='PRODMCSTMIMGINS'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_multiimage_insert($curdate);
}
else if($_POST['req']=='PRODMCSTMIMGDEL'){
	$rtnMsg=$objVDS->products_maincategory_sidetab_multiimage_delete($curdate);
}
mysqli_close($conn);
$json = array("op" =>$rtnMsg);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json);
?>