<?php
include '../config.php';
$id 					= $_GET['id'];

$kueri 					= mysqli_query($conn,"
						  UPDATE log_cuti SET
						  status 				= 2 
						  WHERE log_id 			= '$id'
						  ");
if($kueri) {
	header('location:../permintaan-cuti.php?act=sukses');
} else {
	header('location:../permintaan-cuti.php?act=gagal');
}
?>