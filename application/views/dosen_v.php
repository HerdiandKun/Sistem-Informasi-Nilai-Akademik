<?PHP
	$this->load->view('header_v');
?>

<div class="container">
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Dosen Diploma IPB</h4>
            </div>
            <div class="pull-right">
         <?PHP if($this->session->userdata('status') == 1) 
		{
		?>
           <button class="btn btn-primary add" title="tambah" data-toggle="modal" data-target="#modal_dosen"><i class="glyphicon glyphicon-plus"> Tambah</i></button>
         <!--  <button class="btn btn-danger delete_all" title="hapus_all" data-toggle="modal" data-target="#modal_konfirmasi"><i class="glyphicon glyphicon-trash"> Hapus Semua</i></button>
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
            <thead>
            	<tr>
                	<th>NIP</th>
                    <th>Nama</th>
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
					$query = $this->dosen_m->view(); 
					
					foreach($query->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->NIP;?>
                <input type="hidden" id="_<?php echo $row->kode_dosen;?>" value="<?php echo $row->Nama;?>">
                </td>
                <td><?php echo $row->Nama;?></td>
                
                <?PHP if($this->session->userdata('status') == 1) {?>
                    <td>
                            <button class="btn btn-warning btn-sm edit" title="ubah" name="edit_<?php echo $row->kode_dosen;?>" data-toggle="modal" data-target="#modal_dosen" id="edit_<?php echo $row->NIP;?>"><i class="glyphicon glyphicon-edit"> Ubah</i></button>
                        <button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->NIP;?>"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
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
            
         	<div class="modal fade" id="modal_dosen">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Form Dosen</h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_dosen" >
                                   <div class="form-group">
                                 	<label>NIP</label>
                                    <input type="text" class="form-control" name="nip" id="nip" placeholder="NIP" required>  
                                    <input type="hidden" name="nip_tmp" id="nip_tmp" />
                                   </div>
                                   <div class="form-group">
                                 	<label>Nama</label>
                                     <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Dosen" required>
                                   </div>
                                   <div class="form-group">
                                 	<input type="hidden" class="form-control" name="pass" id="pass" value="12345"  required>
                                   </div>
                                </form>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-small" type="submit" form="form_dosen" id="save">Simpan</button>
                                   <button class="btn btn-primary btn-small" type="submit" form="form_dosen" id="update">Perbaharui</button>
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
		$('#nama').val('');
		$('#nip').val('');
		$('#nip').attr('disabled',false);	
		$('#save').show();
		$('#update').hide();	
		$('#form_dosen').attr('action','<?php echo site_url(); ?>dosen/insert');
		});
		
		$('.edit').click(function(){
		var id = this.id.substr(5);
		var id2 = this.name.substr(5);
		//alert(id);
		$('#nip').val(id);
		$('#nama').val($('#_'+id2).val());
		
		$('#nip_tmp').val(id);
		$('#nip').attr('disabled',true);
		$('#save').hide();
		$('#update').show();
		
		$('#form_dosen').attr('action','<?php echo site_url(); ?>dosen/update');
		
		});
	
		$('.delete').click(function(){
		var id = this.id.substr(6);
		//alert(id);
		$('#nip').val(id);
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
			
			window.location = '<?php echo site_url();?>dosen/delete/' + $('#nip').val();;
		});
		$('#delete_all').click(function(){
			window.location = '<?php echo site_url();?>dosen/delete_all';
		});
		
		$('.table').dataTable();
	});
</script>
        
