<?php
 require_once("../config/koneksi.php");
 $id = $_GET['id'];
 $query = "DELETE FROM nasabah WHERE nin = '$id'";
 $queryact = mysqli_query($conn, $query);
 echo "<meta http-equiv='refresh'
      content='0; url=http://localhost/bsk09/page/admin.php?page=data-nasabah-full'>";
?>