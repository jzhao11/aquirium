<!-- this is the detail for contacting seller -->
<!-- title image of the item is pre-filled -->
<!-- the usernames for buyer (FROM) and seller (TO) are pre-filled -->
<!-- the pre-filled fields are disabled to change -->

<?php
$item = isset($item) ? $item : "";
?>

@extends("Home.base")
@section("bodycontent")
<div class="container">
	<div class="col-sm-6 col-sm-offset-3">
		<h3>SEND A MESSAGE TO THE SELLER</h3><br>
		<form method="post">
			<div class="form-group">
				<label class="control-label label-font">Item Title</label>
				<p><?php echo $item->title; ?></p>
			</div>
			<div class="form-group">
				<img src="<?php echo asset($item->title_img); ?>" class="img-thumbnail rounded"><br>
			</div>
			<div class="form-group">
				<label class="control-label label-font">Price</label>
				<p>$<?php echo $item->price; ?></p>
			</div>
			<div class="form-group">
				<label class="control-label label-font">Sent From</label>
				<p><?php echo session("user_name"); ?></p>
			</div>
			<div class="form-group">
				<label class="control-label label-font">Sent To</label>
				<p><?php echo $item->username; ?></p>
			</div>
			<div class="form-group">
				<label class="control-label label-font">Message</label>
				<div class="contact-form"><textarea required id="content"></textarea></div>
				<!-- <textarea required onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your message here...';}">Enter your message here...</textarea> -->
			</div>
			<div class="form-group">
                <button type="button" class="btn" style="padding: 3px 12px" onclick="cancel()">CANCEL</button>
				<button type="button" class="btn btn-primary pull-right" onclick="send()" style="margin-right:5%">SEND</button>
			</div>
    		<input type="hidden" id="to_user_id" value="<?php echo $item->to_user_id; ?>">
    		<input type="hidden" id="from_user_id" value="<?php echo session("user_id"); ?>">
    		<input type="hidden" id="item_id" value="<?php echo $item->id; ?>">
		</form>
	</div>
</div>
<script>
function send(){
	var content = $.trim($("#content").val());
	if (content.length <= 0) {
		alert("Your message cannot be empty.");
	} else {
		$.ajax ({
	        url: "<?php echo url("messagecreate")?>",
	        type: "POST",
	        data: {
	        	"content":content,
				"from_user_id":$("#from_user_id").val(),
				"to_user_id":$("#to_user_id").val(),
				"item_id":$("#item_id").val()
			},
	        success: function () {
	        	alert("Your message has been sent!");
	        	cancel();
	        }
	    });
	}
}
</script>
@endsection