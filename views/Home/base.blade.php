<!-- this is the base page for all other pages -->
<!-- this page should be the parent and extended by other pages -->
<!-- all the common css and js references are listed here -->
<!-- derived pages can have their own specific css and js references -->

<!DOCTYPE HTML>
<html>
<head>
<title>SFSU-Fulda Software Engineering Project CSC 648-848, Fall 2018. For Demonstration Only</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Fashionpress Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="<?php echo asset("public/lib/bootstrap/css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
<!-- jQuery (necessary for Bootstrap"s JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo asset("public/css/style.css"); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo asset("public/css/pagination.css"); ?>" rel="stylesheet" type="text/css" />
<!-- Custom Theme files -->
<!--webfont-->
<link href="https://fonts.googleapis.com/css?family=Lato:100,200,300,400,500,600,700,800,900" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo asset("public/js/jquery-1.11.3.min.js"); ?>"></script>
<script src="<?php echo asset("public/lib/bootstrap/js/bootstrap.js"); ?>"></script>
<script src="<?php echo asset("public/js/responsiveslides.min.js"); ?>"></script>
<script src="<?php echo asset("public/js/functions.js"); ?>"></script>
</head>

<body>
{{-- include Home.header --}}
@include("Home.header")

{{-- yield extended content --}}
@yield("bodycontent")

{{-- include Home.footer --}}
@include("Home.footer")
</body>

</html>