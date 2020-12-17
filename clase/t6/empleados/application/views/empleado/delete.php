<div class="row">
	<div class="col">
		<h2>Dar de baja Empleado</h2>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="alert alert-warning" role="alert">
	  		¿Estás seguro de eliminar este empleado: <b><?=$empleado->nombre . ' ' . $empleado->apellidos; ?></b>?
	  		<br /><hr /><button class="btn btn-danger" onclick="accion('post',<?= $empleado->id; ?>,'<?=base_url().'empleado/deletePost'?>');">Eliminar</button>
		</div>
	</div>
</div>

<?=volver('empleado'); ?>

<form action="" method="post" id="formAccion-<?=$empleado->id;?>" >
	<input type="hidden" name="id" value="<?= $empleado->id; ?>" />
</form>