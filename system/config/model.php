<?php
if(isset($nin)){
$var_saldo = mysqli_query($conn, "SELECT SUM(total) AS totalsaldo FROM setor WHERE nin='".$nin."'");
$var_tarik = mysqli_query($conn, "SELECT SUM(jumlah_tarik) AS totaltarik FROM tarik WHERE nin='".$nin."'");
$tot_saldo = mysqli_fetch_array($var_saldo); $tot_tarik = mysqli_fetch_array($var_tarik);
$tot_saldo_total=$tot_saldo['totalsaldo']-$tot_tarik['totaltarik'];
}