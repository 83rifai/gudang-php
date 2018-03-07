<?php

require_once 'connect.php';
session_start ();

/* Kode_Barang */
/**/	$queryA = mysql_query("SELECT Kode_Barang, Nama_Barang FROM barang");
/**/
/**/	$option1 = '';
/**/	while($dtA= mysql_fetch_array($queryA)){
/**/		$option1 .= "<option value='".$dtA['Kode_Barang']."'>".$dtA['Nama_Barang']."</option>";
/**/	}
/* Kode_Supplier */




$q = mysql_query("SELECT Kode_Barang, Nama_Barang, Jenis_Barang, Qty_Stok_Awal, Nilai_Satuan, Qty_Stok, Satuan FROM barang")  or die (mysql_error()." line ".__LINE__) ;
$z="0";
if (isset($_GET['cari'])) 
{
	$kb=$_GET['Kode_Barang'];
	$cari = mysql_query("SELECT Kode_Barang, Nama_Barang, Jenis_Barang, Qty_Stok_Awal, Nilai_Satuan, Qty_Stok, Satuan FROM barang WHERE Kode_Barang = '$kb' ");
		
	$z="1";	
	
	if (mysql_num_rows($cari)<1) 
	{
		$cari = mysql_query("SELECT Kode_Barang, Nama_Barang, Jenis_Barang, Qty_Stok_Awal, Nilai_Satuan, Qty_Stok, Satuan FROM barang")  or die (mysql_error()." line ".__LINE__);
	};
}ELSE{
	$cari = mysql_query("SELECT Kode_Barang, Nama_Barang, Jenis_Barang, Qty_Stok_Awal, Nilai_Satuan, Qty_Stok, Satuan FROM barang")  or die (mysql_error()." line ".__LINE__);
}

	$no = 1;
	$body = '';
	
if ($z = 1)
{
	while($dt = mysql_fetch_array($cari)){
		
		$body .= "
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['Kode_Barang']."</td>
			<td>".$dt['Nama_Barang']."</td>
			<td>".$dt['Jenis_Barang']."</td>
			<td>".$dt['Qty_Stok_Awal']."</td>
			<td>".$dt['Nilai_Satuan']."</td>
			<td>".$dt['Qty_Stok']."</td>
			<td>".$dt['Satuan']."</td>
			<td>
				<a href='../barang/edit_barang.php?Kode_Barang=".$dt['Kode_Barang']."'>Edit | </a>
				<a href='../barang/hapus_barang.php?Kode_Barang=".$dt['Kode_Barang']."'>Hapus</a>
			</td>
		</tr>
		
		";
		$no++;
	};
}else{
	while($dt = mysql_fetch_array($q))
	{	
		$body .= "
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['Kode_Barang']."</td>
			<td>".$dt['Nama_Barang']."</td>
			<td>".$dt['Jenis_Barang']."</td>
			<td>".$dt['Qty_Stok_Awal']."</td>
			<td>".$dt['Nilai_Satuan']."</td>
			<td>".$dt['Qty_Stok']."</td>
			<td>".$dt['Satuan']."</td>
			<td>
				<a href='../barang/edit_barang.php?Kode_Barang=".$dt['Kode_Barang']."'>Edit</a>
				<a href='../barang/hapus_barang.php?Kode_Barang=".$dt['Kode_Barang']."'>Hapus</a>
			</td>
		</tr>
		";
		
		$no++;
	};	
};

	$page = '
		<html>
		<head><title></title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="vendor/bootstrap/css/style.css" rel="stylesheet">
		
		<a href="../barang/tambah_barang.php">Home / <b> Tambah </b></a>

		
		
													<!-- SEARCH FORM -->
			<form action="#about" method="get">
			<tr>
				<div class="row">
					<div class="col-lg-4">
						<div class="input-group">	
							<td align="left">
								<select name="Kode_Barang" id="Kode_Barang" style="width:166px">
									<option value=""></option>
										'.$option1.'
								</select>
							</td>			
			</tr>
			
			<tr>
				<span class="input-group-btn">
				<td colspan="14" align="center"> <a href="#about" > <input type="submit" class="btn btn-secondary" value="SEARCH" name="cari" ></a></td>
				</span>
			</tr>
						</div>
					</div>
				</div>
			</form>
													<!-- END SEARCH FORM -->
			<br/>

		
			<table align="center" class="table table-striped table-bordered">

			<tr>
				<td colspan="9" align = "center">Daftar Barang</td>
			</tr>
			
			<tr>
				<th scope="row" class="thblue" align="center">No</td>
				<th scope="row" class="thblue" align="center">Kode Barang</td>
				<th scope="row" class="thblue" align="center">Nama Barang</td>
				<th scope="row" class="thblue" align="center">Jenis Barang</td>
				<th scope="row" class="thblue" align="center">Qty Stok Awal</td>
				<th scope="row" class="thblue" align="center">Nilai Satuan</td>
				<th scope="row" class="thblue" align="center">Qty Stok</td>
				<th scope="row" class="thblue" align="center">Satuan</td>
				<th scope="row" class="thblue" align="center">Tombol</td>
			</tr>
			<tbody>
				'.$body.'
			</tbody>
			<tr>
				<td colspan="9" align="center">	<a href="../barang/tambah_barang.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>
