<?php

session_start();
require_once "../connect.php";

//No_Beli 
$q_count = mysql_query ("SELECT No_Beli FROM pembelian WHERE No_Beli LIKE '1".date ('y')."%'");
$dt_count = mysql_num_rows($q_count);

$tahunbulan = "1".date ("ymd")."001";
$no_beli = (int)$tahunbulan+(int)$dt_count;

$query = mysql_query("SELECT Kode_Barang, Nama_Barang FROM barang WHERE Kode_Barang LIKE 'BB%'");
$checkbox = '';
while($dt=mysql_fetch_array($query)){
	$checkbox .= '<input type="checkbox" name="barang[]" value="'.$dt['Kode_Barang'].'" id="'.$dt['Kode_Barang'].'" onchange="add(this)">'.$dt['Nama_Barang'];
}


	if($_POST['show'] == "it"){
		/*mysql_query("INSERT INTO pembelian (No_Beli, Tanggal_Beli, Kode_Supplier,Tanggal_Input, User_Input)
			VALUES (
				'".$no_beli."',
				'".$_POST['Tanggal_Beli']."',
				'".$_POST['Kode_Supplier']."',
				'".date("Y-m-d H:i:s")."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error());
		
		
		mysql_query("INSERT INTO detail_Pembelian (Kode_Barang, No_Beli, Qty, Satuan, Harga, User_Input)
			VALUES (
				'".$_POST['Kode_Barang']."',
				'".$no_beli."',
				'".$_POST['Qty']."',
				'".$_POST['Satuan']."',
				'".$_POST['Harga']."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error());
		
		foreach ($_POST['harga'] as $key => $value) {
			echo $key." = ".$value;
		}
	*/	echo var_dump($_POST['harga']);
		// gimana caranya, dapetin harga, sesuai dengan kode_barang yang dimaksud, karena, disini sedikit random

		echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#experience'>disini</a> untuk kembali.</h3>";
	}

?>
	<html>
	<head><title></title>

			<script src="../libraries/jquery.js"></script>
		  	<script language="javascript">
				function validate()
				{
					var msg=""; 
					if(document.getElementById("No_Beli").value == ""){
					   msg += "No Beli tidak boleh kosong !\n";	
					}
					
					if(document.getElementById("Tanggal_Beli").value == ""){
					   msg += "Tanggal Beli tidak boleh kosong !\n";	
					}
					
					if(document.getElementById("Kode_Supplier").value == ""){
					   msg += "Kode Supplier tidak boleh kosong !\n";	
					}
					
					if(msg) {
						alert(msg);
						return false;  
					}else{
						return true;	   
					}		
				 }

				var i=0;
				var xmlhttp = new XMLHttpRequest();
					function add(e)
					{
					 	xmlhttp.onreadystatechange = function()
					 	{
							var hapus = e.id+"id";
				            if (this.readyState == 4 && this.status == 200)
				            {
							 	if(document.getElementById(e.id).checked == true && document.getElementById(hapus) == null)
							 	{
									i++;
									if(i == 1){
										document.getElementById("foo").remove();
										document.getElementById("table_bottom").innerHTML += this.responseText;
									}

									if(i > 1){
										document.getElementById("table_bottom").innerHTML += this.responseText;
									}
								}else{
									if(document.getElementById(e.id).checked == false)
									{
										i--;
										if(i == 0){
											document.getElementById("table_bottom").innerHTML = "<table border='1' align='center' id='table_bottom'><tr><td>Nama Barang</td><td>Jenis Barang</td><td>Qty</td><td>Harga</td></tr><tr id='foo'><td>&nbsp;</td><td></td><td></td><td></td></tr></table>";
										}
										document.getElementById(hapus).remove();
									}
								}
							}
					 	}
					 	
						xmlhttp.open("GET", "getpembelian.php?q=" + e.id, true);
						xmlhttp.send();
					}
			</script>

	</head>
	<body>
<?php 
	echo '
	<form action="" method="POST" onsubmit="return validate()">
		
		<input type="hidden" name="show" value="it" />
		
		<table border="0" align="center">

			<tr>
				<td>No Beli</td>
				<td>:</td>
				<td><input type="text" name="No_Beli" id="No_Beli" maxlength="10" value="'.$no_beli.'" /></td>
			</tr>
			<tr>
				<td>Tanggal Beli</td>
				<td>:</td>
				<td><input type="text" name="Tanggal_Beli" id="Tanggal_Beli" maxlength="15" /></td>
			</tr>
			<tr>
				<td>Kode Supplier</td>
				<td>:</td>
				<td><input type="text" name="Kode_Supplier" id="Kode_Supplier" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Kode Barang</td>
				<td>:</td>
				<td><input type="text" name="Kode_Barang" id="Kode_Barang" maxlength="15" /></td>
			</tr>
			
			
			
			<tr>
				<td>Qty</td>
				<td>:</td>
				<td><input type="text" name="Qty" id="Qty" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Satuan</td>
				<td>:</td>
				<td><input type="text" name="Satuan" id="Satuan" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td>Harga</td>
				<td>:</td>
				<td><input type="text" name="Harga" id="Harga" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td colspan="3">'.$checkbox.'</td>
			</tr>
		</table>
		
		<table border="1" align="center" id="table_bottom">
			<tr>
				<td>Nama Barang</td>
				<td>Jenis Barang</td>
				<td>Qty</td>
				<td>Harga</td>
			</tr>
			<tr id="foo">
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		</table>

		<table border="1" align="center">
			<tr>
				<td colspan="4"><input type="submit" value="ok" style="width:100%" />
			</tr>
		</table>
	</form>
		
	</body>
	</html>
	';

	echo $page;

?>