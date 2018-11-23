<!-- this is the detail for contacting seller -->
<!-- title image of the item is pre-filled -->
<!-- the usernames for buyer (FROM) and seller (TO) are pre-filled -->
<!-- the pre-filled fields are disabled to change -->

@extends("Home.base")
@section("bodycontent")
<div class="about">
	<div class="container">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="contact-form">
				<form method="post" action="#">
					<div class="form-group">
						<label>Item:</label>
						<img src="<?php echo asset("public/img/p5.jpg"); ?>" class="img-thumbnail rounded"><br>
						Title of the item
					</div>
					<div class="form-group">
						<label>Price:</label>$12
					</div>
					<div class="form-group">
						<label>To:</label>Seller Username
					</div>
					<div class="form-group">
						<label>From:</label>Buyer Username
					</div>
					<div class="form-group">
						<label>Message:</label>
						<textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your message here...';}">Enter your message here...</textarea>
					</div>
					<button type="button" class="btn" onclick="cancel()">CANCEL</button>
					<button type="button" class="btn btn-primary pull-right" style="margin-right:5%">SEND</button>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection