<?PHP
	class Dosen extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('dosen_m');
			}
		public function index()
			{
				$this->load->view('dosen_v');
			}
		public function insert()
			{
			$this->dosen_m->set_nip($this->input->post('nip'));
			
			$query = $this->dosen_m->view_by_nip();
			
			if($query->num_rows()==0)
			{
			$this->dosen_m->set_nama($this->input->post('nama'));
			$this->dosen_m->set_username($this->input->post('nama'));
			$this->dosen_m->set_password($this->input->post('pass'));
			$this->dosen_m->insert();
			$this->dosen_m->insert_p();
			redirect(site_url().'dosen/index/success');
			}else
				redirect(site_url().'dosen/index/error_save');
			}
		public function update()
		{
			$this->dosen_m->set_nip($this->input->post('nip_tmp'));
			$this->dosen_m->set_nama($this->input->post('nama'));
			$this->dosen_m->update();
			if($this->session->userdata('status') == 1)
			redirect(site_url().'dosen/index/success');
			else
			redirect(site_url().'profil_dosen');
		}
		public function delete()
		{
			$this->dosen_m->set_nip($this->uri->segment(3));
			$this->dosen_m->delete_p();
			$this->dosen_m->delete();
			redirect(site_url().'dosen/index/success_del');
		}
		public function delete_all()
		{
			$this->dosen_m->delete_all();
			$this->dosen_m->delete_all_p();
			redirect(site_url().'dosen');
		}
		
		
		}
?>