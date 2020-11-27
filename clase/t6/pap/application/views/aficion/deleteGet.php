<?php

require_once '../db/utilDBAficion.php';
require_once '../db/util.php';

$id = isset($_POST['id']) ? $_POST['id'] : null;

$html = '';
if($id != null) {
	$aficion = getAficionById($id);
	if($aficion) {
		$html = getHtmlAlert('warning',"¿Estás seguro de eliminar esta afición? {$aficion->nombre}",['Dar de baja','deletePost.php?id='.$aficion->id,'btn-danger']);
	} else {
		$html = getHtmlAlert('danger',"No existe la Afición con este ID.",['Volver','aficiones.php']);
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
	<title>Baja Afición</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-8 offset-1">
				<h2>Dar de baja Afición</h2>
			</div>
		</div>
		<?= $html; ?>
		<div class="row mt-5">
			<div class="col-8 offset-1">
				<hr>
				<a href="aficiones.php" class="btn btn-secondary">Volver</a>
			</div>
	</div>
</body>
</html>