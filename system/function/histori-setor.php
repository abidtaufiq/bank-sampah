

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="../datatables/css/jquery.dataTables.css">
    <style>
        label{
        font-family: Montserrat;    
        font-size: 18px;
        display: block;
        color: #262626;
        }
    </style>
</head>
<body>
    <h2 style="font-size: 30px; color: #262626;">Histori Setor Nasabah</h2>
    <br>
<table id="example" class="display" cellspacing="0" width="100%" border="0" >
        <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jenis Sampah</th>
            <th>Berat</th>
            <th>Harga</th>
            <th>Total</th>
            <th>NIA</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Jenis Sampah</th>
            <th>Berat</th>
            <th>Harga</th>
            <th>Total</th>
            <th>NIA</th>
        </tr>   
        </tfoot>
        <tbody>
        <?php
            $no = 0; 
            $query = mysqli_query($conn, "SELECT * FROM setor WHERE nin='".$_SESSION['nin']."' ORDER BY id_setor DESC");
            while($row = mysqli_fetch_array($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo "$no" ?></td>
            <td><?php echo $row['tanggal_setor'] ?></td>
            <td><?php echo $row['jenis_sampah'] ?></td>
            <td><?php echo number_format($row['berat'])." Kg"  ?></td>
            <td><?php echo "Rp. ".number_format($row['harga'], 2, ",", ".")  ?></td>
            <td><?php echo "Rp. ".number_format($row['total'], 2, ",", ".")  ?></td>
            <td><?php echo $row['nia'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    
    <a target="_blank" href="../system/function/print-histori-setor.php">
    <button><i class="fa fa-print" aria-hidden="true"></i>Cetak</button>
    </a>

    <script type="text/javascript" src="../datatables/js/jquery.min.js"></script>
    <script type="text/javascript" src="../datatables/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
           $('#example').DataTable();
        } );
    </script>
    </body>
</html>