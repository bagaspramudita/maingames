<?php
include '../config.php';
$id 				= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM cuti
			  		WHERE cuti_id = '$id'
			  		");

if($kueri) {
	header('location:../cuti.php?act=sukses');
} else {
	header('location:../cuti.php?act=gagal');
}
?>