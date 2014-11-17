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
<link rel="stylesheet" type="text/css" href="css/jquerysctipttop.css">

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
				<div class="page-head">Manage Products</div>
				<div class="page-options">
				</div>
			</div>
			<div class="clearfix"></div>

		<div class="product-list">
			<table border="1">
				<tr><td>Image</td><td>Product Name</td><td>Model</td><td>Price</td><td>Quantity</td><td>Status</td><td>Action</td></tr>
				<tr><td style="background:#E9F7FF;"><div style="width:60px;padding:11px;"></div></td>
				<td style="background:#E9F7FF;"><input name="name" type="text"></td>
				<td style="background:#E9F7FF;"><input name="model" type="text"></td>
				<td style="background:#E9F7FF;"><input name="price" type="text"></td>
				<td style="background:#E9F7FF;"><input name="quantity" type="text"></td>
				<td style="background:#E9F7FF;"><input name="status" type="text"></td>
				<td style="background:#E9F7FF;">Edit Delete</td></tr>
				
			</table>
		</div>
		
		
		</div>

	<?php include_once "common/footer.php"; ?> <!-- Footer -->

</div>

</body>
</html>
