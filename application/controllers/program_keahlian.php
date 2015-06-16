<?PHP
	class Program_Keahlian extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('program_keahlian_m');
			}
		public function index()
			{
				$this->load->view('program_keahlian_v');
				
				
				
			}
		public function insert()
		{
			
			$this->program_keahlian_m->set_id_program_keahlian($this->input->post('id_pk'));
			
			$query = $this->program_keahlian_m->view_by_id_pk();
			
			if($query->num_rows()==0)
			{
			$this->program_keahlian_m->set_program_keahlian($this->input->post('nama_pk'));
			$this->program_keahlian_m->insert();
			redirect(site_url().'program_keahlian');
			}else
				redirect(site_url().'program_keahlian/index/error_save');
		}
		public function update()
		{
			
			$this->program_keahlian_m->set_id_program_keahlian($this->input->post('id_pk_tmp'));
			
			$this->program_keahlian_m->set_program_keahlian($this->input->post('nama_pk'));
			$this->program_keahlian_m->update();
			redirect(site_url().'program_keahlian');
		}
		public function delete()
		{
			
			$this->program_keahlian_m->set_id_program_keahlian($this->uri->segment(3));
			$this->program_keahlian_m->delete();
			redirect(site_url().'program_keahlian');
		}
		public function delete_all()
		{
			
			$this->program_keahlian_m->delete_all();
			redirect(site_url().'program_keahlian');
		}
		public function excel()
		{	
			$this->load->view('program_keahlian_excel_v');
		}
		
	}
?>