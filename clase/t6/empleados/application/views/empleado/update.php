		<div class="row">
			<div class="col">
				<h2>Modificar Empleado</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form action="<?=base_url().'empleado/updatePost'?>" method="post" >
					<input type="hidden" name="id" value="<?= $empleado->id; ?>" />
					<div class="form-group">
						<label for="nombre" class="font-weight-bold">Introduce Nombre</label><br />
						<input type="text" class="form-control" id="nombre" name="nombre" value="<?= $empleado->nombre; ?>" />
					</div>
					<div class="form-group">
						<label for="apellidos" class="font-weight-bold">Introduce Apellidos</label><br />
						<input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $empleado->apellidos; ?>" />
					</div>
					<div class="form-group">
						<label for="telefono" class="font-weight-bold">Introduce Teléfono</label><br />
						<input type="text" class="form-control" id="telefono" name="telefono" value="<?= $empleado->apellidos; ?>" />
					</div>
					<div class="form-group">
						<label for="idCiudad" class="font-weight-bold">Selecciona Ciudad Nacimiento</label><br />
						<select name="idCiudad" class="form-control">
							<?php foreach($ciudades as $ciudad): ?>
								<option value="<?=$ciudad->id?>" <?= ($empleado->ciudad_nacimiento_id == $ciudad->id)? 'selected="selected"':''?>><?=$ciudad->nombre;?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="idsLenguajes" class="font-weight-bold">Selecciona Lenguajes</label><br />
							<?php
								foreach($lenguajes as $lenguaje):
								$checked = ( empleadoTieneLenguaje($empleado,$lenguaje) ) ? 'checked="checked"' : '';
							?>
								<input type="checkbox" name="idsLenguajes[]" value="<?=$lenguaje->id?>" id="id-<?=$lenguaje->id?>" <?=$checked;?> /> <label for="id-<?=$lenguaje->id;?>"><?=$lenguaje->nombre?></label><br />
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

		<?=volver('empleado');?>