<?php

require_once '../db/utilDBPersona.php';
require_once '../db/util.php';

$id = isset($_POST['id']) ? $_POST['id'] : null;

$html = '';
if($id != null) {
	$persona = getById($id);
	if($persona) {
		$html = getHtmlAlert('warning',"¿Estás seguro de eliminar este país? {$persona->nombre}",['Dar de baja','deletePost.php?id='.$persona->id]);
	} else {
		$html = getHtmlAlert('danger',"No existe el País con este ID.",['Volver','paises.php']);
	}
} else {
	$html = getHtmlAlert('danger',"Necesitamos un ID.",[]);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Baja Persona</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-8 offset-1">
				<h2>Dar de baja Persona</h2>
			</div>
		</div>
		<?= $html; ?>
		<div class="row mt-5">
			<div class="col-8 offset-1">
				<hr>
				<a href="personas.php" class="btn btn-secondary">Volver</a>
			</div>
	</div>
</body>
</html>