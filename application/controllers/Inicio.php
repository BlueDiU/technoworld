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

  function login()
  {
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
