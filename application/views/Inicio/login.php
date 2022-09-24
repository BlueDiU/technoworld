<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
  
    <title>LOGIN</title>
  </head>
  <body class="user-sign">
    <!-- ONLY -->
    <main class="container center-container d-flex justify-content-center align-items-center">
      <div class=" w-50 shadow p-3 mb-5 bg-body rounded">
        <div class="card-header py-3 bg-white global-red-color fw-bold">Acceder</div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="mb-3">
              <img
                src="<?= base_url();?>\assets\images\logo.png"
                alt="logo"
                height="122"
                width="106"
                class="img-fluid center-block mb-4"
              />
              <div class="mb-3 px-3">
                <input
                  type="text"
                  name="usuario"
                  id="usuario"
                  class="form-control"
                  required
                  placeholder="Usuario"
                  title="Ingrese su usuario"
                />
              </div>
              <div class="mb-3 px-3">
                <input
                  name="password"
                  id="password"
                  type="password"
                  class="form-control"
                  placeholder="Ingrese su contraseña"
                  required
                />
              </div>
              <div class="center-all my-2">
                <a href="<?= base_url();?>index.php/Inicio/registrarse" class="custom-link">Crear un cuenta</a>
              </div>
              <button
                class="btn btn-primary center-block"
                type="submit"
              >
                Continuar
              </button>
              <a class="btn button" href="<?= base_url();?>index.php/Inicio">Salir</a>
            </div>
          </form>
        </div>
      </div>
    </main>
    <!-- END ONLY -->
  </body>
</html>
