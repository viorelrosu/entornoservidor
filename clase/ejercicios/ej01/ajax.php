<?php
session_start();
$isAjax = isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ? strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] )  == 'xmlhttprequest'  : false ;

if($isAjax) {
	$palabra = isset($_REQUEST['palabra']) ? $_REQUEST['palabra'] : false;
	$enIdioma = isset($_REQUEST['enIdioma']) ? $_REQUEST['enIdioma'] : false;

	if( isset($_SESSION['diccionario']) ) {
		$palabraEncontrada = false;
		$error = true;
		$mensaje = 'No existe la palabra';

		foreach( $_SESSION['diccionario'] as $diccionario ){
			foreach($diccionario as $idioma => $traduccion) {
				if($traduccion == $palabra) {
					if($idioma == $enIdioma) {
						$mensaje = 'La palabra a traducir esta en el idioma de destino';
					} else {
						$palabraEncontrada = $diccionario[$enIdioma];
						$error = false;
						$mensajex = 'Palabra encontrada.';
					}
				}
			}
		}
	}

	if($error) {
		echo 'error#'.$mensaje;
	} else {
		echo 'success#'.$mensajex.'#'.$palabraEncontrada;
	}
} else {
	echo "Solo ejecuciones Ajax";
}

?>