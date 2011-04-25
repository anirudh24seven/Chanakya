<?php
if($_GET['op'] == 'register') {
	$con = mysql_connect("localhost","root","mysql");
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("EmployeePerformance", $con);	
	
	$val=0;
	if($_POST['Emptype']=="hr") {
		$val=4;
	}
	else if($_POST['Emptype']=="manager") {
		$val=3;
	}
	else if($_POST['Emptype']=="supervisor") {
		$val=2;
	}
	else if($_POST['Emptype']=="other") {
		$val=1;
	}
	
	$sql="INSERT INTO Empdetails (`Empid`, `Empname`, `Username`, `Password`, `Emptype`, `Position`) VALUES ('$_POST[Empid]', '$_POST[Empname]', '$_POST[Username]', md5('$_POST[Password]'), $val, '$_POST[Position]')";
	
	if (!mysql_query($sql,$con)) {
  		die('Error1: ' . mysql_error());
  	}		
	
  	
	mysql_close($con);
	
	echo "Registered successfully.";
}
else {
?>	
<script type="text/javascript" language="javascript" src="jquery.js"></script>
<script type="text/javascript" >
	function validateForm()
	{
		var y = {a:"Empid", b:"Empname", c:"Username", d:"Password", e:"Retype Password", f:"Position"}; 
		for(z in y) {
		x=document.forms["register_form"][y[z]].value;
		if (x==null || x=="")
		  {
		  alert(y[z]+ " must be filled out");
		  return false;
		  }
		}
	}
	
	function checkUsername() {
		var username = document.getElementById("Username").value;
		
		var xmlhttp;
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		    {
		    	var response = xmlhttp.responseText;
		    	if (response == "1")
			    	document.getElementById("infoUser").innerHTML = "Username " + username + " is available";
			    else 
			    	document.getElementById("infoUser").innerHTML = "Error: Username " + username + " is already taken";
		    }
	  }
		xmlhttp.open("GET","checkusername.php?username="+username,true);
		xmlhttp.send();
	}
	
	function checkPassword() {
		var password = document.getElementById("Password").value;
		var cpassword = document.getElementById("RPassword").value;
		
		if (password == "") {
			document.getElementById("infoPass").innerHTML = "Password cannot be blank";
		}
		else if (password != cpassword) {
			document.getElementById("infoPass").innerHTML = "Error: Passwords do not match";
		}
		else {
			document.getElementById("infoPass").innerHTML = "Passwords match";
		}
	}
</script>
<h1>Registration Form:</h1>
<table>
<form id="register_form" method="post" action="?op=register" onsubmit="return validateForm()" >
<tr><td>Employee ID:</td><td><input type="text" name="Empid" /></tr></td>
<tr><td>Employee Name:</td><td><input type="text" name="Empname"/> </td></tr>
<tr><td>Username:</td><td><input type="text" name="Username" id="Username" onblur="checkUsername()"/></td><td><div id="infoUser"></div></td></tr>
<tr><td>Password:</td><td><input type="password" name="Password" id="Password" /></td></tr>
<tr><td>Retype password:</td><td><input type="password" name="RPassword" id = "RPassword" onblur="checkPassword()"/></td><td><div id="infoPass"></div></td></tr>
<tr><td>Employee Type:</td><td><select name="Emptype"><option value="hr">HR Employee</option><option value="manager">Senior Manager</option><option value="supervisor">Supervisor</option><option value="other">Other</option></select></td></tr>
<tr><td>Position:</td><td><input type="text" name="Position"/></td></tr>
<tr><td><br /></td></tr>
<tr><td><input type="submit" value="Submit" name="submit"/> <input type="reset" value="Reset" /></td></tr>
</form>
</table>				
<?php
}
?>
