<div class="row mt-5">
	<div class="col">
		<h3>Resultados Jornada número <?=$jornada->numero?></h3>
		<hr />
		
		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">Equipos</th>
		      <th scope="col">Resultado</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		$i=0;
		  		foreach($jornada->ownResultadoList as $resultado):
		  			$i++;
		  	?>
		  		<tr>
		  			<td>
		  				<?=$resultado->fetchAs('equipo')->local->nombre .' - '. $resultado->fetchAs('equipo')->visitante->nombre; ?></td>
		  			<td><?=$resultado->gl .' - '. $resultado->gv; ?></td>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
	</div>
</div>

<?=volver('jornada');?>

