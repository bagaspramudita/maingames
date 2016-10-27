<?php
include '../config.php';
$cuti_id 				= $_POST['cuti_id'];
$user_id 				= $_POST['user_id'];
$jenis 					= $_POST['jenis'];
$alasan 				= $_POST['alasan'];
$tanggal_mulai 			= $_POST['tanggal_mulai'];
$bulan_mulai 			= $_POST['bulan_mulai'];
$tahun_mulai 			= $_POST['tahun_mulai'];
$durasi 				= $_POST['durasi'];
$tanggal_berakhir 		= $_POST['tanggal_berakhir'];
$bulan_berakhir 		= $_POST['bulan_berakhir'];
$tahun_berakhir 		= $_POST['tahun_berakhir'];
$status 				= 0;

$kueri 					= mysqli_query($conn,"
						  INSERT INTO log_cuti (
						  log_id,
						  cuti_id,
						  user_id,
						  jenis_cuti,
						  alasan,
						  tanggal_mulai,
						  bulan_mulai,
						  tahun_mulai,
						  durasi,
						  tanggal_berakhir,
						  bulan_berakhir,
						  tahun_berakhir,
						  status
						  )
						  VALUES (
						  '',
						  '$cuti_id',
						  '$user_id',
						  '$jenis',
						  '$alasan',
						  '$tanggal_mulai',
						  '$bulan_mulai',
						  '$tahun_mulai',
						  '$durasi',
						  '$tanggal_berakhir',
						  '$bulan_berakhir',
						  '$tahun_berakhir',
						  '$status'
						  )
						  ");
if($kueri) {
	header('location:../pengajuan-cuti.php?act=sukses');
} else {
	header('location:../pengajuan-cuti.php?act=gagal');
}
?>