		<div class="row">
			<div class="col-6 offset-3">
				<h2>Modificar Tipo Premio</h2>
				<hr>
				<?= getMsg($_msg);?>
			</div>
		</div>
		<div class="row">
			<div class="col-6 offset-3">
				<form action="<?=base_url().'tipo/updatePost';?>" method="post" >
					<input type="hidden" name="id" value="<?= $tipo->id; ?>">
					<div class="form-group">
						<label for="nombre" class="font-weight-bold">Nombre</label><br />
						<input type="text" class="form-control" id="nombre" name="nombre" value="<?= $tipo->nombre; ?>" placeholder="Introduce nombre"/>
					</div>
					<div class="form-group">
						<label for="multiplicador" class="font-weight-bold">Multiplicador</label><br />
						<input type="number" class="form-control" id="multiplicador" name="multiplicador" value="<?= $tipo->multiplicador; ?>" placeholder="Introduce multiplicador" />
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
				<?=volver('tipo');?>
			</div>
		</div>
