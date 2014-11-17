<?php
session_start(); 
include_once "../config.php";

$action_id = $_REQUEST['action'];

switch($action_id){
	
	case 1:
		
		$cats = $_REQUEST['cat_id'];
		$check_subs = true;
		
		$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
		$query = "SELECT * FROM mv_category WHERE parent_id=$cats";
		$result = mysqli_query($con,$query);
		
		if(mysqli_num_rows($result)<1){
			$check_subs = false;
		}
		
		$output = "<select id='sub-cats' onChange='getLastCats(this.value)'>";
		$output .= "<option value='-1'>Select Sub-Category</option>";
		while($row=mysqli_fetch_array($result)){
			$output .= "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
		}
		$output .= "</select>";
		
		if($check_subs){
			echo $output;
		}else{
			echo "";
		}
		
		break;
		
	case 2:
		
		$cats = $_REQUEST['cat_id'];
		$check_subs = true;
		
		$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
		$query = "SELECT * FROM mv_category WHERE parent_id=$cats";
		$result = mysqli_query($con,$query);
		
		if(mysqli_num_rows($result)<1){
			$check_subs = false;
		}
		
		$output = "<select id='last-cats'>";
			
		while($row=mysqli_fetch_array($result)){
			$output .= "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
		}
		$output .= "</select>";
		
		if($check_subs){
			echo $output;
		}else{
			echo "";
		}
		
		break;
}


?>