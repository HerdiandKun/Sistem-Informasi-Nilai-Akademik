<table border="1">
	<tr>
    	<th>NIM</th>
        <th>Nama</th>
        <th>Mata Kuliah</th>
        <th>Nilai</th>
        <th>IPK</th>
      
    </tr>
    <?php
	$query=$this->nilai_m->view_report();
	
	foreach($query->result() as $row):
	?>
    <tr>
    <td><?php echo $row->nim; ?></td>
    <td><?php echo $row->nama; ?></td>
    <td><?php echo $row->nama_mk; ?></td>
    <td><?php echo $row->nilai; ?></td>
    </tr>
    <?php endforeach;
	?>

</table>