<?PHP
	class Dosen_M extends CI_Model
	{
		//Properti
		
		private $nama;
		private $nip;
		private $username;
		private $password;
		private $kode_mk;
		private $jam;
		
		//Method
		
		public function set_jam($value)
		{
			$this->jam = $value;	
		}
		public function set_kode_mk($value)
		{
			$this->kode_mk = $value;	
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
			$this->password_baru = $value;	
		}
		
		public function set_nip($value)
		{
			$this->nip = $value;	
		}
		
		
		public function set_nama($value)
		{
			$this->nama = $value;	
		}
		
		
		
		//Method Setter - Getter
		public function get_jam()
		{
			return $this->jam;
		}
		public function get_kode_mk()
		{
			return $this->kode_mk;
		}
		public function get_nip()
		{
			return $this->nip;
		}
		public function get_nama()
		{
			return $this->nama;
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
			return $this->password_baru;
		}
		//Method
	
		public function view()
		{
			$sql = "SELECT * FROM tbl_dosen";	
			return $this->db->query($sql);
		}
		
		public function insert()
		{
			$sql = "INSERT INTO tbl_dosen(NIP,Nama) values('".$this->get_nip()."', '".$this->get_nama()."')";	
			$this->db->query($sql);
			}
		
		public function insert_p()
		{
			$sql = "INSERT INTO tbl_pengguna(username,password,status,nip) values('".$this->get_username()."', md5('".$this->get_password()."'),2, '".$this->get_nip()."')";	
			return $this->db->query($sql);	
		}
		
		public function view_by_nip()
		{
			$sql = "SELECT * FROM tbl_dosen WHERE nip='".$this->get_nip()."'";	
			return $this->db->query($sql);
		}
		public function view_nip()
		{
			$sql = "SELECT * FROM tbl_dosen WHERE nip='".$this->session->userdata('nip')."'";	
			return $this->db->query($sql);
		}
		
		public function update()
		{
			$sql = "UPDATE tbl_dosen SET nama='".$this->get_nama()."' WHERE nip='".$this->get_nip()."'";	
			$this->db->query($sql);	
		}
				
		public function delete()
		{
			$sql = "DELETE FROM tbl_dosen WHERE nip='".$this->get_nip()."'";	
			$this->db->query($sql);	
		}
		
		public function delete_p()
		{
			$sql = "DELETE FROM tbl_pengguna WHERE nip='".$this->get_nip()."'";	
			$this->db->query($sql);	
		}
		
		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_dosen";	
			$this->db->query($sql);	
		}
		public function delete_all_p()
		{
			$sql = "DELETE FROM tbl_pengguna WHERE status=2";
			$this->db->query($sql);	
		}
		
			public function view_by_password()
		{
			$sql = "SELECT * FROM tbl_pengguna WHERE password=md5('".$this->get_password()."') and username='".$this->session->userdata('username')."'";	
			return $this->db->query($sql);
		}
		
		public function update_p()
		{
			$sql = "UPDATE tbl_pengguna SET username='".$this->get_username()."', password=md5('".$this->get_password_baru()."') WHERE username='".$this->session->userdata('username')."'";	
			$this->db->query($sql);	
		}
		
		public function view_mk()
		{
			$sql = "Select * from tbl_detail_dosen as dd, tbl_mata_kuliah as mk where dd.kode_mk=mk.kode_mk and dd.nip='".$this->session->userdata('nip')."'";
			return $this->db->query($sql);	
		}	
		public function tambah_detail_dosen()
		{
			$sql = "INSERT INTO tbl_detail_dosen values('".$this->get_nip()."','".$this->get_kode_mk()."','".$this->get_jam()."')";
			$this->db->query($sql);	
		}		
		public function edit_detail_dosen()
		{
			$sql = "UPDATE tbl_detail_dosen set jam_mengajar='".$this->get_jam()."' where nip='".$this->get_nip()."' AND kode_mk='".$this->get_kode_mk()."'";
			$this->db->query($sql);
		}
		
		public function delete_detail_dosen()
		{
			$sql = "DELETE FROM tbl_detail_dosen where kode_mk='".$this->get_kode_mk()."'";
			$this->db->query($sql); 
		}
		public function delete_all_detail_dosen()
		{
			$sql = "TRUNCATE TABLE tbl_detail_dosen";
			$this->db->query($sql); 
		}
		public function view_by_kode_mk()
		{
			$sql = "SELECT * FROM tbl_detail_dosen WHERE kode_mk='".$this->get_kode_mk()."' and nip ='".$this->session->userdata('nip')."'";
			return $this->db->query($sql); 
		}
	}
?>