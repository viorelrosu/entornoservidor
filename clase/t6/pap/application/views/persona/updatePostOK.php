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
			<div class="col-8 offset-1">
				<h2>Modificar País</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-8 offset-1">
				<div class="alert alert-success">
					País <b><?php echo $_GET['nombreP']; ?></b> se ha modificado correctamente.
					<hr />
					<a href="personas.php" class="btn btn-primary">Listado Personas</a>
					<a href="../index.php" class="btn btn-secondary">Menu Principal</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>