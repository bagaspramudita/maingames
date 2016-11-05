<?php
include '../config.php';
$agama		= $_POST['agama'];
$kueri 		= mysqli_query($conn,"
			  INSERT INTO agama (agama_id,agama) 
			  VALUES ('','$agama')
			  ");

if($kueri) {
	header('location:../agama.php?act=sukses');
} else {
	header('location:../agama.php?act=gagal');
}
?>