<?php
	require_once '../db/utilDBPersona.php';
	require_once '../db/utilDBAficion.php';
	require_once '../db/utilDBPais.php';
	require_once '../db/util.php';

	$paises = getPaises();
	$aficiones = getAllAficiones();

	$id = isset($_POST['id']) ? $_POST['id'] : null;
	$persona = '';
	if($id != null) {
		$persona = getById($id);
		$personaAficiones = personaAficionesToIdsArray($persona, $persona->sharedAficionList);
		$personaAficionesGusta = personaAficionesToIdsArray($persona, $persona->ownGustaList);
		$personaAficionesOdia = personaAficionesToIdsArray($persona, $persona->ownOdiaList);
	} else {

	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Persona</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-8 offset-1">
				<h2>Modificar Persona</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-8 offset-1">
				<form action="updatePost.php" method="post" >
					<input type="hidden" name="id" value="<?= $persona->id; ?>" />
					<div class="form-group">
						<label for="nombreP" class="font-weight-bold">Introduce Nombre</label><br />
						<input type="text" class="form-control" id="nombreP" name="nombreP" value="<?= $persona->nombre; ?>" />
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Introduce DNI</label><br />
						<input type="text" class="form-control" id="dni" name="dni" value="<?= $persona->dni; ?>" />
					</div>
					<div class="form-group">
						<label for="idPais" class="font-weight-bold">Selecciona País</label><br />
						<select name="idPais" class="form-control">
							<?php foreach($paises as $pais): ?>
								<option value="<?=$pais->id?>" <?php echo ($persona->pais_id == $pais->id)? 'selected':''?>><?=$pais->nombre;?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="idPaisNacimiento" class="font-weight-bold">Selecciona País Nacimiento</label><br />
						<select name="idPaisNacimiento" class="form-control">
							<?php foreach($paises as $pais): ?>
								<option value="<?=$pais->id?>" <?php echo ($persona->pais_nacimiento_id == $pais->id)? 'selected':''?>><?=$pais->nombre;?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="idPaisResidencia" class="font-weight-bold">Selecciona País Residencia</label><br />
						<select name="idPaisResidencia" class="form-control">
							<?php foreach($paises as $pais): ?>
								<option value="<?=$pais->id?>" <?php echo ($persona->pais_residencia_id == $pais->id)? 'selected':''?>><?=$pais->nombre;?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Selecciona Aficiones</label><br />
							<?php
								foreach($aficiones as $aficion):
								$checked = (in_array($aficion->id, $personaAficiones)) ? 'checked="checked"' : '';
							?>
								<input type="checkbox" name="idAficion[]" value="<?=$aficion->id?>" id="id-<?=$aficion->id?>" <?=$checked;?> /> <label for="id-<?=$aficion->id;?>"><?=$aficion->nombre?></label><br />
							<?php endforeach; ?>
					</div>
					<div class="form-group">
						<label for="idAficionGusta" class="font-weight-bold">Selecciona Aficiones que me gustan</label><br />
							<?php
								foreach($aficiones as $aficion):
								$checked = (in_array($aficion->id, $personaAficionesGusta)) ? 'checked="checked"' : '';
							?>
								<input type="checkbox" name="idAficionGusta[]" value="<?=$aficion->id?>" id="id-<?=$aficion->id?>" <?=$checked;?> /> <label for="id-<?=$aficion->id;?>"><?=$aficion->nombre?></label><br />
							<?php endforeach; ?>
					</div>
					<div class="form-group">
						<label for="idAficionOdia" class="font-weight-bold">Selecciona Aficiones que odio</label><br />
							<?php
								foreach($aficiones as $aficion):
								$checked = (in_array($aficion->id, $personaAficionesOdia)) ? 'checked="checked"' : '';
							?>
								<input type="checkbox" name="idAficionOdia[]" value="<?=$aficion->id?>" id="id-<?=$aficion->id?>" <?=$checked;?> /> <label for="id-<?=$aficion->id;?>"><?=$aficion->nombre?></label><br />
							<?php endforeach; ?>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="submit" value="Guardar" class="btn btn-primary"/>
						</div>
						<div class="form-group col-md-6 text-right">
							<a href="personas.php" class="btn btn-secondary"/>Volver</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>