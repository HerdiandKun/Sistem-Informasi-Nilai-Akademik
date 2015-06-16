<?PHP
	class Nilai_Mhs extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//Model
			$this->load->model('nilai_m');
			}
		public function index()
			{
				$this->load->view('nilai_mhs_v');
			}
		public function ipk()
		{
			$ipk=0;
			$nilai[]=0;	
			$query = $this->nilai_m->view_by_nim(); 
			$jum=$query->num_rows();
			foreach($query->result() as $row)
			{
			$nilai[]= $row->nilai;
			$sks = $row->sks;
		//	$nama_mk[]=$
			}
			enforeach;
			for($i=1;$i<=$jum;$i++)
			{
				if($nilai[$i]='A')
				{
					$index=4;
				} else if($nilai[$i]='AB')
				{
					$index=3.5 * $sks;
				} else if($nilai[$i]='B')
				{
					$index=3 * $sks;
				} else if($nilai[$i]='BC')
				{
					$index=2.5 * $sks;
				} else if($nilai[$i]='C')
				{
					$index=2* $sks;
				}else if($nilai[$i]='D')
				{
					$index=1 * $sks;
				}else if($nilai[$i]='E')
				{
					$index=0 * $sks;
				}
				$sks += $sks;
				$index +=  $index;
			} 
			$ipk = $index / $sks ;
		}
	}
?>