<head>
<meta charset="utf-8">
<script type="text/javascript">
	var conexion;
    	function accionAJAX() {
    		textoRecibido = conexion.responseText;
    		document.getElementById("palabraDiv").innerHTML=textoRecibido;
    	}
    	
    	function miFun() {
    		conexion = new XMLHttpRequest();
    		var palabra = document.getElementById("palabra").value;
    		var lengua = document.getElementById("lengua").value;
    		conexion.open('GET', 'parteAjax.php?palabra='+palabra+'&lengua='+lengua, true);
    		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    		conexion.send();
    		conexion.onreadystatechange = function() {
    			if (conexion.readyState==4 && conexion.status==200) {
    				accionAJAX();
    			}
    		}
    	}
	
</script>

<style type="text/css">
div {
	display: inline-block;
}
</style>
</head>

<?php
session_start();

echo <<< html
<h1>TRADUCCION DE PALABARAS</h1>

PALABRA <input type="text" id="palabra"> <br>

TRADUCCION <div id="palabraDiv"> <input type="text" ></div> <br>

<input type="button" value="Traducir al" onClick="miFun()" > 

<select id="lengua">
    <option  value="espaniol">Español</option>
    <option  value="ingles">Ingles</option> 
    <option  value="frances">Frances</option>
</select>
<br><br>
<a href="index.php">Volver al inicio </a>
html;
//print_r($_SESSION['diccionario']);
?>