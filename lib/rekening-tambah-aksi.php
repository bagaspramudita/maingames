<?php
include '../config.php';
$id 					= $_POST['id'];
$nama_bank 				= $_POST['nama_bank'];
$no_rekening 			= $_POST['no_rekening'];
$atas_nama 				= $_POST['atas_nama'];

$kueru 					= mysqli_query($conn,"
						  INSERT INTO rekening (rekening_id,user_id,nama_bank,no_rekening,atas_nama)
						  VALUES ('','$id','$nama_bank','$no_rekening','$atas_nama')
						  ");

if($kueru) {
		echo ("
			<script language='javascript'>
		    window.alert('Rekening berhasil ditambah!')
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