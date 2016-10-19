<?php
include '../config.php';
$bentuk_wajah		= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM bentuk_wajah
			  		WHERE id = '$bentuk_wajah'
			  		");

if($kueri) {
	header('location:../bentuk-wajah.php?act=sukses');
} else {
	header('location:../bentuk-wajah.php?act=gagal');
}
?>