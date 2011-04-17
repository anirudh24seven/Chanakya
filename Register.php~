<?php
if($_SERVER['REQUEST_METHOD'] == "POST") {
	$con = mysql_connect("localhost","root","mysql");
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	
	mysql_select_db("EmployeePerformance", $con);
	
	$sql="INSERT INTO Empdetails VALUES ('$_POST[Empid]', '$_POST[Empname]', '$_POST[Username]', md5('$_POST[Password]'), '$_POST[Emptype]', '$_POST[Position]','$_POST[Supid]','$_POST[Manid]')";	
	if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }		
	
	mysql_close($con);
	
	echo "Registered successfully.";
}
else {
?>	
<script type="text/javascript" >
	function validateForm()
	{
/*		var y = {a:"Empid", b:"Empname", c:"Username", d:"Password", e:"Retype Password", f:"Position"}; 
		for(z in y) {
		x=document.forms["register_form"][y[z]].value
		if (x==null || x=="")
		  {
		  alert(y[z]+ " must be filled out");
		  return false;
		  }
		}*/
	}
	
	function changing() {
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
		    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		    }
	  }
		xmlhttp.open("GET","ajax_info.txt",true);
		xmlhttp.send();
	}
</script>
<h1>Registration Form:</h1>
<table>
<form id="register_form" method="post" action="" onsubmit="return validateForm()" >
<tr><td>Employee ID:</td><td><input type="text" name="Empid" /></tr></td>
<tr><td>Employee Name:</td><td><input type="text" name="Empname"/> </td></tr>
<tr><td>Username:</td><td><input type="text" name="Username"/></td></tr>
<tr><td>Password:</td><td><input type="password" name="Password" onchange="changing()"/></td></tr>
<tr><td>Retype password:</td><td><input type="password" name="Retype Password"/></td></tr>
<tr><td>Employee Type:</td><td><select name="Emptype"><option>HR Employee</option><option>Senior Manager</option><option>Other</option></select></td></tr>
<tr><td>Position:</td><td><input type="text" name="Position"/></td></tr>
<tr><td><br /></td></tr>
<tr><td><input type="submit" value="Submit" name="submit"/> <input type="reset" value="Reset" /></td></tr>
</form>
</table>				
<?php
}
?>