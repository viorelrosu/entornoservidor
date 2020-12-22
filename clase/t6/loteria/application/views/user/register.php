<div class="row">
	<div class="col-6 offset-3">
		<h2>Registrar Usuario</h2>
		<hr>
		<?= getMsg($_msg);?>
	</div>
</div>
<div class="row">
	<div class="col-6 offset-3">
		<form action="<?=base_url().'user/registerPost';?>" method="post" >
			<div class="form-group">
				<label for="nombre" class="font-weight-bold">Nombre</label><br />
				<input type="text" class="form-control" id="nombre" name="nombre" value="" placeholder="Introduce Nombre"/>
			</div>
			<div class="form-group">
				<label for="email" class="font-weight-bold">Email</label><br />
				<input type="text" class="form-control" id="email" name="email" value="" placeholder="Introduce Email" />
			</div>
			<div class="form-group">
				<label for="password" class="font-weight-bold">Contraseña</label><br />
				<input type="password" class="form-control" id="password" name="password" value="" placeholder="Introduce Contraseña" />
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" value="Guardar" class="btn btn-primary"/>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row">
	<div class="col-6 offset-3">
		<?php if( isRolValid('admin') ):?>
			<?=volver('user');?>
		<?php else: ?>
			<?=volver('home');?>
		<?php endif; ?>
	</div>
</div>
