<div class="row py-2">
	<div class="col-6">
		Aplicación Lotería
	</div>
	<div class="col-6 text-right">
		<?php if( !isset($_header['usuario']) ):?>
			<a href="<?=base_url().'register'?>">Registro</a> |
			<a href="<?=base_url().'login'?>">Login</a>
		<?php else: ?>
			Hola <?=$_header['usuario']->nombre; ?> (<a href="<?= base_url().'user/update'?>">Modificar datos</a>) |
			<a href="<?=base_url().'logout'?>">Logout</a>
		<?php endif;?>
	</div>
</div>
