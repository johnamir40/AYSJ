<?php
require_once(__ROOT__ . "model/Model.php");

class Feedback extends Model {
    protected $emp_id;
	protected $Manager_Name;
	protected $emp_Name;
    protected $prj_name;
	protected $mng_id;
    protected $feedback;
    protected $performance;
	protected $f_id;
	
    function __construct($emp_id="",$prj_name="",$feedback="",$performance="",$mng_id="") {
        $this->emp_id = $emp_id;
		$this->mng_id=$mng_id;
		
        $this->db = $this->connect();

        if(""===$prj_name){
            $this->readFeedback($emp_id);
			$this->ReadEmpName($emp_id);
			
			
        }
        else{
            $this->prj_name = $prj_name;
            $this->feedback=$feedback;
            $this->performance = $performance;
			
        }
    }
	function getFID(){
		return $this->f_id;
	}

    function getPrjName() {
        return $this->prj_name;
    }   
    function setPrjName($prj_name) {
        return $this->prj_name = $prj_name;
    }
	
	function getManagerName() {
        return $this->Manager_Name;
    }   
    function setManagerName($Manager_Name) {
        return $this->Manager_Name = $Manager_Name;
    }
	
	function getEmpName() {
        return $this->emp_Name;
    }   
    function setEmpName($emp_Name) {
        return $this->emp_Name = $emp_Name;
    }
	function getMngId() {
        return $this->mng_id;
    }   
    function setMngId($mng_id) {
        return $this->mng_id = $mng_id;
    }
    function getFeedback() {
        return $this->feedback;
    }   
    function setFeedback($feedback) {
        return $this->feedback = $feedback;
    }
    
    function getPerformance() {
        return $this->performance;
    }
    function setPerformance($performance) {
        return $this->performance = $performance;
    }
    function getEmpID() {
        return $this->emp_id;
    }

    function readFeedback($emp_id){
        $sql = "SELECT * FROM feedback where id=".$emp_id;
		
        $db = $this->connect();
        $result = $db->query($sql);
        if ($result == true){
            $row = $db->fetchRow();
            $this->prj_name = $row["p_name"];
            $this->feedback=$row["feedback"];
            $this->performance = $row["performance"];
			$this->mng_id=$row["mngID"];
			
			$usql="SELECT fullname FROM employee where id=".$this->mng_id;
			$uresult= $db->query($usql);
			
			if($uresult == true){
				$roww=$db->fetchRow();
				$this->Manager_Name=$roww["fullname"];
				
			}
			
			
	
        }
        else {
            $this->prj_name = "";
            $this->feedback="";
            $this->performance = "";
			$this->mng_id="";
        }
		

		
		
		
    }
	
	function ReadEmpName($emp_id){
		$sql="SELECT fullname FROM employee where id=".$emp_id;
        $db = $this->connect();
        $result = $db->query($sql);
		if ($result == true){
			 $row = $db->fetchRow();
			 $this->emp_Name=$row["fullname"];
		}
		
	}
	


	

}
