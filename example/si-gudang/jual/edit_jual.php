
<?php

    require_once ("../connect.php"); 
	
	//simpan No_Jual yang ada di URL ke variable $no_jual
	$no_jual = $_GET['No_Jual'];
	
	//menampilkan data berdasarkan GET No_Jual
	$query1 = mysql_query("
				SELECT 
					j.No_Jual, j.Tanggal_Jual, j.id_customer, 
					dj.Kode_Barang, dj.No_Produksi,dj.PO, dj.PO_Item, dj.Tanggal_PO, dj.Tanggal_Pengiriman, dj.Qty, dj.Satuan, dj.Harga, dj.Item_Jual, dj.Status,
					b.Nama_Barang
				FROM jual j 
						LEFT JOIN detail_jual dj ON (j.No_Jual=dj.No_Jual)
						LEFT JOIN barang b ON (dj.Kode_Barang=b.Kode_Barang)
				WHERE
						j.No_Jual = ".$no_jual."
				LIMIT 1
	") or die (mysql_error()." line ".__LINE__);
	$dt = mysql_fetch_array($query1);
	
	// cek apakah No_Jual terdaftar di tabel jual?
	if (mysql_num_rows($query1) < 1) {
		//header("location:../opsi/home.php#education");
	}
	
	if($_POST['show'] == 'it'){
		
		$error = array();
		//menampilkan error jika textbox tidak diisi
		if(empty ($_POST['Tanggal_Jual']))				$error[]="Tanggal Jual harus di isi";
		if(empty ($_POST['id_customer']))				$error[]="silahkan pilih nama customer";
		if(empty ($_POST['Kode_Barang']))				$error[]="Silahkan Pilih Nama Barang";
		if(empty ($_POST['PO']))						$error[]="PO Harus di Isi";
		if(empty ($_POST['PO_Item']))					$error[]="PO Item Harus di Isi";
		if(empty ($_POST['Tanggal_PO']))				$error[]="Tanggal PO harus diisi";
		if(empty ($_POST['Tanggal_Pengiriman']))		$error[]="Tanggal Pengiriman harus diisi";
		if(empty ($_POST['Satuan']))					$error[]="Satuan harus diisi";
		if(empty ($_POST['Item_Jual']))					$error[]="Item Jual harus diisi";
		if(empty ($_POST['Status']))					$error[]="Status harus diisi";
		
		//menampilkan error jika tidak diisi, dan akan menampilkan error bila diisi yang bukan angka
		if(empty($_POST['Qty'])){
			$error[] = "Qty Harus di Isi";
		} else {
			if(is_numeric($_POST['Qty'])== FALSE) 		$error[]="Qty Harus di Input dengan Angka";
		}
	
		// menampilkan error jika tidak di isi, dan akan menampilkan error bila di isi yang bukan angka
		if(empty($_POST['Harga'])){
			$error[] = "Harga harus di isi";
		}else{
			if(is_numeric($_POST['Harga'])== FALSE)	$error[] = "Harga harus di input dengan angka";
		}
		
		// menampilkan error jika customer yang dipilih tidak terdaftar di tabel customer
		$queryA = mysql_query("SELECT id_customer FROM customer WHERE id_customer='".$_POST['id_customer']."'") or die (mysql_error()." line ".__LINE__);
		if (mysql_num_rows($queryA) < 1 )				$error [] = "Maaf, Customer yang anda pilih tidak ada";

		// menampilkan error jika barang yang dipilih tidak terdaftar di tabel barang
		$queryB = mysql_query("SELECT Kode_Barang FROM barang WHERE  Kode_Barang='".$_POST['Kode_Barang']."'") or die (mysql_error()." line ".__LINE__);
		if (mysql_num_rows($queryB) < 1 )				$error [] = "Maaf, Nama Barang Tidak ada";
		
		// menampilkan error jika format tanggal jual tidak benar
		$dateTanggal_Jual = explode ("-", $_POST['Tanggal_Jual']);
		$day 	=$dateTanggal_Jual[2];
		$month	=$dateTanggal_Jual[1];
		$year	=$dateTanggal_Jual[0];
		if (!Checkdate ($month,$day,$year))				$error [] = "Format penulisan Tanggal Jual Salah, (Tahun, Bulan, Tanggal)";
		
		// menampilkan error jika format tanggal PO tidak benar
		$dateTanggal_PO = explode ("-", $_POST['Tanggal_PO']);
		$day 	=$dateTanggal_PO[2];
		$month	=$dateTanggal_PO[1];
		$year	=$dateTanggal_PO[0];
		if (!Checkdate ($month,$day,$year))				$error [] = "Format penulisan Tanggal PO Salah, (Tahun, Bulan, Tanggal)";
		
		// menampilkan error jika format tanggal Pengiriman tidak benar
		$dateTanggal_Pengiriman = explode ("-", $_POST['Tanggal_Pengiriman']);
		$day 	=$dateTanggal_Pengiriman[2];
		$month	=$dateTanggal_Pengiriman[1];
		$year	=$dateTanggal_Pengiriman[0];
		if (!Checkdate ($month,$day,$year))				$error [] = "Format penulisan Tanggal Pengiriman Salah, (Tahun, Bulan, Tanggal)";
		
		// menampilkan error jika Tanggal_Pengiriman < Tanggal_PO / Tanggal_Jual?
		// apa itu Tanggal PO dan Tanggal_Jual? dan bagaimana  urutan terjadinya?
		// function harga, tiap suplier pasti beda, 
		
		// UPDATE data, urutannya (Jual -> Produksi -> detail_produksi -> detail_jual) atau (jual -> Produksi -> detail_jual -> detail_produksi)
		
		if(empty($error)){
		mysql_query("UPDATE jual SET 
			Tanggal_Jual	='".$_POST['Tanggal_Jual']."',
			id_customer		='".$_POST['id_customer']."', 
			Tanggal_Ubah	='".date("Y-m-d H:i:s")."',
			User_Ubah		='".$_SESSION['uid']."'
			WHERE 
			No_Jual		='".$no_jual."'
		") or die(mysql_error()." line ".__LINE__);
		
		
		mysql_query ("UPDATE  produksi SET 
				 Item_Jual				='".$_POST['Item_Jual']."',
				 ".$Status."
				 Tanggal_Ubah			='".date("Y-m-d H:i:s")."',
				 User_Ubah				='".$_SESSION['uid']."'
				 WHERE 	
				 No_Produksi	='".$dt['No_Produksi']."'
				 
		 ") or die (mysql_error()." line ".__LINE__);
		 
		

					
				mysql_query("UPDATE detail_jual SET 
							Kode_Barang			='".$_POST['Kode_Barang']."',
							PO					='".$_POST['PO']."',
							PO_Item				='".$_POST['PO_Item']."', 
							Tanggal_PO			='".$_POST['Tanggal_PO'].date(" H:i:s")."',
							Tanggal_Pengiriman	='".$_POST['Tanggal_Pengiriman'].date(" H:i:s")."',
							Qty					='".$_POST['Qty']."', 
							Satuan				='".$_POST['Satuan']."',
							Harga				='".$_POST['Harga']."',
							Item_Jual			='".$_POST['Item_Jual']."',
							Status				='".$_POST['Status']."',
							Tanggal_Ubah		='".date("Y-m-d H:i:s")."',
							User_Ubah			='".$_SESSION['uid']."'
							WHERE 
							No_Jual		='".$dt['No_Jual']."'
				") or die(mysql_error()." line ".__LINE__);
	   
					echo "<h3> Data berhasil diubah. klik <a href='../opsi/home.php#education'>disini</a> untuk kembali.</h3>";
				}else{ 
					foreach($error AS $err){
						echo $err."</br>";
					}
				}
	}
	
	// menampilkan seluruh customer, dimana data sebelumnya tersimpan
	$query2 = mysql_query("SELECT id_customer, Nama_Customer FROM customer")
	or die (mysql_error()." line ".__LINE__);
	$option1 = "";
	$string1 = "";
	while ($dtA = mysql_fetch_array($query2)){
		if ($dtA['id_customer'] == $dt['id_customer']) 
			$string1 = "selected=selected";
		$option1 .="<option value='".$dtA['id_customer']."' ".$string1.">".$dtA['Nama_Customer']."</option>";
		$string1 = "";
	}
		
	// menampilkan seluruh barang, dimana data sebelumnya tersimpan
	$query3 = mysql_query("SELECT Kode_Barang, Nama_Barang FROM barang WHERE Kode_Barang LIKE 'BJ%'")
	or die (mysql_error()." line ".__LINE__);
	$option2 = "";
	$string2 = "";
	while ($dtB = mysql_fetch_array($query3)){
		if ($dtB['Kode_Barang'] == $dt['Kode_Barang']) 
			$string2 = "selected=selected";
		$option2 .="<option value='".$dtB['Kode_Barang']."' ".$string2.">".$dtB['Nama_Barang']."</option>";
		$string2 = "";
	
	}
	
	
?>	

<html>
<head><title></title>

<script language="javascript">
	function validate_f()
    {
		var msg='';
		if(document.getElementById("No_Jual").value == ""){
			msg += "No Jual tidak boleh kosong !\n";	
		}
		if(document.getElementById("Tanggal_Jual").value == ""){
			msg += "Tanggal Jual tidak boleh kosong !\n";	
		}
		if(document.getElementById("id_customer").value == ""){
			msg += "id_customer tidak boleh kosong !\n";	
		}
	  
		if(msg){
			alert(msg);
			return false;  
		}else{
			return true;	   
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
		
<?php
	
	$data=mysql_query("SELECT * FROM Jual WHERE No_Jual=".$_GET['No_Jual']) or die(mysql_error());
	$row = mysql_fetch_array($data);
	
	 echo '
			<form action="" method="POST" onSubmit="return validate_f();">
			
				<input type="hidden" name="show" value="it" />
				
					<table border="1" align="center" class="table">
					
				<tr>
					<td align="left"><b>No Jual</td>
					<td align="left">
						<?php echo $dt['No_Jual'] ?>
					</td>
					<td align="left"><b>PO</td>
					<td align="left">
						<input 	type		="text" 
								name		="PO" 
								value		="<?php echo $dt['PO'] ?>"
								id			="PO" 
								maxlength	="15" />
					</td>
				</tr>
				
				
				
				<tr>
					<td align="left"><b>Tanggal Jual</td>
					<td align="left">
						<input 	type		="text" 
								name		="Tanggal_Jual" 
								id			="Tanggal_Jual" 
								value		="<?php echo substr($dt['Tanggal_Jual'],0,10) ?>"
								class		="datepicker"
								maxlength	="15" />
					</td>
					<td align="left"><b>PO Item</td>
					<td align="left">
						<input	type		="text" 
								name		="PO_Item" 
								value		="<?php echo $dt['PO_Item'] ?>"
								id			="PO_Item" 
								maxlength	="20" />
					</td>
				</tr>
				
				

				<tr>
					<td align="left"><b>Customer</td>
					<td align="left">
						<select name="id_customer" 
								id="id_customer" 
								style ="width:166px">
								<?php echo $option1 ?>
						</select>	
					</td>
					<td align="left"><b>Tanggal PO</td>
					<td align="left">
						<input 	type		="text" 
								name		="Tanggal_PO" 
								value		="<?php echo substr($dt['Tanggal_PO'],0,10) ?>"
								id			="Tanggal_PO" 
								class		="datepicker"
								maxlength	="15" />
					</td>
				</tr>
				
				<tr></tr>
				<tr></tr>
				<tr></tr>
						
				
				<tr style="text-align:center">
				<td style="padding:10px">Nama Barang</td>
				<td>Tanggal Pengiriman</td>
				<td>Qty</td>
				<td>Satuan</td>
				<td>Harga</td>
				<td>Item Jual</td>
				<td>Status</td>
				
				
				<tr>			
				<td align="left">
					<select name="Kode_Barang" 
						id="Kode_Barang" style="width:166px" >
						<?php echo $option2 ?>
						</select>
				</td> 
				<td align="left"><input type="text" name="Tanggal_Pengiriman[]" class="datepicker"/></td> 
				<td align="left"><input type="text"name="Qty[]"/></td> 
				<td align="left"><input type="text"name="Satuan[]"/></td>
				<td align="left"><input type="text"name="Harga[]"/></td>
				<td align="left"><input type="text"name="Item_Jual[]"/></td>
				<td align="left"><select name="Status">
						<option value=""></option>
						<option value="Mulai">Mulai</option>
						<option value="Proses">Proses</option>
						<option value="Selesai">Selesai</option>
						</select>
				
			</tr>
			
				
			</tr>
				<tr>
					<td align="left"><b>Barang</td>
					<td>:</td>
					<td align="left">
						<select name="Kode_Barang" 
						id="Kode_Barang" style="width:166px" >
						<?php echo $option2 ?>
						</select>
					</td>
				</tr>

				
				
				
		
				
				
				<tr>
					<td align="left"><b>Tanggal Pengiriman</td>
					<td>:</td>
					<td align="left">
						<input 	type		="text" 
								name		="Tanggal_Pengiriman" 
								value		="<?php echo substr($dt['Tanggal_Pengiriman'],0,10) ?>"
								id			="Tanggal_Pengiriman" 
								class		="datepicker"
								maxlength	="15" />
					</td>
				</tr>
				
				<tr>
					<td align="left"><b>Qty</td>
					<td>:</td>
					<td align="left">
						<input 	type	="number" 
								name	="Qty" 
								value	="<?php echo $dt['Qty'] ?>"
								id		="Qty" 
								min		="1"
								step	="1" />
					</td>
				</tr>
				
				<tr>
					<td align="left"><b>Satuan</td>
					<td>:</td>
					<td align="left">
						<input	type		="text" 
								name		="Satuan" 
								value		="<?php echo $dt['Satuan'] ?>"
								id			="Satuan" 
								maxlength	="20" />
					</td>
				</tr>
				
				<tr>
					<td align="left"><b>Harga</td>
					<td>:</td>
					<td align="left">
						<input 	type	="number" 
								name	="Harga" 
								value	="<?php echo $dt['Harga'] ?>"
								id		="Harga" 
								min		="10000"
								step	="500" />
					</td>
				</tr>
				
				<tr>
					<td align="left"><b>Item Jual</td>
					<td>:</td>
					<td align="left">
						<input	type		="text" 
								name		="Item_Jual" 
								value		="<?php echo $dt['Item_Jual'] ?>"
								id			="Item_Jual" 
								maxlength	="20" />
					</td>
				</tr>
				
				<tr>
					<td align="left"><b>Status</td>
					<td>:</td>
					<td align="left">
						<input	type		="text" 
								name		="Status" 
								value		="<?php echo $dt['Status'] ?>"
								id			="Status" 
								maxlength	="20" />
					</td>
				</tr>
				
				<tr>
					<td colspan="8" align="center">
						<input type="submit" name="simpan" value="Simpan" style="width:49%">
						<input type="button" name="batal" value="Batal" onClick="history.go(-1)" style="width:49%">
					</td>
				</tr>
				
			</table>
		</form>
		
</body>
</html>