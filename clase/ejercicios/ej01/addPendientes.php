<?php
session_start();

if ( !isset($_SESSION['diccionario']) ) {
	$_SESSION['diccionario'] = [];
}

if( isset( $_SESSION['pendientes'] ) ) {
	foreach($_SESSION['pendientes'] as $palabra ){
		array_push($_SESSION['diccionario'], $palabra);
	}
	unset($_SESSION['pendientes']);
	header('Location: index.php?add=pendientes');
} else {
	header('Location: index.php?error=pendientes');
}

var_dump($_SESSION);

?>