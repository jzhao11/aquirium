<!-- this is the dashboard list page for users -->
<!-- the detail of each user can be accessed by clicking "View Detail" -->
<!-- this page is only visible to admin user -->

<?php
$user = isset($user) ? $user : "";
$i = $user->firstItem();
?>

@extends("Home.base")
@section("bodycontent")
<div class="main" style="background:#fff">
	<div class="content_top">
    <div class="container">
    	@include("Home.leftNavBar")
        <div class="col-md-9 content_right">
        	<p style="font-size:24px">DASHBOARD</p>
        		<p>To delete a user, click <b>Delete</b></p>
            <table class="table">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Username</th>
                  <th scope="col">Creation Time</th>
                  <th scope="col">Operation</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($user as $e) {
                ?>
                <tr>
                  <th scope="row"><?php echo $i++; ?></th>
                  <td><?php echo $e->username; ?></td>
                  <td><?php echo substr($e->created_at, 0, 10); ?></td>
                  <td><a href="#" onclick="userDelete('<?php echo $e->id; ?>')">Delete</a></td>
                </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
            <div style="text-align:right">
        	<?php
        	    echo $user->links();
        	?>
    	    </div>
        </div>
    </div>
	</div>
</div>
<script>
function userDelete(user_id){
	if (confirm("Are you sure to delete this user? This cannot be undone.")) {
		location.href = "userdelete?user_id=" + user_id;
	}
}
</script>
@endsection