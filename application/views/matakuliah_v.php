<?PHP
	$this->load->view('header_v');
?>

<div class="container">
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Mata Kuliah</h4>
            </div>
            <div class="pull-right">
         <?PHP if($this->session->userdata('status') == 1) 
		{
		?>
           <button class="btn btn-primary add" title="tambah" data-toggle="modal" data-target="#modal_matakuliah"><i class="glyphicon glyphicon-plus"> Tambah</i></button>
           <!--<button class="btn btn-danger delete_all" title="hapus_all" data-toggle="modal" data-target="#modal_konfirmasi"><i class="glyphicon glyphicon-trash"> Hapus Semua</i></button>
       --><?PHP
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
                	<th>Kode MK</th>
                    <th>Nama MK</th>
                     <th>SKS</th>
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
					$query = $this->matakuliah_m->view(); 
					foreach($query->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->kode_mk;?>
                <input type="hidden" id="nama_<?php echo $row->kode_mk;?>" value="<?php echo $row->nama_mk;?>">
                <input type="hidden" id="sks_<?php echo $row->kode_mk;?>" value="<?php echo $row->sks;?>">
                </td>
                <td><?php echo $row->nama_mk;?></td>
               <td><?php echo $row->sks;?></td>
              
                <?PHP if($this->session->userdata('status') == 1) {?>
                    <td>
                    	<button class="btn btn-warning btn-sm edit" title="ubah" data-toggle="modal" data-target="#modal_matakuliah" id="edit_<?php echo $row->kode_mk;?>"><i class="glyphicon glyphicon-edit"> Ubah</i></button>
                        <button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->kode_mk;?>"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
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
            
         	<div class="modal fade" id="modal_matakuliah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Form Mata Kuliah</h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_matakuliah" >
                                   <div class="form-group">
                                 	<label >Kode Mata Kuliah</label>
                                    <input type="text" class="form-control" name="kode_mk" id="kode_mk" placeholder="Kode Mata Kuliah" required>  
                                    <input type="hidden" name="kode_mk_tmp" id="kode_mk_tmp" />
                                   </div>
                                   <div class="form-group">
                                 	<label>Nama Mata Kuliah</label>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Mata Kulaih" required>  
                                   </div>
                                   <div class="form-group">
                                 	<label>SKS</label>
                                    <input type="text" name="sks" class="form-control" id="sks" placeholder="SKS" required>
                                      </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-small" type="submit" form="form_matakuliah" id="save">Simpan</button>
                                   <button class="btn btn-primary btn-small" type="submit" form="form_matakuliah" id="update">Perbaharui</button>
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
		$('#sks').val('');
		$('#semester').val('');
		$('#nama').val('');
		$('#kode_mk').val('');
		$('#kode_mk').attr('disabled',false);	
		$('#save').show();
		$('#update').hide();	
		$('#form_matakuliah').attr('action','<?php echo site_url(); ?>matakuliah/insert');
		});
		
		$('.edit').click(function(){
		var id = this.id.substr(5);
		//alert(id);
		$('#kode_mk').val(id);
		$('#kode_mk_tmp').val(id);
		$('#kode_mk').attr('disabled',true);
		$('#save').hide();
		$('#update').show();
		$('#semester').val($('#semester_'+id).val());
		$('#sks').val($('#sks_'+id).val());
		$('#nama').val($('#nama_'+id).val());
		$('#form_matakuliah').attr('action','<?php echo site_url(); ?>matakuliah/update');
		
		});
	
		$('.delete').click(function(){
		var id = this.id.substr(6);
		//	alert(id);
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
			
			window.location = '<?php echo site_url();?>matakuliah/delete/' + $('#kode_mk').val();;
		});
		$('#delete_all').click(function(){
			window.location = '<?php echo site_url();?>matakuliah/delete_all';
		});
		
		$('.table').dataTable();
	});
</script>
        
