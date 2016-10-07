<?php
session_start();
?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Contact - Academy Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
	<center><p style="font-size:45px;">College Note</p></center>
		<ul>
			<li>
				<a href="index.php">home</a>
			</li>
			<li>
				<a href="about.php">about</a>
			</li>
			<li>
				<a href="programs.php">programs</a>
			</li>
			<li>
				<a href="calendar.php">calendar</a>
			</li>
			<li class="selected">
				<a href="contact.php">contact</a>
			</li>
			<?php 
			if(!(isset($_SESSION['username']) || isset($_SESSION['admin']) )){
			echo "<li><a href='login.html'>login</a></li>"; // admin by user check
			echo "<li><a href='register.html'>register</a></li>";
			}
			?>
			<?php if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
			echo "<li><a href='papers.html'>papers</a></li>";
			echo "<li><a href='logout.php'>logout</li>";
			}
			?>
		</ul>
	</div>
	<div >
		<?php 
		echo "<h3>Location of our office</h3>";
		require "mapapi.html" ;
		 ?>
	</div>
	<div id="footer">
		<div>
			<p>
				&copy; Copyright 2016. All rights reserved
			</p>
		</div>
	</div>
</body>
</html>