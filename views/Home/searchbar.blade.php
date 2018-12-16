<!-- this is the common searchbar for all other pages -->
<!-- only alphabetic and numeric characters are valid input -->
<!-- the length of the search text should be <= 40 characters -->

<?php
$search_txt = isset($search_txt) ? $search_txt : "";
$category = isset($category) ? $category : "";
$category_id = isset($category_id) ? $category_id : "";
$category_title = isset($category_title) ? $category_title : "All";
?>

<div class="container-fluid column_center">
    <div class="row">    
        <div class="col-xs-4 col-xs-offset-4">
        <form action="index" id="search">
    	    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept"><?php echo $category_title; ?></span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                    	<li><a href="#0">All</a></li>
                    <?php
                    foreach ($category as $e) {
                    ?>
                        <li><a href="#<?php echo $e->id; ?>"><?php echo $e->title; ?></a></li>
                    <?php
                    }
                    ?>
                    </ul>
                </div>
                <input type="hidden" name="category_id" value="<?php echo $category_id; ?>" id="category_id">         
                <input type="text" class="form-control" style="min-width: 120px" name="search_txt" id="search_txt" value="<?php echo $search_txt; ?>">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="search()"><span class="glyphicon glyphicon-search"></span></button>
                </span>
            </div>
        </form>
        </div>
	</div>
</div>

<script>
$("#search").submit(function(e) {
    e.preventDefault();
    search();
});

$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
    	e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #category_id').val(param);
		change(param);
	});
});
</script>