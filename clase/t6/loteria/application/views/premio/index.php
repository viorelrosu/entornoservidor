<div class="row mt-5">
	<div class="col">
		<h3>Listado Premios</h3>
		<hr />
		<?= getMsg($_msg);?>
		<?php if(count($premios) > 0): ?>
			<?php if( isRolValid('admin') ):?>
				<div class="text-right">
					<a href="<?=base_url().'premio/create';?>" class="btn btn-primary">Crear</a>
				</div>
			<?php endif;?>
			<table class="table table-striped mt-5">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Número</th>
			      <th scope="col">Tipo</th>
			      <th scope="col">Multiplicador</th>
			      <?php if( isRolValid('admin') ):?>
			      	<th scope="col" class="text-right">Acción</th>
			      <?php endif;?>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$i=0;
			  		foreach($premios as $premio):
			  			$i++;
			  	?>
			  		<tr>
			  			<td><?= $i; ?></td>
			  			<td><?= $premio->numero; ?></td>
			  			<td><?= $premio->tipo->nombre; ?></td>
			  			<td><?= $premio->tipo->multiplicador; ?></td>
			  			<?php if( isRolValid('admin') ):?>
				  			<td class="text-right" width="100">
				  				<form action="" method="get" id="formAccion-<?=$premio->id;?>" >
				  					<input type="hidden" name="id" value="<?= $premio->id; ?>">
				  				</form>

				  				<button class="btn btn-info btn-sm" onclick="accion('get',<?= $premio->id; ?>,'<?=base_url().'premio/update'?>');"><i class="fas fa-edit"></i></button>
					  			<button class="btn btn-danger btn-sm" onclick="accion('post',<?= $premio->id; ?>,'<?=base_url().'premio/delete'?>');"><i class="fas fa-trash"></i></button>
				  			</td>
			  			<?php endif;?>
			  		</tr>
			  	<?php endforeach; ?>
			  </tbody>
			</table>
		<?php else: ?>
			<div class="alert alert-info ">
				No hay premios.
				<?php if( isRolValid('admin') ):?>
					<br/><br />
					<a class="btn btn-primary" href="<?= base_url().'premio/create'; ?>">Dar de alta</a>
				<?php else: ?>
					Para dar de alta se necesitan permisos de administrador.
				<?php endif;?>
			</div>
		<?php endif;?>
	</div>
</div>
