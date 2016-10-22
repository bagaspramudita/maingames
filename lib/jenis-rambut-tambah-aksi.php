<?php
include '../config.php';
$jenis_rambut		= $_POST['jenis_rambut'];

$kueri 				= mysqli_query($conn,"
					  INSERT INTO jenis_rambut (jenis_id,jenis) 
					  VALUES ('','$jenis_rambut')
					  ");

if($kueri) {
	header('location:../jenis-rambut.php?act=sukses');
} else {
	header('location:../jenis-rambut.php?act=gagal');
}
?>