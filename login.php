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
	header("Location:index.php");
	echo "Sucessfully logged in ";
}
else if ($admin == $username && $pass == $password){
	$_SESSION["admin"]=$admin;
	header('Location:index.php');
}
else {
	header('Location:login.html?status=1&');
	echo "some problem".mysql_error();
}
}
?>