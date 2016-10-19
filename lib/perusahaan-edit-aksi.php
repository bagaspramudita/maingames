<?php
include '../config.php';
$id 				= $_POST['id'];
$nama_perusahaan	= $_POST['nama_perusahaan'];
$alamat 			= $_POST['alamat'];
$notelp 			= $_POST['notelp'];
$kodepos 			= $_POST['kodepos'];
$logo 				= $_FILES['logo']['name'];
$tmplogo 			= $_FILES['logo']['tmp_name'];

// Tidak Ada Gambar
if($logo == "" OR $tmplogo == "") {
	$kueri 				= mysqli_query($conn,"
						  UPDATE perusahaan 
						  SET nama_perusahaan 			= '$nama_perusahaan',
						  alamat 						= '$alamat',
						  notelp						= '$notelp',
						  kodepos 						= '$kodepos'
						  WHERE id 						= 1
						  ");
	if($kueri) {
		header('location:../perusahaan.php?act=sukses');
	} else {
		header('location:../perusahaan.php?act=gagal');
	}
} else {
// Ada Gambar
	$upload 			= move_uploaded_file($tmplogo, "../assets/$logo");
	if($upload) {
		$kueri 			= mysqli_query($conn,"
						  UPDATE perusahaan 
						  SET nama_perusahaan 			= '$nama_perusahaan',
						  alamat 						= '$alamat',
						  notelp						= '$notelp',
						  kodepos 						= $kodepos,
						  logo 							= '$logo'
						  WHERE id 						= 1
						  ");
		if($kueri) {
			header('location:../perusahaan.php?act=sukses');
		} else {
			header('location:../perusahaan.php?act=gagal');
		}
	} else {
		echo "Gagal";
	}
}
?>