<div class="row">
	<div class="col-6 offset-3">
		<h2>Dar de baja Premio</h2>
	</div>
</div>
<div class="row">
	<div class="col-6 offset-3">
		<div class="alert alert-warning" role="alert">
	  		¿Estás seguro de eliminar este premio: <b><?=$premio->numero; ?></b>?
	  		<br /><hr /><button class="btn btn-danger" onclick="accion('post',<?= $premio->id; ?>,'<?=base_url().'premio/deletePost'?>');">Eliminar</button>
		</div>
	</div>
</div>

<?=volver('premio'); ?>

<form action="" method="post" id="formAccion-<?=$premio->id;?>" >
	<input type="hidden" name="id" value="<?= $premio->id; ?>" />
</form>