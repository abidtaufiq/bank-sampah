<?php
include'config.php';

error_reporting(0);
$page = $_GET['page'];


if ($page == 'saldo')
{
	$id = $_POST['id'];
	$var_saldo = $db->query("SELECT SUM(total) AS totalsaldo FROM setor WHERE nin='".$id."'");

	while ($rowsaldo = $var_saldo->fetch(PDO::FETCH_ASSOC)) { echo'<input type="text" id="saldo" name="saldo" value="'.$rowsaldo.'"/>';}
}
?>