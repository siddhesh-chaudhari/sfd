<?php 
session_start(); 
include_once "config.php";

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

<script>
$( document ).ready(function() {
	updateTime();
    setInterval(updateTime, 1000);
});

</script>

</head>
<body>

<div class="main-page">	<!--Main Container -->

	<div style="font-family:journal-icons;">
		
	</div>
	
</div>

</body>
</html>
