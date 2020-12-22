<div class="row">
	<div class="col-6 offset-3">
		<h2>Dar de baja Boleto</h2>
	</div>
</div>
<div class="row">
	<div class="col-6 offset-3">
		<div class="alert alert-warning" role="alert">
	  		¿Estás seguro de eliminar este boleto: <b><?=$boleto->numero; ?></b>?
	  		<br /><hr /><button class="btn btn-danger" onclick="accion('post',<?= $boleto->id; ?>,'<?=base_url().'boleto/deletePost'?>');">Eliminar</button>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-6 offset-3">
		<?=volver('boleto'); ?>
	</div>
</div>

<form action="" method="post" id="formAccion-<?=$boleto->id;?>" >
	<input type="hidden" name="id" value="<?= $boleto->id; ?>" />
</form>