<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script type="text/javascript" src="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/form-serialize/serialize-0.2.min.js" ></script>
	<script>
		var x;

		function accionAjax(){
			var text = x.responseText;
			document.getElementById('myDiv').innerHTML = x.responseText;
		}

		function miFunction(){
			var datosForm = serialize(document.getElementById('idForm'));
			x = new XMLHttpRequest();
			x.open("POST","ajaxPost.php",true);
			x.setRequestHeader('X-Requested-With','XMLHttpRequest');
			x.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			x.send(datosForm);
			x.onreadystatechange = function(){
				if( x.readyState == 4 && x.status == 200 ) {
					accionAjax();
				}
			}
		}
	</script>
</head>
<body>
	<h2>Texto fijo</h2>
	<form id="idForm">
		<input type="text" name="d1" id="iD1"><br />
		<input type="text" name="d2" id="iD2"><br />
		<input type="text" name="d3" id="iD3"><br />
		<input type="text" name="d4" id="iD4"><br />
	</form>
	<div id="myDiv" ><h2>Texto cambiante</h2></div>
	<button onClick="miFunction()" >Cambiar</button>
	<?php ?>
</body>
</html>

