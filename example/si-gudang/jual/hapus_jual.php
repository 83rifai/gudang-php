<?php
	
	require_once ("../connect.php");
	
	$query = mysql_query ("SELECT No_Jual FROM detail_jual WHERE No_Jual='".$_GET['No_Jual']."'");//or die(mysql_error()." line ".__LINE__);
	$dt = mysql_fetch_array($query);
	
	if(mysql_num_rows($query) < 1) {
		header ("Location:../opsi/home.php#education");
	}
	
	echo var_dump($query);
	mysql_query("DELETE FROM detail_produksi WHERE No_Produksi='".$dt['No_Produksi']."'") or die(mysql_error()." line ".__LINE__);
	mysql_query("DELETE FROM detail_jual WHERE No_Jual='".$dt['No_Jual']."'") or die(mysql_error()." line ".__LINE__);
	mysql_query("DELETE FROM produksi WHERE No_Produksi='".$dt['No_Produksi']."'") or die(mysql_error()." line ".__LINE__);
	mysql_query("DELETE FROM jual WHERE No_Jual='".$dt['No_Jual']."'") or die(mysql_error()." line ".__LINE__);

	
	//hapus jual, hapus produksi?
    echo "<h3> Data berhasil dihapus. klik <a href='../opsi/home.php#education'>disini</a> untuk kembali.</h3>";
?>