<?php
session_start();
require_once 'util.php';

echo <<<HTML
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script type="text/javascript" src="https://storage.googleapis.com/google-code-archive-downloads/v2/code.google.com/form-serialize/serialize-0.2.min.js" ></script>
		<script src="scripts.js"></script>
	</head>
HTML;

echo <<<HTML
<body>
<div class="container pt-4">
HTML;

echo getHtmlTitle('Ejercicio 05 - Ajax');

echo getHtmlAlert('info','Lista de empleados');

echo <<<HTML

<div class="row">
	<div class="col-md-6 offset-md-3">
		<form id="idFormFiltros" >
			<div class="form-group">
				<label for="filtro">Filtrar por</label><br />
				<select class="form-control" name="filtro">
					<option value="nombre" >Nombre</option>
					<option value="apellido" >Apellido</option>
					<option value="telefono" >Teléfono</option>
				</select>
			</div>
			<div class="form-group">
				<label for="text">Introduce texto</label><br />
				<input type="text" class="form-control" id="text" name="text" value="" />
			</div>
		</form>
			<div class="form-row">
				<div class="form-group col-md-6">
					<button class="btn btn-primary" onClick="peticionAjax()" />Filtrar</button>
				</div>
			</div>
		
	</div>
</div>
HTML;

$htmlTrs = '';
$num=0;
foreach($bdEmpleados as $empleado) {
	$num++;
	$htmlTrs .= <<<HTML
		<tr>
	      <th scope="row">$num</th>
	      <td>{$empleado[0]}</td>
	      <td>{$empleado[1]}</td>
	      <td>{$empleado[2]}</td>
	    </tr>
	HTML;
}

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Nombre</th>
	      <th scope="col">Apellido</th>
	      <th scope="col">Teléfono</th>
	    </tr>
	  </thead>
	  <tbody id="idTable">
	  	$htmlTrs
	  </tbody>
	</table>
	</div>
</div>
HTML;

echo getHtmlFooter();

echo <<<HTML
</div>
</body>
HTML;

//var_dump($_SESSION);

?>