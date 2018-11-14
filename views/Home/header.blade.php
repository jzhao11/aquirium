<!-- this is the common header for all other pages -->
<!-- top navigation bar is defined here -->
<!-- user priority to be checked after login -->

<div class="header">
    <div class="h_menu4">
        <div class="container">
            <a href="<?php echo asset("index"); ?>" style="color:white;padding-left:1em;padding-right:1em">Home</a>
            <a href="<?php echo asset("about"); ?>" style="color:white;padding-left:1em;padding-right:1em" target="new_window">Team</a>
        </div>
    </div>
    <div class="header_top">
    	<div class="container">
    		<div class="logo">
    			<h3><a href="<?php echo asset("index"); ?>" style="color:#df1f26;padding-left:0.5em;">AQUIRIUM</a></h3>
    		</div>
    		<ul class="shopping_grid">
                <li><a href="<?php echo asset("itemcreatedetail"); ?>" style="color:black">Sell</a></li>
                <li><a href="<?php echo asset("logindetail"); ?>" style="color:black">Register / Log In</a></li>
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
                            <div style="height:1.5em"><a style="color:black;" class="dropdown-item" href="<?php echo asset("index"); ?>">Log Out</a></div>
                        </div>
                    </div>
                </li>
    		</ul>
    	    <div class="clearfix"> </div>
    	</div>
    </div>
</div>