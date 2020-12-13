		<div class="row">
			<div class="col">
				<h2>Dar de alta City</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form action="<?=base_url().'city/createPost';?>" method="post" >
					<div class="form-group">
						<label for="name" class="font-weight-bold">Introduce Name</label><br />
						<input type="text" class="form-control" id="name" name="name" value="" />
					</div>
					<div class="form-group">
						<label for="idCountry" class="font-weight-bold">Selecciona Country</label><br />
						<select name="idCountry" class="form-control">
							<?php foreach($countries as $country): ?>
								<option value="<?=$country->id;?>"><?=$country->name;?></option>
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

		<?=volver('city')?>
