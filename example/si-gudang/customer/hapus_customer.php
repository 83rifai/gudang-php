<?php
	
	require_once ("../connect.php");
    
	mysql_query("DELETE FROM customer WHERE id_customer='".$_GET['id_customer']."'");
    echo "<h3> Data berhasil dihapus. klik <a href='../opsi/home.php#interests'>disini</a> untuk kembali.</h3>";
?>