<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script>
		var x;
		
		function accionAjax(){
			var text = x.responseText;
			document.getElementById('myDiv').innerHTML = x.responseText;
		}
		
		function miFunction(){
			x = new XMLHttpRequest();
			x.open("GET","ajax.php",true);
			x.setRequestHeader('X-Requested-With','XMLHttpRequest');
			x.send();
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
	<div id="myDiv" ><h2>Texto cambiante</h2></div>
	<button onClick="miFunction()" >Cambiar</button>
	<?php ?>
</body>
</html>

