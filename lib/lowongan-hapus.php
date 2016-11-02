<?php
include '../config.php';
$id 				= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM lowongan
			  		WHERE lowongan_id = '$id'
			  		");

if($kueri) {
	header('location:../lowongan.php?act=sukses');
} else {
	header('location:../lowongan.php?act=gagal');
}
?>