<div class="row">
	<div class="col">
		<h3>Countries</h3>
		<hr />
		<div class="text-right">
			<a href="<?=base_url().'country/create';?>" class="btn btn-primary">Crear</a>
		</div>

		<?php if(sizeOf($countries) > 0 ) { ?>
			<table class="table table-striped mt-5">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Country</th>
			      <th scope="col">Cities</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$i=0;
			  		foreach($countries as $country):
			  			$i++;
			  	?>
			  		<tr>
			  			<td><?= $i; ?></td>
			  			<td><?= $country->name; ?></td>
			  			<td>
			  				<?php if(sizeOf($country->ownCityList)>0){?>
				  				<span class="badge badge-pill badge-primary"><?=sizeOf($country->ownCityList);?></span>
				  			<?php } else {?>
				  				<span class="badge badge-pill badge-danger">&times;</span>
				  			<?php } ?>
			  			</td>
			  		</tr>
			  	<?php endforeach; ?>
			  </tbody>
			</table>
		<?php } else {?>
			<div class="alert alert-warning mt-5">
				<p>No hay countries.</p>
				<a href="<?=base_url().'country/create';?>" class="btn btn-primary">Dar de alta</a>
			</div>
		<?php } ?>
	</div>
</div>
