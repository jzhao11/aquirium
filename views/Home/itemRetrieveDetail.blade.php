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
<script type="text/javascript" src="<?php echo asset("public/js/hover_pack.js"); ?>"></script>
<script src="<?php echo asset("public/js/easyResponsiveTabs.js"); ?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#horizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion           
        width: 'auto', //auto or any width like 600px
        fit: true   // 100% fit in a container
    });
});
</script>

<div class="main" style="background:#fff">
	<div class="content_top">
 	<div class="container">
		<div class="col-md-13 single_right">
		<div class="single_top">
			<div class="single_grid">
				<div class="grid images_3_of_2">
				<ul id="">
					<li>
						<img src="<?php echo asset($item->title_img); ?>" class="img-responsive img-thumbnail rounded" width="120%" />
					</li>
				</ul>
				<div class="clearfix"></div>		
			</div> 
			<div class="desc1 span_3_of_2">
				<div class="wish-list">
   					<h1 class="quick"><?php echo $item->title; ?></h1>
   				</div>
			    <div class="wish-list">
    				<h3>Price: $<?php echo $item->price; ?></h3>
				</div>
			    <div class="wish-list">
    				<h3>Sold By: Username</h3>
				</div>
				<div class="wish-list">
					<h3>Post Date: <?php echo substr($item->created_at, 0, 10); ?></h3>
				</div>
				<div class="quantity_box">
	   		    </div>
			    <a href="<?php echo asset("messagecreatedetail?to_user_id=".$item->user_id."&item_id=".$item->id); ?>" class="btn bt1 btn-primary btn-normal btn-inline" target="message_<?php echo $item->id; ?>">CONTACT SELLER</a>
			</div>
		    <div class="clearfix"> </div>
				</div>
          	    <div class="clearfix"></div>
		</div>
		<div class="sap_tabs">	
			<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
				<ul class="resp-tabs-list">
					<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Description</span></li>
					<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Additional Information</span></li>
					<div class="clear"></div>
				</ul>				  	 
				<div class="resp-tabs-container">
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
						<div class="facts">
							<ul class="tab_list">
								<li>
									<div id="description" style="text-align:center"><?php echo $item->description; ?></div>
								</li>
							</ul>           
						</div>
					</div>	
					<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
						<div class="facts">
							<ul class="tab_list">
								<li>
									<div style="text-align:center">
									This is the additional information of item.<br/>
									This is the additional information of item.<br/>
									This is the additional information of item.<br/>
									This is the additional information of item.<br/>
									</div>
								</li>
							</ul>           
						</div>
					</div>	
				</div>
			</div>
		</div>
		</div>
	</div> 
	</div>
</div>
<script>
$(function(){
    var element = $("div[id='description']");
    var temp =  element.text().replace(/\n/g,'<br/>');
    element.html(temp);
});
</script>
@endsection