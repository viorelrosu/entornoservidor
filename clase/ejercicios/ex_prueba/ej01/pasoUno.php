<?php
session_start();
require_once 'util.php';

echo <<<HTML
	<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle('Examen - Ejercicio 01');

echo getHtmlAlert('info','Introduce dos números entre el 1 y el 12');

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="pasoDos.php" method="get" >

			<div class="form-group row">
				<label for="cotaInf" class="col-sm-2 col-form-label">Cota inferior</label><br />
				<div class="col-sm-10">
					<input type="number" class="form-control" id="cotaInf" name="cotaInf" value="" min="1" max="12"/>
				</div>
			</div>
			<div class="form-group row">
				<label for="cotaSup" class="col-sm-2 col-form-label">Cota superior</label><br/>
				<div class="col-sm-10">
					<input type="number" class="form-control" id="cotaSup" name="cotaSup" value="" min="1" max="12"/>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" value="Continuar" class="btn btn-primary"/>
				</div>
			</div>
		</form>
	</div>
</div>
HTML;

echo getHtmlFooter('01');

echo <<<HTML
</div>
</body>
HTML;

//var_dump($_SESSION);

?>