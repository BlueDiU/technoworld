<?php
require_once APPPATH . 'controllers/Base.php';
class Inicio extends Base
{

  public function __construct()
  {
    parent::__construct();

    $this->load->model('Productos_model');
  }

  function index()
  {

    $data['productos'] = $this->Productos_model->get_productos(null);

    $this->load->view('dashboard/header');
    $this->load->view('dashboard/menus');
    $this->load->view('Inicio/index', $data);
    $this->load->view('dashboard/footer');
  }

  public function login()
  {

    $usuario = $this->input->post('usuario');
    $password = $this->input->post('password');

    if (!empty($usuario)) {


      $get_usuario = $this->Inicio_model->login($usuario);

      if (!empty($get_usuario)) {

        if ($get_usuario[0]->contrasenia == md5($password)) {

          if ($get_usuario[0]->rol == 1) {

            redirect('Productos');
          } elseif ($get_usuario[0]->rol == 2) {

            redirect('Inicio');
          }
        }else{
          echo'<script type="text/javascript">alert("Error, Revise usuario y contraseña");</script>';

        }
      }else{
          echo'<script type="text/javascript">alert("Error, Revise usuario y contraseña");</script>';
   
      }
    }

    $this->load->view('dashboard/header');
    $this->load->view('Inicio/login');
    $this->load->view('dashboard/footer');
  }

  function registrarse()
  {
    $this->load->view('dashboard/header');
    $this->load->view('Clientes/registro');
    $this->load->view('dashboard/footer');
  }


}
