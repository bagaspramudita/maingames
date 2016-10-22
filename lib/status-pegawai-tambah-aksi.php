<?php
include '../config.php';
$status_pegawai		= $_POST['status_pegawai'];

$kueri 				= mysqli_query($conn,"
					  INSERT INTO status_pegawai (status_id,status_pegawai) 
					  VALUES ('','$status_pegawai')
					  ");

if($kueri) {
	header('location:../status-pegawai.php?act=sukses');
} else {
	header('location:../status-pegawai.php?act=gagal');
}
?>