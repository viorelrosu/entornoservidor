<?php
	require_once '../db/utilDBPais.php';
	require_once '../db/util.php';

	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$pais = '';
	if($id != null) {
		$pais = getPaisById($id);
	} else {

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update País</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-8 offset-1">
				<h2>Modificar País</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-8 offset-1">
				<form action="updatePost.php" method="post" >
					<input type="hidden" name="id" value="<?= $pais->id; ?>" />
					<div class="form-group">
						<label for="nombreP" class="font-weight-bold">Introduce País</label><br />
						<input type="text" class="form-control" id="nombreP" name="nombreP" value="<?= $pais->nombre; ?>" />
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="submit" value="Guardar" class="btn btn-primary"/>
						</div>
						<div class="form-group col-md-6 text-right">
							<a href="../index.php" class="btn btn-secondary"/>Volver</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>