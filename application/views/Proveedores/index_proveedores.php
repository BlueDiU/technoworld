<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<div class="col-sm-10" style="margin-left: 150px"><br>
    <div class="text-center well" style="color: white;background: #337AB7;">
        <h2>Lista de proveedores</h2>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="well">
                <nav class="float-right"><?php ?><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Agregar Nuevo proveedor</a><?php ?><br><br></nav>
                <table class="table table-striped" id="mydata">
                    <thead>
                        <tr>
                            <th>Nombre proveedor</th>  
                            <th>Nombre contacto</th>     
                            <th>Email contacto</th>  
                            <th>Telefono contacto</th>     
                          
                            <th>Acciones</th>       

                        </tr>
                    </thead>
                    <tbody id="show_data">
                        <?php
                            foreach ($proveedores as $prov) {
                                echo "<tr>";
                                echo "<td>".$prov->nombre_proveedor."</td>";
                                echo "<td>".$prov->nombre_contacto ."</td>";
                                echo "<td>".$prov->email ."</td>";
                                echo "<td>".$prov->telefono ."</td>";
                              

                                echo "<td>";
                                echo "<a class='btn btn-success' title='Editar Proveedor' onclick='editar(".$prov->id_proveedor.")'><span class='glyphicon glyphicon-edit'></span></a>";
            
                                echo " <a class='btn btn-danger' onclick='eliminar(".$prov->id_proveedor .")' title='Eliminar Proveedor'><span class='glyphicon glyphicon-trash'></span></a>";
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
            <h3 class="modal-title" id="exampleModalLabel">Agregar nuevo proveedor</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
           <div class="modal-body">
	           	<div class="col-md-12">
				    <div id="validacion" style="color:red"></div>
				</div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="col-form-label">Nombre proveedor:</label>
                        <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre proveedor">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="col-form-label">Nombre contacto:</label>
                        <input type="text" name="contacto" id="contacto" class="form-control" placeholder="Nombre contacto">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                    <label class="col-form-label">Email contacto:</label>
                        <input type="text" name="email" id="email" class="form-control" placeholder="Email contacto">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                    <label class="col-form-label">Telefono contacto:</label>
                       <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono contacto">
                    </div>
                </div>

            </div>
            
            <div class="modal-footer">
	            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	            
	            <button type="button" id="btn_save" class="btn btn-primary" onclick="save_proveedor();">
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
            <h3 class="modal-title" id="exampleModalLabel">Editar proveedor</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
           <div class="modal-body">
                <div class="col-md-12">
                    <div id="validacion_edit" style="color:red"></div>
                    <input type="hidden" name="id_proveedor" id="id_proveedor" class="form-control">
                </div>

                 <div class="form-group row">
                    <div class="col-md-12">
                        <label class="col-form-label">Nombre proveedor:</label>
                        <input type="text" name="edit_nombre_proveedor" id="edit_nombre_proveedor" class="form-control" placeholder="Nombre proveedor">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                        <label class="col-form-label">Nombre contacto:</label>
                        <input type="text" name="edit_contacto" id="edit_contacto" class="form-control" placeholder="Nombre contacto">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                    <label class="col-form-label">Email:</label>
                        <input type="text" name="edit_email" id="edit_email" class="form-control" placeholder="Precio producto">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-12">
                    <label class="col-form-label">Telefono:</label>
                       <input type="text" name="edit_telefono" id="edit_telefono" class="form-control" placeholder="Telefono contacto">
                    </div>
                </div>
    
                </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
                <button type="button" id="btn_edit" class="btn btn-primary" onclick="edit_proveedor();">
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
                <h5 class="modal-title" id="exampleModalLabel">Eliminar provedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <strong>¿Seguro que desea eliminar este proveedor?</strong>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="code_proveedor" id="code_proveedor" class="form-control" readonly>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="button" id="btn_delete" class="btn btn-primary" onclick="delete_proveedor();">Aceptar</button>
                </div>
            </div>
            </div>
        </div>
        </form>
        <!--END MODAL DELETE-->




<script type="text/javascript">

    $('#mydata').dataTable({
        "bAutoWidth": false,
        "oLanguage": {
            "sSearch": "Buscador: "
        }
    });


        $( "#btn_save" ).click(function() {
        
          //Capturamos los valores del formulario
        var nombre = $('#nombre').val();
        var contacto = $('#contacto').val();
        var email = $('#email').val();
        var telefono = $('#telefono').val();
       
 
        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('Proveedores/guardar_proveedor')?>",
            dataType : "JSON",
       
            data : {nombre:nombre,contacto:contacto,email:email,telefono:telefono},
            success: function(data){
                if(data == null){
                    document.getElementById('validacion').innerHTML = '';
                    $("#Modal_Add").modal('toggle');
                    Swal.fire(
                        'Ingreso!',
                        'Proveedor ingresado con exito!!',
                        'success'
                    ).then(() => { location.reload();});
                    
                }else{
                    document.getElementById('validacion').innerHTML = data;
                }
            },  
        error: function(data){
            var a =JSON.stringify(data['responseText']);
            alert(a);
            this.disabled=false;
            }

        });

        });


        function editar(codigo){

            //console.log(codigo);

        document.getElementById('validacion_edit').innerHTML = '';
        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('Proveedores/llenar_proveedores')?>",
            dataType : "JSON",
            data : {codigo:codigo},
            success: function(data){
                 //console.log("entre");
                //console.log(data);
                $('[name="id_proveedor"]').val(codigo);
                $('[name="edit_nombre_proveedor"]').val(data[0].nombre_proveedor);
                $('[name="edit_contacto"]').val(data[0].nombre_contacto);
                $('[name="edit_email"]').val(data[0].email);
                $('[name="edit_telefono"]').val(data[0].telefono);

                $('#Modal_Edit').modal('show');

            },  
            error: function(data){
                var a =JSON.stringify(data['responseText']);
                alert(a);
                this.disabled=false;
            }
        });
    }


        function edit_proveedor(){

         //Capturamos los valores del formulario
        var id_edit = $('#id_proveedor').val();
        var edit_nombre = $('#edit_nombre_proveedor').val();
        var edit_contacto = $('#edit_contacto').val();
        var edit_email = $('#edit_email').val();
        var edit_telefono = $('#edit_telefono').val();
    

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('Proveedores/editar_proveedor')?>",
            dataType : "JSON",
            //data : {titulo:titulo,url:url,extracto:extracto,categoria:categoria,archivo1:archivo1,archivos2:archivos2,archivos3:archivos3},
            data : {id_edit:id_edit,edit_nombre:edit_nombre,edit_contacto:edit_contacto,edit_email:edit_email,edit_telefono:edit_telefono},
            success: function(data){
                if(data == null){
                    document.getElementById('validacion_edit').innerHTML = '';
                    $("#Modal_Edit").modal('toggle');
                    Swal.fire(
                        'Editar!',
                        'Proveedor editado con exito!!',
                        'success'
                    )
                    .then(() => { location.reload();});
                   
                }else{
                    document.getElementById('validacion_edit').innerHTML = data;
                }
            },  
        error: function(data){
            var a =JSON.stringify(data['responseText']);
            alert(a);
            this.disabled=false;
            }

        });
    }


     function eliminar(code){
        $('[name="code_proveedor"]').val(code); 
        $('#Modal_Delete').modal('show');

    }

    function delete_proveedor(){
        var code= $('#code_proveedor').val();

        $.ajax({
            type : "POST",
            url  : "<?php echo site_url('Proveedores/eliminar_proveedor')?>",
            dataType : "JSON",
            
            data : {code:code},
            success: function(data){

                $("#Modal_Delete").modal('toggle');
                Swal.fire(
                    'Eliminar!',
                    'Proveedor eliminado con exito!!',
                    'success'
                )
                .then(() => { location.reload();});
                   
                
            },  
        error: function(data){
            var a =JSON.stringify(data['responseText']);
            alert(a);
            this.disabled=false;
            }

        });
    }

    

</script>
