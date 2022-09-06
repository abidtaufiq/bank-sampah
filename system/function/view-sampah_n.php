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
    <h2 style="font-size: 30px; color: #262626;">Data Sampah</h2>
    <br>
<table id="example" class="display" cellspacing="0" width="100%" border="0" >
        <thead>
        <tr>
            <th>No</th>
            <th>Jenis Sampah</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Jenis Sampah</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Gambar</th>
            <th>Deskripsi</th>
        </tr>   
        </tfoot>
        <tbody>
        <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM sampah ORDER BY jenis_sampah ASC");
            while($row = mysqli_fetch_assoc($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo "$no" ?></td>
            <td><?php echo $row['jenis_sampah'] ?></td>
            <td><?php echo $row['satuan'] ?></td>
            <td><?php echo "Rp. ".number_format($row['harga'], 2, ",", ".")  ?></td>
            <td><img src="../asset/internal/img/uploads/<?php echo $row['gambar'] ?>" width="100px" height="50px"></td>
            <td><?php echo $row['deskripsi'] ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    
    <a target="_blank" href="../system/function/print-sampah.php">
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