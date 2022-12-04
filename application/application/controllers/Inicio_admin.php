<?php
require_once APPPATH . 'controllers/Base.php';
class Inicio_admin extends Base
{

  public function __construct()
  {
    parent::__construct();
  }

  function index()
  {

    $this->load->view('dashboard/menu_admin');
    $this->load->view('dashboard/footer');
  }
}
