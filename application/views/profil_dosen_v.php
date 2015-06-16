<?PHP
	$this->load->view('header_v');
?>

<div class="container">
		<?PHP
				$query = $this->dosen_m->view_nip();
				//$row = fetch_object($query->result());
				foreach($query->result() as $row) :
			
				?>
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Profil Dosen</h4>
            </div>
            <div class="pull-right">
             <button class="btn btn-warning btn-default edit" title="ubah" data-toggle="modal" data-target="#modal_profil_dosen" id="edit_<?php echo $row->NIP;?>" name="edit_<?php echo $row->kode_dosen;?>"><i class="glyphicon glyphicon-edit"> Ubah</i></button>  
                 <button class="btn btn-danger btn-default edit_pass" title="ubah" data-toggle="modal" data-target="#modal_password"><i class="glyphicon glyphicon-edit"> Ubah Username dan Password</i></button>  
        	</div>
        <div class="clearfix"></div>
        </div>
		<?PHP
		if($this->uri->segment(3)=="error_save")
		{?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Gagal Disimpan
            </div>
        <?php
        }
		else if($this->uri->segment(3)=="success")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Berhasil Disimpan
            </div>
        <?php
        }
				else if($this->uri->segment(3)=="success_del")
		{
		?>
        <div class="alert alert-success alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Berhasil Dihapus
            </div>
        <?php
        }
		?>
        	<div class="panel-body">
            <table class="table table-responsive">
			
				
	
            <head>
            	<tr>
                	<th>NIP</th>
					<td><?php echo $row->NIP;?></td>
                </tr>
			   	<tr>
                	<th>Nama Dosen</th>
					<td><?php echo $row->Nama;?>
					<input type="hidden" id="nm_<?php echo $row->kode_dosen;?>" value="<?php echo $row->Nama;?>">
					</td>
					
                </tr>     
               </head>
			   <?php
			   endforeach;
			   ?>
               <body>
               </body>
            </table>
            
         	<div class="modal fade" id="modal_profil_dosen">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Ubah Data Dosen </h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_edit_profil" >
                                   <div class="form-group">
                                 	<label>NIP</label>
                                    <input type="text" class="form-control" name="nip" id="nip" placeholder="Kode Mata Kuliah" required>  
                                    <input type="hidden" name="nip_tmp" id="nip_tmp" />
                                   </div>
                                   <div class="form-group">
                                 	<label>Nama Dosen</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>  
                                   </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                                   <button class="btn btn-primary btn-small" type="submit" form="form_edit_profil" id="update">Perbaharui</button>
                                   <button class="btn btn-primary btn-small"data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                </div>   
                <div class="modal fade" id="modal_password">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Ubah Username dan Password </h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_edit_password" >
                                   <div class="form-group">
                                 	<label>username baru</label>
                                    <input type="text" class="form-control" name="user" id="user" placeholder="Username" required>  
                                    </div>
                                   <div class="form-group">
                                 	<label>Password Lama</label>
                                    <input type="password" class="form-control" name="pass_lama" id="pass_lama" placeholder="Password Lama" required>  
                                   </div>
                                                                      <div class="form-group">
                                 	<label>Password Baru</label>
                                    <input type="password" class="form-control" name="pass_baru" id="pass_baru" placeholder="Password Baru" required>  
                                   </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                                   <button class="btn btn-primary btn-small" type="submit" form="form_edit_password" id="update">Perbaharui</button>
                                   <button class="btn btn-primary btn-small"data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                </div>        
                              
                
                
                
            </div>
        </div>
        
        
        <div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Mata Kuliah Yang Diajarkan</h4>
            </div>
            <div class="pull-right">
             <button class="btn btn-primary add" title="tambah" data-toggle="modal" data-target="#modal_dosen_mk"><i class="glyphicon glyphicon-plus"> Tambah</i></button>
           </div>
        <div class="clearfix"></div>
        </div>
		<?PHP
		if($this->uri->segment(3)=="error_save_mk")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Gagal Disimpan
            </div>
        <?php
        }
		?>    
        	<div class="panel-body">
           <table class="table table-responsive">
            <thead>
            	<tr>
                	<th>Kode Mata Kuliah</th>
                    <th>Mata Kuliah</th>
                    <th>Jam Mengajar(Jam)</th>
                    <th>Modifikasi</th>
                   
                    
                </tr>
               </thead>
               <tbody>
                <?PHP 
					$query = $this->dosen_m->view_mk(); 
					
					foreach($query->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->kode_mk;?>
                <input type="hidden" id="kode_<?php echo $row->kode_mk;?>" value="<?php echo $row->kode_mk;?>">
                <input type="hidden" id="jm_<?php echo $row->kode_mk;?>" value="<?php echo $row->jam_mengajar;?>">
                </td>
                <td><?php echo $row->nama_mk;?></td>
                <td><?php echo $row->jam_mengajar;?></td>       
            	<td>
                    	<button class="btn btn-warning btn-sm edit_dosen_mk" title="ubah" data-toggle="modal" data-target="#modal_dosen_mk" id="edit_<?php echo $row->kode_mk;?>"><i class="glyphicon glyphicon-edit"> Ubah</i></button>
                        <button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->kode_mk;?>"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
                    </td>
                
                    
                </tr>
                <?PHP 
				endforeach;
				?></tbody>
            </table>
            
         	<div class="modal fade" id="modal_dosen_mk">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Form Mengajar Dosen</h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_dosen_mk" >
                                   <div class="form-group">
                                 	<label>Kode Mata Kuliah</label>
                                   <select name="kode_mk" class="form-control" id="kode_mk">
                                    
										<?PHP
                                            $query = "SELECT * FROM tbl_mata_kuliah";
                                            
                                            $result = mysql_query($query);
                                            
                                            while($row_dd = mysql_fetch_object($result))
                                            {
                                        ?>
                                        
                                        <option value="<?PHP echo $row_dd->kode_mk; ?>"><?PHP echo $row_dd->nama_mk; ?></option>
                                        <?PHP
                                            }
                                        ?>
                                        
                                    </select>
                                   <input type="hidden" name="kode_mk_tmp" id="kode_mk_tmp" />
                                   </div>
                                   <div class="form-group">
                                 	<label>Jam Mengajar (Jam)</label>
                                    <input type="text" class="form-control" name="jam" id="jam" placeholder="Jam Mengajar" required>  
                                   </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                                	<button class="btn btn-primary btn-small" type="submit" form="form_dosen_mk" id="save_dosen">Simpan</button>
                                   <button class="btn btn-primary btn-small" type="submit" form="form_dosen_mk" id="update_dosen">Perbaharui</button>
                                   <button class="btn btn-primary btn-small"data-dismiss="modal">Batal</button>
                                </div>
                            </div>
                        </div>
                </div>   
                <div class="modal fade" id="modal_konfirmasi">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Konfirmasi</h4>
                                </div>
                                <div class="modal-body">
                    			   <p id="confirm_str">Apakah Anda Yakin Menghapus Semua</p>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-small" id="delete_all">Ya</button>
                      			   <button class="btn btn-primary btn-small" id="delete">Ya</button>
                                   <button class="btn btn-primary btn-sm" data-dismiss="modal">Tidak</button>
                                </div>
                            </div>
                        </div>
                </div>       
                              
                
                
                
            </div>
        </div>
        
    </div>

<?PHP
	$this->load->view('footer_v');
?>
        
<script type="text/javascript">
	$(document).ready(function()
	{
		$('.edit').click(function(){
		var id = this.id.substr(5);
		var id2 = this.name.substr(5);
		//alert(id);
		$('#nip').val(id);
		$('#nip_tmp').val(id);
		$('#nip').attr('disabled',true);
		$('#update').show();
		$('#nama').val($('#nm_'+id2).val());
		$('#form_edit_profil').attr('action','<?php echo site_url(); ?>profil_dosen/update');
		
		});
		$('.edit_pass').click(function(){
		
		//alert(id);
		$('#user').val('<?php echo $this->session->userdata('username');?>');
		$('#update').show();
		$('#form_edit_password').attr('action','<?php echo site_url(); ?>profil_dosen/password');
		
		});
		
		$('.add').click(function(){
		$('#jam').val('');
		$('#kode_mk').val('');
		$('#kode_mk').attr('disabled',false);
		$('#save_dosen').show();
		$('#update_dosen').hide();
		$('#form_dosen_mk').attr('action','<?php echo site_url(); ?>profil_dosen/dosen_tambah_mk');
		});
		$('.edit_dosen_mk').click(function(){
		var id = this.id.substr(5);
		//alert(id);
		$('#kode_mk').val(id);
		$('#kode_mk_tmp').val(id);
		$('#kode_mk').attr('disabled',true);
		$('#jam').val($('#jm_'+id).val())
		$('#save_dosen').hide();
		$('#update_dosen').show();
		$('#form_dosen_mk').attr('action','<?php echo site_url(); ?>profil_dosen/dosen_edit_mk');
		});
		
		$('.delete').click(function(){
		var id = this.id.substr(6);
		//alert(id);
		$('#kode_mk').val(id);
		$('#confirm_str').html('Apaka Anda Ingin Menghapus Data Ini')
		$('#delete_all').hide();
		$('#delete').show();
		});
		
		$('.delete_all').click(function(){
		$('#confirm_str').html('Apaka Anda Ingin Menghapus Semua Data')
		$('#delete_all').show();
		$('#delete').hide();
		});
		
		$('#delete').click(function(){
			
			window.location = '<?php echo site_url();?>profil_dosen/delete/' + $('#kode_mk').val();;
		});
		$('#delete_all').click(function(){
			window.location = '<?php echo site_url();?>profil_dosen/delete_all';
		});
		
		$('.table').dataTable();
	});
</script>
        