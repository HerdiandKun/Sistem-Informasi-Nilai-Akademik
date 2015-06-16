<?PHP
	class Program_Keahlian_M extends CI_Model
	{
		//Properti
		
		private $id_program_keahlian;
		private $program_keahlian;
		
		//Method
		
		public function set_id_program_keahlian($value)
		{
			$this->id_program_keahlian = $value;	
		}
		
		public function set_program_keahlian($value)
		{
			$this->program_keahlian = $value;	
		}
		
		
		//Method Setter - Getter
		
		public function get_id_program_keahlian()
		{
			return $this->id_program_keahlian;
		}
		
		public function get_program_keahlian()
		{
			return $this->program_keahlian;
		}
		

		//Method
	
		public function view()
		{
			$sql = "SELECT * FROM tbl_program_keahlian";	
			return $this->db->query($sql);
		}
		public function insert()
		{
			$sql = "INSERT INTO tbl_program_keahlian values('".$this->get_id_program_keahlian()."', '".$this->get_program_keahlian()."')";	
			return $this->db->query($sql);	
		}
		
		public function view_by_id_pk()
		{
			$sql = "SELECT * FROM tbl_program_keahlian WHERE id_pk='".$this->get_id_program_keahlian()."'";	
			return $this->db->query($sql);
		}
		public function update()
		{
			$sql = "UPDATE tbl_program_keahlian SET nama_pk='".$this->get_program_keahlian()."' WHERE id_pk='".$this->get_id_program_keahlian()."'";	
			$this->db->query($sql);	
		}
		public function delete()
		{
			$sql = "DELETE FROM tbl_program_keahlian WHERE id_pk='".$this->get_id_program_keahlian()."'";	
			$this->db->query($sql);	
		}
		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_program_keahlian";	
			$this->db->query($sql);	
		}
			
	}
?>