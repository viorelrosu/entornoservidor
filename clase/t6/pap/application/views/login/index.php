<div class="row mt-5">
  <div class="col-6 offset-3">
      <main class="form-signin">
  <form action="<?=base_url().'login/check';?>" method="post">
    
    <h1 class="h3 mb-3 fw-normal">Iniciar sesión</h1>
    <label for="inputDni" class="visually-hidden">Dni</label>
    <input type="email" id="inputDni" class="form-control" placeholder="Dni" required="" autofocus="">
    <label for="inputPassword" class="visually-hidden">Contraseña</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required="">
    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar sesión</button>
    <p class="mt-5 mb-3 text-muted">© 2020 - PAP</p>
  </form>
</main>
  </div>
</div>
