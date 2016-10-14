<?php
$id = $_GET['id'];

$conn = new mysqli("localhost","root","","co_blog_reg");

$sql = "UPDATE register SET emailpermit = 0 WHERE ID = $id ";

$result = $conn->query($sql);

header('Location:https://www.gmail.com');
?>