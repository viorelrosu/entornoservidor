<?php if( !isset($_header['usuario']) ):?>

	<?php if( (count($usuarios) == 4) and (count($roles) == 2) and (count($tipos) == 6) ):?>
		<div class="row">
			<div class="col">
				<div class="alert alert-info">
					<h4 class="alert-heading">Gracias! <span>La aplicación ya esta iniciada.</span></h4>
					<hr>
					<p>Se han dado de alta usuarios y tipos de premios.</p>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="jumbotron mt-3 ">
		<div class="container">
	 		<div class="row">
				 <div class="col"><h1 class="display-3 font-weight-bold">Bienvenido!</h1></div>
			</div>
			<div class="row mt-3">
				<div class="col"><h4>Por favor, inicia sesión o date de alta</h4></div>
			</div>
			<hr class="my-4">
			<div class="row">
				<div class="col">
					<a class="btn btn-primary mr-2" href="<?=base_url().'login';?>">Login</a>
					<a class="btn btn-primary" href="<?=base_url().'register';?>">Register</a>
				</div>
			</div>
		</div>
	</div>

	<div class="jumbotron mt-3 ">
		<div class="container">
			<div class="row"><div class="col"><h3>Datos acceso usuarios:</h3></div></div>
			<hr class="my-4">
			<div class="row">
				<div class="col-3">
					<ul class="list-group"><li class="list-group-item active">Admin</li><li class="list-group-item">admin@loteria.com</li><li class="list-group-item">admin (pass)</li></ul>
				</div>
				<div class="col-3">
					<ul class="list-group"><li class="list-group-item active">Mama</li><li class="list-group-item">mama@loteria.com</li><li class="list-group-item">mama (pass)</li></ul>
				</div>
				<div class="col-3">
					<ul class="list-group"><li class="list-group-item active">Papa</li><li class="list-group-item">papa@loteria.com</li><li class="list-group-item">papa (pass)</li></ul>
				</div>
				<div class="col-3">
					<ul class="list-group"><li class="list-group-item active">Primo</li><li class="list-group-item">primo@loteria.com</li><li class="list-group-item">primo (pass)</li></ul>
				</div>
			</div>
		</div>
	</div>
<?php else: ?>
	<div class="jumbotron mt-3 ">
		<div class="container">
			<div class="row">
				 <h1 class="display-3 font-weight-bold">Bienvenido <?= $_header['usuario']->nombre;?>!</h1>
			</div>
		</div>
	</div>
<?php endif;?>

