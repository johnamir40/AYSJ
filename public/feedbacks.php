<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> </script>
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
		

<?php
define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/Feedbacks.php");
require_once(__ROOT__ . "controller/FeedbackController.php");
require_once(__ROOT__ . "view/viewFeedback.php");

$model = new Feedbacks();
$controller = new FeedbackController($model);
$view = new viewFeedback($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case 'view':
			echo $view->feedbackviewEmp($_GET['id']);
			break;
		case 'insertfeedback':
			echo $view->insertFeedback();
			break;
		case 'insert':
			$controller->insert();
			echo '<script>window.location.href= "login.php";</script>';
			break;
		case 'edit':
			$controller->edit();
			break;
		case'logout':
			session_destroy();
			header("Location:index.php");
			break;
		case 'viewHr':
			echo $view->feedbackview($_GET['id'],$_GET['mngid']);
			break;
}}
else
	
		echo $view->output();
	
 
?>
</body>

</html>