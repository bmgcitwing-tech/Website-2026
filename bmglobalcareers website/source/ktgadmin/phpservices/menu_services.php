<?php
include_once("../sessionservices.php");	
include_once("connection.php");	
date_default_timezone_set('Asia/Kolkata');	
class menu_services{
	function __construct($conn){
		$this->mySQLconn=$conn;
	}
	
	function menu_insert($curdate){
		$order_by=str_replace("'","^",$_POST['order_by']);
		
		$sql= "INSERT INTO tbl_menu (page_type_id,menu_name,imgname,order_by,created_by,create_date) VALUES('".$_POST['page_type_id']."','".$_POST['menu_name']."','".$_POST['photo_name']."','".$order_by."','".$_SESSION['login_user']."','".$curdate."')";
			
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			$final_dest='../userdata/images/menu';
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
	function menu_delete($curdate){
		$sql= "update tbl_menu set delete_status='0',deleted_by='".$_SESSION['login_user']."',deleted_date='".$curdate."' where menu_id='".$_POST['delid']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			//unlink('userdata/images/menu/'.$_POST['photo_name']);
			return true;
		}
		else{
			 return false;
		}
	}
	function menu_autobind($curdate){
		$menuData=array();
		$sql= "select * from tbl_menu where menu_id='".$_POST['menu_id']."' and delete_status='NDL'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		$rows=mysqli_num_rows($exec_query);
		if($rows>0){
			while($row=mysqli_fetch_array($exec_query,MYSQLI_ASSOC)){
				$menuData[]=str_replace("^","'",$row);		
			}
		}
		return $menuData;
	}
	function menu_update($curdate){
		$order_by=str_replace("'","^",$_POST['order_by']);
		$menu_name=str_replace("'","^",$_POST['menu_name']);

		$page_type_id=str_replace("'","^",$_POST['page_type_id']);

		
		if($_POST['photo_new_name']==''){
			$photo=$_POST['photo_old_name'];
		}
		else{
			$photo=$_POST['photo_new_name'];
		}
		
		$sql= "update tbl_menu set page_type_id='".$page_type_id."',menu_name='".$menu_name."',imgname='".$photo."',order_by='".$order_by."',updated_by='".$_SESSION['login_user']."',update_date='".$curdate."' where menu_id='".$_POST['menu_id']."'";
	    $exec_query=mysqli_query($this->mySQLconn, $sql);
		if($exec_query){
			if($_POST['photo_new_name']!=''){
				$final_dest='../userdata/images/menu';
				 if(is_dir( $final_dest)==FALSE){
					mkdir($final_dest,0777,TRUE);
				}
				copy('../temp/'.$_POST['photo_new_name'],$final_dest.'/'.$_POST['photo_new_name']);
				//unlink('userdata/images/menu/'.$_POST['photo_old_name']);
			}
			return true;
		}
		else{
			 return false;
		}
	}
	
}		
$objVDS=new menu_services($conn);
$curdate=date('Y-m-d H:i:s');
if($_POST['req']=='INS'){
	$rtnMsg=$objVDS->menu_insert($curdate);
}
else if($_POST['req']=='DEL'){
	$rtnMsg=$objVDS->menu_delete($curdate);
}
else if($_POST['req']=='AUB'){
	$rtnMsg=$objVDS->menu_autobind($curdate);
}
else if($_POST['req']=='UPD'){
	$rtnMsg=$objVDS->menu_update($curdate);
}
mysqli_close($conn);
$json = array("op" =>$rtnMsg);
			
			// send data as json format
			header("Content-Type: application/json",true);
				echo json_encode($json);
?>