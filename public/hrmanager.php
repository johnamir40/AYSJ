
<html>
	<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArqqaHR</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/versions.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="style.css">
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
						<li class="nav-item active"><a class="nav-link" href="hrmanager.php">View Employees</a></li>
						<li class="nav-item"><a class="nav-link" href="feedbacks.php">Feedbacks</a></li>
						<li class="nav-item"><a class="nav-link" href="pm.php">Add Project</a></li>
						<li class="nav-item"><a class="nav-link" href="hrmanager.php?action=insert">Add Employee</a></li>
						<li class="nav-item"><a class="nav-link" href="hrmanager.php?action=logout">Logout</a></li>
						
					</ul>
				</div>
			</div>
		</nav>
	</header>
<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/HR.php");
require_once(__ROOT__ . "controller/HRController.php");
require_once(__ROOT__ . "view/viewHR.php");

$model = new HR();
$controller = new HRController($model);
$view = new ViewHR($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case'logout':
			session_destroy();
			echo '<script>window.location.href= "index.php";</script>';
			break;
		case 'insert':
			echo $view->addform();
			break;
		case 'edit':
			echo $view->editform($_GET['id']);
			break;
		case 'view':
			echo $view->view($_GET['id']);
			break;
		case 'editAction':
			$controller->edit($_GET['id']);
			echo $view->output();
			break;
		case 'remove':
			$controller->deactivate($_GET['id']);
			echo $view->output();
			break;
		case'back':
			echo $view->output();
			break;
		case 'insertAction':
			$controller->insert();
			echo $view->output();
			break;
		case 'overtime':
			echo $view->overtime($_GET['id']);
			break;
	}
}
else

	echo $view->output();


?>
	</body>
</html>
