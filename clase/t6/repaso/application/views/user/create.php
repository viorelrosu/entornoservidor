		<div class="row">
			<div class="col">
				<h2>Dar de alta User</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form action="<?=base_url().'user/createPost';?>" method="post" >
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Introduce DNI</label><br />
						<input type="text" class="form-control" id="dni" name="dni" value="" />
					</div>
					<div class="form-group">
						<label for="name" class="font-weight-bold">Introduce Name</label><br />
						<input type="text" class="form-control" id="name" name="name" value="" />
					</div>
					<div class="form-group">
						<label for="idCity" class="font-weight-bold">Selecciona City (born)</label><br />
						<select name="idCity" class="form-control">
							<?php foreach($cities as $city): ?>
								<option value="<?=$city->id;?>"><?=$city->name;?></option>
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

		<?=volver('country')?>
