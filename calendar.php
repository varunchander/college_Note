<!DOCTYPE HTML>
<!-- Website Template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Calendar - Academy Website Template</title>
	<link rel="stylesheet" href="css/style.css" type="text/css">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">

</head>
<body>
	<div id="header">
		<center><p style="font-size:45px;">College Note</p></center>
		<ul>
			<li>
				<a href="index.html">home</a>
			</li>
			<li>
				<a href="about.html">about</a>
			</li>
			<li>
				<a href="programs.html">programs</a>
			</li>
			<li class="selected">
				<a href="calendar.php">calendar</a>
			</li>
			<li>
				<a href="contact.html">contact</a>
			</li>
			<li>
				<a href="login.html">login</a>
			</li>
			<li>
				<a href="register.html">register</a>
			</li>
		</ul>
	</div>
	<div id="body">
		<div class="content">
			<h3>Calendar 2012: This is just a place holder.</h3>
			<?php if(isset($admin)){
				echo "<div class='container' name='cont'><form role='form' method='post' action=bloguser.php >";
				echo "<div class='form-group'><div class='col-sm-offset-2 col-sm-10'>";
				echo "<button type='submit' name='addblog' style='position:absolute;right:-2px;top:-20px;'value='Add_Blog' class='btn 	btn-default'>ADD_BLOG</button>";
    			echo "</div></div></form></div>";
    			}
    		?>
			<ul class="article">
				<li>
					<a href="#" class="figure"><img src="images/combat-training.jpg" alt=""></a>
					<div>
						<h3>combat training</h3>
						<p>
							This website template has been designed by freewebsitetemplates.com for you, for free. You can replace all this text with your own text. You can remove any link to our website from this website template, you're free to use this website template without linking back to us. If you're having problems editing this website template, then don't hesitate to ask for help on the <a href="http://www.freewebsitetemplates.com/forums/">forums</a>.
						</p>
						<span><b>date</b>: February 1-20, 2012</span> <span><b>Venue</b>: Combat Training location</span>
					</div>
				</li>
				<li>
					<a href="#" class="figure"><img src="images/graduation.jpg" alt=""></a>
					<div>
						<h3>2012 gradutaion</h3>
						<p>
							You can remove any link to our website from this website template, you're free to use this website template without linking back to us. You can remove any link to our website from this website template, you're free to use this website template without linking back to us.You can remove any link to our website from this website template, you're free to use this website template without linking back to us.
						</p>
						<span><b>date</b>: March 28, 2012</span> <span><b>Venue</b>: Graduation Area</span>
					</div>
				</li>
				<li>
					<a href="#" class="figure"><img src="images/air-show-event.jpg" alt=""></a>
					<div>
						<h3>air show event</h3>
						<p>
							You can remove any link to our website from this website template, you're free to use this website template without linking back to us. You can remove any link to our website from this website template, you're free to use this website template without linking back to us.You can remove any link to our website from this website template, you're free to use this website template without linking back to us.
						</p>
						<span><b>date</b>: July 4, 2012</span> <span><b>Venue</b>: In the Sky & clouds</span>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div id="footer">
		<div>
			<ul>
				<li class="twitter">
					<a href="http://freewebsitetemplates.com/go/twitter/">twitter</a>
				</li>
				<li class="facebook">
					<a href="http://freewebsitetemplates.com/go/facebook/">facebook</a>
				</li>
				<li class="googleplus">
					<a href="http://freewebsitetemplates.com/go/googleplus/">googleplus</a>
				</li>
			</ul>
			<p>
				&copy; Copyright 2012. All rights reserved
			</p>
		</div>
	</div>
</body>
</html>