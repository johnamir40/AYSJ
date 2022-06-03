<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/UserProject.php");

class UserProjects extends Model {
	private $notification;

	private $userprojects;
	function __construct() {
		$this->fillArray();
		$this->fillArrayN();
	}

	function fillArray() {
		$this->userprojects = array();
		$this->db = $this->connect();
		$result = $this->readUserProjects();
		while ($row = $result->fetch_assoc()) {
			array_push($this->userprojects, new UserProject($row["emp_id"],$row["p_name"]));
		}
	}

	function getUserProjects() {
		$this->fillArray();  
		return $this->userprojects;
	}

	function readUserProjects(){
		$sql = "SELECT * FROM works_on ";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

	function fillArrayN() {
		$this->notification = array();
		$this->db = $this->connect();
		$result = $this->readNoti();
		while ($row = $result->fetch_assoc()) {
			array_push($this->notification, new UserProject($row["emp_id"],$row["p_name"]));
		}
	}

	function getNoti() {
		$this->fillArrayN();  
		return $this->notification;
	}

	function readNoti(){
		$sql = "SELECT * FROM notifications ";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			echo 'No notifications';
		}
	}
	function close($id){
		$sql = "DELETE FROM notifications WHERE emp_id=".$id;
		$result = $this->db->query($sql);
		if ($result==true){
			echo '<script>window.location.href= "myprojects.php";</script>';

		}

	}

}