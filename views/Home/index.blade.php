<!-- this is the home/entry page -->
<!-- this page is also used for showing results of filtering -->
<!-- this page is also used for showing results of searching -->

<?php
$filter = isset($filter) ? $filter : "";
$item = isset($item) ? $item : "";
$empty_flag = isset($empty_flag) ? $empty_flag : 0;
$search_txt = isset($search_txt) ? $search_txt : "";
$category_id = isset($category_id) ? $category_id : "";
?>

@extends("Home.base")
@section("bodycontent")
@include("Home.searchBar")
<div class="main">
	<div class="content_top">
  	<div class="container">
        <!-- 
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
			</ul>
        </div>
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
	    -->
		<div class="col-md-12 content_right">
		<div style="text-align:right">
	    <?php
        if ($empty_flag) {
	        echo "Sorry, items not found. Here are some newly posted items. ";
	    }
	    echo "Showing ".$item->firstItem()." to ".$item->lastItem()." out of ".$item->total();
	    ?>
	    </div>
	    <div style="text-align:right">
    	<?php
    	if ($empty_flag) {
    	    echo $item->appends(["category_id" => $category_id])->links();
    	} else {
    	    echo $item->appends(["category_id" => $category_id, "search_txt" => $search_txt])->links();
    	}
    	?>
	    </div>
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
                    		<div class="btn btn-primary btn-normal btn-inline" target="_self" title="Contact">Contact</div>
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
        <div class="clearfix"></div>
        <div class="clearfix"></div>
		<div class="clearfix"></div>
	    </div> 
		</div>
	</div>  	    
	</div>
</div>
@endsection