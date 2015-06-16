<?PHP
	class Nilai extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('nilai_m');
			$this->load->model('dosen_m');
			}
		public function index()
			{
				$this->load->view('nilai_v');
			}
		public function tambah()
			{
				
				//$this->nilai_m->view_mk();
				$this->load->view('nilai_tambah_v');
			}
		public function pilih_mk()
			{
				
				//$this->nilai_m->view_mk();
				$this->load->view('pilih_mk_v');
			}
		public function simpan()
			{	
				 $this->nilai_m->set_matakuliah($this->input->post('mk'));
					$query = $this->nilai_m->view_mk(); 
					foreach($query->result() AS $row) :
						$this->nilai_m->set_nim($row->nim);
						$query = $this->nilai_m->view_by_nim_mk();
						if($query->num_rows == 0){
						$this->nilai_m->set_nilai($this->input->post('nilai'.$row->nim));
						$this->nilai_m->tambah();
						}else
						redirect(site_url().'nilai/index/error_save');
							//echo $this->input->post('mk');

					endforeach;
					
					redirect(site_url().'nilai/index/success');
			}
				
			public function simpan_satu(){
			$this->nilai_m->set_nim($this->input->post('nim'));
			$this->nilai_m->set_matakuliah($this->input->post('kode_mk'));
			$query = $this->nilai_m->view_by_nim_mk();
			if($query->num_rows == 0){
			$this->nilai_m->set_nilai($this->input->post('nilai'));
			
			echo $this->input->post('nim').$this->input->post('kode_mk').$this->input->post('nilai');
			$this->nilai_m->tambah_satu();
			
			redirect(site_url().'nilai/index/success');
			}else
			redirect(site_url().'nilai/pilih_mk/index/error_save');
			}
				
			public function delete_all()
			{
			$this->nilai_m->delete_all();
			redirect(site_url().'nilai');
		}
		
		public function delete()
		{
			$this->nilai_m->set_nim($this->uri->segment(3));
			$this->nilai_m->set_matakuliah($this->uri->segment(4));
			$this->nilai_m->delete_n();
			redirect(site_url().'nilai/index/success_del');
		}
		
		public function update()
		{
			$this->nilai_m->set_nim($this->input->post('nim_tmp'));
			$this->nilai_m->set_matakuliah($this->input->post('mk_tmp'));
			$this->nilai_m->set_nilai($this->input->post('nilai'));			
			$this->nilai_m->update();
			redirect(site_url().'nilai/index/success');
		
		}
}
	
?>