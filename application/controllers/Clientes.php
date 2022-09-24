<?php
require_once APPPATH . 'controllers/Base.php';
class Clientes extends Base
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Clientes_model');
  }

  function index()
  {
    $data['clientes'] = $this->Clientes_model->get_clientes(null);

    $this->load->view('dashboard/menu_admin');
    $this->load->view('Consumidores/index_consumidores', $data);
    $this->load->view('dashboard/footer');
  }

  //Funcion para validar e ingresar nuevos proveedores
  function guardar_cliente()
  {
    //Capturamos los valores que vinen por POST del Jquery
    $dui = $this->input->post('dui');
    $nombre = $this->input->post('nombre');
    $telefono = $this->input->post('telefono');
    $correo = $this->input->post('correo');
    $fecha = $this->input->post('fecha');
    $direccion = $this->input->post('direccion');
    $usuario = $this->input->post('usuario');
    $password = $this->input->post('password');

    $data = '';
    $bandera = true;

    //Validamos que los campos no vayan vacios y de ir vacios mostramos un mensajes de error
    if ($dui == null) {
      $data .= 'Debe de ingresar un numero de dui<br>';
      $bandera = false;
    }

    if ($nombre == null) {
      $data .= 'Debe de ingresar un nombre de cliente<br>';
      $bandera = false;
    }

    if ($telefono == null) {
      $data .= 'Debe de ingresar un telefono de cliente<br>';
      $bandera = false;
    }

    if ($correo == null) {
      $data .= 'Debe de ingresar un correo de cliente<br>';
      $bandera = false;
    }

    if ($fecha == null) {
      $data .= 'Debe de ingresar una fecha de nacimiento del cliente<br>';
      $bandera = false;
    }

    if ($direccion == null) {
      $data .= 'Debe de ingresar una direccion del cliente<br>';
      $bandera = false;
    }

    if ($usuario == null) {
      $data .= 'Debe de ingresar un usuario<br>';
      $bandera = false;
    }

    if ($password == null) {
      $data .= 'Debe de ingresar una contraseña<br>';
      $bandera = false;
    }

   
    if ($bandera) {
      $data = array(
        'dui'              => $dui,
        'nombre'           => $nombre,
        'telefono'         => $telefono,
        'correo'            => $correo,
        'fecha_nacimiento'  => $fecha,
        'direccion'         => $direccion,
        'estado'            => 1,
      );

      $this->Clientes_model->save_cliente($data);


      $data2 = array(
        'usuario'             => $usuario,
        'id_empleado'         => $this->db->insert_id(),
        'contrasenia'         => md5($password),
        'rol'                 => 2,
        'estado'              => 1,
      );

      $this->Clientes_model->save_usuario($data2);

      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }

  //Funcion para obtener los prove
  function llenar_clientes()
  {
    $code = $this->input->post('codigo');

    $data = $this->Clientes_model->get_clientes($code);

    echo json_encode($data);
  }

  //Funcion para editar los proveedores segun id
  function editar_cliente()
  {
    //Recibo los parametros que vienen por post del modal editar
    $code = $this->input->post('id_edit');
    $dui = $this->input->post('edit_dui');
    $nombre = $this->input->post('edit_nombre');
    $telefono = $this->input->post('edit_telefono');
    $correo = $this->input->post('edit_correo');
    $fecha = $this->input->post('edit_fecha');
    $direccion = $this->input->post('edit_direccion');


    $data = '';
    $bandera = true;

    if ($dui == null) {
      $data .= 'Debe de ingresar un numero de dui<br>';
      $bandera = false;
    }

    if ($nombre == null) {
      $data .= 'Debe de ingresar un nombre de cliente<br>';
      $bandera = false;
    }

    if ($telefono == null) {
      $data .= 'Debe de ingresar un telefono de cliente<br>';
      $bandera = false;
    }

    if ($correo == null) {
      $data .= 'Debe de ingresar un correo de cliente<br>';
      $bandera = false;
    }

    if ($fecha == null) {
      $data .= 'Debe de ingresar una fecha de nacimiento del cliente<br>';
      $bandera = false;
    }

    if ($direccion == null) {
      $data .= 'Debe de ingresar una direccion del cliente<br>';
      $bandera = false;
    }


    if ($bandera) {
      $data = array(
        'dui'     => $dui,
        'nombre'     => $nombre,
        'telefono'         => $telefono,
        'correo'         => $correo,
        'fecha_nacimiento'         => $fecha,
        'direccion'         => $direccion,
      );
      /*echo "<pre>";
			print_r($data);*/

      $this->Clientes_model->update_cliente($code, $data);
      echo json_encode(null);
    } else {
      echo json_encode($data);
    }
  }

  function eliminar_cliente()
  {
    $code = $this->input->post('code');


    $data = array(
      'estado'   => 0
    );

    $this->Clientes_model->eliminar_cliente($code, $data);

    echo json_encode(null);
  }
}
