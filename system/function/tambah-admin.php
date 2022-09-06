<?php

 require_once("../system/config/koneksi.php");

    $no = mysqli_query($conn, "SELECT nia FROM admin ORDER BY nia DESC");
    $nia = mysqli_fetch_array($no);
    $kode = $nia['nia'];

    $urut = substr($kode, 7, 2);
    $tambah = (int) $urut + 1;
    $bln = date("m");
    $thn = date("y");

    if(strlen($tambah) == 1){
        $format = "ADM".$thn.$bln."0".$tambah;
    }else{
        $format = "ADM".$thn.$bln.$tambah;
    }

    if(isset($_POST['simpan'])){
      $nia = $_POST['nia'];
      $nama = $_POST['nama'];
      $telepon = $_POST['telepon'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $level = $_POST['level'];

      $sql = mysqli_query($conn, "SELECT * FROM admin WHERE nia = '$nia'");

      if (mysqli_fetch_array($sql) > 0) {
        echo "<script>
                alert('Maaf akun sudah terdaftar!');
              </script>";

              echo "<meta http-equiv='refresh'
              content='0; url=http://localhost/bsk09/page/admin.php?page=data-admin-full'>";

              return FALSE;      
      }

      mysqli_query($conn, "INSERT INTO admin VALUES ('$nia','$nama','$telepon','$email','$password','$level')");

      echo "<script>
                alert('Selamat berhasil input data!');
              </script>";

      echo "<meta http-equiv='refresh'
      content='0; url=http://localhost/bsk09/page/admin.php?page=data-admin-full'>";
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
        
        select{
          border-radius: 5px;
          width: 42%;
          height: 39px;
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

        input, select{
            font-family: Montserrat;
            font-size: 16px;
        }

        .form-group{
            padding: 5px 0;
        }

    </style>

    <script type="text/javascript">

function cek_data() {
   var x=daftar_user.nama.value;
   var x1=parseInt(x);
   
   if(x==""){
      alert("Maaf harap input nama admin!");
      daftar_user.nama.focus(); 
      return false;
   } 
   if(isNaN(x1)==false){
      alert ("Maaf nama harus di input huruf!");
      daftar_user.nama.focus();
      return false;
   }
   var x=daftar_user.telepon.value;
   var angka = /^[0-9]+$/;

   if(x==""){
      alert("Maaf harap input nomor telepon!");
      daftar_user.telepon.focus();  
      return false;
   }
   if (!x.match(angka)) {
      alert ("Maaf nomor telepon harus di input angka!");
      daftar_user.telepon.focus();
      return false;
   }
   if(x.length!=12){
      alert("Nomor telepon harus 12 karakter!");
      daftar_user.telepon.focus();
      return false;
   }
   var x=daftar_user.email.value;
   var cek_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

   if(x==""){
      alert("Maaf harap input email!");
      daftar_user.email.focus(); 
      return false;
   }
   if(!x.match(cek_email)){
      alert("Format penulisan email tidak sesuai!");
      daftar_user.email.focus();
      return false;
   }
   var x=daftar_user.password.value;
   var panjang=x.length;

   if(x==""){
      alert("Maaf harap input password!");
      daftar_user.password.focus(); 
      return false;
   }
   if(panjang<6 || panjang>20){
      alert("Password di input minimum 6 karakter dan maksimum 20 karakter!");
      daftar_user.password.focus();
      return false;
    }
    var p=daftar_user.level.value;
    if (p =="p"){
      alert("Maaf harap input level admin!");
      return (false);
  }else{
  confirm("Apakah Anda yakin sudah input data dengan benar?");
  }
   return true;
}
</script>

</head>

<body>
	   <h2 style="font-size: 30px; color: #262626;">Tambah Data Administrator</h2>

	   
     <form id="daftar_user" action="" method="post" onsubmit="return cek_data()">
         <div class="form-group">
           <label class="text-left">Nomor Induk Admin</label>
           <input style="cursor: not-allowed;" type="text" name="nia" value="<?php echo $format; ?>" readonly/>
         </div>

         <div class="form-group">
           <label class="left">Nama Admin</label>
           <input type="text" name="nama" placeholder="Masukan nama admin" />
         </div>

         <div class="form-group">
           <label class="">Nomor Telepon</label>
           <input type="text" placeholder="Masukan nomor telepon" name="telepon" />
         </div>

         <div class="form-group">
           <label class="">E-mail</label>
           <input type="text" placeholder="Masukan alamat email" name="email" />
         </div>

         <div class="form-group">
           <label class="">Password</label>
           <input type="text" placeholder="Masukan password" name="password" />
         </div>

         <div class="form-group">
          <label class="">Level</label>
           <select name="level">
               <option value="p">---Pilih Level---</option>
               <option value="Master-admin">Master-admin</option>
               <option value="Admin">Admin</option>
           </select>
         </div>

        <input type="submit" name="simpan" value="Simpan"></input>
    </form>
      


</body>
</html>
