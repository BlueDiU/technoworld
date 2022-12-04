<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="col-sm-10" style="margin-left: 150px"><br>
  <div class="text-center well" style="color: white;background: #337AB7;">
    <h2>Lista de Clientes</h2>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="well">
        <nav class="float-right"><?php ?><a href="#" onclick="Limpiar()" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Agregar Nuevo Cliente</a><?php ?><br><br></nav>
        <table class="table table-striped" id="mydata">
          <thead>
            <tr>
              <th>Dui cliente</th>
              <th>Nombre cliente</th>
              <th>Telefono cliente</th>
              <th>Correo cliente</th>
              <th>Fecha de nacimiento cliente</th>
              <th>Direccion cliente</th>
              <th>Usuario</th>

              <th>Acciones</th>

            </tr>
          </thead>
          <tbody id="show_data">
            <?php
            foreach ($clientes as $clie) {
              echo "<tr>";
              echo "<td>" . $clie->dui . "</td>";
              echo "<td>" . $clie->nombre . "</td>";
              echo "<td>" . $clie->telefono . "</td>";
              echo "<td>" . $clie->correo . "</td>";
              echo "<td>" . $clie->fecha_nacimiento . "</td>";
              echo "<td>" . $clie->direccion . "</td>";
              echo "<td>" . $clie->usuario . "</td>";


              echo "<td>";
              echo "<a class='btn btn-success' title='Editar Cliente' onclick='editar(" . $clie->id_cliente . ")'><span class='glyphicon glyphicon-edit'></span></a>";

              echo " <a class='btn btn-danger' onclick='eliminar(" . $clie->id_cliente . ")' title='Eliminar Cliente'><span class='glyphicon glyphicon-trash'></span></a>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ADD -->
<form id="frmDepto">
  <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Agregar nuevo cliente</h3>
   
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div id="validacion" style="color:red"></div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Dui:</label>
              <input type="text" name="dui" id="dui" class="form-control" placeholder="Dui cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Nombre cliente:</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Telefono cliente:</label>
              <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Correo cliente:</label>
              <input type="text" name="correo" id="correo" class="form-control" placeholder="Correo cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Fecha de nacimiento del cliente:</label>
              <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha de nacimiento">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Direccion cliente:</label>
              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Direccion cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Usuario:</label>
              <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Contraseña:</label>
              <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña cliente">
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <button type="button" id="btn_save" class="btn btn-primary">
            Guardar</button>

        </div>
      </div>
    </div>
  </div>
</form>
<!--END MODAL ADD-->

<!-- MODAL EDIT -->
<form id="frmDepto">
  <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLabel">Editar cliente</h3>
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div id="validacion_edit" style="color:red"></div>
            <input type="hidden" name="id_cliente" id="id_cliente" class="form-control">
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Dui:</label>
              <input type="text" name="edit_dui" id="edit_dui" class="form-control" placeholder="Dui cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Nombre cliente:</label>
              <input type="text" name="edit_nombre" id="edit_nombre" class="form-control" placeholder="Nombre cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Telefono cliente:</label>
              <input type="text" name="edit_telefono" id="edit_telefono" class="form-control" placeholder="Telefono cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Email cliente:</label>
              <input type="text" name="edit_correo" id="edit_correo" class="form-control" placeholder="Email cliente">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Fecha de nacimiento del cliente:</label>
              <input type="date" name="edit_fecha" id="edit_fecha" class="form-control" placeholder="Fecha de nacimiento">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Direccion cliente:</label>
              <input type="text" name="edit_direccion" id="edit_direccion" class="form-control" placeholder="Direccion cliente">
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <button type="button" id="btn_edit" class="btn btn-primary" onclick="edit_cliente();">
            Editar</button>

        </div>

      </div>

    </div>
  </div>
</form>
<!--END MODAL EDIT-->

<!--MODAL DELETE-->
<form>
  <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar cliente</h5>
 
        </div>
        <div class="modal-body">
          <strong>¿Seguro que desea eliminar este cliente?</strong>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="code_cliente" id="code_cliente" class="form-control" readonly>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" id="btn_delete" class="btn btn-primary" onclick="delete_cliente();">Aceptar</button>
        </div>
      </div>
    </div>
  </div>
</form>
<!--END MODAL DELETE-->




<script type="text/javascript">
  $("#mydata").dataTable({
    bAutoWidth: false,
    oLanguage: {
      sSearch: "Buscador: ",
    },
  });

  $("#btn_save").click(function() {
    //Capturamos los valores del formulario
    var dui = $("#dui").val();
    var nombre = $("#nombre").val();
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
        dui: dui,
        nombre: nombre,
        telefono: telefono,
        correo: correo,
        fecha: fecha,
        direccion: direccion,
        usuario: usuario, 
        password: password,
      },
      success: function(data) {
        if (data == null) {
          document.getElementById("validacion").innerHTML = "";
          $("#Modal_Add").modal("toggle");
          Swal.fire(
            "Ingreso!",
            "Cliente ingresado con exito!!",
            "success"
          ).then(() => {
            location.reload();
          });
        } else {
          document.getElementById("validacion").innerHTML = data;
        }
      },
      error: function(data) {
        var a = JSON.stringify(data["responseText"]);
        alert(a);
        this.disabled = false;
      },
    });
  });

  function editar(codigo) {
    //console.log(codigo);

    document.getElementById("validacion_edit").innerHTML = "";
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Clientes/llenar_clientes') ?>",
      dataType: "JSON",
      data: {
        codigo: codigo
      },
      success: function(data) {
        //console.log("entre");
        //console.log(data);
        $('[name="id_cliente"]').val(codigo);
        $('[name="edit_dui"]').val(data[0].dui);
        $('[name="edit_nombre"]').val(data[0].nombre);
        $('[name="edit_telefono"]').val(data[0].telefono);
        $('[name="edit_correo"]').val(data[0].correo);
        $('[name="edit_fecha"]').val(data[0].fecha_nacimiento);
        $('[name="edit_direccion"]').val(data[0].direccion);

        $("#Modal_Edit").modal("show");
      },
      error: function(data) {
        var a = JSON.stringify(data["responseText"]);
        alert(a);
        this.disabled = false;
      },
    });
  }

  function edit_cliente() {
    //Capturamos los valores del formulario
    var id_edit = $("#id_cliente").val();
    var edit_dui = $("#edit_dui").val();
    var edit_nombre = $("#edit_nombre").val();
    var edit_telefono = $("#edit_telefono").val();
    var edit_correo = $("#edit_correo").val();
    var edit_fecha = $("#edit_fecha").val();
    var edit_direccion = $("#edit_direccion").val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Clientes/editar_cliente') ?>",
      dataType: "JSON",
      //data : {titulo:titulo,url:url,extracto:extracto,categoria:categoria,archivo1:archivo1,archivos2:archivos2,archivos3:archivos3},
      data: {
        id_edit: id_edit,
        edit_dui: edit_dui,
        edit_nombre: edit_nombre,
        edit_telefono: edit_telefono,
        edit_correo: edit_correo,
        edit_fecha: edit_fecha,
        edit_direccion: edit_direccion,
      },
      success: function(data) {
        if (data == null) {
          document.getElementById("validacion_edit").innerHTML = "";
          $("#Modal_Edit").modal("toggle");
          Swal.fire("Editar!", "Cliente editado con exito!!", "success").then(
            () => {
              location.reload();
            }
          );
        } else {
          document.getElementById("validacion_edit").innerHTML = data;
        }
      },
      error: function(data) {
        var a = JSON.stringify(data["responseText"]);
        alert(a);
        this.disabled = false;
      },
    });
  }

  function eliminar(code) {
    $('[name="code_cliente"]').val(code);
    $("#Modal_Delete").modal("show");
  }

  function delete_cliente() {
    var code = $("#code_cliente").val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Clientes/eliminar_cliente') ?>",
      dataType: "JSON",

      data: {
        code: code
      },
      success: function(data) {
        $("#Modal_Delete").modal("toggle");
        Swal.fire("Eliminar!", "Cliente eliminado con exito!!", "success").then(
          () => {
            location.reload();
          }
        );
      },
      error: function(data) {
        var a = JSON.stringify(data["responseText"]);
        alert(a);
        this.disabled = false;
      },
    });
  }

  function Limpiar(){
    document.getElementById("validacion").innerHTML = "";
    document.getElementById("validacion_edit").innerHTML = "";
  }
</script>