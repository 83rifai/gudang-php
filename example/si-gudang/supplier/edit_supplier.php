<?php

    require_once ("../connect.php"); 
	 
	if($_POST['when'] == 'click'){
		mysql_query("UPDATE supplier SET 
			Kode_Supplier		='".$_POST['Kode_Supplier']."',
			Nama_Supplier		='".$_POST['Nama_Supplier']."',
			Contact_Person		='".$_POST['Contact_Person']."',
			Alamat				='".$_POST['Alamat']."' 
			WHERE 
			Kode_Supplier		='".$_GET['Kode_Supplier']."'
		") or die(mysql_error());	
	   
		echo "<h3> Data berhasil diubah. klik <a href='../opsi/home.php#awards'>disini</a> untuk kembali.</h3>";
    }else{ 
?>	


<script language="javascript">
	function validate_f()
    {
		var msg='';
		if(document.getElementById("Kode_Supplier").value == ""){
			msg += "Kode Supplier tidak boleh kosong !\n";	
		}
		if(document.getElementById("Nama_Supplier").value == ""){
			msg += "Nama Supplier tidak boleh kosong !\n";	
		}
		if(document.getElementById("Contact_Person").value == ""){
			msg += "Contact Person tidak boleh kosong !\n";	
		}
		if(document.getElementById("Alamat").value == ""){
			msg += "Alamat tidak boleh kosong !\n";	
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
	$data=mysql_query("SELECT * FROM supplier WHERE Kode_Supplier='".$_GET['Kode_Supplier']."'");
	$row = mysql_fetch_array($data);
	
	 echo '
		<table border="0" align="center">
			<form action="" method="POST" onSubmit="return validate_f();">
				<input type="hidden" name="when" value="click" />
				
				<tr>
					<td align="right"><b>Kode Supplier</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Kode_Supplier" id="Kode_Supplier" maxlength="10" value="'.$row['Kode_Supplier'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Nama Supplier</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Nama_Supplier" id="Nama_Supplier" maxlength="15" value="'.$row['Nama_Supplier'].'">
					</td>
				</tr>

				<tr>
					<td align="right"><b>Contact Person</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Contact_Person" id="Contact_Person" maxlength="15" value="'.$row['Contact_Person'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Alamat</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Alamat" id="Alamat" maxlength="20" value="'.$row['Alamat'].'">
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