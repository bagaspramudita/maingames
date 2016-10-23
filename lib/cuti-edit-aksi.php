<?php
include '../config.php';
$id 					= $_POST['id'];
$jumlah 				= $_POST['jumlah'];
$tahun 	 				= $_POST['tahun'];

$kueri 					= mysqli_query($conn,"
						  UPDATE cuti SET
						  jumlah_cuti		= '$jumlah',
						  tahun 			= '$tahun'
						  WHERE cuti_id 	= '$id'
						  ");
if($kueri) {
	header('location:../cuti.php?act=sukses');
} else {
	header('location:../cuti.php?act=gagal');
}
?>