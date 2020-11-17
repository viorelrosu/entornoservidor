
<?php
require_once '../db/utilDBPais.php';
require_once '../db/util.php';

$paises = getPaises();

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
			<div class="col-8 offset-1">
				<h1>Aplicación P.A.P</h1>
				<h3>Listado Países</h3>
				<hr />
				<div class="text-right">
					<a href="createGet.php" class="btn btn-primary">Crear</a>
				</div>
				<table class="table table-striped mt-5">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">País</th>
				      <th scope="col" class="text-right">Acción</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach($paises as $pais): ?>
				  		<tr>
				  			<td><?= $pais->id; ?></td>
				  			<td><?= $pais->nombre; ?></td>
				  			<td class="text-right">
				  				<form action="updateGet.php" method="post" id="formAccion-<?=$pais->id;?>" >
				  					<input type="hidden" name="id" value="<?= $pais->id; ?>">
				  				</form>

				  				<button class="btn btn-info" onclick="accion(<?= $pais->id; ?>,'updateGet.php');"><i class="fas fa-edit"></i></button>
				  				<button class="btn btn-danger" onclick="accion(<?= $pais->id; ?>,'deleteGet.php');"><i class="fas fa-trash"></i></button>
				  			</td>
				  		</tr>
				  	<?php endforeach; ?>
				  </tbody>
				</table>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-8 offset-1">
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