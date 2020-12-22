<div class="row">
	<div class="col-6 offset-3">
		<h2>Dar de baja Usuario</h2>
	</div>
</div>
<div class="row">
	<div class="col-6 offset-3">
		<div class="alert alert-warning" role="alert">
	  		¿Estás seguro de eliminar este usuario: <b><?=$user->nombre; ?></b>?
	  		<br /><hr /><button class="btn btn-danger" onclick="accion('post',<?= $user->id; ?>,'<?=base_url().'user/deletePost'?>');">Eliminar</button>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-6 offset-3">
		<?=volver('user'); ?>
	</div>
</div>

<form action="" method="post" id="formAccion-<?=$user->id;?>" >
	<input type="hidden" name="id" value="<?= $user->id; ?>" />
</form>