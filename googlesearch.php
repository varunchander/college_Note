<!DOCTYPE html>
<html>
<head>
	<title>google search</title>
</head>
<body>
<script type="text/javascript">
	
function send() {
	// body...
	var text = document.getElementById("form").elements[0].value;
	//alert(text);
	var g = "https://www.google.co.in/#q=";
	var search = g.concat(text);
	//alert(search);
	window.open(search);
}


</script>

<form id="form" onsubmit="send()">
<input type="text" name="search" id="text" placeholder="google search" />
<!--<input class="btn btn-lg btn-success btn-block" type="submit" value="Google it">-->
</form>
</body>
</html>