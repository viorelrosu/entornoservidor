<?php
$isAjax = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ? strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] )  == 'xmlhttprequest'  : false ;

if($isAjax) {
	$response = 'ajax funciona';
	$tipo = isset($_GET['tipo']) ? $_GET['tipo'] : '';

	echo $response;
} else {
	echo 'Solo llamadas Ajax. Gracias.';
}

?>