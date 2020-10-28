<?php
session_start();
require_once 'util.php';

echo <<<HTML
<body style="padding: 20px;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
HTML;

echo getHtmlTitle('Nueva Tarea');

echo <<<HTML
	<div class="row">
		<div class="col-md-4 offset-md-4">
			<form action="add_get.php" method="get" >
				<div class="form-group">
					<label for="tarea">Nombre tarea</label><br />
					<input type="text" class="form-control" id="tarea" name="tarea" value="" />
				</div>
				<div class="form-group">
					<label for="name">Empleado</label><br/>
					<select name="empleado" id="empleado" class="form-control">
						<option value="Pepe">Pepe</option>
						<option value="Ana">Ana</option>
						<option value="Juan">Juan</option>
					</select>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<a href="index.php" class="btn btn-secondary"/>Volver</a>
					</div>
					<div class="form-group col-md-6 text-right">
						<input type="submit" value="Guardar" class="btn btn-primary"/>
					</div>
				</div>
			</form>
		</div>
	</div>
HTML;

echo getHtmlFooter();

echo <<<HTML
</body>
HTML;


?>