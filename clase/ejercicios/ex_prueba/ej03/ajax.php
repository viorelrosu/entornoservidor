<?php
$isAjax = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ? strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] )  == 'xmlhttprequest'  : false ;

if($isAjax) {
	$response = '';
	$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

	$bdPelis = ['Star Wars', 'Titanic', 'Crepúsculo', 'Los juegos del hambre'];
	$bdCanciones = ['Let it be', 'Mediterráneo', 'Close to the edge', 'Bohemian rhapsody'
];

	$index = rand(0,3);

	if($tipo) {
		if($tipo == 'peli') {

			$response = $bdPelis[$index];

		} else {
			$response = $bdCanciones[$index];
		}
	}

	echo $response;
} else {
	echo 'Solo llamadas Ajax. Gracias.';
}