<?PHP
	$this->load->view('header_v');
?>

<div class="container">
   <?php 
  $ipk=0;
			$nilai[]=0;	
			$sks=0;
			$index=0;
			$index1=0;
			$query = $this->nilai_m->view_by_nim(); 
			
			$jum=$query->num_rows();
			foreach($query->result() as $row) :
			
			$nilai= $row->nilai;
			$sks = $row->sks;
			
			//echo $nilai;
			//echo $sks;
			$query_sum = $this->nilai_m->sum(); 
				foreach($query_sum->result() as $row2) :
				$jumlahsks= $row2->jumlah;
				 //echo $jumlahsks;
				endforeach; 
			
				if($nilai=='A')
				{
					$index=4 *$sks;
				} else if($nilai=='AB')
				{
					$index=3.5 *$sks;
				} else if($nilai=='B')
				{
					$index=3 * $sks;
				} else if($nilai=='BC')
				{
					$index=2.5 * $sks;
				} else if($nilai=='C')
				{
					$index=2 * $sks;
				}else if($nilai=='D')
				{
					$index=1 * $sks;
				}else if($nilai=='E')
				{
					$index=0 * $sks;
				}
				
				$index1 +=$index ;
		//	$nama_mk[]=$
			endforeach;
			$ipk= $index1/$jumlahsks;
			
			//echo $index1;
			//echo 
			$ipk_akhir = number_format($ipk,2);
			
  
  //echo $index;
  ?>
  
  
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="pull-left">
        <h4>Tambah Nilai Diploma IPB <?php echo $this->input->post('mk') ?></h4>
      </div>
      <div class="pull-right">
       
      </div>
      <div class="clearfix"></div> 
    </div>
    <div class="panel-body">
      <table class="table table-responsive" border="1">
        <thead>
          <tr>
            <th>Matakuliah</th>
            <th>Nilai</th>
            </tr>
           </thead>
        <tbody>
              <?PHP 
		 			$query = $this->nilai_m->view_by_nim(); 
					foreach($query->result() AS $row) :
				?>
          <tr>
          	<td><?php echo $row->nama_mk;?>
            </td>
            <td><?php echo $row->nilai;?></td>
           </td>
          </tr>
          <?PHP 
				endforeach;
				?>
              <tr>
              <td><h3>IPK</h3>
              </td>
              <td>
              <h1><?php echo $ipk_akhir ?></h1>
              </td></tr>
        </tbody>
      </table>
       <div class="panel-footer">
       </div>      
    </div>
  </div>
 
  
  
  
  
</div>
<?PHP
	$this->load->view('footer_v');
?>
