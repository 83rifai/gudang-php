<?php
	
	require_once ("../connect.php");
    
	mysql_query("DELETE FROM stok WHERE Kode_Barang='".$_GET['Kode_Barang']."'");
    echo "<h3> Data berhasil dihapus. klik <a href='../opsi/home.php#datahistory'>disini</a> untuk kembali.</h3>";
?>