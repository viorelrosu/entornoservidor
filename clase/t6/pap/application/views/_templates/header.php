<div class="row py-2">
	<div class="col-6">
		<?=isset($_head['titulo']) ? $_head['titulo'] : 'Aplicación P.A.P'; ?>
	</div>
	<div class="col-6 text-right">
		<?php if( !isset($_header['usuario']) ):?>
			<a href="<?=base_url().'registro'?>">Registro</a> |
			<a href="<?=base_url().'login'?>">Login</a>
		<?php else: ?>
			Hola <?=$_header['usuario']->nombre; ?> |
			<a href="<?=base_url().'logout'?>">Logout</a>
		<?php endif;?>
	</div>
</div>