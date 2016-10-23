<?php
include '../config.php';
$id 					= $_POST['id'];
$jumlah 				= $_POST['jumlah'];
$tahun 	 				= $_POST['tahun'];

$kueri 					= mysqli_query($conn,"
						  INSERT INTO cuti(
						  cuti_id,
						  user_id,
						  jumlah_cuti,
						  tahun
						  )
						  VALUES (
						  '',
						  '$id',
						  '$jumlah',
						  '$tahun'
						  )
						  ");
if($kueri) {
	header('location:../cuti.php?act=sukses');
} else {
	header('location:../cuti.php?act=gagal');
}
?>