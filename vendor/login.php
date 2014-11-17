<?php 
session_start(); 
include_once "config.php";

	$user=$_REQUEST['uid'];
	$pass=$_REQUEST['upass'];
	
	$checking = false;
	$success = false;
	$active = 0;
	$status = 0;
	
	$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
	$result = mysqli_query($con,"SELECT * FROM mv_user WHERE username='".$user."' LIMIT 1");

	if (mysqli_num_rows($result)==0){ 
		$checking = false;
	}else{
		$checking = true;
	}
	
	if($checking){
		$row = mysqli_fetch_array($result);
		if(md5($pass) == $row['password']){
			
			if($row['active'] == 1){
				$active = 1;
			}else{
				$active = 2;
			}
			
			if($row['status'] == 1){
				$status = 1;
			}else{
				$status = 2;
			}
			
			if($status == 1 && $active == 1){
				$success=true;
				$_SESSION['id']=$row['user_id'];
				$_SESSION['gid']=$row['user_group_id'];
				$_SESSION['username']=$row['username'];
				$_SESSION['firstname']=$row['firstname'];
				$_SESSION['lastname']=$row['lastname'];
				$_SESSION['gender']=$row['gender'];
				$_SESSION['email']=$row['email'];
				$_SESSION['loggedin']=true;
				
				$query = "UPDATE mv_user SET ip = '".$_SERVER['REMOTE_ADDR']."' WHERE user_id='".$_SESSION['id']."'";
				mysqli_query($con,$query);
			}
			
		}
	}

	mysqli_close($con);
	
	if ($checking && $success && $active && $status){
		echo "1";
	}else if($active == 2 || $status == 2){
		echo "2";
	}else{
		echo "3";
	}



?>

