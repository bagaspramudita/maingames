<?php
include '../config.php';
$bentuk_wajah		= $_POST['bentuk_wajah'];

$kueri 		= mysqli_query($conn,"
			  INSERT INTO bentuk_wajah (id,bentuk) 
			  VALUES ('','$bentuk_wajah')");

if($kueri) {
	header('location:../bentuk-wajah.php?act=sukses');
} else {
	header('location:../bentuk-wajah.php?act=gagal');
}
?>