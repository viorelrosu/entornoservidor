<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script type="text/javascript">
		var x;

		function accionAjax(){
			var response = x.responseText;
			document.getElementById('miDiv').innerHTML = response;
		}

		function peticionAjax(){
			var nombre = document.getElementById('nombre').value;
			x = new XMLHttpRequest();
			x.open('GET','ej01Ajax.php?nombre='+nombre,true);
			x.setRequestHeader('X-Requested-With','XMLHttpRequest');
			x.send();

			x.onreadystatechange = function (){
				if(x.readyState==4 && x.status==200) {
					accionAjax();
				}
			}
		}
	</script>
</head>
<body>
	<h2>Saludador</h2>
	<label>Introduce tu nombre</label><br />
	<input type="text" name="nombre" id="nombre" value="" /><br /><br />
	<button onClick="peticionAjax()">Saludar</button>
	<div id="miDiv"></div>
</body>
</html>