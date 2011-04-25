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
						echo "<li><a href='superv.php'>Employee Details</a></li>";
					}
					else if($_SESSION['emptype']==3) {
						echo "<li><a href='manag.php'>Employee Details</a></li>";
					}
					else if($_SESSION['emptype']==4) {
						echo "<li><a href='details.php'>Employee Details</a></li>";
					}
				}
?>
