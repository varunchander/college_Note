<?php
if(isset($_POST['username'])){
$username = $_POST['username']; 
$password = $_POST['password'];
$admin = 'admin';
$pass = 'admin';
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
$query = "select * from $table where username='$username' and password='$password'";
$status = mysql_query($query) or die(mysql_error());
$us = mysql_fetch_array($status);
session_start();
if($us["username"] == $username )
{
	$_SESSION["username"]=$username;
	header("Location:bloguser.php");
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
?>