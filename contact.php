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
			echo "<li><a href='papers.php?id=1'>papers</a></li>";
			echo "<li><a href='logout.php'>logout</a></li>";
			}
			?>
		</ul>
	</div>
	<div id="body">
		<div class="content">
			<h2>This is just a place holder, so you can see what the site would look like.</h2>
			<p>
				This website template has been designed by freewebsitetemplates.com for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us. If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forums/">forums</a>.
			</p>
			<h3>admission</h3>
			<ul class="contact">
				<li>
					This is just a place holder, so you can see what the site would look like.
				</li>
				<li>
					Tel: + 7958 917 9747 2481 000
				</li>
				<li>
					Fax: + 7958 917 9747 2481 000
				</li>
				<li>
					<a href="http://www.freewebsitetemplates.com/misc/contact">Email: company@email.com</a>
				</li>
			</ul>
			<h3>department</h3>
			<ul class="contact">
				<li>
					This is just a place holder, so you can see what the site would look like.
				</li>
				<li>
					Tel: + 7958 917 9747 2481 000
				</li>
				<li>
					Fax: + 7958 917 9747 2481 000
				</li>
				<li>
					<a href="http://www.freewebsitetemplates.com/misc/contact">Email: company@email.com</a>
				</li>
			</ul>
			<h3>department</h3>
			<ul class="contact">
				<li>
					This is just a place holder, so you can see what the site would look like.
				</li>
				<li>
					Tel: + 7958 917 9747 2481 000
				</li>
				<li>
					Fax: + 7958 917 9747 2481 000
				</li>
				<li>
					<a href="http://www.freewebsitetemplates.com/misc/contact">Email: company@email.com</a>
				</li>
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