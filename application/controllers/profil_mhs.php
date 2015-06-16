<?PHP
	class Profil_Mhs extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			
			//$this->load->model('pengguna_m');
			$this->load->model('mahasiswa_m');
			//$this->load->model('mahasiswa_m');
			}
		public function index()
			{
				$this->load->view('profil_mhs_v');
			}
			public function view()
		{
			$this->mahasiswa_m->set_nip($this->session->userdata('nim'));
			$this->mahasiswa_m->view_by_nim();
			redirect(site_url().'profil_mhs');
		}
		public function update()
		{
			$this->mahasiswa_m->set_nim($this->input->post('nip_tmp'));
			$this->mahasiswa_m->set_nama($this->input->post('nama'));
			$this->mahasiswa_m->update();
			if($this->session->userdata('status') == 1)
			redirect(site_url().'mahasiswa');
			else
			redirect(site_url().'profil_mhs/index/success');
		}
		public function password()
			{
			if($this->input->post('pass_baru')== $this->input->post('konf_password'))
				{
					$this->mahasiswa_m->set_password($this->input->post('pass_lama'));
					
					$query = $this->mahasiswa_m->view_by_password();
					
					if($query->num_rows())
					{
					$this->mahasiswa_m->set_username($this->input->post('user'));
					$this->mahasiswa_m->set_password_baru($this->input->post('pass_baru'));
					$this->mahasiswa_m->update_p();
					$this->session->set_userdata('username',$this->input->post('user'));
					redirect(site_url().'profil_mhs/index/success');
					}else
						redirect(site_url().'profil_mhs/index/error_save');
					}else
					redirect(site_url().'profil_mhs/index/error_pass');
				}
				
		}
?>