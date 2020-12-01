		<div class="row pt-2">
			<div class="col">
				<h2>Dar de alta Persona</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
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
						<label for="dni" class="font-weight-bold">Selecciona País</label><br />
						<select name="idPais" class="form-control">
							<?php foreach($paises as $pais): ?>
								<option value="<?=$pais->id?>"><?=$pais->nombre?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="idPersona" class="font-weight-bold">Selecciona aficiones</label><br />
						<?php foreach($aficiones as $aficion):?>
							<input type="checkbox" name="idsAficiones[]" id="id-<?=$aficion->id;?>" value="<?=$aficion->id;?>" /> <label for="id-<?=$aficion->id;?>"><?=$aficion->nombre;?></label><br />
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

		<?=volver('persona')?>
