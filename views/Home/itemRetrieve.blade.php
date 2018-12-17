<!-- this is the dashboard list page for items -->
<!-- the detail of each item can be accessed by clicking "View Detail" -->
<!-- this page is visible to registered user and admin user -->

<?php
$item = isset($item) ? $item : "";
$i = $item->firstItem();
?>

@extends("Home.base")
@section("bodycontent")
@include("Home.searchbar")

<div class="main" style="background:#fff">
	<div class="content_top">
    <div class="container">
    	@include("Home.leftNavBar")
        <div class="col-md-9 content_right">
            <p style="font-size:24px">DASHBOARD</p>
            <?php
            if (session("user_priority")) {
            ?>
            	<p>To approve/reject a posted item, click <b>View Detail</b></p>
            <?php
            } else {
            ?>
            	<p>To edit a posted item, click <b>View Detail</b></p>
            <?php
            }
            ?>
            <table class="table">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Seller</th>
                  <th scope="col">Price</th>
                  <th scope="col">Status</th>
                  <th scope="col">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($item as $e) {
                ?>
                <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td><?php echo $e->title; ?></td>
                  <td><?php echo $e->username; ?></td>
                  <td>$<?php echo $e->price; ?></td>
                  <td>
                  <?php
                      if ($e->status == 1) {
                          echo "Approved";
                      } else if ($e->status == 0) {
                          echo "Pending";
                      } else {
                          echo "Rejected";
                      }
                  ?>
                  </td>
                  <td><a href="itemupdatedetail?item_id=<?php echo $e->id; ?>">View Detail</a></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        	<div style="text-align:right">
        	<?php
        	    echo $item->links();
        	?>
    	    </div>
	    </div>
    </div>
	</div>
</div>
@endsection