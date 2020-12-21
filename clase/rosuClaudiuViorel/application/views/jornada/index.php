<div class="row mt-5">
	<div class="col">
		<h3>Listado Jornadas</h3>
		<hr />
		<?php if(count($jornadas) > 0): ?>
		<div class="text-right">
			<a href="<?=base_url().'jornada/create';?>" class="btn btn-primary">Crear</a>
		</div>
		
		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Jornada</th>
		      <th scope="col">Fecha Inicio</th>
		      <th scope="col">Fecha Fin</th>
		      <th scope="col">Resultados</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach($jornadas as $jornada):
		  			$i++;
		  	?>
		  		<tr>
		  			<td><?= $i; ?></td>
		  			<td><?= 'Jornada nrº '.$jornada->numero; ?></td>
		  			<td><?= date('d/m/Y',strtotime($jornada->ini)); ?></td>
		  			<td><?= date('d/m/Y',strtotime($jornada->fin)); ?></td>
		  			<td><a href="<?=base_url().'resultado/listar?j='.$jornada->id; ?>">Ver resultados</a></td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info">
				No hay jornadas dados de alta<br/><br />
				<a class="btn btn-primary" href="<?= base_url().'jornada/create'; ?>">Dar de alta</a>
			</div>
		<?php endif;?>
	</div>
</div>

