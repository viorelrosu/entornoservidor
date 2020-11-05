<?php
session_start();
require_once 'util.php';

echo getHtmlStart(false);

echo getHtmlTitle('Ejercicio 01');

echo getHtmlAlert('info','Introduce tus datos');

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="" method="get" >
			<div class="form-group">
				<label for="user">Introduce Usuario</label><br />
				<input type="text" class="form-control" id="user" name="user" value="" />
			</div>
			<div class="form-group">
				<label for="name">Introduce tu Contraseña</label><br/>
				<input type="text" class="form-control" id="name" name="pass" value="" />
			</div>
			<div class="form-group">
				<input type="checkbox" id="recordar" name="recordar" /> <label for="recordar">Recordar</label>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" value="Iniciar sesión" class="btn btn-primary"/>
				</div>
				<div class="form-group col-md-6 text-right">
					<a href="registrar.php" class="btn btn-info">Nuevo registro</a>
				</div>
			</div>
		</form>
	</div>
</div>
HTML;

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
				<div class="col-md-6"><a href="add.php" class="btn btn-primary">Añadir tarea</a></div>
				<div class="col-md-6 text-right"><a href="ver.php" class="btn btn-primary">Ver tareas</a></div>
			</div>
		</div>
	</div>
HTML;

echo getHtmlFooter('01');

echo getHtmlEnd();

//var_dump($_SESSION);

?>