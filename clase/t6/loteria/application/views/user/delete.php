<div class="row">
	<div class="col">
		<h2>Dar de baja Persona</h2>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="alert alert-warning" role="alert">
	  		¿Estás seguro de eliminar esta persona: <b><?=$persona->nombre; ?></b>?
	  		<br /><hr /><button class="btn btn-danger" onclick="accion('post',<?= $persona->id; ?>,'<?=base_url().'persona/deletePost'?>');">Eliminar</button>
		</div>
	</div>
</div>

<?=volver('persona'); ?>

<form action="" method="post" id="formAccion-<?=$persona->id;?>" >
	<input type="hidden" name="id" value="<?= $persona->id; ?>" />
</form>