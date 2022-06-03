
<?php

require_once(__ROOT__ . "controller/Controller.php");
require_once __DIR__ . '/vendor/autoload.php';

class CompensateEmpController extends Controller{

	public function edit($id) {
		$weekend_Overtime=$_REQUEST['weekend_Overtime'];
		$nightshift_overtime=$_REQUEST['nightshift_overtime'];
		$this->model->update($id,$weekend_Overtime,$nightshift_overtime);	
	}

	public function insert($id) {
		$id=$_GET['id'];
		echo $id;
		$weekend_Overtime=$_REQUEST['weekend_Overtime'];
		$nightshift_overtime=$_REQUEST['nightshift_overtime'];
		$this->model->insert($id,$weekend_Overtime,$nightshift_overtime);
	}

	public function print(){		
		$pos_salary= $_POST["basicsalary"];
		$bonus_avg= $_POST["bonus"];
		$totalday=$_POST["overtimeday"];
		$totalnight=$_POST["overtimenight"];
		$total=$_POST["total"];
		$fullname=$_POST["fullname"];
		
				$mpdf= new \Mpdf\Mpdf();
		$data='';
		$data='<table style="width:100%" >
  <tr>
    <th colspan="2" style="padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #fe0303;
  color: white;">Salary of '.$fullname.'</th>
 
  </tr>
  <tr>
  <td style="background-color: #f2f2f2;">  <strong>Basic Salary</strong></td>
    <td style="background-color: #f2f2f2;">'.$pos_salary.' EGP</td>
  </tr>
  <tr>
  <td style="background-color: #f2f2f2;">  <strong>Bonus</strong></td>
    <td style="background-color: #f2f2f2;">'.$bonus_avg.' EGP</td>
  </tr>
  <tr>
  <td style="background-color: #f2f2f2;">  <strong>Weekend Overtime</strong></td>
    <td style="background-color: #f2f2f2;">'.$totalday.' EGP</td>
  </tr>
  <tr >
  <td style="background-color: #f2f2f2;">  <strong>Nightshift Overtime</strong></td>
    <td style="background-color: #f2f2f2;">'.$totalnight.' EGP</td>
  </tr>
  <tr>
  <td style="background-color: #f2f2f2;">  <strong>Total</strong></td>
    <td style="background-color: #f2f2f2;">'.$total.' EGP</td>
  </tr>
</table>
';

		echo $data;
		ob_clean(); 

		$mpdf->WriteHTML($data);

		$mpdf->Output($fullname.'.pdf','D');
	}
	
}
?>
