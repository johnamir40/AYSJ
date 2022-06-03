<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Feedback.php");

class Feedbacks extends Model {
	private $feedbacks;
	function __construct() {
		$this->fillArray();
	}

	function fillArray() {
		$this->feedbacks = array();
		$this->db = $this->connect();
		$result = $this->readFeedbacks();
		while ($row = $result->fetch_assoc()) {
			array_push($this->feedbacks, new Feedback($row["id"]));
		}
	}

	function getFeedbacks() {
		$this->fillArray();  
		return $this->feedbacks;
	}


	function readFeedbacks(){
		$sql = "SELECT * FROM feedback";
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}
	
	function insert($mng_id,$emp_id,$p_name,$feedback,$performance){
		
	
		$sql = "INSERT INTO feedback (mngID, id, p_name,feedback,performance) VALUES ('$mng_id', '$emp_id','$p_name','$feedback','$performance')";
		if($this->db->query($sql) === true){
			echo "Records inserted successfully.";
			 echo '<script>window.location.href= "pm.php";</script>';
			$this->fillArray();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
	function edit($mng_id,$emp_id,$p_name,$feedback,$performance){
		$sql = " UPDATE `feedback` SET
	`feedback`='".$feedback."'
	,`performance`='".$performance."'
	
	WHERE `id`='".$emp_id."' AND mngID='".$mng_id."' AND p_name='".$p_name."'";
	
		if($this->db->query($sql) === true){
			echo '<script>window.location.href= "pm.php";</script>';
			 echo "success";
		} else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}

}
	
