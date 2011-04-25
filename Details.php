<?php
	session_start();
	if (!$_SESSION["valid_user"]) {
		echo "Sorry. You are not allowed to view this page.";
	}
	
	else{
	if($_SESSION['emptype']==2) {
		$userid = $_GET['emp'];
		$con = mysql_connect("localhost","root","mysql");
		
		if (!$con) {
		  die('Could not connect: ' . mysql_error());
		}
	
		$db= mysql_select_db("EmployeePerformance",$con);
	
		echo "Employee Assessment:<br /><table>";
		echo "<tr><td>Employee ID</td><td>Leadership</td><td>Communication</td><td>Problem solving</td><td>Team work</td><td>Adaptability</td></tr>";
	
		$sql="SELECT * FROM Empcompetency WHERE Empid=$userid";
		$result = mysql_query($sql,$con);
	
		if(mysql_num_fields($result)) {
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
			$comp1 = $_POST['comp1'];
			$comp2 = $_POST['comp2'];
			$comp3 = $_POST['comp3'];
			$comp4 = $_POST['comp4'];
			$comp5 = $_POST['comp5'];
			$supid = $_POST['supid'];
			$manid = $_POST['manid'];
			
			$query="SELECT * FROM Supcompetency WHERE Empid=$userid";
			$r=mysql_query($query, $con);
			$row2 = mysql_fetch_array($r);
			
			if(!$row2&&!$comp1){?>
				<h2>Insert Employee details:</h2>
<table>
<form action="" method="post" id="details_form">
<tr><td>Leadership:</td><td><input type="radio" name="comp1" value="1" /> 1 | <input type="radio" name="comp1" value="2" /> 2 | <input type="radio" name="comp1" value="3" /> 3 | <input type="radio" name="comp1" value="4" /> 4 | <input type="radio" name="comp1" value="5" /> 5 | <input type="radio" name="comp1" value="6" /> 6 | <input type="radio" name="comp1" value="7" /> 7 | <input type="radio" name="comp1" value="8" /> 8 | <input type="radio" name="comp1" value="9" /> 9 | <input type="radio" name="comp1" value="10" /> 10 | </td></tr>

<tr><td>Communication:</td><td><input type="radio" name="comp2" value="1" /> 1 | <input type="radio" name="comp2" value="2" /> 2 | <input type="radio" name="comp2" value="3" /> 3 | <input type="radio" name="comp2" value="4" /> 4 | <input type="radio" name="comp2" value="5" /> 5 | <input type="radio" name="comp2" value="6" /> 6 | <input type="radio" name="comp2" value="7" /> 7 | <input type="radio" name="comp2" value="8" /> 8 | <input type="radio" name="comp2" value="9" /> 9 | <input type="radio" name="comp2" value="10" /> 10 | </td></tr>

<tr><td>Problem Solving:</td><td><input type="radio" name="comp3" value="1" /> 1 | <input type="radio" name="comp3" value="2" /> 2 | <input type="radio" name="comp3" value="3" /> 3 | <input type="radio" name="comp3" value="4" /> 4 | <input type="radio" name="comp3" value="5" /> 5 | <input type="radio" name="comp3" value="6" /> 6 | <input type="radio" name="comp3" value="7" /> 7 | <input type="radio" name="comp3" value="8" /> 8 | <input type="radio" name="comp3" value="9" /> 9 | <input type="radio" name="comp3" value="10" /> 10 | <br /></td></tr>

<tr><td>Team work:</td><td><input type="radio" name="comp4" value="1" /> 1 | <input type="radio" name="comp4" value="2" /> 2 | <input type="radio" name="comp4" value="3" /> 3 | <input type="radio" name="comp4" value="4" /> 4 | <input type="radio" name="comp4" value="5" /> 5 | <input type="radio" name="comp4" value="6" /> 6 | <input type="radio" name="comp4" value="7" /> 7 | <input type="radio" name="comp4" value="8" /> 8 | <input type="radio" name="comp4" value="9" /> 9 | <input type="radio" name="comp4" value="10" /> 10 | <br /></td></tr>

<tr><td>Adaptability:</td><td><input type="radio" name="comp5" value="1" /> 1 | <input type="radio" name="comp5" value="2" /> 2 | <input type="radio" name="comp5" value="3" /> 3 | <input type="radio" name="comp5" value="4" /> 4 | <input type="radio" name="comp5" value="5" /> 5 | <input type="radio" name="comp5" value="6" /> 6 | <input type="radio" name="comp5" value="7" /> 7 | <input type="radio" name="comp5" value="8" /> 8 | <input type="radio" name="comp5" value="9" /> 9 | <input type="radio" name="comp5" value="10" /> 10 | <br /></td></tr>
<tr><td><input type="submit" value="Submit" name="details_submit"/>&nbsp;&nbsp;&nbsp; <input type="reset" id="Reset"/></td></tr>
</form>
</table>
			
			<?php			
			}		
			
			else {				
				$userid = $_GET["emp"];

				$q1="INSERT INTO Supcompetency (Empid, Comp1, Comp2, Comp3, Comp4, Comp5) VALUES ($userid,$comp1,$comp2,$comp3,$comp4,$comp5)";		
				$r = mysql_query($q1);

				
				$q2="SELECT * FROM Supcompetency WHERE Empid=$userid";
				$result = mysql_query($q2);
			
				if(mysql_num_fields($result)) {
				echo "Supervisor Assessment:";
				echo "<table>";
				echo "<tr><td>Employee ID</td><td>Leadership</td><td>Communication</td><td>Problem solving</td><td>Team work</td><td>Adaptability</td></tr>";
	
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
		mysql_close($con);
	}
	
	
	//Other Employee
	else if($_SESSION['emptype']==1) {
		echo "<h1>Your Employee Details</h1>";
		$con = mysql_connect("localhost","root","mysql");
		if (!$con) {
		  die('Could not connect: ' . mysql_error());
		}
	
		$db= mysql_select_db("EmployeePerformance",$con);
		
		$userid = $_SESSION["valid_id"];

		if($_GET['op'] == 'update') {
			$comp1 = $_POST['comp1'];
			$comp2 = $_POST['comp2'];
			$comp3 = $_POST['comp3'];
			$comp4 = $_POST['comp4'];
			$comp5 = $_POST['comp5'];
			$supid = $_POST['supid'];
			$manid = $_POST['manid'];
		
			$q1="insert into Empcompetency values ($userid,$comp1,$comp2,$comp3,$comp4,$comp5)";
			$q6="UPDATE Empdetails SET Supid = $supid where Empid=$userid";
			$q7="UPDATE Empdetails SET Manid = $manid where Empid=$userid";
		
			mysql_query($q1);
			mysql_query($q6);
			mysql_query($q7);

			$_SESSION["old_user"]=1;
		}
	
		if($_SESSION["old_user"]) {
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
	
	else {	
	
?>

<h2>Insert your details:</h2>
<table>
<form action="?op=update" method="post" id="details_form">
<tr><td>Supervisor ID:</td><td><input type="text" name="supid" /></td></tr>
<tr><td>Manager ID:</td><td><input type="text" name="manid" /></td></tr>

<tr><td>Leadership:</td><td><input type="radio" name="comp1" value="1" /> 1 | <input type="radio" name="comp1" value="2" /> 2 | <input type="radio" name="comp1" value="3" /> 3 | <input type="radio" name="comp1" value="4" /> 4 | <input type="radio" name="comp1" value="5" /> 5 | <input type="radio" name="comp1" value="6" /> 6 | <input type="radio" name="comp1" value="7" /> 7 | <input type="radio" name="comp1" value="8" /> 8 | <input type="radio" name="comp1" value="9" /> 9 | <input type="radio" name="comp1" value="10" /> 10 | </td></tr>

<tr><td>Communication:</td><td><input type="radio" name="comp2" value="1" /> 1 | <input type="radio" name="comp2" value="2" /> 2 | <input type="radio" name="comp2" value="3" /> 3 | <input type="radio" name="comp2" value="4" /> 4 | <input type="radio" name="comp2" value="5" /> 5 | <input type="radio" name="comp2" value="6" /> 6 | <input type="radio" name="comp2" value="7" /> 7 | <input type="radio" name="comp2" value="8" /> 8 | <input type="radio" name="comp2" value="9" /> 9 | <input type="radio" name="comp2" value="10" /> 10 | </td></tr>

<tr><td>Problem Solving:</td><td><input type="radio" name="comp3" value="1" /> 1 | <input type="radio" name="comp3" value="2" /> 2 | <input type="radio" name="comp3" value="3" /> 3 | <input type="radio" name="comp3" value="4" /> 4 | <input type="radio" name="comp3" value="5" /> 5 | <input type="radio" name="comp3" value="6" /> 6 | <input type="radio" name="comp3" value="7" /> 7 | <input type="radio" name="comp3" value="8" /> 8 | <input type="radio" name="comp3" value="9" /> 9 | <input type="radio" name="comp3" value="10" /> 10 | <br /></td></tr>

<tr><td>Team work:</td><td><input type="radio" name="comp4" value="1" /> 1 | <input type="radio" name="comp4" value="2" /> 2 | <input type="radio" name="comp4" value="3" /> 3 | <input type="radio" name="comp4" value="4" /> 4 | <input type="radio" name="comp4" value="5" /> 5 | <input type="radio" name="comp4" value="6" /> 6 | <input type="radio" name="comp4" value="7" /> 7 | <input type="radio" name="comp4" value="8" /> 8 | <input type="radio" name="comp4" value="9" /> 9 | <input type="radio" name="comp4" value="10" /> 10 | <br /></td></tr>

<tr><td>Adaptability:</td><td><input type="radio" name="comp5" value="1" /> 1 | <input type="radio" name="comp5" value="2" /> 2 | <input type="radio" name="comp5" value="3" /> 3 | <input type="radio" name="comp5" value="4" /> 4 | <input type="radio" name="comp5" value="5" /> 5 | <input type="radio" name="comp5" value="6" /> 6 | <input type="radio" name="comp5" value="7" /> 7 | <input type="radio" name="comp5" value="8" /> 8 | <input type="radio" name="comp5" value="9" /> 9 | <input type="radio" name="comp5" value="10" /> 10 | <br /></td></tr>
<tr><td><input type="submit" value="Submit" name="details_submit"/>&nbsp;&nbsp;&nbsp; <input type="reset" id="Reset"/></td></tr>
</form>
</table>
<?php
		}
	mysql_close($con);
	}
	
	else if($_SESSION['emptype']==3) {
			
		$userid = $_GET['emp'];
		$con = mysql_connect("localhost","root","mysql");
		
		if (!$con) {
		  die('Could not connect: ' . mysql_error());
		}
	
		$db= mysql_select_db("EmployeePerformance",$con);
	
		echo "Employee Assessment:<br /><table>";
		echo "<tr><td>Employee ID</td><td>Leadership</td><td>Communication</td><td>Problem solving</td><td>Team work</td><td>Adaptability</td></tr>";
	
		$sql="SELECT * FROM Empcompetency WHERE Empid=$userid";
		$result = mysql_query($sql,$con);
	
		if(mysql_num_fields($result)) {
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

		echo "Supervisor Assessment:<br /><table>";
		echo "<tr><td>Employee ID</td><td>Leadership</td><td>Communication</td><td>Problem solving</td><td>Team work</td><td>Adaptability</td></tr>";

		
		$sql="SELECT * FROM Supcompetency WHERE Empid=$userid";
		$result = mysql_query($sql,$con);
	
		if(mysql_num_fields($result)) {
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
		
			$comp1 = $_POST['comp1'];
			$comp2 = $_POST['comp2'];
			$comp3 = $_POST['comp3'];
			$comp4 = $_POST['comp4'];
			$comp5 = $_POST['comp5'];
			$supid = $_POST['supid'];
			$manid = $_POST['manid'];
			
			$query="SELECT * FROM Mancompetency WHERE Empid=$userid";
			$r=mysql_query($query, $con);
			$row2 = mysql_fetch_array($r);
			
			if(!$row2&&!$comp1){?>
				<h2>Insert Employee details:</h2>
<table>
<form action="" method="post" id="details_form">
<tr><td>Leadership:</td><td><input type="radio" name="comp1" value="1" /> 1 | <input type="radio" name="comp1" value="2" /> 2 | <input type="radio" name="comp1" value="3" /> 3 | <input type="radio" name="comp1" value="4" /> 4 | <input type="radio" name="comp1" value="5" /> 5 | <input type="radio" name="comp1" value="6" /> 6 | <input type="radio" name="comp1" value="7" /> 7 | <input type="radio" name="comp1" value="8" /> 8 | <input type="radio" name="comp1" value="9" /> 9 | <input type="radio" name="comp1" value="10" /> 10 | </td></tr>

<tr><td>Communication:</td><td><input type="radio" name="comp2" value="1" /> 1 | <input type="radio" name="comp2" value="2" /> 2 | <input type="radio" name="comp2" value="3" /> 3 | <input type="radio" name="comp2" value="4" /> 4 | <input type="radio" name="comp2" value="5" /> 5 | <input type="radio" name="comp2" value="6" /> 6 | <input type="radio" name="comp2" value="7" /> 7 | <input type="radio" name="comp2" value="8" /> 8 | <input type="radio" name="comp2" value="9" /> 9 | <input type="radio" name="comp2" value="10" /> 10 | </td></tr>

<tr><td>Problem Solving:</td><td><input type="radio" name="comp3" value="1" /> 1 | <input type="radio" name="comp3" value="2" /> 2 | <input type="radio" name="comp3" value="3" /> 3 | <input type="radio" name="comp3" value="4" /> 4 | <input type="radio" name="comp3" value="5" /> 5 | <input type="radio" name="comp3" value="6" /> 6 | <input type="radio" name="comp3" value="7" /> 7 | <input type="radio" name="comp3" value="8" /> 8 | <input type="radio" name="comp3" value="9" /> 9 | <input type="radio" name="comp3" value="10" /> 10 | <br /></td></tr>

<tr><td>Team work:</td><td><input type="radio" name="comp4" value="1" /> 1 | <input type="radio" name="comp4" value="2" /> 2 | <input type="radio" name="comp4" value="3" /> 3 | <input type="radio" name="comp4" value="4" /> 4 | <input type="radio" name="comp4" value="5" /> 5 | <input type="radio" name="comp4" value="6" /> 6 | <input type="radio" name="comp4" value="7" /> 7 | <input type="radio" name="comp4" value="8" /> 8 | <input type="radio" name="comp4" value="9" /> 9 | <input type="radio" name="comp4" value="10" /> 10 | <br /></td></tr>

<tr><td>Adaptability:</td><td><input type="radio" name="comp5" value="1" /> 1 | <input type="radio" name="comp5" value="2" /> 2 | <input type="radio" name="comp5" value="3" /> 3 | <input type="radio" name="comp5" value="4" /> 4 | <input type="radio" name="comp5" value="5" /> 5 | <input type="radio" name="comp5" value="6" /> 6 | <input type="radio" name="comp5" value="7" /> 7 | <input type="radio" name="comp5" value="8" /> 8 | <input type="radio" name="comp5" value="9" /> 9 | <input type="radio" name="comp5" value="10" /> 10 | <br /></td></tr>
<tr><td><input type="submit" value="Submit" name="details_submit"/>&nbsp;&nbsp;&nbsp; <input type="reset" id="Reset"/></td></tr>
</form>
</table>
			
			<?php			
			}		
			
			else {				
				$userid = $_GET["emp"];

				$q1="INSERT INTO Mancompetency (Empid, Comp1, Comp2, Comp3, Comp4, Comp5) VALUES ($userid,$comp1,$comp2,$comp3,$comp4,$comp5)";		
				$r = mysql_query($q1);

				
				$q2="SELECT * FROM Mancompetency WHERE Empid=$userid";
				$result = mysql_query($q2);
			
				if(mysql_num_fields($result)) {
				echo "Manager Assessment:";
				echo "<table>";
				echo "<tr><td>Employee ID</td><td>Leadership</td><td>Communication</td><td>Problem solving</td><td>Team work</td><td>Adaptability</td></tr>";
	
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
		mysql_close($con);
	}
	else if($_SESSION['emptype']==4) {
		echo "Welcome HR employee.<br />";
		$empid=$_POST['empid'];
		
		if($empid) {
			$con = mysql_connect("localhost","root","mysql");
			if (!$con) {
			  die('Could not connect: ' . mysql_error());
			}
	
			$db= mysql_select_db("EmployeePerformance",$con);
			
			echo "<br />Employee ID: ".$empid;
			$a = "SELECT Empname from Empdetails where Empid=$empid";
			$empq = mysql_query($a,$con);
			
			$emprow = mysql_fetch_array($empq);
			
			echo "<br />Employee Name: ".$emprow['Empname']."<br />";
			echo "<table border='2'>";
			echo "<tr><td>Competency</td><td>Employee</td><td>Supervisor</td><td>Manager</td><td>Average</td><td>Quality</td></tr>";
			//
			$q1= "SELECT a.Comp1 as a,b.Comp1 as b,c.Comp1 as c FROM Empcompetency a, Supcompetency b, Mancompetency c where a.Empid=$empid and b.Empid=$empid and c.Empid=$empid";
			$r = mysql_query($q1,$con);
			
			$row = mysql_fetch_array($r);		
			
			$avg1= ($row["a"]+$row["b"]+$row["c"])/3;
			echo "<tr><td>Leadership</td><td>".$row["a"]."</td><td>".$row["b"]."</td><td>".$row["c"]."</td><td>".$avg1."</td>";
			
			if($avg1>=0&&$avg1<=4) {
				echo "<td>Poor</td>";
			}
			else if($avg1>4&&$avg1<=7) {
				echo "<td>Average</td>";
			}
			else if($avg1>7&&$avg1<10) {
				echo "<td>Good</td>";
			}
			
			echo "</tr>";
			//
			$q2= "SELECT a.Comp2 as a,b.Comp2 as b,c.Comp2 as c FROM Empcompetency a, Supcompetency b, Mancompetency c where a.Empid=$empid and b.Empid=$empid and c.Empid=$empid";
			$r2 = mysql_query($q2,$con);
			
			$row2 = mysql_fetch_array($r2);
			
			
			$avg2= ($row2["a"]+$row2["b"]+$row2["c"])/3;
			echo "<tr><td>Communication</td><td>".$row2["a"]."</td><td>".$row2["b"]."</td><td>".$row2["c"]."</td><td>".$avg2."</td>";
			
			if($avg2>=0&&$avg2<=4) {
				echo "<td>Poor</td>";
			}
			else if($avg2>4&&$avg2<=7) {
				echo "<td>Average</td>";
			}
			else if($avg2>7&&$avg2<10) {
				echo "<td>Good</td>";
			}
			
			echo "</tr>";
			
			//
			$q3= "SELECT a.Comp3 as a,b.Comp3 as b,c.Comp3 as c FROM Empcompetency a, Supcompetency b, Mancompetency c where a.Empid=$empid and b.Empid=$empid and c.Empid=$empid";
			$r3 = mysql_query($q3,$con);
			
			$row3 = mysql_fetch_array($r3);			
			
			$avg3= ($row3["a"]+$row3["b"]+$row3["c"])/3;
			echo "<tr><td>Problem Solving</td><td>".$row3["a"]."</td><td>".$row3["b"]."</td><td>".$row3["c"]."</td><td>".$avg3."</td>";
			
			if($avg3>=0&&$avg3<=4) {
				echo "<td>Poor</td>";
			}
			else if($avg3>4&&$avg3<=7) {
				echo "<td>Average</td>";
			}
			else if($avg3>7&&$avg3<10) {
				echo "<td>Good</td>";
			}
			
			echo "</tr>";
			
			//
			$q4= "SELECT a.Comp4 as a,b.Comp4 as b,c.Comp4 as c FROM Empcompetency a, Supcompetency b, Mancompetency c where a.Empid=$empid and b.Empid=$empid and c.Empid=$empid";
			$r4 = mysql_query($q4,$con);
			
			$row4 = mysql_fetch_array($r4);
			
			
			$avg4= ($row4["a"]+$row4["b"]+$row4["c"])/3;
			echo "<tr><td>Team Work</td><td>".$row4["a"]."</td><td>".$row4["b"]."</td><td>".$row4["c"]."</td><td>".$avg4."</td>";
			
			if($avg4>=0&&$avg4<=4) {
				echo "<td>Poor</td>";
			}
			else if($avg4>4&&$avg4<=7) {
				echo "<td>Average</td>";
			}
			else if($avg4>7&&$avg4<10) {
				echo "<td>Good</td>";
			}
			
			echo "</tr>";
			
			//
			$q5= "SELECT a.Comp5 as a,b.Comp5 as b,c.Comp5 as c FROM Empcompetency a, Supcompetency b, Mancompetency c where a.Empid=$empid and b.Empid=$empid and c.Empid=$empid";
			$r5 = mysql_query($q5,$con);			
			$row5 = mysql_fetch_array($r5);			
			
			$avg5= ($row5["a"]+$row5["b"]+$row5["c"])/3;
			echo "<tr><td>Adaptibility</td><td>".$row5["a"]."</td><td>".$row5["b"]."</td><td>".$row5["c"]."</td><td>".$avg5."</td>";
			
			
			if($avg5>=0&&$avg5<=4) {
				echo "<td>Poor</td>";
			}
			else if($avg5>4&&$avg5<=7) {
				echo "<td>Average</td>";
			}
			else if($avg5>7&&$avg5<10) {
				echo "<td>Good</td>";
			}
			
			echo "</tr>";
			echo "</table>";

			echo "<br />Quality key:<br />0-4: Poor<br />4-7: Average<br />7-10: Good<br />";
		}
		else {
	
			
		?>
		<form action="" method="post">
		Enter employee ID whose data you want to display: <input type="text" name="empid"/> <input type="submit"/>
		</form>
		<?php
		}
	}
	
	}
?>
