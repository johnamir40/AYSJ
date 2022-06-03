<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/project.php");
require_once(__ROOT__ . "model/Employee.php");
require_once(__ROOT__ . "model/UserProject.php");
class Projects extends Model {
	private $projects;

	function __construct() {
		$this->fillArray();
		$this->fillArraye();
	}


	function fillArray() {
		$this->projects = array();
		$this->db = $this->connect();
		$result = $this->readProjects();
		while ($row = $result->fetch_assoc()) {
			array_push($this->projects, new project($row["name"],$row["description"],$row["mng_id"],$row["startDate"],$row["endDate"],$row["noOfemp"],$row["state_id"]));
		}
	}

	function getProjects() {
			$this->fillArray();
		return $this->projects;
	}

	function getProject($projectname) {
		foreach($this->projects as $project) {
			if ($projectname == $project->getName()) {
				return $project;
			}
		}
	}

	function readProjects(){
		$sql = "SELECT * FROM project";

		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}

	function AssignEmpPrj($fullname,$p_name){
		$pname="select emp_id from works_on where p_name='$p_name'";
		$uuresult = $this->db->query($pname);
		if ($uuresult->num_rows ==1){
			$idd="select id from employee where fullname='$fullname'";
			$uresult = $this->db->query($idd);

			if ($uresult->num_rows ==1){
				$row = $this->db->fetchRow();
				$id=$row["id"];
			
				$sql = "UPDATE works_on set emp_id='$id' where p_name='$p_name'";
				$sql2="INSERT INTO notifications (emp_id,p_name) VALUES ('$id', '$p_name')";
				
				if($this->db->query($sql) === true){
					if($this->db->query($sql2) === true){
						echo "Records inserted successfully.";
						$this->fillArray();
						echo '<script>window.location.href= "pm.php";</script>';
				}	}
			else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
			}
			}
			
		}
		else{
		$idd="select id from employee where fullname='$fullname'";
		$uresult = $this->db->query($idd);

		if ($uresult->num_rows ==1){
			$row = $this->db->fetchRow();
			$id=$row["id"];
			
			$sql = "INSERT INTO works_on (emp_id, p_name) VALUES ('$id', '$p_name')";
			$sql2="INSERT INTO notifications (emp_id,p_name) VALUES ('$id', '$p_name')";
			if($this->db->query($sql) === true){
				if($this->db->query($sql2) === true){
					echo "Records inserted successfully.";
					$this->fillArray();
					echo '<script>window.location.href= "pm.php";</script>';
			}	}
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
		}}
	}

	function insertProject($name, $description, $managername, $startDate,$endDate,$noOfemp,$stateid){

		$checkusername=" SELECT * FROM project WHERE name='$name' ";
	$db = $this->connect();
    $resultt = $db->query($checkusername);

    if ($resultt->num_rows ==1){

			echo "<script>alert('Project already exists')</script>";
			echo '<script>window.location.href= "pm.php";</script>';
		}
		else{
			$managerid="select id from employee where fullname='$managername'";
				$uresult = $this->db->query($managerid);

				if ($uresult->num_rows ==1){
					$row = $this->db->fetchRow();
					$mng_id=$row["id"];
		$sql = "INSERT INTO project (name, description,mng_id,startDate,endDate,noOfemp,state_id) VALUES ('$name', '$description', '$mng_id', '$startDate','$endDate','$noOfemp','$stateid')";
		if($this->db->query($sql) === true){
			echo "Records inserted successfully.";
			$this->fillArray();
			echo '<script>window.location.href= "pm.php";</script>';
		}
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}}
	}}
	function  editProject($name, $description, $projectmanager, $startDate,$endDate,$noOfemp="",$state){
		$state_id="select id from proj_state where state='$state'";
				$uuresult = $this->db->query($state_id);

				if ($uuresult->num_rows ==1){
					$roww = $this->db->fetchRow();
					$stateid=$roww["id"];
					echo $stateid;
					$managerid="select id from employee where fullname='$projectmanager'";
					$uresult = $this->db->query($managerid);

						if ($uresult->num_rows ==1){
							$row = $this->db->fetchRow();
							$mng_id=$row["id"];
							echo $mng_id;

						$sql = "UPDATE project set description='$description', 
						mng_id='$mng_id', startDate='$startDate', endDate='$endDate', 
						noOfemp='$noOfemp', state_id='$stateid' where name='$name' ";
						
						if($this->db->query($sql) === true){
							echo "updated successfully.";
							echo '<script>window.location.href= "pm.php";</script>';
						} else{
							echo "ERROR: Could not able to execute $sql. " . $conn->error;
						}

	}}}
	function deleteProject($name){
		$sql="UPDATE project set state_id=2 where name='$name'";
		if($this->db->query($sql) === true){
						echo "deletet successfully.";
						 echo '<script>window.location.href= "pm.php";</script>';
				} else{
						echo "ERROR: Could not able to execute $sql. " . $conn->error;
				}
	}
	function fillArraye() {
		$this->employees= array();
		$this->db = $this->connect();
		$result = $this->readEmployees();
		while ($row = $result->fetch_assoc()) {
			array_push($this->employees, new Employee($row['id'],$row["position"],$row["fullname"],$row["username"],$row["password"],$row["email"],$row["img"],$row["mobile"],$row["deactivate"],$row["address"]));
		}
	}

	function readEmployees() {
    $sql = "SELECT * FROM employee where position=4";

    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
      return $result;
    }
    else {
      return false;
    }
	}

  function getEmployees() {
			$this->fillArraye();
		return $this->employees;
	}
	function fillArrayM() {
		$this->Managers= array();
		$this->db = $this->connect();
		$result = $this->readManagers();
		while ($row = $result->fetch_assoc()) {

			array_push($this->Managers, new Employee($row['id'],$row["position"],$row["fullname"]));
		}
	}

	function readManagers() {
    $sql = "SELECT id,position,fullname FROM employee where position=3";

    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
      return $result;
    }
    else {
      return false;
    }
	}
  function getManagerNames() {
			$this->fillArrayM();
		return $this->Managers;
	}


	function fillArrayEmp() {
		$this->projectEmps= array();
		$this->db = $this->connect();
		$result = $this->readprojectEmps();
		while ($row = $result->fetch_assoc()) {

			array_push($this->projectEmps, new UserProject($row["emp_id"],$row["p_name"]));
		}
	}

	function readprojectEmps() {
    $sql = "SELECT * FROM works_on";

    $result = $this->db->query($sql);
    if ($result->num_rows > 0){
      return $result;
    }
    else {
      return false;
    }
	}
  function getProjectEmps() {
			$this->fillArrayEmp();
		return $this->projectEmps;
	}
	function deleteProjectemp($id){
		$sql="delete from works_on where p_name='$id'";
		if($this->db->query($sql) === true){

				} else{
						echo "ERROR: Could not able to execute $sql. " . $conn->error;
				}
	}




}

?>
