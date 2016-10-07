<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

== enter your gmail adress and password here to use it or exploit it==

define('GUSER', 'rahulyadav5117@gmail.com'); // GMail username
define('GPWD', ''); // GMail password
$sender_gmail = GUSER;
$subject = 'College Note Notification';
$message = 'New Posts have been uploaded in college note check the website for further details ';
$sender_name = 'admin';

$conn = new mysqli("localhost","root","","co_blog_reg");

$sql = "SELECT email FROM register";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
$to = $row['email'];
//$to = "varunchander96@gmail.com";
echo $to;
//call for function with parameter
smtpmailer($to,GUSER, $sender_name, $subject, $message);
}

function smtpmailer($to, $from, $from_name, $subject, $body) { 
//echo $to.$from.$from_name,$subject.$body;	
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true;  // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for GMail
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587; 
	$mail->Username = GUSER;  
	$mail->Password = GPWD;           
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Message sent!';
		return true;
	}
}




?>

<!DOCTYPE html>
<html>
<head>
	<title>sending email</title>
</head>
<body>
<!--
<form method="post" action="">
Message:<input type="textarea" name="message">
<input type="submit" name="submit" value="submit"/>
</body>
-->
</html>