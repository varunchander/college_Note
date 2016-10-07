<?php
session_start();
	$user = 'root';
	$pwd = '';
	$db1=mysql_connect('localhost',$user,$pwd) or die('unable to connect to database');
	mysql_select_db('co_blog_reg') or die(mysql_error());
	// updating the permit status quo of the user
	if(isset($_GET['permit'])){
			$va = $_GET['permit'];
			$query = "select * from register where ID='$va'";
			$exe = mysql_query($query) or die('unable to execute the query'.mysql_error());
			$row = mysql_fetch_array($exe);
			if($row['permit']){
				$permission = "update register set permit = 0 where ID ='$va'";
			}
			else{
				$permission = "update register set permit = 1 where ID='$va'";
			}
			$val = mysql_query($permission);
			if($val){
				header('Location:admin.php');
			}
	}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
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
			<?php
			if(isset($_SESSION['admin'])){
			echo "<li><a href='admin.php'>status</a></li>";
			}
			else{
			echo "<li><a href='contact.php'>contact</a></li>";
			}

			if(!(isset($_SESSION['username']) || isset($_SESSION['admin']))) {
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
	</div>
	<div id="body" >
		<div class="content" style='width: 1100px;'>
		<?php
			$query = "select * from register";
			$result = mysql_query($query);
			echo "<div >";
			echo "<center><h5>PROFILE</h5></center>";
			echo "<table class='table table-hover'><tbody>";
			echo "<tr><th>First_Name</th><th>Middle_Name</th><th>Last_Name</th><th>User_Name</th><th>Email_id</th>
					<th>Blogger_Activation_Time</th><th>Permit_Status</th></tr>";
			while($row = mysql_fetch_array($result)){
				echo "<tr><td>".$row['fname']."</td>";
				echo "<td>".$row['mname']."</td>";
				echo "<td>".$row["lname"]."</td>";
				echo "<td>".$row["uname"]."</td>";
				echo "<td>".$row["email"]."</td>";
				echo "<td>".$row["created_date"]."</td>";
				echo "<form  class='form-horizontal' role='form' action='admin.php' method='get'>";
				echo "<div class='form-group'>";
          		echo "<div class='col-sm-offset-4 col-sm-7'><td>";
		  		echo "<input type='hidden' name='permit' value=".$row['ID'].">";
				if(!$row['permit']){
					echo "<button type='submit' style='position:relative;' class='btn btn-default'>NO_PERMIT</button></td>";
				}
				else{
					  echo "<button type='submit' style='position:relative;padding-left:45px;' class='btn btn-default'>PERMIT</button></td>";
				}
				echo '</div></div></form></tr>';
			}
			echo "</tbody></table></div>";  
		?>

		</div>
	</div>
</body>
</html>