<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="col-sm-10" style="margin-left: 150px"><br>
  <div class="text-center well" style="color: white;background: #337AB7;">
    <h2>Listado de Categorias</h2>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="well">
        <nav class="float-right"><?php ?><a href="#" onclick="Limpiar()" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Agregar Nuevo</a><?php ?><br><br></nav>
        <table class="table table-striped table-hover" id="mydata">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Descripcion</th>
              <th>Acciones</th>

            </tr>
          </thead>
          <tbody id="show_data">
            <?php
            foreach ($categorias as $categ) {
              echo "<tr>";
              echo "<td>" . $categ->nombre_categoria . "</td>";
              echo "<td>" . $categ->descripcion . "</td>";
              echo "<td>";
              echo "<a class='btn btn-success' title='Editar Categoria' onclick='editar(" . $categ->id_categoria . ")'><span class='glyphicon glyphicon-edit'></span></a>";

              echo " <a class='btn btn-danger' onclick='eliminar(" . $categ->id_categoria . ")' title='Eliminar categoria'><span class='glyphicon glyphicon-trash'></span></a>";
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
          <h3 class="modal-title" id="exampleModalLabel">Agregar nueva categoria</h3>
     
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div id="validacion" style="color:red"></div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Nombre:</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre categoria">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Descripcion:</label>
              <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion categoria"></textarea>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <button type="button" id="btn_save" class="btn btn-primary" onclick="save_categoria();">
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
          <h3 class="modal-title" id="exampleModalLabel">Editar Categoria</h3>
 
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div id="validacion_edit" style="color:red"></div>
            <input type="hidden" name="id_categoria" id="id_categoria" class="form-control">
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Nombre:</label>
              <input type="text" name="edit_nombre_categoria" id="edit_nombre_categoria" class="form-control" placeholder="Nombre categoria">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Descripcion:</label>
              <textarea name="edit_descripcion" id="edit_descripcion" class="form-control" placeholder="Descripcion categoria"></textarea>
            </div>
          </div>

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <button type="button" id="btn_edit" class="btn btn-primary" onclick="edit_categoria();">
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
          <h5 class="modal-title" id="exampleModalLabel">Eliminar categoria</h5>
        
        </div>
        <div class="modal-body">
          <strong>¿Seguro que desea eliminar esta categoria?</strong>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="code_categoria" id="code_categoria" class="form-control" readonly>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" id="btn_delete" class="btn btn-primary" onclick="delete_categoria();">Aceptar</button>
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
    var nombre = $("#nombre").val();
    var descripcion = $("#descripcion").val();


    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Categorias/guardar_categoria') ?>",
      dataType: "JSON",

      data: {
        nombre: nombre,
        descripcion: descripcion,
      },
      success: function(data) {
        if (data == null) {
          document.getElementById("validacion").innerHTML = "";
          $("#Modal_Add").modal("toggle");
          Swal.fire("Ingreso!", "Categoria ingresado con exito!!", "success").then(
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

    document.getElementById("validacion_edit").innerHTML = "";
    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Categorias/llenar_categorias') ?>",
      dataType: "JSON",
      data: {
        codigo: codigo
      },
      success: function(data) {
        $('[name="id_categoria"]').val(codigo);
        $('[name="edit_nombre_categoria"]').val(data[0].nombre_categoria);
        $('[name="edit_descripcion"]').val(data[0].descripcion);

        $("#Modal_Edit").modal("show");
      },
      error: function(data) {
        var a = JSON.stringify(data["responseText"]);
        alert(a);
        this.disabled = false;
      },
    });
  }

  function edit_categoria() {
    //Capturamos los valores del formulario
    var id_edit = $("#id_categoria").val();
    var edit_nombre = $("#edit_nombre_categoria").val();
    var edit_descripcion = $("#edit_descripcion").val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Categorias/editar_categoria') ?>",
      dataType: "JSON",

      data: {
        id_edit: id_edit,
        edit_nombre: edit_nombre,
        edit_descripcion: edit_descripcion,
      },
      success: function(data) {
        if (data == null) {
          document.getElementById("validacion_edit").innerHTML = "";
          $("#Modal_Edit").modal("toggle");
          Swal.fire("Editar!", "Categoria editado con exito!!", "success").then(
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
    $('[name="code_categoria"]').val(code);
    $("#Modal_Delete").modal("show");
  }

  function delete_categoria() {
    var code = $("#code_categoria").val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Categorias/eliminar_categoria') ?>",
      dataType: "JSON",

      data: {
        code: code
      },
      success: function(data) {
        $("#Modal_Delete").modal("toggle");
        Swal.fire("Eliminar!", "Categoria eliminada con exito!!", "success").then(
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