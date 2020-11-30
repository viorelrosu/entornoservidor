<div class="row mt-5">
	<div class="col">
		<h2>Dar de baja País</h2>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="alert alert-warning" role="alert">
	  		¿Estás seguro de eliminar este país: <b><?=$pais->nombre; ?></b>?
	  		<br /><hr /><button class="btn btn-danger" onclick="accion(<?= $pais->id; ?>,'<?=base_url().'pais/deletePost'?>');">Eliminar</button>
		</div>
	</div>
</div>
<?=volver('pais')?>

<form action="" method="post" id="formAccion-<?=$pais->id;?>" >
	<input type="hidden" name="id" value="<?= $pais->id; ?>">
</form>