<?php
session_start();
require "nanobar.php";
?>
<!DOCTYPE HTML>
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
			<?php 
			if(isset($_SESSION['admin'])){
			echo "<li><a href='admin.php'>status</a></li>";
			}
			else{
			echo "<li><a href='contact.php'>contact</a></li>";
			}
			if(!(isset($_SESSION['username']) || isset($_SESSION['admin']))){
			echo "<li><a href='login.php'>login</a></li>"; // admin by user check
			echo "<li><a href='register.html'>register</a></li>";
			}
			?>
			<?php if(isset($_SESSION['username']) || isset($_SESSION['admin'])){
			echo "<li><a href='papers.php?id=1'>papers</a></li>";
			echo "<li><a href='logout.php'>logout</a></li>";
			}
			?>
		</ul>
				<div style="float: right;">
		<?php require "googlesearch.php"; ?>
		</div>
	</div>
	<div id="body">
		<div class="header">
			<ul>
				<?php
				$user = 'root';
				$pwd = '';
				$db1=mysql_connect('localhost',$user,$pwd) or die('unable to connect to database');
				mysql_select_db('co_blog_reg') or die(mysql_error());
				$query = "select * from notify_img order by time_sec desc limit 3";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result)){
				$img_id = $row["id"];
				echo "<li>";
				?>
				 <img id="img_call" src="img.php?id=<?php echo $img_id ?>" />
				<?php
				echo "<a href='calendar.php'><b>".$row['title']."</b><span>Click to check the content</span></a></li>";	
				}
				?>
			
				
			</ul>
		</div>
		<a href='#'><div class="body">
			
		</div></a>
		<div class="footer">
	
			<div class="article">
				<h3><a href="calendar.php">calendar</a></h3>
				<ul>
					<?php
						$months = array("","jan","feb","mar","apr","may","jun","jul","aug","sep","oct","nov","dec");
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
					
				</ul>
			</div>
		</div>
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