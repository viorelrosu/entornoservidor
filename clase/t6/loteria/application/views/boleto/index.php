<div class="row mt-5">
	<div class="col">
		<h3>Listado Boletos</h3>
		<hr />
		<?= getMsg($_msg);?>
		<?php if(count($participaciones) > 0): ?>
			<div class="text-right">
				<a href="<?=base_url().'boleto/create';?>" class="btn btn-primary">Crear</a>
			</div>
			<table class="table table-striped mt-5">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <?php if(isRolValid('admin')):?>
			      	<th scope="col">Usuario</th>
			      	<th scope="col">Número</th>
			      	<th class="text-center" scope="col">Participación</th>
			      	<th class="text-center" scope="col"><span class="text-info">Le deben</span> / <span class="text-danger">Debe</span></th>
			      <?php else: ?>
			      	<th scope="col">Número</th>
			      	<th class="text-center" scope="col">Participación</th>
			      	<th class="text-center" scope="col"><span class="text-info">Me deben</span> / <span class="text-danger">Debo</span></th>
			      <?php endif;?>
			      <th class="text-center">Premiado con:</th>
			      <th scope="col" class="text-right">Acción</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$i=0;
			  		foreach($participaciones as $participacion):
			  			$i++; $boleto = $participacion->boleto;
			  	?>
				  		<tr>
				  			<td><?= $i; ?></td>
				  			<?php if(isRolValid('admin')):?>
				  				<td><?= $participacion->user->nombre; ?></td>
				  			<?php endif;?>
				  			<td class="font-weight-bolder">
				  				<?= $boleto->numero; ?>
			  				</td>
				  			<td class="text-center">
				  				<span class="badge badge-primary"><?= $participacion->cantidad . ' €'; ?></span>
				  			</td>
				  			<td class="text-center">

				  				<?php
					  				if($participacion->propietario):
					  					foreach($boleto->ownParticipacionList as $intercambio):
					  						 if(!$intercambio->propietario):
				  				?>
				  								<span class="badge badge-info"><?= number_format($intercambio->cantidad, 2) . ' € (' . $intercambio->user->nombre . ')'; ?></span>
				  				<?php
					  						endif;
					  					endforeach;
					  				else:
					  					foreach($boleto->ownParticipacionList as $intercambio):
				  							if($intercambio->propietario):
				  				?>
				  								<span class="badge badge-danger"><?= number_format($participacion->cantidad, 2) . ' € (' . $intercambio->user->nombre . ')'; ?></span>
				  				<?php
				  							endif;
				  						endforeach;
					  				endif;
				  				?>
				  			</td>
				  			<td class="text-center">
				  				<?= checkPremio($boleto->numero, $participacion->cantidad); ?>
				  			</td>
				  			<td class="text-right" width="150">
				  				<form action="" method="get" id="formAccion-<?=$participacion->id;?>" >
				  					<input type="hidden" name="id" value="<?=$participacion->id;?>">
				  				</form>
				  				<?php  if($participacion->propietario):?>
				  				<button class="btn btn-primary btn-sm" onclick="accion('get',<?= $participacion->id; ?>,'<?=base_url().'boleto/intercambio'?>');"><i class="fas fa-user-plus"></i></button>
				  				<button class="btn btn-info btn-sm" onclick="accion('get',<?= $participacion->id; ?>,'<?=base_url().'boleto/update'?>');"><i class="fas fa-edit"></i></button>
					  			<?php endif; ?>
					  			<button class="btn btn-danger btn-sm" onclick="accion('post',<?= $participacion->id; ?>,'<?=base_url().'boleto/delete'?>');"><i class="fas fa-trash"></i></button>
				  			</td>
				  		</tr>
			  	<?php endforeach; ?>
			  </tbody>
			</table>
		<?php else: ?>
			<div class="alert alert-info ">
				No hay boletos dados de alta.<br/><br />
				<a class="btn btn-primary" href="<?= base_url().'boleto/create'; ?>">Dar de alta</a>
			</div>
		<?php endif;?>
	</div>
</div>
