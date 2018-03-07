<?php

require_once "../connect.php";

//No_Beli 
	$q_count = mysql_query ("SELECT No_Beli FROM pembelian WHERE No_Beli LIKE '1".date ('y')."%'");
	$dt_count = mysql_num_rows($q_count);


	$tahunbulan = "1".date ("ymd")."001";
	$no_beli = (int)$tahunbulan+(int)$dt_count;


//No_Beli//



/* Kode_Supplier */
/**/	$queryA = mysql_query("SELECT Kode_Supplier, Nama_Supplier FROM supplier");
/**/
/**/	$option1 = '';
/**/	while($dtA= mysql_fetch_array($queryA)){
/**/		$option1 .= "<option value='".$dtA['Kode_Supplier']."'>".$dtA['Nama_Supplier']."</option>";
/**/	}
/* Kode_Supplier */

/* Kode_Barang */
/**/	$queryA = mysql_query("SELECT Kode_Barang, Nama_Barang FROM barang");
/**/
/**/	$option2 = '';
/**/	while($dtA= mysql_fetch_array($queryA)){
/**/		$option2 .= "<option value='".$dtA['Kode_Barang']."'>".$dtA['Nama_Barang']."</option>";
/**/	}
/* Kode_Supplier */


session_start();



	if($_POST['show'] == "it"){	

	 //print_r ($_POST['Kode_Barang']);
	 //foreach ($_POST['Kode_Barang'] as $v1) {
	//	 echo $v1;
	// }
		 mysql_query("INSERT INTO pembelian (No_Beli, Tanggal_Beli, Kode_Supplier, Tanggal_Input, User_Input)
			VALUES (
				'".$no_beli."',
				'".$_POST['Tanggal_Beli']."',
				'".$_POST['Kode_Supplier']."',
				'".date("Y-m-d H:i:s")."',
				'".$_SESSION['uid']."'
			)
		") or die(mysql_error()." line ".__LINE__);
		
		//for($i=0;$_POST['Kode_Barang'][$i] != "";$i++){
			$i=0;
	    foreach ($_POST['Kode_Barang'] as $v) {	
		  if ($_POST['Kode_Barang'][$i] != "") {
			mysql_query("INSERT INTO detail_Pembelian (Kode_Barang, No_Beli, Qty, Satuan, Harga, Tanggal_Input, User_Input)
				VALUES (
					'".$_POST['Kode_Barang'][$i]."',
					'".$no_beli."',
					'".$_POST['Qty'][$i]."',
					'".$_POST['Satuan'][$i]."',
					'".$_POST['Harga'][$i]."',
					'".date("Y-m-d H:i:s")."',
					'".$_SESSION['uid']."'
				)
				
			") or die(mysql_error()." line ".__LINE__);
			
			
			$qty=$_POST['Qty'][$i];
			mysql_query("UPDATE barang SET 
				Qty_Stok =Qty_Stok+$qty WHERE Kode_Barang='".$_POST['Kode_Barang'][$i]."'
				
			
				
			") or die(mysql_error()." line ".__LINE__);	
		  }	
		  $i++;
		}
		
		echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#experience'>disini</a> untuk kembali.</h3>";
	}

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if(document.getElementById("No_Beli").value == ""){
				   msg += "No Beli tidak boleh kosong !\n";	
				 }
				if (document.getElementById("Tanggal_Beli").value == ""){
				   msg += "Tanggal Beli tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("Kode_Supplier").value == ""){
				   msg += "Kode Supplier tidak boleh kosong !\n";	
				 }
				 if (msg) {
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
	

	<form action="" method="POST" onsubmit="return validate()">
		
		<input type="hidden" name="show" value="it" />
		
		<table border="0" align="center">

		<table border="1" align="center">


			<tr>
				<td colspan="6" align = "center"><b>Pembelian</td>
			</tr>
			
			<tr>
			<tr>
		
				<td align="left"><b>No Beli</td>
				<td align="left"><input type="text" name="No_Beli" id="No_Beli" maxlength="10" value="'.$no_beli.'" /></td>
			</tr>
			
			<tr>
				<td align="left"><b>Tanggal Beli:</td>
				<td align="left"><input type="text" name="Tanggal_Beli" class="datepicker" maxlength="15" /></td>
			</tr>
			
			<tr>
				<td align="left"><b>Nama Supplier:</td>
				<td align="left">
					<select name="Kode_Supplier" id="Kode_Supplier" style="width:166px">
						<option value=""></option>
							'.$option1.'
					</select>
				</td>
			</tr>
			
			<tr style="text-align:center">
				<td style="padding:10px">Nama Barang</td>
				<td>Qty</td>
				<td>Harga</td>
				<td>Satuan</td>
			</tr>
			
			<tr>			
				<td align="left">
					<select name="Kode_Barang[]" id="Kode_Barang" style="width:166px">
						<option value=""></option>
						'.$option2.'
					</select>
				</td> 
				<td align="left"><input type="text"name="Qty[]"/></td> 
				<td align="left"><input type="text"name="Harga[]"/></td> 
				<td align="left"><input type="text"name="Satuan[]"/></td>			
			</tr>
			
			<tr>			
				<td align="left">
					<select name="Kode_Barang[]" id="Kode_Barang" style="width:166px">
						<option value=""></option>
						'.$option2.'
					</select>
				</td> 
				<td align="left"><input type="text"name="Qty[]"/></td> 
				<td align="left"><input type="text"name="Harga[]"/></td> 
				<td align="left"><input type="text"name="Satuan[]"/></td> 
			</tr>
			
			<tr>			
				<td align="left">
					<select name="Kode_Barang[]" id="Kode_Barang" style="width:166px">
						<option value=""></option>
						'.$option2.'
					</select>
				</td> 
				<td align="left"><input type="text"name="Qty[]"/></td> 
				<td align="left"><input type="text"name="Harga[]"/></td> 
				<td align="left"><input type="text"name="Satuan[]"/></td> 
			</tr>
			
			<tr>			
				<td align="left">
					<select name="Kode_Barang[]" id="Kode_Barang" style="width:166px">
						<option value=""></option>
						'.$option2.'
					</select>
				</td> 
				<td align="left"><input type="text"name="Qty[]"/></td> 
				<td align="left"><input type="text"name="Harga[]"/></td> 
				<td align="left"><input type="text"name="Satuan[]"/></td>
			</tr>
			
			<tr>			
				<td align="left">
					<select name="Kode_Barang[]" id="Kode_Barang" style="width:166px">
						<option value=""></option>
						'.$option2.'
					</select>
				</td> 
				<td align="left"><input type="text"name="Qty[]"/></td> 
				<td align="left"><input type="text"name="Harga[]"/></td> 
				<td align="left"><input type="text"name="Satuan[]"/></td>
			</tr>
			
			<tr>			
				<td align="left">
					<select name="Kode_Barang[]" id="Kode_Barang" style="width:166px">
						<option value=""></option>
						'.$option2.'
					</select>
				</td> 
				<td align="left"><input type="text"name="Qty[]"/></td> 
				<td align="left"><input type="text"name="Harga[]"/></td> 
				<td align="left"><input type="text"name="Satuan[]"/></td>	
			</tr>
			
			
			
			
				
			<td colspan="8" align="center"><input type="submit" value="ok" style="width:99%" /></td>
		
	</table>
	</form>	
		
	</body>
	</html>
	';

	echo $page;
?>


