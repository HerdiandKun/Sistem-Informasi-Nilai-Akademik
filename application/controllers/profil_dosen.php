<?PHP
	class Profil_Dosen extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			
			//$this->load->model('pengguna_m');
			$this->load->model('dosen_m');
			//$this->load->model('mahasiswa_m');
			}
		public function index()
			{
				$this->load->view('profil_dosen_v');
			}
			public function view()
		{
			$this->dosen_m->set_nip($this->session->userdata('nip'));
			$this->dosen_m->view_by_nip();
			redirect(site_url().'profil_dosen');
		}
		public function update()
		{
			$this->dosen_m->set_nip($this->input->post('nip_tmp'));
			$this->dosen_m->set_nama($this->input->post('nama'));
			$this->dosen_m->update();
			if($this->session->userdata('status') == 1)
			redirect(site_url().'dosen');
			else
			redirect(site_url().'profil_dosen/index/success');
		}
		public function password()
			{
			$this->dosen_m->set_password($this->input->post('pass_lama'));
			
			$query = $this->dosen_m->view_by_password();
			
			if($query->num_rows())
			{
			$this->dosen_m->set_username($this->input->post('user'));
			$this->dosen_m->set_password_baru($this->input->post('pass_baru'));
			$this->dosen_m->update_p();
			$this->session->set_userdata('username',$this->input->post('user'));
			redirect(site_url().'profil_dosen/index/success');
			}else
				redirect(site_url().'profil_dosen/index/error_save');
			}
			
		public function dosen_tambah_mk()
			{ 
			$this->dosen_m->set_kode_mk($this->input->post('kode_mk'));
			$sql = $this->dosen_m->view_by_kode_mk();
			if($sql->num_rows()==0){
			$this->dosen_m->set_nip($this->session->userdata('nip'));
			$this->dosen_m->set_jam($this->input->post('jam'));
			 $this->dosen_m->tambah_detail_dosen();
			redirect(site_url().'profil_dosen/index/success');
			}
			else redirect(site_url().'profil_dosen/index/error_save_mk');
			}
			public function dosen_edit_mk()
			{
			$this->dosen_m->set_nip($this->session->userdata('nip'));
			$this->dosen_m->set_kode_mk($this->input->post('kode_mk_tmp'));
			$this->dosen_m->set_jam($this->input->post('jam'));
			$this->dosen_m->edit_detail_dosen();
			redirect(site_url().'profil_dosen/index/success');
			}
			public function delete()
			{
			$this->dosen_m->set_kode_mk($this->uri->segment(3));
			$this->dosen_m->delete_detail_dosen();
			redirect(site_url().'profil_dosen/index/success_del');
			}
			public function delete_all()
			{
		    $this->dosen_m->delete_all_detail_dosen();
			redirect(site_url().'profil_dosen');
			}
		}
?>