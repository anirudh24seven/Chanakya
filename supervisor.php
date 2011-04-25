<?php 
		$con = mysql_connect("localhost","root","mysql");
		if (!$con) {
		  die('Could not connect: ' . mysql_error());
		}
	
		$db= mysql_select_db("EmployeePerformance",$con);
		
		$userid = $_SESSION["valid_id"];
		echo "Welcome Supervisor.";
		echo "<br /><br />Employees under you:";
		echo "<table>";
		echo "<tr><td>Employee ID</td><td>Employee Name</td><td>Status</td></tr>";
	
		$sql = "select * from Empdetails where Supid=$userid";

		$result = mysql_query($sql,$con);
	
		while($row = mysql_fetch_array($result)) {
		  echo "<tr>";
		  echo "<td>" . $row['Empid'] . "</td>";
		  echo "<td>" . $row['Empname'] . "</td>";
		  $empid=$row['Empid'];
		  
		  $query="SELECT * FROM Supcompetency WHERE Empid=$empid";
		  $r=mysql_query($query, $con);
			$row2 = mysql_fetch_array($r);
			
			if(!$row2){
				echo "<td><a href='details.php?emp=$row[Empid]'>Pending</td>";
			}
			else {
				echo "<td><a href='details.php?emp=$row[Empid]'>Done</td>";
			}
		  echo "</tr>";
	  	}
	  	
	  	echo "</table>";
?>
