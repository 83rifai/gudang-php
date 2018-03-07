<?php

require_once "../connect.php";

	if(!empty(isset($_POST['User_Id']))){
		mysql_query("INSERT INTO Barang (User_Id, User_Name, Status_Aktif, User_Password, Tanggal_Input, Tanggal_Ubah, User_Input, User_Ubah)
			VALUES (
				'".$_POST['User_Id']."',
				'".$_POST['User_Name']."',
				'".$_POST['Status_Aktif']."',
				'".$_POST['User_Password']."',
				'".$_POST['Tanggal_Input']."',
				'".$_POST['Tanggal_Ubah']."',
				'".$_POST['User_Input']."',
				'".$_POST['User_Ubah']."'
				
			)
		") or die(mysql_error());
		
		echo "<h3> Data berhasil ditambah. klik <a href='../barang.php'>disini</a> untuk kembali.</h3>";
	};

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if(document.getElementById("User_Id").value == ""){
				   msg += "User Id tidak boleh kosong !\n";	
				 }
				if (document.getElementById("User_Name").value == ""){
				   msg += "User Name tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Status_Aktif").value == ""){
				   msg += "Status Aktif tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("User_Password").value == ""){
				   msg += "User Password tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Tanggal_Input").value == ""){
				   msg += "Tanggal Input tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Tanggal_Ubah").value == ""){
				   msg += "Tanggal Ubah tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("User_Input").value == ""){
				   msg += "User Input tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("User_Ubah").value == ""){
				   msg += "User Ubah tidak boleh kosong !\n";	
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
				<td>User Id</td>
				<td>:</td>
				<td><input type="text" name="User_Id" id="User_Id" maxlength="10" /></td>
			</tr>
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td><input type="text" name="User_Name" id="User_Name" maxlength="15" /></td>
			</tr>
			<tr>
				<td>Status Aktif</td>
				<td>:</td>
				<td><input type="text" name="Status_Aktif" id="Status_Aktif" maxlength="15" /></td>
			</tr>
			<tr>
				<td>User Password</td>
				<td>:</td>
				<td><input type="text" name="User_Password" id="User_Password" maxlength="20" /></td>
			</tr>
			<tr>
				<td>Tanggal Input</td>
				<td>:</td>
				<td><input type="text" name="Tanggal_Input" id="Tanggal_Input" maxlength="20" /></td>
			 </tr>
			 <tr>
				<td>Tanggal_Ubah</td>
				<td>:</td>
				<td><input type="text" name="Tanggal_Ubah" id="Tanggal_Ubah" maxlength="20" /></td>
			 </tr>
			  <td>User Input</td>
				<td>:</td>
				<td><input type="text" name="User_Input" id="User_Input" maxlength="20" /></td>
			 </tr>
			<tr>
				<td>User Ubah</td>
				<td>:</td>
				<td><input type="text" name="User_Ubah" id="User_Ubah" maxlength="20" /></td>
			 </tr>
			 <tr>
			
			
				<td colspan="8" align="center"><input type="submit" value="ok" style="width:99%" /></td>
			</tr>
		</table>
	</form>
		
	</body>
	</html>
	';

	echo $page;
?>