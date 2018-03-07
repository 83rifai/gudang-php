<?php

require_once 'connect.php';
session_start ();

/* Kode_Supplier */
/**/	$queryA = mysql_query("SELECT Kode_Supplier, Nama_Supplier FROM supplier");
/**/
/**/	$option1 = '';
/**/	while($dtA= mysql_fetch_array($queryA)){
/**/		$option1 .= "<option value='".$dtA['Kode_Supplier']."'>".$dtA['Nama_Supplier']."</option>";
/**/	}
/* Kode_Supplier */

$q = mysql_query("SELECT SELECT Kode_Supplier, Nama_Supplier, Contact_Person, Alamat FROM supplier");
$z="0";
if (isset($_GET['cari'])) 
{
	$ks=$_GET['Kode_Supplier'];
	$cari = mysql_query("SELECT Kode_Supplier, Nama_Supplier, Contact_Person, Alamat FROM supplier WHERE Kode_Supplier= '$ks' ");
		
	$z="1";	
	
	if (mysql_num_rows($cari)<1) 
	{
		$cari = mysql_query("SELECT Kode_Supplier, Nama_Supplier, Contact_Person, Alamat FROM supplier")  or die (mysql_error()." line ".__LINE__);
	};
}ELSE{
	$cari = mysql_query("SELECT Kode_Supplier, Nama_Supplier, Contact_Person, Alamat FROM supplier")  or die (mysql_error()." line ".__LINE__);
}

	$no = 1;
	$body = '';
	
if ($z = 1)
{

	//$q = mysql_query("SELECT Kode_Supplier, Nama_Supplier, Contact_Person, Alamat FROM supplier");

	//$no = 1;
	//$body = '';
	
	while($dt = mysql_fetch_array($cari)){
		$body .= "
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['Kode_Supplier']."</td>
			<td>".$dt['Nama_Supplier']."</td>
			<td>".$dt['Contact_Person']."</td>
			<td>".$dt['Alamat']."</td>
			<td>
				<a href='../supplier/edit_supplier.php?Kode_Supplier=".$dt['Kode_Supplier']."'>Edit | </a>
				<a href='../supplier/hapus_supplier.php?Kode_Supplier=".$dt['Kode_Supplier']."'>Hapus</a>
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
			<td>".$dt['Kode_Supplier']."</td>
			<td>".$dt['Nama_Supplier']."</td>
			<td>".$dt['Contact_Person']."</td>
			<td>".$dt['Alamat']."</td>
			<td>
				<a href='../supplier/edit_supplier.php?Kode_Supplier=".$dt['Kode_Supplier']."'>Edit</a>
				<a href='../supplier/hapus_supplier.php?Kode_Supplier=".$dt['Kode_Supplier']."'>Hapus</a>
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
		
		<br/>
		<a href="../supplier/tambah_supplier.php">Home / <b> Tambah </b></a>
		
		<br/>
		<br/>
		
													<!-- SEARCH FORM -->
			<form action="home.php#awards" method="get">
			<tr>
				<div class="row">
						<div class="col-lg-4">
							<div class="input-group">
								<td align="left">
									<select name="Kode_Supplier"  style="width:200px">
										<option value="" disabled selected  >Select Kode Supplier</option>
											'.$option1.'
									</select>
								</td>					
			</tr>
			
			<tr>
				<span class="input-group-btn">
				<td colspan="14" align="center"> <a href="#awards" > <input type="submit" class="btn btn-secondary" value="SEARCH" name="cari" ></a></td>
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
				<td colspan="6" align = "center">Daftar Supplier</td>
			</tr>
			
			<tr>
				<th scope="row" class="thblue" align="center">No</td>
				<th scope="row" class="thblue" align="center">Kode Supplier</td>
				<th scope="row" class="thblue" align="center">Nama Supplier</td>
				<th scope="row" class="thblue" align="center">Contact Person</td>
				<th scope="row" class="thblue" align="center">Alamat</td>
				<th scope="row" class="thblue" align="center">Tombol</td>
			</tr>
			<tbody>
				'.$body.'
			</tbody>
			<tr>
				<td colspan="6" align="center">	<a href="../supplier/tambah_supplier.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>