<?php

require_once "../connect.php";

	if($_POST['show'] == "it"){	
		mysql_query("INSERT INTO Produksi (No_Produksi, Item_Jual, Tanggal_Selesai_Produksi, No_Jual, User_Input)
			VALUES (
				'".$_POST['No_Produksi']."',
				'".$_POST['Item_Jual']."',
				'".$_POST['Tanggal_Produksi']."',
				'".$_POST['No_Jual']."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error());
		
		/* Input bahan baku */
			/**/	$bahan_baku = array(
			/**/		"BJ001" => array(
			/**/		"BB001" => 11,
			/**/		"BB002" => 8,
			/**/		"BB003" => 11,
			/**/		"BB004" => 3,
			/**/		"BB005" => 8
			/**/		),
			/**/		"BJ002" => array(
			/**/		"BB006" => 3,
			/**/		"BB001" => 15
			/**/		),
			/**/		"BJ003" => array(
			/**/		"BB005" => 3,
			/**/		"BB001" => 18
			/**/		),
			/**/		"BJ004" => array(
			/**/		"BB003" => 12,
			/**/		"BB006" => 3
			/**/		)
			/**/	);

			/**/	$qty = $_POST['Qty_Jadi'];
			/**/	// lakukan perulangan sebanyak isi $bahan_baku, $bahan_baku mempunyi 4 isi (BJ001, BJ002... etc), maka lakukan sebnayak 4 kali
			/**/ 	//dimana, BJ001,BJ002... etc disimpan disalam variable $key, $val, = array
			/**/	foreach($bahan_baku AS $key => $val){
			/**/	
			/**/ 	// jika $key (BJ001, BJ002, BJ003, BJ004) sama dengan isi (==) $_POST['Kode_Barang'], maka jalankan script dibawah
			/**/		if($key == $_POST['Kode_Barang']){
			/**/	
			/**/ 			// lakukan perulangan sebanyak jumlah value didalamnya
			/**/				// misal BJ001, mempunyai 5 value (BB001, BB002,...etc), maka lakukan perulangan sebanyak 5x
			/**/				// $val2= BB001, BB002... etc, $val = 11,8...etc
			/**/			foreach($val AS $val2 => $val3){
			/**/				mysql_query("INSERT INTO detail_produksi (No_Produksi, Kode_Barang, Qty, Satuan, Tanggal_Input, User_Input)
									VALUES (
										'".$no_produksi."',
										'".$val2."',
										'".$val3*$qty."',
										'batang',
										'".date("Y-m-d H:i:s")."',
										'".$_SESSION['uid']."'
									)
								") or die (mysql_error());
			/**/
			/**/				$queryC = mysql_query("SELECT Qty_Stok FROM barang WHERE Kode_Barang='".$val2."' LIMIT 1");
			/**/				$dtC = mysql_fetch_array($queryC);
			/**/				
			/**/				$val = $dtC['Qty_Stok'] - ($val3 * $qty);
			/**/				
			/**/				mysql_query("UPDATE barang SET Qty_Stok=".(int)$val." WHERE Kode_Barang='".$val2."'");
			/**/			}break;
			/**/		}
			/**/	}
			/* Input bahan baku */
		
		
		
		echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#skills'>disini</a> untuk kembali.</h3>";
	};

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if(document.getElementById("No_Produksi").value == ""){
				   msg += "No Produksi tidak boleh kosong !\n";	
				 }
				if (document.getElementById("Item_Jual").value == ""){
				   msg += "Item Jual tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Tanggal_Selesai_Produksi").value == ""){
				   msg += "Tanggal Produksi tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("No_Jual").value == ""){
				   msg += "No Jual tidak boleh kosong !\n";	
				 }
				 if (msg) {
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

	<form action="" method="POST" onsubmit="return validate()">
		
		<input type="hidden" name="show" value="it" />
		
		<table border="0" align="center">

			<tr>
				<td>No Produksi</td>
				<td>:</td>
				<td><input type="text" name="No_Produksi" id="No_Produksi" maxlength="10" /></td>
			</tr>
			
			<tr>
				<td>Item Jual</td>
				<td>:</td>
				<td><input type="text" name="Item_Jual" id="Item_Jual" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Tanggal Selesai Produksi</td>
				<td>:</td>
				<td><input type="text" name="Tanggal_Selesai_Produksi" class="datepicker" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>No Jual</td>
				<td>:</td>
				<td><input type="text" name="No_Jual" id="No_Jual" maxlength="20" /></td>
			</tr>
			
			<tr>
			 <td>User Ubah</td>
				<td>:</td>
			 <td><input type="text" name="User_Ubah" id="User_Ubah" maxlength="20" /></td>
			 </tr>
			 
			 <tr>
			 <td>User Input</td>
				<td>:</td>
			 <td><input type="text" name="User_Input" id="User_Input" maxlength="20" /></td>
			 </tr>
			
				<td colspan="8" align="center"><input type="submit" value="ok" style="width:99%" /></td>
			</tr>
		</table>
	</form>
		
	</body>
	</html>
	';

	echo $page;
?>