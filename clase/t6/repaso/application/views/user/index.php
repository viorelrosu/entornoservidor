<div class="row">
	<div class="col">
		<h3>Users</h3>
		<hr />
		<div class="text-right">
			<a href="<?=base_url().'user/create';?>" class="btn btn-primary">New User</a>
			<a href="<?=base_url().'user/createTravel';?>" class="btn btn-primary">Register Travel</a>
		</div>

		<?php if(sizeOf($users) > 0 ) { ?>
			<table class="table table-striped mt-5">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Dni</th>
			      <th scope="col">User</th>
			      <th scope="col">City(born)</th>
			      <th scope="col">City(travel)</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php
			  		$i=0;
			  		foreach($users as $item):
			  			$i++;
			  	?>
			  		<tr>
			  			<td><?= $i; ?></td>
			  			<td><?= $item->dni; ?></td>
			  			<td><?= $item->name; ?></td>
			  			<td><?= $item->born_id != null ? $item->fetchAs('city')->born->name : '-'; ?></td>
			  			<td>
			  				<?php if(sizeOf($item->ownTravelList)>0){?>
				  				<?php foreach($item->ownTravelList as $travel):?>
				  					<span class="badge badge-pill badge-primary"><?=$travel->city->name;?></span>
				  				<?php endforeach;?>
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
				<p>No hay users.</p>
				<a href="<?=base_url().'user/create';?>" class="btn btn-primary">Dar de alta</a>
			</div>
		<?php } ?>
	</div>
</div>
