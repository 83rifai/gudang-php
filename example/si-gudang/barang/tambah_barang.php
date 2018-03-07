<?php

require_once "../connect.php";

if($_POST['show'] == "it"){
	
		mysql_query("INSERT INTO Barang (Kode_Barang, Nama_Barang, Jenis_Barang, Satuan, User_Input)
			VALUES (
				'".$_POST['Kode_Barang']."',
				'".$_POST['Nama_Barang']."',
				'".$_POST['Jenis_Barang']."',
				'".$_POST['Satuan']."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error()." line ".__LINE__);
		
		
		
		echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#about'>disini</a> untuk kembali.</h3>";
	};

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if(document.getElementById("Kode_Barang").value == ""){
				   msg += "Kode Barang tidak boleh kosong !\n";	
				 }
				if (document.getElementById("Nama_Barang").value == ""){
				   msg += "Nama Barang tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Jenis_Barang").value == ""){
				   msg += "Jenis Barang tidak boleh kosong !\n";	
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
				<td><input type="text" name="Kode_Barang" id="Kode_Barang" maxlength="10" /></td>
			</tr>
			
			<tr>
				<td>Nama Barang</td>
				<td>:</td>
				<td><input type="text" name="Nama_Barang" id="Nama_Barang" maxlength="30" /></td>
			</tr>
			
			<tr>
				<td>Jenis Barang</td>
				<td>:</td>
				<td><input type="text" name="Jenis_Barang" id="Jenis_Barang" maxlength="15" /></td>
			</tr>
			
			
			<tr>
				<td>Satuan</td>
				<td>:</td>
				<td><input type="text" name="Satuan" id="Satuan" maxlength="20" /></td>
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