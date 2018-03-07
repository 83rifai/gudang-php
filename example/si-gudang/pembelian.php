
<?php

require_once 'connect.php';
session_start ();

//Default setting Query
$sql = mysql_query("SELECT p.No_Beli, p.Tanggal_Beli, s.Nama_Supplier, b.Nama_Barang, b.Kode_Barang, b.Jenis_Barang, dp.Harga, dp.Qty, dp.Satuan, dp.Tanggal_Input, dp.Tanggal_Ubah, dp.User_Input, dp.User_Ubah, s.Contact_Person, s.Alamat, u.User_Id FROM 	pembelian p
						INNER JOIN detail_pembelian dp ON (p.No_Beli=dp.No_Beli)
						INNER JOIN supplier s ON (p.Kode_Supplier=s.Kode_Supplier)
						INNER JOIN barang b ON (dp.Kode_Barang=b.Kode_Barang)
						INNER JOIN user u ON (p.User_Input=u.User_Id)
				
				ORDER BY No_Beli
						") or die (mysql_error()." line ".__LINE__);
						
//Define $z, but its seem not working propely
$z="0";

//If user click button 'CARI' then show data from Tanggal_Beli user input in textbox (excute this statement)
if (isset($_POST['cari'])) 
{
	$tgl1=$_POST['tgl1'];
	$tgl2=$_POST['tgl2'];
	$cari = mysql_query(" SELECT p.No_Beli, p.Tanggal_Beli, s.Nama_Supplier, b.Nama_Barang, b.Kode_Barang, b.Jenis_Barang, dp.Harga, dp.Qty, dp.Satuan, dp.Tanggal_Input, dp.Tanggal_Ubah, dp.User_Input, dp.User_Ubah, s.Contact_Person, s.Alamat, u.User_Id FROM 	pembelian p
						INNER JOIN detail_pembelian dp ON (p.No_Beli=dp.No_Beli)
						INNER JOIN supplier s ON (p.Kode_Supplier=s.Kode_Supplier)
						INNER JOIN barang b ON (dp.Kode_Barang=b.Kode_Barang)
						INNER JOIN user u ON (p.User_Input=u.User_Id)
						
						WHERE Tanggal_Beli BETWEEN '$tgl1' AND '$tgl2'
						
						ORDER BY Tanggal_Beli desc
						")
						or die (mysql_error()." line ".__LINE__);
	$z="1";
	if (mysql_num_rows($cari)<1) 
	{
			
		$cari = mysql_query("SELECT p.No_Beli, p.Tanggal_Beli, s.Nama_Supplier, b.Nama_Barang, b.Kode_Barang, b.Jenis_Barang, dp.Harga, dp.Qty, dp.Satuan, dp.Tanggal_Input, dp.Tanggal_Ubah, dp.User_Input, dp.User_Ubah, s.Contact_Person, s.Alamat, u.User_Id FROM 	pembelian p
						INNER JOIN detail_pembelian dp ON (p.No_Beli=dp.No_Beli)
						INNER JOIN supplier s ON (p.Kode_Supplier=s.Kode_Supplier)
						INNER JOIN barang b ON (dp.Kode_Barang=b.Kode_Barang)
						INNER JOIN user u ON (p.User_Input=u.User_Id)
				
				ORDER BY No_Beli
						") or die (mysql_error()." line ".__LINE__);
	};			
}else{
//if user dont click "cari" excute this statement
$cari = mysql_query("SELECT p.No_Beli, p.Tanggal_Beli, s.Nama_Supplier, b.Nama_Barang, b.Kode_Barang, b.Jenis_Barang, dp.Harga, dp.Qty, dp.Satuan, dp.Tanggal_Input, dp.Tanggal_Ubah, dp.User_Input, dp.User_Ubah, s.Contact_Person, s.Alamat, u.User_Id FROM 	pembelian p
						INNER JOIN detail_pembelian dp ON (p.No_Beli=dp.No_Beli)
						INNER JOIN supplier s ON (p.Kode_Supplier=s.Kode_Supplier)
						INNER JOIN barang b ON (dp.Kode_Barang=b.Kode_Barang)
						INNER JOIN user u ON (p.User_Input=u.User_Id)
				
				ORDER BY No_Beli
						") or die (mysql_error()." line ".__LINE__);
}						
//end of "CARI"
//idk, but in this statemet	still have bug, cant show without 'else' condition
	
	//dont need this, u can delete this variable
	//backup
	/*$q = mysql_query("SELECT p.No_Beli, p.Tanggal_Beli, s.Nama_Supplier, b.Nama_Barang, b.Kode_Barang, b.Jenis_Barang, dp.Harga, dp.Qty, dp.Satuan, dp.Tanggal_Input, dp.Tanggal_Ubah, dp.User_Input, dp.User_Ubah, s.Contact_Person, s.Alamat, u.User_Id FROM 	pembelian p
						INNER JOIN detail_pembelian dp ON (p.No_Beli=dp.No_Beli)
						INNER JOIN supplier s ON (p.Kode_Supplier=s.Kode_Supplier)
						INNER JOIN barang b ON (dp.Kode_Barang=b.Kode_Barang)
						INNER JOIN user u ON (p.User_Input=u.User_Id)
				
				ORDER BY No_Beli
						") or die (mysql_error()." line ".__LINE__); */						
	
						
	if(isset($_POST['Input'])){
			$nama1 = $_POST['BB001'];
			$nama2 = $_POST['BB002'];
			$nama3 = $_POST['BB003'];
			$nama4 = $_POST['BB004'];
			$nama5 = $_POST['BB005'];
			$nama6 = $_POST['BB006'];
			
			
			echo $nama1."<br />";
			echo $nama2."<br />";
			echo $nama3."<br />";
			echo $nama4."<br />";
			echo $nama5."<br />";
			echo $nama6."<br />";
			
		}					
						
					
	$no = 1;
	$body = '';
	
//Check if $z = 1 then excute query $cari, else excute $sql
//but idk, why $z always have value '1'
if ($z = 1){
	while($dt = mysql_fetch_array($cari)){
		$body .= "
		
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['No_Beli']."</td>
			<td>".$dt['Tanggal_Beli']."</td>
			<td>".$dt['Nama_Supplier']."</td>
			<td>".$dt['Nama_Barang']."</td>
			<td>".$dt['Jenis_Barang']."</td>
			<td>".$dt['Harga']."</td>
			<td>".$dt['Qty']."</td>
			<td>".$dt['Satuan']."</td>
			<td>".$dt['Contact_Person']."</td>
			<td>".$dt['Alamat']."</td>
			<td>
				<a href='../pembelian/edit_pembelian.php?No_Beli=".$dt['No_Beli']."'>Edit | </a>
				<a href='../pembelian/hapus_pembelian.php?No_Beli=".$dt['No_Beli']."&Kode_Barang=".$dt['Kode_Barang']."'>Hapus</a>
			</td>
		</tr>
		";
		
		
		$no++;
	};
	
}else{
	
	while($dt = mysql_fetch_array($sql)){
		$body .= "
		
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['No_Beli']."</td>
			<td>".$dt['Tanggal_Beli']."</td>
			<td>".$dt['Nama_Supplier']."</td>
			<td>".$dt['Nama_Barang']."</td>
			<td>".$dt['Jenis_Barang']."</td>
			<td>".$dt['Harga']."</td>
			<td>".$dt['Qty']."</td>
			<td>".$dt['Satuan']."</td>
			<td>".$dt['Contact_Person']."</td>
			<td>".$dt['Alamat']."</td>
			<td>
				<a href='../pembelian/edit_pembelian.php?No_Beli=".$dt['No_Beli']."'>Edit</a>
				<a href='../pembelian/hapus_pembelian.php?No_Beli=".$dt['No_Beli']."&Kode_Barang=".$dt['Kode_Barang']."'>Hapus</a>
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
				var numpo =
				prompt("how many PO?");
				if(numpo != null && parseInt(Number(numpo))){
					window.location.href = "../pembelian/tambah_pembelian.php?po="+numpo;
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
		
			<br/>&nbsp;<br/><br/>
				<a href="../pembelian/tambah_pembelian.php">Home / <b> Tambah </b></a>
		
		
			<br/>
	
													<!-- SEARCH FORM -->
			
				<div class="row">
					<div class="col-lg-4">
						<div class="input-group">
							<input type="text" name="tgl1" class="datepicker form-control" maxlength="15" placeholder="Tanggal Mulai"  />
							<input type"text" class="form-control col-lg-2 center" placeholder="S/D" disabled>	  
							<input type="text" name="tgl2" class="datepicker form-control" maxlength="15" placeholder="Tanggal Akhir"  />
		
							<span class="input-group-btn">
								<a href="#experience" > <input type="submit" class="btn btn-secondary" value="SEARCH" name="cari" ></a>
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
				<td colspan="15" align = "center">Daftar Pembelian</td>
			</tr>
			
				
				<tr>
				<th scope="row" class="thblue" align="center">No</td>
				<th scope="row" class="thblue" align="center">No Beli</td>
				<th scope="row" class="thblue" align="center">Tanggal Beli</td>
				<th scope="row" class="thblue" align="center">Nama Supplier</td>
				<th scope="row" class="thblue" align="center">Nama Barang</td>
				<th scope="row" class="thblue" align="center">Jenis Barang</td>
				<th scope="row" class="thblue" align="center">Harga</td>
				<th scope="row" class="thblue" align="center">Qty</td>
				<th scope="row" class="thblue" align="center">Satuan</td>
				<th scope="row" class="thblue" align="center">Contact Person</td>
				<th scope="row" class="thblue" align="center">Alamat</td>
				<th scope="row" class="thblue" align="center">Tombol</td>
				
				</tr>
				<tbody>
					'.$body.'
				</tbody>
				<tr>
					<td colspan="12" align="center">	<a href="../pembelian/tambah_pembelian.php">Tambah</a></td>
				</tr>
			</table>

		</body>
		</html>';

	echo $page;

?>