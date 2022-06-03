<?php

require_once(__ROOT__ . "controller/Controller.php");
require_once __DIR__ . '/vendor/autoload.php';
require_once(__ROOT__ . "model/projects.php");
require_once(__ROOT__ . "model/project.php");

class pmController extends Controller{


	public function AssignEmpPrj(){
		$fullname=$_REQUEST['fullname'];
		$p_name=$_REQUEST['p_name'];
		$this->model->AssignEmpPrj($fullname, $p_name);

	}

 	function edit() {
	$state=  $_REQUEST['state'];
	echo $state;
	$name = $_REQUEST['pname'];
    $description = $_REQUEST['pdesc'];
	$projectmanager=$_REQUEST['projectmanager'];
    $startDate = $_REQUEST['sd'];
	$endDate = $_REQUEST['ed'];

 		$this->model->editProject($name, $description, $projectmanager, $startDate,$endDate,$noOfemp="1",$state);
 	}

  public function insert() {

     $name = $_REQUEST['pname'];
    $description = $_REQUEST['pdesc'];
    //$mngid = $_REQUEST['mngid'];
    $startDate = $_REQUEST['sd'];
  $endDate = $_REQUEST['ed'];
  $managername=$_POST['projectmanager'];

  # $noOfemp = $_REQUEST['name'];;
  #$stateid = $_REQUEST[''];

    $this->model->insertProject($name, $description, $managername, $startDate,$endDate,$noOfemp="1",$stateid="1");
  }
 public function delete(){
      $id = $_REQUEST['id'];
 	$this->model->deleteProject($id);
 	}
	public function removeemp(){
     $id = $_REQUEST['epid'];
  	$this->model->deleteProjectemp($id);
  	}


 }
 ?>
