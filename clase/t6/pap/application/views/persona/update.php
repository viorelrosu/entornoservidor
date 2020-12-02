		<div class="row pt-2">
			<div class="col">
				<h2>Modificar Persona</h2>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<form action="<?=base_url().'persona/updatePost'?>" method="post" >
					<input type="hidden" name="id" value="<?= $persona->id; ?>" />
					<div class="form-group">
						<label for="nombre" class="font-weight-bold">Introduce Nombre</label><br />
						<input type="text" class="form-control" id="nombre" name="nombre" value="<?= $persona->nombre; ?>" />
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Introduce DNI</label><br />
						<input type="text" class="form-control" id="dni" name="dni" value="<?= $persona->dni; ?>" />
					</div>
					<div class="form-group">
						<label for="idPais" class="font-weight-bold">Selecciona País</label><br />
						<select name="idPais" class="form-control">
							<?php foreach($paises as $pais): ?>
								<option value="<?=$pais->id?>" <?php echo ($persona->pais_id == $pais->id)? 'selected':''?>><?=$pais->nombre;?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="dni" class="font-weight-bold">Selecciona Aficiones</label><br />
							<?php
								foreach($aficiones as $aficion):
								$checked = (in_array($aficion->id, arrayBeansToArrayIds($persona->ownGustaList()))) ? 'checked="checked"' : '';
							?>
								<input type="checkbox" name="idsAficiones[]" value="<?=$aficion->id?>" id="id-<?=$aficion->id?>" <?=$checked;?> /> <label for="id-<?=$aficion->id;?>"><?=$aficion->nombre?></label><br />
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

		<?=volver('persona');?>