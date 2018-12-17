<!-- this is the detail for message that has been sent -->
<!-- the item and message information is shown to the user -->
<!-- any user should not be allowed to modified the message -->

<?php
$message = isset($message) ? $message : "";
?>

@extends("Home.base")
@section("bodycontent")
@include("Home.searchbar")

<div class="container">
	<div class="col-sm-6 col-sm-offset-3">
		<h3>MESSAGE DETAILS</h3><br>
		<form method="post">
			<div class="form-group">
				<button type="button" class="btn" onclick="location.href='messageretrieve'">BACK TO DASHBOARD</button>
			</div>
			<div class="form-group">
				<label class="control-label label-font">Item Title</label>
				<p><?php echo $message->title; ?></p>
			</div>
			<div class="form-group">
				<img src="<?php echo asset($message->title_img); ?>" class="img-thumbnail rounded"><br>
			</div>
			<div class="form-group">
				<label class="control-label label-font">Price</label>
				<p>$<?php echo $message->price; ?></p>
			</div>
			<div class="form-group">
				<label class="control-label label-font">Sent From</label>
				<p><?php echo $message->from_username; ?></p>
			</div>
			<div class="form-group">
				<label class="control-label label-font">Sent To</label>
				<p><?php echo $message->to_username; ?></p>
			</div>
			<div class="form-group">
				<label class="control-label label-font">Message</label>
				<p><?php echo $message->content; ?></p>
			</div>
		</form>
	</div>
</div>
@endsection