<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<link rel="stylesheet" href="./Marketplace_files/MarketPlace.css" type="text/css">

<title>Employee Performance Management</title>

</head>

<body>

<!-- wrap starts here -->
<div id="wrap">
	
	<div id="header-photo">
	
		<h1 id="logo-text"><a href="" title="">Employee Performance Management</a></h1>		
		<h2 id="slogan">Managing Employee Performance...</h2>	
			
	</div>		
			
	<!-- navigation starts-->	
	<div id="nav">
		<ul>
			<li id="current"><a href="index.php">Home</a></li>

			<li><a href="register.php">Register</a></li>			
			<li><a href="about.php">About</a></li>		
		</ul>
	<!-- navigation ends-->	
	</div>					
			
	<!-- content-wrap starts -->
	<div id="content-wrap" class="three-col">	
	
		<div id="sidebar">		
		<!-- sidebar ends -->		
		</div>
		
		<div id="rightcolumn">
		
		<?php
			session_start();
			
			if (!$_SESSION["valid_user"])
				{
				// User not logged in, redirect to login page
				Header("Location: index.php");
				}

			// Display Member information
			echo "<p>Welcome " . $_SESSION["valid_user"] . "!";
			echo "<p>Logged in: " . date("m/d/Y", $_SESSION["valid_time"]);
			
			// Display logout link
			echo "<p><a href=\"logout.php\">Click here to logout!</a></p>";
		?>	
					
		</div>		
	<!-- content-wrap ends-->	
		<div id="main">
			<h1>Employee Performance Management</h1>
			<p>Employee Performance Management is a tool created to manage the performance of Employees regularly.</p>
			<p>It focuses on various competencies essential for organization’s growth and are required to be acquired and maintained by the
employees. </p>
		</div>
	</div>
		
	<!-- footer starts -->			
	<div id="footer-wrap"><div id="footer">				
			
			<p>
			DBMS project.
			</p>
			
	</div></div>
	<!-- footer ends-->	
	
<!-- wrap ends here -->
</div>



</body></html>
