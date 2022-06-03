<?php

require_once(__ROOT__ . "controller/Controller.php");

class HRController extends Controller{
	public function insert() {
		if (isset($_POST['submit'])){

			$fullname=$_POST['fullname'];
			$address=$_POST['address'];
			$mobile=$_POST['mobile'];
			$position=$_POST['position'];
			$username=$_POST['username'];
			$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
			$hashed_password=password_hash($hashed_password,PASSWORD_BCRYPT,array('salt'=>$hash));

			$email=$_POST['email'];

			if(isset($_FILES['image'])){

                          $errors= array();

                          $file_name = $_FILES['image']['name'];

                          $file_size =$_FILES['image']['size'];

                          $file_tmp =$_FILES['image']['tmp_name'];

                          $file_type=$_FILES['image']['type'];

                                         $exploded = explode('.', $_FILES['image']['name']);

                                         $last_element = end($exploded);

                                         $file_ext=strtolower($last_element);

                          $extensions= array("jpeg","jpg","png");



                          if(in_array($file_ext,$extensions)=== false){

                             $errors[]="extension not allowed, please choose a JPEG or PNG file.";

                          }



                          if($file_size > 2097152){

                             $errors[]='File size must be excately 2 MB';

                          }



                          if(empty($errors)==true){

                             move_uploaded_file($file_tmp,"images/".$file_name);

                             echo "Success";

                          }else{

                             print_r($errors);

                          }

}


		$this->model->insertEmployee($fullname,$address,$mobile,$username,$password,$email, $position,$file_name);
		}
	}

	public function edit($id) {

		$id= $_POST['id'];
		$fullname=$_POST['fullname'];
		$address=$_POST['address'];
		$mobile=$_POST['mobile'];
		$position=$_POST['position'];
		$username=$_POST['username'];
		$oldpassword=$_POST['oldpassword'];
		$newpassword=$_POST['password'];
		$email=$_POST['email'];
		if (isset($_POST['submit'])){
			try{
				$length=strlen("$mobile");
				if($mobile < 0 || $length !== 10)
				{
					throw new Exception ("phone number not valid");
				}
			}catch(Exception $e){
				$emesg=	$e->getMessage();
				echo "<script>alert('$emesg')</script>";
				echo '<script>window.location.href= "hrmanager.php";</script>';
				die();
			}
}
		if($newpassword == ""){
				$this->model->editEmployee($id,$fullname,$address,$mobile,$username,$oldpassword,$email,$position);

}
else{
$hash = '$2y$07$BCryptRequires22Chrcte/VlQH0piJtjXl.0t1XkA8pw9dMXTpOq';
$password=password_hash($newpassword,PASSWORD_BCRYPT,array('salt'=>$hash));
$this->model->editEmployee($id,$fullname,$address,$mobile,$username,$password,$email,$position);
	}
}

	public function deactivate($Emp_id){
		$this->model->deactivateEmployee($Emp_id);
	}

}
?>
