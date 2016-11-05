<?php
include '../config.php';
$agama		= abs($_GET['id']);

$kueri 		= mysqli_query($conn,"
			  DELETE FROM agama
			  WHERE agama_id = '$agama'
			  ");

if($kueri) {
	header('location:../agama.php?act=sukses');
} else {
	header('location:../agama.php?act=gagal');
}
?>