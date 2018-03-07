<?php 
session_start();
include 'connect.php';
$uname=$_GET['User_Name'];
$pass=$_GET['User_Password'];
$query=mysql_query("SELECT * FROM user WHERE User_Name='$uname' and User_Password='$pass'")or die(mysql_error());
if(mysql_num_rows($query)==1){
	$query2 = mysql_query("SELECT User_Id FROM user WHERE User_Name='".$uname."'");
	$data = mysql_fetch_array($query2);
	$_SESSION['uname']=$uname;
	$_SESSION['uid']=$data['User_Id'];
	header("location:opsi/home.php");
}else{
	header("location:index.php?alert=gagal")or die(mysql_error()." line ".__LINE__);
}
?>