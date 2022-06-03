<head>
<script>
function validateaddForm() {
	var valid = true;
	$(".form-control").css('background-color','');
	$(".info").html('');

	if(!$("#pname").val()) {
		$("#pname-info").html("(required)");
		$("#pname").css('background-color','#FFFFDF');
		return false;
	}

	if(!$("#pdesc").val()) {
		$("#pdesc-info").html("(required)");
		$("#pdesc").css('background-color','#FFFFDF');
		return false;
	}
	if(!$("#sdate").val()) {
		$("#sdate-info").html("(required)");
		$("#sdate").css('background-color','#FFFFDF');
		return false;
	}
	if(!$("#edate").val()) {
		$("#edate-info").html("(required)");
		$("#edate").css('background-color','#FFFFDF');
		return false;
	}
}
</script>
</head>
<?php
require_once(__ROOT__ . "view/View.php");
class ViewPm extends View{
	public function output(){
	$str='';
	
    foreach($this->model->getProjects() as $project){
			$str=$str.'
			<div  class="row">
				<div  class="col-md-6" onclick="location.href ="pm.php?action=view&name='.$project->getName().'";"">
					<a style="text-decoration: none; " href="pm.php?action=view&name='.$project->getName().'">
						<div class="service-wrap text-center clearfix">
						   <div class="breadcrumb">
								<form id="form" method="POST" action="pm.php">
									<input type="hidden" name="id" value='.$project->getName().'>
									<input type="image" formaction="pm.php?action=ediit&name='.$project->getName().'"class="editiconp" src="https://img.icons8.com/ios/50/000000/edit.png"/>
									<input type="image" formaction="pm.php?action=delete&name='.$project->getName().'" class="removeiconp" src="https://img.icons8.com/ios/50/000000/cancel.png">
								</form>
							</div>';

							$str=$str."
							<input type='hidden' name='id' value=".$project->getName().">
							<h4 name='pname'>Project Name: ".$project->getName()."</h4><BR>"."<p>Project Manager's Name: ".$project->getManagerName()."</p><br>";
							$str=$str."<p>Due Date: ".$project->getendd()."</p><br>";
							$str=$str." 
						</div>

				</div>
				</a>
			</div>
		";}
		return $str;
	}

	public function EmployeeView($name){
		$str="";
	
		foreach($this->model->getProjects() as $project){
			if($project->getName()===$name){
				$str=$str."<div class='contact_form' >
					<form method='post' action='myprojects.php?action=print'> 
					<input  type='hidden' id='pid' name='pid' value='".$project->getName()."'>";
				  $str=$str.="<div>  <label class='formL'>Project's Name:</label>";
				  $str=$str."<input type='hidden' id='pname' name='pname' value='".$project->getName()."'>
				  <label style='margin-left: 4px;' class='form-control' id='pname' name='pname' > ".$project->getName()."</label>
				  </div>";
				  $str=$str."<div><label class='formL'>Project Description:"."</label>
					  <input  class='form-control' type='hidden' id='pdesc' name='pdesc' value=".$project->getDesc().">
					  <label  class='form-control'>".$project->getDesc()."</label>
					  </div> 
					  ";
					  
				  $str=$str."<div><label class='formL'>Project Manager:</label>"."
					  
					  <input type='hidden' id='pmng' name='mngid' value='".$project->getManagerName()."'>
					  <label class='form-control'  >".$project->getManagerName()."</label></div>";

				  $str=$str."<div> <label class='formL'>Start Date:</label>"."
				  
					  <input  class='form-control' type='hidden' id='sdate' name='sd' value=".$project->getstartd().">
					  <label class='form-control'>".$project->getstartd()."</label></div>";
				  $str=$str."<div><label class='formL'>End Date:</label>"."
					  <input  class='form-control' type='hidden' id='edate' name='ed' value=".$project->getendd().">
					  <label class='form-control'>".$project->getendd()."</label></div>
					  <input type='submit' value='print'>
					  </form>
					  </div>
					  ";
			}
		}
		return $str;
	}

	public function editproject($name){
	$str="";

		$str="<div id='appointment' class='section wb'>
				<div class='container'>
					<div class='section-title row text-center'>
						<div class='col-md-8 offset-md-2'>
							<small>Arqqa Master</small>
							<h3>Edit Project.</h3>
						</div>
				</div>";
		foreach($this->model->getProjects() as $project){
			if($project->getName()===$name){
				$str=$str."<div class='row'>
						<div class='col-lg-12'>
							<div class='contact_form'>
								<div id='message'></div>
							<form action='pm.php?action=editAction&name=".$project->getName()."' method='post' name='editForm' onsubmit=' return validateaddForm()'>
								<input class='inputp' type='hidden' id='pid' name='pid' value='".$project->getName()."'>";
								$str.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<p>Project Name: </p><span id="pname-info" class="info"></span>
								<input type="text" name="pname" id="pname" class="form-control" value="'.$project->getName().'">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Project Description: </p><span id="pdesc-info" class="info"></span>
							<input type="text" name="pdesc" id="pdesc" class="form-control" value="'.$project->getDesc().'">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Project Manager: </p><span id="fullname-info" class="info"></span>
							<select name="projectmanager" id="projectmanager" class="form-control">
								<option>'.$project->getManagerName().'</option>';
								foreach ($this->model->getManagerNames() as $Employeee){
										if($Employeee->getFullName() != $project->getManagerName()){
										$str.='<option>'.$Employeee->getFullName().'</option>';
								}}
							$str.='</select>
						</div>';
						$str.='<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Start Date: </p><span id="sdate-info" class="sdate"></span>
							<input type="date" name="sd" id="sdate" class="form-control" value="'.$project->getstartd().'">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>End Date: </p><span id="edate-info" class="edate"></span>
							<input type="date" name="ed" id="edate" class="form-control" value="'.$project->getendd().'">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<p>Project Manager: </p><span id="fullname-info" class="info"></span>
							<select name="state" id="state" class="form-control">
							<option>Active</option>
							<option>Completed</option>
							<option>Deactivated</option>
							</select>
						</div>
					<button type="button" onclick="editselectemployee();" class="btn btn-secondary">Add new Employee</button>
					<input style="  left: 400px;top: 233px;"
					class="btn btn-light btn-radius btn-brd grd1 btn-block subt" name ="confirmedit" type="submit" value="confirm"/>
					';
					$str=$str."<button  formaction='pm.php?action='class='createprojectp' style='
							position: relative;
							left: -768px;
							top: 233px;
						'>back</button></form></div>";
					$str=$str."
				<div style='display:none;'id='p-div' class='top-add alert alert-light alert-dismissible'>
					<form name='assign' method='post' action='pm.php?action=AssignEmpPrj&p_name=".$project->getName()."'>
					<p>Assign Employee to project</p><br>
						<p>Select Employee</p>  ";

					$str.="<select name='fullname' class='form-control' style='width:50%;' required='required'>";
						foreach ($this->model->getEmployees() as $Employee){

								$str.="<option>".$Employee->getFullName()."</option>";
						}
					$str.="</select>";
					$str.="<button class='confirmdivp'type='submit'>confirm</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>";
			}
		}
		return $str;
	}
	public function addproject(){
		$str="";
		
		$str=$str."<div class='contact_form'>
		<form action='pm.php?action=confirmadd' method='post' name='addForm' onsubmit=' return validateaddForm()'>
		";
		$str=$str.="<div>  <p>Project Name: </p> <span id='pname-info' class='info'></span>";
		$str=$str."<input class='form-control' type='text' id='pname' name='pname' > </div><br>";

		$str=$str."<div><p>Project Description: "."</p> <span id='pdesc-info' class='info'></span>
				<input class='form-control' type='text' id='pdesc' name='pdesc' ></div> <br>";
		$str.="<div><p>Project Manager: </p>
		<select name='projectmanager' class='form-control' required='required'>";
			foreach ($this->model->getManagerNames() as $Employeee){
				$str.="<option>".$Employeee->getFullName()."</option>";
			}
		$str.="</select><br><br>";
		$str=$str."<div> <p'>Start Date: </p>"."<span id='sdate-info' class='sdate'></span>
				<input class='form-control' type='date' id='sdate' name='sd' ></div><br>";
		$str=$str."<div><p'>End Date: </p>"."<span id='edate-info' class='edate'></span>
				<input class='form-control' type='date' id='edate' name='ed' ></div><br>";
			$str=$str."<input class='btn btn-light btn-radius btn-brd grd1 btn-block subt' name ='confirmadd'type='submit' value='confirm'/>";
			#<a href='projectmanager.html'><button class="createproject" style="
			#    position: relative;
			#    left: -768px;
			#    /* right: 23px; */
			#">back</button></a>
		return $str;
	}

	public function viewproject($name){
		$str="";
	
		foreach($this->model->getProjects() as $project){
			if($project->getName()===$name){
				$str=$str."<div class='contact_form' >
					<input  type='hidden' id='pid' name='pid' value='".$project->getName()."'>";
			  $str=$str.="<div>  <label class='formL'>Project's Name:</label>";
			  $str=$str."<input disabled style='margin-left: 4px;' class='form-control' type='text' id='pname' name='pname' value='".$project->getName()."'> </div><br>";
			  $str=$str."<div><label class='formL'>Project Description:"."</label>
				  <input disabled class='form-control' type='text' id='pdesc' name='pdesc' value=".$project->getDesc()."></div> <br>";
			  $str=$str."<div><label class='formL'>Project Manager:</label>"."
				  <input disabled class='form-control' type='text' id='pmng' name='mngid' value=".$project->getManagerName()."></div> <br>";
			  $str=$str."<div> <label class='formL'>Start Date:</label>"."
				  <input disabled class='form-control' type='date' id='sdate' name='sd' value=".$project->getstartd()."></div><br>";
			  $str=$str."<div><label class='formL'>End Date:</label>"."
				  <input disabled class='form-control' type='date' id='edate' name='ed' value=".$project->getendd()."></div><br>";
				 $str.=" <a href='pm.php'>  <button class='btn btn-secondary'form=f >back</button></a>";
					foreach($this->model->getProjectEmps() as $UserProject){
						if($project->getName()== $UserProject->getName()){
								$str.="<form id='workingemp' action='feedbacks.php?action=insertfeedback&emp_id=".$UserProject->getID()."&p_name=".$project->getName()."&mng_id=".$project->getMngID()."'
								method='post'>";
								$str.="<div class='contact_form'>
											<label class='form-control'>Name:".$UserProject->getPEmpName()."</label>
											<input class='btn btn-light btn-radius btn-brd grd1 btn-block subt'type='submit' value='Give Feedback'>
											<input  type='hidden'  name='epid' value='".$project->getName()."'>
					<input type='submit' name='removeemp' form='workingemp' formaction='pm.php?action=removeemp' class='btn btn-light btn-radius btn-brd grd1 btn-block subt' value='Remove Employee From Project' />
										</div>
					 </form>
			";
		  }}
			}
		}
		return $str;

	}

	function active(){
		
$str="	<div  class='row'>";
			foreach($this->model->getProjects() as $project){
				if($project->getstateid()=='100'){
					echo'<div class="col-md-6" onclick="location.href ="pm.php?action=view&name='.$project->getName().'";"">
					<a style="text-decoration: none; " href="pm.php?action=view&name='.$project->getName().'">
					<div  class="service-wrap text-center clearfix">
					<div class="breadcrumb">
					<form id="form" method="POST" action="pm.php">
					<input type="hidden" name="id" value='.$project->getName().'>
					<input type="image" formaction="pm.php?action=ediit&name='.$project->getName().'"class="editiconp" src="https://img.icons8.com/ios/50/000000/edit.png"/>
					<input type="image" formaction="pm.php?action=delete&name='.$project->getName().'" class="removeiconp" src="https://img.icons8.com/ios/50/000000/cancel.png">
					</form>
					</div>';
					  echo"<h4>Projects Name:".$project->getName()."</h4><BR>"."<p >Project Manager's Name: ".$project->getManagerName()."</p><br>";
					  echo"<p>Due Date: ".$project->getendd()."</p><br></div>		</div>
					</div>";
				}
			}
	}
	public function completed(){
		$str="";
	
		$str.="<div  class='row'>";
		
		foreach($this->model->getProjects() as $project){
			if($project->getstateid()=='1'){
				echo'<div class="col-md-6" onclick="location.href ="pm.php?action=view&name='.$project->getName().'";"">
				<a style="text-decoration: none; " href="pm.php?action=view&name='.$project->getName().'">
				  <div  class="service-wrap text-center clearfix">
				  <div class="breadcrumb">
				<form id="form" method="POST" action="pm.php">
				<input type="hidden" name="id" value='.$project->getName().'>
				<input type="image" formaction="pm.php?action=ediit&name='.$project->getName().'"class="editiconp" src="https://img.icons8.com/ios/50/000000/edit.png"/>
				<input type="image" formaction="pm.php?action=delete&name='.$project->getName().'" class="removeiconp" src="https://img.icons8.com/ios/50/000000/cancel.png">
				</form>
				</div>';
			echo"<h4>Project Name: ".$project->getName()."</h4><BR>"."<p >Project Manager's Name: ".$project->getManagerName()."</p><br>";
			echo"<p>Due Date: ".$project->getendd()."</p><br></div>		</div>
			</div>";
			}
		}

	}
	
	public function Deactivated(){
		
	  $str="<div  class='row'>";
		foreach($this->model->getProjects() as $project){
			if($project->getstateid()=='2'){
				echo'<div class="col-md-6" onclick="location.href ="pm.php?action=view&name='.$project->getName().'";"">
				<a style="text-decoration: none; " href="pm.php?action=view&name='.$project->getName().'">
				<div  class="service-wrap text-center clearfix">
		';
			echo"<h4>Project Name: ".$project->getName()."</h4><BR>"."<p >Project Manager's Name: ".$project->getManagerName()."</p><br>";
			echo"<p>Due Date: ".$project->getendd()."</p><br></div>		</div>
				</div>";
		  }
		}
	}
}
?>
