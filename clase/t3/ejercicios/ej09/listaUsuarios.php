<?php
session_start();

require_once 'util.php';

$user = ( isset($_REQUEST['user']) ? $_REQUEST['user']: null );
$pass = ( isset($_REQUEST['pass'] ) ? $_REQUEST['pass'] : null );
$recordar = ( isset($_REQUEST['recordar'] ) ? true : false );

$sinLogin = ($user==null && $pass==null);
$isSession = isset( $_SESSION['_session'] ) ?  $_SESSION['_session'] : false;

if( $sinLogin && !$isSession) {
	header('Location: '.'login.php');
} else {
	if ( $isSession ) {
		$mensaje = ['info', 'Bienvenido '.$_SESSION['_activo'] ];
	} else {
		$validUser = ( in_array( $user, array_keys( $_SESSION['usuarios'] ) ) );
		$validPass = ( $validUser && $_SESSION['usuarios'][$user]['pwd'] == $pass );
		if( $validUser && $validPass ) {
			//sesion valida
			$mensaje = ['info', 'Bienvenido '.$user];
			$isSession = true;
			$_SESSION['_activo'] = $user;
			$_SESSION['_recordar'] = $recordar;
			$_SESSION['_session'] = true;

		} else {
			//sesión invalida
			$mensaje = ['danger', 'Lo siento, los datos no son correctos. Intentalo de nuevo.'];
			header('Refresh: 3; URL=login.php');
		}
	}

	$htmlCorreos = getHtmlUsuariosCorreos();

}

echo <<<HTML
<body style="padding: 20px;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
HTML;

if(!$isSession) {

	echo getHtmlTitle('Iniciar sesión');

	echo <<<HTML
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<div class="alert alert-$mensaje[0]" role="alert">
		  		$mensaje[1]
			</div>
		</div>
	</div>
	HTML;
} else {

	echo getHtmlTitle('Usuarios / Mensajes', true);

	echo <<<HTML
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<div class="alert alert-$mensaje[0]" role="alert">
		  		$mensaje[1]
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 offset-md-4">
			$htmlCorreos
		</div>
	</div>
	HTML;
}

echo getHtmlFooter();

echo <<<HTML
</body>
HTML;

?>
