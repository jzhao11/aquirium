<!-- this is the detail page for updating an existing item -->
<!-- the status should only be changed by admin but not seller -->
<!-- the other fields should only be changed by seller but not admin -->

<?php
$category = isset($category) ? $category : "";
$item = isset($item) ? $item : "";
?>

@extends("Home.base")
@section("bodycontent")
@include("Home.searchBar")
<script type="text/javascript" src="<?php echo asset("public/lib/bootstrap/js/validator.js"); ?>"></script>

<div class="container">
    <div class="col-sm-6 col-sm-offset-3">
        <h3>DETAILED ITEM INFORMATION</h3>
        <?php
        if (session("user_priority")) {
        ?>
        	<p>To approve this item, choose "Approved" in <b>Status</b> and click <b>UPDATE</b></p>
        <?php
        } else {
        ?>
        	<p>To edit this item, change the details below and click <b>UPDATE</b></p>
        <?php
        }
        ?>
        <br>
		<form enctype="multipart/form-data" method="post" action="itemupdate" id="itemupdate" data-toggle="validator" role="form">
            <div class="form-group">
                <button type="button" class="btn" style="padding: 3px 12px" onclick="location.href='itemretrieve'">BACK TO DASHBOARD</button>
            	<button type="submit" class="btn btn-primary pull-right">UPDATE</button>
            </div>
            <div class="form-group">
	            <label for="status" class="control-label">Status</label>
                <select class="form-control" id="status" name="status" <?php if (!session("user_priority")) { echo "disabled"; } ?>>
                	<option value="0">Pending</option>
                	<option value="1" <?php if ($item->status == 1) { echo "selected"; } ?>>Approved</option>
                	<option value="2" <?php if ($item->status == 2) { echo "selected"; } ?>>Rejected</option>
                </select>
            </div>
            <div class="form-group">
            	<label for="title" class="control-label">Title</label>
            	<input type="text" class="form-control" id="title" name="title" <?php if ($item->user_id != session("user_id")) { echo "disabled"; } ?> value="<?php echo $item->title; ?>" aria-describedby="title" placeholder="Enter title" required>
            	<div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="category_id" class="control-label">Category</label>
                <select class="form-control" id="category_id" name="category_id" <?php if ($item->user_id != session("user_id")) { echo "disabled"; } ?> required>
                	<option value="">Select a Category</option>
                <?php
                foreach ($category as $e) {
                ?>
        			<option value="<?php echo $e->id; ?>" <?php if ($e->id == $item->category_id) { echo "selected"; } ?>>
                    <?php echo $e->title; ?>
        			</option>
                <?php
                }
                ?>
                </select>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
            	<label for="price" class="control-label">Price</label>
            	<input type="number" step="0.01" class="form-control" id="price" name="price" <?php if ($item->user_id != session("user_id")) { echo "disabled"; } ?> value="<?php echo $item->price; ?>" aria-describedby="price" placeholder="Enter price" required>
            	<div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="description" class="control-label">Description</label>
                <textarea class="form-control" id="description" name="description" <?php if ($item->user_id != session("user_id")) { echo "disabled"; } ?> rows="3" placeholder="Enter description"><?php echo $item->description; ?></textarea>
            	<div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
                <label for="title_img" class="control-label">Title Image</label><br>
                <?php
                if ($item->user_id == session("user_id")) {
                ?>
                <input type="file" class="form-control-file" id="title_img" name="title_img">
                <?php
                }
                ?>
                <img src="<?php echo asset($item->title_img); ?>" class="img-thumbnail rounded">
            </div>
            <input type="hidden" name="id" value="<?php echo $item->id; ?>">
        </form>
    </div>
</div>
@endsection