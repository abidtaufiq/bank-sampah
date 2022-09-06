<?php
  require_once("../system/config/koneksi.php");

 if (isset($_POST['simpan'])) {
  $nama = $_POST['nama'];
  $telepon = $_POST['telepon'];
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "UPDATE admin SET nama = '$nama', telepon = '$telepon', email = '$username', password = '$password' WHERE nia='".@$_SESSION['nia']."' ";
  $queryact = mysqli_query($conn, $query);
  header("Location: admin.php");
 }

?>

<html>
<head>
	<title>Homepage</title>
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
	   <h2 style="font-size: 30px; color: #262626;">Edit Data Administrator</h2>
     
     <?php 
        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE nia='".$_SESSION['nia']."'");
        $row = mysqli_fetch_array($cek);
      ?>
	
     <div class="form-group">
          <form action="" method="post">
          <label class="text-left">Nomor Induk Admin</label>
          <input type="text" style="cursor: not-allowed;" name="nia" disabled="disabled" value="<?php echo @$_SESSION['nia'] ?>" />
         </div>
         <div class="form-group">
          <label class="">Nama Admin</label>
          <input type="text" name="nama" value="<?php echo $row['nama'] ?> "/>
         </div>
         <div class="form-group">
          <label class="">Nomor Telepon</label>
          <input type="text" name="telepon" value="<?php echo $row['telepon'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">E-mail</label>
          <input type="text" name="username" value="<?php echo $row['email'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Password</label>
          <input type="text" name="password" value="<?php echo $row['password'] ?>" required/>
         </div>
         <div class="form-group">
          <label class="">Level Admin</label>
          <input type="text" style="cursor: not-allowed;" disabled="disabled" name="level" value="<?php echo $row['level'] ?>"/>
         </div>
         
         <input class="button" onclick="alert('Berhasil Mengubah data admin!')" type="submit" name="simpan" value="Simpan Data" />
         

         </form>
      


</body>
</html>
