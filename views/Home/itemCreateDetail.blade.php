<!-- this is the detail page for creating a new item -->
<!-- after clicking "POST", unregistered user will be redirected to register/login -->
<!-- after clicking "POST", registered user will be redirected to dashboard -->
<!-- the newly posted item will not go live until approved by admin -->

<?php
$category = isset($category) ? $category : "";
?>

@extends("Home.base")
@section("bodycontent")
@include("Home.searchBar")
<script type="text/javascript" src="<?php echo asset("public/lib/bootstrap/js/validator.js"); ?>"></script>

<div class="about">
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
        <h3>POST YOUR ITEM FOR SALE</h3>
		<p>Required fields are marked with *</p><br>
		<form enctype="multipart/form-data" method="post" action="itemcreate" id="itemcreate" data-toggle="validator" role="form">
            <div class="form-group">
            	<label for="title" class="control-label">Title *</label>
            	<input type="text" class="form-control" id="title" name="title" aria-describedby="title" placeholder="Enter title" required>
            	<div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="category_id" class="control-label">Category *</label>
                <select class="form-control" id="category_id" name="category_id" required>
                	<option value="">Select a Category</option>
                <?php
                foreach ($category as $e) {
                ?>
        			<option value="<?php echo $e->id; ?>">
                    <?php echo $e->title; ?>
        			</option>
                <?php
                }
                ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
            	<label for="price" class="control-label">Price *</label>
            	<input type="number" step="0.01" class="form-control" id="price" name="price" aria-describedby="price" placeholder="Enter price" required>
            	<div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
            	<div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="title_img" class="control-label">Title Image *</label>
                <input type="file" class="form-control-file" id="title_img" name="title_img" required>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
            	Your posting has to be approved at first by the admin.
            </div>
            <div class="form-group">
                <button type="button" class="btn" style="padding: 3px 12px" onclick="cancel()">CANCEL</button>
            	<button type="submit" class="btn btn-primary pull-right">POST</button>
            </div>
        </form>
        </div>
    </div>
</div>
<script>
$("#itemcreate").validator().on("submit", function (e) {
    if (!e.isDefaultPrevented()) {
    	alert("It may take up to 24 hrs to be approved. Thank you.");
    }
});
</script>
@endsection