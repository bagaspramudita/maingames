<?php
include '../config.php';
error_reporting(0);
$id 					= $_POST['id'];
$sebagai 				= $_POST['sebagai'];
$pasangan 				= $_POST['pasangan'];
$tgl_lahir 				= $_POST['tgl_lahir'];
$bln_lahir 				= $_POST['bln_lahir'];
$thn_lahir 				= $_POST['thn_lahir'];
$tanggal_menikah 		= $_POST['tanggal_menikah'];
$bulan_menikah 			= $_POST['bulan_menikah'];
$tahun_menikah 			= $_POST['tahun_menikah'];
$jumlah_anak 			= $_POST['jumlah_anak'];

$kueri 					= mysqli_query($conn,"
						  UPDATE suami_istri SET
						  sebagai				= '$sebagai',
						  suami_istri			= '$pasangan',
						  tgl_lahir 	 		= '$tgl_lahir',
						  bln_lahir  			= '$bln_lahir',
						  thn_lahir 			= '$thn_lahir',
						  tanggal_menikah 		= '$tanggal_menikah',
						  bulan_menikah 		= '$bulan_menikah',
						  tahun_menikah 		= '$tahun_menikah',
						  jumlah_anak 			= '$jumlah_anak'
						  WHERE user_id = '$id'
						  ");
if($kueri) {
	header('location:../pernikahan.php?act=sukses');
} else {
	header('location:../pernikahan.php?act=gagal');
}
?>