<?PHP
	class Paket_KRS extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('paket_krs_m');
		}
		public function index()
		{
				$this->load->view('paket_krs_v');
		}
		public function insert()
		{
		$this->paket_krs_m->set_semester($this->input->post('semester'));
		$this->paket_krs_m->set_id_pk($this->input->post('id_pk'));
			
		$query = $this->paket_krs_m->view_by_pk();
			//$kol=$query->num_rows();
			
			if($query->num_rows() != 0)
			{
				foreach($query->result() AS $row) :
				$this->paket_krs_m->set_nim($row->nim);
				$this->paket_krs_m->set_kode_mk($this->input->post('kode_mk'));
				$this->paket_krs_m->insert();
				endforeach;
				redirect(site_url().'paket_krs/index/succes');
			}else
			redirect(site_url().'paket_krs/index/error_save');
		}
		public function delete_all(){
		$this->paket_krs_m->delete_all();
		$this->paket_krs_m->delete_n();
		redirect(site_url().'paket_krs/index/success_del');
		}
	}
?>