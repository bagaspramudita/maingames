<?php
include '../config.php';
$id 	 			= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM log_cuti
			  		WHERE log_id = '$id'
			  		");

if($kueri) {
	header('location:../pengajuan-cuti.php?act=sukses');
} else {
	header('location:../pengajuan-cuti.php?act=gagal');
}
?>