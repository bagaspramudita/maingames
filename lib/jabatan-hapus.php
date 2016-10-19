<?php
include '../config.php';
$jabatan			= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM jabatan
			  		WHERE id = '$jabatan'
			  		");

if($kueri) {
	header('location:../jabatan.php?act=sukses');
} else {
	header('location:../jabatan.php?act=gagal');
}
?>