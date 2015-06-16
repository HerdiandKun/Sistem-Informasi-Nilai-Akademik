<?PHP
	$this->load->view('header_v');
?>
	<div class="container">
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Program Keahlian</h4>
            </div>
            <div class="pull-right">
         <?PHP if($this->session->userdata('status') == 1) 
		{
		?>
           <button class="btn btn-primary add" title="tambah" data-toggle="modal" data-target="#modal_program_keahlian"><i class="glyphicon glyphicon-plus"> Tambah</i></button>
           <button class="btn btn-danger delete_all" title="hapus_all" data-toggle="modal" data-target="#modal_konfirmasi"><i class="glyphicon glyphicon-trash"> Hapus Semua</i></button>
           <button class="btn btn-default btn-sm excel" title="export excel"><i class="glyphicon glyphicon-export"></i>Export Excel</button>
       <?PHP
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
		?>
         
       
        	<div class="panel-body">
            <table class="table table-responsive">
            <thead>
            	<tr>
                	<th>Id Program Keahlian</th>
                    <th>Program Keahlian</th>
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
					$query = $this->program_keahlian_m->view(); 
					
					foreach($query->result() AS $row) :
				?>
                <tr>
				<td>
				<?php echo $row->id_pk;?>
                <input type="hidden" id="program_keahlian_<?php echo $row->id_pk;?>" value="<?php echo $row->nama_pk;?>"> 
                </td>
                <td><?php echo $row->nama_pk;?></td>
              
                <?PHP if($this->session->userdata('status') == 1) {?>
                    <td>
                    	<button class="btn btn-warning btn-sm edit" title="ubah" data-toggle="modal" data-target="#modal_program_keahlian" id="edit_<?php echo $row->id_pk;?>"><i class="glyphicon glyphicon-edit"> Ubah</i></button>
                        <button class="btn btn-danger btn-sm delete" title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->id_pk;?>"><i class="glyphicon glyphicon-trash"> Hapus</i></button>
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
            
         	<div class="modal fade" id="modal_program_keahlian">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Form Program Keahlian</h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_pk" >
                                   <div class="form-group">
                                 	<label>ID Program Keahlian</label>
                                    <input type="text" class="form-control" name="id_pk" id="id_pk" placeholder="ID Program Keahlian" required>  
                                    <input type="hidden" name="id_pk_tmp" id="id_pk_tmp" />
                                   </div>
                                   <div class="form-group">
                                 	<label>Program Keahlian</label>
                                    <input type="text" class="form-control" name="nama_pk" id="nama_pk" placeholder="Program Keahlian" required>  
                                   </div>
                                   </form>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-small" type="submit" form="form_pk" id="save">Simpan</button>
                                   <button class="btn btn-primary btn-small" type="submit" form="form_pk" id="update">Perbaharui</button>
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
		$('#id_pk').val('');
		$('#nama_pk').val('');
		$('#id_pk').attr('disabled',false);	
		$('#save').show();
		$('#update').hide();	
		$('#form_pk').attr('action','<?php echo site_url(); ?>program_keahlian/insert');
		});
		$('.edit').click(function(){
		var id = this.id.substr(5);
		//alert(id);
		$('#id_pk').val(id);
		$('#id_pk_tmp').val(id);
		$('#id_pk').attr('disabled',true);
		$('#save').hide();
		$('#update').show();
		$('#nama_pk').val($('#program_keahlian_'+id).val());
		$('#form_pk').attr('action','<?php echo site_url(); ?>program_keahlian/update');
		
		});
	
		$('.delete').click(function(){
		var id = this.id.substr(6);
			//alert(id);
		$('#id_pk').val(id);
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
			
			window.location = '<?php echo site_url();?>program_keahlian/delete/' + $('#id_pk').val();;
		});
		$('#delete_all').click(function(){
			window.location = '<?php echo site_url();?>program_keahlian/delete_all';
		});
		$('.excel').click(function(){
			window.location = '<?php echo site_url();?>program_keahlian/excel';
		});
		
		$('.table').dataTable();
	});
</script>
        
