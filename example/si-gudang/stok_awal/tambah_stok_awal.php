<?php

require_once "../connect.php";

		if($_POST['show'] == "it"){	
		mysql_query("INSERT INTO stok (Bulan, Kode_Barang, Stok_Awal, Tanggal_Input, User_Input)
 
			VALUES (
				'".$_POST['Bulan']."',
				'".$_POST['Kode_Barang']."',
				'".$_POST['Stok_Awal']."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error());
		
		echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#StokAwal'>disini</a> untuk kembali.</h3>";
	};

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if (document.getElementById("Bulan").value == ""){
				   msg += "Bulan tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Kode_Barang").value == ""){
				   msg += "Kode_Barang tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Stok_Awal").value == ""){
				   msg += "Stok Awal tidak boleh kosong !\n";	
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
				<td>Bulan</td>
				<td>:</td>
				<td><input type="text" name="Bulan" id="Bulan" maxlength="35" /></td>
			</tr>
			
			<tr>
				<td>Kode Barang</td>
				<td>:</td>
				<td><input type="text" name="Kode_Barang" id="Kode_Barang" maxlength="70" /></td>
			</tr>
			
			<tr>
				<td>Stok Awal</td>
				<td>:</td>
				<td><input type="text" name="Stok-Awal" id="Stok_Awal" maxlength="15" /></td>
			</tr>
			
				<td colspan="3" align="center"><input type="submit" value="ok" style="width:99%" /></td>
			</tr>
		</table>
	</form>
		
	</body>
	</html>
	';

	echo $page;
?>