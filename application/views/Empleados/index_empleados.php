<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="col-sm-10" style="margin-left: 150px"><br>
  <div class="text-center well" style="color: white;background: #337AB7;">
    <h2>Lista de empleados</h2>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="well">
        <nav class="float-right"><?php ?><a href="#" onclick="Limpiar()" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Agregar Nuevo Empleado</a><?php ?><br><br></nav>
        <table class="table table-striped table-hover" id="mydata">
          <thead>
            <tr>
              <th>Cargo</th>
              <th>Nombre</th>
              <th>Teféfono</th>
              <th>Fecha de nacimiento</th>
              <th>Dirección</th>
              <th>Usuario</th>


              <th>Acciones</th>

            </tr>
          </thead>
          <tbody id="show_data">
            <?php
            foreach ($empleados as $empl) {
              echo "<tr>";
              echo "<td>" . $empl->tipo_cargo . "</td>";
              echo "<td>" . $empl->nombre . "</td>";
              echo "<td>" . $empl->telefono . "</td>";
              echo "<td>" . $empl->fecha_nacimiento . "</td>";
              echo "<td>" . $empl->direccion . "</td>";
              echo "<td>" . $empl->usuario . "</td>";


              echo "<td>";
              echo "<a class='btn btn-success' title='Editar Empleado' onclick='editar(" . $empl->id_empleado . ")'><span class='glyphicon glyphicon-edit'></span></a>";

              echo " <a class='btn btn-danger' onclick='eliminar(" . $empl->id_empleado . ")' title='Eliminar empleado'><span class='glyphicon glyphicon-trash'></span></a>";
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
          <h3 class="modal-title" id="exampleModalLabel">Agregar nuevo empleado</h3>
          
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div id="validacion" style="color:red"></div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Cargo:</label>
              <select class="form-control" name="cargo" id="cargo" class="form-control">
                <?php
                foreach ($cargo as $carg) {
                  echo "<option value=" . $carg->id_cargo . ">" . $carg->tipo_cargo . "</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Nombre:</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre empleado">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Teléfono:</label>
              <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono contacto">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Fecha de nacimiento</label>
              <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Dirección</label>
              <input type="text" name="direccion" id="direccion" class="form-control" placeholder="Dirección">
            </div>
          </div>

           <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Usuario</label>
              <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Usuario">
            </div>
          </div>

           <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Contraseña</label>
              <input type="password" name="contraseña" id="contraseña" class="form-control" placeholder="Contraseña">
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
          <h3 class="modal-title" id="exampleModalLabel">Editar empleado</h3>
       
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div id="validacion_edit" style="color:red"></div>
            <input type="hidden" name="id_empleado" id="id_empleado" class="form-control">
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Cargo:</label>
              <select class="form-control" name="edit_cargo" id="edit_cargo">
                <?php foreach ($cargo as $carg) {
                  echo "<option value=" . $carg->id_cargo . ">" . $carg->tipo_cargo . "</option>";
                }  ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Nombre:</label>
              <input type="text" name="edit_nombre" id="edit_nombre" class="form-control" placeholder="Nombre empleado">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Telefono:</label>
              <input type="text" name="edit_telefono" id="edit_telefono" class="form-control" placeholder="Telefono contacto">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Fecha de nacimiento:</label>
              <input type="date" name="edit_fecha_nacimiento" id="edit_fecha_nacimiento" class="form-control" placeholder="Fecha de nacimiento del empleado">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Dirección:</label>
              <input type="text" name="edit_direccion" id="edit_direccion" class="form-control" placeholder="Dirección">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <button type="button" id="btn_edit" class="btn btn-primary" onclick="edit_empleado();">
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
          <h5 class="modal-title" id="exampleModalLabel">Eliminar empleado</h5>
         
        </div>
        <div class="modal-body">
          <strong>¿Seguro que desea eliminar este empleado?</strong>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="code_empleado" id="code_empleado" class="form-control" readonly>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" id="btn_delete" class="btn btn-primary" onclick="delete_empleado();">Aceptar</button>
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
    var cargo = $("#cargo").val();
    var nombre = $("#nombre").val();
    var telefono = $("#telefono").val();
    var fecha_nacimiento = $("#fecha_nacimiento").val();
    var direccion = $("#direccion").val();
    var usuario = $("#usuario").val();
    var contraseña = $("#contraseña").val();


    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Empleados/guardar_empleado') ?>",
      dataType: "JSON",

      data: {
        cargo: cargo,
        nombre: nombre,
        telefono: telefono,
        fecha_nacimiento: fecha_nacimiento,
        direccion: direccion,
        usuario: usuario,
        contraseña: contraseña,

      },
      success: function(data) {
        if (data == null) {
          document.getElementById("validacion").innerHTML = "";
          $("#Modal_Add").modal("toggle");
          Swal.fire("Ingreso!", "Empleado ingresado con exito!!", "success").then(
            () => {
              location.reload();
            }
          );
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
      url: "<?php echo site_url('Empleados/llenar_empleados') ?>",
      dataType: "JSON",
      data: {
        codigo: codigo
      },
      success: function(data) {
        //console.log("entre");
        console.log(data);
        $('[name="id_empleado"]').val(codigo);
        $('[name="edit_cargo"]').val(data.ver_empleados[0].id_cargo);

        $('[name="edit_nombre"]').val(data.ver_empleados[0].nombre);
        $('[name="edit_telefono"]').val(data.ver_empleados[0].telefono);
        $('[name="edit_fecha_nacimiento"]').val(data.ver_empleados[0].fecha_nacimiento);
        $('[name="edit_direccion"]').val(data.ver_empleados[0].direccion);


        $("#Modal_Edit").modal("show");
      },
      error: function(data) {
        var a = JSON.stringify(data["responseText"]);
        alert(a);
        this.disabled = false;
      },
    });
  }

  function edit_empleado() {
    //Capturamos los valores del formulario
    var id_edit = $("#id_empleado").val();
    var edit_cargo = $("#edit_cargo").val();
    var edit_nombre = $("#edit_nombre").val();
    var edit_telefono = $("#edit_telefono").val();
    var edit_fecha_nacimiento = $("#edit_fecha_nacimiento").val();
    var edit_direccion = $("#edit_direccion").val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Empleados/editar_empleado') ?>",
      dataType: "JSON",

      data: {
        id_edit: id_edit,
        edit_cargo: edit_cargo,
        edit_nombre: edit_nombre,
        edit_telefono: edit_telefono,
        edit_fecha_nacimiento: edit_fecha_nacimiento,
        edit_direccion: edit_direccion,
      },
      success: function(data) {
        if (data == null) {
          document.getElementById("validacion_edit").innerHTML = "";
          $("#Modal_Edit").modal("toggle");
          Swal.fire("Editar!", "Empleado editado con exito!!", "success").then(
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
    $('[name="code_empleado"]').val(code);
    $("#Modal_Delete").modal("show");
  }

  function delete_empleado() {
    var code = $("#code_empleado").val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Empleados/eliminar_empleado') ?>",
      dataType: "JSON",

      data: {
        code: code
      },
      success: function(data) {
        $("#Modal_Delete").modal("toggle");
        Swal.fire("Eliminar!", "Empleado eliminado con exito!!", "success").then(
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