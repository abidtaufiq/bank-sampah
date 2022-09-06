
		<?php
include '../system/config/koneksi.php';
		if(isset($_POST['login'])){
			$user = mysqli_real_escape_string($conn, $_POST['user']);
			$pass = mysqli_real_escape_string($conn, $_POST['pass']);


			$data_admin = mysqli_query($conn, "SELECT * FROM admin WHERE nia = '$user' AND password = '$pass'");
			$data_nasabah = mysqli_query($conn, "SELECT * FROM nasabah WHERE nin = '$user' AND password = '$pass'");

			$n = mysqli_fetch_array($data_nasabah);
			$a = mysqli_fetch_array($data_admin);

			// admin
			$email_a = $a['email'];
			$password_a = $a['password'];
			$level = $a['level'];
			$nama_a = $a['nama'];
			$telepon_a = $a['telepon'];
			$nia = $a['nia']; 	
			$cek_admin = mysqli_num_rows($data_admin);
			// nasabah
			$email_n = $n['email'];
			$password_n = $n['password'];
			$nama_n = $n['nama'];
			$telepon_n = $n['telepon'];
			$alamat = $n['alamat'];
			$nin = $n['nin'];
			$rt = $n['rt'];
			$saldo = $n['saldo'];
			$sampah = $n['sampah'];
			$cek_user = mysqli_num_rows($data_nasabah);

			if ($user == "" || $pass == "") {
				echo "
				<script>
					alert('Username dan Password tidak boleh kosong!');
					document.location.href ='login.php';
				</script>
				";
			}
			else {
				if ($cek_admin > 0) {
				session_start();
				$_SESSION['level'] = $level;
				$_SESSION['nama'] = $nama_a;
				$_SESSION['email'] = $email_a;
				$_SESSION['pass'] = $password_a;
				$_SESSION['telepon'] = $telepon_a;
				$_SESSION['nia'] = $nia;
				echo "
				<script>
					alert('Selamat Anda berhasil login!');
					document.location.href ='admin.php';
				</script>
				";
				}
				else if ($cek_user > 0) {
				session_start();
				$_SESSION['nama_n'] = $nama_n;
				$_SESSION['email_n'] = $email_n;
				$_SESSION['pass_n'] = $password_n;
				$_SESSION['telepon_n'] = $telepon_n;
				$_SESSION['nin'] = $nin;
				$_SESSION['rt'] = $rt;
				$_SESSION['alamat'] = $alamat;
				$_SESSION['saldo'] = $saldo;
				$_SESSION['sampah'] = $sampah;
				echo "
					<script>
						alert('Selamat Anda berhasil login!');
						document.location.href ='nasabah.php';
					</script>
				";	
				}
				else {
				echo "
				<script>
					alert('Maaf username dan password tidak valid!');
					document.location.href ='login.php';
				</script>
				";
				}
			}
		} else {header('location:login.php');}

	?>