<?php
session_start();
require_once 'util.php';

$user = ( isset($_REQUEST['user']) ? $_REQUEST['user']: null );
$pass = ( isset($_REQUEST['pass'] ) ? $_REQUEST['pass'] : null );

$sinLogin = ($user==null && $pass==null);
$isSession = isset( $_SESSION['_session'] ) ?  $_SESSION['_session'] : false;

$credencialesCorrectas = isset ( $bdUsuarios[$user] ) && $bdUsuarios[$user] == $pass;

if( $sinLogin && !$isSession) {
	header('Location: '.'index.php');
} else {
	$html = <<<HTML
		<div class="row">
			<div class="col-md-6 offset-md-3">
				Some code
			</div>
		</div>
	HTML;

	$htmlTitle = getHtmlTitle('Iniciar sesión',true,false);

	if ( $isSession ) {
		$mensaje = ['info', 'Bienvenido ' . $_SESSION['_activo'],'idBienvenida' ];
	} else {

		if ($credencialesCorrectas) {
			//sesion valida
			$mensaje = ['info', 'Bienvenido ' . ( $user ? $user : $_SESSION['_activo']),'idBienvenida' ];
			$_SESSION['_activo'] = $user;
			$_SESSION['_recordar'] = ( isset($_REQUEST['recordar'] ) ? true : false );
			$_SESSION['_session'] = true;

			$htmlTitle = getHtmlTitle('Iniciar sesión',true,true);

		} else {
			//sesión invalida
			$mensaje = ['danger', 'Los datos introducidos no son correctos.','idError'];
			header('Refresh: 3; URL=index.php');

			$html = getHtmlBoton('Volver','index.php','btn btn-secondary','idVolver');
		}
	}
}

echo <<<HTML
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio Sesión</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo $htmlTitle;

echo getHtmlAlert($mensaje[0],$mensaje[1], $mensaje[2]);

echo $html;

echo getHtmlFooter('Iniciar Sesión');

echo <<<HTML
</div>
</body>
HTML;

var_dump($_SESSION);

?>