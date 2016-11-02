<?php
include '../config.php';
$lowongan 			= $_POST['lowongan'];
$deskripsi 			= $_POST['deskripsi'];
$qty 				= $_POST['qty'];

$kueri 		= mysqli_query($conn,"
						  INSERT INTO lowongan(lowongan_id, nama_lowongan, deskripsi, qty, status)
						  VALUES ('','$lowongan','$deskripsi','$qty','1')
						  ");

if($kueri) {
	header('location:../lowongan.php?act=sukses');
} else {
	header('location:../lowongan.php?act=gagal');
}
?>