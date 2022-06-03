<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Employee.php");

class CompensateEMP extends Model {
   // $emp= new Employee();
    protected $comp_id;
    protected $emp_id;
    protected $bonus_avg;
    protected $pos_salary;
    protected $weekend_Overtime;
    protected $nightshift_overtime;
    protected $total;
    protected $Employees;
    protected $totalnight;
    protected $totalday;
	protected $empname;

    function __construct($emp_id,$pos_salary="",$weekend_Overtime="",$nightshift_overtime="",$total="",$bonus_avg="",$totalday="",$totalnight="", $empname="") {
        $this->emp_id = $emp_id;
        $this->db = $this->connect();

        if(""===$emp_id){
            $this->readCompPlan($emp_id);
        }
        else{
            $this->weekend_Overtime = $weekend_Overtime;
            $this->nightshift_overtime=$nightshift_overtime;
            $this->total = $total;
			$this->pos_salary=$pos_salary;
            $this->bonus_avg=$bonus_avg;
            $this->totalnight=$totalnight;
            $this->totalday=$totalday;
        }
    }

    function getWeekndover(){
        return $this->weekend_Overtime;
    }
    function setWeekndover($weekend_Overtime){
        return $this->weekend_Overtime=$weekend_Overtime;
    }
    function getNightshiftover(){
        return $this->nightshift_overtime;
    }
    function setNightshiftover($nightshift_overtime){
        return $this->nightshift_overtime=$nightshift_overtime;
    }
    function getTotal(){
         $this->total=$this->pos_salary+$this->getTotalNight()+$this->getTotalDay()+$this->bonus_avg;
		 $total=$this->total;
		 $id=$this->emp_id;
		 $sql="UPDATE comp_emp SET total = ".$total." WHERE emp_id=".$id;
		 $db = $this->connect();
        $result = $db->query($sql);
        if ($result == true){
		return $this->total;}
		else
			echo "error";
    }
    function setTotal($total){
        return $this->total=$total;
    }
	function getEmpID(){
		return $this->emp_id;
	}
	function getSalary(){
		
		return $this->pos_salary;
	}
	
	function getEmpName(){
		$id=$this->emp_id;
		 $sql="select fullname from employee where id = ".$id;
		 $db = $this->connect();
        $result = $db->query($sql);
        if ($result == true){
			$row = $db->fetchRow();
            $this->empname = $row["fullname"];
			return $this->empname;
			
		
	}}

	function getBonus(){
         $this->bonus_avg=0.2*$this->pos_salary;
         return $this->bonus_avg;
    }
    function getTotalDay(){
        $this->totalnight=$this->nightshift_overtime*25*1.5;
		$totalnight=$this->totalnight;
		$id=$this->emp_id;
		$sql="UPDATE comp_emp SET totalweeknd = ".$totalnight." WHERE emp_id=".$id;
		 $db = $this->connect();
        $result = $db->query($sql);
        if ($result == true){
		return $this->totalnight;}
		else
			echo "error";
    }
       
    
    function getTotalNight(){
        $this->totalday=$this->weekend_Overtime*25*2;
        
		$totalday=$this->totalday;
		$id=$this->emp_id;
		$sql="UPDATE comp_emp SET totalnight = ".$totalday." WHERE emp_id=".$id;
		 $db = $this->connect();
        $result = $db->query($sql);
        if ($result == true){
		return $this->totalday;}
		else
			echo "error";
    }
    
    function readCompPlan($emp_id){
        $sql = "SELECT * FROM comp_emp where emp_id=".$emp_id;
        $db = $this->connect();
        $result = $db->query($sql);
        if ($result == true){
            $row = $db->fetchRow();
            $this->bonus_avg = $row["bonus_avg"];
            $this->weekend_Overtime=$row["weekend_Overtime"];
            $this->nightshift_overtime=$row["nightshift_overtime"];
            $this->total=$row["total"];
			
			 $sqll="select salary from positiontype WHERE id='4'";
		 
        $resultt = $db->query($sqll);
        if ($resultt == true){
			$roww = $db->fetchRow();
			$this->pos_salary=$roww["salary"];
		}
        }
        else {
            $this->emp_id = "";
            $this->bonus_avg="";
            $this->weeknd_overtime="";
            $this->nightshift_overtime="";
            $this->total="";
            }
    }

    
}
