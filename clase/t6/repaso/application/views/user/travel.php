		<div class="row">
			<div class="col">
				<h2>Register Travel</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form action="<?=base_url().'user/createTravelPost';?>" method="post" >
					<div class="form-group">
						<label for="idUser" class="font-weight-bold">Selecciona User</label><br />
						<select name="idUser" class="form-control">
							<option value="">Selecciona user</option>
							<?php foreach($users as $item): ?>
								<option value="<?=$item->id;?>"><?=$item->dni;?> (<?=$item->name;?>)</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="idCity" class="font-weight-bold">Selecciona City (travelled)</label><br />
							<?php foreach($cities as $city): ?>
								<input type="checkbox" name="idsCity[]" id="id-<?=$city->id;?>" value="<?=$city->id;?>" /> <label for="id-<?=$city->id;?>"><?=$city->name;?></label><br />
							<?php endforeach; ?>
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
