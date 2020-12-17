<div class="row mt-5">
	<div class="col">
		<h3>Listado Jugadores</h3>
		<hr />
		<div class="text-right">
			<a href="<?=base_url().'jugador/create';?>" class="btn btn-primary">Crear</a>
		</div>

		<?php if(sizeOf($jugadores) > 0):?>
		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Jugador</th>
		      <th scope="col">Puntuación</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach($jugadores as $item):
		  			$i++
		  	?>
		  		<tr>
		  			<td><?= $i; ?></td>
		  			<td><?= $item->nombre; ?></td>
		  			<td><?= getPuntuacionTotal($item);?></td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info mt-2">
				No hay jugadores.<br /><br />
				<a class="btn btn-primary" href="<?= base_url().'jugador/create';?>">Dar de alta</a></div>
		<?php endif; ?>
	</div>
</div>
