<div class="row mt-5">
	<div class="col">
		<h3>Listado Aficiones</h3>
		<?php if(isRolValid('usuario') or isRolValid('admin')):?>
			<div class="text-right">
				<a href="<?=base_url()?>aficion/create" class="btn btn-primary">Crear</a>
			</div>
		<?php endif; ?>
		<table class="table table-striped mt-5">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">Afición</th>
		      <?php if(isRolValid('usuario') or isRolValid('admin')):?>
			      <th scope="col" class="text-right">Acción</th>
			  <?php endif; ?>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		foreach($aficiones as $aficion):
		  	?>
		  		<tr>
		  			<td><?= $aficion->id; ?></td>
		  			<td><?= $aficion->nombre; ?></td>
		  			<?php if(isRolValid('usuario') or isRolValid('admin')):?>
		  			<td class="text-right">
		  				<form action="" method="post" id="formAccion-<?= $aficion->id;?>" >
		  					<input type="hidden" name="id" value="<?= $aficion->id; ?>">
		  				</form>
		  				<?php if(isRolValid('usuario') or isRolValid('admin')):?>
			  				<button class="btn btn-info btn-sm" onclick="accion('get',<?= $aficion->id; ?>,'<?=base_url().'aficion/update/';?>');"><i class="fas fa-edit"></i></button>
			  			<?php endif; ?>
			  			<?php if(isRolValid('admin')):?>
				  			<button class="btn btn-danger btn-sm" onclick="accion('get',<?= $aficion->id; ?>,'<?=base_url().'aficion/delete/'?>');"><i class="fas fa-trash"></i></button>
				  		<?php endif;?>
		  			</td>
		  		<?php endif; ?>
		  		</tr>
		  	<?php endforeach; ?>
		  </tbody>
		</table>
	</div>
</div>
<script>
	function accion(id, tipo) {
		var form = document.getElementById('formAccion-'+id);
		form.action=tipo;
		form.submit();
	}
</script>