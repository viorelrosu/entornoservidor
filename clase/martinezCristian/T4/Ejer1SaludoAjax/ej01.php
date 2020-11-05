<html>
<head>
<meta charset="utf-8">
<script type="text/javascript">
	var x;
	function accionAJAX() {
		texto = x.responseText;
		document.getElementById("miDiv").innerHTML=texto;
	}
	
	function miFun() {
		nombre = document.getElementById('name').value;
		x = new XMLHttpRequest();
		x.open('GET', 'ej01Ajax.php?nombre='+nombre, true);
		x.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		x.send();
		x.onreadystatechange = function() {
			if (x.readyState==4 && x.status==200) {
				accionAJAX();
			}
		}
	}	
    </script>
</head>
<body>
	<h1>Saludator</h1>
	Nombre:
	<input type="text"  id="name">
	<div id="miDiv"></div>
	<input type="button" value="Saludar" onclick="miFun()">


</body>
</html>
<?php
