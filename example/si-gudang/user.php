<?php

require_once 'connect.php';

	$q = mysql_query("SELECT User_Id, User_Name, Status_Aktif, User_Password, Tanggal_Input, Tanggal_Ubah, User_Input, User_ubah  FROM barang");

	$no = 1;
	$body = '';
	
	while($dt = mysql_fetch_array($q)){
		$body .= "
		
		<tr>
			<td>".$no."</td>
			<td>".$dt['User_Id']."</td>
			<td>".$dt['User_Name']."</td>
			<td>".$dt['Status_Aktif']."</td>
			<td>".$dt['User_Password']."</td>
			<td>".$dt['Tanggal_Input']."</td>
			<td>".$dt['Tanggal_Ubah']."</td>
			<td>".$dt['User_Input']."</td>
			<td>".$dt['User_ubah']."</td>
			<td>
				<a href='user/edit_user.php?User_Id=".$dt['User_Id']."'>Edit</a>
				<a href='user/hapus_user.php?User_Id=".$dt['User_Id']."'>Hapus</a>
			</td>
		</tr>
		";
		
		$no++;
	};
	
	$page = '
		<html>
		<head><title></title>
		</head>
		<body>

		<table border="1" align="center">


			<tr>
				<td colspan="10" align = "center">Daftar User</td>
			</tr>
			
			<tr>
				<td>No</td>
				<td>User Id</td>
				<td>User Name</td>
				<td>Status Aktif</td>
				<td>User Password</td>
				<td>Tanggal Input</td>
				<td>Tanggal Ubah</td>
				<td>User Input</td>
				<td>User ubah</td>
				<td align="center">Tombol</td>
			</tr>
				'.$body.'
			<tr>
				<td colspan="10" align="center">	<a href="user/tambah_user.php">Tambah</a></td>
			</tr>
		</table>

		</body>
		</html>';

	echo $page;

?>