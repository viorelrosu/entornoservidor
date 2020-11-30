<?php 
require_once '../db/utilDBPais.php';
require_once '../db/utilDBAficion.php';

$paises = getPaises();
$aficiones = getAllAficiones();
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
			<div class="col-8 offset-1">
				<h2>Dar de alta Persona</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-8 offset-1">
				<form action="createPost.php" method="post" >
					<div class="form-group">
						<label for="nombreP" class="font-weight-bold">Introduce Nombre</label><br />
						<input type="text" class="form-control" id="nombreP" name="nombreP" value="" />
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Introduce DNI</label><br />
						<input type="text" class="form-control" id="dni" name="dni" value="" />
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Selecciona País</label><br />
						<select name="idPais" class="form-control">
							<?php foreach($paises as $pais): ?>
								<option value="<?=$pais->id?>"><?=$pais->nombre?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Selecciona País Nacimiento</label><br />
						<select name="idPaisNacimiento" class="form-control">
							<?php foreach($paises as $pais): ?>
								<option value="<?=$pais->id?>"><?=$pais->nombre?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Selecciona País Residencia</label><br />
						<select name="idPaisResidencia" class="form-control">
							<?php foreach($paises as $pais): ?>
								<option value="<?=$pais->id?>"><?=$pais->nombre?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="idPersona" class="font-weight-bold">Selecciona aficiones</label><br />
						<?php foreach($aficiones as $aficion):?>
							<input type="checkbox" name="idAficion[]" id="id-<?=$aficion->id;?>" value="<?=$aficion->id;?>" /> <label for="id-<?=$aficion->id;?>"><?=$aficion->nombre;?></label><br />
						<?php endforeach; ?>
					</div>
					<div class="form-group">
						<label for="idAficionGusta" class="font-weight-bold">Selecciona aficiones que me gustan</label><br />
						<?php foreach($aficiones as $aficion):?>
							<input type="checkbox" name="idAficionGusta[]" id="idg-<?=$aficion->id;?>" value="<?=$aficion->id;?>" /> <label for="idg-<?=$aficion->id;?>"><?=$aficion->nombre;?></label><br />
						<?php endforeach; ?>
					</div>
					<div class="form-group">
						<label for="idAficionOdia" class="font-weight-bold">Selecciona aficiones que me gustan</label><br />
						<?php foreach($aficiones as $aficion):?>
							<input type="checkbox" name="idAficionOdia[]" id="ido-<?=$aficion->id;?>" value="<?=$aficion->id;?>" /> <label for="ido-<?=$aficion->id;?>"><?=$aficion->nombre;?></label><br />
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