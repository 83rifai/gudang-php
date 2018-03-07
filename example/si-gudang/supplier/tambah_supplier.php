<?php

require_once "../connect.php";

	if($_POST['show'] == "it"){
		mysql_query("INSERT INTO supplier (Kode_Supplier, Nama_Supplier, Contact_Person, Alamat, User_Input)
			VALUES (
				'".$_POST['Kode_Supplier']."',
				'".$_POST['Nama_Supplier']."',
				'".$_POST['Contact_Person']."',
				'".$_POST['Alamat']."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error());
		
		echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#awards'>disini</a> untuk kembali.</h3>";
	};

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if(document.getElementById("Kode_Supplier").value == ""){
				   msg += "Kode Supplier tidak boleh kosong !\n";	
				 }
				if (document.getElementById("Nama_Supplier").value == ""){
				   msg += "Nama Supplier tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Contact_Person").value == ""){
				   msg += "Contact Person tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Alamat").value == ""){
				   msg += "Alamat tidak boleh kosong !\n";	
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
				<td>Kode Supplier</td>
				<td>:</td>
				<td><input type="text" name="Kode_Supplier" id="Kode_Supplier" maxlength="10" /></td>
			</tr>
			<tr>
				<td>Nama Supplier</td>
				<td>:</td>
				<td><input type="text" name="Nama_Supplier" id="Nama_Supplier" maxlength="15" /></td>
			</tr>
			<tr>
				<td>Contact Person</td>
				<td>:</td>
				<td><input type="text" name="Contact_Person" id="Contact_Person" maxlength="15" /></td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="Alamat" id="Alamat" maxlength="70" /></td>
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