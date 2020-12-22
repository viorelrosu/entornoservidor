<div class="row mt-5">
	<div class="col">
		<h3>Listado Tipos de Premio</h3>
		<hr />
		<?= getMsg($_msg);?>
		<?php if(count($tipos) > 0): ?>
			<?php if( isRolValid('admin') ):?>
			<div class="text-right">
				<a href="<?=base_url().'tipo/create';?>" class="btn btn-primary">Crear</a>
			</div>
			<?php endif; ?>
			<table class="table table-striped mt-5">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Nombre</th>
			      <th class="text-center" scope="col">Multiplicador</th>
			      <?php if( isRolValid('admin') ):?>
				      <th scope="col" class="text-right">Acción</th>
				  <?php endif; ?>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$i=0;
			  		foreach($tipos as $tipo):
			  			$i++;
			  	?>
			  		<tr>
			  			<td><?= $i; ?></td>
			  			<td><?= $tipo->nombre; ?></td>
			  			<td class="text-center"><?= $tipo->multiplicador; ?></td>
			  			<?php if( isRolValid('admin') ):?>
			  			<td class="text-right" width="100">
			  				<form action="" method="get" id="formAccion-<?=$tipo->id;?>" >
			  					<input type="hidden" name="id" value="<?= $tipo->id; ?>">
			  				</form>

			  				<button class="btn btn-info btn-sm" onclick="accion('get',<?= $tipo->id; ?>,'<?=base_url().'tipo/update'?>');"><i class="fas fa-edit"></i></button>
				  			<button class="btn btn-danger btn-sm" onclick="accion('post',<?= $tipo->id; ?>,'<?=base_url().'tipo/delete'?>');"><i class="fas fa-trash"></i></button>
			  			</td>
			  			<?php endif; ?>
			  		</tr>
			  	<?php endforeach; ?>
			  </tbody>
			</table>
		<?php else: ?>
			<div class="alert alert-info ">
				No hay tipos de premio dados de alta.
				<?php if( isRolValid('admin') ):?>
					<br/><br />
					<a class="btn btn-primary" href="<?= base_url().'tipo/create'; ?>">Dar de alta</a>
				<?php endif; ?>
			</div>
		<?php endif;?>
	</div>
</div>
