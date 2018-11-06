@extends("Home.base")
@section("bodycontent")
<script src="<?php echo asset("public/js/easyResponsiveTabs.js"); ?>" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>

<script type="text/javascript" src="<?php echo asset("public/js/nav.js"); ?>"></script>

<div id="horizontalTab" style="display: block; width: 100%; margin: 0px; background: #f7f7f7;">
  <ul class="resp-tabs-list">
  	  <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Register</span></li>
	  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Log In</span></li>
	  <div class="clear"></div>
  </ul>				  	 
	<div class="resp-tabs-container">
	    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
	    	<div class="col-md-6 login-right">
			  	<h3>UNREGISTERED USERS</h3>
				<p>Required fields are marked with *</p>
				<form>
				  <div>
					<span>Username *</span>
					<input type="text"> 
				  </div>
				  <div>
					<span>SFSU ID</span>
					<input type="text"> 
				  </div>
				  <div>
					<span>Email Address *</span>
					<input type="text"> 
				  </div>
				  <div>
					<span>Password *</span>
					<input type="text">
				  </div>
				  <div>
					<span>Confirm Password *</span>
					<input type="text">
				  </div>
				  <div>
				    <input type="checkbox" id="terms"><i></i>Agree to Terms
				  	<!-- 
				  	<a class="news-letter" href="#">
						 <label class="checkbox">
						 <input type="checkbox" id="terms"><i></i>Agree to Terms
						 </label>
					</a>
					 -->
				  </div>
				  
				  <input type="button" value="Register" onclick="register()">
				  <!-- <input type="submit" value="Register" onclick="register()"> -->
			    </form>
			   </div>	
		   <div class="clearfix"></div>
	    </div>	
	    </div>	
	    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
	    	<div class="col-md-6 login-right">
			  	<h3>REGISTERED USERS</h3>
				<p>Please log in with your username and password.</p>
				<form>
				  <div>
					<span>Username</span>
					<input type="text"> 
				  </div>
				  <div>
					<span>Password</span>
					<input type="text">
					<a class="forgot" href="#">Forgot Password?</a>
				  </div>
				  
				  <input type="button" value="Login">
				  <!-- <input type="submit" value="Login"> -->
			    </form>
			   </div>	
		   <div class="clearfix"></div>
	    </div>	
	 </div>
@endsection