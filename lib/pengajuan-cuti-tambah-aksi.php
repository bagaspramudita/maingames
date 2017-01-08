<?php
include '../config.php';
error_reporting(0);
$cuti_id 				= $_POST['cuti_id'];
$user_id 				= $_POST['user_id'];
$jenis 					= $_POST['jenis'];
$alasan 				= $_POST['alasan'];
$tanggal_mulai 			= $_POST['tanggal_mulai'];
$bulan_mulai 			= $_POST['bulan_mulai'];
$tahun_mulai 			= $_POST['tahun_mulai'];
$tanggal_berakhir 		= $_POST['tanggal_berakhir'];
$bulan_berakhir 		= $_POST['bulan_berakhir'];
$tahun_berakhir 		= $_POST['tahun_berakhir'];
$status 				= 0;

if($tanggal_mulai == 0 OR $tanggal_berakhir == 0 OR $tahun_mulai == 0 OR $tahun_berakhir == 0) {
	echo ("
		<script language='javascript'>
	    window.alert('Tanggal Tidak Boleh Kosong');
	    window.location.href='../pengajuan-cuti-tambah.php';
	    </script>
		");
} else {
	if($tahun_berakhir < $tahun_mulai) {
		echo ("
			<script language='javascript'>
		    window.alert('Tidak memungkinkan untuk mengambil cuti dengan format tahun seperti ini.');
		    window.location.href='../pengajuan-cuti-tambah.php';
		    </script>
			");
	} elseif(($tahun_berakhir == $tahun_mulai) && ($bulan_berakhir < $bulan_mulai)) {
		echo ("
			<script language='javascript'>
		    window.alert('Tidak memungkinkan untuk mengambil cuti dengan format bulan seperti ini.');
		    window.location.href='../pengajuan-cuti-tambah.php';
		    </script>
			");
	} elseif(($tahun_berakhir > $tahun_mulai) && ($bulan_berakhir >= $bulan_mulai)) {
		$cekbulan 			= ($bulan_berakhir + 12) - $bulan_mulai;
		if($cekbulan > 3) {
			echo ("
			<script language='javascript'>
		    window.alert('Selain Cuti Menikah dan Cuti Melahirkan, batas maksimal cuti adalah 30 hari.');
		    window.location.href='../pengajuan-cuti-tambah.php';
		    </script>
			");
		}
	} elseif(($tahun_berakhir > $tahun_mulai) && ($bulan_berakhir <= $bulan_mulai)) {
		$cekbulan 		= ($bulan_berakhir + 12) - $bulan_mulai;
		if($cekbulan == 1) {
			$durasicuti		= ($tanggal_berakhir + 30) - $tanggal_mulai;
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
									  '$durasicuti',
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
		} else {
			if($jenis == "Cuti Melahirkan") {
				if($cekbulan == 2) {
					$durasicuti		= ($tanggal_berakhir + 60) - $tanggal_mulai;
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
											  '$durasicuti',
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
				} elseif($cekbulan == 3) {
					$durasicuti		= ($tanggal_berakhir + 90) - $tanggal_mulai;

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
											  '$durasicuti',
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
				}
			} else {
				echo ("
					<script language='javascript'>
				    window.alert('Selain Cuti Melahirkan, batas maksimal cuti adalah 30 hari.');
				    window.location.href='../pengajuan-cuti-tambah.php';
				    </script>
					");
			}
		}
	} elseif(($tahun_berakhir == $tahun_mulai) && ($bulan_berakhir == $bulan_mulai)) {
		$durasicuti		= $tanggal_berakhir - $tanggal_mulai;
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
								  '$durasicuti',
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
	} else {
		$cekbulan 			= $bulan_berakhir - $bulan_mulai;
		if($cekbulan == 1) {
			$durasicuti		= ($tanggal_berakhir + 30) - $tanggal_mulai;
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
									  '$durasicuti',
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
		} elseif($cekbulan == 2) {
			if($jenis == "Cuti Melahirkan") {
				$durasicuti		= ($tanggal_berakhir + 60) - $tanggal_mulai;

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
										  '$durasicuti',
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
			} else {
				echo ("
					<script language='javascript'>
				    window.alert('Selain Cuti Melahirkan, batas maksimal cuti adalah 30 hari.');
				    window.location.href='../pengajuan-cuti-tambah.php';
				    </script>
					");
			}
		} else {
			echo ("
					<script language='javascript'>
				    window.alert('Selain Cuti Melahirkan, batas maksimal cuti adalah 30 hari.');
				    window.location.href='../pengajuan-cuti-tambah.php';
				    </script>
					");
		}
	}
}
?>