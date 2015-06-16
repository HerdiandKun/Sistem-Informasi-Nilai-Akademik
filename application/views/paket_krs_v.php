<?PHP
	$this->load->view('header_v');
?>

<div class="container">
    	<div class="panel panel-default">
        <div class="panel-heading">
        	<div class="pull-left">
            <h4>Paket KRS Diploma IPB</h4>
            </div>
            <div class="pull-right">
         <?PHP if($this->session->userdata('status') == 1) 
		{
		?>
           <button class="btn btn-primary add" title="tambah" data-toggle="modal" data-target="#modal_krs"><i class="glyphicon glyphicon-plus"> Tambah</i></button>
           <button class="btn btn-danger delete_all" title="hapus_all" data-toggle="modal" data-target="#modal_konfirmasi"><i class="glyphicon glyphicon-trash"> Hapus Semua</i></button>
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
            <table class="table table-responsive">
            <thead>
            	<tr>
                	<th>Program Keahlian</th>
                    <th>Semester</th>
                    <th>Mata Kuliah</th>
                   
                </tr>
               </thead>
               <tbody>
                <?PHP 
					$query = $this->paket_krs_m->view(); 
					foreach($query->result() AS $row) :
				?>

                <tr>
				<td>
				<?php echo $row->nama_pk;?>
                </td>
                <td><?php echo $row->semester;?></td>
                <td><?php echo $row->nama_mk;?></td>
               
                </tr>
                <?PHP 
				endforeach;
				?></tbody>
            </table>
            
         	<div class="modal fade" id="modal_krs">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <button class="close" data-dismiss="modal">&times;</button>
                     			<h4 class="modal-title">Form Paket KRS</h4>
                                </div>
                                <div class="modal-body">
                    			   <form method="post" id="form_paket_krs" >
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
                              	<label>Mata Kuliah</label>
                                    <select name="kode_mk" class="form-control" id="kode_mk">
                                    <option value=""></option>
										<?PHP
                                            $query = "SELECT * FROM tbl_mata_kuliah";
                                            
                                            $result = mysql_query($query);
                                            
                                            while($row = mysql_fetch_object($result))
                                            {
                                        ?>
                                        <option value="<?PHP echo $row->kode_mk; ?>"><?PHP echo $row->nama_mk; ?></option>
                                        
                                        <?PHP
                                            }
										
                                      ?>
                                        
                                    </select>
                                    
                                </div>
                                </form>
                                </div>
                                <div class="modal-footer">
                    			   <button class="btn btn-primary btn-small" type="submit" form="form_paket_krs" id="save">Simpan</button>
                                   <button class="btn btn-primary btn-small" type="submit" form="form_paket_krs" id="update">Perbaharui</button>
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
		$('#save').show();
		$('#update').hide();	
		$('#form_paket_krs').attr('action','<?php echo site_url(); ?>paket_krs/insert');
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
		
		/*$('#delete').click(function(){
			
			window.location = '<?php echo site_url();?>dosen/delete/' + $('#nip').val();;
		});*/
		$('#delete_all').click(function(){
			window.location = '<?php echo site_url();?>paket_krs/delete_all';
		});
		
		$('.table').dataTable();
	});
</script>
        
