<div class="row mt-3">
	<div class="col">
		<?php
			$class = ($tipo == 'error') ? 'alert-danger' : 'alert-success';
		?>
		<div class="alert <?=$class;?>"><?=$mensaje;?></div>
	</div>
</div>

<?=volver($link); ?>