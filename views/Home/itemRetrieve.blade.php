@extends("Home.base")
@section("bodycontent")
<div class="main" style="background:#fff">
	<div class="content_top">
    <div class="container">
    
    	@include("Home.leftNavBar")
        <div class="col-md-9 content_right">
            <table class="table">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Title</th>
                  <th scope="col">Seller</th>
                  <th scope="col">Price</th>
                  <th scope="col">Operation</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Basketball</td>
                  <td>Perry</td>
                  <td>$33.33</td>
                  <td><a href="<?php echo asset("userretrievedetail?id="); ?>">View Detail</a></td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Math Book</td>
                  <td>Jacob</td>
                  <td>$44.33</td>
                  <td><a href="<?php echo asset("userretrievedetail?id="); ?>">View Detail</a></td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Cleaner</td>
                  <td>Larry</td>
                  <td>$66.33</td>
                  <td><a href="<?php echo asset("userretrievedetail?id="); ?>">View Detail</a></td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>Mattress</td>
                  <td>Patch</td>
                  <td>$77.33</td>
                  <td><a href="<?php echo asset("userretrievedetail?id="); ?>">View Detail</a></td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>Skateboard</td>
                  <td>Thomas</td>
                  <td>$88.33</td>
                  <td><a href="<?php echo asset("userretrievedetail?id="); ?>">View Detail</a></td>
                </tr>
                <tr>
                  <th scope="row">6</th>
                  <td>Shoes</td>
                  <td>Jimmy</td>
                  <td>$99.33</td>
                  <td><a href="<?php echo asset("userretrievedetail?id="); ?>">View Detail</a></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
	</div>
</div>
@endsection