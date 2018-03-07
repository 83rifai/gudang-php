<?php

include "../connection.php";

echo $_GET['f']($conn);

function tambah_barang($db){
	
	$query = $db->query("INSERT INTO barang (Kode_Barang,Nama_Barang,Jenis_Barang,Satuan,User_Input,Tanggal_Input) 
		VALUES('".$_POST['kode_barang']."',
		'".$_POST['nama_barang']."',
		'".$_POST['jenis_barang']."',
		'".$_POST['satuan']."',
		'PB_002',
		'".date('Y-m-d H:m:s')."') ");
	
	if($query == 1){
		return "true";
	}else{
		return "false";
	}
	
} // end function tambah barang

function delete_barang($db){
	$query = $db->query("DELETE FROM `barang` WHERE (`Kode_Barang`='".$_POST['kode_barang']."') ");

	if($query == 1){
		return "true";
	}else{
		return "false";
	}
} // end function delete barang

?>

