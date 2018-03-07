<?php
	
	require_once ("../connect.php");
    
	mysql_query("DELETE FROM detail_pembelian WHERE No_Beli='".$_GET['No_Beli']."' AND Kode_Barang='".$_GET['Kode_Barang']."'")or die(mysql_error());
	mysql_query("DELETE FROM pembelian WHERE No_Beli=".$_GET['No_Beli']) or die(mysql_error());
    echo "<h3> Data berhasil dihapus. klik <a href='../opsi/home.php#experience'>disini</a> untuk kembali.</h3>";
?>