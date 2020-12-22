<div class="row">
	<div class="col-6 offset-3">
		<h2>Dar de baja Tipo Premio</h2>
	</div>
</div>
<div class="row">
	<div class="col-6 offset-3">
		<div class="alert alert-warning" role="alert">
	  		¿Estás seguro de eliminar este tipo: <b><?=$tipo->nombre; ?></b>?
	  		<br /><hr /><button class="btn btn-danger" onclick="accion('post',<?= $tipo->id; ?>,'<?=base_url().'tipo/deletePost'?>');">Eliminar</button>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-6 offset-3">
		<?=volver('tipo'); ?>
	</div>
</div>
<form action="" method="post" id="formAccion-<?=$tipo->id;?>" >
	<input type="hidden" name="id" value="<?= $tipo->id; ?>" />
</form>