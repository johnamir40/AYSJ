
<?php
require_once(__ROOT__ . "view/View.php");
class viewFeedback extends View{
	public function output(){
		$str="";
		$str='<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="hrmanager.php">View Employees</a></li>
						<li class="nav-item"><a class="nav-link" href="feedbacks.php">Feedbacks</a></li>
						<li class="nav-item"><a class="nav-link" href="hrmanager.php?action=insert">Add Employee</a></li>
						<li class="nav-item"><a class="nav-link" href="feedbacks.php?action=logout">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>';
		foreach($this->model->getfeedbacks() as $Feedback){
				$str.="<div class='row'>
					<div class='col-md-6'>
						<div class='service-wrap text-center clearfix'>
							<h4>Project Manager's Name: ". $Feedback->getManagerName()."</h4>
							<p>Project Name: ".$Feedback->getPrjName()."</p>
							<p>Employee Name: ".$Feedback->getEmpName()."</p>";
							$str.="<div>
							<a href='feedbacks.php?action=viewHr&id=".$Feedback->getEmpID()."&mngid=".$Feedback->getMngId()."' id='submit'
							class='btn btn-light btn-radius btn-brd grd1 btn-block subt'> View Feedback </a> 
							</div>";
						$str.="</div>
						</div>
					</div>
				";
		}
		return $str;
	}
	public function feedbackview($id){
		$strr = "";
		foreach($this->model->getfeedbacks() as $Feedback){
			if($Feedback->getEmpID()===$id){
				$strr.='<div style="display:block;" class="top-add alert alert-light alert-dismissible" id="p-div">
				
				<strong>Feedback: '.$Feedback->getFeedback().'</strong> <br>
				
				<strong>Performance: </strong>
				<input type="range" disabled min="1" max="10" value="'.$Feedback->getPerformance().'" ><br>
					<strong>Value: '.$Feedback->getPerformance(). '</strong><br>
				<a href="feedbacks.php">
				<button class="btn btn-light btn-radius btn-brd grd1 btn-block subt" >Back</button></a>
				</div>';
			}	
	}
		return $strr;
	}
	public function feedbackviewEmp($id,$mngid){
		$strr = "";
		foreach($this->model->getfeedbacks() as $Feedback){
			if($Feedback->getEmpID()===$id && $Feedback->getMngId()=== $mngid) 	{	
		$strr.=" <div >
			<div >
				<label class='labelfeedback'>Feedback</label>
				<div class='print' >".$Feedback->getFeedback()."
				</div>
			</div>";
			$strr.="<h3 class='feedbackdiv'>performance rating:</h3>
				<div class='slidecontainerfeedbacks' style=''>
					<input type='range' disabled min='1' max='10' value='".$Feedback->getPerformance()."' class='slider' id='myRange'>
					<p style='position: relative;top: 270px;'>Value: ".$Feedback->getPerformance(). "<span id='demo'></span></p>
				</div>
			<a href='myfeedback.php'>'<button type='button' class='back'>Back</button></a>
		</div>";
	}
}
	return $strr;
}

	function viewFeedbackEmp(){
		$str = "";
		$str.="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa</small>
						<h3> Feedbacks </h3>
					</div>
				</div>";
		$id=$_SESSION["ID"];
		foreach($this->model->getfeedbacks() as $Feedback){
			if($Feedback->getEmpID()===$id) {
			$str.="<div class='row'>
					<div class='col-md-6'>
						<div class='service-wrap text-center clearfix'>
							<h4>Projects Manager's Name: ". $Feedback->getManagerName()."</h4>
							<p>Project's Name: ".$Feedback->getPrjName()."</p>
							<p>Employee's Name: ".$Feedback->getEmpName()."</p>
							";
								$str.="<div>
							<a href='myfeedback.php?action=EmpviewF&id=".$Feedback->getEmpID()."&mngid=".$Feedback->getMngId()."&p_name=".$Feedback->getPrjName()."' id='submit'
							class='btn btn-light btn-radius btn-brd grd1 btn-block subt'> View Feedback </a> 
							</div>
							</div>
						</div>
					</div>";
			}
		}
		return $str;
	}
	function EmpviewF(){
		$strr = "";
		$id=$_GET['id'];
		$mngid=$_GET['mngid'];
		$p_name=$_GET['p_name'];
		foreach($this->model->getfeedbacks() as $Feedback){
			if($Feedback->getEmpID()===$id && $Feedback->getMngId()===$mngid && $Feedback->getPrjName()=== $p_name) 	{
				$strr.='<div style="display:block;" class="top-add alert alert-light alert-dismissible" id="p-div">
				<strong>Feedback: '.$Feedback->getFeedback().'</strong> <br>
				<strong> Performance </strong>
				<input type="range" disabled min="1" max="10" value="'.$Feedback->getPerformance().'" ><br>
					<strong>Value: '.$Feedback->getPerformance(). '</strong><br>
				<a href="myfeedback.php">
				<button class="btn btn-light btn-radius btn-brd grd1 btn-block subt" >Back</button></a>
				</div>';
			}
		}
		return $strr;
	}

	function insertFeedback(){
	$str="";	
		foreach($this->model->getFeedbacks() as $Feedback){
			if($Feedback->getEmpID()===$_GET['emp_id']  && $Feedback->getMngId()=== $_GET['mng_id'] && $Feedback->getPrjName()=== $_GET['p_name']){
				$str='	<header class="top-navbar">
					<nav class="navbar navbar-expand-lg navbar-light bg-light">
						<div class="container">
							<a class="navbar-brand" href="pm.php">
								<img src="images/logo.png" alt="" />
							</a>
							<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
								<span class="icon-bar top-bar"></span>
								<span class="icon-bar middle-bar"></span>
								<span class="icon-bar bottom-bar"></span>
							</button>
					<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active"><a class="nav-link" href="pm.php">View All Projects</a></li>
						<li class="nav-item active"><a class="nav-link" href="pm.php?action=active">Active Projects</a></li>
						<li class="nav-item"><a class="nav-link" href="pm.php?action=completed">Completed Projects</a></li>
						<li class="nav-item"><a class="nav-link" href="pm.php?action=cancelled">Cancelled Projects</a></li>
						<li class="nav-item"><a class="nav-link" href="pm.php?action=insert">Add Project</a></li>
						<li class="nav-item"><a class="nav-link" href="hrmanager.php?action=logout">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>';
	$str.="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa</small>
						<h3>Give Feedback</h3>
					</div>
				</div>";
				$str.='<div class="row">
					<div class="col-lg-12">
						<div class="contact_form">
							<div id="message"></div>';
				$str.="<form name='editForm' action='feedbacks.php?action=edit' method='post' onsubmit='return validateForm()'>";
				$str.="<input type='hidden' name='emp_id' value='".$_GET['emp_id']."'>";
				$str.="<input type='hidden' name='mng_id' value='".$_GET['mng_id']."'>";
				$str.="<input type='hidden' name='p_name' value='".$_GET['p_name']."'>";
				$str.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Feedback:</p><span id="fullname-info" class="info"></span>
							<input type="text" name="feedback" id="feedback" class="form-control" value="'.$Feedback->getFeedback().'" placeholder="Write your feedback">
						</div>
						
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Performance:</p><span id="fullname-info" class="info"></span>
							<input type="number" name="performance"  min="0" max="10"
							id="performance" class="form-control" value="'.$Feedback->getPerformance().'">
						</div>';
				$str.="<div class='form-btn text-center'>
				<button type='submit' class='btn btn-light btn-radius btn-brd grd1 btn-block subt'
				name='submit'>Confirm</button><br><br><br> 
				</div>";
				
				$str.="</form>
						</div>
					</div>
				</div>
				</div>";
	
			}
		}
	if($str==""){		
	$str='	<header class="top-navbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container">
				<a class="navbar-brand" href="pm.php">
					<img src="images/logo.png" alt="" />
				</a>
				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbars-rs-food" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icon-bar top-bar"></span>
					<span class="icon-bar middle-bar"></span>
					<span class="icon-bar bottom-bar"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbars-rs-food">
					<ul class="navbar-nav ml-auto">
					<li class="nav-item active"><a class="nav-link" href="pm.php">View All Projects</a></li>
						<li class="nav-item active"><a class="nav-link" href="pm.php?action=active">Active Projects</a></li>
						<li class="nav-item"><a class="nav-link" href="pm.php?action=completed">Completed Projects</a></li>
						<li class="nav-item"><a class="nav-link" href="pm.php?action=cancelled">Cancelled Projects</a></li>						
						<li class="nav-item"><a class="nav-link" href="pm.php?action=insert">Add Project</a></li>
						<li class="nav-item"><a class="nav-link" href="hrmanager.php?action=logout">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>';	
	$str.="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa</small>
						<h3>Give Feedback</h3>
					</div>
				</div>";			
		$str.='<div class="row">
					<div class="col-lg-12">
						<div class="contact_form">
							<div id="message"></div>';
				$str.="<form name='addForm' action='feedbacks.php?action=insert' method='post' onsubmit='return validateForm()'>";
				echo $Feedback->getMngId();
				$str.="<input type='text' name='emp_id' value='".$_GET['emp_id']."'>";
				$str.="<input type='text' name='mng_id' value='".$_GET['mng_id']."'>";
				$str.="<input type='text' name='p_name' value='".$_GET['p_name']."'>";
				$str.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Feedback:</p><span id="fullname-info" class="info"></span>
							<input type="text" name="feedback" id="feedback" class="form-control" value="" placeholder="Write your feedback">
						</div>
						
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Performance:</p><span id="fullname-info" class="info"></span>
							<input type="number" name="performance"  min="0" max="10"
							id="performance" class="form-control" value="">
						</div>';
				$str.="<div class='form-btn text-center'>
				<button type='submit' class='btn btn-light btn-radius btn-brd grd1 btn-block subt'
				name='submit'>Confirm</button><br><br><br> 
				</div>";
				$str.="</form>
						</div>
					</div>
			</div>
		</div>";
	}

	return $str;
	}
}
?>