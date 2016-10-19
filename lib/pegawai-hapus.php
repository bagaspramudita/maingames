<?php
include '../config.php';
$id 	 			= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM user
			  		WHERE id = '$id'
			  		");

if($kueri) {
	header('location:../pegawai.php?act=sukses');
} else {
	header('location:../pegawai.php?act=gagal');
}
?>