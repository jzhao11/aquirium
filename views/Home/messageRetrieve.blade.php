<!-- this is the dashboard list page for messages -->
<!-- the detail of each message can be accessed by clicking "View Detail" -->
<!-- this page is visible to registered user and admin user -->

<?php
$message = isset($message) ? $message : "";
$i = $message->firstItem();
?>

@extends("Home.base")
@section("bodycontent")
<div class="main" style="background:#fff">
	<div class="content_top">
    <div class="container">
    	@include("Home.leftNavBar")
        <div class="col-md-9 content_right">
        	<p style="font-size:24px">DASHBOARD</p>
        		<p>To view the detail of a message, click <b>View Detail</b></p>
            <table class="table">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">From</th>
                  <th scope="col">To</th>
                  <th scope="col">Creation Time</th>
                  <th scope="col">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($message as $e) {
                ?>
                <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td><?php echo $e->from_username; ?></td>
                  <td><?php echo $e->to_username; ?></td>
                  <td><?php echo substr($e->created_at, 0, 10); ?></td>
                  <td><a href="messageupdatedetail?message_id=<?php echo $e->id; ?>">View Detail</a></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            <div style="text-align:right">
        	<?php
        	    echo $message->links();
        	?>
    	    </div>
        </div>
    </div>
	</div>
</div>
@endsection