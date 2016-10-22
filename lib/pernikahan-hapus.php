<?php
include '../config.php';
$id 	 			= abs($_GET['id']);

$kueri 				= mysqli_query($conn,"
			  		DELETE FROM suami_istri
			  		WHERE user_id = '$id'
			  		");

if($kueri) {
	header('location:../pernikahan.php?act=sukses');
} else {
	header('location:../pernikahan.php?act=gagal');
}
?>