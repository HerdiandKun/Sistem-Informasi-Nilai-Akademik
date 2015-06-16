<?PHP
	class MataKuliah extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('matakuliah_m');
			}
		public function index()
			{
				$this->load->view('matakuliah_v');
				
				
				
			}
		public function insert()
		{
			
			$this->matakuliah_m->set_kode_mk($this->input->post('kode_mk'));
			
			$query = $this->matakuliah_m->view_by_kode_mk();
			
			if($query->num_rows()==0)
			{
			$this->matakuliah_m->set_nama_matakuliah($this->input->post('nama'));
			$this->matakuliah_m->set_sks($this->input->post('sks'));
			$this->matakuliah_m->insert();
			redirect(site_url().'matakuliah/index/success');
			}else
				redirect(site_url().'matakuliah/index/error_save');
		}
		public function update()
		{
			$this->matakuliah_m->set_kode_mk($this->input->post('kode_mk_tmp'));
			$this->matakuliah_m->set_nama_matakuliah($this->input->post('nama'));
			$this->matakuliah_m->set_sks($this->input->post('sks'));
			$this->matakuliah_m->update();
			
			redirect(site_url().'matakuliah/index/success');
		}
		
		public function delete()
		{
			
			$this->matakuliah_m->set_kode_mk($this->uri->segment(3));
			$this->matakuliah_m->delete();
			redirect(site_url().'matakuliah/index/success_del');
		}
		public function delete_all()
		{
			
			$this->matakuliah_m->delete_all();
			redirect(site_url().'matakuliah');
		}
		
	}
?>