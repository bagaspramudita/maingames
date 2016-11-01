<?php
include '../config.php';
$id 					= $_POST['id'];
$nama_bank 				= $_POST['nama_bank'];
$no_rekening 			= $_POST['no_rekening'];
$atas_nama 				= $_POST['atas_nama'];

$kueru 					= mysqli_query($conn,"
						  UPDATE rekening
						  SET nama_bank='$nama_bank', no_rekening='$no_rekening', atas_nama='$atas_nama'
						  WHERE user_id = '$id'
						  ");

if($kueru) {
		echo ("
			<script language='javascript'>
		    window.alert('Rekening berhasil dirubah!')
		    window.location.href='../rekening.php';
		    </script>
		");
	} else {
		echo ("
		<script language='javascript'>
	    window.alert('Gagal!')
	    window.location.href='../rekening.php';
	    </script>
		");
	}
	
?>