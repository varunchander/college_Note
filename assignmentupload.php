<?php

if(isset($_FILES['assignment'])){
$file_name=$_FILES['assignment']['name'];
$file_size = $_FILES['assignment']['size'];
$file_type = $_FILES['assignment']['type'];
$file_loc = $_FILES['assignment']['tmp_name'];

$year = $_POST['year'];

$conn = new mysqli("localhost","root","","co_blog_reg");

$extension = strtolower(end(explode('.',$file_name)));
echo $extension;
if($extension=="pdf"){
	move_uploaded_file($file_loc, "images/".$file_name);

	$sql = "INSERT INTO upload(file_id,file_name,year) VALUES('','$file_name','$year')";

	if($conn->query($sql) === TRUE){
					//echo "inserted";
		include 'sendingmail.php';
		header('Location: calendar.php');
	}
	else{
		echo 'error occured';
	}


}

else{
$file = addslashes(file_get_contents($file_loc));

$sql = "INSERT INTO upload VALUES('','$file_name','$file','$year')";
				
	if($conn->query($sql) === TRUE){
					//echo "inserted";
		include 'sendingmail.php';
		header('Location:calendar.php');
	}
	else
		{
				//echo "rahul";
				//echo "error " . $conn->error;
		}
	}
}
?><!-- 
<!DOCTYPE html>
<html>
<head>
	<title>assignment</title>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
 <input type="file" value="" name="assignment" required>upload
<br />
 <input type="text" name="year" required>
 <input type="submit" value="submit" name="upload">
 </form>
</body>
</html> -->