<?php
require_once '../db/utilDBPais.php';
require_once '../db/util.php';

$nombreP = isset($_POST['nombreP']) ? $_POST['nombreP'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;

$html = '';
if($nombreP != null and $id != null) {
	if(actualizarPais($id, $nombreP)) {
		header('Location: updatePostOK.php?nombreP='.$nombreP);
	} else {
		$html = "El nombre del País no se puede repetir.";
	};
} else {
	if($nombreP == null) {
		$html = "El nombre del País no puede ser null.";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modificar País</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-md-6 offset-md-3">
				<h2>Modificar País</h2>
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