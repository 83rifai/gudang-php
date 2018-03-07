<?php

require_once "../connect.php";

$query_string = $_GET['q'];

	$q = mysql_query("SELECT Kode_Barang, Nama_Barang, Jenis_Barang FROM barang WHERE Kode_Barang='".$query_string."'");
	$dt = mysql_fetch_array($q);
	echo '<tr id="'.$dt['Kode_Barang'].'id">
			<td>'.$dt['Nama_Barang'].'</td>
			<td>'.$dt['Jenis_Barang'].'</td>
			<td><input type="number" name="qty[]" step="1" style="width:80px" /></td>
			<td><input type="number" name="harga[]" step="100" size="15" /></td>
		</tr>';


?>