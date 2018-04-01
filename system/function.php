<?php
session_start();
include "../connection.php";
error_reporting(0);

$auth = $_SESSION['CVPENUHBERKAH'];

echo $_GET['f']($conn);

function format_date($date){
	$date = new DateTime($date);
	return $date->format('Y-m-d');
}


function base_url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}

function auth($db){
	$query = $db->query("SELECT * FROM 	user where user_name = '".$_POST['username']."' AND user_password = '".$_POST['password']."' ");
	if($query == 1){
		$_SESSION['CVPENUHBERKAH'] = $query->fetch_assoc();
		return 1;
	}else{
		return 0;
	}	
}


function tambah_barang($db){
	
	$query = $db->query("INSERT INTO barang (kode_barang,nama_barang,jenis_barang,satuan,user_input,tanggal_input) 
		VALUES('".$_POST['kode_barang']."',
		'".$_POST['nama_barang']."',
		'".$_POST['jenis_barang']."',
		'".$_POST['satuan']."',
		'".$auth['user_id']."',
		'".date('Y-m-d H:m:s')."') ");
	
	if($query == 1){
		return 1;
	}else{
		return 0;
	}
	
} // end function tambah barang

function edit_barang($db){
	
	$query = $db->query("UPDATE barang SET 
		kode_barang = '".$_POST['kode_barang']."',
		nama_barang = '".$_POST['nama_barang']."',
		jenis_barang = '".$_POST['jenis_barang']."',
		satuan = '".$_POST['satuan']."',
		user_ubah = '".$auth['user_id']."',
		tanggal_ubah = '".date('Y-m-d H:m:s')."'
		WHERE
		kode_barang = '".$_POST['kode_barang']."' ");
	
	if($query == 1){
		return 1;
	}else{
		return 0;
	}
	
} // end function tambah barang

function delete_barang($db){
	$query = $db->query("DELETE FROM `barang` WHERE (`kode_barang`='".$_POST['kode_barang']."') ");
	if($query == 1){
		return 1;
	}else{
		return 0;
	}
} // end function delete barang


function tambah_customer($db){
	
	$query = $db->query("INSERT INTO barang (kode_barang,nama_barang,jenis_barang,satuan,user_input,tanggal_input) 
		VALUES('".$_POST['kode_barang']."',
		'".$_POST['nama_barang']."',
		'".$_POST['jenis_barang']."',
		'".$_POST['satuan']."',
		'".$auth['user_id']."',
		'".date('Y-m-d H:m:s')."') ");
	
	if($query == 1){
		return 1;
	}else{
		return 0;
	}
	
} // end function tambah customer

function edit_customer($db){
	
	$query = $db->query("UPDATE barang SET 
		kode_barang = '".$_POST['kode_barang']."',
		nama_barang = '".$_POST['nama_barang']."',
		jenis_barang = '".$_POST['jenis_barang']."',
		satuan = '".$_POST['satuan']."',
		user_ubah = '".$auth['user_id']."',
		tanggal_ubah = '".date('Y-m-d H:m:s')."'
		WHERE
		kode_barang = '".$_POST['kode_barang']."' ");
	
	if($query == 1){
		return 1;
	}else{
		return 0;
	}
	
} // end function tambah customer

function delete_customer($db){
	$query = $db->query("DELETE FROM `barang` WHERE (`kode_barang`='".$_POST['kode_barang']."') ");
	if($query == 1){
		return 1;
	}else{
		return 0;
	}
} // end function delete customer


function tambah_supplier($db){
	
	$query = $db->query("INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `contact_person`, `alamat`, `user_input`, `tanggal_input`) 
		VALUES (
		'".$_POST['Kode_Supplier']."', 
		'".$_POST['Nama_Supplier']."', 
		'".$_POST['Contact_Person']."', 
		'".$_POST['Alamat']."', 
		'".$auth['user_id']."'
		'".date('Y-m-d H:m:s')."') ");
	
	if($query == 1){
		return "true";
	}else{
		return "false";
	}
	
} // end function tambah barang


function delete_supplier($db){
	
	$query = $db->query("DELETE FROM supplier WHERE kode_supplier = '".$_POST['kode_supplier']."' ");
	
	if($query == 1){
		return 1;
	}else{
		return 0;
	}
	
} // end function tambah barang


function tambah_pembelian($db){

	$query = $db->query("INSERT INTO `pembelian` (`no_beli`,`tanggal_beli`,`kode_supplier`,`tanggal_input`,`user_input`)
		VALUES('".$_POST['no_pembelian']."','".format_date($_POST['tanggal'])."','".$_POST['supplier']."','".date('Y-m-d H:m:s')."','".$auth['user_id']."')
		");

	if($query === 1){
		$params = $_POST['params'];
		$queryDetail = '';

		for ($i=0; $i < count($params); $i++) { 
			if($params[$i]){
			$queryDetail = $db->query("INSERT INTO `detail_pembelian` (`kode_barang`,`no_beli`,`harga`,`qty`,`satuan`,`tanggal_input`,`user_input`) 
				VALUES 
				('".$params[$i]['kode_barang']."','".$_POST['no_pembelian']."','".$params[$i]['harga']."','".$params[$i]['qty']."','".$params[$i]['satuan']."','".date('Y-m-d H:m:s')."','".$auth['user_id']."') ");
			}
		}

		if($queryDetail === 1){
			return 1;
		}else{
			return 0;
		}
	}else{
		return 0;
	}

	

} // end function pembelian

function tambah_penjualan($db){

	$query = $db->query("INSERT INTO `pembelian` (`No_Beli`,`Tanggal_Beli`,`Kode_Supplier`,`Tanggal_Input`,`User_Input`)
		VALUES('".$_POST['no_pembelian']."','".format_date($_POST['tanggal'])."','".$_POST['supplier']."','".date('Y-m-d H:m:s')."','".$auth['User_Id']."')
		");

	if($query === 1){
		$params = $_POST['params'];
		$queryDetail = '';

		for ($i=0; $i < count($params); $i++) { 
			if($params[$i]){
				$queryDetail = $db->query("INSERT INTO `detail_pembelian` (`Kode_Barang`,`No_Beli`,`Harga`,`QTY`,`Satuan`,`Tanggal_Input`,`User_Input) 
				VALUES 
				('".$params[$i]['kode_barang']."','".$_POST['no_pembelian']."','".$params[$i]['harga']."','".$params[$i]['qty']."','".$params[$i]['satuan']."','".date('Y-m-d H:m:s')."','PB_002') ");
			}		
		}

		if($queryDetail === 1){
			return 1;
		}else{
			return 0;
		}
	}else{
		return 0;
	}

	

} // end function pembelian

function get_detail_penjualan($db){

	$query = $db->query("SELECT * FROM detail_jual ");

	$result = $query->fetch_array();

	echo json_encode($result);
}

?>

