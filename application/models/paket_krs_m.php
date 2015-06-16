<?PHP
	class Paket_KRS_M extends CI_Model
	{
		private $nim;
		private $kode_mk;
		private $ipk;
		private $id_pk;
		private $semester;
		
		
			public function set_nim($value)
		{
			$this->nim = $value;	
		}
		public function set_kode_mk($value)
		{
			$this->kode_mk = $value;	
		}
		public function set_id_pk($value)
		{
			$this->id_pk = $value;	
		}
		public function set_semester($value)
		{
			$this->semester = $value;	
		}
		
		
		
		//Method Setter - Getter
		public function get_nim()
		{
			return $this->nim;
		}
		public function get_kode_mk()
		{
			return $this->kode_mk;
		}
		public function get_id_pk()
		{
			return $this->id_pk;
		}
		public function get_semester()
		{
			return $this->semester;
		}
		
		public function view_krs()
		{
			$sql=" select * from tbl_paket_krs";
			return $this->db->query($sql);
		}
		public function view()
		{
			$sql=" select distinct nama_pk,semester,nama_mk from tbl_program_keahlian as pk, tbl_mahasiswa as m, tbl_paket_krs as pkt, tbl_mata_kuliah as mk where m.nim=pkt.nim and mk.kode_mk=pkt.kode_mk and m.id_pk=pk.id_pk";
			return $this->db->query($sql);
		}
		public function view_by_pk(){
			$sql="select * from tbl_mahasiswa where id_pk='".$this->get_id_pk()."' and semester='".$this->get_semester()."'";
			return $this->db->query($sql);
			
		}
		public function insert(){
			$sql="insert into tbl_paket_krs values('".$this->get_kode_mk()."','".$this->get_nim()."','')";
			$this->db->query($sql);
		}
		public function delete_all(){
			$sql="truncate table tbl_paket_krs";
			$this->db->query($sql);
		}
		public function delete_n(){
			$sql="truncate table tbl_nilai";
			$this->db->query($sql);
		}
	}
?>