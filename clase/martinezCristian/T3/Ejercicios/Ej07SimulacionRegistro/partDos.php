<?php
session_start();

if (isset($_GET['grabar'])){
$nombre = isset($_GET['nombre'])? $_GET['nombre'] : null;
$apellido = isset($_GET['apellido'])? $_GET['apellido'] : null;
$fecha = isset($_GET['fecha'])? $_GET['fecha'] : null;
$nacionalidades = isset($_GET['paises'])? $_GET['paises'] : null;


$_SESSION['nombre'] = $nombre;
$_SESSION['apellido'] = $apellido;
$_SESSION['fecha'] = $fecha;
$_SESSION['paises'] = $nacionalidades;
}

function formularioDos() {
    

    
    if (isset($_SESSION['departamento'])){
        switch ($_SESSION['departamento']){
            case "marketing": $M = "selected=\"selected\"";break;
            case "finanzas": $F = "selected=\"selected\"";break;
            case "desarrollo": $D = "selected=\"selected\"";break;
            case "investigacion": $I = "selected=\"selected\"";break;
            default: $M=""; $F ="";$D="";$I="";
        }
    }
    
    $salario = isset($_SESSION['salario']) ? "value=\"{$_SESSION['salario']}\"" : "";
    $area = isset($_SESSION['area']) ? "{$_SESSION['area']}" : "";
    
   echo <<< HTML
<head>
	<style type="text/css">
	  #img1{
	  opacity: 0.5;
	  }
	  
	  #img3{
	  opacity: 0.5;
	  }
	  #img4{
	  opacity: 0.5;
	  }
	   
	
	</style>
</head>
<body>
<a title="boton1" href="partUno.php"><img id="img1" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-1-icon.png" width="50" height="50"></a>
<a title="boton2" href="partDos.php"><img id="img2" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-2-icon.png" width="50" height="50"></a>
<a title="boton3" href="parttres.php"><img id="img3" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-3-icon.png" width="50" height="50"></a>
<a title="boton4" href="resumen.php"><img id="img4" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/12635.png" width="50" height="45"></a>

<fieldset>
	<legend>Datos Profesionales</legend>
	<form action="partTres.php">	
	<label for="nacio"><b>Nacionalidades &nbsp;&nbsp;</b></label>
HTML;
echo	"<select id=\"dep\" name=\"departamento\">";
echo 		"<option value=\"marketing\" $M>Marketing</option>";
echo		"<option value=\"finanzas\" $F>Finanzas</option>";
echo 		"<option value=\"desarrollo\" $D>Desarrollo</option>";	
echo 		"<option value=\"investigacion\" $I>Investigación</option>";
echo 	"</select><br>";
	
echo 	"<label for=\"salario\"><b>Salario &nbsp;&nbsp;</b></label><input type=\"text\" name=\"salario\" id=\"salario\" $salario><br>";
	
echo 	"<label for=\"area\"><b>Comentario&nbsp;&nbsp;</b></label><textarea rows=\"3\" cols=\"50\" id=\"area\" name=\"area\"  placeholder=\"Deje su comentario\">$area</textarea><br>";

echo <<< HTML

	<input type="submit" name="grabar" value="Grabar información e ir al paso 3 - Datos bancarios">
	</form>
</fieldset>
</body>
HTML;
   ;
}


formularioDos();
























?>