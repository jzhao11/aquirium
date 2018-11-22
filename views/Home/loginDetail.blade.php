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
	    <h3>LOG IN</h3><br>
        <form action="<?php echo asset("login"); ?>" data-toggle="validator" role="form">
            <div class="form-group">
                <label for="username" class="control-label">Usernme *</label>
                <input type="text" class="form-control" id="username" data-minlength="6" placeholder="Enter Username" data-error="This username is invalid." required>
            	<div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
            	<label for="password" class="control-label">Password *</label>
                <input type="password" class="form-control" id="password" data-minlength="6" placeholder="Enter Password" required>
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary">LOG IN</button>
            </div>
        </form>
    </div>
	<div class="clearfix"></div>
</div>
@endsection