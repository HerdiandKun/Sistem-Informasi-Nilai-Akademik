<?PHP
	class Beranda extends CI_Controller
	{
		//Constructor
		
		public function __construct()
		{
			parent::__construct();
			$this->load->model('konten_m');
		}
		
		//Index
		
		public function index()
		{
			$this->load->view('beranda_v');
		}
		public function update()
		{
			$this->konten_m->set_konten($this->input->post('konten'));
			$this->konten_m->update();
			redirect();
		}
	}
?>