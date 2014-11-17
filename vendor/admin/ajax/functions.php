<?php
session_start(); 
include_once "../../config.php";

$action_id = $_REQUEST['action'];

switch($action_id){
	
	case 1: //Addning new category
		$cat_name = $_REQUEST['cat_name'];
		$parent_id = $_REQUEST['parent'];
		$category_oc_id = $_REQUEST['category_oc_id'];
		$cat_status = $_REQUEST['cat_status'];
		$req_approval = $_REQUEST['req_approval'];
		
		$success = true;
		
		if(strlen($cat_name) < 1 && strlen($cat_name) > 20){
			$success = false;
		}
		
		$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
		
		$query = "INSERT INTO mv_category (category_name,parent_id,category_oc_id,status,req_approval) VALUES('$cat_name','$parent_id','$category_oc_id','$cat_status','$req_approval')";
		
		mysqli_query($con,$query);
		mysqli_close($con);
		
		if($success){
			echo "1";
		}else{
			echo "2";
		}
		break;
		
	case 2:	//Update category
		$cat_name = $_REQUEST['cat_name'];
		$parent_id = $_REQUEST['parent'];
		$category_oc_id = $_REQUEST['category_oc_id'];
		$cat_status = $_REQUEST['cat_status'];
		$req_approval = $_REQUEST['req_approval'];
		$id=$_REQUEST['id'];
		
		$success = true;
		
		if(strlen($cat_name) < 1 && strlen($cat_name) > 20){
			$success = false;
		}
		
		$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
		
		$query = "UPDATE mv_category SET category_name = '$cat_name',parent_id = '$parent_id' ,category_oc_id = '$category_oc_id',status = '$cat_status',req_approval = '$req_approval' WHERE category_id=$id";
		
		mysqli_query($con,$query);
		mysqli_close($con);
		
		if($success){
			echo "1";
		}else{
			echo "2";
		}
		
		break;
		
	case 3:	//Delete category
		
		$id=$_REQUEST['id'];
		
		//check for valid input
		
		$success = 1;
		
		if(strlen($id) < 1){
			$success = 2;
		}
		
		//check for dependency
		
		$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
		
		$query = "SELECT * FROM mv_category WHERE parent_id=$id";
		$result = mysqli_query($con,$query);
		
		if(mysqli_num_rows($result)>0){
			$success=3;
		}else{
			$query = "DELETE FROM mv_category WHERE category_id=$id";
			mysqli_query($con,$query);
		}
		mysqli_close($con);
		
		echo $success;
		break;	
	
}

?>