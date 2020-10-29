<?php
$isAjax = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ? strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] == 'xmlhttprequest' ) : false ;

// if($isAjax) {
	$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : 'Desconocido';
	if($nombre) {
		$num = rand(1,3);
		$mensaje = '';

		switch($num) {
			case 1:
				$mensaje = 'Hola ' . $nombre;
				break;
			case 2:
				$mensaje = 'Qué tal estás ' . $nombre;
				break;
			case 3:
				$mensaje = '¡Qué pasa ' .$nombre . '!';
				break;
		}
		$num = rand(1,3);
		switch($num) {
			case 1:
				echo "<h1>$mensaje</h1>";
				break;
			case 2:
				echo "<h2>$mensaje</h2>";
				break;
			case 3:
				echo "<h3>$mensaje</h3>";
				break;
		}
	} else {
		echo "<h2>No viene el nombre</h2>";
	}

// } else {
//     echo "Solo ejecuciones Ajax";
// }

?>