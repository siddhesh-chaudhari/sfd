<?php 
session_start(); 
include_once "config.php";

if(isset($_SESSION['loggedin'])){
	if($_SESSION['loggedin']==true){
		header("location:cpanel.php",true);
	}
}
?>
<html itemtype="http://schema.org/WebPage" lang="en-IN">
<head>
<title><?php echo $title; ?> | Vendor</title>
<meta charset="UTF-8">
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta name="author" content="<?php echo $author; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">

<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/hover.css">
<link rel="stylesheet" type="text/css" href="css/menu.css">

<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/functions.js"></script>


<head>
<body>
	<div class="login-shop-logo">
		<img src="images/logo.png">
	</div>
	<div class="login-container">
		<div class="login-logo"></div>
		<div class="login-fields">
			<div class="login-title">
				<div style="margin-top:10px;letter-spacing:4px;">VENDOR LOGIN</div>
				<div class="login-fields-container">			
						<span class="login-field-style">USER ID</span>
						<input type="text" id="uid" class="login-field-style" style="letter-spacing:0px;"/><br>
						<span class="login-field-style">PASSWORD</span>
						<input type="password" id="upass" class="login-field-style" style="letter-spacing:0px;"/>
						<center><button style="margin-top:20px;" class="submitbutton" onClick="checkLogin()">Log in <span class="journal-font-class"></span></button></center>
				</div>
			</div>
		</div>
	</div>
	
	<div class="login-bottom-container">
		<a href="registration.php"><div class="login-new-user">
			NEW USER SIGN UP
		</div></a>
		<div class="login-forgot">
			FORGOT USERNAME/PASSWORD
		</div>
	</div>
</body>
</html>