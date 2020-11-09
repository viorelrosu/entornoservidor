<?php
session_start();

if (isset($_GET['grabar'])) {
    $banco = isset($_GET['banco']) ? $_GET['banco'] : null;
    $_SESSION['banco'] = $banco;
}

function formularioCuatro()
{
    echo <<< HTML
<head>
	<style type="text/css">
	  #img1{
	  opacity: 0.5;
	  }
	  
	  #img2{
	  opacity: 0.5;
	  }
	  #img3{
	  opacity: 0.5;
	  }
	   
	
	</style>
</head>
<body>
<a title="boton1" href="partUno.php"><img id="img1" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-1-icon.png" width="50" height="50"></a>
<a title="boton2" href="partDos.php"><img id="img2" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-2-icon.png" width="50" height="50"></a>
<a title="boton3" href="partTres.php"><img id="img3" src="http://icons.iconarchive.com/icons/custom-icon-design/flatastic-4/512/Number-3-icon.png" width="50" height="50"></a>
<a title="boton4" href="resumen.php"><img id="img4" src="https://dbdzm869oupei.cloudfront.net/img/sticker/preview/12635.png" width="50" height="45"></a>
</body>
HTML
;
    
}

formularioCuatro();

// =============================== PARTE DATOS PERSONALES ==========================================
echo "<fieldset><legend>Datos Personales</legend>";
echo $nombre = isset($_SESSION['nombre']) ? "Nombre: " . $_SESSION['nombre'] . "<br>" : "Nombre: Desconodido<br>";
echo $apellido = isset($_SESSION['apellido']) ? "Apellido: " . $_SESSION['apellido'] . "<br>" : "Apellido: Desconocido<br>";
echo $fecha = isset($_SESSION['fecha']) ? "Fecha de nacimiento: " . $_SESSION['fecha'] . "<br>" : "Fecha: Desconocida<br>";
if (isset($_SESSION['paises'])) {
    echo "Nacionalidad: ";
    foreach ($_SESSION['paises'] as $paises) {
        echo $paises . " ";
    }
} else {
    echo "Nacionalidad: Desconocida<br>";
}
echo "</fieldset>";

// =============================PARTE DATOS PROFESIONALES ===============================================

echo "<fieldset><legend>Datos Profesionales</legend>";
echo $departamento = isset($_SESSION['departamento']) ? "Departamento: " . $_SESSION['departamento'] . "<br>" : "Departamento: Desconocido<br>";
echo $salario = isset($_SESSION['salario']) ? "Salario: " . $_SESSION['salario'] . "<br>" : "Salario: Desconocido<br>";
echo $comentario = isset($_SESSION['area']) ? "Comentario: " . $_SESSION['area'] . "<br>" : "Comentario: Desconocido<br>";
echo "</fieldset>";

// =========================== PARTE DATOS BANCARIOS ===========================================

echo "<fieldset><legend>Datos Bancarios</legend>";
echo $banco = isset($_SESSION['banco']) ? "Cuenta corriente: " . $_SESSION['banco'] . "<br>" : "Cuenta corriente: Desconocida<br>";
echo "</fieldset>";

echo "<a href=\"partUno.php\">Volver al inicio</a>";

?>