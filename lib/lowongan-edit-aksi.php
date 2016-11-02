<?php
include '../config.php';
error_reporting(0);
$id 					= $_POST['id'];
$nama_lowongan 			= $_POST['lowongan'];
$deskripsi 				= $_POST['deskripsi'];
$qty 					= $_POST['qty'];

$kueri 					= mysqli_query($conn,"
						  UPDATE lowongan SET
						  nama_lowongan			= '$nama_lowongan',
						  deskripsi 			= '$deskripsi',
						  qty 					= '$qty'
						  WHERE lowongan_id 	= '$id'
						  ");
if($kueri) {
	header('location:../lowongan.php?act=sukses');
} else {
	header('location:../lowongan.php?act=gagal');
}
?>