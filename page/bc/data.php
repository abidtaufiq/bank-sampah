<?php
include'config.php';

error_reporting(0);
$page = $_GET['page'];


if ($page == 'saldo')
{
	$id = $_POST['id'];
	$var_saldo = $db->query("SELECT SUM(total) AS totalsaldo FROM setor WHERE nin='".$id."'");
	$var_tarik = $db->query("SELECT SUM(jumlah_tarik) AS totaltarik FROM tarik WHERE nin='".$id."'");
	$rowsaldo = $var_saldo->fetch(PDO::FETCH_ASSOC);
	$rowtarik = $var_tarik->fetch(PDO::FETCH_ASSOC);
	$saldonya = $rowsaldo-$rowtarik; echo $rowsaldo;
}
?>