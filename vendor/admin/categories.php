<?php 
session_start(); 
include_once "../config.php";

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

<link rel="stylesheet" type="text/css" href="../css/style.css">
<link rel="stylesheet" type="text/css" href="../css/hover.css">
<link rel="stylesheet" type="text/css" href="../css/menu.css">
<link rel="stylesheet" type="text/css" href="../css/jquerysctipttop.css">

<script src="../js/jquery-2.1.1.min.js"></script>
<script src="../js/functions.js"></script>
<script src="js/admin.js"></script>

<script>
$( document ).ready(function() {
	updateTime();
    setInterval(updateTime, 1000);
});
</script>

</head>
<body class="body-background">

<!-- Overlay -->
<div class="blackoverlay" id="blackoverlay"></div>
<div class="lightbox" id="lightbox" style="width:540px;height:432px;"> <!-- Main box -->
	<div class="internal-box" id="internal-box" style="width:500px;height:390px;">
		<table class="reg-table" style="width:100%;">
			<tr><td colspan="2" class="table-title">ADD NEW CATEGORY</td></tr>
			
			<tr><td>Category Name</td><td><input type="text" name="cat_name" id="cat_name"/></td></tr>
			
			<tr><td>Parent</td><td>
			<select name="parent" id="parent">
				<option value="0">ROOT</option>
				<?php $con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
						$query = "SELECT * FROM mv_category";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result)){ ?>
						<option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name']." (".$row['category_id'].")";?></option>
					<?php } ?>
			</select>
			</td></tr>
			
			<tr><td>Portal Category ID</td><td>
			<select name="category_oc_id" id="category_oc_id">
				<?php
					$query = "SELECT * FROM ".$db_prefix."category_description";
					$result = mysqli_query($con,$query);
					while($row=mysqli_fetch_array($result)){ ?>
						<option value="<?php echo $row['category_id'];?>"><?php echo $row['name']." (".$row['category_id'].")";?></option>
					<?php } 
					mysqli_close($con);
					?>
			</td></tr>
			
			<tr><td>Status</td><td>
			<select name="cat_status" id="cat_status">
				<option value="1">Enabled</option>
				<option value="0">Disabled</option>
			</select>
			</td></tr>
			
			<tr><td>Approval required</td><td>
			<select name="req_approval" id="req_approval">
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>
			</td></tr>
			
			<tr><td></td><td><button class="submitbutton" onClick="addCategory()">Save</button> &nbsp;<a href="javascript:void(0)" onclick="hideLightbox()" class="submitbutton">Cancel</a></td></tr>
		</table>
	</div>
</div><!-- Overlay Ends -->

<div class="lightbox" id="lightbox-edit" style="width:540px;height:432px;"> <!-- Edit box -->
	<div class="internal-box" id="internal-box" style="width:500px;height:390px;">
		<table class="reg-table" style="width:100%;">
			<tr><td colspan="2" class="table-title">EDIT CATEGORY</td></tr>
			
			<tr><td>Category Name</td><td><input type="text" name="cat_name_u" id="cat_name_u"/></td></tr>
			
			<tr><td>Parent</td><td>
			<select name="parent_u" id="parent_u">
				<option value="0">ROOT</option>
				<?php $con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
						$query = "SELECT * FROM mv_category";
						$result = mysqli_query($con,$query);
						while($row=mysqli_fetch_array($result)){ ?>
						<option value="<?php echo $row['category_id'];?>"><?php echo $row['category_name']." (".$row['category_id'].")";?></option>
					<?php } ?>
			</select>
			</td></tr>
			
			<tr><td>Portal Category ID</td><td>
			<select name="category_oc_id_u" id="category_oc_id_u">
				<?php
					$query = "SELECT * FROM ".$db_prefix."category_description";
					$result = mysqli_query($con,$query);
					while($row=mysqli_fetch_array($result)){ ?>
						<option value="<?php echo $row['category_id'];?>"><?php echo $row['name']." (".$row['category_id'].")";?></option>
					<?php } 
					mysqli_close($con);
					?>
			</td></tr>
			
			<tr><td>Status</td><td>
			<select name="cat_status_u" id="cat_status_u">
				<option value="1">Enabled</option>
				<option value="0">Disabled</option>
			</select>
			</td></tr>
			
			<tr><td>Approval required</td><td>
			<select name="req_approval_u" id="req_approval_u">
				<option value="0">No</option>
				<option value="1">Yes</option>
			</select>
			<input type="hidden" id="cat_id" value="" />
			</td></tr>
			
			<tr><td></td><td><button class="submitbutton" onClick="updateCategory()">Save</button> &nbsp;<a href="javascript:void(0)" onclick="hideeditLightbox()" class="submitbutton">Cancel</a></td></tr>
		</table>
	</div>
</div><!-- Edit box Ends -->

<div class="main-page">	<!--Main Container -->
	
	<?php include_once "../common/header.php"; ?> <!-- Header -->
	
		<div class="page-container">
			<div class="page-header">
				<div class="page-head">Manage Categories</div>
				<div class="page-options">
					<a href="javascript:void(0);" onClick="showLightbox()"><span class="page-options-save"></span></a>
				</div>
			</div>
			<div class="clearfix"></div>

		<div class="product-list">
			<table border="1">
				<tr><td style="width:10%;">Category ID</td><td style="width:60%;">Category Name</td><td>Category Portal ID</td><td>Status</td><td>Action</td></tr>
				<tr>
				<td style="background:#E9F7FF;text-align:center;"><input name="category_id" type="text"></td>
				<td style="background:#E9F7FF;text-align:center;"><input name="category_name" type="text"></td>
				<td style="background:#E9F7FF;text-align:center;"><input name="category_oc_id" type="text"></td>
				<td style="background:#E9F7FF;text-align:center;"><select name="status"><option value="1">Enabled</option><option value="0">Disabled</option></select></td>
				<td style="background:#E9F7FF;text-align:center;"><button class="submitbutton">Filter</button></td></tr>
				
				<?php
					$con = mysqli_connect($db_hostname,$db_username,$db_password,$db_database);
					$query = "SELECT * FROM mv_category";
					$result = mysqli_query($con,$query);
					while($row=mysqli_fetch_array($result)){
						$name=array();
						array_push($name,$row['category_name']);
						$check=$row['parent_id'];
						
						while($check!=0){
							$query2 = "SELECT * FROM mv_category WHERE category_id='$check'";
							$result2 = mysqli_query($con,$query2);
							$row2=mysqli_fetch_array($result2);
							
							array_push($name,$row2['category_name']);
							$check=$row2['parent_id'];
						} ?>
						<tr><td><?php echo $row['category_id']; ?></td>
							<td><?php $new="";$name = array_reverse($name);foreach($name as $n){ $new .=" > ".$n; }echo ltrim($new," > "); ?></td>
							<td><?php echo $row['category_oc_id']; ?></td>
							<td><?php if($row['status']==1){echo "<span style='color:green'>Enabled</span>";}else{echo "<span style='color:red'>Disabled</span>";} ?></td>
							<td><div class="action-container"><span class="edit-item" <?php echo "onClick=editLightbox(".$row['category_id'].",".$row['parent_id'].",".$row['category_oc_id'].",".$row['status'].",".$row['req_approval'].",'".$row['category_name']."')"; ?>></span>
							<span class="delete-item" <?php echo "onClick=deleteCategory(".$row['category_id'].")";?>></span></div></td>
						</tr>
					<?php	
					}

					mysqli_close($con);		
				?>
			</table>
		</div>
		
		
		</div>

	<?php include_once "../common/footer.php"; ?> <!-- Footer -->

</div>

</body>
</html>
