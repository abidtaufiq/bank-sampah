<?php
  require_once("../system/config/koneksi.php");

 if (isset($_POST['simpan'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telepon = $_POST['telepon'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "UPDATE nasabah SET nama = '$nama', alamat = '$alamat', telepon = '$telepon', username = '$username', password = '$password' WHERE nin='".$id."' ";
  $queryact = mysqli_query($conn, $query);
  echo "<meta http-equiv='refresh'
   content='0; url=http://localhost/bsk09/page/admin.php?page=data-nasabah-full'>";
 }

?>

<html>
<head>

  <script type="text/javascript" src="../asset/plugin/datepicker/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="../asset/plugin/datepicker/css/jquery.datepick.css"> 
  <script type="text/javascript" src="../asset/plugin/datepicker/js/jquery.plugin.js"></script> 
  <script type="text/javascript" src="../asset/plugin/datepicker/js/jquery.datepick.js"></script>

  
  <!--link datatables-->
    <style>

        label{
        font-family: Montserrat;    
        font-size: 18px;
        display: block;
        color: #262626;
        }

        input[type=text], input[type=password]{
          border-radius: 5px;
          width: 40%;
          height: 35px;
          background: #eee;
          padding: 0 10px;
          box-shadow: 1px 2px 2px 1px #ccc;
          color: #262626;
        }

        input[type=submit]{
          height: 35px;
          width: 200px;
          background: #8cd91a;
          border-radius: 20px;
          color: #fff;
          margin-top: 20px;
          cursor: pointer;
        }

        input{
            font-family: Montserrat;
            font-size: 16px;
        }

        .form-group{
            padding: 5px 0;
        }

    </style>    
</head>

<body>
     <h2 style="font-size: 30px; color: #262626;">Edit Data Penyetoran</h2>
     <?php if(isset($_GET['id'])){$id=$_GET['id']; ?>
     <?php 
        $cek = mysqli_query($conn, "SELECT * FROM setor WHERE id_setor='".$_GET['id']."'");
        $row = mysqli_fetch_array($cek);
      ?>
  
          <form action="" method="post">

         <div class="form-group">
          <label class="">Tanggal Penyetoran</label>
          <input type="text" id="date" name="tanggal_setor" value="<?php echo $row['tanggal_setor'] ?> "/>
          <script type="text/javascript">
            $('#date').datepick({dateFormat: 'yyyy-mm-dd'});
          </script>
         </div>
         <div class="form-group">
          <label class="">Nomor Induk Nasabah</label>
          <input type="text" name="nin" disabled="disabled" value="<?php echo $row['nin'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Jenis Sampah</label>
          <input type="text" name="jenis_sampah" value="<?php echo $row['jenis_sampah'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Berat (Kg)</label>
          <input type="text" name="berat" value="<?php echo $row['berat'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Harga (Rp)</label>
          <input type="text" name="harga" value="<?php echo $row['harga'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Total (Rp)</label>
          <input type="text" disabled="disabled" name="total" value="<?php echo $row['total'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Nomor Induk Admin</label>
          <input type="text" disabled="disabled" name="nia" value="<?php echo $row['nia'] ?>"/>
         </div>


         <input name="id" type="hidden"  value="<?php echo $_GET['id']; ?>" />
         <input class="button" type="submit" name="simpan" value="Simpan Data" />
         

         </form>     
     <?php } else {
        $cek = mysqli_query($conn, "SELECT * FROM nasabah WHERE nin='".$_SESSION['nin']."'");
        $row = mysqli_fetch_array($cek);
      ?>
  
          <form action="" method="post">
          <label class="text-left">Nomor Induk Admin</label>
          <input type="text" name="nia" disabled="disabled" value="<?php echo @$_SESSION['nin'] ?>" />
                   <input name="id" type="hidden"  value="<?php echo @$_SESSION['nin'] ?>" />

         <div class="form-group">
          <label class="">Nama Nasabah</label>
          <input type="text" name="nama" value="<?php echo $row['nama'] ?> "/>
         </div>
         <div class="form-group">
          <label class="">Alamat</label>
          <input type="text" name="alamat" value="<?php echo $row['alamat'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Nomor Telepon</label>
          <input type="text" name="telepon" value="<?php echo $row['telepon'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Username</label>
          <input type="text" name="username" value="<?php echo $row['username'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Password</label>
          <input type="text" name="password" value="<?php echo $row['password'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Saldo (Rp)</label>
          <input type="text" disabled="disabled" name="saldo" value="<?php echo $row['saldo'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Sampah (Kg)</label>
          <input type="text" disabled="disabled" name="saldo" value="<?php echo $row['sampah'] ?>"/>
         </div>
         
         <input class="button" type="submit" onclick="" name="simpan" value="Simpan Data" />
         

         </form>
<?php } ?>

</body>
</html>
