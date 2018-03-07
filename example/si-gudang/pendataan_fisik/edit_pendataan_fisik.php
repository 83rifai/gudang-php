<?php

    require_once ("../connect.php"); 
	 
	if($_POST['when'] == 'click'){
		mysql_query("UPDATE pendataan_fisik SET 
			Tanggal		='".$_POST['tanggal']."',
			Kode_Barang	='".$_POST['Kode_Barang']."',
			Qty			='".$_POST['Qty']."',
			Nilai		='".$_POST['Nilai']."', 
			Satuan		='".$_POST['Satuan']."'
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
		if(document.getElementById("tanggal").value == ""){
			msg += "Tanggal tidak boleh kosong !\n";	
		}
		if(document.getElementById("Kode_Barang").value == ""){
			msg += "Kode Barang tidak boleh kosong !\n";	
		}
		if(document.getElementById("Qty").value == ""){
			msg += "Qty tidak boleh kosong !\n";	
		}
		if(document.getElementById("Nilai").value == ""){
			msg += "Contact Person tidak boleh kosong !\n";	
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
	$data=mysql_query("SELECT * FROM pendataan_fisik WHERE tanggal='".$_GET['tanggal']."'");
	$row = mysql_fetch_array($data);
	
	 echo '
		<table border="0" align="center">
			<form action="" method="POST" onSubmit="return validate_f();">
				<input type="hidden" name="when" value="click" />
				
				<tr>
					<td align="right"><b>Tanggal</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="tanggal" id="tanggal" maxlength="15" value="'.$row['tanggal'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Kode Barang</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Kode_Barang" id="Kode_Barang" maxlength="25" value="'.$row['Kode_Barang'].'">
					</td>
				</tr>

				<tr>
					<td align="right"><b>Qty</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Qty" id="Qty" maxlength="30" value="'.$row['Qty'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Nilai</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Nilai" id="Nilai" maxlength="12" value="'.$row['Nilai'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Satuan</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Satuan" id="Satuan" maxlength="12" value="'.$row['Satuan'].'">
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