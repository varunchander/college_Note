<?php
session_start();


?>
<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Calendar - Academy Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">

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
			<li>
				<a href="contact.php">contact</a>
			</li>
			<?php 
			if(!(isset($_SESSION['username']) || isset($_SESSION['admin']))) {
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
<div class="container" name="cont">
  <form role="form" method="post"  enctype='multipart/form-data' action="notification_entry.php">
	
     <div class="form-group">
      <label class="control-label col-sm-2" >Notification_Title:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="notify_title" placeholder="Notification_Title" required>
      </div>
    </div>
	<br>
	<br>
	<br>
	<br>
      <!-- Standard Select -->
     <input type='file' name='myfile' onsubmit="" required><p id='notify'></p><br>
	<div class="form-group">
      <label for="comment" >Details:</label>
      <textarea class="form-control" name="notify_detail" rows="5" id="detils" required></textarea>
    </div>
	<div class="form-group">
      <div class="col-sm-offset-5 col-sm-10">
        <button type="submit" name='submit' class="btn btn-default">ADD</button> 
      </div>
    </div>
	
  </form>
</div>

</body>
</html>