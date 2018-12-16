<!-- this is the item detail page -->
<!-- the title image is for demonstration only, not from back-end -->
<!-- this page should only be accessed from home page or search results -->
<!-- this page should be popped up as a new tab in browser -->

<?php
$item = isset($item) ? $item : "";
?>

@extends("Home.base")
@section("bodycontent")
@include("Home.searchbar")

<div class="main" style="background:#fff">
	<div class="content_top">
 	<div class="container">
		<div class="col-sm-13 col-sm-offset-2 single_right">
        	<h3>DETAILED ITEM INFORMATION</h3>
    		<div class="single_top">
    			<div class="single_grid">
    				<div class="grid images_3_of_2">
        				<ul>
        					<li>
        						<img src="<?php echo asset($item->title_img); ?>" class="img-responsive img-thumbnail rounded" width="120%" />
        					</li>
        				</ul>
        				<div class="clearfix"></div>		
    				</div> 
        			<div class="desc1 span_3_of_2">
            			<div class="form-group">
                        	<label for="title" class="control-label label-font">Item Title</label>
                        	<p><?php echo $item->title; ?></p>
                        </div>
                        <div class="form-group">
                        	<label for="title" class="control-label label-font">Category</label>
                        	<p><?php echo $item->category_title; ?></p>
                        </div>
        			    <div class="form-group">
        			    	<label for="price" class="control-label label-font">Price</label>
                        	<p>$<?php echo $item->price; ?></p>
        				</div>
        			    <div class="form-group">
        			    	<label for="user_id" class="control-label label-font">Seller</label>
                        	<p><?php echo $item->username; ?></p>
        				</div>
        				<div class="form-group">
        					<label for="created_at" class="control-label label-font">Post Date</label>
                        	<p><?php echo substr($item->created_at, 0, 10); ?></p>
        				</div>
        				<div class="form-group">
        					<label for="description" class="control-label label-font">Description</label>
                        	<p><?php echo $item->description; ?></p>
        				</div>
        				<div class="form-group">
        					<a href="<?php echo asset("messagecreatedetail?to_user_id=".$item->user_id."&item_id=".$item->id); ?>" class="btn btn-primary" target="message_<?php echo $item->id; ?>">CONTACT SELLER</a>
    					</div>
        			</div>
    			</div>
      	    	<div class="clearfix"></div>
    		</div>
		</div>
	</div> 
	</div>
</div>
@endsection