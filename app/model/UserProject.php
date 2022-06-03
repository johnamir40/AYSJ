<?php
require_once(__ROOT__ . "model/Model.php");

class UserProject extends Model {
	private $emp_id;
	private $name;
	private $Manager_NameP;
	private $mng_idP;
	private $emp_name;
	private $endDate;
	private $Pemp_name;
	private $fullname;


	function __construct($emp_id,$name="", $Manager_NameP="",$mng_idP="",$emp_name="",$endDate="" ,$Pemp_name="") {
		$this->emp_id = $_SESSION["ID"];
	
		$this->db = $this->connect();

		if(""===$name){
			$this->readProject($emp_id);
	
		}
		else{
			$this->name = $name;
			$this->emp_id = $emp_id;
			$this->Manager_NameP=$Manager_NameP;
			$this->mng_idP=$mng_idP;
			$this->emp_name=$emp_name;
			$this->endDate=$endDate;
			$this->Pemp_name=$Pemp_name;
		}
	}
	function getDueDate(){
		
		$sql= "SELECT endDate from project where name='".$this->name."'";
		$db = $this->connect();
		$result= $db->query($sql);
		
		if ($result==true){
		$row = $db->fetchRow();
		$this->endDate= $row["endDate"];
		}
		return $this->endDate;
		
	}
	function getFullname(){
		$id=$_SESSION['ID'];
		
		$sql= "SELECT fullname from employee where id=".$id;
		$db = $this->connect();
		$result= $db->query($sql);
		
		if ($result==true){
		$row = $db->fetchRow();
		$this->fullname= $row["fullname"];
		}
		return $this->fullname;
		
	}
	function getManagerNameP(){
		
		$sql= "SELECT mng_id from project where name='".$this->name."'";
		$db = $this->connect();
		$result= $db->query($sql);
		
		if ($result==true){
		$row = $db->fetchRow();
		$this->mng_idP= $row["mng_id"];
		
		$usql="SELECT fullname from employee where id='".$this->mng_idP."'";
		$uresult=$db->query($usql);
		if($uresult ==true){
			$roww=$db->fetchRow();
			$this->Manager_NameP= $roww["fullname"];
		}
		
		
		
		
		}
		return $this->Manager_NameP;
	}
	


	function getName() {
		return $this->name;
	}	
	function setName($name) {
		return $this->name = $name;
	}


	function getID() {
		return $this->emp_id;
	}

	function readProject($emp_id){
		$sql = "SELECT * FROM works_on where emp_id=".$emp_id;
		$db = $this->connect();
		$result = $db->query($sql);
		if ($result->num_rows == 1){
			$row = $db->fetchRow();
			$this->name = $row["p_name"];
			$this->emp_id=$row["emp_id"];
			
		
		
		}
		else {
			$this->name = "";
			$this->emp_id = "";
		}
	}
	
	function getEmpName(){
	
		
		$sql="SELECT fullname FROM employee where id=".$_SESSION["ID"];
        $db = $this->connect();
        $result = $db->query($sql);
		if ($result == true){
			 $row = $db->fetchRow();
			 $this->emp_name=$row["fullname"];
			 return $this->emp_name;
			 
		}
		
	}
	function getPEmpName(){
	
		
		$sql="SELECT fullname FROM employee where id=".$this->emp_id;
        $db = $this->connect();
        $result = $db->query($sql);
		if ($result == true){
			 $row = $db->fetchRow();
			 $this->Pemp_name=$row["fullname"];
			 return $this->Pemp_name;
			 
		}
		
	}
	

}