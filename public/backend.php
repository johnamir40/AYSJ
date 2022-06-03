<?php
//include("DB.php");
$connection=mysqli_connect('localhost','root','','hr');
$term = $_POST['term'];
$sql = "Select * from questions";
if(!empty($term)){
	$sql = $sql." WHERE question LIKE '%$term%'";
}
echo "<table border='1'>
<tr>
<th>Question</th>
<th>Answer</th>
</tr>";
  
 if($result =  mysqli_query($connection,$sql)){
	 if(mysqli_num_rows($result) > 0){
		 while($row = mysqli_fetch_array($result)){
			echo "<tr>";
			echo "<td>" . $row['question'] . "</td>";
			echo "<td>" . $row['answer'] . "</td>";
			echo "</tr>";
		}
	 }
	 else{
		 echo "<tr><td colspan=4>No Question Found</td></tr>";
	 }
 }
 else{ 
  echo "<tr><td colspan=4>ERROR: Could not execute $sql. " .mysqli_error($conn)."</td></tr>";
 }
 echo"</table>";
 ?>