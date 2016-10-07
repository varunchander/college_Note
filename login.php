<?php
if(isset($_POST['username'])){
$username = $_POST['username']; 
$password = $_POST['password'];
$admin = 'admin';
$pass = '21232f297a57a5a743894a0e4a801fc3';
$user = 'root';
$pwd = '';
$table = 'register'; // table name
$db1=mysql_connect('localhost',$user,$pwd) or die('unable to connect to database');
mysql_select_db('co_blog_reg') or die('unable to find db'); // blog name
$password = md5($password); // password 32 bit hash code
if(! get_magic_quotes_gpc()){
$username = addslashes($username);
$password = addslashes($password);	
}
$query = "select * from $table where uname='$username' and pword='$password'";
$status = mysql_query($query) or die(mysql_error());
$us = mysql_fetch_array($status);
$permit_status = $us['permit'];
session_start();
if($us["uname"] == $username )
{
	$_SESSION["username"]=$username;
	$_SESSION['permit'] = $permit_status;
	$_SESSION['year'] = $us["year"];
	header("Location:index.php");
	echo "Sucessfully logged in ";
}
else if ($admin == $username && $pass == $password){
	$_SESSION["admin"]=$admin;
	header('Location:index.php');
}
else {
	header('Location:login.php?status=1');
	echo "some problem".mysql_error();
}
}
else{
?>


<html>
<head>
<link rel="stylesheet" type="text/css" href="css/login.css">
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
</head>
<body id ='login' style="margin-top: 200px;">
<div class="container">
    <div class="row">
		<div class="col-md-6 col-md-offset-3">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title center">Welcome - Please sign in<span class="right"><a style="text-decoration: none;" href="index.php">x</a></span></h3>
			 	</div>
			 	   
			  	<div class="panel-body">
			    	<form accept-charset="UTF-8" role="form" action="login.php" method="post">
                    <fieldset>
                    <?php if(isset($_GET['status'])){
                    		echo "<p style='color:red'>*Invalid username or password</p>";
                    	}
                    ?>
                  	  	<div class="form-group">
			    		    <input class="form-control" placeholder="username" autofocus pattern ="[a-zA-Z0-9@_]{3,15}" name="username" type="text" required>
			    		</div>
			    		<div class="form-group">
			    			<input class="form-control" placeholder="Password" pattern ="[a-zA-Z0-9@_]{3,15}" name="password" type="password" required>
			    		</div>
			    		<input class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			    	</fieldset>
			      	</form>
			    </div>
			</div>
		</div>
	</div>
</div>
</body>
</html>

<?php 
}

?>