<?php
require_once APPPATH . 'controllers/Base.php';
class Categorias extends Base
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Categorias_model');
  }


  function index()
  {
    $data['categorias'] = $this->Categorias_model->get_categorias(null);

    $this->load->view('dashboard/menu_admin');
    $this->load->view('Categorias/index_categorias', $data);
    $this->load->view('dashboard/footer');
  }

  //Funcion para validar e ingresar nuevas categorias
  function guardar_categoria()
  {
    //Capturamos los valores que vinen por POST del Jquery
    $nombre = $this->input->post('nombre');
    $descripcion = $this->input->post('descripcion');

    $data = '';
    $bandera = true;

    //Validamos que los campos no vayan vacios y de ir vacios mostramos un mensajes de error
    if ($nombre == null) {
      $data .= 'Debe de ingresar un nombre de categoria<br>';
      $bandera = false;
    }

    if ($descripcion == null) {
      $data .= 'Debe de ingresar una descripcion de la categoria<br>';
      $bandera = false;
    }

    if ($bandera) {
      $data = array(
        'nombre_categoria'     => $nombre,
        'descripcion'   => $descripcion,
        'estado'     => 1,
      );
      $this->Categorias_model->save_categoria($data);
      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }

  //Funcion para obtener las categorias
  function llenar_categorias()
  {
    $code = $this->input->post('codigo');

    $data = $this->Categorias_model->get_categorias($code);

    echo json_encode($data);
  }

  //Funcion para editar las categorias segun id
  function editar_categoria()
  {
    //Recibo los parametros que vienen por post del modal editar
    $code = $this->input->post('id_edit');
    $nombre = $this->input->post('edit_nombre');
    $descripcion = $this->input->post('edit_descripcion');

    $data = '';
    $bandera = true;

    if ($nombre == null) {
      $data .= 'Debe de ingresar un nombre del categoria<br>';
      $bandera = false;
    }

    if ($descripcion == null) {
      $data .= 'Debe de ingresar una descripcion de la categoria<br>';
      $bandera = false;
    }


    if ($bandera) {
      $data = array(
        'nombre_categoria'     => $nombre,
        'descripcion'   => $descripcion,
      );

      $this->Categorias_model->update_categoria($code, $data);
      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }

  function eliminar_categoria()
  {
    $code = $this->input->post('code');


    $data = array(
      'estado'   => 0
    );

    $this->Categorias_model->eliminar_categoria($code, $data);

    echo json_encode(null);
  }
}
