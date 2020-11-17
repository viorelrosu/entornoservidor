<?php

	require_once '../db/utilDBPersona.php';
	require_once '../db/util.php';

	$id = isset($_GET['id']) ? $_GET['id'] : null;
	$html = '';
	if($id != null) {
		$bean = getById($id);
		if($bean) {
			$delete = deleteBean($bean);
			header('Location: deletePostOK.php?nombreP='.$bean->nombre);
		}
	} else {
		$html = "El nombre de la Persona no puede ser null.";
	}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Baja País</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3">
				<h2>Dar de baja País</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="alert alert-danger">
					<?= $html; ?><br />
					<hr />
					<a href="paises.php" class="btn btn-secondary">Volver</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>