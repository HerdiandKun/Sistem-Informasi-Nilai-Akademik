<?PHP
	class Lap_Nilai extends CI_Controller
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
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment; filename="Nilai Mahasiswa Diploma IPB.xls"');
			$this->load->view('nilai_report_v');
			//redirect(base_url());
			}
	}
?>