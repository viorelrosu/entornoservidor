<div class="row">
	<div class="col">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<!-- <a class="navbar-brand" href="<?=base_url()?>">Lotería</a> -->
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>
			  <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav mr-auto">
			    	<li class="nav-item <?= (isset($_nav['active']) and $_nav['active'] == 'inicio') ? 'active' : '';?>">
			        <a class="nav-link" href="<?=base_url().'home'?>">Inicio</a>
			      </li>
			      	<?php if(isRolValid('admin') or isRolValid('usuario')): ?>
						<li class="nav-item <?= (isset($_nav['active']) and $_nav['active'] == 'boleto') ? 'active' : '';?>">
							<a class="nav-link" href="<?=base_url().'boleto'?>">Boletos</a>
						</li>
						<li class="nav-item <?= (isset($_nav['active']) and $_nav['active'] == 'premio') ? 'active' : '';?>">
							<a class="nav-link" href="<?=base_url().'premio'?>">Premios</a>
						</li>
						<li class="nav-item <?= (isset($_nav['active']) and $_nav['active'] == 'tipo') ? 'active' : '';?>">
							<a class="nav-link" href="<?=base_url().'tipo'?>">Tipos de Premio</a>
						</li>
					<?php endif; ?>
					<?php if(isRolValid('admin')):?>
						<li class="nav-item <?= (isset($_nav['active']) and $_nav['active'] == 'user') ? 'active' : '';?>">
							<a class="nav-link" href="<?=base_url().'user'?>">Usuarios</a>
						</li>
					<?php endif; ?>
				</ul>
			  </div>
		</nav>

	</div>
</div>

<main role="main" class="container py-5" style="min-height: 500px;">
