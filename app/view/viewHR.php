<head>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script>
			$(document).ready(function(){
			$("#remove."<?php echo $id;?>".").click(function(){
			$("#emp-div."<?php echo $id;?>".").hide();
				});
			});
		</script>


<script>
function validateaddForm() {

	$(".form-control").css('background-color','');
	$(".info").html('');

	if(!$("#fullname").val()) {
		$("#fullname-info").html("(required)");
		$("#fullname").css('background-color','#FFFFDF');
		return false;
	}

	if(!$("#mobile").val()) {
		$("#mobile-info").html("(required)");
		$("#mobile").css('background-color','#FFFFDF');
		return false;
	}
	if(!$("#username").val()) {
		$("#username-info").html("(required)");
		$("#username").css('background-color','#FFFFDF');
		return false;
	}
	if(!$("#password").val()) {
		$("#password-info").html("(required)");
		$("#password").css('background-color','#FFFFDF');
		return false;
	}

	if(!$("#email").val()) {
		$("#email-info").html("(required)");
		$("#email").css('background-color','#FFFFDF');
		return false;
	}
	if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
		$("#email-info").html("(invalid)");
		$("#email").css('background-color','#FFFFDF');
		return false;
	}
	if(!$("#subject").val()) {
		$("#subject-info").html("(required)");
		$("#subject").css('background-color','#FFFFDF');
		valid = false;
	}
	if(!$("#address").val()) {
		$("#address-info").html("(required)");
		$("#address").css('background-color','#FFFFDF');
		return false;
	}


}




</script>

</head>
<?php
require_once(__ROOT__ . "view/View.php");

class ViewHR extends View{

	public function output(){
		$deactivate='0';
		$str = "";
		foreach($this->model->getEmployees() as $Employee){
			if($Employee->getID() == $_SESSION["ID"]){
				  $str.='
					<div id="page-content-wrapper">
						<div class="all-page-bar"  style=" background: url("images/background.png");">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-12">
										<div class="title title-1 text-center">
											<div class="much">
												<img src="'.$Employee->getImg().'" alt=""/>
											</div>

											<div class="title--heading">
												<h1>Hi! '.$Employee->getFullName().'</h1>
											</div>

										</div>

									</div>
								</div>
							</div>
						</div><!-- end all-page-bar -->';}}
						$str.="<form action='hrmanager.php?print' method='post' name='print'>";
			foreach($this->model->getEmployees() as $Employee){
				if($Employee->getDeactivate() == $deactivate){

					$str.='<div class="row">
					<a  class= "col-md-6" href="hrmanager.php?action=view&id='.$Employee->getID().'">
					<div class="col-md-6" >
						<div class="service-wrap text-center clearfix">
							<div class="uptop">
								<img src="images/'.$Employee->getImg() .'" alt="" class="img-responsive img-rounded alignleft">
							</div>
							<h4>'. $Employee->getFullName().'</h4>
							<p>'.$Employee->getEmail().'</p>
							<p>'.$Employee->getMobile().'</p>

							<div class="breadcrumb">
							<form id="form" method="POST" action="hrmanager.php">
								<input type="hidden" name="id" value='.$Employee->getID().'>
								<input type="image" formaction="hrmanager.php?action=edit&id='.$Employee->getID().'" src="https://img.icons8.com/ios/50/000000/edit.png"/>
								<input type="image" formaction="hrmanager.php?action=remove&id='.$Employee->getID().'"  src="https://img.icons8.com/ios/50/000000/cancel.png">
						</form>
						</div>
						</div>
					</div></a>
				</div>';
		}}
		return $str;
	}
	public function editform($id){
		$str = "";
			$str.="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa</small>
						<h3>Edit Employee.</h3>
					</div>
				</div>";
		foreach($this->model->getEmployees() as $Employee){
			if($Employee->getID()===$id) 	{
						$str.='<div class="row">
					<div class="col-lg-12">
						<div class="contact_form">
							<div id="message"></div>';
				$str.="<form action='hrmanager.php?action=editAction&id=".$Employee->getID()."' method='post' name='editForm'
				onsubmit=' return validateaddForm()' >";
				$str.="<input type='hidden' name='id' value='".$Employee->getID() ."'>";
				$str.='<div class="uptop">
							<img src="'.$Employee->getImg() .'" alt="" class="img-responsive img-rounded alignleft">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Full Name:</p><span id="fullname-info" class="info"></span>

							<input type="text" name="fullname" id="fullname" class="form-control"
							value="'.$Employee->getFullName().'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Address:</p><span id="address-info" class="info"></span>

							<input type="text" name="address" id="address" class="form-control"
							value="'.$Employee->getAddress().'">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="mobilediv">
							<p>Mobile:</p><span id="mobile-info" class="info"></span><br/>

							<input type="number" name="mobile" id="mobile" class="form-control"
							value="'.$Employee->getMobile().'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Email:</p><span id="email-info" class="info"></span><br/>

							<input type="email" name="email" id="email" class="form-control"
							value="'.$Employee->getEmail().'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Username:</p><span id="username-info" class="info"></span><br/>

							<input type="text" name="username" id="username" class="form-control"
							value="'.$Employee->getUserName().'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
							<p>Password:</p><span id="password-info" class="info"></span><br/>
							<input type="hidden" name="oldpassword" id="password" class="form-control"
							value="'.$Employee->getPassword().'">
							<input type="password" name="password" id="password" class="form-control"
							>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p>Position:</p>
							<select name="position" id="position" class="form-control">
							<option>'.$Employee->getPosition().'</option>';
							foreach ($this->model->getPositions() as $Employeee){
								if($Employeee->getPosition() != $Employee->getPosition()){
								$str.='<option>'.$Employeee->getPosition().'</option>';}
							}
							$str.='</select>
						</div>

						<div class="form-btn text-center">

							<button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt"
							name="submit">Confirm</button>

						</div>
					</form>
				</div>
			</div>
		</div>';

			}
		}
		return $str;
	}
	public function view($id){
		$str = "";
		foreach($this->model->getEmployees() as $Employee){
			if($Employee->getID()===$id) 	{
				$str.="<div>";
				$str="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa</small>
						<h3>View ".$Employee->getFullName()."</h3>
					</div>
				</div>";

				$str.='<div class="row">
					<div class="col-lg-12">
						<div class="contact_form">
							<div id="message"></div>';

				$str.="<form action='CompensateEMP.php?action=overtime&id=".$Employee->getID()."' method='post'>";


				$str.="<div><img class=''
				src='".$Employee->getImg() ."'></img>";
				$str.="<button type='submit' class='btn btn-light btn-radius btn-brd grd1 btn-block subt'>
				overtime</button></div>";

				$str.="<input disabled type='hidden' name='id' value='".$Employee->getID() ."'>";

				$str.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Full Name:</p><span id="fullname-info" class="info"></span>

							<input type="text" name="fullname" id="fullname" class="form-control" value="'. $Employee->getFullName() .'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Address:</p><span id="fullname-info" class="info"></span>

							<input type="text" disabled name="address" id="address" class="form-control" value="'. $Employee->getAddress() .'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Mobile:</p><span id="fullname-info" class="info"></span>

							<input type="number" disabled name="mobile" id="mobile" class="form-control" value="'. $Employee->getMobile() .'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Email:</p><span id="fullname-info" class="info"></span>

							<input type="email" disabled name="email" id="email" class="form-control" value="'. $Employee->getEmail() .'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Status:</p><span id="fullname-info" class="info"></span>
							<select class="form-control" id="status">
							<option value="active">Active</option>
							<option value="deactivated">Deactivated</option>
							</select>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Position:</p><span id="fullname-info" class="info"></span>
							<select name="acctype" class="form-control" id="position">
							<option value="hr-mng">Hr Manager</option>
							<option value="hr-team">HR Employee</option>
							<option value="prj-mng">Project Manager</option>
							<option value="prj-eam">Employee</option>
							</select>
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Salary:</p><span id="fullname-info" class="info"></span>

							<input type="number" disabled name="salary" id="salary" class="form-control" value="'. $Employee->readSalary('1').'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>UserName:</p><span id="fullname-info" class="info"></span>

							<input type="text" name="username" id="username" class="form-control"
										value="'. $Employee->getUserName() .'">
						</div>

						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Password:</p><span id="fullname-info" class="info"></span>

							<input type="number" disabled name="password" id="password" class="form-control" value="'. $Employee->getPassword().'">
						</div>

						';
				$str.="</form>
						</div>
					</div>
			</div>
		</div>";
			}
		}
		return $str;
	}
	public function addform(){
		$str = "";
		$str="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa</small>
						<h3>Add Employee</h3>
					</div>
				</div>";

				$str.='<div class="row">
					<div class="col-lg-12">
						<div class="contact_form">
							<div id="message"></div>
							<form name="addForm" action="hrmanager.php?action=insertAction" method="post" onsubmit=" return validateaddForm()"
							enctype="multipart/form-data">
								<fieldset class="row row-fluid">
									<input type="hidden" name="id" >


									 <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Image</p>
										<input  class="btn btn-light btn-radius btn-brd grd1 effect-1" type="file" name="image" />
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Full Name:</p><span id="fullname-info" class="info"></span>

										<input type="text" name="fullname" id="fullname" class="form-control" placeholder="Full Name">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Address:</p><span id="address-info" class="info"></span>

										<input type="text" name="address" id="address" class="form-control" placeholder="Address">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="mobilediv">
										<p>Mobile:
										</p><span id="mobile-info" class="info"></span><br/>

										<input type="number" name="mobile" id="mobile" class="form-control" placeholder="Mobile">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Email:</p>
										<span id="email-info" class="info"></span><br/>
										<input type="email" name="email" id="email" class="form-control" placeholder="Email">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Username:</p>
										<span id="username-info" class="info"></span><br/>
										<input type="text" name="username" id="username" class="form-control" placeholder="UserName">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
										<p>Password:</p>
										<span id="password-info" class="info"></span><br/>
										<input type="password" name="password" id="password" class="form-control" placeholder="">
									</div>
										<div id="ehyaba" style="color:green;font-size:12px;"></div>
					<div id="ehyaba2" style="color:red;font-size:12px;"></div>

									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<p>Position:</p>
										<select name="position" id="position" class="form-control">';
											foreach ($this->model->getPositions() as $Employeee){

											$str.='<option>'.$Employeee->getPosition().'</option>';
											}
										$str.='</select>
									</div>

									<div class="form-btn text-center">

										<button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt"
										name="submit">Confirm</button>

									</div>
								</fieldset>
							</form>
						</div>
					</div>
			</div>
		</div>';
		return $str;
	}
	function infoEmp(){
		$str = "";

		$id=$_SESSION["ID"];
			$str = "";
		$str="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa</small>
						<h3>My Info.</h3>
					</div>
				</div>";

		foreach($this->model->getEmployees() as $Employee){
			if($Employee->getID()===$id) 	{

				$str.='<div class="row">
					<div class="col-lg-12">
						<div class="contact_form">
							<div id="message"></div>
							<form name="addForm"  method="post" onsubmit=" >
								<fieldset class="row row-fluid">
									<input type="hidden" name="id"  value="'.$Employee->getID() .'" >

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Full Name:</p>
										<input type="text" disabled name="fullname" id="fullname" class="form-control" value="'. $Employee->getFullName() .'">
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Address:</p>
										<input type="text" disabled name="address" id="address" class="form-control" value="'. $Employee->getAddress() .'">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Mobile:</p>
										<input type="number" disabled name="mobile" id="mobile" class="form-control" value="'. $Employee->getMobile() .'">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Email:</p>
										<input type="email" disabled name="email" id="email" class="form-control" value="'. $Employee->getEmail() .'">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Salary:</p>
										<input type="number" disabled name="salary" id="salary" class="form-control" value="'.  $Employee->readSalary('4') .'">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Username:</p>
										<input type="text" disabled name="username" id="username" class="form-control" value="'. $Employee->getUserName() .'">
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<p>Position:</p>
										<select name="position" id="position" class="form-control">
										<option>'.$Employee->getPosition().'</option>";';

											foreach ($this->model->getPositions() as $Employeee){
												if($Employeee->getPosition() != $Employee->getPosition()){
												$str.="<option>".$Employeee->getPosition()."</option>";}
											}

										$str.='</select>
									</div>


									</fieldset>
							</form>
						</div>
					</div>
			</div>
		</div>';
		}
		}
		return $str;
	}
	function loginview(){
	$str='';
	$str.='
		<div class="row">
	<div class="col-lg-12">
		<div class="contact_form">
			<div id="message"></div>
			<h3>Please enter username and password</h3>

	 <form class="col-lg-6 col-md-6 col-sm-6 col-xs-12"method="post" action="login.php?action=login">
        <label class="info" for="name" >UserName:</label>
        <input class="form-control" type="text" name="username" id="username"><br>
        <label class="info" for="pass" >Password:</label>
        <input class="form-control" type="password" name="password" id="password" >
				  <a class="btn btn-link" href="login.php?action=forgot">Forgot Password</a><br>
					<input class="btn btn-light btn-radius btn-brd grd1 effect-1" type="submit" name="submit" value="Login">

</form>	</div>
	</div>
	</div>
	</div>
';
return $str;
}

	function forgotpassword(){
$str='';
$str.=' 	<div class="row">
<div class="col-lg-12">
	<div class="contact_form">
		<div id="message"></div>
		<h3>Please Enter Your Email</h3>
		<form name="forgotform" action="login.php?action=forgotpass" method="post">
<p>Email:</p>
<input type="text" name="email"  class="form-control" />
<button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt"
name="forgot">Confirm</button>
</form></div>
	</div>
	</div>
	</div> ';


return $str;

}


}
?>
