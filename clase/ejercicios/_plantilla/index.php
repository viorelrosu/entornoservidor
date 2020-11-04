<?php
session_start();
require_once 'util.php';

echo getHtmlStart(false);

echo getHtmlTitle('Nuevo ejercicio');

echo getHtmlAlert('info','No te olvides de borrar Sesión y Cookies');

echo <<<HTML
<div class="row">
	<div class="col-md-6 offset-md-3">
		<form action="" method="get" >
			<div class="form-group">
				<label for="user" class="font-weight-bold">Introduce Usuario</label><br />
				<input type="text" class="form-control" id="user" name="user" value="" />
			</div>
			<div class="form-group">
				<label for="name" class="font-weight-bold">Introduce tu Contraseña</label><br/>
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

echo '<hr/>';

echo <<<HTML
<div class="row mt-5 mb-5">
	<div class="col-md-6 offset-md-3">
		<form>
		  <div class="form-group row">
		    <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" value="email@example.com">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
		    <div class="col-sm-10">
		      <input type="password" class="form-control" id="inputPassword">
		    </div>
		  </div>
		  <div class="form-group row">
		    <label for="inputPassword" class="col-sm-2 col-form-label">&nbsp;</label>
		    <div class="col-sm-10">
		      <input type="submit" class="btn btn-primary" id="submit" value="Enviar">
		    </div>
		  </div>
		</form>
	</div>
</div>
HTML;

echo '<hr/>';

echo <<<HTML
<div class="row mt-5 mb-5">
	<div class="col-md-6 offset-md-3">
			<div class="form-row">
				<div class="form-group col-4">
					<button onclick="peticionAjax('peli')" class="btn btn-primary w-100">Peli favorita</button>
				</div>
				<div class="form-group col">
					<input type="text" class="form-control" id="idPeli" name="peli" value="" readonly="readonly" />
				</div>
			</div>

			<div class="form-row">
				<div class="form-group col-4">
					<button onclick="peticionAjax('cancion')" class="btn btn-primary w-100">Canción favorita</button>
				</div>
				<div class="form-group col">
					<input type="text" class="form-control" id="idCancion" name="cancion" value="" readonly="readonly" />
				</div>
			</div>
	</div>
</div>
HTML;

echo '<hr/>';

echo <<<HTML
<div class="row mt-5 mb-5">
	<div class="col-md-6 offset-md-3">
		<form class="form-inline">
		  <div class="form-group mb-2">
		    <input type="text" class="form-control" id="staticEmail2" value="email@example.com" placeholder="Email">
		  </div>
		  <div class="form-group mx-sm-3 mb-2">
		    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
		  </div>
		  <button type="submit" class="btn btn-primary mb-2">Iniciar sesión</button>
		</form>
	</div>
</div>
HTML;

echo '<hr/>';

$htmlListaRadio = getHtmlLista('Selecciona tu número','radio',[1=>'Uno', 2=>'Dos', 3=>'Tres'], 'listaRadio', [3], true, false, 'peticionAjax()');
echo getHtmlCol('col-6 offset-3 mb-5',$htmlListaRadio, true);

$htmlListaSelect = getHtmlLista('Selecciona tu número','select',['Uno', 'Dos', 'Tres'], 'listaSelect', ['Uno']);
echo getHtmlCol('col-6 offset-3 mb-5',$htmlListaSelect, true);

$htmlListaCheckbox = getHtmlLista('Selecciona tu número', 'checkbox',['Uno', 'Dos', 'Tres'], 'listaCheck', ['Dos'], true);
echo getHtmlCol('col-6 offset-3 mb-5',$htmlListaCheckbox, true);

echo '<hr/>';

echo <<<HTML
<div class="row mb-5 mt-5">
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

echo '<hr/>';

echo <<<HTML
	<div class="row mb-5 mt-5">
		<div class="col-md-6 offset-md-3">
			<div class="row">
				<div class="col-md-6"><a href="add.php" class="btn btn-primary">Añadir tarea</a></div>
				<div class="col-md-6 text-right"><a href="ver.php" class="btn btn-primary">Ver tareas</a></div>
			</div>
		</div>
	</div>
HTML;

echo getHtmlFooter();

echo getHtmlEnd();

//var_dump($_SESSION);

?>