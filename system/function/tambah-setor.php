<?php
 if (isset($_POST['simpan'])) {
  require_once("../system/config/koneksi.php");
  $tanggal_setor = $_POST['tanggal_setor'];
  $nin = $_POST['nin'];
  $jenis_sampah = $_POST['jenis_sampah'];
  $berat = $_POST['berat'];
  $harga = $_POST['harga'];
  $total = $_POST['total'];
  $nia = $_POST['nia'];
  $query = "INSERT INTO setor(id_setor,tanggal_setor,nin,jenis_sampah,berat,harga,total,nia) VALUE ('NULL','$tanggal_setor','$nin','$jenis_sampah','$berat','$harga','$total','$nia')";
  $queryact = mysqli_query($conn, $query);

  echo "<script>alert('Selamat berhasil input data!')</script>";

  echo "<meta http-equiv='refresh'
   content='0; url=http://localhost/bsk09/page/admin.php?page=data-setor'>";

 }
 ?>


<html>
<head>
  <title>Homepage</title>
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
   var x=daftar_user.tanggal_setor.value;
   
   if(x==""){
      alert("Maaf harap input tanggal setor!");
      daftar_user.tanggal_setor.focus(); 
      return false;
   }
    var pnin=daftar_user.nin.value;
    if (pnin =="pnin"){
      alert("Maaf harap input nomor induk nasabah!");
      return (false);
   }
   var pjs=daftar_user.jenis_sampah.value;
    if (pjs =="pjs"){
      alert("Maaf harap input jenis sampah!");
      return (false);
   }
   var x=daftar_user.berat.value;
   var angka = /^[0-9]+$/;

   if(x==""){
      alert("Maaf harap input berat sampah!");
      daftar_user.berat.focus(); 
      return false;
   }
   if (!x.match(angka)) {
      alert ("Berat sampah harus di input angka!");
      daftar_user.berat.focus();
      return false;
   }
   var x=daftar_user.harga.value;

   if(x==""){
      alert("Maaf harga sampah masih kosong!");
      daftar_user.harga.focus(); 
      return false;
   }
   var x=daftar_user.total.value;

   if(x==""){
      alert("Maaf total transaksi penyetoran masih kosong!");
      daftar_user.total.focus(); 
      return false;
   }else{
  confirm("Apakah Anda yakin sudah input data dengan benar?");
  }
   return true;
}
</script>
	<script>
	$(document).ready(function(){ // Ketika halaman sudah diload dan siap
		$("#btn-tambah-form").click(function(){ // Ketika tombol Tambah Data Form di klik
			var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
			var nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya
			var berat =  parseInt($("#berat2").val());
			var hargatotal = berat * 5000;
			// Kita akan menambahkan form dengan menggunakan append
			// pada sebuah tag div yg kita beri id insert-form
			$("#insert-form").append("<b>Data ke " + nextform + " :</b>" +
				"<table>" +
			
				"<div class='form-group'><label class='text-left'>Tanggal Penyetoran</label><input type='date' placeholder='Masukan tanggal setor' id='date'  name='tanggal_setor' /></div>" +
				
				"<div class='form-group'><label class=''>Nomor Induk Nasabah</label><select class='nomornasabah' name='nin' ><option value='pnin'>---Pilih NIN---</option><?php $query = mysqli_query($conn, "SELECT * FROM nasabah"); while ($row = mysqli_fetch_array($query)) {echo '<option value='.$row['nin'].'>'. $row['nin'] . '</option>';}?></select></div>"+
				
				"<div class='form-group'><label class=''>Jenis Sampah</label><select class='jensampah2' name='jenis_sampah2' onchange='changeValue(this.value)' id='jenis_sampah2' ><option value='pjs'>---Pilih Jenis Sampah---</option><?php $query = mysqli_query($conn, "SELECT * FROM sampah"); $jsArray2 = 'var dtsampah2 = new Array();\n'; while ($row = mysqli_fetch_array($query)) { echo '<option value='. $row['jenis_sampah'].'>' . $row['jenis_sampah'] . '</option>';     $jsArray2 .= 'dtsampah2['. $row['jenis_sampah'] .'] = {harga:' . addslashes($row['harga']) . '};\n';}?></select></div>"+
				
				"<div class='form-group'><label class=''>Berat Sampah</label><input type='text' placeholder='Masukan berat sampah' id='berat2' name='berat' onkeyup='sum();' /></div>" +
				
				"<div class='form-group'><label class=''>Harga Sampah (Rp)</label><input type='text' placeholder='tomatis terisi' style='cursor: not-allowed;' id='harga2'name='harga2'value='"+hargatotal+" onkeyup='sum();' readonly /></div>" +
				
				"<div class='form-group'><label class=''>Total (Rp)</label><input type='text' placeholder='Otomatis terisi' style='cursor: not-allowed;' id='total'  name='total' readonly /></div>" +
				
				"<div class='form-grou'><label class=''>Nomor Induk Admin</label><input type='text' style'cursor: not-allowed;' name='nia'value='<?php echo $_SESSION['nia']; ?>' readonly /></div>" +
				
				"<br><br>");

			
			$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
		});
	
		// Buat fungsi untuk mereset form ke semula
		$("#btn-reset-form").click(function(){
			$("#insert-form").html(""); // Kita kosongkan isi dari div insert-form
			$("#jumlah-form").val("1"); // Ubah kembali value jumlah form menjadi 1
			
		});
	});
	</script>  
    
</head>

<body>
		<h2 style="font-size: 30px; color: #262626;">Setor Sampah</h2>
		<button type="button" id="btn-tambah-form">Tambah Data Form</button>
		<button type="button" id="btn-reset-form">Reset Form</button><br><br>
     <form id="daftar_user" name='autoSumForm' action="" method="post" onsubmit="return cek_data()">
         
         <div class="form-group">
          <label class="text-left">Tanggal Penyetoran</label>
          <input type="text" placeholder="Masukan tanggal setor" id="date"  name="tanggal_setor" />
			<script type="text/javascript">  $('#date').datepick({dateFormat: 'yyyy-mm-dd'});</script>	
         </div>

         <div class="form-group">
          <label class="">Nomor Induk Nasabah</label>
          <select class="nomornasabah" name="nin" >

          <option value="pnin">---Pilih NIN---</option>
          
          <?php 
            $query = mysqli_query($conn, "SELECT * FROM nasabah");
            while ($row = mysqli_fetch_array($query)) {
              echo '<option value="' . $row['nin'] . '">' . $row['nin'] . '</option>';
            }
          ?>

          </select>
         </div>

         <div class="form-group">
          <label class="">Jenis Sampah</label>
          <select class="jensampah" name="jenis_sampah" id="jenis_sampah" onchange="changeValue(this.value)" >
          <option value="pjs">---Pilih Jenis Sampah---</option>
          <?php 
            $query = mysqli_query($conn, "SELECT * FROM sampah");
            $jsArray = "var dtsampah = new Array();\n";
            while ($row = mysqli_fetch_array($query)) {
              echo '<option value="' . $row['jenis_sampah'] . '">' . $row['jenis_sampah'] . '</option>';    
              $jsArray .= "dtsampah['" . $row['jenis_sampah'] . "'] = {harga:'" . addslashes($row['harga']) . "'};\n";
            }
          ?>
          </select>
         </div>

         <div class="form-group">
          <label class="">Berat Sampah</label>
          <input type="text" placeholder="Masukan berat sampah" id="berat" name="berat" onkeyup="sum();" />
         </div>

         <div class="form-group">
          <label class="">Harga Sampah (Rp)</label>
          <input type="text" placeholder="Otomatis terisi" style="cursor: not-allowed;" id="harga" name="harga" value="<?php echo $row['harga'] ?>" onkeyup="sum();" readonly />
         </div>

         <div class="form-group">
          <label class="">Total (Rp)</label>
          <input type="text" placeholder="Otomatis terisi" style="cursor: not-allowed;" id="total"  name="total" readonly />
         </div>
         <div class="form-group">
          <label class="">Nomor Induk Admin</label>
          <input type="text" style="cursor: not-allowed;" name="nia" value="<?php echo $_SESSION["nia"]; ?>" readonly />
         </div>
         
         <input type="submit" name="simpan" value="Simpan" />

		<div id="insert-form"></div>
		
		<hr>
	</form>
	
	<!-- Kita buat textbox untuk menampung jumlah data form -->
	<input type="hidden" id="jumlah-form" value="1">
	
        <script type="text/javascript">    
          <?php echo $jsArray; ?>  
          function changeValue(jenis_sampah){
          console.log(dtsampah);  
          document.getElementById('harga').value = dtsampah[jenis_sampah]['harga'];
          sum();  
          };

          function sum() {
          var txtFirstNumberValue = document.getElementById('berat').value;
          var txtSecondNumberValue = document.getElementById('harga').value;
          var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
          if (!isNaN(result)) {
             document.getElementById('total').value = result;
          }
          }  

           </script>
           <script src="js/jquery.min.js"></script>
           <script src="js/custom.js"></script>      

          <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
          <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
         
          <script>
            $(document).ready(function() {
                $('.nomoradmin').select2();
              $('.nomornasabah').select2();
              $('.jensampah').select2();
            });
          </script>
	
</body>
</html>
