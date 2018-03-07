<?php

require_once 'connect.php';

/* Id_Customer */
/**/	$queryA = mysql_query("SELECT id_customer, Nama_Customer FROM customer");
/**/
/**/	$option1 = '';
/**/	while($dtA= mysql_fetch_array($queryA)){
/**/		$option1 .= " <option value='".$dtA['id_customer']."'>".$dtA['Nama_Customer']."</option>";
/**/	}
/* Id_Customer */

$q = mysql_query("SELECT id_customer, Nama_Customer, Alamat, Contact_person FROM customer");
$z="0";
if (isset($_GET['cari'])) 
{
	$idc=$_GET['id_customer'];
	$cari = mysql_query("SELECT id_customer, Nama_Customer, Alamat, Contact_person FROM customer WHERE id_customer = '$idc' ");
		
	$z="1";	
	
	if (mysql_num_rows($cari)<1) 
	{
		$cari = mysql_query("SELECT id_customer, Nama_Customer, Alamat, Contact_person FROM customer")  or die (mysql_error()." line ".__LINE__);
	};
}ELSE{
	$cari = mysql_query("SELECT id_customer, Nama_Customer, Alamat, Contact_person FROM customer")  or die (mysql_error()." line ".__LINE__);
}

	$no = 1;
	$body = '';
	
if ($z = 1)
{

	while($dt = mysql_fetch_array($cari)){
		$body .= "
	<tr>
			<td>".$no."</td>
			<td>".$dt['id_customer']."</td>
			<td>".$dt['Nama_Customer']."</td>
			<td>".$dt['Alamat']."</td>
			<td>".$dt['Contact_person']."</td>
			<td>
				<a href='../customer/edit_customer.php?id_customer=".$dt['id_customer']."'>Edit | </a>
				<a href='../customer/hapus_customer.php?id_customer=".$dt['id_customer']."'>Hapus</a>
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
			<td>".$dt['id_customer']."</td>
			<td>".$dt['Nama_Customer']."</td>
			<td>".$dt['Alamat']."</td>
			<td>".$dt['Contact_person']."</td>
			<td>
				<a href='../customer/edit_customer.php?id_customer=".$dt['id_customer']."'>Edit</a>
				<a href='../customer/hapus_customer.php?id_customer=".$dt['id_customer']."'>Hapus</a>
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

			<style>
				select:invalid { color: gray; }
			</style>
		</head>
		<body>
		
		<a href="../customer/tambah_customer.php">Home / <b> Tambah </b></a>
		
												<!-- SEARCH FORM -->

			<form action="home.php#interests" method="get">
			<tr>
			<div class="row">
					<div class="col-lg-4">
						<div class="input-group">	
							<td align="left">
								<select name="id_customer"  style="width:200px">
									<option value="" disabled selected  >Select Nama Customer</option>
									'.$option1.'
								</select>
							</td>					
			</tr>
			
			<tr>
				<span class="input-group-btn">
				<td colspan="14" align="center"> <a href="#interests" > <input type="submit" class="btn btn-secondary" value="SEARCH" name="cari" ></a></td>
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
				<td colspan="6" align = "center">Daftar Customer</td>
			</tr>
			
			<tr>
				<th scope="row" class="thblue" align="center">No</td>
				<th scope="row" class="thblue" align="center">Id Customer</td>
				<th scope="row" class="thblue" align="center">Nama Customer</td>
				<th scope="row" class="thblue" align="center">Alamat</td>
				<th scope="row" class="thblue" align="center">Contact Person</td>
				<th scope="row" class="thblue" align="center">Tombol</td>
			</tr>
			<tbody>
				'.$body.'
			</tbody>
			<tr>
				<td colspan="6" align="center">	<a href="../customer/tambah_customer.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>