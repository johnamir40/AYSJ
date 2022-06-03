
<?php

require_once(__ROOT__ . "view/View.php");


class viewCompensateEmp extends View{	
	public function output(){
		
		$str = "";
		
		$id=$_SESSION["ID"];
			$str = "";
		$str.="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa Master</small>
						<h3>View Salary.</h3>
					</div>
				</div>";
				
		
		foreach($this->model->getCompensateEmps() as $CompensateEMP){
			
			
			if($CompensateEMP->getEmpID()===$id) {
								$str.='<div class="row">
					<div class="col-lg-12">
						<div class="contact_form">
							<div id="message"></div>
							<form action="CompensateEmp.php?action=print" method="post" >
								<fieldset class="row row-fluid">
									<input type="hidden" name="id" >
									<div>
										<input type="hidden" name="fullname" value="'.$CompensateEMP->getEmpName().'">
									</div>
										
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Basic Salary:</p>
										<input type="number" name="basicsalary" id="basicsalary" class="form-control" value="'.$CompensateEMP->getSalary().'">
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Bonus:</p>
										<input type="number" name="bonus" id="bonus" class="form-control" value="'.$CompensateEMP->getBonus().'">
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Weekend Overtime:</p>
										<input type="number" name="overtimeday" id="overtimeday" class="form-control" value="'.$CompensateEMP->getTotalDay().'">
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Nightshift :</p>
										<input type="number" name="overtimenight" id="overtimenight" class="form-control" value="'.$CompensateEMP->getTotalNight().'">
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<p>Total :</p>
										<input type="number" name="total" id="total" class="form-control" value="'.$CompensateEMP->getTotal().'">
									</div>
									
									<div class="form-btn text-center">
										
										<button type="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block subt"
										name="submit">Print</button>
										
									</div>
								</fieldset>
							</form>
						</div>
					</div>
			</div>
		</div>';

	
		
		}}


return $str;
	}
	
	function overtimeEMP($id){
		
			
		$str="";
		
		
		
		
		foreach($this->model->getCompensateEmps() as $CompensateEMP){
			
			if($CompensateEMP->getEmpID()===$id){
				$str="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa Master</small>
						<h3>Overtime.</h3>
					</div>
				</div>";
				$str.='<div class="row">
					<div class="col-lg-12">
						<div class="contact_form">
						<div id="message"></div>
							';
					$str.="<form action='CompensateEMP.php?action=editAction&id=".$CompensateEMP->getEmpID()."' method='post'>";
					$str.="<input type='hidden' name='id' vale='".$CompensateEMP->getEmpID()."'>";
						
				$str.="<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
				<p>Weekend hours</p>
						<input type='number' class='form-control' name='weekend_Overtime' value='". $CompensateEMP->getWeekndover() ."'> ";
				$str.="</div>";
			
				
				$str.="<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
				<p>Night Shift</p>
						<input class='form-control' type='text' value='".$CompensateEMP->getNightshiftover()."' name='nightshift_overtime' > ";
						
				$str.="	</div>";


				$str.="<a  href='CompensateEMP.php?action=back'><br>
				<button class='btn btn-light btn-radius btn-brd grd1 btn-block subt' type='button'>Back</button>";
				$str.="<button class='btn btn-light btn-radius btn-brd grd1 btn-block subt'
				type='submit'>Confirm</button></div></div>
				</form>
				</div>
				</div>
				</div>";
	
			}
}
	if($str==""){
		$str="<div id='appointment' class='section wb'>
			<div class='container'>
				<div class='section-title row text-center'>
					<div class='col-md-8 offset-md-2'>
						<small>Arqqa Master</small>
						<h3>Overtime.</h3>
					</div>
				</div>";
		$str.='<div class="row">
					<div class="col-lg-12">
						<div class="contact_form">
						<div id="message"></div>
							';
		$str.="<form action='CompensateEMP.php?action=insert&id=".$id."' method='post'>";
						$str.="<input type='hidden' name='id' vale='".$id."'>";
						
				$str.="<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
				<p>Weekend hours</p>
						<input type='text' class='form-control' name='weekend_Overtime' value=''></div> ";
				$str.="<br>";
			
				
				$str.="<div class='col-lg-6 col-md-6 col-sm-6 col-xs-12'>
				<p>Night Shift</p>
						<input class='form-control' type='text' value='' name='nightshift_overtime' > ";
						
				$str.="	</div>";


				$str.="<a href='CompensateEMP.php?action=back'><br><button 
				class='btn btn-light btn-radius btn-brd grd1 btn-block subt' type='button'>Back</button>";
				$str.="<button class='btn btn-light btn-radius btn-brd grd1 btn-block subt' type='submit'>Confirm</button></div></div>
				</form>";
		
	}

	return $str;
		
		
	}
	
	
	
	
}
?>
