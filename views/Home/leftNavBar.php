<?php
$leftnavbar = isset($leftnavbar) ? $leftnavbar : "";
?>

<div class="col-md-3 sidebar_box">
	<div class="sidebar">
        <div class="menu_box">
            <h3 class="menu_head">Dashboard</h3>
            <ul class="menu">
                <li>
                	<a href="<?php echo asset("itemretrieve"); ?>" <?php if ($leftnavbar == "item") { echo "style='background:#aaa'"; } ?>>
                	Items
                	</a>
            	</li>
                <li>
                	<a href="<?php echo asset("userretrieve"); ?>" <?php if ($leftnavbar == "user") { echo "style='background:#aaa'"; } ?>>
                    Users
                    </a>
                </li>
                <li>
                	<a href="<?php echo asset("messageretrieve"); ?>" <?php if ($leftnavbar == "message") { echo "style='background:#aaa'"; } ?>>
                	Messages
                	</a>
            	</li>
                <li>
                	<a href="#">Personal Info</a>
            	</li>
                <li>
                	<a href="<?php echo asset("index"); ?>">Log Out</a>
            	</li>
            </ul>
        </div>
    </div>
</div>