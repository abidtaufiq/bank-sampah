<?php
 if(!isset($_SESSION['nama_n'])){
session_start();
unset($_SESSION['user_n']);
unset($_SESSION['nama_n']);
unset($_SESSION['pass_n']);
unset($_SESSION['telepon_n']);
unset($_SESSION['telepon']);
unset($_SESSION['nin']);
unset($_SESSION['alamat']);
unset($_SESSION['saldo']);
unset($_SESSION['sampah']);
}

else if(!isset($_SESSION['nama'])){
session_start();
unset($_SESSION['level']);
unset($_SESSION['nama']);
unset($_SESSION['user']);
unset($_SESSION['pass']);
unset($_SESSION['telepon']);
unset($_SESSION['nia']);
}

header('location:login.php');
?>
