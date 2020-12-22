<div class="row">
	<div class="col-6 offset-3">
		<h2>Modificar Datos</h2>
		<hr>
		<?= getMsg($_msg);?>
	</div>
</div>
<div class="row">
	<div class="col-6 offset-3">
		<form action="<?=base_url().'user/updatePost'?>" method="post" >
			<input type="hidden" name="id" value="<?= $usuario->id; ?>" />
			<div class="form-group">
				<label for="nombre" class="font-weight-bold">Nombre</label><br />
				<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce Nombre" value="<?= $usuario->nombre; ?>" />
			</div>
			<div class="form-group">
				<label for="email" class="font-weight-bold">Email</label><br />
				<input type="text" class="form-control" id="email" name="email" placeholder="Introduce Email" value="<?= $usuario->email; ?>" />
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