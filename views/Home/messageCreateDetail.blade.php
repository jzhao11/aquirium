@extends("Home.base")
@section("bodycontent")
<div class="about">
	<div class="container">
		<div class="col-md-9" style="margin-left:10em; margin-right:10em">
			<div class="contact-form">
				<form method="post" action="#">
					<p class="comment-form-author"><label for="author">Item:</label>
						<img src="<?php echo asset("public/img/p5.jpg"); ?>" class="img-thumbnail rounded"><br>
						Title of the item
					</p>
					<p class="comment-form-author"><label for="author">To:</label>
						<input type="text" class="textbox" disabled value="Seller Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your name here...';}">
					</p>
					<p class="comment-form-author"><label for="author">From:</label>
						<input type="text" class="textbox" disabled value="Buyer Username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
					</p>
					<p class="comment-form-author"><label for="author">Message:</label>
						<textarea value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter your message here...';}">Enter your message here...</textarea>
					</p>
					<input name="submit" type="submit" id="submit" value="Submit">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection