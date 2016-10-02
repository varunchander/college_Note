<?php
mysql_connect("localhost","root","");
mysql_select_db("co_blog_reg");
$id = ($_GET['id']);
$rs = mysql_query("select * from notify_img where id='$id'");
$row = mysql_fetch_array($rs);
$imagebytes = $row['image'];
$imagebytes=base64_decode($imagebytes);
header("Content-type: image/jpeg");
echo $imagebytes; 
?>