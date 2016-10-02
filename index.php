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
			if(!(isset($_SESSION['username']) || isset($_SESSION['admin']))){
			echo "<li><a href='login.html'>login</a></li>"; // admin by user check
			echo "<li><a href='register.html'>register</a></li>";
			}
			?>
			<?php if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
			echo "<li><a href='papers.html'>papers</a></li>";
			echo "<li><a href='logout.php'>logout</a></li>";
			}
			?>
		</ul>
	</div>
	<div id="body">
		<div class="header">
			<ul>
				<?php
				$user = 'root';
				$pwd = '';
				$db1=mysql_connect('localhost',$user,$pwd) or die('unable to connect to database');
				mysql_select_db('co_blog_reg') or die(mysql_error());
				$query = "select * from notify_img order by time limit 3";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result)){
				$img_id = $row["id"];
				echo "<li>";
				?>
				 <img id="img_call" src="img.php?id=<?php echo $img_id ?>" />
				<?php
				echo "<a href='#'><b>".$row['title']."</b><span>Click to check the content</span></a></li>";	
				}
				?>
			
				
			</ul>
		</div>
		<a href='#'><div class="body">
			
		</div></a>
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
					<?php
						$months = array("jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec");
						$query = "select * from notify_img order by time desc limit 3";
						$result = mysql_query($query) or die(mysql_error());
						while($row = mysql_fetch_array($result)){
							$timer = $row['time'];
							$timer = explode("-", $timer);
							echo "<li><div><span><b>".$timer[2]."</b> ". $months[$timer[1]]."</span></div>";
							echo "<p><a href='calendar.php'>".$row['detail']."</a></p>";
							echo "</li>";
						}
					?>
					<li>
						<div>
							<span><b>4</b> fjul</span>
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
					<a href="#">twitter</a>
				</li>
				<li class="facebook">
					<a href="#">facebook</a>
				</li>
				<li class="googleplus">
					<a href="#">googleplus</a>
				</li>
			</ul>
			<p>
				&copy; Copyright 2012. All rights reserved
			</p>
		</div>
	</div>
</body>
</html>