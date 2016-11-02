<?php
include '../config.php';
$id 					= $_GET['id'];

$kueri 					= mysqli_query($conn,"
						  UPDATE klaim
						  SET status 			= 3 
						  WHERE klaim_id		= '$id'
						  ");
if($kueri) {
	header('location:../permintaan-klaim.php?act=sukses');
} else {
	header('location:../permintaan-klaim.php?act=gagal');
}
?>