<?php

require_once "../connect.php";

	if($_POST['show'] == "it"){
		mysql_query("INSERT INTO customer (id_customer, Nama_Customer, Alamat, Contact_person, User_Input)
 
			VALUES (
				'".$_POST['id_customer']."',
				'".$_POST['Nama_Customer']."',
				'".$_POST['Alamat']."',
				'".$_POST['Contact_person']."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error());
		
		echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#interests'>disini</a> untuk kembali.</h3>";
	};

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if(document.getElementById("id_customer").value == ""){
				   msg += "ID Customer tidak boleh kosong !\n";	
				 }
				if (document.getElementById("Nama_Customer").value == ""){
				   msg += "Nama Customer tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Alamat").value == ""){
				   msg += "Alamat tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Contact_person").value == ""){
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
				<td>Id Customer</td>
				<td>:</td>
				<td><input type="text" name="id_customer" id="id_customer" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Nama Customer</td>
				<td>:</td>
				<td><input type="text" name="Nama_Customer" id="Nama_Customer" maxlength="35" /></td>
			</tr>
			
			<tr>
				<td>Alamat</td>
				<td>:</td>
				<td><input type="text" name="Alamat" id="Alamat" maxlength="70" /></td>
			</tr>
			
			<tr>
				<td>Contact Person</td>
				<td>:</td>
				<td><input type="text" name="Contact_person" id="Contact_person" maxlength="15" /></td>
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