<?php
include '../config.php';
$user_id 				= $_POST['user_id'];
$subjek 				= $_POST['subjek'];
$deskripsi 				= $_POST['deskripsi'];
$jumlah 				= $_POST['jumlah'];
$metode 				= $_POST['metode'];
$bukti 					= $_FILES['bukti']['name'];
$lokasi 				= $_FILES['bukti']['tmp_name'];

$kueru 					= mysqli_query($conn,"
						  INSERT INTO klaim(klaim_id, user_id, subjek, deskripsi, jumlah, metode_pembayaran, bukti_pembelian, status)
						  VALUES ('','$user_id','$subjek','$deskripsi','$jumlah','$metode','$bukti','1')
						  ");

$unggah					= move_uploaded_file($lokasi, "../assets/klaim/$bukti");

if($unggah) {
	if($kueru) {
	echo ("
		<script language='javascript'>
	    window.alert('Klaim berhasil dikirim!')
	    window.location.href='../pengajuan-klaim.php';
	    </script>
	");
	} else {
		echo ("
		<script language='javascript'>
	    window.alert('Gagal Insert Database!')
	    window.location.href='../pengajuan-klaim.php';
	    </script>
		");
	}
} else {
		echo ("
		<script language='javascript'>
	    window.alert('Gagal Upload Bukti!')
	    window.location.href='../pengajuan-klaim.php';
	    </script>
		");
}
?>