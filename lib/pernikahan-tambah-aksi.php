<?php
include '../config.php';
$id 					= $_POST['pegawai'];
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
						  INSERT INTO suami_istri(user_id,sebagai,suami_istri,tgl_lahir,bln_lahir,thn_lahir,tanggal_menikah,bulan_menikah,tahun_menikah,jumlah_anak)
						  VALUES (
						  '$id',
						  '$sebagai',
						  '$pasangan',
						  '$tgl_lahir',
						  '$bln_lahir',
						  '$thn_lahir',
						  '$tanggal_menikah',
						  '$bulan_menikah',
						  '$tahun_menikah',
						  '$jumlah_anak'
						  )
						  ");
if($kueri) {
	header('location:../pernikahan.php?act=sukses');
} else {
	header('location:../pernikahan.php?act=gagal');
}
?>