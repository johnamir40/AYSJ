


<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

	    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Site Metas -->
    <title>Arqqa Master</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
  <!--  <link rel="apple-touch-icon" href="images/apple-touch-icon.png">-->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ALL VERSION CSS -->
    <link rel="stylesheet" href="css/versions.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

<link rel="stylesheet" href="style.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>


	<body class="barber_version" src='images/background.png'>
	
	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="hrmanager.php">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href='myprojects.php'>My Projects</a></li>
						<li class="nav-item"><a class="nav-link" href='myfeedback.php'>My Feedbacks</a></li>
						<li class="nav-item"><a class="nav-link" href='viewsalary.php'>View Salary </a></li>
						
						<li class="nav-item"><a class="nav-link" href='myinfo.php'>My Info</a></li>
						<li class="nav-item"><a class="nav-link" href="hrmanager.php?action=logout">Logout</a></li>
						
					</ul>
				</div>
			</div>
		</nav>
	</header>


<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/CompensateEMPs.php");
require_once(__ROOT__ . "controller/CompensateEmpController.php");
require_once(__ROOT__ . "view/viewCompensateEmp.php");

$model = new CompensateEMPs();
$controller = new CompensateEmpController($model);
$view = new viewCompensateEmp($controller, $model);


if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'view':
			echo $view->feedbackview($_SESSION['id']);
			break;
		
		case'logout':
			session_destroy();
			header("Location:index.php");
			break;
		
		
	}
}

else
	
		echo $view->output();

?>
</body>
</html>