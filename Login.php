<?php
	session_start();
	// dBase file
	$con = mysql_connect('localhost','root','mysql');

	if ($_GET["op"] == "login")
  {
  if (!$_POST["login_username"] || !$_POST["login_password"])
  	{
  	die("You need to provide a username and password.");
  	}
  
  mysql_select_db("EmployeePerformance", $con);
  
  // Create query
  $q = "SELECT * FROM `Empdetails` "
  	."WHERE `Username`='".$_POST["login_username"]."' "
  	."AND `Password`=md5('".$_POST["login_password"]."') "
  	."LIMIT 1";
  // Run query
  $r = mysql_query($q,$con);

  if ( $obj = @mysql_fetch_object($r) )
  	{
  	// Login good, create session variables
  	$_SESSION["valid_id"] = $obj->Empid;
  	$_SESSION["valid_user"] = $obj->Empname;
  	$_SESSION["valid_time"] = time();
	$_SESSION["old_user"] = $obj->Supid;
	$_SESSION["emptype"] = $obj->Emptype;
	
  	// Redirect to member page
  	Header("Location: index.php");
  	}
  else
  	{
  	// Login not successful
  	
  	die("Sorry, could not log you in. Wrong login information.");
  	}
  }
	else
  {
  	
//If all went right the Web form appears and users can log in
?>
<h1>Login:</h1>
<table>
<form id="login_form" action="?op=login" method="post">
<tr><td>username:<input type="text" name="login_username" /></td></tr>
<tr><td>password:<input type="password" name="login_password"/></td></tr>
<tr><td><input type="submit" value="Submit" name="login_submit" />&nbsp;&nbsp;&nbsp;<a href="register.php">Register</a></td></tr>
</form>
</table>
<?php
}
?>
