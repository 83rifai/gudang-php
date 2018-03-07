<?php

require_once "../connect.php";

		if($_POST['show'] == "it"){	
		mysql_query("INSERT INTO stok (Kode_Barang, Stok_Awal, Stok_Masuk, Stok_Keluar, Stok_PF, Stok_Penyesuaian, Stok_Akhir, Tanggal_Input, User_Input)
 
			VALUES (
				'".$_POST['Kode_Barang']."',
				'".$_POST['Stok_Awal']."',
				'".$_POST['Stok_Masuk']."',
				'".$_POST['Stok_Keluar']."',
				'".$_POST['Stok_PF']."',
				'".$_POST['Stok_Penyesuaian']."',
				'".$_POST['Stok_Akhir']."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error());
		
		echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#stok'>disini</a> untuk kembali.</h3>";
	};

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if (document.getElementById("Kode_Barang").value == ""){
				   msg += "Kode Barang tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Stok_Awal").value == ""){
				   msg += "Stok Awal tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Stok_Masuk").value == ""){
				   msg += "Stok Masuk tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Stok_Keluar").value == ""){
				   msg += "Stok Keluar tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Stok_PF").value == ""){
				   msg += "Stok pendataan fisik tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Stok_Penyesuaian").value == ""){
				   msg += "Stok Penyesuaian tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Stok_Akhir").value == ""){
				   msg += "Stok Akhir tidak boleh kosong !\n";	
				 }
				 if (msg) {
				  alert(msg);
				  return false;  
				 }else{
				  return true;	   
				  
				 }		
			 }
			</script>

	</head>
	<body>

	<form action="" method="POST" onsubmit="return validate()">
		
		<input type="hidden" name="show" value="it" />
		
		<table border="0" align="center">

			
			
			<tr>
				<td>Kode Barang</td>
				<td>:</td>
				<td><input type="text" name="Kode_Barang" id="Kode_Barang" maxlength="35" /></td>
			</tr>
			
			<tr>
				<td>Stok Awal</td>
				<td>:</td>
				<td><input type="text" name="Stok_Awal" id="Stok_Awal" maxlength="70" /></td>
			</tr>
			
			<tr>
				<td>Stok Masuk</td>
				<td>:</td>
				<td><input type="text" name="Stok_Masuk" id="Stok_Masuk" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Stok Keluar</td>
				<td>:</td>
				<td><input type="text" name="Stok_Keluar" id="Stok_Keluar" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Stok PF</td>
				<td>:</td>
				<td><input type="text" name="Stok_PF" id="Stok_PF" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Stok Penyesuaian</td>
				<td>:</td>
				<td><input type="text" name="Stok_Penyesuaian" id="Stok_Penyesuaian" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Stok Akhir</td>
				<td>:</td>
				<td><input type="text" name="Stok_Akhir" id="Stok_Akhir" maxlength="15" /></td>
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