<?php
session_start();
if (empty($_SESSION['user']) && empty($_SESSION['pass'])) {
    header('location:login.php');
} else {   
error_reporting(E_ALL | E_STRICT); 
include_once("../system/config/koneksi.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Admin</title>
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

		<?php 
	        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE nia='".$_SESSION['nia']."'");
	        $row = mysqli_fetch_array($cek);
      	?>

		<div class="sidebar">
			<ul>
				<li>
					<a href="admin.php?page=data-admin" style="text-align: center; padding: 30px 0 30px 0; font-size: 20px;"><?php echo $_SESSION["level"]; ?>, <br> <?php echo $row['nama'] ?></a>
				</li>
						<?php
							$level = $_SESSION['level'] == 'Admin';
							if($level){
								}else{
						?>	
				<li>
					<a href="admin.php?page=data-admin-full"><span class="fa fa-user" aria-hidden="true"></span>Data Admin</a>
				</li>	
						<?php } ?>

				<li>
					<a href="admin.php?page=data-nasabah-full"><span class="fa fa-users" aria-hidden="true"></span>Data Nasabah</a>
				</li>
				 	
				<li>
					<a href="admin.php?page=data-sampah"><span class="fa fa-trash" aria-hidden="true"></span>Data Sampah</a>
				</li>
				
				<li>
					<a href="admin.php?page=data-setor"><span class="fa fa-handshake-o" aria-hidden="true"></span>Transaksi Setor</a>
				</li>
				
				<li>
					<a href="admin.php?page=data-tarik"><span class="fa fa-handshake-o" aria-hidden="true"></span>Transaksi Tarik</a>
				</li>

				<li>
					<a href="admin.php?page=data-report"><span class="fa fa-line-chart" aria-hidden="true"></span>Grafik Monitoring</a>
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
						case 'data-admin':
							include "../system/function/view-admin.php";
							break;
						case 'tambah-data-admin':
							include "../system/function/tambah-admin.php";
							break;
						case 'data-admin-full':
							include "../system/function/view-admin-full.php";
							break;
						case 'edit-admin-id':
							include "../system/function/edit-admin-id.php";
							break;
						case 'edit-admin':
							include "../system/function/edit-admin.php";
							break;
						case 'edit-sampah':
							include "../system/function/edit-sampah.php";
							break;
						case 'data-nasabah-full':
							include "../system/function/view-nasabah-full.php";
							break;
						case 'edit-nasabah-id':
							include "../system/function/edit-nasabah-id.php";
							break;
						case 'tambah-data-nasabah':
							include "../system/function/tambah-nasabah.php";
							break;
						case 'data-sampah':
							include "../system/function/view-sampah.php";
							break;
						case 'tambah-data-setor':
							include "../system/function/tambah-setor.php";
							break;
						case 'edit-setor':
							include "../system/function/edit-setor.php";
							break;
						case 'tambah-data-tarik':
							include "../system/function/tambah-tarik.php";
							break;
						case 'data-setor':
							include "../system/function/view-setor.php";
							break;
						case 'data-tarik':
							include "../system/function/view-tarik.php";
							break;
						case 'data-report':
							include "../system/function/view-report.php";
							break;
						case 'tambah-data-sampah':
							include "../system/function/tambah-sampah.php";
							break;			
						default:
							echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
							break;
					}
				}else{
					include "../system/function/view-admin.php";
				}

				 ?>
			</section>
		</div>
		

	</body>
</html>
<?php } ?>