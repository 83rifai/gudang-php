<?php

require_once 'connect.php';

	$q = mysql_query("SELECT Tanggal, Kode_Barang, Qty, Nilai, Satuan FROM pendataan_fisik");

	$no = 1;
	$body = '';
	
	while($dt = mysql_fetch_array($q)){
		$body .= "
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['Tanggal']."</td>
			<td>".$dt['Kode_Barang']."</td>
			<td>".$dt['Qty']."</td>
			<td>".$dt['Nilai']."</td>
			<td>".$dt['Satuan']."</td>
			<td>
				<a href='../pendataan_fisik/edit_pendataan_fisik.php?Tanggal=".$dt['Tanggal']."'>Edit | </a>
				<a href='../customer/hapus_pendataan_fisik.php?Tanggal=".$dt['Tanggal']."'>Hapus</a>
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
		
		<a href="../pendataan_fisik/tambah_pendataan_fisik.php">Home / <b> Tambah </b></a>

		<table align="center" class="table table-striped table-bordered">


			<tr>
				<td colspan="7" align = "center">Pendataan Fisik</td>
			</tr>
			
			<tr>
				<th scope="row" class="thblue" align="center">No</td>
				<th scope="row" class="thblue" align="center">Tanggal</td>
				<th scope="row" class="thblue" align="center">Kode Barang</td>
				<th scope="row" class="thblue" align="center">Qty</td>
				<th scope="row" class="thblue" align="center">Nilai</td>
				<th scope="row" class="thblue" align="center">Satuan</td>
				<th scope="row" class="thblue" align="center">Tombol</td>
			</tr>
			<tbody>
				'.$body.'
			</tbody>
			<tr>
				<td colspan="7" align="center">	<a href="../pendataan_fisik/tambah_pendataan_fisik.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>