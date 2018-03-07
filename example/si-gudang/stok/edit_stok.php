<?php

    require_once ("../connect.php"); 
	 
	if($_POST['when'] == 'click'){
		mysql_query("UPDATE stok SET 
			
			Kode_Barang			='".$_POST['Kode_Barang']."',
			Stok_Awal			='".$_POST['Stok_Awal']."',
			Stok_Masuk			='".$_POST['Stok_Masuk']."',
			Stok_Keluar			='".$_POST['Stok_Keluar']."', 
			Stok_PF				='".$_POST['Stok_PF']."',
			Stok_Penyesuaian	='".$_POST['Stok_Keluar']."', 
			Stok_Akhir			='".$_POST['Stok_Akhir']."'
			WHERE 
			Tanggal	='".$_GET['tanggal']."'
		") or die(mysql_error());	
	   
		echo "<h3> Data berhasil diubah. klik <a href='../opsi/home.php#datahistory'>disini</a> untuk kembali.</h3>";
    }else{ 
?>	


<script language="javascript">
	function validate_f()
    {
		var msg='';
		
		if(document.getElementById("Kode_Barang").value == ""){
			msg += "Kode Barang tidak boleh kosong !\n";	
		}
		if(document.getElementById("Stok_Awal").value == ""){
			msg += "Stok Awal tidak boleh kosong !\n";	
		}
		if(document.getElementById("Stok_Masuk").value == ""){
			msg += "Stok Masuk tidak boleh kosong !\n";	
		}
		if(document.getElementById("Stok_Keluar").value == ""){
			msg += "Stok Keluar tidak boleh kosong !\n";	
        }
		if(document.getElementById("Stok_PF").value == ""){
			msg += "Stok Pendataan fisik tidak boleh kosong !\n";	
        }
		if(document.getElementById("Stok_Penyesuaian").value == ""){
			msg += "Stok Penyesuaian fisik tidak boleh kosong !\n";	
        }
		if(document.getElementById("Stok_Akhir").value == ""){
			msg += "Stok Akhir fisik tidak boleh kosong !\n";	
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
	$data=mysql_query("SELECT * FROM stok WHERE Kode_Barang='".$_GET['Kode_Barang']."'");
	$row = mysql_fetch_array($data);
	
	 echo '
		<table border="0" align="center">
			<form action="" method="POST" onSubmit="return validate_f();">
				<input type="hidden" name="when" value="click" />
				
				<
				
				<tr>
					<td align="right"><b>Kode Barang</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Kode_Barang" id="Kode_Barang" maxlength="25" value="'.$row['Kode_Barang'].'">
					</td>
				</tr>

				<tr>
					<td align="right"><b>Stok Awal</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Stok_Awal" id="Stok_Awal" maxlength="30" value="'.$row['Stok_Awal].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Stok Masuk</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Stok_Masuk" id="Stok_Masuk" maxlength="12" value="'.$row['Stok_Masuk'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Stok_Keluar</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Stok_Keluar" id="Stok_Keluar" maxlength="12" value="'.$row['Stok_Keluar'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Stok Pendataan Fisik </td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Stok_PF" id="Stok_PF" maxlength="12" value="'.$row['Stok_PF'].'">
					</td>
				</tr>

				<tr>
					<td align="right"><b>Stok Penyesuaian </td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Stok_Penyesuaian" id="Stok_Penyesuaian" maxlength="12" value="'.$row['Stok_Penyesuaian'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Stok Akhir </td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Stok_Akhir" id="Stok_Akhir" maxlength="12" value="'.$row['Stok_Akhir'].'">
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