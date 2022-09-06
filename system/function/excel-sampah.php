<?php 
require_once ('../config/koneksi.php');

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");


 
// Mendefinisikan nama file ekspor "hasil-export.xls"
$filename = "excel-sampah (".date('d-m-Y').").xls";
header("Content-Disposition: attachment; filename='$filename'");
 	 ?>

<h2 style="font-size: 30px; color: #262626;">Data Nasabah</h2>
	<br>
	<table id="example" class="display" cellspacing="0" width="100%" border="0" >
	<tr>
		<th>No</th>
        <th>Jenis Sampah</th>
        <th>Satuan</th>
        <th>Harga</th>
        <th>Deskripsi</th>
    </tr>
    <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM sampah ORDER BY jenis_sampah ASC");
            while($row = mysqli_fetch_assoc($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo "$no" ?></td>
            <td><?php echo $row['jenis_sampah'] ?></td>
            <td><?php echo $row['satuan'] ?></td>
            <td><?php echo $row['harga'] ?></td>
            <td><?php echo $row['deskripsi'] ?></td>
        </tr>
        <?php } ?>
</table>
