<?php
	
	require_once ("../connect.php");
    
	mysql_query("DELETE FROM supplier WHERE Kode_Supplier='".$_GET['Kode_Supplier']."'");
    echo "<h3> Data berhasil dihapus. klik <a href='../opsi/home.php#awards'>disini</a> untuk kembali.</h3>";
?>