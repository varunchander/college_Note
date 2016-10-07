<?php
if(isset($_GET['id'])){
	$id = $_GET['id'];
	session_start();
	$user = 'root';
	$pwd = '';
	$db1=mysql_connect('localhost',$user,$pwd) or die('unable to connect to database');
	mysql_select_db('co_blog_reg') or die(mysql_error());	
	$query = "delete from notify_img where id = '$id'";
	$result = mysql_query($query) or die(mysql_error());

	if($result){
	header('Location:calendar.php');
	}
	else{
		echo mysql_error();
	}
}
?>