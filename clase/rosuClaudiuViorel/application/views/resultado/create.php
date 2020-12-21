		<div class="row">
			<div class="col">
				<h2>Registar Resultado</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form action="<?=base_url().'resultado/createPost';?>" method="post" >
					<div class="form-group">
						<label for="idJornada" class="font-weight-bold">Selecciona Jornada</label>
						<select name="idJornada" id="idJornada" class="form-control" style="width: 100px;">
							<?php foreach($jornadas as $jornada): ?>
								<option value="<?=$jornada->id?>"><?=$jornada->numero?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<hr />
					<div class="form-group">
						<label for="idEquipoLocal" class="font-weight-bold">Equipo Local</label>
						<select name="idEquipoLocal" id="idEquipoLocal" class="form-control">
							<?php foreach($equipos as $equipo): ?>
								<option value="<?=$equipo->id?>"><?=$equipo->nombre;?></option>
							<?php endforeach; ?>
						</select>
						<label for="golesEquipoLocal" class="font-weight-bold">Goles</label>
						<input type="number" class="form-control" id="golesEquipoLocal" name="golesEquipoLocal" value="" />
					</div>
					<hr>
					<div class="form-group">
						<label for="idEquipoVisitante" class="font-weight-bold">Equipo Visitante</label>
						<select name="idEquipoVisitante" id="idEquipoVisitante" class="form-control">
							<?php foreach($equipos as $equipo): ?>
								<option value="<?=$equipo->id?>"><?=$equipo->nombre;?></option>
							<?php endforeach; ?>
						</select>
						<label for="golesEquipoVisitante" class="font-weight-bold">Goles</label>
						<input type="number" class="form-control" id="golesEquipoVisitante" name="golesEquipoVisitante" value="" />
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="submit" value="Guardar" class="btn btn-primary"/>
						</div>
					</div>
				</form>
			</div>
		</div>

		<?=volver('home'); ?>
