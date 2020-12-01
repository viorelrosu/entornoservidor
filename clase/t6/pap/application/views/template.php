<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Aplicación P.A.P</title>
	<link href="<?=base_url().'assets/css/bootstrap.min.css'?>" rel="stylesheet">
	<link href="<?=base_url().'assets/css/all.css'?>" rel="stylesheet">
</head>

<body>
	<div class="container">
		<div class="row mt-5">
			<div class="col">
				<h1>Aplicación P.A.P</h1>

				<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  					<a class="navbar-brand" href="#">Menu Principal</a>

					  <div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <ul class="navbar-nav mr-auto">
					    	<li class="nav-item">
					        <a class="nav-link" href="<?=base_url()?>">Inicio</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="<?=base_url().'pais'?>">Países</a>
					      </li>
					      <li class="nav-item">
					        <a class="nav-link" href="<?=base_url().'persona'?>">Personas</a>
					      </li>
					      <li class="nav-item">
						    <a class="nav-link" href="<?=base_url().'aficion'?>">Aficiones</a>
						  </li>
	   					 </ul>
					  </div>
				</nav>

			</div>
		</div>
	</div>

	<div class="container">
		<?php $this->load->view($view); ?>
	</div>
	<script type="text/javascript" src="<?=base_url().'assets/js/app.js';?>"></script>
</body>

</html>