<?php
session_start();
require_once 'util.php';

echo getHtmlStart();

echo getHtmlTitle('Ejercicio 02');

echo getHtmlAlert('info','Introduce tus datos');

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
	<table class="table table-striped">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Tarea</th>
	      <th scope="col" class="text-center">Total</th>
	      <th scope="col" class="text-center">Acciones</th>
	    </tr>
	  </thead>
	  <tbody>
	  	<tr>
	      <th scope="row">1</th>
	      <td>Mark</td>
	      <td class="text-center"><span class="badge badge-pill badge-primary">10</span></td>
	      <td class="text-center">
	      	<div class="btn-group btn-group-sm" role="group">
			  	<a class="btn btn-primary" href="#">Leer</a>
				<a class="btn btn-primary" href="#">Escribir</a>
			</div>
	      </td>
	    </tr>
	  </tbody>
	</table>
	</div>
</div>
HTML;

echo <<<HTML
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="row">
				<div class="col-md-6 text-left"><a href="index.php" class="btn btn-secondary">Volver</a></div>
				<div class="col-md-6 text-right"><button class="btn btn-info" onclick="peticionAjax();">Call Ajax</button></div>
			</div>
		</div>
	</div>
HTML;

echo getHtmlFooter('02');

echo getHtmlEnd();

//var_dump($_SESSION);

?>