<?php

require_once 'connect.php';

	
	$q = mysql_query("SELECT Kode_Barang, No_Beli, Nama_Barang, Qty, Harga, Satuan FROM detail_pembelian");

	
	
	$no = 1;
	$body = '';
	
	while($dt = mysql_fetch_array($q)){
		$body .= "
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['Kode_Barang']."</td>
			<td>".$dt['No_Beli']."</td>
			<td>".$dt['Nama_Barang']."</td>
			<td>".$dt['Qty']."</td>
			<td>".$dt['Satuan']."</td>
			<td>".$dt['Harga']."</td>
			<td>
				<a href='detail_Pembelian/edit_detail_pembelian.php?Kode_Barang=".$dt['Kode_Barang']."'>Edit</a>
				<a href='detail_Pembelian/hapus_detail_pembelian.php?Kode_Barang=".$dt['Kode_Barang']."'>Hapus</a>
			</td>
		</tr>
		";
		
		$no++;
	};
	
	$page = '
		<html>
		<head><title></title>
		</head>
		<body>

		<table border="1" align="center">


			<tr>
				<td colspan="8" align = "center">Daftar Detail Pembelian</td>
			</tr>
			
			<tr>
				<td>No</td>
				<td>Kode Barang</td>
				<td>No Beli</td>
				<td>Nama Barang</td>
				<td>Qty</td>
				<td>Satuan</td>
				<td>Harga</td>
				<td align="center">Tombol</td>
			</tr>
				'.$body.'
			<tr>
				<td colspan="8" align="center">	<a href="detail_Pembelian/tambah_detail_pembelian.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>