<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 
    <title>Registro</title>
  </head>
  <body class="user-sign">
    <!-- ONLY -->
    <main
      class="container center-container d-flex justify-content-center align-items-center"
    >
      <div class="w-50 shadow p-3 mb-5 bg-body rounded">
        <div
          class="card-header py-3 bg-white global-red-color fw-bold"
        >
          Crea una cuenta
        </div>
        <div class="card-body">
          <form>
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
                  name="nombre"
                  type="text"
                  class="form-control"
                  placeholder="Nombre completo"
                  title="Nombre sólo acepta letras y espacios en blanco"
                  required
                  pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$"
                  autocomplete="off"
                />
              </div>
              <div class="mb-3 px-3">
                <input
                  type="text"
                  name="correo"
                  class="form-control"
                  required
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"
                  placeholder="Correo electrónico"
                  autocomplete="off"
                  title="Ingrese un correo electrónico válido"
                />
              </div>
              <div class="mb-3 px-3">
                <input
                  name="password"
                  type="password"
                  class="form-control"
                  placeholder="Contraseña"
                  autocomplete="off"
                  required
                />
              </div>

              <div class="center-all my-2">
                <a href="<?= base_url();?>index.php/Inicio/login" class="custom-link"
                  >Ya tengo un cuenta</a
                >
              </div>
              <button
                class="btn btn-primary center-block"
                type="submit"
              >
                Crear cuenta
              </button>
            </div>
          </form>
        </div>
      </div>
    </main>
    <!-- END ONLY -->
  </body>
</html>
