<?php

require_once(__ROOT__ . "controller/Controller.php");

class FeedbackController extends Controller{
	public function edit() {
		
	$mng_id=$_REQUEST['mng_id'];
	$emp_id=$_REQUEST['emp_id'];
	$p_name=$_REQUEST['p_name'];
	$feedback=$_REQUEST['feedback'];
	$performance=$_REQUEST['performance'];

	
	$this->model->edit($mng_id,$emp_id,$p_name,$feedback,$performance);
		
	}
	public function insert() {
		if (isset($_POST['submit'])){
			
	$mng_id=$_POST['mng_id'];
	$emp_id=$_POST['emp_id'];
	$p_name=$_POST['p_name'];
	$feedback=$_POST['feedback'];
	$performance=$_POST['performance'];
	
	
	$this->model->insert($mng_id,$emp_id,$p_name,$feedback,$performance);
		}
	}

	
}
?>
