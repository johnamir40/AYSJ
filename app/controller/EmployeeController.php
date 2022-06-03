<?php

require_once(__ROOT__ . "controller/Controller.php");

class EmployeeController extends Controller{
	public function login(){
		if (isset($_POST['submit'])){
		$username= $_POST['username'];
		$password=$_POST['password'];
		$this->model->login($username,$password);
		}
}}
	
?>
