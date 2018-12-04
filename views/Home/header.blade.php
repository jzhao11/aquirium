<!-- this is the common header for all other pages -->
<!-- top navigation bar is defined here -->
<!-- user priority to be checked after login -->

<div class="header">
	<!-- 
    <div class="h_menu4">
        <div class="container">
            <a href="<?php echo asset("index"); ?>" style="color:white;padding-left:1em;padding-right:1em">Home</a>
            <a href="<?php echo asset("about"); ?>" style="color:white;padding-left:1em;padding-right:1em" target="new_window">Team</a>
        </div>
    </div>
     -->
    <div class="header_top">
		<div class="col-md-6 logo">
			<h3><a href="<?php echo asset("index"); ?>" style="color:#EE9A00;padding-left:0.5em;">AQUIRIUM</a></h3>
		</div>
		<div class="pull-right">
    		<ul class="shopping_grid pull-right">
    			<li><a href="<?php echo asset("about"); ?>" style="color:black" target="new_window">Team</a></li>
                <li><a href="<?php echo asset("itemcreatedetail"); ?>" target="sell" style="color:black">Post</a></li>
                <?php
                if (session("user_id")) {
                ?>
                <li>
    				<div class="dropdown show">
                        <a class="dropdown-toggle" href="#" role="button" style="color:black" 
                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        	Dashboard
                        </a>
                    
                    	<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    		<div style="height:1.5em"><a style="color:black;" class="dropdown-item" href="<?php echo asset("itemretrieve"); ?>">Items</a></div>
                            <div style="height:1.5em"><a style="color:black;" class="dropdown-item" href="<?php echo asset("userretrieve"); ?>">Users</a></div>
                            <div style="height:1.5em"><a style="color:black;" class="dropdown-item" href="<?php echo asset("messageretrieve"); ?>">Messages</a></div>
                        </div>
                    </div>
                </li>
                <li><a href="<?php echo asset("logout"); ?>" style="color:black">Log Out</a></li>
                <?php
                } else {
                ?>
                <li>
                	<a href="<?php echo asset("registerdetail"); ?>" style="color:black">Register</a>
            	</li>
                <li>
					<a href="<?php echo asset("logindetail"); ?>" style="color:black">Log In</a>
				</li>
                <?php
                }
                ?>
    		</ul>
		</div>
	    <div class="clearfix"> </div>
    </div>
</div>