<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Employee.php");

class HR extends Model {
	private $employees;
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {
		$this->employees = array();
		$this->db = $this->connect();
		$result = $this->readEmployees();
		while ($row = $result->fetch_assoc()) {
			array_push($this->employees, new Employee($row["id"]));
		}
	}

	function getEmployees() {
		$this->fillArray();  
		return $this->employees;
	}

	function getEmployee($Emp_id) {
		foreach($this->employees as $employee) {
			if ($Emp_id == $employee->getID()) {
				return $employee;
			}
		}
	}

	function readEmployees(){
		$sql = "SELECT * FROM employee";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

	function insertEmployee($fullname,$address,$mobile,$username,$password,$email, $position,$img){
		
		$checkusername=" SELECT * FROM employee WHERE username='$username' ";
		$db = $this->connect();
		$resultt = $db->query($checkusername);
	
		if ($resultt->num_rows ==1){
		
			echo "<script>alert('Username is already taken')</script>";
			echo '<script>window.location.href= "hrmanager.php";</script>';
		}
		
		
		
			else{
				$positiontype="select id from positiontype where type='$position'";
				$uresult = $this->db->query($positiontype);
	
				if ($uresult->num_rows ==1){
					$row = $this->db->fetchRow();
					$position_id=$row["id"];
					$sql = "INSERT INTO employee (fullname, address, email,position,username,password,mobile,img) VALUES 
					('$fullname', '$address','$email','$position_id','$username','$password','$mobile','$img')";
					if($this->db->query($sql) === true){
						echo "Records inserted successfully.";
						$this->fillArray();
					} 
					else{
						echo "ERROR: Could not able to execute $sql. " . $conn->error;
					}
				}
			}}
	function editEmployee($id,$fullname,$address,$mobile,$username,$password,$email,$position){

			$positiontype="select id from positiontype where type='$position'";
			$uresult = $this->db->query($positiontype);
	
			if ($uresult->num_rows ==1){
				$row = $this->db->fetchRow();
				$position_id=$row["id"];
		
	
				$sql = " UPDATE `employee` SET `fullname`='".$fullname."' ,`address`='".$address."' ,`position`='".$position_id."' 
				,`mobile`='".$mobile."',`username`='".$username."'
				,`password`='".$password."'
				,`email`='".$email."'
				WHERE `id`='".$id."'";
				if($this->db->query($sql) === true){
					echo '<script>window.location.href= "hrmanager.php";</script>';
				} else{
					echo "ERROR: Could not able to execute $sql. " . $conn->error;
				}
			}
		}
	function deactivateEmployee($id){
		$sql=" UPDATE `employee` SET `deactivate`=1 WHERE `id`='".$id."'";
		if($this->db->query($sql) === true){
			 echo '<script>window.location.href= "hrmanager.php";</script>';
		} else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
	
	function fillArrayP() {
		$this->positions= array();
		$this->db = $this->connect();
		$result = $this->readPositions();
		while ($row = $result->fetch_assoc()) {
			array_push($this->positions, new Employee($row['id'],$row['type']));
		}
	}

	function readPositions() {
    $sql = "SELECT id,type FROM positiontype ";

    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
      return $result;
    }
    else {
      return false;
    }
	}
  function getPositions() {
			$this->fillArrayP();
		return $this->positions;
	}
	
	
	
		
	
	
}