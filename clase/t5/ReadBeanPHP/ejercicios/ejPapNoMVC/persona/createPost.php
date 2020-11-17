<?php

require_once '../db/utilDBPersona.php';
require_once '../db/util.php';

$nombreP = isset($_POST['nombreP']) ? $_POST['nombreP'] : null;
$dni = isset($_POST['dni']) ? $_POST['dni'] : null;
$idPais = isset($_POST['idPais']) ? $_POST['idPais'] : null;
$html = '';
if($nombreP != null and $dni != null) {
	if(insertar($nombreP, $dni, $idPais)) {
		header('Location: createPostOK.php?nombreP='.$nombreP);
	} else {
		$html = "El DNI de la Persona no se puede repetir.";
	};
} else {
	if($nombreP == null) {
		$html = "El nombre de la Persona no puede ser null.";
	}
	if($dni == null) {
		$html = "El DNI de la Persona no puede ser null.";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Persona</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3">
				<h2>Dar de alta Persona</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="alert alert-danger">
					<?= $html; ?><br />
					<hr />
					<a href="createGet.php" class="btn btn-secondary">Volver</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>