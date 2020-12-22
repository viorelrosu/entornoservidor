		<div class="row">
			<div class="col-6 offset-3">
				<h2>Intercambiar Participación</h2>
				<hr>
				<?= getMsg($_msg);?>
			</div>
		</div>
		<div class="row">
			<div class="col-6 offset-3">
				<form action="<?=base_url().'boleto/intercambioPost';?>" method="post" >
					<input type="hidden" name="id" value="<?= $boleto->id; ?>">
					<div class="form-group">
						<label for="numero" class="font-weight-bold">Número de Boleto</label><br />
						<input type="number" readonly="readonly" class="form-control" id="numero" name="numero" value="<?= $boleto->numero; ?>" placeholder="Introduce número"/>
					</div>
					<div class="form-group">
						<label for="idUsuario" class="font-weight-bold">Intercambiar con (Selecciona Usuario)</label><br />
						<select name="idUsuario" class="form-control">
							<?php foreach($usuarios as $usuario): ?>
								<?php if($boleto->user->id != $usuario->id):?>
									<option value="<?=$usuario->id?>"><?=$usuario->nombre?></option>
								<?php endif; ?>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="participacion" class="font-weight-bold">Participación (€)</label><br />
						<input type="number" min="1" max="15" class="form-control" id="participacion" name="participacion" value="" placeholder="Introduce participación" />
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="submit" value="Guardar" class="btn btn-primary"/>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="row">
			<div class="col-6 offset-3">
				<?=volver('boleto');?>
			</div>
		</div>
