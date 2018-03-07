<?php

require_once 'connect.php';

	$q = mysql_query("SELECT Id, Tanggal, Kode_Transaksi, Qty, Keterangan, FROM history");

	$no = 1;
	$body = '';
	
	while($dt = mysql_fetch_array($q)){
		$body .= "
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['Id']."</td>
			<td>".$dt['Tanggal']."</td>
			<td>".$dt['Kode_Transaksi']."</td>
			<td>".$dt['Qty']."</td>
			<td>".$dt['Keterangan']."</td>
			<td>
				<a href='../stok/edit_stok.php?Kode_Barang=".$dt['Kode_Barang']."'>Edit</a>
				<a href='../stok/hapus_stok.php?Kode_Barang=".$dt['Kode_Barang']."'>Hapus</a>
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

		<table align="center" class="table table-striped table-bordered">


			<tr>
				<td colspan="9" align = "center">History</td>
			</tr>
			
			<tr>
			<th scope="row" class="thblue" align="center">No</td>
			<th scope="row" class="thblue" align="center">ID</td>
			<th scope="row" class="thblue" align="center">Tanggal</td>
			<th scope="row" class="thblue" align="center">Kode Transaksi</td>
			<th scope="row" class="thblue" align="center">Qty</td>
			<th scope="row" class="thblue" align="center">Keterangan</td>
			<th scope="row" class="thblue" align="center">Tombol</td>
			</tr>
			<tbody>
				'.$body.'
			</tbody>
		
		</table>

		</body>
		</html>';

	echo $page;

?>