<?PHP
	$this->load->view('header_v');
?>

<div class="container">        
        <div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Mata Kuliah Yang Diajarkan</h4>
            </div>
              <div class="clearfix"></div>
        </div>
		<?PHP
		if($this->uri->segment(3)=="error_save")
		{
		?>
        <div class="alert alert-danger alert-dismissable">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Data Sudah Tersedia
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
                    <th>Nilai</th>
                    
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
                    <td>
                    <form method="post" action="<?php echo site_url()?>nilai/tambah">
                    <input type="hidden" id="mk" name="mk" value="<?php echo $row->kode_mk;?>">
                    	<button class="btn btn-primary btn-sm nilai" title="ubah" id="<?php echo $row->kode_mk;?>"><i class="glyphicon glyphicon-edit">Tambah Nilai</i></button></form>
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
        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
