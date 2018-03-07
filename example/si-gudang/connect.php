<?php

$koneksi= mysql_connect("localhost", "root", "");
$koneksi_database= mysql_select_db("sistem_informasi", $koneksi);
if (!$koneksi_database)
  {
  die('Database tidak terkoneksi : ' . mysql_error());
  }
  error_reporting (E_ALL ^ (E_NOTICE| E_WARNING));
// some code

session_start();

// login dibawah masih salah
if(empty($_SESSION['uid'])){
	if(file_exists("index.php")){	
		header("Location: ./");
	}elseif(file_exists("../index.php")){
		header("Location: ../");
	}else{
		echo "where is LOGIN???";
	}
}

?> 