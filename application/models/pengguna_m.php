<?PHP
	class Pengguna_M extends CI_Model
	{
		//Properti
		
		private $username;
		private $password;
		private $status;
		
		//Method
		
		public function set_username($value)
		{
			$this->username = $value;	
		}
		
		public function set_password($value)
		{
			$this->password = $value;	
		}
		
		public function set_status($value)
		{
			$this->status = $value;	
		}
		
		
		//Method Setter - Getter
		
		public function get_username()
		{
			return $this->username;
		}
		
		public function get_password()
		{
			return $this->password;
		}
		
		public function get_status()
		{
			return $this->status;
		}
		
		//Method
	
		public function view_by_username_password()
		{
			$sql = "SELECT * FROM tbl_pengguna WHERE username = '".$this->get_username()."' AND password= md5('" .$this->get_password()."')";	
			return $this->db->query($sql);
		}
	}
?>