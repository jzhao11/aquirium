<!-- this is the common left nav bar for dashboard -->
<!-- user priority to be checked after login -->
<!-- the "Items" tab is visible to registered user and admin user -->
<!-- the "Messages" tab is visible to registered user and admin user -->
<!-- the "Users" tab is only visible to admin user -->

<?php
$leftnavbar = isset($leftnavbar) ? $leftnavbar : "";
?>

<div class="col-md-3 sidebar_box">
	<div class="sidebar">
        <div class="menu_box">
            <h3 class="menu_head">
            <?php echo session("user_name")."'s"; ?><br><br>
            <?php echo session("user_priority") ? "Admin Dashboard" : "Seller Dashboard"; ?>
            </h3>
            <ul class="menu">
                <li>
                	<a href="<?php echo asset("itemretrieve"); ?>" <?php if ($leftnavbar == "item") { echo "style='background:#aaa'"; } ?>>
                	Items
                	</a>
            	</li>
            	<?php
            	if (session("user_priority") == 1) {?>
                <li>
                	<a href="<?php echo asset("userretrieve"); ?>" <?php if ($leftnavbar == "user") { echo "style='background:#aaa'"; } ?>>
                    Users
                    </a>
                </li>
                <?php
            	}
            	?>
                <li>
                	<a href="<?php echo asset("messageretrieve"); ?>" <?php if ($leftnavbar == "message") { echo "style='background:#aaa'"; } ?>>
                	Messages
                	</a>
            	</li>
                <!-- <li><a href="#">Personal Info</a></li> -->
            </ul>
        </div>
    </div>
</div>