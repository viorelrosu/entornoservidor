<?php 

require_once '../db/utilDBPersona.php';

$personas = getAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Afición</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-8 offset-1">
				<h2>Dar de alta Afición</h2>
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
						<label for="dni" class="font-weight-bold">Selecciona Personas</label><br />
						<?php foreach($personas as $persona):?>
							<input type="checkbox" name="idPersona[]" id="id-<?=$persona->id;?>" value="<?=$persona->id;?>" /> <label for="id-<?=$persona->id;?>"><?=$persona->nombre;?></label><br />
						<?php endforeach; ?>
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