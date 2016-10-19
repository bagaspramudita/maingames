<?php
include '../config.php';
$id 				= $_POST['id'];
$bentuk_wajah 	 	= $_POST['bentuk_wajah'];

$kueri 				= mysqli_query($conn,"
					  UPDATE bentuk_wajah
					  SET bentuk 	= '$bentuk_wajah'
					  WHERE id 		= '$id'
					  ");

if($kueri) {
	header('location:../bentuk-wajah.php?act=sukses');
} else {
	header('location:../bentuk-wajah.php?act=gagal');
}
?>