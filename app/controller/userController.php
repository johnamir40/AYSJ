<?php

require_once(__ROOT__ . "controller/Controller.php");
require_once __DIR__ . '/vendor/autoload.php';


class userController extends Controller{
	public function login(){
		if (isset($_POST['submit'])){
		$username= $_POST['username'];
		$password=$_POST['password'];
		$this->model->login($username,$password);
		}
}

	public function close(){
		$id= $_SESSION['ID'];
		echo $id;
		$this->model->close($id);
		}


	public function print(){
		$pname= $_POST["pname"];
		$pdesc= $_POST["pdesc"];
		$mngid=$_POST["mngid"];
		$sd=$_POST["sd"];
		$ed=$_POST["ed"];


				$mpdf= new \Mpdf\Mpdf();
		$data='';
		$data="Project's Name:".$pname."<br>";
		$data.="Project's Description:".$pdesc."<br>";
		$data.="Manager's Name:".$mngid."<br>";
		$data.="Start Date:".$sd."<br>";
		$data.="End Date:".$ed."<br>";

		echo $data;
		ob_clean();

		$mpdf->WriteHTML($data);

		$mpdf->Output($pname.'.pdf','D');
	}
	function forgot_password(){
if(isset($_POST['forgot']))
        {
   $email=$_POST['email'];
$this->model->forgotpassword($email);
}
}
}
?>
