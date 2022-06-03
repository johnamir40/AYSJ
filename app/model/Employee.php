<?php
  require_once(__ROOT__ . "model/Model.php");


?>

<?php
class Employee extends Model {
    protected $id;
  protected $posid;
  protected $fullname;
  protected $username;
  protected $password;
  protected $email;
  protected $img;
  protected $mobile;
  protected $deactivate;
  protected $address;
  protected $salary;
  public $comp_emp;
  public $position;

  function __construct($id="",$posid="",$fullname="",$username="",$password="",$email="",$mobile="",$deactivate="",$address=""
  ,$img="",$position="") {
$this->id = $id;
	    $this->db = $this->connect();

    if(""===$username){
      $this->readEmployee($id);
    }else{
     $this->username = $username;
	  $this->password=$password;
      $this->fullname = $fullname;
      $this->mobile = $mobile;
	  $this->posid=$posid;
	  $this->email=$email;
	  $this->address=$address;
	  $this->posid=$posid;
	  $this->img=$img;
	  $this->position=$position;
    }
  }
  public function update(Subject $subject){
    
  }

 	 function getAddress(){
    return $this->address;
  }
  function setAdress($address){
    return $this->address=$address;
  }
  function getPosId(){
    return $this->posid;
  }
  function setPosId($posid){
    return $this->posid=$posid;
  }
  function getPosition(){
	  $posid=$this->getPosId();
	  
	  $sql = "SELECT type
	FROM positiontype
	where id=".$posid;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
		$row=$db->fetchRow();
		$this->position=$row["type"];
		return $this->position;
	}
	
	}
  
	  
  
  function getFullName(){
    return $this->fullname;
  }
  function setFullName(){
    return $this->fullname=$fullname;
  }
  function getUserName() {
    return $this->username;
  }
  function setUserName($username) {
    return $this->username = $username;
  }
  function getPassword() {
    return $this->password;
  }
  function setPassword($password) {
    return $this->password = $password;
  }
  function getEmail() {
    return $this->email;
  }
  function setEmail($email) {
    return $this->email = $email;
  }
  function getImg() {
    return $this->img;
  }
  function setImg($img) {
    return $this->img = $img;
  }
  function getMobile(){
    return $this->mobile;
  }
  function setMobile($mobile){
    return $this->mobile=$mobile;
  }
  function getID() {
    return $this->id;
  }
  
  function getDeactivate() {
    return $this->deactivate;
  }
  
  function setDeactivate(){
	  
	  return $this->deactivate= $deactivate;
  }



  function readEmployee($id){
    $sql = "SELECT * FROM employee where ID=".$id;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result==true){
        $row = $db->fetchRow();
        $this->posid=$row["position"];
        $this->username = $row["username"];
        $_SESSION["username"]=$row["username"];
        $this->fullname=$row["fullname"];
        $this->password=$row["password"];
        $this->email=$row["email"];
        $this->img=$row["img"];
        $this->mobile = $row["mobile"];
		$this->id=$row["id"];
		$this->deactivate=$row["deactivate"];
		$this->address=$row["address"];
    }
    else {
        $this->username = "";
        $this->fullname="";
        $this->password="";
        $this->email="";
        $this->img="";
        $this->mobile = "";
    }
  }
  
  
 function readSalary($posid){
		$sql = "SELECT salary
FROM positiontype
where id=".$posid;
    $db = $this->connect();
    $result = $db->query($sql);
    if ($result->num_rows == 1){
		$row=$db->fetchRow();
		$this->salary=$row["salary"];
	}
	return $this->salary;
	}
  
}

?>