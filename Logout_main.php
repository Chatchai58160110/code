<?
include"Db_connect.php";
session_start();
ob_start();

echo "Logouting...";

session_start();
session_destroy();

echo"<meta http-equiv='refresh' content='1;url=Homepage.php' >";
	
?>