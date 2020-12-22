		<div class="row">
			<div class="col-6 offset-3">
				<h2>Alta Premio</h2>
				<hr>
				<?= getMsg($_msg);?>
			</div>
		</div>
		<div class="row">
			<div class="col-6 offset-3">
				<form action="<?=base_url().'premio/createPost';?>" method="post" >
					<div class="form-group">
						<label for="numero" class="font-weight-bold">Número</label><br />
						<input type="number" min="1" class="form-control" id="numero" name="numero" value="" placeholder="Introduce número"/>
					</div>
					<div class="form-group">
						<label for="idTipo" class="font-weight-bold">Selecciona Tipo de Premio</label><br />
						<select name="idTipo" class="form-control">
							<?php foreach($tipos as $tipo): ?>
								<option value="<?=$tipo->id?>"><?=$tipo->nombre?></option>
							<?php endforeach; ?>
						</select>
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
