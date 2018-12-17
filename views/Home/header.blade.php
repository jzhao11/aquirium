<!-- this is the common header for all other pages -->
<!-- top navigation bar is defined here -->
<!-- user priority to be checked after login -->
<!-- bootstrap.min.css necessary for top nav bar and search bar -->
<link href="<?php echo asset("public/lib/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />

<nav class="navbar navbar-default" style="margin-bottom:0">
<div class="container">
    <div class="navbar-header">
		<a href="<?php echo asset("index"); ?>" class="navbar-brand" style="color:#EE9A00">AQUIRIUM</a>
    	<p class="navbar-text">SFSU Software Engineering Project (Demonstration Only)</p>
    </div>
    <div class="navbar-collapse">
		<ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo asset("about"); ?>" target="new_window">Team</a></li>
            <li><a href="<?php echo asset("itemcreatedetail"); ?>" target="sell">Post</a></li>
            <?php
            if (session("user_id")) {
            ?>
            <li><a href="<?php echo asset("itemretrieve"); ?>">Dashboard</a></li>
            <li><a href="<?php echo asset("logout"); ?>">Log Out</a></li>
            <?php
            } else {
            ?>
            <li><a href="<?php echo asset("registerdetail"); ?>">Register</a></li>
            <li><a href="<?php echo asset("logindetail"); ?>">Log In</a></li>
            <?php
            }
            ?>
		</ul>
	</div><!-- /.navbar-collapse -->
</div><!-- /.container -->
</nav><!-- /.navbar -->