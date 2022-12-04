<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
  <main class="container center-container d-flex justify-content-center align-items-center">
    <div class="w-50 shadow p-3 mb-5 bg-body rounded">
      <div class="card-header py-3 bg-white global-red-color fw-bold">
        Crea una cuenta
      </div>
      <div class="card-body">
        <form action="" method="POST">
          <div class="mb-3">
            <img src="<?= base_url(); ?>\assets\images\logo.png" alt="logo" height="122" width="106" class="img-fluid center-block mb-4" />
            <div class="mb-3 px-3">
              <input name="nombre" id="nombre" type="text" class="form-control" placeholder="Nombre completo" title="Nombre sólo acepta letras y espacios en blanco" required pattern="^[A-Za-zÑñÁáÉéÍíÓóÚúÜü\s]+$" autocomplete="off" />
            </div>
            <div class="mb-3 px-3">
              <input name="dui" id="dui" type="text" class="form-control" placeholder="Numero de Dui" title="Ingrese el numero de DUI" required autocomplete="off" />
            </div>
            <div class="mb-3 px-3">
              <input name="telefono" id="telefono" type="text" class="form-control" placeholder="Numero telefono" title="Ingrese el numero de telefono" required autocomplete="off" />
            </div>
            <div class="mb-3 px-3">
              <input type="text" name="correo" id="correo" class="form-control" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="Correo electrónico" autocomplete="off" title="Ingrese un correo electrónico válido" />
            </div>
            <div class="mb-3 px-3">
              <input type="date" name="fecha" id="fecha" class="form-control" required placeholder="Fecha nacimiento" autocomplete="off" title="Ingrese su fecha de nacimiento" />
            </div>
            <div class="mb-3 px-3">
              <input type="text-area" name="direccion" id="direccion" class="form-control" required placeholder="Direccion" autocomplete="off" title="Favor ingrese su direccion" />
            </div>
            <div class="mb-3 px-3">
              <input type="text" name="usuario" id="usuario" class="form-control" required placeholder="Usuario" autocomplete="off" title="Favor ingrese su usuario" />
            </div>
            <div class="mb-3 px-3">
              <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" autocomplete="off" required />
            </div>

            <div class="center-all my-2">
              <a href="<?= base_url(); ?>index.php/Inicio/login" class="custom-link">Ya tengo un cuenta</a>
            </div>
            <button class="btn btn-primary center-block" type="submit" id="btn_registro">
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

<script type="text/javascript">
  $("#btn_registro").click(function() {
    //Capturamos los valores del formulario
    var nombre = $("#nombre").val();
    var dui = $("#dui").val();
    var telefono = $("#telefono").val();
    var correo = $("#correo").val();
    var fecha = $("#fecha").val();
    var direccion = $("#direccion").val();
    var usuario = $("#usuario").val();
    var password = $("#password").val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Clientes/guardar_cliente') ?>",
      dataType: "JSON",

      data: {
        nombre: nombre,
        dui: dui,
        telefono: telefono,
        correo: correo,
        fecha: fecha,
        direccion: direccion,
        usuario: usuario,
        password: password,
      },
      success: function(data) {
        if (data == null) {

          Swal.fire("Ingreso!", "Cliente registrado exitosamente!!", "success").then(
            () => {
              location.reload();
            }
          );
        }
      },
      error: function(data) {
        var a = JSON.stringify(data["responseText"]);
        alert(a);
        this.disabled = false;
      },
    });
  });
</script>