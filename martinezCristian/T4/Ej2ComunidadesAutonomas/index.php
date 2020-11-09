<html>
<head>
<meta charset="utf-8">
<script type="text/javascript">
	var conexion;
	function accionAJAX() {
		textoRecibido = conexion.responseText;
		document.getElementById("miDiv").innerHTML=textoRecibido;
	}
	
	function miFun() {
		nombre = document.getElementById('ccaa').value;
		conexion = new XMLHttpRequest();
		conexion.open('GET', 'parteAjax.php?ccaa='+nombre, true);
		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
		conexion.send();
		conexion.onreadystatechange = function() {
			if (conexion.readyState==4 && conexion.status==200) {
				accionAJAX();
			}
		}
	}	
</script>				
</head>
<body>
	<h1>Comunidades autónomas</h1>
	CCAA: 
	<select id="ccaa" name="ccaa" onChange="miFun()">
		<!--option>Seleccione una CCAA...</option-->
		<option value="Andalucia">Andalucia</option>
		<option value="Aragon">Aragón</option>
		<option value="Asturias (Principado de)">Asturias</option>
		<option value="Canarias">Canarias</option>
		<option value="Cantabria">Cantabria</option>
		<option value="Castilla y Leon">Castilla y Leon</option>
		<option value="Castilla-La Mancha">Castilla-La Mancha</option>
		<option value="Catalunia">Cataluña</option>
		<option value="Ceuta (Ciudad de)">Ceuta</option>
		<option value="Cantabria">Cantabria</option>
		<option value="Comunidad Valenciana">Comunidad Valenciana</option>
		<option value="Galicia">Galicia</option>
		<option value="Islas Baleares">Islas Baleares</option>
		<option value="Madrid (Comunidad de)">Madrid</option>
		<option value="Melilla (Ciudad de)">Melilla</option>
		<option value="Murcia (Región de)">Murcia</option>
		<option value="Navarra (Comunidad Foral de)">Navarra</option>
		<option value="País Vasco">País Vasco</option>
		<option value="Rioja (La)">Rioja</option>
	</select><br/>
	<div id="miDiv">
	</div>
	<h3>Escoge una comunidad autónoma</h3>
</body>
</html>

<?php
