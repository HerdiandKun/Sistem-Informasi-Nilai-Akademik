<?PHP
	class Mahasiswa_M extends CI_Model
	{
		//Properti
		
		private $nama;
		private $jenis_kelamin;
		private $nim;
		private $tanggal_lahir;
		private $id_program_keahlian;
		private $alamat;
		private $semester;
		private $username;
		private $password;
		private $password_baru;
		
		//Method
		
		
		public function set_nim($value)
		{
			$this->nim = $value;	
		}
		
		
		public function set_nama($value)
		{
			$this->nama = $value;	
		}
		
		
		public function set_jenis_kelamin($value)
		{
			$this->jenis_kelamin = $value;	
		}
		
		
		public function set_tanggal_lahir($value)
		{
			$this->tanggal_lahir = $value;	
		}
		
		public function set_id_program_keahlian($value)
		{
			$this->id_program_keahlian = $value;	
		}
		public function set_semester($value)
		{
			$this->semester = $value;	
		}		
		public function set_alamat($value)
		{
			$this->alamat = $value;	
		}
		public function set_username($value)
		{
			$this->username = $value;	
		}
		public function set_password($value)
		{
			$this->password = $value;	
		}
				public function set_password_baru($value)
		{
			$this->password = $value;	
		}
		
		
		//Method Setter - Getter
		
		public function get_nim()
		{
			return $this->nim;
		}
		public function get_nama()
		{
			return $this->nama;
		}
		public function get_jenis_kelamin()
		{
			return $this->jenis_kelamin;
		}
		public function get_tanggal_lahir()
		{
			return $this->tanggal_lahir;
		}
		public function get_id_program_keahlian()
		{
			return $this->id_program_keahlian;
		}
		
		public function get_alamat()
		{
			return $this->alamat;
		}
		public function get_semester()
		{
			return $this->semester;
		}
		
		public function get_username()
		{
			return $this->username;
		}		
		
		public function get_password()
		{
			return $this->password;
		}
		public function get_password_baru()
		{
			return $this->password;
		}
		

		//Method
	
		public function view()
		{
			$sql = "SELECT * FROM tbl_mahasiswa";	
			return $this->db->query($sql);
		}
		
		public function insert()
		{
			$sql = "INSERT INTO tbl_mahasiswa values(ucase('".$this->get_nim()."'), '".$this->get_nama()."', '".$this->get_jenis_kelamin()."', '".$this->get_tanggal_lahir()."', '".$this->get_id_program_keahlian()."', '".$this->get_semester()."', '".$this->get_alamat()."')";	
			//$sql2 = "INSERT INTO tbl_pengguna(username,password,status,nim) values('".$this->get_username()."', md5('".$this->get_password()."'),0, '".$this->get_nim()."')";	
			$this->db->query($sql);
			//return $this->db->query($sql2);	
		}
		
		public function insert_p()
		{
			$sql = "INSERT INTO tbl_pengguna(username,password,status,nim) values('".$this->get_username()."', md5('".$this->get_password()."'),3, '".$this->get_nim()."')";	
			return $this->db->query($sql);	
		}
		
		public function view_by_nim()
		{
			$sql = "SELECT * FROM tbl_mahasiswa WHERE nim='".$this->get_nim()."'";	
			return $this->db->query($sql);
		}
		
		
		public function update()
		{
			$sql = "UPDATE tbl_mahasiswa SET nama='".$this->get_nama()."', jenis_kelamin='".$this->get_jenis_kelamin()."', tanggal_lahir='".$this->get_tanggal_lahir()."', id_pk='".$this->get_id_program_keahlian()."', alamat='".$this->get_alamat()."', Semester='".$this->get_semester()."'  WHERE nim='".$this->get_nim()."'";	
			$this->db->query($sql);	
		}
				
		public function delete()
		{
			$sql = "DELETE FROM tbl_mahasiswa WHERE nim='".$this->get_nim()."'";	
			$this->db->query($sql);	
		}
		
		public function delete_p()
		{
			$sql = "DELETE FROM tbl_pengguna WHERE nim='".$this->get_nim()."'";	
			$this->db->query($sql);	
		}
		
		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_mahasiswa";	
			$this->db->query($sql);	
		}
		public function delete_all_p()
		{
			$sql = "DELETE FROM tbl_pengguna WHERE status=3";
			$this->db->query($sql);	
		}
		public function view_nim()
		{
			$sql = "SELECT * FROM tbl_mahasiswa as m,tbl_program_keahlian as pk where pk.id_pk=m.id_pk and nim='".$this->session->userdata('nim')."'";
			return $this->db->query($sql);	
		}
		public function update_p()
		{
			$sql = "UPDATE tbl_pengguna SET username='".$this->get_username()."', password=md5('".$this->get_password_baru()."') WHERE username='".$this->session->userdata('username')."'";	
			$this->db->query($sql);	
		}
			public function view_by_password()
		{
			$sql = "SELECT * FROM tbl_pengguna WHERE password=md5('".$this->get_password()."') and username='".$this->session->userdata('username')."'";	
			return $this->db->query($sql);
		}
			
	}
?>