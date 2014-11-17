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
		<a href="index.php"><img src="images/logo.png"></a>
	</div>
	
	<div class="register-container">
		<div class="register-container-header">VENDOR SIGN UP</div>
		<div class="register-container-note">All fields marked with * are mandatory.</div>
		<table class="reg-table">
			<form name="reg" action="reg_process.php" onSubmit="return validateRegistration()" method="POST">
			
			<tr><td class="form-title" colspan="2">Company Information</td></tr>	
			<tr><td>Company / Organization / Publisher / Proprietor Name<span class="form-mandatory">*</span></td>
			<td><input type="text" name="company_name" id="company_name" /></td></tr>
			
			<tr><td>Address<span class="form-mandatory">*</span></td>
			<td><textarea name="address" id="address" /></textarea></td></tr>
			
			<tr><td>City<span class="form-mandatory">*</span></td>
			<td><input type="text" name="city" id="city" /></td></tr>
			
			<tr><td>Country<span class="form-mandatory">*</span></td>
			<td><input type="text" name="country" id="country" /></td></tr>
			
			<tr><td>Pincode<span class="form-mandatory">*</span></td>
			<td><input type="text" name="pincode" id="pincode" /></td></tr>
			
			<tr><td colspan="2" class="form-title">Login Information</td></tr>
			
			<tr><td>User ID<span class="form-mandatory">*</span></td>
			<td><input type="text" name="username" id="username" /></td></tr>
			
			<tr><td>Password<span class="form-mandatory">*</span></td>
			<td><input type="password" name="password" id="password" /></td></tr>
			
			<tr><td colspan="2" class="form-title">Merchant Information</td></tr>
			
			<tr><td>First name<span class="form-mandatory">*</span></td>
			<td><input type="text" name="firstname" id="firstname" /></td></tr>
			
			<tr><td>Last name<span class="form-mandatory">*</span></td>
			<td><input type="text" name="lastname" id="lastname" /></td></tr>
			
			<tr><td>Gender<span class="form-mandatory">*</span></td>
			<td><input type="radio" name="gender" id="gender" value="1"/>Male<br>
			<input type="radio" name="gender" id="gender" value="0"/>Female</td></tr>
			
			<tr><td>Individual/Company PAN</td>
			<td><input type="text" name="pan" id="pan" /></td></tr>
			
			<tr><td>Email<span class="form-mandatory">*</span></td>
			<td><input type="text" name="email" id="email" /></td></tr>
			
			<tr><td>Contact no.<span class="form-mandatory">*</span></td>
			<td><input type="text" name="contact_no" id="contact_no" /></td></tr>
			
			<tr><td>Fulfilment to the Customers by<span class="form-mandatory">*</span></td>
			<td><input type="radio" name="delivery" id="delivery" checked value="1"/><?php echo $title; ?><br>
			<input type="radio" name="delivery" id="delivery" value="0"/>Vendor</td></tr>
			
			<tr><td></td>
			<td><input type="checkbox" name="toc" id="toc" />I agree with Vendor Signup Terms & Conditions</td></tr>
			
			<tr><td></td>
			<td><button class="submitbutton" type="submit">Submit</button></td></tr>
			
			</form>
		</table>
	
	</div>

</body>
</html>