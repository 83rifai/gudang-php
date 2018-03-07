<?php
	
	require_once ("../connect.php");
    
	mysql_query("DELETE FROM user WHERE User_Id='".$_GET['User_Id']."'");
    echo "<h3> Data berhasil dihapus. klik <a href='../user.php'>disini</a> untuk kembali.</h3>";
?>