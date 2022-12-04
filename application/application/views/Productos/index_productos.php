<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="col-sm-10" style="margin-left: 150px"><br>
  <div class="text-center well" style="color: white;background: #337AB7;">
    <h2>Lista de productos</h2>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <div class="well">
        <nav class="float-right"><?php ?><a href="#" onclick="Limpiar()" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Agregar Nuevo</a><?php ?><br><br></nav>
        <table class="table table-striped table-hover" id="mydata">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Marca</th>
              <th>Descripcion</th>
              <th>Categoria</th>
              <th>Precio</th>
              <th>Stock</th>
              <th>Sucursal</th>
              <th>Proveedor</th>
              <th>Acciones</th>

            </tr>
          </thead>
          <tbody id="show_data">
            <?php
            foreach ($productos as $prod) {
              echo "<tr>";
              echo "<td>" . $prod->nombre . "</td>";
              echo "<td>" . $prod->nombre_marca . "</td>";
              echo "<td>" . $prod->descripcion . "</td>";
              echo "<td>" . $prod->nombre_categoria . "</td>";
              echo "<td>$" . $prod->precio . "</td>";
              echo "<td>" . $prod->stock . "</td>";
              echo "<td>" . $prod->nombre_sucursal . "</td>";
              echo "<td>" . $prod->nombre_proveedor . "</td>";

              echo "<td>";
              echo "<a class='btn btn-success' title='Editar Producto' onclick='editar(" . $prod->id_producto . ")'><span class='glyphicon glyphicon-edit'></span></a>";

              echo " <a class='btn btn-danger' onclick='eliminar(" . $prod->id_producto . ")' title='Eliminar producto'><span class='glyphicon glyphicon-trash'></span></a>";
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
          <h3 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h3>
        
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div id="validacion" style="color:red"></div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Nombre:</label>
              <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre producto">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Descripcion:</label>
              <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Descripcion producto"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Precio:</label>
              <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio producto">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Stock:</label>
              <input type="text" name="stock" id="stock" class="form-control" placeholder="Existencia del producto">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Sucursal:</label>
              <select class="form-control" name="sucursal" id="sucursal" class="form-control">
                <?php
                foreach ($sucursal as $suc) {
                  echo "<option value=" . $suc->id_sucursal . ">" . $suc->nombre_sucursal . "</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Marca:</label>
              <select class="form-control" name="marca" id="marca" class="form-control">
                <?php
                foreach ($marca as $marc) {
                  echo "<option value=" . $marc->id_marca . ">" . $marc->nombre_marca . "</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Categoria:</label>
              <select class="form-control" name="categoria" id="categoria" class="form-control">
                <?php
                foreach ($categoria as $cat) {
                  echo "<option value=" . $cat->id_categoria . ">" . $cat->nombre_categoria . "</option>";
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Proveedor:</label>
              <select class="form-control" name="proveedor" id="proveedor" class="form-control">
                <?php
                foreach ($proveedor as $prov) {
                  echo "<option value=" . $prov->id_proveedor . ">" . $prov->nombre_proveedor . "</option>";
                }
                ?>
              </select>
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
          <h3 class="modal-title" id="exampleModalLabel">Editar producto</h3>
  
        </div>
        <div class="modal-body">
          <div class="col-md-12">
            <div id="validacion_edit" style="color:red"></div>
            <input type="hidden" name="id_producto" id="id_producto" class="form-control">
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Nombre:</label>
              <input type="text" name="edit_nombre" id="edit_nombre" class="form-control" placeholder="Nombre producto">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Descripcion:</label>
              <textarea name="edit_descripcion" id="edit_descripcion" class="form-control" placeholder="Descripcion producto"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Precio:</label>
              <input type="text" name="edit_precio" id="edit_precio" class="form-control" placeholder="Precio producto">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Stock:</label>
              <input type="text" name="edit_stock" id="edit_stock" class="form-control" placeholder="Existencia del producto">
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Sucursal:</label>
              <select class="form-control" name="edit_sucursal" id="edit_sucursal">
                <?php foreach ($sucursal as $suc) {
                  echo "<option value=" . $suc->id_sucursal . ">" . $suc->nombre_sucursal . "</option>";
                }  ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Marca:</label>
              <select class="form-control" name="edit_marca" id="edit_marca">
                <?php foreach ($marca as $marc) {
                  echo "<option value=" . $marc->id_marca . ">" . $marc->nombre_marca . "</option>";
                }  ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Categoria:</label>
              <select class="form-control" name="edit_categoria" id="edit_categoria">
                <?php foreach ($categoria as $cat) {
                  echo "<option value=" . $cat->id_categoria . ">" . $cat->nombre_categoria . "</option>";
                }  ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label class="col-form-label">Proveedor:</label>
              <select class="form-control" name="edit_proveedor" id="edit_proveedor">
                <?php foreach ($proveedor as $prov) {
                  echo "<option value=" . $prov->id_proveedor . ">" . $prov->nombre_proveedor . "</option>";
                }  ?>
              </select>
            </div>
          </div>



        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

          <button type="button" id="btn_edit" class="btn btn-primary" onclick="edit_product();">
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
          <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
    
        </div>
        <div class="modal-body">
          <strong>¿Seguro que desea eliminar este producto?</strong>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="code_producto" id="code_producto" class="form-control" readonly>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" id="btn_delete" class="btn btn-primary" onclick="delete_producto();">Aceptar</button>
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
    var precio = $("#precio").val();
    var stock = $("#stock").val();
    var sucursal = $("#sucursal").val();
    var marca = $("#marca").val();
    var categoria = $("#categoria").val();
    var proveedor = $("#proveedor").val();


    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Productos/guardar_producto') ?>",
      dataType: "JSON",

      data: {
        nombre: nombre,
        descripcion: descripcion,
        precio: precio,
        stock: stock,
        sucursal: sucursal,
        marca: marca,
        categoria: categoria,
        proveedor: proveedor,
      },
      success: function(data) {
        if (data == null) {
          document.getElementById("validacion").innerHTML = "";
          $("#Modal_Add").modal("toggle");
          Swal.fire("Ingreso!", "Producto ingresado con exito!!", "success").then(
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
      url: "<?php echo site_url('Productos/llenar_productos') ?>",
      dataType: "JSON",
      data: {
        codigo: codigo
      },
      success: function(data) {
        //console.log("entre");
        console.log(data);
        $('[name="id_producto"]').val(codigo);
        $('[name="edit_nombre"]').val(data.ver_productos[0].nombre);
        $('[name="edit_descripcion"]').val(data.ver_productos[0].descripcion);
        $('[name="edit_precio"]').val(data.ver_productos[0].precio);
        $('[name="edit_stock"]').val(data.ver_productos[0].stock);

        $("#edit_sucursal").val(data.ver_productos[0].id_sucursal);
        $("#edit_marca").val(data.ver_productos[0].id_marca);
        $("#edit_categoria").val(data.ver_productos[0].id_categoria);
        $("#edit_proveedor").val(data.ver_productos[0].id_proveedor);

        $("#Modal_Edit").modal("show");
      },
      error: function(data) {
        var a = JSON.stringify(data["responseText"]);
        alert(a);
        this.disabled = false;
      },
    });
  }

  function edit_product() {
    //Capturamos los valores del formulario
    var id_edit = $("#id_producto").val();
    var edit_nombre = $("#edit_nombre").val();
    var edit_descripcion = $("#edit_descripcion").val();
    var edit_precio = $("#edit_precio").val();
    var edit_stock = $("#edit_stock").val();
    var edit_sucursal = $("#edit_sucursal").val();
    var edit_marca = $("#edit_marca").val();
    var edit_categoria = $("#edit_categoria").val();
    var edit_proveedor = $("#edit_proveedor").val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Productos/editar_producto') ?>",
      dataType: "JSON",
      //data : {titulo:titulo,url:url,extracto:extracto,categoria:categoria,archivo1:archivo1,archivos2:archivos2,archivos3:archivos3},
      data: {
        id_edit: id_edit,
        edit_nombre: edit_nombre,
        edit_descripcion: edit_descripcion,
        edit_precio: edit_precio,
        edit_stock: edit_stock,
        edit_sucursal: edit_sucursal,
        edit_marca: edit_marca,
        edit_categoria: edit_categoria,
        edit_proveedor: edit_proveedor,
      },
      success: function(data) {
        if (data == null) {
          document.getElementById("validacion_edit").innerHTML = "";
          $("#Modal_Edit").modal("toggle");
          Swal.fire("Editar!", "Producto editado con exito!!", "success").then(
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
    $('[name="code_producto"]').val(code);
    $("#Modal_Delete").modal("show");
  }

  function delete_producto() {
    var code = $("#code_producto").val();

    $.ajax({
      type: "POST",
      url: "<?php echo site_url('Productos/eliminar_producto') ?>",
      dataType: "JSON",

      data: {
        code: code
      },
      success: function(data) {
        $("#Modal_Delete").modal("toggle");
        Swal.fire("Eliminar!", "Producto eliminado con exito!!", "success").then(
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