<?php
error_reporting(E_ALL | E_STRICT); 
  require_once("../system/config/koneksi.php");

 if (isset($_POST['simpan'])) {
  $jenis_sampah = $_POST['jenis_sampah'];
   $id = $_POST['id'];
  $satuan = $_POST['satuan'];
  $harga = $_POST['harga'];
  $deskripsi = $_POST['deskripsi'];	 
 if (isset($_FILES["gambar"]["tmp_name"])) {
  $nama_file = $_FILES['gambar']['name'];
  $source = $_FILES['gambar']['tmp_name'];
  $folder = '../asset/internal/img/uploads/';

  move_uploaded_file($source, $folder.$nama_file);
  $query = mysqli_query($conn,"UPDATE sampah SET jenis_sampah='".$jenis_sampah."',satuan='".$satuan."',harga='".$harga."',gambar='".$nama_file."',deskripsi='".$deskripsi."' WHERE id='$id'");	 
 } else {
  $query = mysqli_query($conn,"UPDATE sampah SET jenis_sampah='".$jenis_sampah."',satuan='".$satuan."',harga='".$harga."',deskripsi='".$deskripsi."' WHERE id='$id'");	 
 }  
  if ($query){
    echo "
        <script>
          alert('Berhasil Menambah Data!');
        </script>
        ";

        echo "<meta http-equiv='refresh'
              content='0; url=http://localhost/bsk09/page/admin.php?page=data-sampah'>";
  }else{
    echo "
        <script>
          alert('Gagal Menambah Data!');
        </script>
        ";

        echo "<meta http-equiv='refresh'
              content='0; url=http://localhost/bsk09/page/admin.php?page=data-sampah'>";
  }
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
        $cek = mysqli_query($conn, "SELECT * FROM sampah WHERE id='".$_GET['id']."'");
        $row = mysqli_fetch_array($cek);
      ?>
  
          <form action="" method="post" enctype="multipart/form-data">

         <div class="form-group">
          <label class="">Jenis Sampah</label>
          <input type="text"  name="jenis_sampah" value="<?php echo $row['jenis_sampah'] ?> "/>
		  <input type="hidden"  name="id" value="<?php echo $row['id'] ?> "/>
         </div>
         <div class="form-group">
          <label class="">Satuan</label>
          <input type="text" name="satuan" value="<?php echo $row['satuan'] ?>" readonly />
         </div>
         <div class="form-group">
          <label class="">Harga</label>
          <input type="text" name="harga" value="<?php echo $row['harga'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Gambar</label>
          <input type="file" name="gambar" value="<?php echo $row['gambar'] ?>"/>
         </div>
         <div class="form-group">
          <label class="">Deskripsi</label>
          <input type="text" name="deskripsi" value="<?php echo $row['deskripsi'] ?>" required/>
         </div>
         


         <input name="id" type="hidden"  value="<?php echo $_GET['id']; ?>" />
         <input class="button" type="submit" name="simpan" value="Simpan Data" />
         

         </form>     
     
<?php } ?>

</body>
</html>
