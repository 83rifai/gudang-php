<?php

    require_once ("../connect.php"); 
	 
	if($_POST['when'] == 'click'){
		mysql_query("UPDATE pembelian SET 
			No_Beli			='".$_POST['No_Beli']."',
			Tanggal_Beli	='".$_POST['Tanggal_Beli']."',
			Kode_Supplier	='".$_POST['Kode_Supplier']."',
			User_Ubah		='".$_SESSION['uid']."'
			WHERE 
			No_Beli		='".$_GET['No_Beli']."'
		") or die(mysql_error());	
	   
	   mysql_query("UPDATE detail_pembelian SET 
			Kode_Barang		='".$_POST['Kode_Barang']."',
			No_Beli			='".$_POST['No_Beli']."',
			Qty				='".$_POST['Qty']."',
			Satuan			='".$_POST['Satuan']."',
			Harga			='".$_POST['Harga']."',
			User_Ubah		='".$_SESSION['uid']."'
			WHERE 
			Kode_Barang		='".$_GET['Kode_Barang']."'
		") or die(mysql_error());	
		
		echo "<h3> Data berhasil diubah. klik <a href='../opsi/home.php#experience'>disini</a> untuk kembali.</h3>";
    }else{ 
?>	


<html>
<head><title></title>

<script language="javascript">
	function validate_f()
    {
		var msg='';
		if(document.getElementById("No_Beli").value == ""){
			msg += "No Beli tidak boleh kosong !\n";	
		}
		if(document.getElementById("Tanggal_Beli").value == ""){
			msg += "Tanggal Beli tidak boleh kosong !\n";	
		}
		if(document.getElementById("Kode_Supplier").value == ""){
			msg += "Kode Supplier tidak boleh kosong !\n";	
		}
	  
		if(msg){
			alert(msg);
			return false;  
		}else{
			return true;	   
		}
	}
</script>

<script src="../date/jquery.js"></script>
					
					<script src="../date/jquery-ui.min.js"></script>

					<link rel="stylesheet" href="../date/jquery-ui.css">
					
					
					<script>
						$( function (){
							$( ".datepicker" ).datepicker({
							changeMonth: true,
							changeYear: true,
							dateFormat:"yy-mm-dd"
							});
						});
					</script>

					<style>
						.avoid-clicks{
							pointer-events: none;
						}
						
						.table tr td{
							padding:3px;
						}
					</style>
				
		</head>
		
<body>


<?php
	
	$data=mysql_query("SELECT * FROM pembelian WHERE No_Beli=".$_GET['No_Beli']) or die(mysql_error());
	$row = mysql_fetch_array($data);
	
	 echo '
		<table border="1" align="center">
			<form action="" method="POST" onSubmit="return validate_f();">
				<input type="hidden" name="when" value="click" />
				
				<tr>
					<td align="right"><b>No Beli</td>
					<td align="left">
						<input type="text" name="No_Beli" id="No_Beli" readonly="yes" maxlength="10" value="'.$row['No_Beli'].'">
					</td>
				</tr>
				
				<tr>
					<td align="right"><b>Tanggal Beli</td>
					<td align="left">
						<input type="text" name="Tanggal_Beli" class="datepicker" maxlength="15" value="'.$row['Tanggal_Beli'].'">
					</td>
				</tr>

				<tr>
					<td align="right"><b>Kode Supplier</td>
					<td align="left">
						<input type="text" name="Kode_Supplier" id="Kode_Supplier" maxlength="15" value="'.$row['Kode_Supplier'].'">
					</td>
				</tr>
				';
				
				
				
	echo'
				<tr style="text-align:center">
					<td style="padding:10px">Nama Barang</td>
					<td>Qty</td>
					<td>Harga</td>
					<td>Satuan</td>
				</tr>
				';
	$data=mysql_query("SELECT * FROM detail_pembelian WHERE No_Beli=".$_GET['No_Beli']) or die(mysql_error());
				while ($row = mysql_fetch_array($data)) {
	echo '			
				<tr>
					<td align="left"><input type="text" name="Kode_Barang" id="Kode_Barang" readonly="yes" maxlength="15" value="'.$row['Kode_Barang'].'"></td>
					<td align="left"><input type="text" name="Qty" id="Qty" maxlength="15" value="'.$row['Qty'].'"></td> 
					<td align="left"><input type="text" name="Harga" id="Harga" maxlength="15" value="'.$row['Harga'].'"></td>
					<td align="left"><input type="text" name="Satuan" id="Satuan" maxlength="15" value="'.$row['Satuan'].'"></td> 		
				</tr>
				
				
				
	';
                  }	
	echo '			
				<tr>
					<td colspan="3" align="center">
						<input type="submit" name="simpan" value="Simpan" style="width:49%">
						<input type="button" name="batal" value="Batal" onClick="history.go(-1)" style="width:49%">
					</td>
				</tr>
';
				
echo '
			</form>
		</table>';
	}
   
?>

