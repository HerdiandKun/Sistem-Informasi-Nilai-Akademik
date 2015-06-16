<?PHP
	class Matakuliah_M extends CI_Model
	{
		//Properti
		
		private $kode_mk;
		private $nama_matakuliah;
		private $sks;
		
		//Method
		
		public function set_kode_mk($value)
		{
			$this->id_kode_mk = $value;	
		}
		
		public function set_nama_matakuliah($value)
		{
			$this->nama_matakuliah = $value;	
		}
		
		public function set_sks($value)
		{
			$this->sks = $value;	
		}
		
		
		//Method Setter - Getter
		
		public function get_kode_mk()
		{
			return $this->id_kode_mk;
		}
		
		public function get_nama_matakuliah()
		{
			return $this->nama_matakuliah;
		}
	
		
		public function get_sks()
		{
			return $this->sks;
		}
		

		//Method
	
		public function view()
		{
			$sql = "SELECT * FROM tbl_mata_kuliah";	
			return $this->db->query($sql);
		}
		public function insert()
		{
			$sql = "INSERT INTO tbl_mata_kuliah values(ucase('".$this->get_kode_mk()."'), '".$this->get_nama_matakuliah()."', '".$this->get_sks()."')";	
			return $this->db->query($sql);	
		}
		
		public function view_by_kode_mk()
		{
			$sql = "SELECT * FROM tbl_mata_kuliah WHERE kode_mk='".$this->get_kode_mk()."'";	
			return $this->db->query($sql);
		}
		public function update()
		{
			$sql = "UPDATE tbl_mata_kuliah SET nama_mk='".$this->get_nama_matakuliah()."',sks='".$this->get_sks()."' WHERE kode_mk='".$this->get_kode_mk()."'";	
			$this->db->query($sql);	
		}
		public function delete()
		{
			$sql = "DELETE FROM tbl_mata_kuliah WHERE kode_mk='".$this->get_kode_mk()."'";	
			$this->db->query($sql);	
		}
		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_program_keahlian";	
			$this->db->query($sql);	
		}
		
	}
?>