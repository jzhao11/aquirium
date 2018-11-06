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
    		      <li><a href="#" style="color:black">Sell</a></li>
    		      <li><a href="#" style="color:black">Register / Log In</a></li>
    		</ul>
    	    <div class="clearfix"> </div>
    	</div>
    </div>
</div>


<?php
$search_txt = isset($search_txt) ? $search_txt : "";
$category = isset($category) ? $category : "";
?>
<div class="column_center">
  <div class="container">
	<div class="search">
	  <div class="stay">Search
		<select id="category_id" onchange="change(this.value)">
			<option value="0"></option>
        <?php
        foreach ($category as $e) {
        ?>
			<option value="<?php echo $e->id; ?>" <?php if ($e->id == $category_id) { echo "selected"; } ?>>
            <?php echo $e->title; ?>
			</option>
        <?php
        }
        ?>
	   </select>
	  </div> 
	  
	  <div class="stay_right">
		  <input type="text" value="<?php echo $search_txt; ?>" id="search_txt">  <!-- onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" -->
		  <input type="submit" value="" onclick="search()">
	  </div>
	  <div class="clearfix"> </div>
	</div>
    <div class="clearfix"> </div>
  </div>
</div>

@yield("child")

<div class="footer">
	<div class="container">
		<div class="col-md-3 f_grid1">
			<h3>About</h3>
			<h3><a href="<?php echo asset("index"); ?>" style="color:#df1f26;padding-left:0">AQUIRIUM</a></h3>
			<p>Aquirium is a buy-sell web application specifically designed for students at San Francisco State University (SFSU).</p>
		</div>
		<div class="col-md-3 f_grid1 f_grid2">
			<h3>Follow Us</h3>
			<ul class="social">
				<li><a href=""><i class="fb"> </i><p class="m_3">Facebook</p><div class="clearfix"> </div></a></li>
			    <li><a href=""><i class="tw"> </i><p class="m_3">Twittter</p><div class="clearfix"> </div></a></li>
				<li><a href=""><i class="google"> </i><p class="m_3">Google</p><div class="clearfix"> </div></a></li>
				<li><a href=""><i class="instagram"> </i><p class="m_3">Instagram</p><div class="clearfix"> </div></a></li>
			</ul>
		</div>
		<div class="col-md-6 f_grid3">
			<h3>Contact Info</h3>
			<ul class="list">
				<li><p>Phone: 1.415.xxx.xxxx</p></li>
				<li><p>Fax: 1.800.xxx.xxxx</p></li>
				<li><p>Email: <a href="mailto:info@aquirium.com">info@aquirium.com</a></p></li>
			</ul>
			<ul class="list1">
				<li><p>SFSU-Fulda Software Engineering Project CSC 648-848, Fall 2018. For Demonstration Only</p></li>
			</ul>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>

<div class="footer_bottom">
   	<div class="container">
   		<div class="cssmenu">
			<ul>
				<li><a href="login.html">Privacy Policy</a></li>
				<li><a href="checkout.html">Terms of Service</a></li>
				<li><a href="checkout.html">Creative Rights Policy</a></li>
				<li><a href="login.html">Contact Us</a></li>
				<li><a href="register.html">Support & FAQ</a></li>
			</ul>
		</div>
		<div class="copy">
		    <p>Copyright &copy; 2018. Aquirium All rights reserved. </p>
	    </div>
	    <div class="clearfix"> </div>
   	</div>
</div>