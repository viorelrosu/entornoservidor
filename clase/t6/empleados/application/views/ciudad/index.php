<div class="row mt-5">
	<div class="col">
		<h3>Ciudades</h3>
		<hr />
		<div class="text-right">
			<a href="<?=base_url().'ciudad/create';?>" class="btn btn-primary">Crear</a>
		</div>

		<?php if(sizeOf($ciudades) > 0): ?>
		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Ciudad</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach($ciudades as $ciudad):
		  			$i++;
		  	?>
		  		<tr>
		  			<td><?= $i; ?></td>
		  			<td><?= $ciudad->nombre; ?></td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info mt-2">
				No hay ciudades<br/><br />
				<a class="btn btn-primary" href="<?= base_url().'ciudad/create'; ?>">Dar de alta</a>
			</div>
		<?php endif;?>
	</div>
</div>
