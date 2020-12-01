<div class="row mt-5">
	<div class="col">
		<h2>Modificar Afición</h2>
	</div>
</div>
<div class="row">
	<div class="col">
		<form action="<?=base_url().'aficion/updatePost'?>" method="post" >
			<input type="hidden" name="id" value="<?= $aficion->id; ?>" />
			<div class="form-group">
				<label for="nombre" class="font-weight-bold">Introduce Nombre</label><br />
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?= $aficion->nombre; ?>" />
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" value="Guardar" class="btn btn-primary"/>
				</div>
			</div>
		</form>
	</div>
</div>