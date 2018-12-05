<!-- this is the detail page for posting a new item -->
<!-- after clicking "POST", unregistered user will be redirected to register/login -->
<!-- after clicking "POST", registered user will be redirected to dashboard -->
<!-- the newly posted item will not go live until approved by admin -->

<?php
$category = isset($category) ? $category : "";
?>

@extends("Home.base")
@section("bodycontent")
@include("Home.searchBar")

<div class="about">
    <div class="container">
        <div class="col-sm-8 col-sm-offset-2">
        <h3>POST YOUR ITEM FOR SALE!</h3>
		<p>Required fields are marked with *</p><br>
        <form>
        	<div class="form-group">
            	<label for="title">Title *</label>
            	<input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="category_id">Category *</label>
                <select class="form-control" id="category_id">
                	<option value="0">Select a Category</option>
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
            </div>
            <div class="form-group">
            	<label for="price">Price *</label>
            	<input type="number" class="form-control" id="price" aria-describedby="price" placeholder="Enter price">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="title_img">Title Image *</label>
                <input type="file" class="form-control-file" id="title_img">
            </div>
            <div class="form-group">
            	Your posting has to be approved at first by the admin.
            </div>
            <button type="button" class="btn" onclick="cancel()">CANCEL</button>
            <button type="button" class="btn btn-primary pull-right">POST</button>
        </form>
        </div>
    </div>
</div>
@endsection