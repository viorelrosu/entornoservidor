<div class="row mt-5">
	<div class="col">
		<h3>Empleados</h3>
		<hr />
		<?php if(sizeOf($empleados) > 0): ?>
		<div class="text-right">
			<a href="<?=base_url().'empleado/create';?>" class="btn btn-primary">Crear</a>
		</div>

		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Empleado</th>
		      <th scope="col">Teléfono</th>
		      <th scope="col">Ciudad nac.</th>
		      <th scope="col">Lenguajes</th>
		      <th scope="col" class="text-right">Acción</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		foreach($empleados as $empleado):
		  	?>
		  		<tr>
		  			<td><?= $empleado->id; ?></td>
		  			<td><?= $empleado->nombre . ' ' . $empleado->apellidos; ?></td>
		  			<td><?= $empleado->telefono; ?></td>
		  			<td><?= (($empleado->ciudad_nacimiento_id != null) ? $empleado->fetchAs('ciudad')->ciudad_nacimiento->nombre : '--' ); ?></td>
		  			<td>
		  				<?php if($empleado->countOwn('domina') > 0):?>
		  				<?php foreach($empleado->ownDominaList as $lenguaje):?>
		  					<span class="badge badge-primary"><?= $lenguaje->lenguaje->nombre?></span>
		  				<?php endforeach; ?>
		  				<?php else: ?>
		  					<span class="badge badge-danger">&times;</span>
		  				<?php endif; ?>
		  			</td>
		  			<td class="text-right" width="100">
		  				<form action="" method="get" id="formAccion-<?=$empleado->id;?>" >
		  					<input type="hidden" name="id" value="<?= $empleado->id; ?>">
		  				</form>

		  				<button class="btn btn-info btn-sm" onclick="accion('get',<?= $empleado->id; ?>,'<?=base_url().'empleado/update'?>');"><i class="fas fa-edit"></i></button>
			  			<button class="btn btn-danger btn-sm" onclick="accion('post',<?= $empleado->id; ?>,'<?=base_url().'empleado/delete'?>');"><i class="fas fa-trash"></i></button>
		  			</td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info mt-2">
				No hay empleados<br/><br />
				<a class="btn btn-primary" href="<?= base_url().'empleado/create'; ?>">Dar de alta</a>
			</div>
		<?php endif; ?>
	</div>
</div>
