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
	
		<h1 id="logo-text"><a href="" title="">EPM</a></h1>		
		<h2 id="slogan">Employee Performance Management</h2>	
			
	</div>		
			
	<!-- navigation starts-->	
	<div id="nav">
		<ul>
			<li><a href="index.php">Home</a></li>
			<!--<li><a href="http://www.styleshout.com/templates/preview/MarketPlace11/2-columns.html">2-Columns</a></li>-->
			<li id="current"><a href="register.php">Register</a></li>			
			<li><a href="about.php">About</a></li>		
		</ul>
	<!-- navigation ends-->	
	</div>					
			
	<!-- content-wrap starts -->
	<div id="content-wrap" class="three-col">	
	
		<div id="sidebar">
			
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
					
		<!-- sidebar ends -->		
		</div>
		
		<div id="rightcolumn">
		
			<?php
			include ('Login.php');
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
			
			<p>
			© 2010 Your Company

            &nbsp;&nbsp;&nbsp;&nbsp; 

   		    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			
			<a href="">Home</a> |
   		    <a href="">Sitemap</a> |
	   	    <a href="">RSS Feed</a> |
            <a href="">XHTML</a> |
			<a href="">CSS</a>
			</p>
			
	</div></div>
	<!-- footer ends-->	
	
<!-- wrap ends here -->
</div>



</body></html>