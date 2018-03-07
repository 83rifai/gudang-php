<?php

require_once 'connect.php';

	$q = mysql_query("SELECT Bulan, Kode_Barang, Stok_Awal FROM stok_awal");

	$no = 1;
	$body = '';
	
	while($dt = mysql_fetch_array($q)){
		
		$body .= "
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['Bulan']."</td>
			<td>".$dt['Kode_Barang']."</td>
			<td>".$dt['Stok_Awal']."</td>
			<td>
				<a href='../barang/edit_stok_awal.php?Bulan=".$dt['Bulan']."'>Edit</a>
				<a href='../barang/hapus_stok_awal.php?Bulan=".$dt['Bulan']."'>Hapus</a>
			</td>
		</tr>
		";
		
		$no++;
	};
	
	$page = '
		<html>
		<head><title></title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/style.css" rel="stylesheet">
		
		<a href="../stok_awal/tambah_stok_awal.php">Home / <b> Tambah </b></a>

		<table align="center" class="table table-striped table-bordered">


			<tr>
				<td colspan="5" align = "center">Daftar Stok Awal</td>
			</tr>
			
			<tr>
				<th scope="row" class="thblue" align="center">No</td>
				<th scope="row" class="thblue" align="center">Bulan</td>
				<th scope="row" class="thblue" align="center">Kode Barang</td>
				<th scope="row" class="thblue" align="center">Stok Awal</td>
				<th scope="row" class="thblue" align="center">Tombol</td>
			</tr>
			<tbody>
				'.$body.'
			</tbody>
			<tr>
				<td colspan="5" align="center">	<a href="../stok_awal/tambah_stok_awal.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>
