<?php
	
	require_once ("../connect.php");
    
	mysql_query("DELETE FROM pendataan_fisik WHERE Tanggal='".$_GET['Tanggal']."'");
    echo "<h3> Data berhasil dihapus. klik <a href='../opsi/home.php#datahistory'>disini</a> untuk kembali.</h3>";
?>