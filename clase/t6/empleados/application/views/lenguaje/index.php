<div class="row mt-5">
	<div class="col">
		<h3>Lenguajes de Programación</h3>
		<hr />
		<div class="text-right">
			<a href="<?=base_url().'lenguaje/create';?>" class="btn btn-primary">Crear</a>
		</div>

		<?php if(sizeOf($lenguajes) > 0): ?>
		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Lenguaje</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach($lenguajes as $lenguaje):
		  			$i++;
		  	?>
		  		<tr>
		  			<td><?= $i; ?></td>
		  			<td><?= $lenguaje->nombre; ?></td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info mt-2">
				No hay lenguajes de programación<br/><br />
				<a class="btn btn-primary" href="<?= base_url().'lenguaje/create'; ?>">Dar de alta</a>
			</div>
		<?php endif;?>
	</div>
</div>
