<?php

require_once 'connect.php';

	$q = mysql_query("SELECT kode_barang, stok_awal, stok_masuk, stok_keluar, stok_pf, stok_penyesuaian, stok_akhir FROM stok");

	$no = 1;
	$body = '';
	
	while($dt = mysql_fetch_array($q)){
		$body .= "
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['kode_barang']."</td>
			<td>".$dt['stok_awal']."</td>
			<td>".$dt['stok_masuk']."</td>
			<td>".$dt['stok_keluar']."</td>
			<td>".$dt['stok_pf']."</td>
			<td>".$dt['stok_penyesuain']."</td>
			<td>".$dt['stok_akhir']."</td>
			<td>
				<a href='../stok/edit_stok.php?Kode_Barang=".$dt['kode_barang']."'>Edit</a>
				<a href='../stok/hapus_stok.php?Kode_Barang=".$dt['kode_barang']."'>Hapus</a></td></tr>";
		
		$no++;
	};
	
	$page = '
		<html>
		<head><title></title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/style.css" rel="stylesheet">
		
		<a href="../stok/tambah_stok.php">Home / <b> Tambah </b></a>

		<table align="center" class="table table-striped table-bordered">


			<tr>
				<td colspan="9" align = "center">Stok</td>
			</tr>
			
			<tr>
				<th scope="row" class="thblue" align="center">No</td>
				<th scope="row" class="thblue" align="center">Kode Barang</td>
				<th scope="row" class="thblue" align="center">Stok Awal</td>
				<th scope="row" class="thblue" align="center">Stok Awal</td>
				<th scope="row" class="thblue" align="center">Stok Keluar</td>
				<th scope="row" class="thblue" align="center">Stok Pendataan Fisik</td>
				<th scope="row" class="thblue" align="center">Stok Penyesuaian</td>
				<th scope="row" class="thblue" align="center">Stok Akhir</td>
				<th scope="row" class="thblue" align="center">Tombol</td>
			</tr>
			<tbody>
				'.$body.'
			</tbody>
			<tr>
				<td colspan="9" align="center">	<a href="../stok/tambah_stok.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>