<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/CompensateEMP.php");

class CompensateEMPs extends Model {
	private $compensatemps;
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {
		$this->compensatemps = array();
		$this->db = $this->connect();
		$result = $this->readCompensateEmps();
		while ($row = $result->fetch_assoc()) {
			array_push($this->compensatemps, new CompensateEMP($row["emp_id"],$row["pos_salary"],$row["weekend_Overtime"],$row["nightshift_overtime"],$row["total"],$row["bonus_avg"]));
		}
	}

	function getCompensateEmps() {
		$this->fillArray();  
		return $this->compensatemps;
	}


	function readCompensateEmps(){
		$sql = "SELECT * FROM comp_emp";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}
	
	function update($id,$weekend_Overtime,$nightshift_overtime){
		$sql = " UPDATE `comp_emp` SET
	`weekend_Overtime`='".$weekend_Overtime."'
	,`nightshift_overtime`='".$nightshift_overtime."'
	
	WHERE `emp_id`='".$id."'";
	
		if($this->db->query($sql) === true){
			 echo '<script>window.location.href= "hrmanager.php";</script>';
			 echo "success";
		} else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
	
	function insert($id, $weekend_Overtime, $nightshift_overtime){
		$sql = "INSERT INTO comp_emp (emp_id, weekend_Overtime,nightshift_overtime) VALUES ('$id', '$weekend_Overtime', '$nightshift_overtime')";
		if($this->db->query($sql) === true){
			echo "Records inserted successfully.";
			$this->fillArray();
			echo '<script>window.location.href= "hrmanager.php";</script>';
		}
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}

	
}