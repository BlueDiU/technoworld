<?php
require_once APPPATH . 'controllers/Base.php';
class Empleados extends Base
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Empleados_model');
  }


  function index()
  {
    $data['empleados'] = $this->Empleados_model->get_empleados();
    $data['cargo'] = $this->Empleados_model->get_cargo();

    $this->load->view('dashboard/menu_admin');
    $this->load->view('Empleados/index_empleados', $data);
    $this->load->view('dashboard/footer');
  }


  //Funcion para validar e ingresar nuevos empleados
  function guardar_empleado()
  {
    //Capturamos los valores que vienen por POST del Jquery
    $cargo = $this->input->post('cargo');
    $nombre = $this->input->post('nombre');
    $telefono = $this->input->post('telefono');
    $fecha_nacimiento = $this->input->post('fecha_nacimiento');
    $direccion = $this->input->post('direccion');

    $data = '';
    $bandera = true;

    //Validamos que los campos no vayan vacios y de ir vacios mostramos un mensajes de error
    if ($nombre == null) {
      $data .= 'Debe de ingresar un nombre del empleado<br>';
      $bandera = false;
    }

    if ($telefono == null) {
      $data .= 'Debe de ingresar un telefono del empleado<br>';
      $bandera = false;
    }

    if ($fecha_nacimiento == null) {
      $data .= 'Debe de ingresar una fecha de nacimiento del empleado<br>';
      $bandera = false;
    }

    if ($direccion == null) {
      $data .= 'Debe de ingresar una dirección<br>';
      $bandera = false;
    }

    if ($bandera) {
      $data = array(
        'id_cargo'     => $cargo,
        'nombre'     => $nombre,
        'telefono'   => $telefono,
        'fecha_nacimiento'     => $fecha_nacimiento,
        'direccion'     => $direccion,
        'estado'     => 1,
      );
      $this->Empleados_model->save_empleado($data);
      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }


  //Funcion para obtener los empleados y cargo de empledo
  function llenar_empleados()
  {
    $code = $this->input->post('codigo');

    $data['ver_empleados'] = $this->Empleados_model->get_empleados($code);
    $data['edit_cargo'] = $this->Empleados_model->get_cargo($data['ver_empleados'][0]->id_cargo);

    echo json_encode($data);
  }



  //Funcion para editar los empleados segun id
  function editar_empleado()
  {
    //Recibo los parametros que vienen por post del modal editar
    $code = $this->input->post('id_edit');
    $cargo = $this->input->post('edit_cargo');
    $nombre = $this->input->post('edit_nombre');
    $telefono = $this->input->post('edit_telefono');
    $fecha_nacimiento = $this->input->post('edit_fecha_nacimiento');
    $direccion = $this->input->post('edit_direccion');

    $data = '';
    $bandera = true;

    if ($nombre == null) {
      $data .= 'Debe de ingresar el nombre del empleado<br>';
      $bandera = false;
    }

    if ($telefono == null) {
      $data .= 'Debe de ingresar un telefono del empleado<br>';
      $bandera = false;
    }

    if ($fecha_nacimiento == null) {
      $data .= 'Debe de ingresar la fecha de nacimiento del empleado<br>';
      $bandera = false;
    }

    if ($direccion == null) {
      $data .= 'Debe de ingresar la direccion del empleado<br>';
      $bandera = false;
    }


    if ($bandera) {
      $data = array(
        'id_cargo'   => $cargo,
        'nombre'     => $nombre,
        'telefono'   => $telefono,
        'fecha_nacimiento'     => $fecha_nacimiento,
        'direccion'     => $direccion,
      );

      $this->Empleados_model->update_empleado($code, $data);
      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }


  //Funcion para editar los empleados
  function eliminar_empleado()
  {
    $code = $this->input->post('code');

    $data = array(
      'estado'   => 0
    );

    $this->Empleados_model->eliminar_empleado($code, $data);
    echo json_encode(null);
  }
}
