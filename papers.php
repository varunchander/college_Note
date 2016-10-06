<?php
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
	  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
      <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>           
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>        
	  
	<link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
  <nav>
    <div class="nav-wrapper">
      <div class="col s12">
        <a href="papers.php?id=1" class="breadcrumb">First</a>
        <a href="papers.php?id=2" class="breadcrumb">Second </a>
        <a href="papers.php?id=3" class="breadcrumb">Third</a>
        <a href="papers.php?id=4" class="breadcrumb">Final</a>
      </div>
    </div>
  </nav>
  
    
   <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Final Year Papers</h5>
                <p class="grey-text text-lighten-4">You can download your papers for final year.</p>
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
          <div class="footer-copyright">
            <div class="container">
            
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
    
			
<a class="waves-effect waves-light btn" href="assignmentupload.php" >Upload Papers</a>
</body>
</html>