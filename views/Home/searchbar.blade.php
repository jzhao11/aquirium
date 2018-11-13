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
	<div class="search">
		<div class="stay">Search
		<select id="category_id" onchange="change(this.value)">
			<option value="0"></option>
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
		</div> 
		<!-- <form> -->
		<div class="stay_right">
		  	<input type="text" value="<?php echo $search_txt; ?>" id="search_txt">  <!-- onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '';}" -->
		  	<input type="submit" id="search" value="" onclick="search()">
		</div>
		<!-- </form> -->
		<div class="clearfix"> </div>
	</div>
    <div class="clearfix"> </div>
    </div>
</div>


<script> 
$(document).ready(function(){
	$("form").keydown(function(e){
		var curKey = e.which;
		if(curKey == 13){
			$("#search").click(); 
			return false; 
		} 
	});
}); 
</script>