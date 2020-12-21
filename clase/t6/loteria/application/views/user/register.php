		<div class="row">
			<div class="col-6 offset-3">
				<form action="<?=base_url().'persona/createPost';?>" method="post" >
					<div class="form-group">
						<label for="nombre" class="font-weight-bold">Introduce Nombre</label><br />
						<input type="text" class="form-control" id="nombre" name="nombre" value="" />
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Introduce DNI</label><br />
						<input type="text" class="form-control" id="dni" name="dni" value="" />
					</div>
					<div class="form-group">
						<label for="password" class="font-weight-bold">Introduce Contraseña</label><br />
						<input type="password" class="form-control" id="password" name="password" value="" />
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
				<?=volver('home');?>
			</div>
		</div>
