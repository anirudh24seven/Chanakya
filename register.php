<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
<head>
<link rel="stylesheet" href="main.css" type="text/css">

<title>Employee Performance Management</title>
<script type="text/javascript" language="javascript" src="jquery.js"></script>
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
			<!--<li><a href="http://www.styleshout.com/templates/preview/MarketPlace11/2-columns.html">2-Columns</a></li>-->
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
						echo "<li><a href='details.php'>Employee Details</a></li>";
					}
					else if($_SESSION['emptype']==3) {
						echo "<li><a href='details.php'>Employee Details</a></li>";
					}
					else if($_SESSION['emptype']==4) {
						echo "<li><a href='details.php'>View Details</a></li>";
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
			
			<h1>Search Box</h1>	
			<form action="" class="searchform">
				<p>
				<input name="search_query" class="textbox" type="text">
  				<input name="search" class="button" value="Search" type="submit">
				</p>			
			</form>	
					
			<h1>Sidebar Menu</h1>
			<ul class="sidemenu">				
				<li><a href="">Home</a></li>
				<li><a href="">Template Info</a></li>
				<li><a href="">Sample Tags</a></li>
				<li><a href="">More Free Templates</a></li>	
				<li><a href="" title="Web Templates">Web Templates</a></li>
			</ul>	
				
			<h1>Links</h1>
			<ul class="sidemenu">
				<li><a href="">PDPhoto.org</a></li>
				<li><a href="">Squidfingers | Patterns</a></li>
				<li><a href="">Alistapart</a></li>					
				<li><a href="">CSS Mania</a></li>
			</ul>
			
			<h1>Sponsors</h1>
			<ul class="sidemenu">
				<li><a href="" title="Website Templates">DreamTemplate</a></li>
				<li><a href="" title="WordPress Themes">ThemeLayouts</a></li>
				<li><a href="" title="Website Hosting">ImHosted.com</a></li>
				<li><a href="" title="Stock Photos">DreamStock</a></li>
				<li><a href="" title="Website Builder">Evrsoft</a></li>
                <li><a href="" title="Web Hosting">Web Hosting</a></li>
			</ul>
			
			<h1>Wise Words</h1>
			<p>"We are what we repeatedly do. Excellence, then, 
			is not an act, but a habit." </p>
					
			<p class="align-right">- Aristotle</p>
				
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
		<?php
			include('Register.php');
		?>
		</div>
	</div>
		
	<!-- footer starts -->			
	<div id="footer-wrap"><div id="footer">				
			
	</div></div>
	<!-- footer ends-->	
	
<!-- wrap ends here -->
</div>



</body></html>
