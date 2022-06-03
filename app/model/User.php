<?php
  require_once(__ROOT__ . "model/Model.php");
?>

<?php
class User extends Model {

    protected $id;
    protected $posid;
    protected $fullname;
    protected $username;
    protected $password;



    function __construct($id="",$posid="",$fullname="",$username="",$password="") {
        $this->id = $id;
        $this->db = $this->connect();
        if(""===$username){
            $this->readUser($id);
        }
        else{
            $this->username = $username;
            $this->password=$password;
            $this->fullname = $fullname;

        }

    }


    function getID() {
        return $this->id;
    }
    function getPosId(){
        return $this->posid;
    }
    function setPosId($posid){
        return $this->posid=$posid;
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
  $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
  $hashedpass=password_hash($this->password,PASSWORD_BCRYPT,array('salt'=>$hash));
        return $hashedpass;
    }
    function setPassword($password) {
        $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
    $hashedpass=password_hash($password,PASSWORD_BCRYPT,array('salt'=>$hash));
        return $this->password = $hashedpass;
    }

    function Login($username,$password){
      $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
  $hashed_password=password_hash($password,PASSWORD_BCRYPT,array('salt'=>$hash));
        $sql="SELECT * FROM employee WHERE username='$username' AND password='$hashed_password' AND deactivate='0'";
        $db = $this->connect();
        $result = $db->query($sql);
        if ($result->num_rows == 1){
            $row = $db->fetchRow();
            $_SESSION["ID"]=$row["id"];
            $_SESSION["username"]=$row["username"];
            echo "<script>alert('Logged in Successfully');</script>";
            $this->acctype = $row['position'];
            if( $this->acctype == '1'){
                echo '<script>window.location.href= "hrmanager.php";</script>';
            }

            else if($this->acctype=='3' ){
                echo '<script>window.location.href= "pm.php";</script>';
            }
            else{
                echo '<script>window.location.href= "myprojects.php";</script>';
            }
        }
        else{
            echo "<script>alert('Wrong username or password.');</script>";
        }
    }

    function readUser($id){
        $sql = "SELECT * FROM employee where ID=".$id;
        $db = $this->connect();
        $result = $db->query($sql);
        if ($result==true){
            $row = $db->fetchRow();
            $this->posid=$row["position"];
            $this->username = $row["username"];
            $_SESSION["username"]=$row["username"];
			 $_SESSION["id"]=$row["id"];
            $this->fullname=$row["fullname"];
            $hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';

            $this->password=password_hash($row["password"],PASSWORD_BCRYPT,array('salt'=>$hash));;

			echo $_SESSION["id"];
        }
        else{
            $this->username = "";
            $this->fullname="";
            $this->password="";
        }
      }
      
      function forgotpassword($email){
             $db = $this->connect();
               $sql="SELECT * FROM employee WHERE email='$email'";

               $result = $db->query($sql);
               if ($result->num_rows == 1){
                 $roww = $db->fetchRow();
                 $to_email = $roww["email"];
                 $subject = 'This mail is sent using the PHP mail function';
                 $message = 'You password is'.$roww["password"];
                 $headers = 'From: kkk@miuegypt.edu.eg';
                 mail($to_email,$subject,$message,$headers);

                 }
               }





}
