<div class="row mt-5">
	<div class="col">
		<h3>Listado Usuarios</h3>
		<hr />
		<?= getMsg($_msg);?>
		<div class="text-right">
			<a href="<?=base_url().'user/register';?>" class="btn btn-primary">Crear</a>
		</div>
		<?php if(count($usuarios) > 0): ?>
		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Rol</th>
		      <th scope="col">Usuario</th>
		      <th scope="col">Email</th>
		      <th scope="col" class="text-right">Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach($usuarios as $usuario):
		  			$i++;
		  	?>
		  		<tr>
		  			<td><?= $i; ?></td>
		  			<td><?= $usuario->rol->nombre; ?></td>
		  			<td><?= $usuario->nombre; ?></td>
		  			<td><?= $usuario->email; ?></td>
		  			<td class="text-right" width="100">
		  				<form action="" method="get" id="formAccion-<?=$usuario->id;?>" >
		  					<input type="hidden" name="id" value="<?= $usuario->id; ?>">
		  				</form>

		  				<button class="btn btn-info btn-sm" onclick="accion('get',<?= $usuario->id; ?>,'<?=base_url().'user/update'?>');"><i class="fas fa-edit"></i></button>
			  			<button class="btn btn-danger btn-sm" onclick="accion('post',<?= $usuario->id; ?>,'<?=base_url().'user/delete'?>');"><i class="fas fa-trash"></i></button>
		  			</td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info">
				No hay usuarios dados de alta<br/><br />
				<a class="btn btn-primary" href="<?= base_url().'usuario/register'; ?>">Dar de alta</a>
			</div>
		<?php endif;?>
	</div>
</div>
