<div class="row mt-5">
	<div class="col">
		<h2>Modificar País</h2>
	</div>
</div>
<div class="row">
	<div class="col">
		<form action="<?=base_url().'pais/updatePost'?>" method="post" >
			<input type="hidden" name="id" value="<?= $pais->id; ?>" />
			<div class="form-group">
				<label for="nombre" class="font-weight-bold">Introduce País</label><br />
				<input type="text" class="form-control" id="nombre" name="nombre" value="<?= $pais->nombre; ?>" />
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<input type="submit" value="Guardar" class="btn btn-primary"/>
				</div>
			</div>
		</form>
	</div>
</div>