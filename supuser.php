<?php
	session_start();
	if (!$_SESSION["valid_user"]) {
		echo "Sorry. You are not allowed to view this page.";
	}
	else {
	
	$con = mysql_connect("localhost","root","mysql");
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	
	$db= mysql_select_db("EmployeePerformance",$con);
	
	if($_SESSION['emptype']==2) {
		$userid = $_GET['emp'];
		echo "<table>";
		echo "<tr><td>Employee ID</td><td>Leadership</td><td>Communication</td><td>Problem solving</td><td>Team work</td><td>Adaptability</td></tr>";
	
		$sql="SELECT * FROM Empcompetency WHERE Empid=$userid";
		$result = mysql_query($sql,$con);
	
		while($row = mysql_fetch_array($result)) {
		  echo "<tr>";
		  echo "<td>" . $row['Empid'] . "</td>";
		  echo "<td>" . $row['Comp1'] . "</td>";
		  echo "<td>" . $row['Comp2'] . "</td>";
		  echo "<td>" . $row['Comp3'] . "</td>";
		  echo "<td>" . $row['Comp4'] . "</td>";
		  echo "<td>" . $row['Comp5'] . "</td>";	
		  echo "</tr>";
		}
		echo "</table>"; 
		
		
	}
	
	}
?>
