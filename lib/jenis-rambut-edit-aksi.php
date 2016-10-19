<?php
include '../config.php';
$id 				= $_POST['id'];
$jenis_rambut	 	= $_POST['jenis_rambut'];

$kueri 				= mysqli_query($conn,"
					  UPDATE jenis_rambut
					  SET jenis 	= '$jenis_rambut'
					  WHERE id 		= '$id'
					  ");

if($kueri) {
	header('location:../jenis-rambut.php?act=sukses');
} else {
	header('location:../jenis-rambut.php?act=gagal');
}
?>