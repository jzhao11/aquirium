<!-- this is the page for registration and login -->
<!-- registration and login tabs are both included here -->
<!-- success of registration/login will redirect to different pages 
according to different user behaviors -->
<!-- failure of registration/login will stay on this page -->

@extends("Home.base")
@section("bodycontent")
<script type="text/javascript" src="<?php echo asset("public/lib/bootstrap/js/validator.js"); ?>"></script>

<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
	    <h3>LOG IN</h3><br>
        <form id="login" data-toggle="validator" role="form">
            <div class="form-group">
                <label for="username" class="control-label">Username *</label>
                <input type="text" class="form-control" id="username" data-minlength="4" placeholder="Enter Username" data-error="Minimum of 4 characters" required>
            	<div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
            	<label for="password" class="control-label">Password *</label>
                <input type="password" class="form-control" id="password" data-minlength="6" placeholder="Enter Password" data-error="Minimum of 6 characters" required>
            	<div class="help-block with-errors"></div>
            	<a>Forgot Password?</a>
            </div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary">LOG IN</button>
            </div>
            <div id="msg"></div>
        </form>
    </div>
	<div class="clearfix"></div>
</div>
<script>
$("#login").validator().on("submit", function (e) {
    if (!e.isDefaultPrevented()) {
    	e.preventDefault();
    	login();
    }
});

function login(){
	var redirection = "<?php echo session("redirection"); ?>";
    $.ajax ({
        url: "<?php echo url("login")?>",
        type: "POST",
        data: {
            "username":$("#username").val(),
			"password":$("#password").val()
		},
        success: function (rst) {
            if (rst == -1) {
				alert("This username does not exist!");
            } else if (rst == -2) {
            	alert("This password is incorrect!");
            } else {
                location.href = redirection;
            }
        }
    });
}
</script>
@endsection