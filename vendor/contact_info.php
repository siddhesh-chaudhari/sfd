<?php 
session_start(); 
include_once "config.php";

if(!isset($_SESSION['loggedin'])){
	header("location:index.php",true);
}
?>
<html>
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

<script>
$( document ).ready(function() {
	updateTime();
    setInterval(updateTime, 1000);
});

</script>

</head>
<body class="body-background">

<div class="main-page">	<!--Main Container -->
	
	<?php include_once "common/header.php"; ?> <!-- Header -->
	
		<div class="page-container">
			<div class="page-header">
				<div class="page-head">Contact Information</div>
				<div class="page-options">
					<span class="page-options-save"></span>
					<a href="cpanel.php"><span class="page-options-cancel"></span></a>
				</div>
			</div>
			<div class="clearfix"></div>
			
			<div class="row2">
				<div class="row-header">General Information</div>
				
				<table class="info-table">
					<tr><td>First Name</td><td><input type="text" name="firstname" value="<?php echo $_SESSION['firstname'] ?>"></td></tr>
					
					<tr><td>Last Name</td><td><input type="text" name="lastname" value="<?php echo $_SESSION['lastname'] ?>"></td></tr>
					
					<tr><td>Gender</td><td><input type="radio" name="gender" value="male" <?php if($_SESSION['gender']==1){echo "checked";}?>>Male<br><input type="radio" name="gender" value="female" <?php if($_SESSION['gender']==0){echo "checked";}?>>Female</td></tr>
					
					<tr><td>Email Address</td><td><?php echo $_SESSION['email']; ?></td></tr>
					
					<tr><td>Login user ID</td><td><?php echo $_SESSION['username']; ?></td></tr>
					
				</table>
			</div>
			
			<div class="row2">
				<div class="row-header">Legal Information</div>
				
				<table class="info-table">
				<?php $con = $con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
					$query = "SELECT * FROM mv_user WHERE user_id='".$_SESSION['id']."'";
					$result = mysqli_query($con,$query);
					
					while($row=mysqli_fetch_array($result)){ ?>

					<tr><td>Company Name</td><td><input type="text" name="company_name" value="<?php echo $row['company_name'] ?>"></td></tr>
					
					<tr><td>Pan No.</td><td><input type="text" name="pan" value="<?php echo $row['pan_no'] ?>"></td></tr>
					
					<tr><td>Address</td><td><textarea name="address"><?php echo $row['address'] ?></textarea></td></tr>
					
					<tr><td>City</td><td><input type="text" name="city" value="<?php echo $row['city'] ?>"></td></tr>
					
					<tr><td>Country</td><td><input type="text" name="country" value="<?php echo $row['country'] ?>"></td></tr>
					
					<tr><td>Pin code</td><td><input type="text" name="pincode" value="<?php echo $row['pincode'] ?>"></td></tr>
					<?php } 
						mysqli_close($con);
					?>
				</table>
			</div>
			
		
		</div>
	
	<?php include_once "common/footer.php"; ?> <!-- Footer -->

</div>

</body>
</html>
