

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

 <body  class="barber_version" src='images/background.png'>
 <?php
 define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/CompensateEMPs.php");
require_once(__ROOT__ . "controller/CompensateEmpController.php");
require_once(__ROOT__ . "view/viewCompensateEmp.php");

$model = new CompensateEmps();
$controller = new CompensateEmpController($model);
$view = new viewCompensateEmp($controller, $model);

if (isset($_GET['action']) && !empty($_GET['action'])) {
	switch($_GET['action']){
		case '':
		case 'editAction':
		
			$controller->edit($_GET['id']);
			//header("Location:hrmanager.php");
			break;
		
		case 'overtime':
			echo $view->overtimeEMP($_GET['id']);
			break;
		case 'back':
			header("Location:hrmanager.php");
			break;
		case 'insert':
			echo $controller->insert($_GET['id']);
		case 'print':
			echo $controller->print();
			header("Location:viewsalary.php");
		break;
		
		
		
	}
}
else
	
		echo $view->output();
	
 
?>
 
 </html>
 