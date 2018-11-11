<?php
$filter = isset($filter) ? $filter : "";
$item = isset($item) ? $item : "";
?>

@extends("Home.base")
@section("bodycontent")
@include("Home.searchBar")
<div class="main">
  <div class="content_top">
  	<div class="container">
	   <div class="col-md-3 sidebar_box">
	   	 <div class="sidebar">
			<div class="menu_box">
		    <h3 class="menu_head">Filters</h3>
			  <ul class="menu">
			  <?php
			  foreach ($filter as $e) {
			  ?>
			  		<li><a href="#" onclick="filter('<?php echo $e->id; ?>')">
			  		<?php
			  		echo $e->title; 
			  		?>
			  		</a></li>
	          <?php
			  }
			  ?>
				<!-- 
				<li class="item2"><a href="#"><img class="arrow-img" src="<?php echo asset("public/img/f_menu.png"); ?>" alt=""/>Books</a>
				</li>
				<li class="item3"><a href="#"><img class="arrow-img" src="<?php echo asset("public/img/f_menu.png"); ?>" alt=""/>Devices</a>
				</li>
				 -->
				<!-- 
				<li class="item7"><a href="#"><img class="arrow-img" src="<?php echo asset("public/img/f_menu.png"); ?>" alt=""/>Top Fashion</a>
					<ul class="cute">
						<li class="subitem1"><a href="#">Cute Kittens </a></li>
						<li class="subitem2"><a href="#">Strange Stuff </a></li>
						<li class="subitem3"><a href="#">Automatic Fails </a></li>
					</ul>
				</li>
				<li class="item8"><a href="#"><img class="arrow-img" src="<?php echo asset("public/img/f_menu.png"); ?>" alt=""/>Summer Collection</a>
					<ul class="cute">
						<li class="subitem1"><a href="#">Cute Kittens </a></li>
						<li class="subitem2"><a href="#">Strange Stuff </a></li>
						<li class="subitem3"><a href="#">Automatic Fails </a></li>
					</ul>
				</li>
				 -->
			</ul>
		</div>
		<!--initiate accordion-->
		<script type="text/javascript">
			$(function() {
			    var menu_ul = $('.menu > li > ul'),
			           menu_a  = $('.menu > li > a');
			    menu_ul.hide();
			    menu_a.click(function(e) {
			        e.preventDefault();
			        if(!$(this).hasClass('active')) {
			            menu_a.removeClass('active');
			            menu_ul.filter(':visible').slideUp('normal');
			            $(this).addClass('active').next().stop(true,true).slideDown('normal');
			        } else {
			            $(this).removeClass('active');
			            $(this).next().stop(true,true).slideUp('normal');
			        }
			    });
			
			});
		</script>
       </div>
       <div class="tlinks"></div>
	   </div> 
	   <div class="col-md-9 content_right">
	    <div class="top_grid2">
	    <?php
	    $i = 0;
	    foreach ($item as $e) {
	    ?>
        <div class="col-md-4 top_grid1-box1">
	     	<div class="grid_1">
                <div class="b-link-stroke b-animate-go  thickbox">
                    <a href="<?php echo asset("itemretrievedetail?id=".$e->id); ?>" target="item_<?php echo $e->id; ?>">
                    <img src="<?php echo asset($e->title_img); ?>" class="img-responsive" alt="" style="height:12em"/>
                    </a>
                </div>
                <div class="grid_2">
                	<p><?php echo $e->title; ?></p>
                    <ul class="grid_2-bottom">
                    	<li class="grid_2-left"><p><small>$<?php echo $e->price; ?></small></p></li>
                    	<li class="grid_2-right">
                    		<a href="<?php echo asset("itemretrievedetail?id=".$e->id); ?>" target="item_<?php echo $e->id; ?>">
                    		<div class="btn btn-primary btn-normal btn-inline" target="_self" title="View">View</div>
                    		</a>
                    	</li>
                    	<div class="clearfix"></div>
                    </ul>
                </div>
	     	</div>
		</div>
        <?php
            if (++$i % 3 == 0) {
                echo "&nbsp;<div class='clearfix'> </div>";
            }
        }
        ?>
        <div class="clearfix"> </div>
        <div class="clearfix"> </div>
		<div class="clearfix"> </div>
	    </div> 
       </div>
	  </div>  	    
	</div>
</div>
@endsection