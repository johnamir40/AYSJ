
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

<script>
function editselectemployee() {
  var s = document.getElementById("p-div");
  if (s.style.display === "block") {
    s.style.display = "none";
  }
}
function hideeditselectemployee() {
  var h = document.getElementById("p-div");
  if (h.style.display === "block") {
    h.style.display = "none";
  }
}
</script>
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
require_once(__ROOT__ . "model/UserProjects.php");
require_once(__ROOT__ . "controller/userController.php");
require_once(__ROOT__ . "view/viewUser.php");
$model = new UserProjects();
$controller = new userController($model);
$view = new viewUser($controller, $model);
if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'feedbacks':
			echo $view->Feedback();
			break;
		case 'print':
			$controller->print();
			break;
		case 'close':
			$controller->close();
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