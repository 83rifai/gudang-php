<?php

require_once "../connect.php";

/* No_Jual */ 
$q_query1 = mysql_query ("SELECT No_Jual FROM jual WHERE No_Jual LIKE '2".date ('y')."%'") or die(mysql_error()." line ".__LINE__);
$dt_count1 = mysql_num_rows($q_query1);

$q_query2 = mysql_query ("SELECT No_Jual FROM history WHERE No_Jual LIKE '2".date ('y')."%'");
$dt_count2 = mysql_num_rows($q_query2);

	// jika di tahun ini tabel jual dan tabel history belum diinput
		if ($dt_count1 < 1 AND $dt_count2 < 1){
			$tahunbulan = "2".date ("ymd")."001";
		}else{
			$q_query3 =  mysql_query("SELECT No_Jual FROM jual ORDER by No_Jual DESC, No_Jual LIMIT 1");
			$dt_count3 = mysql_fetch_array($q_query3);
			
			for($i=1;;){
				
				$dt_count3['No_Jual']=$dt_count3['No_Jual']+1;
				
				$q_query4 = mysql_query("SELECT No_Jual FROM history WHERE No_Jual >='".$dt_count3['No_Jual']."' LIMIT 1");
				if (mysql_num_rows($q_query4)< 1){
					$tahunbulan =$dt_count3['No_Jual'];
					break;
				}
			}
		}
/* No_Jual */



//No_produksi
/**/ $q_query7 =  mysql_query("SELECT No_Produksi FROM produksi ORDER by No_Produksi DESC, No_Produksi LIMIT 1");
/**/$dt_count7 = mysql_fetch_array($q_query7);
/**/	IF(empty($dt_count7)){
/**/    	$dt_count7 = '3'.date('ymd').'001';
/**/	}ELSE{
/**/ 		$dt_count7['No_Produksi']=$dt_count7['No_Produksi']+1;
/**/	}
//No_produksi//

/* Id_Customer */
/**/	$queryA = mysql_query("SELECT id_customer, Nama_Customer FROM customer");
/**/
/**/	$option1 = '';
/**/	while($dtA= mysql_fetch_array($queryA)){
/**/		$option1 .= "<option value='".$dtA['id_customer']."'>".$dtA['Nama_Customer']."</option>";
/**/	}
/* Id_Customer */

/* Kode_Barang */
/**/	$queryB = mysql_query("SELECT Kode_Barang, Nama_Barang FROM barang WHERE Kode_Barang LIKE 'BJ%'");
/**/
/**/	$option2 = '';
/**/	while($dtB= mysql_fetch_array($queryB)){
/**/		$option2 .= "<option value='".$dtB['Kode_Barang']."'>".$dtB['Nama_Barang']."</option>";
/**/	}
/* Kode_Barang */

$query = mysql_query("SELECT Kode_Barang, Nama_Barang FROM barang WHERE Kode_Barang LIKE 'BJ%'");
$checkbox = '';
while($dt=mysql_fetch_array($query)){
	$checkbox .= '<input type="checkbox" name="barang[]" value="'.$dt['Kode_Barang'].'" id="'.$dt['Kode_Barang'].'">'.$dt['Nama_Barang'];
}


if($_POST['show'] == "it"){		

		
		/*  print_r ($_POST['Kode_Barang']);
	 foreach ($_POST['Kode_Barang'] as $v1) {
		 echo $v1;
	 }
	 print_r ($dt_count7);
	 foreach ($dt_count7 as $v2) {
		 echo $v2;
	 }  */
		
		   mysql_query("INSERT INTO jual (No_Jual, Tanggal_Jual, id_customer, Tanggal_Input, User_Input)
			 VALUES (
				 '".$tahunbulan."',
				 '".$_POST['Tanggal_Jual']."',
				 '".$_POST['id_customer']."',
				 '".date("Y-m-d H:i:s")."',
				 '".$_SESSION['uid']."'
			 )
		 ") or die(mysql_error()." line ".__LINE__);
		 
		
		
		//for($i=0;$_POST['Kode_Barang'][$i] != "";$i++){
			$i=0;
	    foreach ($_POST['Kode_Barang'] as $v) {	
		  if ($_POST['Kode_Barang'][$i] != "") {
			  foreach ($dt_count7 as $v2) {
				  if ($dt_count7[$i] != ""){
			
			 mysql_query("INSERT INTO detail_jual (No_Jual, Kode_Barang, No_Produksi, PO, PO_Item, Tanggal_PO, Tanggal_Pengiriman, Qty, Satuan, Harga, Item_Jual, Status, Qty_Jadi, Tanggal_Input, User_Input)
				 VALUES (
					 '".$tahunbulan."',
					 '".$_POST['Kode_Barang'][$i]."',
					 '".$dt_count7."',
					 '".$_POST['PO'][$i]."',
					 '".$_POST['PO_Item'][$i]."',
					 '".$_POST['Tanggal_PO'][$i]."',
					 '".$_POST['Tanggal_Pengiriman'][$i]."',
					 '".$_POST['Qty'][$i]."',
					 '".$_POST['Satuan'][$i]."',
					 '".$_POST['Harga'][$i]."',
					 '".$_POST['Item_Jual'][$i]."',
					 '".$_POST['Status'][$i]."',
					 '".$_POST['Qty_Jadi'][$i]."',
					 '".date("Y-m-d H:i:s")."',
					 '".$_SESSION['uid']."'
				 )
			 ") or die(mysql_error()." line ".__LINE__);
			}
			  }
				$i++;
				//$i++;
			}
		} 
			echo "<h3> Data berhasil ditambah. klik <a href='../opsi/home.php#education'>disini</a> untuk kembali.</h3>";
			
				
		};

		
		

	$page = '
	<html>
	<head><title></title>

		   <script language="javascript">
			function validate()
			{
				var msg=""; 
				if(document.getElementById("No_Jual").value == ""){
				   msg += "No Jual tidak boleh kosong !\n";	
				 }
				if (document.getElementById("Tanggal_Jual").value == ""){
				   msg += "Tanggal Jual tidak boleh kosong !\n";	
				 }
				 if (document.getElementById("id_customer").value == ""){
				   msg += "ID Customer tidak boleh kosong !\n";	
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
			
			<script src="../date/jquery.min.js"></script>
			
			<script src="../date/jquery-ui.min.js"></script>
			
			<link rel="stylesheet" href="../date/jquery-ui.css">
			
			<script src="../typeahead.min.js"></script>
						
			

			<style>
				.avoid-clicks{
					pointer-events: none;
				}
				
				.table tr td{
							padding:3px;
						}
			</style>
			';
			?>

        <script type="text/javascript">
			
			function add(){
				var id = document.getElementById("customer").value;
				alert(id);
			}
			
			function addthis(){
				alert(aa);
				//e=document.getElementById("Kode_Barang").value();
				//alert(document.getElementById("Kode_Barang").value());
				//document.getElementById("foo").remove();
				//document.getElementById("table_bottom").innerHTML += '<tr id="'+e+'id"><td><input type="text" name="kode_barang[]" value="'+e+'" /></td><td><input type="text" name="no_produksi[]" value="'.$dt2['No_Produksi'].'" style="width:100%" /></td><td><input type="text" name="po_item[]" /></td><td><input type="text" name="tanggal_pengiriman[]" /></td><td><input type="number" name="qty[]" step="1" style="width:100%" /></td><td><input type="text" name="satuan[]" step="100" size="15" /></td><td><input type="number" name="harga[]" step="100" size="15" /></td><td><input type="text" name="item_jual[]" step="100" size="15" /></td><td><input type="text" name="status[]" step="100" size="15" /></td></tr>';
			}
        </script>
			
			<?php
			echo '
	</head>
	<body>

		
		<input type="hidden" name="show" value="it" />
		
		<table border="0" align="center">

		
		<table border="1" align="center" id="table_bottom">



			<tr>
				<td colspan="11" align = "center"><b>PENJUALAN </td>
			</tr>
			
		
		
			<tr>
				<td align="left"><b>No Jual</td>
				<td align="left"><input type="text" name="No_Jual" id="No_Jual" class="avoid-clicks" maxlength="10" value="'.$tahunbulan.'" /></td>
				<td colspan="1" style="border: none; padding-right: 50px"></td>
				<td align="left"><b>PO</td>
				<td align="left"><input type="text" name="PO" id="PO" maxlength="10" /></td>
			</tr>
			
			<tr>
				<td align="left"><b>Tanggal Jual:</td>
				<td align="left"><input type="text" name="Tanggal_Jual" class="datepicker" maxlength="15" /></td>
				<td colspan="1" style="border: none; padding-right: 50px"></td>
				<td align="left"><b>Tanggal_PO</td>
				<td align="left"><input type="text" name="Tanggal_PO" id="Tanggal_PO" maxlength="10" /></td>
			</tr>
			
			<tr>
				<td align="left"><b>Nama Customer:</td>
				<td align="left">
					<select name="id_customer" id="customer" style="width:166px" onchange="add()">
						'.$option1.'
					</select>
				</td>
			</tr>
			
			<tr>
				<td align="left"><b>Kode Barang:</td>
				<td align="left">
					<input type="text" name="Kode_Barang" id="search" style="width:100%">
					<ul id="result"></ul>
				</td>
			</tr>
		
			<tr>
				<td></td>
				<td><button style="width:100%" onclick="addthis()">add</button></td>
			</tr>

		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr></tr>
				
			<tr style="text-align:center">
				<td style="padding:10px">Nama Barang</td>
				<td>No Produksi</td>
				<td>PO Item</td>
				<td>Tanggal Pengiriman</td>
				<td>Qty</td>
				<td>Satuan</td>
				<td>Harga</td>
				<td>Item Jual</td>
				<td>Status</td>
				
			</tr>
		
		
			<tr id="foo">			
				<td align="left"><input type="text" name="Kode_Barang[]"/></td>  
				<td align="left"><input type="text" name="No_Produksi[]" class="avoid-clicks" maxlength="10" style="width:100%" /></td> 
				<td align="left"><input type="text" name="PO_Item[]"/></td>  
				<td align="left"><input type="text" name="Tanggal_Pengiriman[]" class="datepicker"/></td> 
				<td align="left"><input type="text"name="Qty[]"/></td> 
				<td align="left"><input type="text"name="Satuan[]"/></td>
				<td align="left"><input type="text"name="Harga[]"/></td>
				<td align="left"><input type="text"name="Item_Jual[]"/></td>
				<td align="left"><select name="Status">
						<option value=""></option>
						<option value="Mulai">Mulai</option>
						<option value="Proses">Proses</option>
						<option value="Selesai">Selesai</option>
						</select>
				
			</tr>
			
			
			
	</table>
			
	<form action="" method="POST" onsubmit="return validate()">
	<table border="1">
		<tr>
			<td colspan="11" align="center"><input type="submit" value="ok" style="width:99%" /></td>
		</tr>
	</table>
		
		
		
		
	</form>
		
	</body>
	</html>
	';

	echo $page;
?>