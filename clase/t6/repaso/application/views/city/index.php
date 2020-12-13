<div class="row">
	<div class="col">
		<h3>Cities</h3>
		<hr />
		<div class="text-right">
			<a href="<?=base_url().'city/create';?>" class="btn btn-primary">Crear</a>
		</div>

		<?php if(sizeOf($cities) > 0 ) { ?>
			<table class="table table-striped mt-5">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">City</th>
			      <th scope="col">Country</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$i=0;
			  		foreach($cities as $item):
			  			$i++;
			  	?>
			  		<tr>
			  			<td><?= $i; ?></td>
			  			<td><?= $item->name; ?></td>
			  			<td><?= $item->country->name; ?></td>
			  		</tr>
			  	<?php endforeach; ?>
			  </tbody>
			</table>
		<?php } else {?>
			<div class="alert alert-warning mt-5">
				<p>No hay cities.</p>
				<a href="<?=base_url().'city/create';?>" class="btn btn-primary">Dar de alta</a>
			</div>
		<?php } ?>
	</div>
</div>
