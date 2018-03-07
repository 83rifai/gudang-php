<?php

require_once "../connect.php";

	if($_POST['when'] == 'click'){
		mysql_query("UPDATE user SET 
				User_Id 		='".$_POST['User_Id']."',
				User_Name		='".$_POST['User_Name']."',
				Status_Aktif	='".$_POST['Status_Aktif']."',
				User_Password	='".$_POST['User_Password']."',
				Tanggal_Input	='".$_POST['Tanggal_Input']."',
				Tanggal_Ubah	='".$_POST['Tanggal_Ubah']."',
				User_Input		='".$_POST['User_Input']."',
				User_Ubah		='".$_POST['User_Ubah']."'
				WHERE 
				User_Id	='".$_GET['User_Id']."'
		") or die(mysql_error());
		
		echo "<h3> Data berhasil diubah. klik <a href='../user.php'>disini</a> untuk kembali.</h3>";
	}else{

?>		

	<script language="javascript">
	function validate_f()
    {
		var msg='';
		if(document.getElementById("User_Id").value == ""){
			msg += "User Id tidak boleh kosong !\n";	
		}
		if(document.getElementById("User_Name").value == ""){
			msg += "User Name tidak boleh kosong !\n";	
		}
		if(document.getElementById("Status_Aktif").value == ""){
			msg += "Status Aktif tidak boleh kosong !\n";	
		}
		if(document.getElementById("User_Password").value == ""){
			msg += "User Password tidak boleh kosong !\n";	
        }
		if(document.getElementById("Tanggal_Input").value == ""){
			msg += "Tanggal Input tidak boleh kosong !\n";	
		}
		if(document.getElementById("Tanggal_Ubah").value == ""){
			msg += "Tanggal Ubah tidak boleh kosong !\n";	
		}
		if(document.getElementById("User_Input").value == ""){
			msg += "User Input tidak boleh kosong !\n";	
		}
		if(document.getElementById("User_Ubah").value == ""){
			msg += "User Ubah tidak boleh kosong !\n";	
        }
	  
		if(msg){
			alert(msg);
			return false;  
		}else{
			return true;	   
		}
	}
</script>

<?php
	$data=mysql_query("SELECT * FROM user WHERE User_Id='".$_GET['User_Id']."'");
	$row = mysql_fetch_array($data);
	
	 echo '
		<table border="0" align="center">
			<form action="" method="POST" onSubmit="return validate_f();">
				<input type="hidden" name="when" value="click" />
				
				<tr>
					<td align="right"><b>User Id</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="User_Id" id="User_Id" maxlength="10" value="'.$row['User_Id'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>User Name</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="User_Name" id="User_Name" maxlength="15" value="'.$row['User_Name'].'">
					</td>
				</tr>

				<tr>
					<td align="right"><b>Status Aktif</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Status_Aktif" id="Status_Aktif" maxlength="15" value="'.$row['Status_Aktif'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>User_Password</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="User_Password" id="User_Password" maxlength="20" value="'.$row['User_Password'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Tanggal Input</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Tanggal_Input" id="Tanggal_Input" maxlength="20" value="'.$row['Tanggal_Input'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Tanggal_Ubah</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Tanggal_Ubah" id="Tanggal_Ubah" maxlength="20" value="'.$row['Tanggal_Ubah'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>User_Input</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="User_Input" id="User_Input" maxlength="20" value="'.$row['User_Input'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>User_Ubah</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="User_Ubah" id="User_Ubah" maxlength="20" value="'.$row['User_Ubah'].'">
					</td>
				</tr>

				<tr>
					<td colspan="3" align="center">
						<input type="submit" name="simpan" value="Simpan" style="width:49%">
						<input type="button" name="batal" value="Batal" onClick="history.go(-1)" style="width:49%">
					</td>
				</tr>

			</form>
		</table>';
	}
   
?>