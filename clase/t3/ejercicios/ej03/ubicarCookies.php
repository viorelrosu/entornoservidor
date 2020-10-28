<?php 

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : false ;
$valor = isset($_GET['valor']) ? $_GET['valor'] : false ;
$nivel = isset($_GET['nivel']) ? $_GET['nivel'] : false ;

function getRuta($nivel) {
	$rutaBase = pathinfo($_SERVER['REQUEST_URI'])['dirname'];
	$ruta = '';

	switch ($nivel) {
		case 0:
			$ruta = $rutaBase.'/';
			break;

		case 1:
			$ruta = $rutaBase.'/uno/';
			break;

		case 2:
			$ruta = $rutaBase.'/uno/dos/';
			break;

		default:
			$ruta = $rutaBase.'/';
			break;
	}
	return $ruta;
}

if ($nombre != null && $valor != null && $nivel != null) { 
	$ruta = getRuta($nivel);
	setcookie ( $nombre, $valor, 0, $ruta );
	echo "<h1>Establecida cookie $nombre=$valor en ruta $ruta</h1>";
} else {

	if ($nombre==null) {
		echo "El nombre no puede ser nulo<br/>";
	}

	if ($valor==null) {
		echo "El valor no puede ser nulo<br/>";
	}

	if ($nivel==null) {
		echo "El nivel no puede ser nulo<br/>";
	}
}

echo "<a href=\"index.php\">Volver a inicio</a>";

?>