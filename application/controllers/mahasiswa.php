<?PHP
	class Mahasiswa extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('mahasiswa_m');
			}
		public function index()
			{
				$this->load->view('mahasiswa_v');
			}
	
		public function insert()
		{
			$nim = $this->input->post('nim');
			$pk = $this->input->post('id_pk_tmp');
			echo substr($nim,0,3);
			echo $pk;
			
	
			$this->mahasiswa_m->set_nim($this->input->post('nim'));
			
			$query = $this->mahasiswa_m->view_by_nim();
			
			if($query->num_rows()==0)
			{
			$this->mahasiswa_m->set_nama($this->input->post('nama'));
			$this->mahasiswa_m->set_jenis_kelamin($this->input->post('jk'));
			$this->mahasiswa_m->set_tanggal_lahir($this->input->post('tl'));
			$this->mahasiswa_m->set_id_program_keahlian($pk);
			$this->mahasiswa_m->set_alamat($this->input->post('alamat'));
			$this->mahasiswa_m->set_semester($this->input->post('semester'));
			$this->mahasiswa_m->set_username($this->input->post('nim'));
			$this->mahasiswa_m->set_password($this->input->post('pass'));
			
			if(substr($nim,0,3)=='J3A' && $pk = 'KMN')
				{
				$this->mahasiswa_m->insert();
				$this->mahasiswa_m->insert_p();
				redirect(site_url().'mahasiswa/index/success');
				}
			else if (substr($nim,0,3)=='J3B' && $pk = 'EKW')
				{
				$this->mahasiswa_m->insert();
				$this->mahasiswa_m->insert_p();
				redirect(site_url().'mahasiswa/index/success');
				}
			else redirect(site_url().'mahasiswa/index/error_save');
			}else
				redirect(site_url().'mahasiswa/index/error_save');
		}
		
		
		public function update()
		{
			
			$this->mahasiswa_m->set_nim($this->input->post('nim_tmp'));
			$this->mahasiswa_m->set_nama($this->input->post('nama'));
			$this->mahasiswa_m->set_jenis_kelamin($this->input->post('jk'));
			$this->mahasiswa_m->set_tanggal_lahir($this->input->post('tl'));
			
			$this->mahasiswa_m->set_alamat($this->input->post('alamat'));
			if($this->session->userdata('status')=='3'){
			$this->mahasiswa_m->set_semester($this->input->post('smtr_tmp'));
			$this->mahasiswa_m->set_id_program_keahlian($this->input->post('id_pk_tmp'));
			$this->mahasiswa_m->update();
			redirect(site_url().'profil_mhs');
			}else{
			$this->mahasiswa_m->set_semester($this->input->post('semester'));
			$this->mahasiswa_m->set_id_program_keahlian($this->input->post('id_pk_tmp'));
			$this->mahasiswa_m->update();
			redirect(site_url().'mahasiswa/index/success');
			}
		}
		
		public function delete()
		{
			
			$this->mahasiswa_m->set_nim($this->uri->segment(3));
			$this->mahasiswa_m->delete_p();
			$this->mahasiswa_m->delete();
			redirect(site_url().'mahasiswa/index/success_del');
		}
		public function delete_all()
		{
			
			$this->mahasiswa_m->delete_all();
			redirect(site_url().'mahasiswa');
		}
	
	}
?>