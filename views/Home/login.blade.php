<!-- this is the page for registration and login -->
<!-- registration and login tabs are both included here -->
<!-- success of registration/login will redirect to different pages 
according to different user behaviors -->
<!-- failure of registration/login will stay on this page -->

@extends("Home.base")
@section("bodycontent")
<script src="<?php echo asset("public/js/easyResponsiveTabs.js"); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo asset("public/js/nav.js"); ?>"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true   // 100% fit in a container
        });
    });
</script>

<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
    <ul class="resp-tabs-list">
      <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Register</span></li>
      <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Log In</span></li>
      <div class="clear"></div>
	</ul>
	<div class="resp-tabs-container about">
	    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
    	    <div class="col-sm-8 col-sm-offset-2">
    	    <h3>UNREGISTERED USER</h3>
			<p>Required fields are marked with *</p><br>
            <form action="<?php echo asset("usercreate"); ?>">
                <div class="form-group">
                	<label for="email">Email *</label>
                	<input type="email" name="email" class="form-control" id="email" required aria-describedby="email" placeholder="Enter Your Email">
                	<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                	<label for="username">Username *</label>
                	<input type="text" name="username" class="form-control" id="username" required placeholder="Enter Your Username">
                </div>
                <div class="form-group">
                	<label for="password">Password *</label>
                	<input type="password" name="password" class="form-control" id="password" required placeholder="Enter Your Password">
                </div>
                <div class="form-group">
                	<label for="cfmpassword">Confirm Password *</label>
                	<input type="password" class="form-control" id="cfmpassword" required placeholder="Confirm Your Password">
                </div>
                <div class="form-check">
                	<input type="checkbox" class="form-check-input is-invalid" required id="agreetoterms">
                	<label class="form-check-label" for="agreetoterms">Agree to Terms *</label>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
            </div>
			<div class="clearfix"></div>
	    </div>
        <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
        	<div class="col-sm-8 col-sm-offset-2">
    	    <h3>REGISTERED USER</h3>
			<p>Please log in with your username and password.</p><br>
            <form action="<?php echo asset("index"); ?>">
                <div class="form-group">
                	<label for="loginusername">Username</label>
                	<input type="text" class="form-control" id="loginusername" required aria-describedby="emailHelp" placeholder="Enter Your Username">
                </div>
                <div class="form-group">
                	<label for="loginpassword">Password</label>
                	<input type="password" class="form-control" id="loginpassword" required placeholder="Enter Your Password">
                	<a href="#">Forgot password?</a>
            	</div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            </div>
    		<div class="clearfix"></div>
        </div>
    </div>
</div>
@endsection