<?PHP
	class Sign_In extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			
			$this->load->model('pengguna_m');
			$this->load->model('dosen_m');
			$this->load->model('mahasiswa_m');
			}
		public function index()
			{
				$this->load->view('sign_in_v');
				}
		public function login()
			{
				$this->pengguna_m->set_username($this->input->post('username'));
				$this->pengguna_m->set_password($this->input->post('password'));
				$query = $this->pengguna_m->view_by_username_password();
				if($query->num_rows())
				{
					$row = $query->row();
					$this->session->set_userdata('username',$row->username);
					$this->session->set_userdata('status',$row->status);
					$query_dosen = $this->dosen_m->view();
					$query_mhs = $this->mahasiswa_m->view();
					if($query_dosen->num_rows())
					{
					$this->session->set_userdata('nip',$row->nip);
					}
					
					if($query_mhs->num_rows())
					{$this->session->set_userdata('nim',$row->nim);
					}  
					//echo "Ada";
					redirect(site_url());
				}
				else
					redirect(site_url().'sign_in/index/error_login');
			}
		public function logout()
			{
					//$this->session->set_userdata('username','');
					//$this->session->unset_userdata('username');
					$this->session->sess_destroy();
					redirect(site_url());
			}
		}
?>