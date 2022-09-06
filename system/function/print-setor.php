<?php ob_start(); ?>
<html>
<head>
  <title>Cetak PDF</title>
    
   <style>

     h1{
      color: #262626;
     }
     table {
      max-width: 960px;
      margin: 10px auto;
     }

      thead th {
        font-weight: 400;
        background: #8a97a0;
        color: #FFF;
      }

      tr {
        background: #f4f7f8;
        border-bottom: 1px solid #FFF;
        margin-bottom: 5px;
      }

      tr:nth-child(even) {
        background: #e8eeef;
      }

      th, td {
        text-align: center;
        padding: 7px;
        font-weight: 300;
      }
   
   </style>

</head>
<body>
  
<h1 align="center">DATA PENYETORAN SAMPAH</h1>
<table align="center" cellspacing='0'>
<thead>
<tr>
  <th>NO</th>
  <th>ID</th>
  <th>TANGGAL SETOR</th>
  <th>NIN</th>
  <th>JENIS SAMPAH</th>
  <th>BERAT</th>
  <th>HARGA</th>
  <th>TOTAL</th>
  <th>NIA</th>
</tr>
</thead>


<?php
// Load file koneksi.php
require_once ('../config/koneksi.php');
 
$query = "SELECT * FROM setor"; 
$sql = mysqli_query($conn, $query); 
$row = mysqli_num_rows($sql); 
    
    $no = 0;
    while($data = mysqli_fetch_array($sql)){$no++;
      ?>
        <tbody>
        <tr>
          <td><?php echo "$no" ?></td>
          <td><?php echo $data['id_setor'] ?></td>
          <td><?php echo $data['tanggal_setor'] ?></td>
          <td><?php echo $data['nin'] ?></td>
          <td><?php echo $data['jenis_sampah'] ?></td>
          <td><?php echo number_format($data['berat'])." Kg"  ?></td>
          <td><?php echo "Rp. ".number_format($data['harga'], 2, ",", ".")  ?></td>
          <td><?php echo "Rp. ".number_format($data['total'], 2, ",", ".")  ?></td>
          <td><?php echo $data['nia'] ?></td>
        </tr>
        </tbody>

<?php } ?>

</table>
</body>
</html>

<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once("../../asset/plugin/html2pdf/html2pdf.class.php");
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$filename = "Data-Setor-(".date('d-m-Y').").pdf";
$pdf->Output("$filename");
?>