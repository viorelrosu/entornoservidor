<?php
session_start();
require_once('bd.php');
require_once('util.php');

mb_internal_encoding ( "UTF-8" );

$letraAProbar = isset($_GET['letra']) && !empty($_GET['letra']) ? $_GET['letra'] : '';
$mensaje = '';
$primeraVez = ($letraAProbar == null);
$isGameOver = false;
$maxFallos = 6;

if ($primeraVez) { // Comienza el juego
	session_unset ();
	$palabraOculta = inicializarPalabraOculta ();
	$_SESSION ['palabraOculta'] = $palabraOculta;

	$palabraEnCurso = inicializarPalabraEnCurso ( mb_strlen ( $palabraOculta ) );
	$_SESSION ['palabraEnCurso'] = $palabraEnCurso;

	$letrasProbadas = '';
	$_SESSION ['letrasProbadas'] = $letrasProbadas;

	$nIntentos = 0;
	$_SESSION ['nIntentos'] = $nIntentos;

	$nFallos = 0;
	$_SESSION ['nFallos'] = $nFallos;

	$mensaje = 'BIENVENIDO. Para empezar a jugar introduce una letra';
} else {
	$palabraOculta = $_SESSION ['palabraOculta'];
	$palabraEnCurso = $_SESSION ['palabraEnCurso'];
	$letrasProbadas = $_SESSION ['letrasProbadas'];
	$nIntentos = $_SESSION ['nIntentos'] + 1;
	$_SESSION ['nIntentos'] = $nIntentos;
	$nFallos = $_SESSION ['nFallos'];

	if (existeLetra ( $letraAProbar, $letrasProbadas )) {
		// La letra ya estaba probada
		$mensaje = "La letra $letraAProbar ya la habías introducido antes";
	} else {
		// La letra NO está probada todavía
		$letrasProbadas .= (($letrasProbadas == '' ? '' : ' ') . normaliza ( $letraAProbar ));
		$_SESSION ['letrasProbadas'] = $letrasProbadas;

		if (existeLetra ( $letraAProbar, $palabraOculta )) {
			// Acertó con la letra
			$mensaje = "¡¡ACERTASTE!! La letra $letraAProbar pertenece a la palabra";
			$palabraEnCurso = actualizarPalabraEnCurso ( $palabraOculta, $palabraEnCurso, $letraAProbar );
			$_SESSION ['palabraEnCurso'] = $palabraEnCurso;

			if (existeLetra ( '-', $palabraEnCurso )) {
				// Todavía quedan letras por descubrir
				$mensaje .= '. Introduce otra letra';
			} else {
				// GANA el juego.
				$isGameOver = true;
				$mensaje .= '<br/> <h1>GANASTE</h1>';
			}
		} else {
			// Falló. La letra no estaba en la palabra original.
			$nFallos ++;
			$_SESSION ['nFallos'] = $nFallos;
			$mensaje = "Lo siento, la letra $letraAProbar no está en la palabra";
			$isGameOver = ($nFallos == $maxFallos);
			$mensaje .= ($isGameOver ? ". PERDISTE por cometer $maxFallos fallos" : '');
		}
	}
}

/* ============= */

echo <<<HTML
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
<body onload="document.getElementById('idLetra').focus();">
<h4>$mensaje</h4>
<hr>
HTML;

if(!$isGameOver) {
	echo <<<HTML
	<form action="ahorcado.php">
	<label>Introduce una letra</label>
	<input type="text" name="letra" value="" id="idLetra" style="width:50px; padding: 10px; font-size: 20px;"/>
	<input type="submit" value="Probar" style="font-size: 20px; "/>
	</form>
	HTML;
} else {
	echo <<<HTML
	<div style="margin: 20px 0px;">
	<form action="ahorcado.php">
		<input type="submit" value="Nuevo juego" style="font-size: 30px;"/>
	</form>
	</div>
	HTML;
}

echo pintarLetras ( $palabraEnCurso );


echo <<<HTML
<div style="border: 1px solid #000; padding:10px; width: 50%; margin-top: 20px;">
<!--<b>Palabra oculta</b>: $palabraOculta <br />-->
<b>Letras probadas</b>: $letrasProbadas <br />
<b>Número de Intentos</b>: $nIntentos<br />
<b>Número de Fallos</b>: $nFallos / $maxFallos<br />
</div>
HTML;

echo <<<HTML
</body>
</html>
HTML;

 ?>



