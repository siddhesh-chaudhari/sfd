<header class="header">
		<div class="logo"></div>
		
		<div class="header-top">
			<div class="header-time" id="header-time"></div>
			<div class="header-title">
				<div class="header-title-main">Vendor Panel</div>
				<div>Version 1.0.1</div>
			
			</div>
			
			<div class="header-account-status">Welcome <?php echo $_SESSION['firstname']?>, (<a href="javascript:void(0)" class="logout-text" onClick="logout()">Logout</a>) </div>
			<div class="clearfix"></div>
		</div>
		
		<div class="header-main-menu">
		
			<div id='cssmenu'> <!-- Menu Start -->
				<ul>
					<li><a href='<?php echo constant('site_path');?>/vendor/cpanel.php' class='active'><span style="font-family:journal-icons;"></span></a></li>
					<li class='has-sub'><a href='#'><span>Fullfillment</span></a>
						<ul>
							<li><a href='#'><span>View Orders</span></a></li>
							<li><a href='#'><span>Dispatch Orders</span></a></li>
							<li class="last"><a href='#'><span style="">Invoice Manager</span></a></li>
						</ul>
					</li>
					<li class='has-sub'><a href="#"><span>Catalog</span></a>
						<ul>
							<li><a href='<?php echo constant('site_path');?>/vendor/myproducts.php'><span>Manage Products</span></a></li>
							<li class='has-sub'><a href='#'><span>New Product Upload</span></a>
								<ul>
									<li><a href='<?php echo constant('site_path');?>/vendor/onebyone.php'><span>One by One Upload</span></a></li>
									<li class='last'><a href='#'><span>Bulk Upload</span></a></li>
								</ul>
							</li>
							<li><a href='#'><span>Bulk Inventory Update</span></a></li>
							<li class='last'><a href='#'><span><?php echo $title; ?> Categoris</span></a></li>
						</ul>
					</li>
					<li class='has-sub'><a href='#'><span>Reports</span></a>
						<ul>
							<li class='last'><a href='#'><span>Order Reports</span></a></li>
						</ul>
					</li>
					<li class='has-sub'><a href='#'><span>Messages</span></a>
						<ul>
							<li><a href='#'><span>Announcements</span></a></li>
							<li class='last'><a href='#'><span>My Messages</span></a></li>
						</ul>
					</li>
					<li class='has-sub'><a href='#'><span>Settings</span></a>
						<ul>
							<li><a href='#'><span>Password Change</span></a></li>
							<li><a href='<?php echo constant('site_path');?>/vendor/contact_info.php'><span>Contact Information</span></a></li>
							<li><a href='#'><span>Payment Settings</span></a></li>
							<li class='last'><a href='#'><span>Store Setup</span></a></li>
						</ul>
					</li>
					<?php if($_SESSION['gid']==0){?> <!-- Admin menu -->
					<li class='has-sub'><a href='#'><span>Admin</span></a>
						<ul>
							<li><a href='#'><span>User Management</span></a></li>
							<li><a href='#'><span>Product Approval</span></a></li>
							<li><a href='#'><span>Product Management</span></a></li>
							<li class="has-sub"><a href='#'><span>Messages</span></a>
								<ul>
									<li><a href='#'><span>Send Message</span></a></li>
									<li class="last"><a href='#'><span>Announcement</span></a></li>
								</ul>
							</li>
							<li><a href='#'><span>Orders Management</span></a></li>
							<li><a href='<?php echo constant('site_path');?>/vendor/admin/categories.php'><span>Category Management</span></a></li>
							<li><a href='#'><span>Query Helpdesk</span></a></li>
							<li class='last'><a href='#'><span>Advanced Settings</span></a></li>
						</ul>
					</li>
					<?php } ?>
					<li class='last has-sub'><a href='#'><span>Information</span></a>
						<ul>
							<li><a href='#'><span>Agreements</span></a></li>
							<li><a href='#'><span>Raise query</span></a></li>
							<li><a href='#'><span>Help</span></a></li>
						</ul>
					</li>
				</ul>
			</div>  <!-- Menu End -->
		</div> 
	</header>