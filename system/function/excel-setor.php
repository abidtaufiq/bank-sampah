<?php 
require_once ('../config/koneksi.php');

// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");


 
// Mendefinisikan nama file ekspor "hasil-export.xls"
$filename = "excel-setor (".date('d-m-Y').").xls";
header("Content-Disposition: attachment; filename='$filename'");
 	 ?>

<h2 style="font-size: 30px; color: #262626;">Data Administrator</h2>
	<br>
	<table id="example" class="display" cellspacing="0" width="100%" border="0" >
	<tr>
		<th>No</th>
        <th>ID Setor</th>
        <th>Tanggal Penyetoran</th>
        <th>Nomor Induk Nasabah</th>
        <th>Jenis Sampah</th>
        <th>Berat (Kg)</th>
        <th>Harga (Rp)</th>
        <th>Total (Rp)</th>
        <th>Nomor Induk Admin</th>
    </tr>
    <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM setor ORDER BY id_setor ASC");
            while($row = mysqli_fetch_assoc($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo "$no" ?></td>
            <td><?php echo $row['id_setor'] ?></td>
            <td><?php echo $row['tanggal_setor'] ?></td>
            <td><?php echo $row['nin'] ?></td>
            <td><?php echo $row['jenis_sampah'] ?></td>
            <td><?php echo $row['berat'] ?></td>
            <td><?php echo $row['harga'] ?></td>
            <td><?php echo $row['total'] ?></td>
            <td><?php echo $row['nia'] ?></td>
        </tr>
        <?php } ?>
</table>
