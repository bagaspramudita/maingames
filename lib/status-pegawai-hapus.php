<?php
include '../config.php';
$id 	 			= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM status_pegawai
			  		WHERE status_id = '$id'
			  		");

if($kueri) {
	header('location:../status-pegawai.php?act=sukses');
} else {
	header('location:../status-pegawai.php?act=gagal');
}
?>