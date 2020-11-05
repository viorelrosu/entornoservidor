<html>
<head>
<meta charset="utf-8">
<script type="text/javascript">
	var conexion;
    	function accionAJAX() {
    		textoRecibido = conexion.responseText;
    		document.getElementById("divPeli").innerHTML=textoRecibido;
    	}
    	
    	function miFun1() {
    		conexion = new XMLHttpRequest();
    		conexion.open('GET', 'parteAjax.php?envio=pelicula', true);
    		conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
    		conexion.send();
    		conexion.onreadystatechange = function() {
    			if (conexion.readyState==4 && conexion.status==200) {
    				accionAJAX();
    			}
    		}
    	}

    	function accionAJAX2() {
    		textoRecibido = conexion.responseText;
    		document.getElementById("divCancion").innerHTML=textoRecibido;
    	}
    	
    	
		function miFun2() {
			conexion = new XMLHttpRequest();
			conexion.open('GET', 'parteAjax.php?envio=cancion', true);
			conexion.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
			conexion.send();
			conexion.onreadystatechange = function() {
				if (conexion.readyState==4 && conexion.status==200) {
					accionAJAX2();
				}
			}
	    }	
</script>
<style type="text/css">
    div{
    display: inline-block;
    }
</style>
</head>
<?php
echo <<< html
<input type="button" value="Peli favorita" onClick="miFun1()"> <div id="divPeli"> <input type="text"  readonly> </div><br>
<input type="button" value="Canción favorita" onClick="miFun2()"> <div id="divCancion"> <input type="text"  readonly> </div><br>
html;

?>