<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>

    <body>
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>

<?php
	$id = $_GET['id'];
	$conn = new mysqli("localhost","root","","co_blog_reg");
	$query = "SELECT * FROM upload WHERE file_id = '$id' ";
	$result = $conn->query($query);
	$row = $result->fetch_assoc();
	//echo $row['file_name'];
	$file_name = $row['file_name'];
	$ext = strtolower(end(explode('.',$file_name)));
	//echo $ext;
	if($ext=='pdf'){
		
		$filename="images/".$file_name;
		$file = "$filename";
		header('Content-type:application/pdf');
		header('Content-Disposition:inline; filename="'.$filename.'"');
		header('Content-Transfer-Encoding:binary');
		header('Accept-Ranges: bytes');
		@readfile($file);

	}
	else{
		echo '<textarea cols="190px" rows="45px" readonly class="materialize-textarea">'.$row['file'].'</textarea>';
	}

?>