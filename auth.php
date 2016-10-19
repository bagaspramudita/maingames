<?php
require 'config.php';
// Pengambilan Data
$email 			= $_POST['username'];
$password		= md5($_POST['password']);
// Mulai Kueri
$kueri			= mysqli_query($conn,
				  "
				  SELECT * FROM user 
				  WHERE email = '$email' 
				  AND password = '$password'
				  "
				  );
$ceklogin		= mysqli_num_rows($kueri);
$data			= mysqli_fetch_array($kueri);
$isadmin		= $data['is_admin'];
// Validasi
	if($ceklogin == 1) {
		session_start();
		$_SESSION['id']			= $data['id'];
		$_SESSION['nama']		= $data['nama'];
		$_SESSION['is_admin']	= $data['is_admin'];
		header('location:index.php');
	} else {
		header('location:login.php?act=fail');
	}
?>