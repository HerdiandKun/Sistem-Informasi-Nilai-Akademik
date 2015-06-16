<?PHP
	$this->load->view('header_v');
?>

<div class="container">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="pull-left">
        <h4>Tambah Nilai Diploma IPB</h4>
      </div>
      <div class="pull-right">
       
      </div>
      <div class="clearfix"></div> 
    </div>
    <?PHP
		if($this->uri->segment(4)=="error_save")
		{
		?>
    <div class="alert alert-danger alert-dismissable">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      Data Sudah Tersedia</div>
    <?php
        }
		?>
    <div class="panel-body"><form method="post" id="form_tambah_nilai" action="<?php echo site_url()?>nilai/simpan" enctype="multipart/form-data">
    
              <input type="hidden" name="mk" value="<?php echo $this->input->post('mk');?>">
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Mata Kuliah</th>
            <th>Semester</th>
            <th>Nilai</th>
            <th>Tambah</th>
           
          </tr>
        </thead>
        <tbody>
          <?PHP 
		   		 $this->nilai_m->set_matakuliah($this->input->post('mk'));
					$query = $this->nilai_m->view_mk(); 
					$jum=$query->num_rows();
					$i= 1 ;
					foreach($query->result() AS $row) :
				?>
          <tr>
            
            <td><?php echo $row->nim;?>
        		
	              <input type="hidden" name="nim" id="nim" value="">
                  <input type="hidden" name="kode_mk" id="kode_mk" value="">
                  <input type="hidden" name="nilai" id="nilai" value="">
            </td>
            <td><?php echo $row->nama;?></td>
            <td><?php echo $row->nama_mk;?></td>
            <td><?php echo $row->Semester;?></td>
            <td><select class="form-control" id="nilai<?php echo $row->nim;?>" name="nilai<?php echo $row->nim;?>">
                                        <option value="A">A</option>
                                        <option value="AB">AB</option>
                                        <option value="B">B</option>
                                        <option value="BC">BC</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
           </select></td>
           <td>
           <button type="submit"  class="btn btn-primary btn-block tambah"  id="tambah_<?php echo $row->nim;?>" form="form_tambah_nilai">
           <i class="glyphicon glyphicon-log-in"></i>Tambah</button>
           </td>
             <?PHP $i++;
				endforeach;
				?>
          </tr>
     
                
        </tbody>
      </table></form>
      </div>
       <div class="panel-footer">
                	<button type="submit"  class="btn btn-primary btn-block" form="form_tambah_nilai">
                    <i class="glyphicon glyphicon-log-in"></i> Simpan
                   </button>
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
		
		$('.tambah').click(function(){
		var id = this.id.substr(7);
		//alert(id);
		$('#nim').val(id);
		$('#kode_mk').val($('#kode_mk_'+id).val());
		$('#nilai').val($('#nilai'+id).val());
		$('#form_nilai').attr('action','<?php echo site_url()?>nilai/simpan_satu');
		
		});
	
		$('.table').dataTable();
	});
</script>
