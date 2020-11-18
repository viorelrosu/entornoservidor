<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Baja Afición</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col-8 offset-1">
				<h2>Dar de baja Afición</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-8 offset-1">
				<div class="alert alert-success">
					Afición <?php echo $_GET['nombreP']; ?> se ha eliminado correctamente.
					<hr />
					<a href="aficiones.php" class="btn btn-primary">Listado Aficiones</a>
					<a href="../index.php" class="btn btn-secondary">Menu Principal</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>