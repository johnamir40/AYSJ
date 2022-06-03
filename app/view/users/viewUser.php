<head>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<?php
require_once(__ROOT__ . "view/View.php");

class viewUser extends View{

	public function output(){
		
		$str = "";
		
		$id=$_SESSION["ID"];
		

		foreach($this->model->getNoti() as $UserProject){
			if($UserProject->getID()===$id) {
				$str.='<div style="display:block;" class="top-add alert alert-light alert-dismissible" id="p-div">
				<a href="myprojects.php?action=close">
	
				<button type="button" 
				class="close" onclick="editselectemployee()" >&times;</button></a>
				<strong> You were added to a new project </strong>'.$UserProject->getName().'.
				</div>';
			}
			else{
				$str.="";
			}
			}
			
			
				 $str.='
	<div id="page-content-wrapper">		
		<div class="all-page-bar"  style=" background: url("images/background.png");">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="title title-1 text-center">
						
							
							<div class="title--heading">
								<h1>Hi! '.$UserProject->getFullName().'</h1>
							</div>
							
						</div>
						
					</div>
				</div>
			</div>
		</div><!-- end all-page-bar -->';	
	
		foreach($this->model->getUserProjects() as $UserProject){
			
			if($UserProject->getID()===$id) {
						$str.='<a  class= "col-md-6" href="pm.php?action=viewemp&name='.$UserProject->getName().'">
      <div  class="col-md-6">
			

			<div class="service-wrap text-center clearfix">';

	

		$str=$str."	<h4>Project Name: ".$UserProject->getName()."</h4>";
		$str.="<p>Project Manager's Name: ".$UserProject->getManagerNameP()."</p>";
		$str=$str."<p>Due Date: ".$UserProject->getDueDate()."</p>";
		$str=$str." </div>


		</div>
		</div>
		</a>
		";
			
	}
		}
		return $str;
	}
	
	
	
	





}?>