<?php

require_once "../connect.php";
	
	

	$key=$_GET['q'];
    $array = array();
    $query=mysql_query("SELECT * FROM barang WHERE Kode_Barang LIKE '%$key%'");
	
	
    //while($row=mysql_fetch_assoc($query))
    //{
    //  $array[] = $row['title'];
   // }
   // echo json_encode($array);
	
	$found=mysql_num_rows($query);
	
	if($found>0){
    while($row=mysql_fetch_array($query)){
    echo "<li>".$row['Kode_Barang']."</br>
           </li>";
    }   
	}else{
		echo "<li>Tidak ada artikel yang ditemukan <li>";
	}
 
/*	
	$q = mysql_query("SELECT Kode_Barang, Nama_Barang, Jenis_Barang FROM barang WHERE Kode_Barang='".$query_string."'");
	$dt = mysql_fetch_array($q);
	
	$q2 = mysql_query("SELECT No_Produksi FROM produksi ORDER BY No_Produksi DESC, No_Produksi LIMIT 1");
	$dt2= mysql_fetch_array($q2);
	
	if($i == 0)$i++;
	$dt2['No_Produksi']+=$i;
	
	echo '<tr id="'.$dt['Kode_Barang'].'id">
			<td><input type="text" name="kode_barang[]" value="'.$dt['Nama_Barang'].'" /></td>
			<td><input type="text" name="no_produksi[]" value="'.$dt2['No_Produksi'].'" style="width:100%" /></td>
			<td><input type="text" name="po_item[]" /></td>
			<td><input type="text" name="tanggal_pengiriman[]" /></td>
			<td><input type="number" name="qty[]" step="1" style="width:100%" /></td>
			<td><input type="text" name="satuan[]" step="100" size="15" /></td>
			<td><input type="number" name="harga[]" step="100" size="15" /></td>
			<td><input type="text" name="item_jual[]" step="100" size="15" /></td>
			<td><input type="text" name="status[]" step="100" size="15" /></td>
		</tr>';
*/

?>