<?php

if(isset($_POST['user_name'])){
$user ='root';
$pwd = '';
$table ='register';
$db1=mysql_connect('localhost',$user,$pwd) or die('unable to connect to database');

$fname = $_POST['first_name'];
$mname = $_POST['middle_name'];
$lname = $_POST['last_name'];
$email = $_POST['email'];
$uname = $_POST['user_name'];
$pword = $_POST['pass_word'];
$year = $_POST['year'];
$pword = md5($pword); // password is 32 bit long hex number hash code for given pword 

if(! get_magic_quotes_gpc()){
$fname = addslashes($fname);
$mname = addslashes($mname);
$lname = addslashes($lname);
$email = addslashes($email);
$uname = addslashes($uname);
$pword = addslashes($pword);	
$year = addslashes($year);
}
mysql_select_db('co_blog_reg') or die('unable to find db'); //db
$user_Check = "select * from $table where uname = '$uname'"; // check for a unique user name
$reg_time = date("Y-m-d");
$sql = "INSERT INTO $table(fname,mname,lname,email,uname,pword,created_date,year) VALUES('$fname','$mname','$lname','$email','$uname','$pword','$reg_time','$year')";
$user_Check_Status = mysql_query($user_Check) or die('could not connect to table'.mysql_error());
$val = 1;
$us = mysql_fetch_array($user_Check_Status);
echo $us;
if(($uname ==  'admin') || $us['uname'] == $uname)
{
	echo "the user with this name already exists".$uname;
	echo "<br>".$us['uname'];
	header('Location: register.html?repeat_name=1');
}	
else{
	
 $status = mysql_query($sql) or die(mysql_error());
if(! $status){
 	die('could not enter the data '.mysql_error());
 }
 header("Location: login.php");
 }
}
?>