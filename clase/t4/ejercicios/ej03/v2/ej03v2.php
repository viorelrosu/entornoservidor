<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style type="text/css">
	img { margin-right: 4px; }

	input { margin: 0px 8px 0 0;  }
	label { display: block; }
</style>
<body>
	<div class="container pt-4">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<h2>Label en idiomas</h2>
				<hr />
				<span><img src="../img/es.png" width="25" /></span><input type="radio" name="idomas" value="es" id="" checked="checked" />
				<span><img src="../img/uk.png" width="25" /></span><input type="radio" name="idomas" value="en" id="" />
				<span><img src="../img/fr.png" width="25" /></span><input type="radio" name="idomas" value="fr" id="" />
				<hr />
			</div>
			<div class="col-md-6 offset-md-3">
				<div class="form-group">
					<label id="idWord">Palabra</label>
					<input type="text" name="" id="">
				</div>
				<div class="form-group">
					<label id="idTranslation">Traducción</label>
					<input type="text" name="" id="">
				</div>
				<div class="form-group"><input type="submit" value="Enviar"></div>
			</div>
		</div>
	</div>
	
</body>
</html>