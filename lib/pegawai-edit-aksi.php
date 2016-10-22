<?php
include '../config.php';
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

echo $nip." ".$nama." ".$email." ".$password." ".$noktp." ".$npwp." ".$agama." ".$tgl_lahir." ".$bln_lahir." ".$thn_lahir." ".$jenis_kelamin." ".$status_pegawai." ".$tgl_masuk;exit;

if(empty($foto)) {
	$kueri 				= mysqli_query($conn,"
						  INSERT INTO user(nip, nama, email, password, agama, tanggal_lahir, bulan_lahir, tahun_lahir, jenis_kelamin, status_pegawai, tanggal_masuk, bulan_masuk, tahun_masuk, alamat, kelurahan, kecamatan, kota, propinsi, kode_pos, pendidikan_terakhir, bentuk_wajah, jenis_rambut, status_pernikahan, jabatan, golongan_darah, tinggi_badan, berat_badan, warna_kulit, no_ktp, npwp, is_admin)
						  VALUES (
						  '$nip',
						  '$nama',
						  '$email',
						  '$password',
						  '$agama',
						  '$tgl_lahir',
						  '$bln_lahir',
						  '$thn_lahir',
						  '$jenis_kelamin',
						  '$status_pegawai',
						  '$tgl_masuk',
						  '$bln_masuk',
						  '$thn_masuk',
						  '$alamat',
						  '$kelurahan',
						  '$kecamatan',
						  '$kota',
						  '$propinsi',
						  '$kodepos',
						  '$p_terakhir',
						  '$bentuk_wajah',
						  '$jenis_rambut',
						  '$status_pernikahan',
						  '$jabatan',
						  '$golongan_darah',
						  '$tinggi_badan',
						  '$berat_badan',
						  '$warna_kulit',
						  '$noktp',
						  '$npwp',
						  '1'
						  )
						  ");
	if($kueri) {
		header('location:../pegawai.php?act=sukses');
	} else {
		header('location:../pegawai.php?act=gagal');
	}
} else {
	$upload 				= move_uploaded_file($lokasi, "../assets/foto_pegawai/$foto");
	if($upload) {
		$kueri 				= mysqli_query($conn,"
						  INSERT INTO user(nip, nama, email, password, agama, tanggal_lahir, bulan_lahir, tahun_lahir, jenis_kelamin, status_pegawai, tanggal_masuk, bulan_masuk, tahun_masuk, alamat, kelurahan, kecamatan, kota, propinsi, kode_pos, pendidikan_terakhir, bentuk_wajah, jenis_rambut, status_pernikahan, jabatan, foto, golongan_darah, tinggi_badan, berat_badan, warna_kulit, no_ktp, npwp, is_admin)
						  VALUES (
						  '$nip',
						  '$nama',
						  '$email',
						  '$password',
						  '$agama',
						  '$tgl_lahir',
						  '$bln_lahir',
						  '$thn_lahir',
						  '$jenis_kelamin',
						  '$status_pegawai',
						  '$tgl_masuk',
						  '$bln_masuk',
						  '$thn_masuk',
						  '$alamat',
						  '$kelurahan',
						  '$kecamatan',
						  '$kota',
						  '$propinsi',
						  '$kodepos',
						  '$p_terakhir',
						  '$bentuk_wajah',
						  '$jenis_rambut',
						  '$status_pernikahan',
						  '$jabatan',
						  '$foto',
						  '$golongan_darah',
						  '$tinggi_badan',
						  '$berat_badan',
						  '$warna_kulit',
						  '$noktp',
						  '$npwp',
						  '1'
						  )
						  ");
		if($kueri) {
			header('location:../pegawai.php?act=sukses');
		} else {
			header('location:../pegawai.php?act=gagal');
		}
	}
}
?>