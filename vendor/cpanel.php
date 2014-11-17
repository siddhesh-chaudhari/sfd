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

	<?php include_once "common/header.php"; ?> <!--Header menu -->
	
		<div class="page-container">
			<div class="page-header">
				<div class="page-head">Overview</div>
			</div>
		
		</div>
	
	<?php include_once "common/footer.php"; ?> <!-- Footer -->

</div>

</body>
</html>
