		<div class="row">
			<div class="col">
				<h2>Dar de alta Jornada</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form action="<?=base_url().'jornada/createPost';?>" method="post" >
					<div class="form-group">
						<label for="numero" class="font-weight-bold">Introduce Número</label><br />
						<input type="number" class="form-control" id="numero" name="numero" value="" />
					</div>
					<div class="form-group">
						<label for="fechaInicio" class="font-weight-bold">Introduce Fecha Inicio</label><br />
						<input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="" />
					</div>
					<div class="form-group">
						<label for="fechaFin" class="font-weight-bold">Introduce Fecha Fin</label><br />
						<input type="date" class="form-control" id="fechaFin" name="fechaFin" value="" />
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<input type="submit" value="Guardar" class="btn btn-primary"/>
						</div>
					</div>
				</form>
			</div>
		</div>

		<?=volver('equipo')?>
