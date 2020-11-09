<?php
session_start();



function formularioUno() {
    
    //parte de verificar si existe las sessions
    $valorN = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : "";
    $valorA = isset($_SESSION['apellido']) ? $_SESSION['apellido'] : "";
    $valorF = isset($_SESSION['fecha']) ? $_SESSION['fecha'] : "";
     
    if(isset($_SESSION['paises'])){
        foreach ($_SESSION['paises'] as $pais){
            switch ($pais){
                case "Española": $valorES = "selected=\"selected\"";break;
                case "Francesa": $valorFR = "selected=\"selected\"";break;
                case "Italiana": $valorIT = "selected=\"selected\"";break;
                case "Portuguesa": $valorPT = "selected=\"selected\"";break;
                default: $valorES = ""; $valorFR=""; $valorIT=""; $valorPT="";break;
            }
        }
    }
        //$_SESSION['nombre'] = $valorN;
        
    //parte fija del html
    echo <<< HTML
<head>
	<style type="text/css">
	  #img2{
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
<a title="boton3" href="partTres.php"><img id="img3" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-3-icon.png" width="50" height="50"></a>
<a title="boton4" href="resumen.php"><img id="img4" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/12635.png" width="50" height="45"></a>
<fieldset>
	<legend>Datos Personales</legend>
	<form action="partDos.php">
HTML;
    //parte del html que varia en funcion de si existe
echo	"<label for=\"nombre\"><b>Nombre &nbsp;&nbsp;</b> </label><input type=\"text\" name=\"nombre\" id=\"nombre\" value=\"".$valorN."\">&nbsp;&nbsp;";
echo 	"<label for=\"apellido\"><b>Apellido &nbsp;&nbsp;</b> </label><input type=\"text\" name=\"apellido\" id=\"apellido\" value=\"" .$valorA. "\"><br>";
	
echo 	"<label for=\"fecha\"><b>Fecha de nacimiento &nbsp;&nbsp;</b> </label><input type=\"date\" name=\"fecha\" id=\"fecha\" value=\"".$valorF."\"><br>";
	
echo 	"<b>Genero -> &nbsp;&nbsp;</b> <label for=\"mujer\"><b>Mujer</b></label><input type=\"radio\" name=\"genero\" id=\"mujer\">&nbsp;&nbsp;";
echo	"<label for=\"hombre\"><b>Hombre</b></label><input type=\"radio\" name=\"genero\" id=\"hombre\">&nbsp;&nbsp;";
echo	"<label for=\"binario\"><b>Binario</b></label><input type=\"radio\" name=\"genero\" id=\"binario\"><br>";
	
echo	"<label for=\"estado\"><b>Casado o Pareja de hecho</b></label><input type=\"checkbox\" id=\"estado\" name=\"estado[]\">&nbsp;&nbsp;";
echo	"<label for=\"hijos\"><b>Hijos</b></label><input type=\"checkbox\" id=\"hijos\" name=\"estado[]\"><br>";
	
echo	"<label for=\"nacio\"><b>Nacionalidades &nbsp;&nbsp;</b></label>";
echo	"<select id=\"nacio\" name=\"paises[]\" multiple>";
echo		"<option value=\"Española\"".$valorES.">España</option>";
echo		"<option value=\"Francesa\"".$valorFR.">Francesa</option>";
echo		"<option value=\"Italiana\"".$valorIT.">Italiana</option>	";
echo		"<option value=\"Portuguesa\"".$valorPT.">Portuguesa</option>";
echo 	"</select><br>";
echo <<< HTML
	<input type="submit" name="grabar" value="Grabar información e ir al paso 2 - Datos profesionales">
	</form>
    </fieldset>
    </body>
HTML;
    ;
}

formularioUno();





?>