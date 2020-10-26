<?php

echo <<<HTML
<body style="padding: 20px;">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="row">
<div class="col-md-4 offset-md-4">
<h2 class="text-center">Inicia sesión</h2>
<form action="" method="" >
	<div class="form-group">
		<label for="user">Introduce Usuario</label><br />
		<input type="text" class="form-control" id="user" name="user" value="" /><br />
	</div>
	<div class="form-group">
		<label for="name">Introduce tu Contraseña</label><br/>
		<input type="text" class="form-control" id="name" name="pass" value="" /><br />
	</div>
	<div class="form-group">
		<input type="checkbox" id="recordar" name="recordar" /> <label for="recordar">Recordar</label><br /><br />
		<input type="submit" value="Log in" class="btn btn-primary"/>
	</div>
</form>
<p>
	<a href="registrar.php" >Nuevo registro</a>
</p>
</div>
</div>

</body>
HTML;

?>
