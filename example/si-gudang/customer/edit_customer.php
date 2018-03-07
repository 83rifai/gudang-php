<?php

    require_once ("../connect.php"); 
	 
	if($_POST['when'] == 'click'){
		mysql_query("UPDATE Customer SET 
			id_customer		='".$_POST['id_customer']."',
			Nama_Customer	='".$_POST['Nama_Customer']."',
			Alamat			='".$_POST['Alamat']."',
			Contact_person	='".$_POST['Contact_person']."' 
			WHERE 
			id_customer		='".$_GET['id_customer']."'
		") or die(mysql_error());	
	   
		echo "<h3> Data berhasil diubah. klik <a href='../opsi/home.php#interests'>disini</a> untuk kembali.</h3>";
    }else{ 
?>	


<script language="javascript">
	function validate_f()
    {
		var msg='';
		if(document.getElementById("id_customer").value == ""){
			msg += "ID Customer tidak boleh kosong !\n";	
		}
		if(document.getElementById("Nama_Customer").value == ""){
			msg += "Nama Customer tidak boleh kosong !\n";	
		}
		if(document.getElementById("Alamat").value == ""){
			msg += "Alamat tidak boleh kosong !\n";	
		}
		if(document.getElementById("Contact_person").value == ""){
			msg += "Contact Person tidak boleh kosong !\n";	
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
	$data=mysql_query("SELECT * FROM Customer WHERE id_customer='".$_GET['id_customer']."'");
	$row = mysql_fetch_array($data);
	
	 echo '
		<table border="0" align="center">
			<form action="" method="POST" onSubmit="return validate_f();">
				<input type="hidden" name="when" value="click" />
				
				<tr>
					<td align="right"><b>ID Customer</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="id_customer" id="id_customer" maxlength="15" value="'.$row['id_customer'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Nama Customer</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Nama_Customer" id="Nama_Customer" maxlength="25" value="'.$row['Nama_Customer'].'">
					</td>
				</tr>

				<tr>
					<td align="right"><b>Alamat</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Alamat" id="Alamat" maxlength="30" value="'.$row['Alamat'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Contact Person</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Contact_person" id="Contact_person" maxlength="12" value="'.$row['Contact_person'].'">
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