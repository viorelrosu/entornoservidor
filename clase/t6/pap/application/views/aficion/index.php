<div class="row mt-5">
	<div class="col">
		<h3>Listado Aficiones</h3>
		<hr />
		<div class="text-right">
			<a href="<?=base_url()?>aficion/create" class="btn btn-primary">Crear</a>
		</div>

		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Afición</th>
		      <th scope="col" class="text-right">Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		foreach($aficiones as $aficion):
		  	?>
		  		<tr>
		  			<td><?= $aficion->id; ?></td>
		  			<td><?= $aficion->nombre; ?></td>
		  			<td class="text-right">
		  				<form action="updateGet.php" method="post" id="formAccion-<?=$aficion->id;?>" >
		  					<input type="hidden" name="id" value="<?= $aficion->id; ?>">
		  				</form>

		  				<button class="btn btn-info btn-sm" onclick="accion(<?= $aficion->id; ?>,'updateGet.php');"><i class="fas fa-edit"></i></button>
		  				<button class="btn btn-danger btn-sm" onclick="accion(<?= $aficion->id; ?>,'deleteGet.php');"><i class="fas fa-trash"></i></button>
		  			</td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
	</div>
</div>
<div class="row mt-5">
	<div class="col text-right">
		<hr>
		<a href="<?=base_url()?>" class="btn btn-secondary"/>Volver a Inicio</a>
	</div>
</div>
<script>
	function accion(id, tipo) {
		var form = document.getElementById('formAccion-'+id);
		form.action=tipo;
		form.submit();
	}
</script>