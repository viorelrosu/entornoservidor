<?php
session_start();

require_once 'util.php';

$userRemitente = $_SESSION['_activo'];
$userDestinatario = ( isset( $_REQUEST['destinatario'] ) ? $_REQUEST['destinatario'] : false );

$mensajeDe = ( isset( $_REQUEST['mensaje_de'] ) ? $_REQUEST['mensaje_de'] : false );
$mensajePara = ( isset( $_REQUEST['mensaje_para'] ) ? $_REQUEST['mensaje_para'] : false );
$mensajeMensaje = ( isset( $_REQUEST['mensaje_mensaje'] ) ? $_REQUEST['mensaje_mensaje'] : false );
$mensajeNuevo = ( $mensajeDe &&  $mensajePara && $mensajeMensaje );

if( !$userDestinatario ) {
	header('Location: ' . 'listaUsuarios.php');
}

if( $mensajeNuevo ) {
	$now = time();
	$_SESSION['usuarios'][$mensajePara]['mensajes'][] = [
		'remitente' => $_SESSION['_activo'],
		'fecha' => date("d M Y H:i:s", $now),
		'texto' => $mensajeMensaje
	];

	$html = <<<HTML
		<div class="alert alert-success" role="alert">
	  		El mensaje se ha guardado correctamente!
		</div>
		<a href="listaUsuarios.php" class="btn btn-secondary">Volver</a>
	HTML;
} else {
	$html = <<<HTML
		<form method="get" >
			<input type="hidden" name="destinatario" value="$userDestinatario" />
			<div class="form-group">
				<label for="mensaje_de">De:</label><br />
				<input type="text" class="form-control" id="mensaje_de" name="mensaje_de" value="$userRemitente" placeholder="De:" readonly="readonly" />
			</div>
			<div class="form-group">
				<label for="mensaje_para">Para:</label><br/>
				<input type="text" class="form-control" id="mensaje_para" name="mensaje_para" value="$userDestinatario" placeholder="Para:" readonly="readonly"/>
			</div>
			<div class="form-group">
				<label for="mensaje_mensaje">Escribe el contenido del mensaje:</label><br/>
				<textarea class="form-control" id="mensaje_mensaje" name="mensaje_mensaje" placeholder="Mensaje"/></textarea>
			</div>
			<div class="form-group">
				<input type="submit" value="Enviar mensaje" class="btn btn-primary"/>
				<input type="button" value="Cancelar" class="btn btn-default" onClick="location.href='listaUsuarios.php'" />
			</div>
		</form>
	HTML;
}

echo <<<HTML
<body style="padding: 20px;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
HTML;

echo getHtmlTitle('Nuevo mensaje');

echo <<<HTML
<div class="row">
	<div class="col-md-4 offset-md-4">
		$html
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
