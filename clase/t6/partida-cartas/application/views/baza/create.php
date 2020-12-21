		<div class="row">
			<div class="col">
				<h3>Dar de alta </h3>
				<hr>
				<h2>Baza nº <?= $numero; ?></h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form action="<?=base_url().'baza/createPost';?>" method="post" >
					<input type="hidden" name="numero" value="<?=$numero;?>" />
					<?php foreach($jugadores as $jugador):?>
						<?php if( getPuntuacionTotal($jugador) < 200 ) : ?>
							<div class="form-group">
								<label for="jug-<?=$jugador->id?>" class="font-weight-bold"><?=$jugador->nombre?> (<?= getPuntuacionTotal($jugador);?>)</label><br />
								<input type="text" class="form-control" id="jug-<?=$jugador->id?>" name="jug-<?=$jugador->id?>" value="" placeholder="Introduce puntuación de <?= $jugador->nombre; ?>"/>
							</div>
						<?php endif; ?>
					<?php endforeach; ?>

					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="submit" value="Guardar" class="btn btn-primary"/>
						</div>
					</div>
				</form>
			</div>
		</div>

		<?=volver('baza')?>
