
<?php
require_once '../db/utilDBPersona.php';
require_once '../db/util.php';

$personas = getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>P.A.P.</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="../css/all.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-12">
				<h1>Aplicación P.A.P</h1>
				<h3>Listado Personas</h3>
				<hr />
				<div class="text-right">
					<a href="createGet.php" class="btn btn-primary">Crear</a>
				</div>

				<table class="table table-striped mt-5">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Persona</th>
				      <th scope="col">DNI</th>
				      <th scope="col">País</th>
				      <th scope="col">País Nacimiento</th>
				      <th scope="col">País Residencia</th>
				      <th scope="col">Aficiones</th>
				      <th scope="col">Aficiones Gustan</th>
				      <th scope="col">Aficiones Odio</th>
				      <th scope="col" class="text-right">Acción</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		foreach($personas as $persona):
				  			$sharedAficiones = $persona->sharedAficionList;
				  			$gustaAficiones = $persona->ownGustaList;
				  			$odiaAficiones = $persona->ownOdiaList;

				  			if( count($sharedAficiones) == 0 ) {
				  				$htmlSharedAficiones = '<span class="badge badge-pill badge-danger">&times;</span>';
				  			} else {
				  				$htmlSharedAficiones = getBeansToStringByNombre($sharedAficiones);
				  			}

				  			if( count($gustaAficiones) == 0 ) {
				  				$htmlAficionesGusta = '<span class="badge badge-pill badge-danger">&times;</span>';
				  			} else {
				  				$htmlAficionesGusta = getBeansToStringByAficionNombre($gustaAficiones);
				  			}

				  			if( count($odiaAficiones) == 0 ) {
				  				$htmlAficionesOdio = '<span class="badge badge-pill badge-danger">&times;</span>';
				  			} else {
				  				$htmlAficionesOdio = getBeansToStringByAficionNombre($odiaAficiones);
				  			}
				  	?>
				  		<tr>
				  			<td><?= $persona->id; ?></td>
				  			<td><?= $persona->nombre; ?></td>
				  			<td><?= $persona->dni; ?></td>
				  			<td><?= (($persona->pais_id != null) ? $persona->pais->nombre : '--' ); ?></td>
				  			<td><?= (($persona->pais_nacimiento_id != null) ? $persona->fetchAs('pais')->pais_nacimiento->nombre : '--' ); ?></td>
				  			<td><?= (($persona->pais_residencia_id != null) ? $persona->fetchAs('pais')->pais_residencia->nombre : '--' ); ?></td>
				  			<td><?= $htmlSharedAficiones; ?></td>
				  			<td><?= $htmlAficionesGusta; ?></td>
				  			<td><?= $htmlAficionesOdio; ?></td>
				  			<td class="text-right" width="100">
				  				<form action="updateGet.php" method="post" id="formAccion-<?=$persona->id;?>" >
				  					<input type="hidden" name="id" value="<?= $persona->id; ?>">
				  				</form>

				  				<button class="btn btn-info btn-sm" onclick="accion(<?= $persona->id; ?>,'updateGet.php');"><i class="fas fa-edit"></i></button>
				  				<button class="btn btn-danger btn-sm" onclick="accion(<?= $persona->id; ?>,'deleteGet.php');"><i class="fas fa-trash"></i></button>
				  			</td>
				  		</tr>
				  	<?php endforeach; ?>
				  </tbody>
				</table>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-12">
				<hr>
				<a href="../index.php" class="btn btn-secondary">Volver a Menu</a>
			</div>
		</div>
	</div>
	<script>
		function accion(id, tipo) {
			var form = document.getElementById('formAccion-'+id);
			form.action=tipo;
			form.submit();
		}
	</script>
</body>
</html>