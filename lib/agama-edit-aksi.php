<?php
include '../config.php';
$id 		= $_POST['id'];
$agama 	 	= $_POST['agama'];

$kueri 		= mysqli_query($conn,"
			  UPDATE agama
			  SET agama 	= '$agama'
			  WHERE id 		= '$id'
			  ");

if($kueri) {
	header('location:../agama.php?act=sukses');
} else {
	header('location:../agama.php?act=gagal');
}
?>