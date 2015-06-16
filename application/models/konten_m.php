<?php 
class Konten_M extends CI_Model
	{	
		private $konten;
		
		public function set_konten($value)
		{
			$this->konten = $value;	
		}	
		public function get_konten()
		{
			return $this->konten;	
		}	
		
		public function view()
		{
			$sql = "SELECT * FROM tbl_konten ";	
			return $this->db->query($sql);
		}
		public function update()
		{
			$sql = "UPDATE tbl_konten set konten='".$this->get_konten()."'";	
			$this->db->query($sql);
		}
	}
?>