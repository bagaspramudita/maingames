<?php
include '../config.php';
error_reporting(0);
$id 				= $_POST['id'];
$nip				= $_POST['nip'];
$nama 				= $_POST['nama'];
$email 				= $_POST['email'];
$password 			= md5($_POST['password']);
$noktp 				= $_POST['noktp'];
$npwp 				= $_POST['npwp'];
$agama				= $_POST['agama'];
$tgl_lahir 			= $_POST['tgl_lahir'];
$bln_lahir 			= $_POST['bln_lahir'];
$thn_lahir 			= $_POST['thn_lahir'];
$jenis_kelamin 		= $_POST['jenis_kelamin'];
$status_pegawai 	= $_POST['status_pegawai'];
$tgl_masuk 			= $_POST['tgl_masuk'];
$bln_masuk 			= $_POST['bln_masuk'];
$thn_masuk 			= $_POST['thn_masuk'];
$alamat 			= $_POST['alamat'];
$kelurahan 			= $_POST['kelurahan'];
$kecamatan 			= $_POST['kecamatan'];
$kodepos 			= $_POST['kodepos'];
$kota 				= $_POST['kota'];
$propinsi 			= $_POST['propinsi'];
$p_terakhir 		= $_POST['pendidikan_terakhir'];
$bentuk_wajah 		= $_POST['bentuk_wajah'];
$jenis_rambut 		= $_POST['jenis_rambut'];
$status_pernikahan	= $_POST['status_pernikahan'];
$jabatan 			= $_POST['jabatan'];
$golongan_darah 	= $_POST['golongan_darah'];
$warna_kulit 		= $_POST['warna_kulit'];
$tinggi_badan 		= $_POST['tinggi_badan'];
$berat_badan 		= $_POST['berat_badan'];
$foto  				= $_FILES['foto']['name'];
$lokasi 			= $_FILES['foto']['tmp_name'];

if(empty($foto)) {
	$kueri 				= mysqli_query($conn,"
						  UPDATE user SET
						  nama 					= '$nama',
						  email 				= '$email',
						  agama 				= '$agama',
						  tanggal_lahir 		= '$tgl_lahir',
						  bulan_lahir 			= '$bln_lahir',
						  tahun_lahir 			= '$thn_lahir',
						  jenis_kelamin 		= '$jenis_kelamin',
						  status_pegawai 		= '$status_pegawai',
						  tanggal_masuk 		= '$tgl_masuk',
						  bulan_masuk 			= '$bln_masuk',
						  tahun_masuk 			= '$thn_masuk',
						  alamat 				= '$alamat',
						  kelurahan 			= '$kelurahan',
						  kecamatan 			= '$kecamatan',
						  kota 					= '$kota',
						  propinsi 				= '$propinsi',
						  kode_pos 				= '$kodepos',
						  pendidikan_terakhir 	= '$p_terakhir',
						  bentuk_wajah 			= '$bentuk_wajah',
						  jenis_rambut 			= '$jenis_rambut',
						  status_pernikahan 	= '$status_pernikahan',
						  jabatan 				= '$jabatan',
						  golongan_darah 		= '$golongan_darah',
						  tinggi_badan 			= '$tinggi_badan',
						  berat_badan 			= '$berat_badan',
						  warna_kulit 			= '$warna_kulit',
						  no_ktp 				= '$noktp',
						  npwp 					= '$npwp'
						  WHERE id = '$id'
						  ");
	if($kueri) {
		header('location:../profil.php?act=sukses');
	} else {
		header('location:../profil.php?act=gagal');
	}
} else {	
	$upload 				= move_uploaded_file($lokasi, "../assets/foto_pegawai/$foto");
	if($upload) {
		$kueri 				= mysqli_query($conn,"
							  UPDATE user SET
							  nama 					= '$nama',
							  email 				= '$email',
							  agama 				= '$agama',
							  tanggal_lahir 		= '$tgl_lahir',
							  bulan_lahir 			= '$bln_lahir',
							  tahun_lahir 			= '$thn_lahir',
							  jenis_kelamin 		= '$jenis_kelamin',
							  status_pegawai 		= '$status_pegawai',
							  tanggal_masuk 		= '$tgl_masuk',
							  bulan_masuk 			= '$bln_masuk',
							  tahun_masuk 			= '$thn_masuk',
							  alamat 				= '$alamat',
							  kelurahan 			= '$kelurahan',
							  kecamatan 			= '$kecamatan',
							  kota 					= '$kota',
							  propinsi 				= '$propinsi',
							  kode_pos 				= '$kodepos',
							  pendidikan_terakhir 	= '$p_terakhir',
							  bentuk_wajah 			= '$bentuk_wajah',
							  jenis_rambut 			= '$jenis_rambut',
							  status_pernikahan 	= '$status_pernikahan',
							  jabatan 				= '$jabatan',
							  golongan_darah 		= '$golongan_darah',
							  tinggi_badan 			= '$tinggi_badan',
							  berat_badan 			= '$berat_badan',
							  warna_kulit 			= '$warna_kulit',
							  no_ktp 				= '$noktp',
							  npwp 					= '$npwp',
							  foto 					= '$foto'
							  WHERE id = '$id'
							  ");
		if($kueri) {
			header('location:../profil.php?act=sukses');
		} else {
			header('location:../profil.php?act=gagal');
		}
	}
}
?>