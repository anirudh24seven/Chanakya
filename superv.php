<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<link rel="stylesheet" href="main.css" type="text/css">

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
			<li><a href="index.php">Home</a></li>
			<?php
			session_start();
				if (!$_SESSION["valid_user"]) {
					echo "<li><a href='register.php'>Register</a></li>";
				}
				else {
					if ($_SESSION['emptype']==1) {
						if(!$_SESSION["old_user"]) {
							echo "<li><a href='details.php'>Insert Details</a></li>";
						}
						else {
							echo "<li><a href='details.php'>View Details</a></li>";
						}
					}
					else if($_SESSION['emptype']==2) {
						echo "<li id='current'><a href='superv.php'>Employee Details</a></li>";
					}
					else if($_SESSION['emptype']==3) {
						echo "<li id='current'><a href='manag.php'>Employee Details</a></li>";
					}
					else if($_SESSION['emptype']==4) {
						echo "<li id='current'><a href='details.php'>View Details</a></li>";
					}
				}
?>
			<li><a href="faq.php">FAQ</a></li>					
			<li><a href="about.php">About</a></li>		
		</ul>
	<!-- navigation ends-->	
	</div>					
			
	<!-- content-wrap starts -->
	<div id="content-wrap" class="two-col">	
	
		<!--<div id="sidebar">		
				
		</div>-->
		
		<div id="rightcolumn">		
			<?php
			session_start();
			
			if (!$_SESSION["valid_user"]) {
				// User not logged in, redirect to login page
				include ('Login.php');
			}
			else {
				// Display Member information
				echo "<p>Welcome " . $_SESSION["valid_user"] . "!";
				echo "<p>Logged in: " . date("m/d/Y", $_SESSION["valid_time"]);
				
				// Display logout link
				echo "<p><a href=\"logout.php\">Click here to logout!</a></p>";
			}
			?>					
		</div>
				
	<!-- content-wrap ends-->	
		<div id="main">
			<?php include('supervisor.php');?>
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
