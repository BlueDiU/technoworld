class Categorias {
public function index() {
$this->load->model('Categorias_model');
$data['categorias'] = $this->Categorias_model->get_all();
$this->load->view('categorias/index', $data);
}
}