<?php
session_start();

require_once('bd.php');
require_once('util.php');

$letra = isset($_GET['letra']) && !empty($_GET['letra']) ? $_GET['letra'] : '';

$mensaje = '';

if( $letra ) {

	if( in_array($letra, $_SESSION['letrasProbadas']) ) {
		$mensaje = "La letra $letra ya se ha probado anteriormente.";
	} else {

		if ( strpos($palabra, $letra) ) {
			$mensaje = "Enhorabuena. La letra $letra existe en la palabra.";
		} else {
			//no existe
			$_SESSION['nFallos'] += 1;
			$mensaje = "Lo siento, la letra $letra no existe en la palabra.";
		}

		$_SESSION['letrasProbadas'][] = $letra;
		$_SESSION['nIntentos'] +=  1 ;
	}

} else {
	$_SESSION['letrasProbadas'] = [];
	$_SESSION['nIntentos'] = 0;
	$_SESSION['nFallos'] = 0;
}

$palabraElegida = $palabras[rand(0,2)];

echo "<h1>Bienvenido al juego.</h1>";
echo "<h2>Para empezar a jugar introduce una letra</h2>";

echo <<<HTML
<form>
<label>Introduce una letra</label>
<input type="text" name="letra" value="" style="width:50px; padding: 10px; font-size: 20px;"/>
<input type="submit" value="Probar" />
</form>
<p>$mensaje</p>
<p>
Letras probadas: {$_SESSION['letrasProbadas']}<br />
Número de Intentos: {$_SESSION['nIntentos']}<br />
Número de Fallos: {$_SESSION['nFallos']}<br />
</p>
HTML;

 ?>