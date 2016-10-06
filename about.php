<?php
session_start();
require "nanobar.php";
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<style type="text/css">
	ul.a {
    list-style-type: circle;
}
</style>
<body>
	<div id="header">
		<center><p style="font-size:45px;">College Note</p></center>
		<ul>
			<li>
				<a href="index.php">home</a>
			</li>
			<li class="selected">
				<a href="about.php">about</a>
			</li>
			<li>
				<a href="programs.php">programs</a>
			</li>
			<li>
				<a href="calendar.php">calendar</a>
			</li>
			<?php
			if(isset($_SESSION['admin'])){
			echo "<li><a href='admin.php'>status</a></li>";
			}
			else{
			echo "<li><a href='contact.php'>contact</a></li>";
			}
			 
			if(!(isset($_SESSION['username']) || isset($_SESSION['admin']))){
			echo "<li><a href='login.html'>login</a></li>"; // admin by user check
			echo "<li><a href='register.html'>register</a></li>";
			}
			?>
			<?php if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
			echo "<li><a href='papers.php?id=1'>papers</a></li>";
			echo "<li><a href='logout.php'>logout</a></li>";
			}
			?>
		</ul>
	</div>
	<div id="body">
		<div class="content">
			<h3>Why College Note ?</h3>
			<p>
			<ul class='a'>
			<li>Its main emphasis is to provide ongoing events and upcoming events in the campus </li>
			<li>It also provides the papers of various examinations of every year </li>
			<li>It provides a seperate domain for class representatives and concerned authorities to post the events ongoing in the campus</li>
			<li>It also provides email notifications for the students for every new event that takes place in the campus
			</li>
			</ul>
			</p>
			<h3>Who can use College Note ?</h3>
			<ul class='a'>
			<li>All the students present in campus can use it as it provides the information about new developments in there year too</li>
			</ul>
		</div>
	</div>
	<div id="footer">
		<div>
			<ul>
				<li class="twitter">
					<a href="http://freewebsitetemplates.com/go/twitter/">twitter</a>
				</li>
				<li class="facebook">
					<a href="http://freewebsitetemplates.com/go/facebook/">facebook</a>
				</li>
				<li class="googleplus">
					<a href="http://freewebsitetemplates.com/go/googleplus/">googleplus</a>
				</li>
			</ul>
			<p>
				&copy; Copyright 2012. All rights reserved
			</p>
		</div>
	</div>
</body>
</html>