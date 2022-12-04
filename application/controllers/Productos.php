<?php
require_once APPPATH . 'controllers/Base.php';
class Productos extends Base
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Productos_model');
  }


  function index()
  {
    $data['productos'] = $this->Productos_model->get_productos();

    $data['sucursal'] = $this->Productos_model->get_sucursal(null);
    $data['marca'] = $this->Productos_model->get_marca(null);
    $data['categoria'] = $this->Productos_model->get_categoria(null);
    $data['proveedor'] = $this->Productos_model->get_proveedor(null);

    $this->load->view('dashboard/menu_admin');
    $this->load->view('Productos/index_productos', $data);
    $this->load->view('dashboard/footer');
  }

  //Funcion para validar e ingresar nuevos productos
  function guardar_producto()
  {
    //Capturamos los valores que vinen por POST del Jquery
    $nombre = $this->input->post('nombre');
    $descripcion = $this->input->post('descripcion');
    $precio = $this->input->post('precio');
    $stock = $this->input->post('stock');

    $sucursal = $this->input->post('sucursal');
    $marca = $this->input->post('marca');
    $categoria = $this->input->post('categoria');
    $proveedor = $this->input->post('proveedor');


    $data = '';
    $bandera = true;

    //Validamos que los campos no vayan vacios y de ir vacios mostramos un mensajes de error
    if ($nombre == null) {
      $data .= 'Debe de ingresar un nombre de producto<br>';
      $bandera = false;
    }

    if ($descripcion == null) {
      $data .= 'Debe de ingresar una descripcion de producto<br>';
      $bandera = false;
    }

    if ($precio == null) {
      $data .= 'Debe de ingresar un precio de producto<br>';
      $bandera = false;
    }

    if ($stock == null) {
      $data .= 'Debe de ingresar una cantidad de stock<br>';
      $bandera = false;
    }


    if ($bandera) {
      $data = array(
        'nombre'     => $nombre,
        'descripcion'   => $descripcion,
        'precio'     => $precio,
        'stock'     => $stock,
        'id_sucursal'   => $sucursal,
        'id_marca'     => $marca,
        'id_categoria'   => $categoria,
        'id_proveedor'   => $proveedor,
        'fecha_ingreso' => date("Y-m-d H:i:s"),
        'estado'     => 1,
      );
      $this->Productos_model->save_producto($data);
      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }

  //Funcion para obtener los productos, sucursales, marcas, categorias y proveedores
  function llenar_productos()
  {
    $code = $this->input->post('codigo');

    $data['ver_productos'] = $this->Productos_model->get_productos($code);

    $data['edit_sucursal'] = $this->Productos_model->get_sucursal($data['ver_productos'][0]->id_sucursal);
    $data['edit_marca'] = $this->Productos_model->get_marca($data['ver_productos'][0]->id_marca);
    $data['edit_categoria'] = $this->Productos_model->get_categoria($data['ver_productos'][0]->id_categoria);
    $data['edit_proveedor'] = $this->Productos_model->get_proveedor($data['ver_productos'][0]->id_proveedor);


    echo json_encode($data);
  }

  //Funcion para editar los productos segun id
  function editar_producto()
  {
    //Recibo los parametros que vienen por post del modal editar
    $code = $this->input->post('id_edit');
    $nombre = $this->input->post('edit_nombre');
    $descripcion = $this->input->post('edit_descripcion');
    $precio = $this->input->post('edit_precio');
    $stock = $this->input->post('edit_stock');
    $sucursal = $this->input->post('edit_sucursal');
    $marca = $this->input->post('edit_marca');
    $categoria = $this->input->post('edit_categoria');
    $proveedor = $this->input->post('edit_proveedor');

    $data = '';
    $bandera = true;

    if ($nombre == null) {
      $data .= 'Debe de ingresar un nombre del producto<br>';
      $bandera = false;
    }

    if ($descripcion == null) {
      $data .= 'Debe de ingresar una descripcion del producto<br>';
      $bandera = false;
    }

    if ($precio == null) {
      $data .= 'Debe de ingresar un precio del producto<br>';
      $bandera = false;
    }

    if ($stock == null) {
      $data .= 'Debe de ingresar una cantida de stock<br>';
      $bandera = false;
    }


    if ($bandera) {
      $data = array(
        'id_sucursal'   => $sucursal,
        'id_marca'     => $marca,
        'id_categoria'   => $categoria,
        'id_proveedor'   => $proveedor,
        'nombre'     => $nombre,
        'descripcion'   => $descripcion,
        'precio'     => $precio,
        'stock'     => $stock,


      );
      /*echo "<pre>";
			print_r($data);*/

      $this->Productos_model->update_producto($code, $data);
      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }

  function eliminar_producto()
  {
    $code = $this->input->post('code');


    $data = array(
      'estado'   => 0
    );

    $this->Productos_model->eliminar_producto($code, $data);

    echo json_encode(null);
  }
}
