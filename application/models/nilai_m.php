<?PHP
	class Nilai_M extends CI_Model
	{
		//Properti
		private $matakuliah;
		private $nim;
		private $nilai;
		
		
		//Method
		public function set_matakuliah($value)
		{
			$this->matakuliah = $value;	
		}
		public function set_nim($value)
		{
			$this->nim = $value;	
		}
		public function set_nilai($value)
		{
			$this->nilai = $value;	
		}
		
		
		public function get_matakuliah()
		{
			return $this->matakuliah;
		}
		public function get_nim()
		{
			return $this->nim;
		}
		public function get_nilai()
		{
			return $this->nilai;
		}
	
		
		
		public function view()
		{
			$sql = "SELECT * FROM tbl_mata_kuliah as mk, tbl_mahasiswa as m, tbl_nilai as n,tbl_detail_dosen as dd where n.nim=m.nim and mk.kode_mk=n.kode_mk and dd.kode_mk=mk.kode_mk and dd.nip='".$this->session->userdata('nip')."'";	
			return $this->db->query($sql);
		}
		
		public function view_mk()
		{ $sql = "SELECT * FROM tbl_mata_kuliah as mk, tbl_mahasiswa as m, tbl_paket_krs as krs where mk.kode_mk=krs.kode_mk and m.nim=krs.nim and krs.kode_mk ='".$this->get_matakuliah()."'";
			return $this->db->query($sql); 
		}
		
		public function tambah()
		{
			$sql = "INSERT INTO `tbl_nilai`( 
								`kode_mk`,
								`nim`,
								`nilai`
							) VALUES ('".$this->get_matakuliah()."',
							'".$this->get_nim()."',
							'".$this->get_nilai()."')
								";
			$this->db->query($sql);
		}
			public function tambah_satu()
		{
			$sql = "INSERT INTO `tbl_nilai`( 
								`kode_mk`,
								`nim`,
								`nilai`
							) VALUES ('".$this->get_matakuliah()."', '".$this->get_nim()."', '".$this->get_nilai()."') ;";
			$this->db->query($sql);
		}
		
		public function view_by_nim()
		{ $sql = "SELECT * FROM tbl_mata_kuliah as mk,tbl_nilai as n where mk.kode_mk=n.kode_mk and n.nim ='".$this->session->userdata('nim')."'";
			return $this->db->query($sql); 
		}
		public function sum()
		{ $sql = "SELECT sum(sks) as jumlah FROM tbl_mata_kuliah as mk,tbl_nilai as n where mk.kode_mk=n.kode_mk and n.nim ='".$this->session->userdata('nim')."'";
			return $this->db->query($sql); 
		}
		public function delete_all()
		{
			$sql = "truncate table tbl_nilai";
			$this->db->query($sql); 
		}
			public function view_by_nim_mk()
		{ $sql = "SELECT * FROM tbl_nilai where nim ='".$this->get_nim()."' and kode_mk='".$this->get_matakuliah()."'";
			return $this->db->query($sql); 
		}
		public function delete_n()
		{ $sql = "delete from tbl_nilai where nim ='".$this->get_nim()."' and kode_mk='".$this->get_matakuliah()."'";
			return $this->db->query($sql); 
		}
		public function view_report()
		{
			$sql = "SELECT * FROM tbl_mata_kuliah as mk, tbl_mahasiswa as m, tbl_nilai as n,tbl_detail_dosen as dd where n.nim=m.nim and mk.kode_mk=n.kode_mk and dd.kode_mk=mk.kode_mk";	
			return $this->db->query($sql);
		}
		public function update()
		{ $sql = "update tbl_nilai set nilai = '".$this->get_nilai()."' where nim ='".$this->get_nim()."' and kode_mk='".$this->get_matakuliah()."'";
			return $this->db->query($sql); 
		}
		
			
	}
?>