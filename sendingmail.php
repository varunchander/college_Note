<?php
require 'PHPMailer-master/PHPMailerAutoload.php';

define('GUSER', ''); // GMail username
define('GPWD', ''); // GMail password
$sender_gmail = GUSER;
$subject = 'College Note Notification';

$sender_name = 'admin';

$conn = new mysqli("localhost","root","","co_blog_reg");

$sql = "SELECT * FROM register";

$result = $conn->query($sql);

// for text messages
while($row = $result->fetch_assoc()){
$to = $row['phoneno'];
//$to = "varunchander96@gmail.com";
//echo $to;
//call for function with parameter
$to .= "@sms.textlocal.in" ;
//echo $to ;

	$message = "#%#New Posts have been uploaded in college note check the website for further details##";

	smtpmailer($to,GUSER, $sender_name, $subject, $message);

}
$result = $conn->query($sql);
// for emails
while($row = $result->fetch_assoc()){
$to = $row['email'];
//$to = "varunchander96@gmail.com";
//echo $to;
//call for function with parameter
if($row['emailpermit']){
	$id = $row['ID'];
	$message = "<html><body>";
	$message .= "<p>New Posts have been uploaded in college note check the website for further details</p>";
	$message .= "<a href='http://localhost/soft_2_note/unsubscribe.php?id=$id'>unsubscribe</a>";

	smtpmailer($to,GUSER, $sender_name, $subject, $message);
}
}

function smtpmailer($to, $from, $from_name, $subject, $body) { 
//echo $to.$from.$from_name,$subject.$body;	
	global $error;
	$mail = new PHPMailer();  // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->isHTML(true);
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