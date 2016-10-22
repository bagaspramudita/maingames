<?php
include '../config.php';
$id 	 			= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM jenis_rambut
			  		WHERE jenis_id = '$id'
			  		");

if($kueri) {
	header('location:../jenis-rambut.php?act=sukses');
} else {
	header('location:../jenis-rambut.php?act=gagal');
}
?>