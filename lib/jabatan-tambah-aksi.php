<?php
include '../config.php';
$jabatan		= $_POST['jabatan'];

$kueri 			= mysqli_query($conn,"
				  INSERT INTO jabatan (jabatan_id,jabatan) 
				  VALUES ('','$jabatan')");

if($kueri) {
	header('location:../jabatan.php?act=sukses');
} else {
	header('location:../jabatan.php?act=gagal');
}
?>