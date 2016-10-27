<?php
include '../config.php';
$id 						= $_POST['id'];
$cuti_tahunan 				= $_POST['cuti_tahunan'];
$cuti_menikah 				= $_POST['cuti_menikah'];
$cuti_sakit 				= $_POST['cuti_sakit'];
$cuti_keluarga_meninggal	= $_POST['cuti_keluarga_meninggal'];
$cuti_melahirkan			= $_POST['cuti_melahirkan'];
$tahun 						= $_POST['tahun'];

$kueri 					= mysqli_query($conn,"
						  INSERT INTO cuti(
						  cuti_id,
						  user_id,
						  cuti_tahunan,
						  cuti_menikah,
						  cuti_sakit,
						  cuti_keluarga_meninggal,
						  cuti_melahirkan,
						  tahun
						  )
						  VALUES (
						  '',
						  '$id',
						  '$cuti_tahunan',
						  '$cuti_menikah',
						  '$cuti_sakit',
						  '$cuti_keluarga_meninggal',
						  '$cuti_melahirkan',
						  '$tahun'
						  )
						  ");
if($kueri) {
	header('location:../cuti.php?act=sukses');
} else {
	header('location:../cuti.php?act=gagal');
}
?>