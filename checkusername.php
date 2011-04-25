<?php
	$con = mysql_connect("localhost", "root", "mysql");
	mysql_select_db("EmployeePerformance", $con);
	
	$username =	$_GET['username'];
	
	$sql = 'SELECT Username FROM Empdetails where Username = "'.$username.'"';
	$result = mysql_query($sql) or die('Error: '.mysql_error());
	$row = mysql_fetch_array($result);
	// 1 if username is available
	if ($row['Username'] == "")
		echo "1";
	else 
		echo "0";
?>
