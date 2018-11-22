<!-- this is the page for registration and login -->
<!-- registration and login tabs are both included here -->
<!-- success of registration/login will redirect to different pages 
according to different user behaviors -->
<!-- failure of registration/login will stay on this page -->

@extends("Home.base")
@section("bodycontent")
<script type="text/javascript" src="<?php echo asset("public/lib/bootstrap/js/validator.js"); ?>"></script>

<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
    <div class="col-sm-8 col-sm-offset-2">
	    <h3>REGISTRATION</h3>
		<p>Required fields are marked with *</p><br>
        <form action="<?php echo asset("register"); ?>" data-toggle="validator" role="form">
            <div class="form-group">
                <label for="username" class="control-label">Usernme *</label>
                <input type="text" class="form-control" name="username" id="username" data-minlength="6" placeholder="Enter Username" data-error="This username is invalid." required>
            	<div class="help-block with-errors">Minimum of 6 characters</div>
            </div>
            <div class="form-group">
            	<label for="email" class="control-label">Email *</label>
            	<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" data-error="This email address is invalid." required>
            	<div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
            	<label for="stu_id" class="control-label">SFSU ID</label>
            	<input type="number" class="form-control" name="stu_id" id="stu_id" placeholder="Enter SFSU ID">
            </div>
            <div class="form-group">
            	<label for="password" class="control-label">Password *</label>
                <input type="password" class="form-control" name="password" id="password" data-minlength="6" placeholder="Enter Password" required>
            	<div class="help-block">Minimum of 6 characters</div>
            </div>
            <div class="form-group">
            	<label for="passwordconfirmation" class="control-label">Confirm Password *</label>
                <input type="password" class="form-control" id="passwordconfirmation" data-match="#password" data-match-error="This confirmation does not match the passord." placeholder="Confirm Password" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <input type="checkbox" id="terms" data-error="You need to agree to the terms." required>
                <label for="inputPassword" class="control-label">Agree to Terms *</label>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" onclick="confirmmsg('You have successfully registered!')">REGISTER</button>
            </div>
        </form>
    </div>
	<div class="clearfix"></div>
</div>
@endsection