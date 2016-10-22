<?php
include '../config.php';
$id 				= $_POST['id'];
$status_pegawai	 	= $_POST['status_pegawai'];

$kueri 				= mysqli_query($conn,"
					  UPDATE status_pegawai
					  SET status_pegawai 	 		= '$status_pegawai'
					  WHERE status_id 				= '$id'
					  ");

if($kueri) {
	header('location:../status-pegawai.php?act=sukses');
} else {
	header('location:../status-pegawai.php?act=gagal');
}
?>