<?php
require "nanobar.php";
$conn = new mysqli("localhost","root","","co_blog_reg");
$year_id = $_GET['id'];
$query = "SELECT * FROM upload where year = $year_id ";
$result = $conn->query($query);
?>
<!Doctype html>

<html>


<head>

	<title>All papers</title>

	
	  <meta name="viewport" content="width=device-width, initial-scale=1">      
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
  <div id="header">
    <center><p style="font-size:45px;">College Note</p></center>
    <ul>
      <li>
        <a href="index.php">home</a>
      </li>
      <li>
        <a href="about.php">about</a>
      </li>
      <li>
        <a href="programs.php">programs</a>
      </li>
      <li class="selected">
        <a href="calendar.php">calendar</a>
      </li>
      <?php
      if(isset($_SESSION['admin'])){
      echo "<li><a href='admin.php'>status</a></li>";
      }
      else{
      echo "<li><a href='contact.php'>contact</a></li>";
      }

      if((isset($_SESSION['username']) || isset($_SESSION['admin']))) {
      echo "<li><a href='login.html'>login</a></li>"; // admin by user check
      echo "<li><a href='register.html'>register</a></li>";
      }

      ?>
      <?php 
      if(!(isset($_SESSION['username']) || isset($_SESSION['admin']))){
      echo "<li><a href='papers.php?id=1'>papers</a></li>";
      echo "<li><a href='logout.php'>logout</a></li>";
      }
      ?>
    </ul>
  </div>
  <div class="container">
          <center><ul class="pagination">
         
         <li><a href="papers.php?id=1">First</a></li>
         <li><a href="papers.php?id=2">Second</a></li>
         <li><a href="papers.php?id=3">Third</a></li>
         <li><a href="papers.php?id=4">Final</a></li>
          </ul>
          </center>
    </div>
    
  
    
   <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Final Year Papers</h5>
                <p class="grey-text text-lighten-4">You can download your papers for <?php echo $year_id ?> year.</p>
              </div>
             

			 <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
			<ul >        
                  <?php
                  while($row = $result->fetch_assoc()){
                  echo '<li><a class="grey-text text-lighten-3" href="displaypdf.php?id='.$row['file_id'].' ">assignment'.$row['file_id'].'</a></li>';
                  //echo '<a href="displaypdf.php?id='.$i.'">assignment'.$row['file_id'].'</a>'; 
                  echo '<br />';
                
                  }    
                  
                  ?>
			 </ul>               
			
              </div>
            </div>
          </div>
          
        </footer>
    
			<br>
<a style="position: absolute;right: 250px;" class="waves-effect waves-light btn" href="assignmentupload.php" >Upload Papers</a>
</body>
</html>