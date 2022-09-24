<?php
require_once APPPATH . 'controllers/Base.php';
class Proveedores extends Base
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Proveedores_model');
  }

  function index()
  {
    $data['proveedores'] = $this->Proveedores_model->get_proveedores(null);

    $this->load->view('dashboard/menu_admin');
    $this->load->view('Proveedores/index_proveedores', $data);
    $this->load->view('dashboard/footer');
  }

  //Funcion para validar e ingresar nuevos proveedores
  function guardar_proveedor()
  {
    //Capturamos los valores que vinen por POST del Jquery
    $nombre = $this->input->post('nombre');
    $contacto = $this->input->post('contacto');
    $email = $this->input->post('email');
    $telefono = $this->input->post('telefono');

    $data = '';
    $bandera = true;

    //Validamos que los campos no vayan vacios y de ir vacios mostramos un mensajes de error
    if ($nombre == null) {
      $data .= 'Debe de ingresar un nombre de proveedor<br>';
      $bandera = false;
    }

    if ($contacto == null) {
      $data .= 'Debe de ingresar un nombre de contacto<br>';
      $bandera = false;
    }

    if ($email == null) {
      $data .= 'Debe de ingresar un email de contacto<br>';
      $bandera = false;
    }

    if ($telefono == null) {
      $data .= 'Debe de ingresar un telefono de contacto<br>';
      $bandera = false;
    }

    if ($bandera) {
      $data = array(
        'nombre_proveedor'     => $nombre,
        'nombre_contacto'     => $contacto,
        'email'         => $email,
        'telefono'         => $telefono,
        'estado'         => 1,
      );
      $this->Proveedores_model->save_proveedor($data);
      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }

  //Funcion para obtener los prove
  function llenar_proveedores()
  {
    $code = $this->input->post('codigo');

    $data = $this->Proveedores_model->get_proveedores($code);

    echo json_encode($data);
  }

  //Funcion para editar los proveedores segun id
  function editar_proveedor()
  {
    //Recibo los parametros que vienen por post del modal editar
    $code = $this->input->post('id_edit');
    $nombre = $this->input->post('edit_nombre');
    $contacto = $this->input->post('edit_contacto');
    $email = $this->input->post('edit_email');
    $telefono = $this->input->post('edit_telefono');


    $data = '';
    $bandera = true;

    if ($nombre == null) {
      $data .= 'Debe de ingresar un nombre de proveedor<br>';
      $bandera = false;
    }

    if ($contacto == null) {
      $data .= 'Debe de ingresar un nombre de contacto<br>';
      $bandera = false;
    }

    if ($email == null) {
      $data .= 'Debe de ingresar un email de contacto<br>';
      $bandera = false;
    }

    if ($telefono == null) {
      $data .= 'Debe de ingresar un numero de contacto<br>';
      $bandera = false;
    }


    if ($bandera) {
      $data = array(
        'nombre_proveedor'   => $nombre,
        'nombre_contacto'   => $contacto,
        'email'       => $email,
        'telefono'       => $telefono,
      );
      /*echo "<pre>";
			print_r($data);*/

      $this->Proveedores_model->update_proveedor($code, $data);
      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }

  function eliminar_proveedor()
  {
    $code = $this->input->post('code');


    $data = array(
      'estado'   => 0
    );

    $this->Proveedores_model->eliminar_proveedor($code, $data);

    echo json_encode(null);
  }
}
