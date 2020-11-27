<?php
	require_once '../db/utilDBPersona.php';
	require_once '../db/utilDBAficion.php';
	require_once '../db/util.php';

	$personas = getAll();

	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$aficion = '';
	if($id != null) {
		$aficion = getAficionById($id);
		$aficionPersonas = aficionPersonasToIdsArray($aficion);
	} else {

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Afición</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-8 offset-1">
				<h2>Modificar Afición</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-8 offset-1">
				<form action="updatePost.php" method="post" >
					<input type="hidden" name="id" value="<?= $aficion->id; ?>" />
					<div class="form-group">
						<label for="nombreP" class="font-weight-bold">Introduce Nombre</label><br />
						<input type="text" class="form-control" id="nombreP" name="nombreP" value="<?= $aficion->nombre; ?>" />
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Selecciona Personas</label><br />
							<?php
								foreach($personas as $persona):
								$checked = (in_array($persona->id, $aficionPersonas)) ? 'checked="checked"' : '';
							?>
								<input type="checkbox" name="idPersona[]" value="<?=$persona->id?>" id="id-<?=$persona->id?>" <?=$checked;?> /> <label for="id-<?=$persona->id;?>"><?=$persona->nombre?></label><br />
							<?php $checked = ''; endforeach; ?>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="submit" value="Guardar" class="btn btn-primary"/>
						</div>
						<div class="form-group col-md-6 text-right">
							<a href="aficiones.php" class="btn btn-secondary"/>Volver</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>