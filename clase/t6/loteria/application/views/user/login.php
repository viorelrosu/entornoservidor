<div class="row">
  <div class="col-6 offset-3">
    <h2>Iniciar Sesión</h2>
    <hr>
    <?= getMsg($_msg);?>
  </div>
</div>
<div class="row">
  <div class="col-6 offset-3">

    <form action="<?=base_url().'user/loginPost';?>" method="post">
      <input type="email" name="inputEmail" id="inputDni" class="form-control mb-2" placeholder="Introduce Email" required="required" autofocus="">
      <input type="password" name="inputPassword" id="inputPassword" class="form-control mb-2" placeholder="Introduce Contraseña" required="required">
      <button class="btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
    </form>

  </div>
</div>

<div class="row">
	<div class="col-6 offset-3">
		<?=volver('home');?>
	</div>
</div>