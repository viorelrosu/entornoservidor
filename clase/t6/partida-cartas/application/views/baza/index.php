<div class="row mt-5">
	<div class="col">
		<h3>Listado Bazas</h3>
		<hr />
		<div class="text-right">
			<a href="<?=base_url().'baza/create';?>" class="btn btn-primary">Crear</a>
		</div>

		<?php if(sizeOf($bazas) > 0):?>
		<table class="table table-striped table-bordered mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Baza</th>
		      <?php foreach($jugadores as $jugador): ?>
	  			<th class="text-center"><?=$jugador->nombre; ?></th>
	  		  <?php endforeach;?>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0; $totales = [];
		  		foreach($bazas as $baza):
		  			$i++
		  	?>
		  		<tr>
		  			<td><?= $i; ?></td>
		  			<td><?= 'Baza '.$baza->numero; ?></td>
		  			<?php foreach($jugadores as $jugador): ?>
		  				<?php
			  				$puntuacion  = puntuacionJugadorBaza($jugador,$baza);
			  				if($puntuacion != null) {
			  					$class = '';
				  				if( esPuntuacionMasBaja($baza->ownPuntuacionList, $puntuacion) ) {
				  					$class = 'bg-warning';
				  				}

				  				if( in_array($jugador->nombre, array_keys($totales)) ) {
				  					$totales[$jugador->nombre] += $puntuacion->puntuacion;
				  				} else {
				  					$totales[$jugador->nombre] = $puntuacion->puntuacion;
				  				}

				  				if( $totales[$jugador->nombre] > 200){
				  					$class = 'bg-danger';
				  				}
			  				}

		  				?>
		  				<?php if($puntuacion != null):?>
			  				<td class="<?=$class;?> text-center"><?= $puntuacion->puntuacion . '/' . ($totales[$jugador->nombre]); ?></td>
			  			<?php else : ?>
			  				<td class="text-center">X</td>
			  			<?php endif;?>
			  		<?php endforeach;?>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
		<?php else: ?>
			<div class="alert alert-info mt-2">
				No hay bazas.<br /><br />
				<a class="btn btn-primary" href="<?= base_url().'baza/create';?>">Dar de alta</a></div>
		<?php endif; ?>
	</div>
</div>
