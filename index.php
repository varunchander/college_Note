<?php
session_start();
?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>College name Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
	<div id="header">
		<center><p style="font-size:45px;">College Note</p></center>
		<ul>
			<li class="selected">
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
			<li>
				<a href="contact.php">contact</a>
			</li> 
			<?php 
			if(!isset($_SESSION['username'])){
			echo "<li><a href='login.html'>login</a></li>"; // admin by user check
			echo "<li><a href='register.html'>register</a></li>";
			}
			?>
			<?php if(isset($_SESSION['username'])){
			echo "<li><a href='papers.html'>papers</a></li>";
			echo "<li><a href='logout.php'>logout</li>";
			}
			?>
		</ul>
	</div>
	<div id="body">
		<div class="header">
			<ul>
				<li>
					<img src="images/programs.jpg" alt=""> <a href="programs.html"><b>programs</b><span>This is just a place holder</span></a>
				</li>
				<li>
					<img src="images/football.jpg" alt=""> <a href="programs.html"><b>football</b><span>This is just a place holder</span></a>
				</li>
				<li>
					<img src="images/air-show.jpg" alt=""> <a href="programs.html"><b>air show event</b><span>This is just a place holder</span></a>
				</li>
			</ul>
		</div>
		<div class="body">
			<div>
				<h3>Military &amp; Navy training experts</h3>
				<h1>academy</h1>
				<p>
					This website template has been designed by <a href="http://www.freewebsitetemplates.com">Free Website Templates</a> for you, for free. You can replace all this text with your own text.
				</p>
			</div>
		</div>
		<div class="footer">
			<div class="blog">
				<h3><a href="">blog</a></h3>
				<ul>
					<li>
						<p>
							<a href="blog.html">This is just a place holder, so you can see what the site would look like. by: Rose</a>
						</p>
					</li>
					<li>
						<p>
							<a href="blog.html">This website template has been designed by Free Website Templates for you, for free. by: Rose</a>
						</p>
					</li>
					<li>
						<p>
							<a href="blog.html">This is just a place holder, so you can see what the site would look like. by: Rose</a>
						</p>
					</li>
				</ul>
			</div>
			<div class="article">
				<h3><a href="">calendar</a></h3>
				<ul>
					<li>
						<div>
							<span><b>4</b> jul</span>
						</div>
						<p>
							<a href="calendar.html">This is just a place holder, so you can see what the site would look like. by: Rose</a>
						</p>
					</li>
					<li>
						<div>
							<span><b>8</b> jul</span>
						</div>
						<p>
							<a href="calendar.html">This website template has been designed by Free Website Templates for you, for free. by: Rose</a>
						</p>
					</li>
					<li>
						<div>
							<span><b>12</b> jul</span>
						</div>
						<p>
							<a href="calendar.html">This is just a place holder, so you can see what the site would look like. by: Rose</a>
						</p>
					</li>
				</ul>
			</div>
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