<?php
session_start();
if(!$_SESSION['username']){header('Location:index.php');}
if(isset($_SESSION["username"]) || isset($_SESSION['admin'])){

	session_destroy();
	$_SESSION=array();
	header('Location:index.php');
}
?>