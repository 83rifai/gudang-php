<?php

require_once 'connect.php';
session_start ();

//Default setting Query
$sql = mysql_query("SELECT j.No_Jual, j.Tanggal_Jual, j.PO,j.Tanggal_PO,dj.Kode_Barang,  dj.PO_Item,  dj.Tanggal_Pengiriman, dj.Qty, dj.Satuan, dj.Harga, dj.Status, dj.Qty_Jadi, p.No_Produksi, c.Nama_Customer FROM jual j
		LEFT JOIN detail_jual dj ON (j.No_Jual=dj.No_Jual)
		LEFT JOIN produksi p ON (dj.No_Produksi=p.No_Produksi)
		LEFT JOIN customer c ON (j.id_customer=c.id_customer)
				
		WHERE
		dj.No_Jual IS NOT NULL
		") or die (mysql_error()." line ".__LINE__);
//Define $z, but its seem not working propely
$z="0";

//If user click button 'CARI' then show data from Tanggal_Beli user input in textbox (excute this statement)
if (isset($_POST['cari'])) 
{
	$tgl1=$_POST['tgl1'];
	$tgl2=$_POST['tgl2'];
	$cari = mysql_query("SELECT j.No_Jual, j.Tanggal_Jual, j.PO,j.Tanggal_PO,dj.Kode_Barang,  dj.PO_Item,  dj.Tanggal_Pengiriman, dj.Qty, dj.Satuan, dj.Harga, dj.Status, dj.Qty_Jadi, p.No_Produksi, c.Nama_Customer FROM jual j
		LEFT JOIN detail_jual dj ON (j.No_Jual=dj.No_Jual)
		LEFT JOIN produksi p ON (dj.No_Produksi=p.No_Produksi)
		LEFT JOIN customer c ON (j.id_customer=c.id_customer)
						
						WHERE Tanggal_Jual BETWEEN '$tgl1' AND '$tgl2'
						
						ORDER BY Tanggal_Jual desc
						")
						or die (mysql_error()." line ".__LINE__);
	$z="1";
	if (mysql_num_rows($cari)<1) 
{
			
		$cari = mysql_query("SELECT j.No_Jual, j.Tanggal_Jual, j.PO,j.Tanggal_PO,dj.Kode_Barang,  dj.PO_Item,  dj.Tanggal_Pengiriman, dj.Qty, dj.Satuan, dj.Harga, dj.Status, dj.Qty_Jadi, p.No_Produksi, c.Nama_Customer FROM jual j
			LEFT JOIN detail_jual dj ON (j.No_Jual=dj.No_Jual)
			LEFT JOIN produksi p ON (dj.No_Produksi=p.No_Produksi)
			LEFT JOIN customer c ON (j.id_customer=c.id_customer)
				
				ORDER BY No_Jual
						") or die (mysql_error()." line ".__LINE__);
	};			
}else{
//if user dont click "cari" excute this statement
	$cari = mysql_query("SELECT j.No_Jual, j.Tanggal_Jual, j.PO,j.Tanggal_PO,dj.Kode_Barang,  dj.PO_Item,  dj.Tanggal_Pengiriman, dj.Qty, dj.Satuan, dj.Harga, dj.Status, dj.Qty_Jadi, p.No_Produksi, c.Nama_Customer FROM jual j
		LEFT JOIN detail_jual dj ON (j.No_Jual=dj.No_Jual)
		LEFT JOIN produksi p ON (dj.No_Produksi=p.No_Produksi)
		LEFT JOIN customer c ON (j.id_customer=c.id_customer)
				
				ORDER BY No_Jual
				") or die (mysql_error()." line ".__LINE__);
}	

	//$q = mysql_query("SELECT j.No_Jual, j.Tanggal_Jual, dj.Kode_Barang, dj.PO, dj.PO_Item, dj.Tanggal_PO, dj.Tanggal_Pengiriman, dj.Qty, dj.Satuan, //dj.Harga, dj.Status, dj.Qty_Jadi, p.No_Produksi, c.Nama_Customer FROM jual j
	//	LEFT JOIN detail_jual dj ON (j.No_Jual=dj.No_Jual)
	//	LEFT JOIN produksi p ON (dj.No_Produksi=p.No_Produksi)
	//	LEFT JOIN customer c ON (j.id_customer=c.id_customer)
	//WHERE
	//	dj.No_Jual IS NOT NULL
	//") or die (mysql_error()." line ".__LINE__);
	
	
	
	
	if(isset($_POST['Input'])){
			$nama1 = $_POST['BJ001'];
			$nama2 = $_POST['BJ002'];
			$nama3 = $_POST['BJ003'];
			$nama4 = $_POST['BJ004'];
			
			
			
			echo $nama1."<br />";
			echo $nama2."<br />";
			echo $nama3."<br />";
			echo $nama4."<br />";
			
			
		}

	$no = 1;
	$body = '';
	
//Check if $z = 1 then excute query $cari, else excute $sql
//but idk, why $z always have value '1'
if ($z = 1){
	while($dt = mysql_fetch_array($cari)){
		$body .= "
		
		<tr>
			<th scope='row'>".$no."</td>
			<td>".$dt['No_Jual']."</td>
			<td>".$dt['Tanggal_Jual']."</td>
			<td>".$dt['Nama_Customer']."</td>
			<td>".$dt['Kode_Barang']."</td>
			<td>".$dt['PO']."</td>
			<td>".$dt['PO_Item']."</td>
			<td>".$dt['Tanggal_PO']."</td>
			<td>".$dt['Tanggal_Pengiriman']."</td>
			<td>".$dt['Qty']."</td>
			<td>".$dt['Satuan']."</td>
			<td>".$dt['Harga']."</td>
			<td>".$dt['Status']."</td>
			<td>".$dt['Qty_Jadi']."</td>
			
			
			
			<td>
				<a href='../jual/edit_jual.php?No_Jual=".$dt['No_Jual']."'>Edit | </a>
				<a href='../jual/hapus_jual.php?No_Jual=".$dt['No_Jual']."'>Hapus</a>
			</td>
		</tr>
		";
		
		$no++;
	};
}else{
	
	while($dt = mysql_fetch_array($sql)){
		$body .= "
		
	<tr>
			<th scope='row'>".$no."</td>
			<td>".$dt['No_Jual']."</td>
			<td>".$dt['Tanggal_Jual']."</td>
			<td>".$dt['Nama_Customer']."</td>
			<td>".$dt['Kode_Barang']."</td>
			<td>".$dt['PO']."</td>
			<td>".$dt['PO_Item']."</td>
			<td>".$dt['Tanggal_PO']."</td>
			<td>".$dt['Tanggal_Pengiriman']."</td>
			<td>".$dt['Qty']."</td>
			<td>".$dt['Satuan']."</td>
			<td>".$dt['Harga']."</td>
			<td>".$dt['Status']."</td>
			<td>".$dt['Qty_Jadi']."</td>
			
			
			
			<td>
				<a href='../jual/edit_jual.php?No_Jual=".$dt['No_Jual']."'>Edit</a>
				<a href='../jual/hapus_jual.php?No_Jual=".$dt['No_Jual']."'>Hapus</a>
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

		<script>
			function tambah(){
				var numpo = prompt("how many PO?");
				if(numpo != null && parseInt(Number(numpo))){
					window.location.href = "../jual/tambah_jual.php?po="+numpo;
				}
			}
		</script>
		
		
			<script src="../date/jquery.js"></script>
			
					<script src="../date/jquery-ui.min.js"></script>

					<link rel="stylesheet" href="../date/jquery-ui.css">
			
			
			<script>
				$( function (){
							$( ".datepicker" ).datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat:"yy-mm-dd"
							});
						});
			</script>

			<style>
				.avoid-clicks{
					pointer-events: none;
				}
				
				.table tr td{
							padding:3px;
						}
			</style>

		
		</head>
		<body>
		
			<br/>
		
		
			<a href="../jual/tambah_jual.php">Home / <b> Tambah </b></a><br><br><br>
		
		<br/>
			
														<!-- SEARCH FORM -->

				<div class="row">
					<div class="col-lg-4">
						<div class="input-group">
							<input type="text" name="tgl1" class="datepicker form-control" maxlength="15" placeholder="Tanggal Mulai"  />
							<input type"text" class="form-control col-lg-2 center" placeholder="S/D" disabled>	  
							<input type="text" name="tgl2" class="datepicker form-control" maxlength="15" placeholder="Tanggal Akhir"  />
							

			<!--<input type="text" class="form-control" placeholder="Search for...">-->

							<span class="input-group-btn">
								<a href="#education" > <input type="submit" class="btn btn-secondary" value="SEARCH" name="cari" ></a>
								<!--<button class="btn btn-secondary" type="button">Go!</button>-->
							</span>
						</div>
					</div>
				</div>

			</tr>
			</form><br/>&nbsp;<br/>

													<!-- END SEARCH FORM -->
					<br/>
		
		<table align="center" class="table table-striped table-bordered">

			<tr>
				<td colspan="15" align = "center">Daftar Jual</td>
			</tr>
			
			
			
			<tr>
				<th scope="row" class="thblue" align="center">No</td>
				<th scope="row" class="thblue" align="center">No Jual</td>
				<th scope="row" class="thblue" align="center">Tanggal Jual</td>
				<th scope="row" class="thblue" align="center">Nama Customer</td>
				<th scope="row" class="thblue" align="center">Kode Barang</td>
				<th scope="row" class="thblue" align="center">PO</td>
				<th scope="row" class="thblue" align="center">PO Item</td>
				<th scope="row" class="thblue" align="center">Tanggal PO</td>
				<th scope="row" class="thblue" align="center">Tanggal Pengiriman</td>
				<th scope="row" class="thblue" align="center">Qty</td>
				<th scope="row" class="thblue" align="center">Satuan</td>
				<th scope="row" class="thblue" align="center">Harga</td>
				<th scope="row" class="thblue" align="center">Status</td>
				<th scope="row" class="thblue" align="center">Qty Jadi</td>
				<th scope="row" class="thblue" align="center">Tombol</td>
			</tr>
			<tbody>
				'.$body.'
			</tbody>
			<tr>
				<td colspan="15" align="center">	<a href="../jual/tambah_jual.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>