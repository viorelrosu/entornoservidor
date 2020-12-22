<div class="row mt-5">
	<div class="col">
		<h3>Listado Boletos</h3>
		<hr />
		<?= getMsg($_msg);?>
		<?php if(count($boletos) > 0): ?>
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
			      	<th class="text-center" scope="col">Le deben</th>
			      <?php else: ?>
			      	<th scope="col">Número</th>
			      	<th class="text-center" scope="col">Participación</th>
			      	<th class="text-center" scope="col">Me deben/Debo</th>
			      <?php endif;?>
			      <th class="text-center">Premiado con:</th>
			      <th scope="col" class="text-right">Acción</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$i=0;
			  		foreach($boletos as $boleto):
			  			$i++;
			  	?>
			  		<tr>
			  			<td><?= $i; ?></td>
			  			<?php if(isRolValid('admin')):?>
			  				<td><?= $boleto->user->nombre; ?></td>
			  			<?php endif;?>
			  			<td class="font-weight-bolder"><?= $boleto->numero; ?></td>
			  			<td class="text-center"><span class="badge badge-primary"><?= $boleto->participacion . ' €'; ?></span></td>
			  			<td class="text-center">
			  				<?php foreach($boleto->ownIntercambioList as $intercambio):?>
			  					<span class="badge badge-info"><?= $intercambio->user->nombre; ?> - <?= number_format($intercambio->participacion, 2) . ' €'; ?></span>
			  				<?php endforeach;?>
			  			</td>
			  			<td class="text-center">
			  				<?= checkPremio($boleto->numero, $boleto->participacion); ?>
			  			</td>
			  			<td class="text-right" width="150">
			  				<form action="" method="get" id="formAccion-<?=$boleto->id;?>" >
			  					<input type="hidden" name="id" value="<?= $boleto->id; ?>">
			  				</form>
			  				<button class="btn btn-primary btn-sm" onclick="accion('get',<?= $boleto->id; ?>,'<?=base_url().'boleto/intercambio'?>');"><i class="fas fa-user-plus"></i></button>
			  				<button class="btn btn-info btn-sm" onclick="accion('get',<?= $boleto->id; ?>,'<?=base_url().'boleto/update'?>');"><i class="fas fa-edit"></i></button>
				  			<button class="btn btn-danger btn-sm" onclick="accion('post',<?= $boleto->id; ?>,'<?=base_url().'boleto/delete'?>');"><i class="fas fa-trash"></i></button>
			  			</td>
			  		</tr>
			  	<?php endforeach; ?>
			  	<?php if(isRolValid('usuario')):?>
				  	<?php
				  		foreach($user->ownIntercambioList as $participacion):
				  			$i++;
				  	?>
				  		<tr>
				  			<td><?= $i; ?></td>
				  			<td class="font-weight-bolder"><?= $participacion->boleto->numero; ?></td>
				  			<td class="text-center"><span class="badge badge-primary"><?= $participacion->participacion . ' €'; ?></span></td>
				  			<td class="text-center"><span class="badge badge-warning"><?= $participacion->boleto->user->nombre .' - '. number_format($participacion->participacion,2) . ' €'; ?></span></td>
				  			<td class="text-center"><?= checkPremio($participacion->boleto->numero, $participacion->participacion); ?></td>
				  			<td class="text-right" width="150">&nbsp;</td>
				  		</tr>
				  	<?php endforeach;?>
				<?php endif;?>
				<?php if(isRolValid('admin')):?>
					<?php
						foreach($intercambios as $participacion):
							$i++;
					?>
				  		<tr>
				  			<td><?= $i; ?></td>
				  			<td><?= $participacion->user->nombre; ?></td>
				  			<td class="font-weight-bolder"><?= $participacion->boleto->numero; ?></td>
				  			<td class="text-center"><span class="badge badge-primary"><?= $participacion->participacion . ' €'; ?></span></td>
				  			<td class="text-center"><span class="badge badge-warning"><?= $participacion->boleto->user->nombre .' - '. number_format($participacion->participacion,2) . ' €'; ?></span></td>
				  			<td class="text-center"><?= checkPremio($participacion->boleto->numero, $participacion->participacion); ?></td>
				  			<td class="text-right" width="150">&nbsp;</td>
				  		</tr>
				  	<?php endforeach;?>
				<?php endif;?>
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
