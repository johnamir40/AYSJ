
	<!DOCTYPE html>
	<html lang="en">
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title>AYSJ</title>
	    <meta name="keywords" content="">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
	    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	    <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="style.css">
	    <link rel="stylesheet" href="css/versions.css">
	    <link rel="stylesheet" href="css/responsive.css">
	    <link rel="stylesheet" href="css/custom.css">
</head>
<body class="barber_version">
    <div id="preloader">
        <div class="cube-wrapper">

		  
		  <span class="loading" data-name="Loading">Loading</span>
		</div>
    </div>
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
						<li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
						<li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                        <li class="nav-item "><a class="nav-link" href="faq.php">FAQs</a></li>
                        <li class="nav-item "><a class="nav-link" href="myinfo.php">My Info</a></li>

					</ul>
				</div>
			</div>
		</nav>
	</header>

	<?php
	define('__ROOT__', "../app/");
	require_once(__ROOT__ . "model/User.php");
	require_once(__ROOT__ . "controller/userController.php");
	require_once(__ROOT__ . "view/ViewHR.php");

	$model = new User();
	$controller = new userController($model);
	$view = new ViewHR($controller, $model);

	if (isset($_GET['action']) && !empty($_GET['action'])) {
		switch($_GET['action']){
			case 'loginview':
			echo $view->loginview();
				break;
			case 'login':
				echo $model->login($_POST["username"],$_POST["password"]);
				break;
				case 'forgot':
				echo $view->forgotpassword();
			break;
			case 'forgotpass':
			 $controller->forgot_password();
			echo $view->loginview();
			break;
		}
	}

	?>


		<div class="copyrights">
			<div class="container">
				<div class="footer-distributed">
					<div class="footer-left">
						<p class="footer-links">
							<a href="index.php">Home</a>
							<a href="about.php">About</a>
							<a href="contact.php">Contact</a>
							<a href="faq.php">Faq</a>
						</p>
						<p class="footer-company-name">All Rights Reserved. &copy; 2022 <a href="#">AYSJ</a> Design By : Sohaib Mohamed , Yossef Bassem , Ahmed Tareq , John Amir </p>
					</div>
				</div>
			</div>
		</div>
	</div>


    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>
    <script src="js/all.js"></script>
	<script src="js/responsive-tabs.js"></script>
    <script src="js/custom.js"></script>
    <script>
    (function($) {
        "use strict";
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        smoothScroll.init({
            selector: '[data-scroll]', // Selector for links (must be a class, ID, data attribute, or element tag)
            selectorHeader: null, // Selector for fixed headers (must be a valid CSS selector) [optional]
            speed: 500, // Integer. How fast to complete the scroll in milliseconds
            easing: 'easeInOutCubic', // Easing pattern to use
            offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
            callback: function ( anchor, toggle ) {} // Function to run after scrolling
        });
    })(jQuery);
    </script>

</body>
</html>
