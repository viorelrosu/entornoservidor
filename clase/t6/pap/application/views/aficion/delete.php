<div class="row mt-5">
	<div class="col">
		<h2>Dar de baja Afición</h2>
	</div>
</div>
<div class="row">
	<div class="col">
		<div class="alert alert-warning" role="alert">
	  		¿Estás seguro de eliminar esta afición: <b><?=$aficion->nombre; ?></b>?
	  		<br /><hr /><button class="btn btn-danger" onclick="accion(<?= $aficion->id; ?>,'<?=base_url().'aficion/deletePost'?>');">Eliminar</button>
		</div>
	</div>
</div>
<?=volver('aficion')?>

<form action="" method="post" id="formAccion-<?=$aficion->id;?>" >
	<input type="hidden" name="id" value="<?= $aficion->id; ?>">
</form>