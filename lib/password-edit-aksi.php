<?php
include '../config.php';
$id 					= $_POST['id'];
$passlama 				= md5($_POST['passlama']);
$passbaru 				= md5($_POST['passbaru']);
$passbaru2 				= md5($_POST['passbaru2']);

$kueru 					= mysqli_query($conn,"
						  SELECT * FROM user
						  WHERE id = '$id' AND password = '$passlama'
						  ");
$cekdata 				= mysqli_num_rows($kueru);

if($cekdata == 1) {
	if($passbaru == $passbaru2) {
		$kueri 					= mysqli_query($conn,"
								  UPDATE user 
								  SET password 	= '$passbaru'
								  WHERE id  	= '$id'
								  ");
		if($kueri) {
			echo ("
				<script language='javascript'>
			    window.alert('Password Berhasil Diganti!')
			    window.location.href='../ganti-password.php';
			    </script>
	    	");
		} else {
			header('location:../cuti.php?act=gagal');
		}
	} else {
		echo ("
				<script language='javascript'>
			    window.alert('Password Baru tidak sama, Silahkan cek lagi!')
			    window.location.href='../ganti-password.php';
			    </script>
    	");
	}
} else {
	echo ("
			<script language='javascript'>
		    window.alert('Password Lama Anda salah!')
		    window.location.href='../ganti-password.php';
		    </script>
    	");
}
?>