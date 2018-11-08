<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>SFSU-Fulda Software Engineering Project CSC 648-848, Fall 2018. For Demonstration Only</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="" name="keywords">
<meta content="" name="description">

<!-- Favicons -->
<link href="<?php echo asset("public/img/favicon.png"); ?>" rel="icon">
<link href="<?php echo asset("public/img/apple-touch-icon.png"); ?>" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic|Raleway:400,300,700" rel="stylesheet">

<!-- Bootstrap CSS File -->
<link href="<?php echo asset("public/lib/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet">

<!-- Libraries CSS Files -->
<link href="<?php echo asset("public/lib/font-awesome/css/font-awesome.min.css"); ?>" rel="stylesheet">

<!-- Main Stylesheet File -->
<link href="<?php echo asset("public/css/aboutstyle.css"); ?>" rel="stylesheet">
</head>

<?php
    $admin = isset($admin) ? $admin : array();
?>

<body>
<div class="container">
	<div class="col-lg-6 col-lg-offset-3">
    	<div class="row w">
    	
            <!-- team introduction -->
        	<div class="col-md-8">
    			<div class="tab-content">
                    <div class="tab-pane active">
                        <h3>Welcome to the SFSUBUYSELL website!</h3>
                        <h5>CSC 648-848 Team 08</h5>
                        <hr>
                        <p>This is the home page for team 08.</p>
                        <p>Here is a list of members in our team. By clicking the names, you will be redirected to the personal ABOUT page for each member.</p>
                    </div>
                </div>
            </div>
            <!-- team introduction -->
            
            <!-- list of members -->
            <div class="col-md-4">
                <ul class="nav nav-tabs nav-stacked">
                <?php
                    foreach ($admin as $item) {
                ?>
                	<li><a href="<?php echo asset("personal?id=".$item->id); ?>"><?php echo $item->realname; ?></a></li>
                <?php
                    }
                ?>
                </ul>
            </div>
            <!-- list of members -->
            
        </div>
        <!-- row w -->
        
    </div>
    <!-- col-lg-6 -->
    
</div>
<!-- container -->

<div class="credits">
CSC 648-848 Fall 2018 Team 08
</div>

<!-- javaScript libraries -->
<script src="<?php echo asset("public/lib/jquery/jquery.min.js"); ?>"></script>
<script src="<?php echo asset("public/lib/bootstrap/js/bootstrap.min.js"); ?>"></script>
<script src="<?php echo asset("public/lib/php-mail-form/validate.js"); ?>"></script>

<!-- javascript file for this page -->
<script src="<?php echo asset("public/js/main.js"); ?>"></script>

</body>
</html>