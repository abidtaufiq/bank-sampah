<?php
session_start();
if (empty($_SESSION['user_n']) && empty($_SESSION['pass_n'])) {header('location:login.php');} 
else {   
error_reporting(E_ALL | E_STRICT); 
include_once("../system/config/koneksi.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Nasabah</title>
		<link rel="stylesheet" href="../asset/internal/css/style_2.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:700" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="shortcut icon" href="../asset/internal/img/img-local/favicon.ico">
		<style>
		  button{
          height: 27px;
          width: 85px;
          background: #8cd91a;
          border-radius: 5px;
          color: #fff;
          font-family: Montserrat;
        }
		</style>
	</head>
	<body>
		<div class="sidebar">
			<ul>
				<li>
					<a href="nasabah.php?page=data-nasabah" style="text-align: center; padding: 30px 0 30px 0; font-size: 20px;">Nasabah, <?php echo $_SESSION['user_n']; ?></a>
				</li>

				<li>
					<a href="nasabah.php?page=data-sampah-n"><span class="fa fa-trash" aria-hidden="true"></span>Data Sampah</a>
				</li>

				<li>
					<a href="nasabah.php?page=histori-setor"><span class="fa fa-handshake-o" aria-hidden="true"></span>Histori Setor</a>
				</li>

				<li>
					<a href="nasabah.php?page=histori-tarik"><span class="fa fa-handshake-o" aria-hidden="true"></span>Histori Tarik</a>
				</li>

				<li>
					<a href="admin.php?page=data-report"><span class="fa fa-table" aria-hidden="true"></span>Report Data</a>
				</li>

				<li>
					<a href="logout.php"><span class="fa fa-sign-out" aria-hidden="true"></span>Logout</a>
				</li>

			</ul>
		</div>

		<div class="box-1">
			<section>
	
				<?php 
					if(isset($_GET['page'])){
						$page = $_GET['page'];

					switch ($page) {
						case 'data-nasabah':
							include "../system/function/view-nasabah.php";
							break;
						case 'data-sampah-n':
							include "../system/function/view-sampah_n.php";
							break;
						case 'histori-setor':
							include "../system/function/histori-setor.php";
							break;
						case 'histori-tarik':
							include "../system/function/histori-tarik.php";
							break;
						case 'data-report':
							include "../system/function/view-report-n.php";
							break;
						case 'edit-nasabah':
							include "../system/function/edit-nasabah.php";
							break;			
						default:
							echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
							break;
					}
				}else{
					include "../system/function/view-nasabah.php";
				}

				 ?>
			</section>
		</div>

	</body>
</html>
<?php } ?>
