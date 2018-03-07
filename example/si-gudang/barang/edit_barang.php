<?php

    require_once ("../connect.php"); 
	 
	if($_POST['when'] == 'click'){
		mysql_query("UPDATE barang SET 
			Kode_Barang		='".$_POST['Kode_Barang']."',
			Nama_Barang		='".$_POST['Nama_Barang']."',
			Jenis_Barang	='".$_POST['Jenis_Barang']."',
			Satuan			='".$_POST['Satuan']."'
			WHERE 
			Kode_Barang		='".$_GET['Kode_Barang']."'
		") or die(mysql_error()." line ".__LINE__);	
		
		
		
	   
		echo "<h3> Data berhasil diubah. klik <a href='../opsi/home.php#about'>disini</a> untuk kembali.</h3>";
    }else{ 
?>	


<script language="javascript">
	function validate_f()
    {
		var msg='';
		
		if(document.getElementById("Kode_Barang").value == ""){
			msg += "Kode Barang tidak boleh kosong !\n";	
		}
		if(document.getElementById("Nama_Barang").value == ""){
			msg += "Nama Barang tidak boleh kosong !\n";	
		}
		if(document.getElementById("Jenis_Barang").value == ""){
			msg += "Jenis Barang tidak boleh kosong !\n";	
        }
		if(document.getElementById("Satuan").value == ""){
			msg += "Satuan tidak boleh kosong !\n";	
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
	$data=mysql_query("SELECT * FROM barang WHERE Kode_Barang='".$_GET['Kode_Barang']."'");
	$row = mysql_fetch_array($data);
	
	 echo '
		<table border="0" align="center">
			<form action="" method="POST" onSubmit="return validate_f();">
				<input type="hidden" name="when" value="click" />
				
				<tr>
					<td align="right"><b>Kode Barang</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Kode_Barang" id="Kode_Barang" maxlength="10" value="'.$row['Kode_Barang'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Nama Barang</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Nama_Barang" id="Nama_Barang" maxlength="15" value="'.$row['Nama_Barang'].'">
					</td>
				</tr>

				<tr>
					<td align="right"><b>Jenis Barang</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Jenis_Barang" id="Jenis_Barang" maxlength="15" value="'.$row['Jenis_Barang'].'">
					</td>
				</tr>
				
				
				<tr>
					<td align="right"><b>Satuan</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Satuan" id="Satuan" maxlength="20" value="'.$row['Satuan'].'">
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