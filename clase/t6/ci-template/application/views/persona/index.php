<div class="row mt-5">
	<div class="col">
		<h3>Listado Personas</h3>
		<hr />
		<div class="text-right">
			<a href="<?=base_url().'persona/create';?>" class="btn btn-primary">Crear</a>
		</div>
		<?php if(count($personas) > 0): ?>
		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Persona</th>
		      <th scope="col">DNI</th>
		      <th scope="col">País</th>
		      <th scope="col">Aficiones</th>
		      <th scope="col" class="text-right">Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		foreach($personas as $persona):
		  			//$sharedAficiones = $persona->sharedAficionList;
		  			$ownAficionesGusta = $persona->ownGustaList;
		  			//print_r($ownAficionesGusta);

		  			if( count($ownAficionesGusta) == 0 ) {
		  				$htmlSharedAficiones = '<span class="badge badge-pill badge-danger">&times;</span>';
		  			} else {
		  				// $htmlSharedAficiones = getBeansToStringByNombre($sharedAficiones);
		  				$htmlSharedAficiones = getAficionesToStringByNombre($ownAficionesGusta);
		  			}
		  	?>
		  		<tr>
		  			<td><?= $persona->id; ?></td>
		  			<td><?= $persona->nombre; ?></td>
		  			<td><?= $persona->dni; ?></td>
		  			<td><?= (($persona->pais_nacimiento_id != null) ? $persona->fetchAs('pais')->pais_nacimiento->nombre : '--' ); ?></td>
		  			<td><?= $htmlSharedAficiones; ?></td>
		  			<td class="text-right" width="100">
		  				<form action="" method="get" id="formAccion-<?=$persona->id;?>" >
		  					<input type="hidden" name="id" value="<?= $persona->id; ?>">
		  				</form>

		  				<button class="btn btn-info btn-sm" onclick="accion('get',<?= $persona->id; ?>,'<?=base_url().'persona/update'?>');"><i class="fas fa-edit"></i></button>
			  			<button class="btn btn-danger btn-sm" onclick="accion('post',<?= $persona->id; ?>,'<?=base_url().'persona/delete'?>');"><i class="fas fa-trash"></i></button>
		  			</td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info">
				No hay personas dadas de alta<br/><br />
				<a class="btn btn-primary" href="<?= base_url().'persona/create'; ?>">Dar de alta</a>
			</div>
		<?php endif;?>
	</div>
</div>
<script>
	function accion(id, tipo) {
		var form = document.getElementById('formAccion-'+id);
		form.action=tipo;
		form.submit();
	}
</script>
