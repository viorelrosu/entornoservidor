		<div class="row">
			<div class="col">
				<h2>Dar de alta Empleado</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form action="<?=base_url().'empleado/createPost';?>" method="post" >
					<div class="form-group">
						<label for="nombre" class="font-weight-bold">Introduce Nombre</label><br />
						<input type="text" class="form-control" id="nombre" name="nombre" value="" />
					</div>
					<div class="form-group">
						<label for="apellidos" class="font-weight-bold">Introduce Apellidos</label><br />
						<input type="text" class="form-control" id="apellidos" name="apellidos" value="" />
					</div>
					<div class="form-group">
						<label for="telefono" class="font-weight-bold">Introduce Teléfono</label><br />
						<input type="telefono" class="form-control" id="telefono" name="telefono" value="" />
					</div>
					<div class="form-group">
						<label for="idCiudad" class="font-weight-bold">Selecciona Ciudad Nacimiento</label><br />
						<select name="idCiudad" class="form-control">
							<?php foreach($ciudades as $ciudad): ?>
								<option value="<?=$ciudad->id?>"><?=$ciudad->nombre?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="idPersona" class="font-weight-bold">Selecciona Lenguajes de Programación</label><br />
						<?php foreach($lenguajes as $lenguaje):?>
							<input type="checkbox" name="idsLenguajes[]" id="id-<?=$lenguaje->id;?>" value="<?=$lenguaje->id;?>" /> <label for="id-<?=$lenguaje->id;?>"><?=$lenguaje->nombre;?></label><br />
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

		<?=volver('empleado')?>
