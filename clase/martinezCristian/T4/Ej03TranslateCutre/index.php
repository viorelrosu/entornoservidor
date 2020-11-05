
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
	<form>
		<img
			src="https://www.banderas-mundo.es/data/flags/emoji/openmoji/256x256/es.png"
			border="1px" width="45px" height="45px"></img><input type="radio"
			name="leng" value="ES"> <img
			src="https://www.banderas-mundo.es/data/flags/emoji/openmoji/256x256/gb.png"
			border="1px" width="45px" height="45px"></img><input type="radio"
			name="leng" value="EN"> <img
			src="https://www.banderas-mundo.es/data/flags/emoji/openmoji/256x256/fr.png"
			border="1px" width="45px" height="45px"></img><input type="radio"
			name="leng" value="FR">
		<hr>
		<div id="miDiv"></div>
	</form>
</body>
<?php
?>