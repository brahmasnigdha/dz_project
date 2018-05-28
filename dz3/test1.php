<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>The XMLHttpRequest Object</h1>

	<p id="demo">Let AJAX change this text.</p>

	<button type="button" onclick="loadDoc()">Change Content</button>

	<script type="text/javascript">
		
      function loadDoc(){
      	var xhttp;
      	if(window.XMLHttpRequest)
      	{
      		//code for modern browsers
      		xhttp = new XMLHttpRequest();
      	}
      	else
      	{
      		//code for IE6, IE5
      		xhttp = new ActiveXObject("Microsoft.XMLHTTP");
      	}
      	xhttp.onreadystatechange = function(){
      		if(this.readyState == 4 && this.status == 200)
      		{
      			document.getElementById("demo").innerHTML = this.responseText;
      		}
      	};
      	xhttp.open("GET","data.txt",true);
      	xhttp.send();
      }

	</script>
</body>
</html>