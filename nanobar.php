<!DOCTYPE html>
<html>
<head>
	<title>College_Note</title>
		<link rel="icon" type="image/png" href="favicon.ico">
</head>
<body>
<style>
	.bar{
		background: #ff0000;
		transition: height .5s;
	}
	.nanobar{
		height: 2px;
	}
</style>
<script type="text/javascript" src="nanobar-master/nanobar.js"></script>
<script type="text/javascript">

	var options = {
  classname: 'container',
  id: 'nanobar',
  //target: document.getElementById('myDivId')
};

var nanobar = new Nanobar( options );

// move bar
nanobar.go( 30 ); // size bar 30%
nanobar.go( 76 ); // size bar 76%

// size bar 100% and and finish
nanobar.go(100);


</script>
<div class="container">
<h1 id="nanobar">
</h1>
</div>
</body>
</html>