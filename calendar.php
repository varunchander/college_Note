<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<title>Calendar - Academy Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


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
			<li class="selected">
				<a href="calendar.php">calendar</a>
			</li>
			<?php
			if(isset($_SESSION['admin'])){
			echo "<li><a href='admin.php'>status</a></li>";
			}
			else{
			echo "<li><a href='contact.php'>contact</a></li>";
			}

			if(!(isset($_SESSION['username']) || isset($_SESSION['admin']))) {
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
	<div id="body">
		<div class="content">
			<h3>Calendar 2012: This is just a place holder.</h3>
			<?php 
				if(isset($_SESSION['admin']) || isset($_SESSION['username'])){
				if(isset($_SESSION['permit'])){
				echo "<div class='container' name='cont'><form role='form' method='post' action=notification_entry.php >";
				echo "<div class='form-group'><div class='col-sm-offset-3 col-sm-6'>";
				echo "<button type='submit' name='addblog' style='position:absolute;right:-2px;top:-20px;'value='Add_Blog' class='btn 	btn-default'>ADD_NOTIFICATION</button>";
    			echo "</div></div></form></div>";
    			}
    			}
    		?>
			<ul class="article">
				<?php
				$months = array("January","February","March","April","May","June","July","August","September","October","November","December");
				$user = 'root';
				$pwd = '';
				$db1=mysql_connect('localhost',$user,$pwd) or die('unable to connect to database');
				mysql_select_db('co_blog_reg') or die(mysql_error());
				if(isset($_GET['step'])){
					$off = 3*$_GET['step'];
				}else{
					$off = 0;
				}
				$query_offset="select count(id) from notify_img";
				$total_count = mysql_query($query_offset);
				$val = mysql_fetch_array($total_count);
				$count_offset = $val[0];
				$query = "select * from notify_img order by time_sec desc limit 3 offset $off";
				$result = mysql_query($query) or die(mysql_error());
				while($row = mysql_fetch_array($result)){
					$img_id = $row["id"];
					echo "<li><a href='#' class='figure'>";
				?>
				 <img id="img_call1" src="img.php?id=<?php echo $img_id ?>" />
				<?php
				$timer = $row['event_date'];
				$timer = explode("-", $timer);
				echo "</a><div><h3>".$row['title']."</h3><p>".$row['detail']."</p><span><b>date</b>: ".$months[$timer[1]]." ".$timer[2].",".$timer[0]." </span>";
				echo "<span><b>Venue</b>: ".strtoupper($row['venue'])."</span>";
				echo "</div></li>";
				}
				?>
			</ul>
		</div>
		<div class="container">
			  	<center><ul class="pagination">
			  	<?php
			  	$counter = 1;
			  	while($count_offset>0){$count_offset = $count_offset - 3;
			  	$val = $counter-1;
			  	echo "<li><a href='calendar.php?step=$val'>$counter</a></li>";
		  		$counter++;
			  	}
			  	?>
  				</ul>
  				</center>
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