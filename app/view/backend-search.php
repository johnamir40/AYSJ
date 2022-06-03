
<html>
<body>
<?php
$con = mysqli_connect("localhost", "root", "", "hr");

$sql = "SELECT *FROM employee";
// Escape user inputs for security
$term =  $_POST['term'];
echo"lkwijpw";
?>
<div class='container'>
 <div class="">
   <?php
if(!empty($term)){
	?>


	 <?php
    // Attempt select query execution
    $sql = $sql." WHERE fullname LIKE '%" . $term . "%' or mobile LIKE '%" . $term . "%' or email LIKE '%" . $term . "%'";
}
    if($result = mysqli_query($con, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
				 ?>


  <?php
                echo "Fullname: " . $row['fullname'] . "<br/>Email: ". $row['email'] ."<br>";
                echo "<br>";
            }

?>
</div>
</div>
<?php
echo"<table border=50 BORDERCOLOR=#000000 width=100%>
  <tr><th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th><th>End of search</th></tr>";
        }

		else{
            echo "<tr><td colspan=4>No matches found</td></tr>";
        }
    }


	/*else{
        echo "<tr><td colspan=4>ERROR: Could not able to execute $sql. " . mysqli_error($con)."</td></tr>";
    }
*/

// close connection
mysqli_close($con);
?>
</body>
</html>
