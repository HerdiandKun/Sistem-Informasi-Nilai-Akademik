<?PHP
	$this->load->view('header_v');
?>

<div class="container">
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Mahasiswa</h4>
            </div>
            <div class="pull-right">
         <?PHP if($this->session->userdata('status') == 1) 
		{
		?>
           <button class="btn btn-primary add" title="tambah" data-toggle="modal" data-target="#modal_mahasiswa"><i class="glyphicon glyphicon-plus"> Tambah</i></button>
           <!--<button class="btn btn-danger delete_all" title="hapus_all" data-toggle="modal" data-target="#modal_konfirmasi"><i class="glyphicon glyphicon-trash"> Hapus Semua</i></button>
      --> <?PHP
		}
		?></div>
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
            <thead>
            	<tr>
                	<th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tangal Lahir</th>
                    <th>ID PK</th>
                    <th>Semester</th>
                    <th>Alamat</th>
                    <?PHP if($this->session->userdata('status') == 1) 
					{
					?>
                    <th>Modifikasi</th>
                    <?PHP
					}
					?>
                </tr>
               </thead>
               <tbody>
                <?PHP 
					$query = $this->mahasiswa_m->view(); 
					
					foreach($query->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->nim;?>
                <input type="hidden" id="nama_<?php echo $row->nim;?>" value="<?php echo $row->nama;?>">
                <input type="hidden" id="jk_<?php echo $row->nim;?>" value="<?php echo $row->jenis_kelamin;?>"> 
                <input type="hidden" id="tl_<?php echo $row->nim;?>" value="<?php echo $row->tanggal_lahir;?>">
                <input type="hidden" id="id_pk_<?php echo $row->nim;?>" value="<?php echo $row->id_pk;?>">
                <input type="hidden" id="alamat_<?php echo $row->nim;?>" value="<?php echo $row->alamat;?>">
                <input type="hidden" id="semester_<?php echo $row->nim;?>" value="<?php echo $row->Semester;?>"> 
                </td>
                <td><?php echo $row->nama;?></td>
                <td><?php echo $row->jenis_kelamin == "L" ? "Pria" : "Wanita";?></td>
                <td><?php echo $row->tanggal_lahir;?></td>
                <td><?php echo $row->id_pk;?></td>
                <td><?php echo $row->Semester;?></td>
                <td><?php echo $row->alamat;?></td>
              
                <?PHP if($this->session->userdata('status') == 1) {?>
                    <td>
                    	<button class="btn btn-warning btn-sm edit" title="ubah" data-toggle="modal" data-target="#modal_mahasiswa" id="edit_<?php echo $row->nim;?>"><i class="glyphicon glyphicon-edit"> Ubah</i></button>
                        <button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->nim;?>"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
                    </td>
                    </td>
                    <?PHP
					}
					?>    
                </tr>
                <?PHP 
				endforeach;
				?></tbody>
            </table>
            
         	<div class="modal fade" id="modal_mahasiswa">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Form Mahasiswa</h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_mahasiswa" >
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
                                    <input type="date" class="form-control" name="tl" id="tl" placeholder="(yyyy-mm-dd)" required>  
                                   </div>
                                   <div class="form-group">
                                 	<label>Program Keahlian</label>
                                    <select name="id_pk_tmp" class="form-control" id="id_pk_tmp">
                                    
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
                    			   <button class="btn btn-primary btn-small" type="submit" form="form_mahasiswa" id="save">Simpan</button>
                                   <button class="btn btn-primary btn-small" type="submit" form="form_mahasiswa" id="update">Perbaharui</button>
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
		$('.add').click(function(){
		$('#id_pk_tmp').val('');
		$('#nama').val('');
		$('#jk').val('');
		$('#tl').val('');
		$('#semester').val('');
		$('#alamat').val('');
		$('#nim').val('');
		$('#nim').attr('disabled',false);	
		$('#save').show();
		$('#update').hide();	
		$('#form_mahasiswa').attr('action','<?php echo site_url(); ?>mahasiswa/insert');
		});
		
		$('.edit').click(function(){
		var id = this.id.substr(5);
		//alert(id);
		$('#nim').val(id);
		$('#alamat').val($('#alamat_'+id).val());
		$('#semester').val($('#semester_'+id).val());
		$('#nim_tmp').val(id);
		$('#nim').attr('disabled',true);
		$('#save').hide();
		$('#update').show();
		$('#id_pk_tmp').val($('#id_pk_'+id).val());
		if($('#jk_' + id).val() == 'L')
				$('#pria').attr('checked', true);
			else
				$('#wanita').attr('checked', true);
		$('#tl').val($('#tl_'+id).val());
		
		$('#nama').val($('#nama_'+id).val());
		$('#form_mahasiswa').attr('action','<?php echo site_url(); ?>mahasiswa/update');
		
		});
	
		$('.delete').click(function(){
		var id = this.id.substr(6);
		//	alert(id);
		$('#nim').val(id);
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
			
			window.location = '<?php echo site_url();?>mahasiswa/delete/' + $('#nim').val();;
		});
		$('#delete_all').click(function(){
			window.location = '<?php echo site_url();?>mahasiswa/delete_all';
		});
		
		$('.table').dataTable();
	});
</script>
        
