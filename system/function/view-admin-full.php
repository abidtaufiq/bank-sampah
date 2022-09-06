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
    <h2 style="font-size: 30px; color: #262626;">Data Administrator</h2>
    <br>
    <table id="example" class="display" cellspacing="0" width="100%" border="0" >
        <thead>
        <tr>
            <th>No</th>
            <th>NIA</th>
            <th>Nama Admin</th>
            <th>Nomor Telepon</th>
            <th>E-mail</th>
            <th>Level</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>No</th>
            <th>NIA</th>
            <th>Nama Admin</th>
            <th>Nomor Telepon</th>
            <th>E-mail</th>
            <th>Level</th>
            <th>Aksi</th>       
        </tr>   
        </tfoot>
        <tbody>
        <?php
            $no = 0;
            $query = mysqli_query($conn, "SELECT * FROM admin ORDER BY nia ASC");
            while($row = mysqli_fetch_assoc($query)){$no++;
        ?>
        <tr align="center">
            <td><?php echo "$no" ?></td>
            <td><?php echo $row['nia'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['telepon'] ?></td>
            <td><?php echo $row['email'] ?></td>
            <td><?php echo $row['level'] ?></td>
            <td>
                
                <a href="admin.php?page=edit-admin-id&id=<?php echo $row['nia']; ?>">
                <button><i class="fa fa-pencil"></i>edit</button> 
                </a>

                <a onclick="return confirm('Anda yakin ingin menghapus data ini?')" href="../system/function/delete-admin.php?id=<?php echo $row['nia']; ?>">
                <button><i class="fa fa-trash-o"></i>hapus</button>
                </a>
                
            </td>
        </tr>
        <?php } ?>
        </tbody>
    </table>
    <br>
    <br>
    
    <a href="admin.php?page=tambah-data-admin">
    <button><i class="fa fa-plus" aria-hidden="true"></i>Tambah</button>
    </a>

    <a target="_blank" href="../system/function/excel-admin.php">
    <button><i class="fa fa-print" aria-hidden="true"></i>Excel</button>
    </a>

    <a target="_blank" href="../system/function/print-admin.php">
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