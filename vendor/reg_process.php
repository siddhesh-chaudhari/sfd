<?php
session_start(); 
include_once "config.php";

if(isset($_SESSION['loggedin'])){
	if($_SESSION['loggedin']==true){
		header("location:cpanel.php",true);
	}
}

$company_name = $_POST['company_name'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$pincode = $_POST['pincode'];
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$gender = $_POST['gender'];
$pan = $_POST['pan'];
$email = $_POST['email'];
$contact_no = $_POST['contact_no'];
$delivery = $_POST['delivery'];
$date = date("Y-m-d H:i:s");

$query = "INSERT INTO mv_user (company_name , username , password , firstname , lastname , gender , address , city , country , pincode , email , contact_no , pan_no , delivery , date_added) VALUES( '".$company_name."' , '".$username."' , '".$password."' , '".$firstname."' , '".$lastname."' , '".$gender."' , '".$address."' , '".$city."' , '".$country."' , '".$pincode."' , '".$email."' , '".$contact_no."' , '".$pan."' , '".$delivery."' , '".$date."')";


	$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
	mysqli_query($con,$query);
	
	mysqli_close($con);
	
	header("location:index.php");

?>