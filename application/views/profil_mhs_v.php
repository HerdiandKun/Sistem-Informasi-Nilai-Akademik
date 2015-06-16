<?PHP
	$this->load->view('header_v');
?>

<div class="container">

		<?PHP
				//echo $this->session->userdata('nim');
				$query = $this->mahasiswa_m->view_nim();
				//$row = fetch_object($query->result());
				foreach($query->result() as $row) :
			
				?>
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Profil Mahasiswa</h4>
            </div>
            <div class="pull-right">
             <button class="btn btn-warning btn-default edit" title="ubah" data-toggle="modal" data-target="#modal_profil_dosen" id="edit_<?php echo $row->nim;?>" name="edit_<?php echo $row->nim;?>"><i class="glyphicon glyphicon-edit"> Ubah</i></button>  
                 <button class="btn btn-danger btn-default edit_pass" title="ubah" data-toggle="modal" data-target="#modal_password"><i class="glyphicon glyphicon-edit"> Ubah Username dan Password</i></button>  
        	</div>
        <div class="clearfix"></div>
        </div>
		<?PHP
		if($this->uri->segment(3)=="error_save")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Gagal Disimpan
            </div>
        <?php
        }else if($this->uri->segment(3)=="error_pass")
		{
		
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Password tidak Cocok
            </div>
        <?php
        }else if($this->uri->segment(3)=="success")
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
                	<th>NIM</th>
					<td><?php echo $row->nim;?></td>
                	<input type="hidden" id="nama_<?php echo $row->nim;?>" value="<?php echo $row->nama;?>">
                <input type="hidden" id="jk_<?php echo $row->nim;?>" value="<?php echo $row->jenis_kelamin;?>"> 
                <input type="hidden" id="tl_<?php echo $row->nim;?>" value="<?php echo $row->tanggal_lahir;?>">
                <input type="hidden" id="id_pk_<?php echo $row->nim;?>" value="<?php echo $row->id_pk;?>">
                <input type="hidden" id="alamat_<?php echo $row->nim;?>" value="<?php echo $row->alamat;?>">
                <input type="hidden" id="semester_<?php echo $row->nim;?>" value="<?php echo $row->Semester;?>"> 
                </tr>
			   	<tr>
                	<th>Nama Mahasiswa</th>
					<td><?php echo $row->nama;?></td>
                </tr>
                <tr>
                	<th>Jenis Kelamin</th>
					<td><?php echo $row->jenis_kelamin;?></td>
                </tr>
             	<tr>
                	<th>Tanggal Lahir</th>
					<td><?php echo $row->tanggal_lahir;?></td>
                </tr>
                <tr>
                	<th>Program Keahlian</th>
					<td><?php echo $row->nama_pk;?></td>
                </tr>  
                <tr>
                	<th>Semester</th>
					<td><?php echo $row->Semester;?></td>
                </tr>  <tr>
                	<th>Program Keahlian</th>
					<td><?php echo $row->alamat;?></td>
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
                     			<h4 class="modal-title">Ubah Data Mahasiswa</h4>
                                </div>
                                <div class="modal-body">
                    			  <form method="post" id="form_edit_mhs" >
                                   <div class="form-group">
                                 	<label>NIM</label>
                                    <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM" required>  
                                    <input type="hidden" name="nim_tmp" id="nim_tmp" />
                                   </div>
                                   <div class="form-group">
                                 	<label>Nama</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" required>  
                                   </div>
                                    <div class="form-group">
                                 	<label>Jenis Kelamin</label>
                                    <input type="radio"  name="jk" id="pria" value="L" checked /> Pria
                					<input type="radio"  name="jk" id="wanita" value="P" /> Wanita
                                    <!--<input type="text" class="form-control" name="jk" id="jk" placeholder="L/P" required>  -->
                                   </div>
                                   <div class="form-group">
                                 	<label>Tanggal Lahir</label>
                                    <input type="text" class="form-control" name="tl" id="tl" placeholder="(yyyy-mm-dd)" required>  
                                   </div>
                                   <div class="form-group">
                                 	<label>Program Keahlian</label>
                                    <select name="id_pk" class="form-control" id="id_pk">
                                    
										<?PHP
                                            $query = "SELECT * FROM tbl_program_keahlian";
                                            
                                            $result = mysql_query($query);
                                            
                                            while($row_pk = mysql_fetch_object($result))
                                            {
                                        ?>
                                        
                                        <option value="<?PHP echo $row_pk->id_pk; ?>"><?PHP echo $row_pk->nama_pk; ?></option>
                                        
                                        <?PHP
                                            }
                                        ?>
                                        
                                    </select>
                                    <input type="hidden" name="id_pk_tmp" id="id_pk_tmp" />
                                    <!--<input type="text" class="form-control" name="id_pk" id="id_pk" placeholder="ID Program Keahlian" required>  -->
                                   </div>
                                   	<div class="form-group">
                                 	<label>Semester</label>
                                   <select name="semester" class="form-control" id="semester">
                                    
										<?PHP
                                           for($i=1;$i<=6;$i++)
										   {
                                        ?>
                                        
                                        <option value="<?PHP echo $i; ?>"><?PHP echo $i; ?></option>
                                        
                                        <?PHP
                                            }
                                        ?>
                                        
                                    </select>
                                    <input type="hidden" name="smtr_tmp" id="smtr_tmp" />
                                     </div>
                                   	<div class="form-group">
                                 	<label>Alamat</label>
                                    <textarea class="form-control" name="alamat" id="alamat" placeholder="Alamat" required></textarea>
                                   </div>
                                  	
                                  	<div class="form-group">
                                 	<input type="hidden" class="form-control" name="pass" id="pass" value="12345"  required>
                                   </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                                   <button class="btn btn-primary btn-small" type="submit" form="form_edit_mhs" id="update">Perbaharui</button>
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
                                   <div class="form-group">
                                   <label>Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="konf_password" id="konf_password" placeholder="Konfirmasi Password" required>  
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
		//alert(id);
		$('#nim').val(id);
		$('#alamat').val($('#alamat_'+id).val());
		$('#semester').val($('#semester_'+id).val());
		$('#nim_tmp').val(id);
		$('#semester').attr('disabled',true);
		$('#nim').attr('disabled',true);
		$('#save').hide();
		$('#update').show();
		$('#id_pk').attr('disabled',true);
		$('#id_pk').val($('#id_pk_'+id).val());
		$('#id_pk_tmp').val($('#id_pk_'+id).val());
		$('#smtr_tmp').val($('#semester_'+id).val());
		if($('#jk_' + id).val() == 'L')
				$('#pria').attr('checked', true);
			else
				$('#wanita').attr('checked', true);
		$('#tl').val($('#tl_'+id).val());
		
		$('#nama').val($('#nama_'+id).val());
		$('#form_edit_mhs').attr('action','<?php echo site_url(); ?>mahasiswa/update');
		
		});
		$('.edit_pass').click(function(){
		//alert(id);
		$('#user').val('<?php echo $this->session->userdata('username');?>');
		$('#update').show();
		$('#form_edit_password').attr('action','<?php echo site_url(); ?>profil_mhs/password');
		
		});
		
		$('.table').dataTable();
	});
</script>
        