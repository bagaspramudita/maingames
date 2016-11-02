<?php
include '../config.php';
$id 	 			= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM klaim
			  		WHERE klaim_id = '$id'
			  		");

if($kueri) {
	header('location:../pengajuan-klaim.php?act=sukses');
} else {
	header('location:../pengajuan-klaim.php?act=gagal');
}
?>