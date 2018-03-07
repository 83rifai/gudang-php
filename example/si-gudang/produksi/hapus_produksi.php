<?php
	
	require_once ("../connect.php");
    
	mysql_query("DELETE FROM produksi WHERE No_Produksi='".$_GET['No_Produksi']."'");
    echo "<h3> Data berhasil dihapus. klik <a href='../opsi/home.php#skills'>disini</a> untuk kembali.</h3>";
?>