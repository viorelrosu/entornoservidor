<div class="row mt-5">
	<div class="col">
		<h3>Listado Países</h3>
			<?php if(isRolValid('usuario') or isRolValid('admin')):?>
				<div class="text-right">
					<a href="<?=base_url().'pais/create'?>" class="btn btn-primary">Crear</a>
				</div>
			<?php endif; ?>
			<table class="table table-striped mt-5">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">País</th>
			      <th scope="col">Personas</th>
			      <?php if(isRolValid('usuario') or isRolValid('admin')):?>
			      <th scope="col" class="text-right">Acción</th>
			  <?php endif; ?>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		foreach($paises as $pais):
			  			$ownPersonas = $pais->alias('pais_nacimiento')->ownPersonaList;
			  			if( count($ownPersonas) < 1 ) {
			  				$htmlOwnPersonas = '<span class="badge badge-pill badge-danger">No hay personas asociadas</span>';
			  			} else {
			  				$htmlOwnPersonas = getBeansToStringByNombre($ownPersonas);
			  			}
			  	?>
			  		<tr>
			  			<td><?= $pais->id; ?></td>
			  			<td><?= $pais->nombre; ?></td>
			  			<td><?= $htmlOwnPersonas; ?></td>
			  			<?php if(isRolValid('usuario') or isRolValid('admin')):?>
			  			<td class="text-right">
			  				<form action="" method="post" id="formAccion-<?=$pais->id;?>" >
			  					<input type="hidden" name="id" value="<?= $pais->id; ?>">
			  				</form>
			  				<?php if(isRolValid('usuario') or isRolValid('admin')):?>
				  				<button class="btn btn-info btn-sm" onclick="accion('get',<?= $pais->id; ?>,'<?=base_url().'pais/update/';?>');"><i class="fas fa-edit"></i></button>
				  			<?php endif;?>

				  			<?php if(isRolValid('admin')):?>
			  					<button class="btn btn-danger btn-sm" onclick="accion('post',<?= $pais->id; ?>,'<?=base_url().'pais/deletePost/'?>');"><i class="fas fa-trash"></i></button>
			  				<?php endif;?>
			  			</td>
			  		<?php endif; ?>
			  		</tr>
			  	<?php endforeach; ?>
			  </tbody>
			</table>
	</div>
</div>