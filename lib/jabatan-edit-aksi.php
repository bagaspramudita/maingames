<?php
include '../config.php';
$id 				= $_POST['id'];
$jabatan	 	 	= $_POST['jabatan'];

$kueri 				= mysqli_query($conn,"
					  UPDATE jabatan
					  SET jabatan 			= '$jabatan'
					  WHERE jabatan_id 		= '$id'
					  ");

if($kueri) {
	header('location:../jabatan.php?act=sukses');
} else {
	header('location:../jabatan.php?act=gagal');
}
?>