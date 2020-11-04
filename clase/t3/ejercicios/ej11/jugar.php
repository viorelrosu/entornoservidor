<?php
session_start();
require_once 'util.php';
require_once 'Carta.php';

$status= isset($_GET['status']) ? $_GET['status'] : 'continuar';
$mensaje = ['info', 'No te olvides de borrar sesión'];
$htmlJugadas = '';

if($status == 'pierdo') {
	$mensaje = ['danger', 'Has perdido!'];
}

if($status == 'gano') {
	$mensaje = ['success', 'Has ganado!'];
}

if( isset($_SESSION['misCartas']) and ($_SESSION['misCartas'] == []) ) {
	$mensaje = ['info', 'No se ha jugado ninguna carta todavia'];
} else {

	$htmlTds = '';
	foreach ($_SESSION['misCartas'] as $carta) {
		$carta = unserialize($carta);
		//var_dump($carta);
		$htmlTds .= '<td><img src="'. $carta->img .'" width="90" height="135"/></td>';
	}

	$htmlJugadas .= <<<HTML
		<h3>Jugada ({$_SESSION['total']} ptos.)</h3>
	<table>
	<tr>
		$htmlTds
	</tr>
	</table>
	HTML;
}

//html
echo getHtmlStart(false);

echo getHtmlTitle('Siete y media');

echo getHtmlAlert($mensaje[0],$mensaje[1]);

if($status == 'continuar') {
	echo <<<HTML
		<div class="row mb-5 mt-5">
			<div class="col-md-6 offset-md-3">
				<div class="row">
					<div class="col-md-6">
						<a href="sacarCarta.php" class="btn btn-primary">Sacar carta</a>
						<a href="plantarse.php" class="btn btn-danger">Plantarse</a>
					</div>
					<div class="col-md-6 text-right">
						<a href="index.php" class="btn btn-info push-right">Juego nuevo</a>
					</div>
				</div>
			</div>
		</div>
	HTML;
}

if($status != 'continuar') {
	echo <<<HTML
		<div class="row mb-5 mt-5">
			<div class="col-md-6 offset-md-3">
				<a href="index.php" class="btn btn-info push-right">Juego nuevo</a>
			</div>
		</div>
	HTML;
}


echo <<<HTML
<div class="row mb-5 mt-5">
		<div class="col-md-6 offset-md-3">
			$htmlJugadas
		</div>
</div>
HTML;

echo getHtmlFooter('Siete y Media');

echo getHtmlEnd();

var_dump($_SESSION);

?>