<?php

    require_once ("../connect.php"); 
	 
	if($_POST['when'] == 'click'){
		mysql_query("UPDATE produksi SET 
			No_Produksi					='".$_POST['No_Produksi']."',
			Item_Jual					='".$_POST['Item_Jual']."',
			Tanggal_Selasai_Produksi	='".$_POST['Tanggal_Selesai_Produksi']."',
			No_Jual						='".$_POST['No_Jual']."' 
			WHERE 
			No_Produksi					='".$_GET['No_Produksi']."'
		") or die(mysql_error());	
	   
		echo "<h3> Data berhasil diubah. klik <a href='../opsi/home.php#skills'>disini</a> untuk kembali.</h3>";
    }else{ 
?>	


<script language="javascript">
	function validate_f()
    {
		var msg='';
		if(document.getElementById("No_Produksi").value == ""){
			msg += "No Produksi tidak boleh kosong !\n";	
		}
		if(document.getElementById("Item_Jual").value == ""){
			msg += "Item Jual tidak boleh kosong !\n";	
		}
		if(document.getElementById("Tanggal_Selesai_Produksi").value == ""){
			msg += "Tanggal Produksi tidak boleh kosong !\n";	
		}
		if(document.getElementById("No_Jual").value == ""){
			msg += "No Jual tidak boleh kosong !\n";	
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
	$data=mysql_query("SELECT * FROM Produksi WHERE No_Produksi='".$_GET['No_Produksi']."'");
	$row = mysql_fetch_array($data);
	
	 echo '
		<table border="0" align="center">
			<form action="" method="POST" onSubmit="return validate_f();">
				<input type="hidden" name="when" value="click" />
				
				<tr>
					<td align="right"><b>No Produksi</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="No_Produksi" id="No_Produksi" maxlength="10" value="'.$row['No_Produksi'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Item Jual</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Item_Jual" id="Item_Jual" maxlength="15" value="'.$row['Item_Jual'].'">
					</td>
				</tr>

				<tr>
					<td align="right"><b>Tanggal Selesai Produksi</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="Tanggal_Selasai_Produksi" id="Tanggal_Selasai_Produksi" maxlength="15" value="'.$row['Tanggal_Selasai_Produksi'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>No_Jual</td>
					<td>:</td>
					<td align="left">
						<input type="text" name="No_Jual" id="No_Jual" maxlength="20" value="'.$row['No_Jual'].'">
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