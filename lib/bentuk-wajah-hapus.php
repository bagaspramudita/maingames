<?php
include '../config.php';
$id 				= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM bentuk_wajah
			  		WHERE bentuk_id = '$id'
			  		");

if($kueri) {
	header('location:../bentuk-wajah.php?act=sukses');
} else {
	header('location:../bentuk-wajah.php?act=gagal');
}
?>