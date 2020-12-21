<div class="jumbotron mt-3 ">
	<div class="container">
		<div class="row">
			 <h1 class="display-3 font-weight-bold">Bienvenido!</h1>
		</div>

		<div class="row">
			 <div><?=mensaje();?></div>
		</div>
	 
		<div class="row mt-3">
			<a class="btn btn-primary mr-2" href="<?=base_url().'login';?>">Login</a>
			<a class="btn btn-primary" href="<?=base_url().'register';?>">Register</a>
		</div>
	</div>
</div>
