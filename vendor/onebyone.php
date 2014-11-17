<?php 
session_start(); 
include_once "config.php";
include_once "libs/lib.php";

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
			<form enctype="multipart/form-data" name="product_upload" method="POST" action="product_upload.php">
			<div class="page-header">
				<div class="page-head">One by One Product Upload</div>
				<div class="page-options">
					<a href="javascript:void(0);" onClick="validateOnebyOneUpload()"><span class="page-options-save"></span></button>
					<a href="cpanel.php"><span class="page-options-cancel"></span></a>
				</div>
			</div>
			<div class="clearfix"></div>
			
			<ul class="tabs group">
				<li><a class="active" href="#/one">General</a></li>
				<li><a href="#/two">Data</a></li>
				<li><a href="#/three">SEO</a></li>
			</ul>
			
			<div id="panels">
			
				<p id="one">
					<table class="product-upload-one">
						<tr><td style="width:400px;">Product Title<span class="form-mandatory">*</span></td><td><input type="text" name="product_name" id="product_name" style="width:100%;"></td></tr>
						<tr><td colspan="2"><hr></td></tr> <!--Divider -->
						<tr><td>Product Description<span class="form-mandatory">*</span></td><td><textarea name="product_desc" id="product_desc" style="width:100%;height:200px;"></textarea></td></tr>
						<tr><td colspan="2"><hr></td></tr> <!--Divider -->
						<tr><td style="width:400px;">Search keywords</td><td><input type="text" name="tag" id="tag" style="width:100%;"></td></tr>
					</table>
				</p>
				
				<p id="two">
					<table class="product-upload-one">
						<tr><td style="width:400px;">Model<span class="form-mandatory">*</span></td><td><input type="text" name="model" id="model"></td></tr>
						<tr><td colspan="2"><hr></td></tr> <!--Divider -->
						<tr><td>Category<span class="form-mandatory">*</span>
						<br><span style="font-size:12px;">Categories are need to be selected until the last category</span>
						</td><td>
						<select id="root-cats" onChange="getSubCats(this.value)" style="float:left;">
							<option value="-1">Select Category</option>
						<?php 
							$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);	
							$query = "SELECT * FROM mv_category WHERE parent_id=0";
							$result = mysqli_query($con,$query);
							$cats = "";
							while($row = mysqli_fetch_array($result)){
								echo "<option value='".$row['category_id']."'>".$row['category_name']."</option>";
							}
							mysqli_close($con);
						?>
						</select>
						<div id="sub-cats-container" style="float:left;margin-left:10px;"></div>
						<div id="last-cats-container" style="float:left;margin-left:10px;"></div>
						</td></tr>
						<tr><td colspan="2"><hr></td></tr> <!--Divider -->
						<tr><td style="width:400px;">M.R.P. (Rs.)</td><td><input type="text" name="price" id="price"></td></tr>
						<tr><td colspan="2"><hr></td></tr> <!--Divider -->
						<tr><td style="width:400px;">Selling Price (Rs.)<span class="form-mandatory">*</span></td><td><input type="text" name="special_price" id="special_price"></td></tr>
						<tr><td colspan="2"><hr></td></tr> <!--Divider -->
						<tr><td style="width:400px;">Image file<span class="form-mandatory">*</span></td><td><input type="file" name="image" id="image"></td></tr>
					</table>
				</p>
				
				<p id="three">
					<table class="product-upload-one">
						<tr><td style="width:400px;">Page title</td><td><input type="text" name="product_name" style="width:100%;"></td></tr>
						<tr><td colspan="2"><hr></td></tr> <!--Divider -->
						<tr><td>Meta Description</td><td><textarea name="meta_desc" style="width:100%;height:200px;"></textarea></td></tr>
						<tr><td colspan="2"><hr></td></tr> <!--Divider -->
						<tr><td>Meta Keywords</td><td><textarea name="meta_keywords" style="width:100%;height:200px;"></textarea></td></tr>
					</table>
				</p>
			</div>
			</form>
		
		</div>
		
<script>
(function($) {
 
 var tabs =  $(".tabs li a");
   
 tabs.click(function() {
    var panels = this.hash.replace('/','');
    tabs.removeClass("active");
    $(this).addClass("active");
    $("#panels").find('p').hide();
    $(panels).fadeIn(200);
 });
 
})(jQuery);
</script>
	
	<?php include_once "common/footer.php"; ?> <!-- Footer -->

</div>

</body>
</html>
