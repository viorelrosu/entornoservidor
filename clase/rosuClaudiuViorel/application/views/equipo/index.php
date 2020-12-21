<div class="row mt-5">
	<div class="col">
		<h3>Listado Equipos</h3>
		<hr />
		<?php if(count($equipos) > 0): ?>
		<div class="text-right">
			<a href="<?=base_url().'equipo/create';?>" class="btn btn-primary">Crear</a>
		</div>
		
		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Nombre Equipo</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach($equipos as $equipo):
		  			$i++;
		  	?>
		  		<tr>
		  			<td><?= $i; ?></td>
		  			<td><?= $equipo->nombre; ?></td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info">
				No hay equipos dados de alta<br/><br />
				<a class="btn btn-primary" href="<?= base_url().'equipo/create'; ?>">Dar de alta</a>
			</div>
		<?php endif;?>
	</div>
</div>

