<?php
session_start();
include "../connection.php";
error_reporting(0);

echo $_GET['f']($conn);


function base_url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}

function auth($db){
	$query = $db->query("SELECT * FROM 	USER where User_Name = 'tuti' AND User_Password = 'tuti' ");

	if($query == 1){
		$_SESSION['CVPENUHBERKAH'] = $query->fetch_assoc();
		return 'true';
	}else{
		return 'false';
	}	
}

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

function edit_barang($db){
	
	$query = $db->query("UPDATE barang SET 
		Kode_Barang = '".$_POST['kode_barang']."',
		Nama_Barang = '".$_POST['nama_barang']."',
		Jenis_Barang = '".$_POST['jenis_barang']."',
		Satuan = '".$_POST['satuan']."',
		User_Ubah = 'PB_002',
		Tanggal_Ubah = '".date('Y-m-d H:m:s')."'
		WHERE
		Kode_Barang= '".$_POST['kode_barang']."' ");
	
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


function tambah_supplier($db){
	
	$query = $db->query("INSERT INTO `supplier` (`Kode_Supplier`, `Nama_Supplier`, `Contact_Person`, `Alamat`, `User_Input`, `Tanggal_Input`) 
		VALUES (
		'".$_POST['Kode_Supplier']."', 
		'".$_POST['Nama_Supplier']."', 
		'".$_POST['Contact_Person']."', 
		'".$_POST['Alamat']."', 
		'PB_002'
		'".date('Y-m-d H:m:s')."') ");
	
	if($query == 1){
		return "true";
	}else{
		return "false";
	}
	
} // end function tambah barang


function delete_supplier($db){
	
	$query = $db->query("DELETE FROM supplier WHERE Kode_Supplier = '".$_POST['kode_supplier']."' ");
	
	if($query == 1){
		return "true";
	}else{
		return "false";
	}
	
} // end function tambah barang
?>

