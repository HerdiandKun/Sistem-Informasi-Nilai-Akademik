<! DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url();?>assets/img/background.png" rel="shortcut icon" rev="shortcut icon">
        <title>Beranda | Program Diploma IPB</title>
        
        <!-- CSS -->
        <link href="<?PHP echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
         <link href="<?PHP echo base_url(); ?>assets/css/jquery.dataTables.min.css" rel="stylesheet">
		 <link href="<?PHP echo base_url(); ?>assets/css/datepicker.css" rel="stylesheet">
        <style type="text/css">
		 .navbar,  .well
		 {
			<!--background-color: #0066ff;-->
			margin: 0;
		 }
		
        </style>
    </head>
    <body>
    	<nav class="navbar navbar-inverse" style="overflow" role="navigation">
        	<div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?PHP echo base_url(); ?>">
                        <img src="<?php echo base_url();?>assets/img/background.png" width="20" height="20">Sistem Informasi Nilai Akademik
                    </a>
                	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu">
                    	<span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="menu">
                <ul class="nav navbar-nav">
                	<li <?PHP if($this->uri->segment(1)=='') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>"> Beranda </a>
                    </li>
                    <?PHP 
						if($this->session->userdata('status') == 1)
						{
					?>
                  	<li <?PHP if($this->uri->segment(1)=='mahasiswa') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>mahasiswa"> Mahasiswa </a>
                    </li>
                    <li <?PHP if($this->uri->segment(1)=='dosen') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>dosen"> Dosen </a>
                    </li>
                    <li <?PHP if($this->uri->segment(1)=='matakuliah') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>matakuliah"> Mata Kuliah </a>
                    </li>
                    <li <?PHP if($this->uri->segment(1)=='paket_krs') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>paket_krs"> Paket KRS </a>
                    </li>
					<li <?PHP if($this->uri->segment(1)=='lap_nilai') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>lap_nilai"> Laporan Nilai </a>
                    </li>
                    <?PHP 
						} else if ($this->session->userdata('status') == 3)
						{
					?>
                    <li <?PHP if($this->uri->segment(1)=='nilai_mhs') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>nilai_mhs"> Nilai </a>
                    </li>
                    <li <?PHP if($this->uri->segment(1)=='profil_mhs') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>profil_mhs"> Profil </a>
                    </li>
                    <?PHP 
						} else if ($this->session->userdata('status') == 2)
						{
					?>
                    <li <?PHP if($this->uri->segment(1)=='nilai') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>nilai"> Nilai </a>
                    </li>
                    <li <?PHP if($this->uri->segment(1)=='profil_dosen') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>profil_dosen"> Profil </a>
                    </li>
                    <li <?PHP if($this->uri->segment(1)=='mahasiswa') echo ' class="active"'; ?>>
                    	<a href="<?PHP echo site_url();?>mahasiswa"> Mahasiswa </a>
                    </li>
                    <?php
                    }
					?>
                </ul>
                	<ul class="nav navbar-nav  navbar-right">
                    <?PHP 
						if($this->session->userdata('username') == '')
						{
					?>
                    	<li>
                        	<a href="<?PHP echo site_url();?>sign_in">
                            	<i class="glyphicon glyphicon-log-in"></i> Sign In
                            </a>
                        </li>
                    	
                        <?PHP 
						} else{
						?>
                        	<li>
                            	<a href=""><i class="glyphicon glyphicon-user"></i> <?PHP echo $this->session->userdata('username');?></a>
                            </li>
                            <li>
                            	<a href="<?PHP echo site_url(); ?>sign_in/logout"><i class="glyphicon glyphicon-log-out"></i>Sign Out</a>
                            </li>
                        <?PHP 
						}
						?>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="jumbotron">
        	<div class="container">
            	<h1>Program Diploma IPB</h1>
                <p>
                	Mencari dan Memberi yang Terbaik
                </p>
            </div>
        </div>