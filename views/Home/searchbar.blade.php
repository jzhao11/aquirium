<!-- this is the common searchbar for all other pages -->
<!-- only alphabetic and numeric characters are valid input -->
<!-- the length of the search text should be <= 40 characters -->

<?php
$search_txt = isset($search_txt) ? $search_txt : "";
$category = isset($category) ? $category : "";
$category_id = isset($category_id) ? $category_id : "";
?>
<div class="column_center">
	<div class="container">
	<form action="index" id="search">
    	<div class="search">
    		<div class="text-center">
    		<!-- Search -->
    		<select id="category_id" name="category_id" onchange="change(this.value)" style="width:12%">
    			<option value="0">All</option>
            <?php
            foreach ($category as $e) {
            ?>
    			<option value="<?php echo $e->id; ?>" <?php if ($e->id == $category_id) { echo "selected"; } ?>>
                <?php echo $e->title; ?>
    			</option>
            <?php
            }
            ?>
    		</select>
    		  	<input type="text" value="<?php echo $search_txt; ?>" id="search_txt" name="search_txt" style="width:30%">
    		  	<input type="submit" id="search" value="">
    		</div>
    		
    		<div class="clearfix"> </div>
    	</div>
	</form>
    <div class="clearfix"> </div>
    </div>
</div>
<script>
$("#search").submit(function(event) {
    event.preventDefault();
    search();
});
</script>