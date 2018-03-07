<?php

require_once "../connect.php";


		if($_POST['show'] == "it"){	
		mysql_query("INSERT INTO pendataan_fisik (Tanggal, Kode_Barang, Qty, Nilai, Satuan, User_Input)
 
			VALUES (
				'".$_POST['Tanggal']."',
				'".$_POST['Kode_Barang']."',
				'".$_POST['Qty']."',
				'".$_POST['Nilai']."',
				'".$_POST['Satuan']."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error());
		
		echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#StokOpname'>disini</a> untuk kembali.</h3>";
	};

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if(document.getElementById("Tanggal").value == ""){
				   msg += "ID Customer tidak boleh kosong !\n";	
				 }
				if (document.getElementById("Kode_Barang").value == ""){
				   msg += "Nama Customer tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Qty").value == ""){
				   msg += "Qty tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Nilai").value == ""){
				   msg += "Contact Person tidak boleh kosong !\n";	
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
				<td>Tanggal</td>
				<td>:</td>
				<td><input type="text" name="Tanggal" id="Tanggal" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Kode Barang</td>
				<td>:</td>
				<td><input type="text" name="Kode_Barang" id="Kode_Barang" maxlength="35" /></td>
			</tr>
			
			<tr>
				<td>Qty</td>
				<td>:</td>
				<td><input type="text" name="Qty" id="Qty" maxlength="70" /></td>
			</tr>
			
			<tr>
				<td>Nilai</td>
				<td>:</td>
				<td><input type="text" name="Nilai" id="Nilai" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Satuan</td>
				<td>:</td>
				<td><input type="text" name="Satuan" id="Satuan" maxlength="15" /></td>
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