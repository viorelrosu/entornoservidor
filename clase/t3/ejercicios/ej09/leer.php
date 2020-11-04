<?php
session_start();

require_once 'util.php';

$userRemitente = ( isset( $_REQUEST['remitente'] ) ? $_REQUEST['remitente'] : false );
$accion = ( isset( $_REQUEST['accion'] ) ? $_REQUEST['accion'] : false );
$indice = ( isset( $_REQUEST['indice'] ) ? $_REQUEST['indice'] : false );

if( !$userRemitente ) {
	header('Location: ' . 'listaUsuarios.php');
}

$mensaje = [ 'info', 'No te pierdas tus mensajes'];
if( $accion == 'borrar' && ( $indice || $indice == 0 ) ) {
	unset($_SESSION['usuarios'][$_SESSION['_activo']]['mensajes'][$indice]);
	$mensaje = [ 'success', 'El mensaje se ha eliminado correctamente!'];
}

$html = getHtmlCorreosContent( $userRemitente );

echo <<<HTML
<body style="padding: 20px;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
HTML;

echo getHtmlTitle('Mensajes de ' . $userRemitente);

echo <<<HTML
<div class="row">
	<div class="col-md-4 offset-md-4">
		<div class="alert alert-$mensaje[0]" role="alert">$mensaje[1]</div>
		$html
		<a href="listaUsuarios.php" class="btn btn-secondary">Volver</a>
	</div>
</div>

</body>
HTML;

echo getHtmlFooter();

echo <<<HTML
</body>
HTML;

//var_dump($_SESSION);

?>
