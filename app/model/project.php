<?php
require_once(__ROOT__ . "model/Model.php");


?>
<?php
class Project extends Model {
  private $name;
  private $description;
  private $mngid;
  private $startDate;
  private $endDate;
  private $noOfemp;
  private $stateid;
  private $ManagerName;
  private $state;

  function __construct($name,$description="",$mngid="",$startDate="",$endDate="",$noOfemp="",$stateid="",$ManagerName="") {
    $this->name = $name;
	    $this->db = $this->connect();

    if(""===$description){
      $this->readProject($name);
    }else{
	    $this->description=$description;
      $this->mngid = $mngid;
      $this->startDate = $startDate;
      $this->endDate = $endDate;
      $this->noOfemp = $noOfemp;
      $this->stateid = $stateid;
	  $this->ManagerName=$ManagerName;
    }
  }

  public  function getName() {
    return $this->name;
  }
  function setName($name) {
    return $this->name = $name;
  }
  function getDesc() {
    return $this->description;
  }
  function setDesc($description) {
    return $this->description= $description;
  }
  function getMngID() {
    return $this->mngid;
  }
  function setMngID($mngid) {
    return $this->mngid = $mngid;
  }
  function getstartd() {
    return $this->startDate;
  }
  function setstartd($startDate) {
    return $this->startDate= $startDate;
  }
  function getendd() {
    return $this->endDate;
  }
  function setendd($endDate) {
    return $this->endDate = $endDate;
  }
  function getnoOfemp() {
    return $this->noOfemp;
  }
  function setnoOfemp($noOfemp) {
    return $this->noOfemp = $noOfemp;
  }
  function getstateid() {
    return $this->stateid;
  }
  function setstateid($stateid) {
    return $this->stateid= $stateid;
  }
  
  function getState(){
	  $id=$this->getstateid();
	  $db = $this->connect();
	  $usql="select state from proj_state where id=".$id;
		$uresult=$db->query($usql);
		if ($uresult->num_rows == 1){
			$roww = $db->fetchRow();
			$this->state= $roww["state"];
				return $this->state;
		}
  }

function getManagerName(){
	$id=$this->getMngID();
	 $db = $this->connect();
	 $usql="select fullname from employee where id=".$id;
		$uresult=$db->query($usql);
		if ($uresult->num_rows == 1){
			$roww = $db->fetchRow();
			$this->ManagerName= $roww["fullname"];
				return $this->ManagerName;
		}

}


  function readProject($name){
    $sql = "SELECT * FROM project where name=".$name;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
        $row = $db->fetchRow();
        $this->name = $row["Name"];
		    $this->description=$row["description"];
        $this->mngid= $row["mng_id"];
        $this->startDate= $row["startDate"];
        $this->endDate= $row["endDate"];
        $this->noOfemp= $row["noOfemp"];
        $this->stateid= $row["stateid"];
		
		
		
}
    else{}
  }

  function deleteProject(){
    $sql="delete from project where name=$this->name;";
    if($this->db->query($sql) === true){
            echo "deletet successfully.";
        } else{
            echo "ERROR: Could not able to execute $sql. " . $conn->error;
        }
  }

  }
?>
