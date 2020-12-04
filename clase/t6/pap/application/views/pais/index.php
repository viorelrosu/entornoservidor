<div class="row mt-5">
	<div class="col">
		<h3>Listado Países</h3>
			<hr />
			<div class="text-right">
				<a href="<?=base_url().'pais/create'?>" class="btn btn-primary">Crear</a>
			</div>
			<table class="table table-striped mt-5">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">País</th>
			      <th scope="col">Personas</th>
			      <th scope="col" class="text-right">Acción</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		foreach($paises as $pais):
			  			$ownPersonas = $pais->ownPersonaList;
			  			if( count($ownPersonas) == 0 ) {
			  				$htmlOwnPersonas = '<span class="badge badge-pill badge-danger">No hay personas asociadas</span>';
			  			} else {
			  				$htmlOwnPersonas = getBeansToStringByNombre($ownPersonas);
			  			}

			  	?>
			  		<tr>
			  			<td><?= $pais->id; ?></td>
			  			<td><?= $pais->nombre; ?></td>
			  			<td><?= $htmlOwnPersonas; ?></td>
			  			<td class="text-right">
			  				<form action="" method="post" id="formAccion-<?=$pais->id;?>" >
			  					<input type="hidden" name="id" value="<?= $pais->id; ?>">
			  				</form>

			  				<button class="btn btn-info btn-sm" onclick="accion(<?= $pais->id; ?>,'<?=base_url().'pais/update'?>');"><i class="fas fa-edit"></i></button>
			  				<button class="btn btn-danger btn-sm" onclick="accion(<?= $pais->id; ?>,'<?=base_url().'pais/delete'?>');"><i class="fas fa-trash"></i></button>
			  			</td>
			  		</tr>
			  	<?php endforeach; ?>
			  </tbody>
			</table>
	</div>
</div>