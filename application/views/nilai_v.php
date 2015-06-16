<?PHP
	$this->load->view('header_v');
?>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="pull-left">
        <h4>Nilai Diploma IPB</h4>
      </div>
      <div class="pull-right">
        <?PHP  if($this->session->userdata('status') == 2) 
		{
		?>
        <a href="<?php echo site_url(); ?>nilai/pilih_mk"><button class="btn btn-primary " ><i class="glyphicon glyphicon-plus"> Tambah</i></button></a>
        <!--<button class="btn btn-danger delete_all" title="hapus_all" data-toggle="modal" data-target="#modal_konfirmasi"><i class="glyphicon glyphicon-trash"> Hapus Semua</i></button>
        --><?PHP
		}
		?>
      </div>
      <div class="clearfix"></div>
     
    </div>
    <?PHP
		if($this->uri->segment(3)=="error_save")
		{
		?>
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Data Gagal Disimpan </div>
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
            <th>Mata Kuliah</th>
            <th>Semester</th>
            <th>Nilai</th>
            <?PHP if($this->session->userdata('status') == 2) 
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
					$query = $this->nilai_m->view(); 
					$i=0;
					foreach($query->result() AS $row) :
					$i++;
				?>
          <tr>
            <td><?php echo $row->nim;?>
              <input type="hidden" id="nama_<?php echo $row->nim;?>" value="<?php echo $row->nama;?>">
			  <input type="hidden" id="mk_<?php echo $row->nim.$i;?>" value="<?php echo $row->kode_mk;?>">
			  <input type="hidden" id="nilai_<?php echo $row->nim.$i;?>" value="<?php echo $row->nilai;?>">

            </td>
            <td><?php echo $row->nama;?></td>
            <td><?php echo $row->nama_mk;?></td>
            <td><?php echo $row->Semester;?></td>
            <td><?php echo $row->nilai;?></td>
            <?PHP if($this->session->userdata('status') == 2) {?>
            <td><button class="btn btn-warning btn-sm edit"  title="ubah" data-toggle="modal" data-target="#modal_nilai" id="edit_<?php echo $row->nim.$i;?>"><i class="glyphicon glyphicon-edit"> Ubah</i></button>
            <button class="btn btn-danger btn-sm delete"  title="hapus" data-toggle="modal" data-target="#modal_konfirmasi" id="hapus_<?php echo $row->nim.$i;?>"><i class="glyphicon glyphicon-trash"> Hapus</i></button></td>
            </td>
            <?PHP
					}
					?>
          </tr>
          <?PHP 
				endforeach;
				?>
        </tbody>
      </table>
      <div class="modal fade" id="modal_nilai">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Form Dosen</h4>
            </div>
            <div class="modal-body">
              <form method="post" id="form_nilai" >
                <div class="form-group">
                  <label>Nim</label>
                  <input type="text" class="form-control" name="nim" id="nim" placeholder="NIM" required>
                  <input type="hidden" name="nim_tmp" id="nim_tmp" />
                </div>
                <div class="form-group">
                  <label>Mata Kuliah</label>
                  <input type="text" class="form-control" name="mk" id="mk" placeholder="Kode Mata Kuliah" required>
                  <input type="hidden" name="mk_tmp" id="mk_tmp" >
                </div>
                <div class="form-group">
                  <td><select class="form-control" id="nilai" name="nilai">
                                        <option value="A">A</option>
                                        <option value="AB">AB</option>
                                        <option value="B">B</option>
                                        <option value="BC">BC</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
           </select></td>
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary btn-small" type="submit" form="form_nilai" id="save">Simpan</button>
              <button class="btn btn-primary btn-small" type="submit" form="form_nilai" id="update">Perbaharui</button>
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
		var id2= this.id.substr(5,9);
		//alert($('#mk_'+id).val());
		$('#nim').val(id2);
		$('#nim_tmp').val(id2);
		$('#nim').attr('disabled',true);
		$('#mk').attr('disabled',true);
		$('#save').hide();
		$('#update').show();
		$('#mk').val($('#mk_'+id).val());
		$('#mk_tmp').val($('#mk_'+id).val());
		$('#nilai').val($('#nilai_'+id).val());
		
		$('#form_nilai').attr('action','<?php echo site_url(); ?>nilai/update');
		
		});
	
		$('.delete').click(function(){
		var id = this.id.substr(6);
		var id2= this.id.substr(6,9);
		//alert(id);
		$('#nim').val(id2);
		$('#mk').val($('#mk_'+id).val());
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
			
			window.location = '<?php echo site_url();?>nilai/delete/' + $('#nim').val()+'/' + $('#mk').val();
		});
		$('#delete_all').click(function(){
			window.location = '<?php echo site_url();?>nilai/delete_all';
		});
		
		$('.table').dataTable();
	});
</script>
