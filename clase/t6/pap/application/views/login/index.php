<div class="row mt-5">
  <div class="col-6 offset-3">
      <main class="form-signin">
  <form action="<?=base_url().'persona/loginPost';?>" method="post">
    <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>
    <input type="text" name="inputDni" id="inputDni" class="form-control mb-2" placeholder="Dni" required="" autofocus="">
    <input type="password" name="inputPassword" id="inputPassword" class="form-control mb-2" placeholder="Contraseña" required="">
    <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
  </form>
</main>
  </div>
</div>
