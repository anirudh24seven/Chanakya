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
<!--			<li><a href="http://www.styleshout.com/templates/preview/MarketPlace11/2-columns.html">2-Columns</a></li>-->
			<?php
				include ('user.php');
			?>				
			<li id="current"><a href="faq.php">FAQ</a></li>
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
			<h1>FAQ</h1>
			<strong>1. What should I do before updating my details?</strong>
			<p>You should first register yourself at the <a href="register.php">Registration Page</a> and then Login into the EMP portal.</p>
			<strong>2. How effective is this form of performance monitoring among employees in evaluating them?</strong>
			<p>We take 3 rounds of ratings.. Each time it increases in accuracy because it progresses from bottom to the top of the company hierachy. In addition, the supervisors and HR Managers get to post text comments as well which is an outstanding facility to bring the comments into clear picture.</p>
			<strong>3. Does this facility envelop the performance monitoring of the trainees as well?</strong>
			<p>Yes. These ratings are infact much respectably associated with the rating that deserves to be present in performance evaluation of trainees as well.</p>
			<strong>4. With the presence of self-rating right at the beginning of the facility, wont the rating figures be misleading?</strong>
			<p>The main reason to incorporate self-rating facility is to first extract as much info on how much the employees regard themselves on a relative scale. The predecessors of the company hierachy, having some idea about their employees, upon looking at the self-rating schemes they have recieved on their desk from their successors would be informed of the honesty factor of the employees in their own rating. Even if the average ratings might be higher than real, the skewed self rating scheme would pop out clearly. Thus, it is not misleading.</p>

			<strong>5. Does the rating scheme facility convincingly cover all aspects in which the employee can be assessed?</strong>
			<p>Definitely. Very close to all of the characteristics of an employee can be evaluated by the ratings in the facility. In addition, the presence of the text comments effectively puts the ratings into much more accurate and understandable perspective.</p>
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
