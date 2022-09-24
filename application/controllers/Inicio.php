<?php
require_once APPPATH . 'controllers/Base.php';
class Inicio extends Base
{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {

    $this->load->view('dashboard/header');
    $this->load->view('dashboard/menus');
    $this->load->view('Inicio/index');
    $this->load->view('dashboard/footer');
  }

  public function login()
  {

    $usuario = $this->input->post('usuario');
    $password = $this->input->post('password');

    echo $usuario;
    echo $password;

    if (isset($_POST['password'])) {

      echo "entre";

      if ($this->Inicio_model->login($_POST['usuario'], md5($_POST['password']))) {
        redirect('Productos');
      } else {
        redirect('Inicio/login');
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
