<?php
session_start(); // php file for entering the content
echo round(microtime(true)*1000);
if(!$_SESSION['username']){header('Location:index.php');}
if(isset($_SESSION["username"]) && isset($_POST["notify_detail"])){
	$uname = $_SESSION["username"];
	$desc=$_POST["notify_detail"];
	$btitle=$_POST["notify_title"];
	$venue=$_POST["event_venue"];
	$venue_dat=$_POST["event_date"];
	
	$tablem ='notify_img'; // table for notify entry
	$table = 'register';

	$user ='root';
	$pwd = '';
	$db1=mysql_connect('localhost',$user,$pwd) or die('unable to connect to database');
	mysql_select_db('co_blog_reg') or die('unable to find db');

	$authid = "select * from register where uname='$uname'";
	$status = mysql_query($authid) or die(mysql_error());
	$result = mysql_fetch_array($status);
	$id = $result["ID"]; // retriving the id of user

	$btime = date("Y-m-d");

	$allowed =  array('gif','png','jpg');//check file extensions
	$filename = $_FILES['myfile']['name'];
	$filename = strtolower($filename);
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	if(!in_array($ext,$allowed) ) {
    echo 'error';
    header('Location:notification_entry.php?error=1');
	}
	if(! get_magic_quotes_gpc()){
	$desc = addslashes($desc);
	$btitle = addslashes($btitle);
	}

	// img checks
	if( getimagesize($_FILES["myfile"]["tmp_name"]) != false) {
	$image=addslashes($_FILES['myfile']['tmp_name']);
	$image=file_get_contents($image);
	$image=base64_encode($image);
	$time_seconds = round(microtime(true)*1000);
	$blogentry = "insert into $tablem(id,name,image,title,detail,blogger_id,time,venue,event_date,time_sec) values (
	0,'$uname','$image','$btitle','$desc','$id','$btime','$venue','$venue_dat','$time_seconds')";
	$que=mysql_query($blogentry);
	if($que){
		header('Location: calendar.php?timer='.$time_seconds);
	}
	else {
		header('Location:notification_entry.php?error=2');
	}

	}
	else{
		header('Location: notification_entry.php?error=3');
	}

}
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
<style>
body{
	color: white;
}
</style>
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
    </div><br><br><br><br>
    <div class="form-group">
      <label class="control-label col-sm-2" >Event_Venue:</label>
      <div class="col-sm-4">
        <input type="text" class="form-control" name="event_venue" placeholder="Event_Venue" required>
      </div>
    </div><br><br><br><br>
    <div class="form-group">
      <label class="control-label col-sm-2" >Event_Date:</label>
      <div class="col-sm-4">
        <input type="date" class="form-control" name="event_date" placeholder="Event_Date" required>
      </div>
    </div>
	<br>
	<br>
	<br>
	<br>
      <!-- Standard Select -->
     <input type='file' name='myfile' required><p id='notify'></p><br>
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