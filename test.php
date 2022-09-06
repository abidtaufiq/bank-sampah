<?php 
require_once("system/config/koneksi.php");
$query = mysqli_query($conn, "SELECT * FROM sampah");
$jsArray = "var harga = new Array();"
 ?>

 <table>
 	<tr>
 		<td>Sampah</td>:<td>
 		<select name="jesam" onchange="changeValue(this.value)">
 			<option selected="selected">-----</option>
 			<?php 
 			while ($row = mysqli_fetch_array($query)) {
 				echo '<option value="' .$row['jenis_sampah'].'">' .$row['jenis_sampah']. '</option>';
 				$jsArray .= "harga['" .$row['jenis_sampah']. "'] = {satu:'" .addcslashes($row['jenis_sampah']). "'};";
 			}
 			 ?>
 		</select>
 		</td>
 	</tr>
 	<tr>
 	<td>
 	Harga</td>:<td> <input type="text" name="harga" id="harga" value="" />
 	</td>
 	</tr>
 </table>

 <script type="text/javascript">
 	<?php echo $jsArray; ?>
 	function changeValue(id){
 		document.getElementById('harga').value = harga[id].satu;
 	}
 </script>