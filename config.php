<?php
error_reporting(E_ALL);
$host		= "localhost";
$user		= "root";
$pass		= "";
$db			= "maingames";

$conn		= mysqli_connect($host,$user,$pass,$db);

if(!$conn) {
	echo "Tidak Terhubung dengan Server";
	die();
}
?>