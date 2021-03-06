-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2017 at 12:34 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maingames`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `agama_id` int(3) NOT NULL,
  `agama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`agama_id`, `agama`) VALUES
(5, 'Islam'),
(6, 'Kristen'),
(7, 'Budha'),
(9, 'Hindu'),
(10, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `bentuk_wajah`
--

CREATE TABLE `bentuk_wajah` (
  `bentuk_id` int(2) NOT NULL,
  `bentuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bentuk_wajah`
--

INSERT INTO `bentuk_wajah` (`bentuk_id`, `bentuk`) VALUES
(2, 'Kotak'),
(3, 'Oval (Lonjong)'),
(4, 'Bulat (Tembam)'),
(5, 'Persegi (Cameuh)');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `cuti_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `cuti_tahunan` int(3) NOT NULL,
  `cuti_menikah` int(3) NOT NULL,
  `cuti_sakit` int(3) NOT NULL,
  `cuti_keluarga_meninggal` int(3) NOT NULL,
  `cuti_melahirkan` int(3) NOT NULL,
  `tahun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`cuti_id`, `user_id`, `cuti_tahunan`, `cuti_menikah`, `cuti_sakit`, `cuti_keluarga_meninggal`, `cuti_melahirkan`, `tahun`) VALUES
(10, 20, 1, 2, 3, 4, 5, 2017);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `jabatan_id` int(2) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`jabatan_id`, `jabatan`) VALUES
(2, 'CTO (Chief Technical Officer)'),
(3, 'CEO (Chief Executive Officer)'),
(4, 'Finance Staff'),
(5, 'Product Manager'),
(6, 'Head Finance'),
(8, 'HR Staff'),
(9, 'HR Manager');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rambut`
--

CREATE TABLE `jenis_rambut` (
  `jenis_id` int(2) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_rambut`
--

INSERT INTO `jenis_rambut` (`jenis_id`, `jenis`) VALUES
(3, 'Ikal Lurus'),
(4, 'Kribo Ikal'),
(6, 'Botak Licin'),
(7, 'Botak Halus'),
(8, 'Ikal Bergelombang');

-- --------------------------------------------------------

--
-- Table structure for table `klaim`
--

CREATE TABLE `klaim` (
  `klaim_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `jumlah` bigint(50) NOT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `bukti_pembelian` varchar(100) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `klaim`
--

INSERT INTO `klaim` (`klaim_id`, `user_id`, `subjek`, `deskripsi`, `jumlah`, `metode_pembayaran`, `bukti_pembelian`, `status`) VALUES
(4, 20, 'Beli Tas Gunung', 'Untuk naik gunung', 180000, 'Transfer', 'day-3.png', 2),
(6, 20, 'Berat bos', 'asdasd', 121212, 'Cash', 'Activity Diagram Pengajuan Klaim (1).png', 2),
(7, 20, 'Sidang Polisi', 'Deskripsi Klaim', 12345678, 'Cash', '7778.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `log_cuti`
--

CREATE TABLE `log_cuti` (
  `log_id` int(4) NOT NULL,
  `cuti_id` int(4) NOT NULL,
  `user_id` int(4) NOT NULL,
  `jenis_cuti` varchar(50) NOT NULL,
  `alasan` text NOT NULL,
  `tanggal_mulai` int(2) NOT NULL,
  `bulan_mulai` varchar(40) NOT NULL,
  `tahun_mulai` int(4) NOT NULL,
  `durasi` int(3) NOT NULL,
  `tanggal_berakhir` int(2) NOT NULL,
  `bulan_berakhir` int(3) NOT NULL,
  `tahun_berakhir` int(4) NOT NULL,
  `status` int(2) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_cuti`
--

INSERT INTO `log_cuti` (`log_id`, `cuti_id`, `user_id`, `jenis_cuti`, `alasan`, `tanggal_mulai`, `bulan_mulai`, `tahun_mulai`, `durasi`, `tanggal_berakhir`, `bulan_berakhir`, `tahun_berakhir`, `status`, `keterangan`) VALUES
(8, 10, 20, 'Cuti Tahunan', 'Cuti Saja', 29, '11', 2016, 2, 1, 12, 2016, 1, ''),
(9, 10, 20, 'Cuti Sakit', 'Cuti Vroh\r\n', 29, '11', 2016, 2, 1, 12, 2016, 2, ''),
(11, 10, 20, 'Cuti Tahunan', 'sakit\r\n', 8, '12', 2016, 2, 10, 12, 2016, 1, ''),
(12, 10, 20, 'Cuti Tahunan', 'Acara Keluarga', 8, '1', 2017, 3, 11, 1, 2017, 1, ''),
(18, 10, 20, 'Cuti Tahunan', 'Acara Keluarga', 8, '1', 2017, 2, 10, 1, 2017, 1, ''),
(19, 10, 20, 'Cuti Tahunan', 'Tes', 8, '1', 2017, 2, 10, 1, 2017, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `lowongan`
--

CREATE TABLE `lowongan` (
  `lowongan_id` int(5) NOT NULL,
  `nama_lowongan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `qty` int(3) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lowongan`
--

INSERT INTO `lowongan` (`lowongan_id`, `nama_lowongan`, `deskripsi`, `qty`, `status`) VALUES
(3, 'Web Programmer', 'Merancang Program Website', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(5) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` varchar(20) NOT NULL,
  `kodepos` int(10) NOT NULL,
  `logo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama_perusahaan`, `alamat`, `notelp`, `kodepos`, `logo`) VALUES
(1, 'PT MP Games', 'Gandaria 8 Office Tower, Lt. 9 Unit D-E, Kebayoran Lama - Jakarta Selatan', '021-5851234', 12240, 'mini-logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `rekening_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` bigint(20) NOT NULL,
  `atas_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`rekening_id`, `user_id`, `nama_bank`, `no_rekening`, `atas_nama`) VALUES
(9, 20, 'BCA', 3452646100, 'Bagas Pramudita');

-- --------------------------------------------------------

--
-- Table structure for table `status_pegawai`
--

CREATE TABLE `status_pegawai` (
  `status_id` int(5) NOT NULL,
  `status_pegawai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pegawai`
--

INSERT INTO `status_pegawai` (`status_id`, `status_pegawai`) VALUES
(2, 'Karyawan Tetap'),
(3, 'Karyawan Kontrak'),
(5, 'Masa Probation (3 bulan)'),
(6, 'Masa Probation (6 bulan)');

-- --------------------------------------------------------

--
-- Table structure for table `suami_istri`
--

CREATE TABLE `suami_istri` (
  `user_id` int(5) NOT NULL,
  `sebagai` varchar(30) NOT NULL,
  `suami_istri` varchar(30) NOT NULL,
  `tgl_lahir` int(2) NOT NULL,
  `bln_lahir` varchar(25) NOT NULL,
  `thn_lahir` int(4) NOT NULL,
  `tanggal_menikah` int(2) NOT NULL,
  `bulan_menikah` varchar(25) NOT NULL,
  `tahun_menikah` int(4) NOT NULL,
  `jumlah_anak` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `nip` int(32) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `agama` int(5) NOT NULL,
  `tanggal_lahir` int(2) NOT NULL,
  `bulan_lahir` varchar(50) NOT NULL,
  `tahun_lahir` int(4) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `status_pegawai` varchar(100) NOT NULL,
  `tanggal_masuk` int(2) NOT NULL,
  `bulan_masuk` varchar(20) NOT NULL,
  `tahun_masuk` int(4) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(32) NOT NULL,
  `kecamatan` varchar(32) NOT NULL,
  `kota` varchar(32) NOT NULL,
  `propinsi` varchar(32) NOT NULL,
  `kode_pos` int(10) NOT NULL,
  `pendidikan_terakhir` enum('SD','SMP','SMA','D1','D3','D4','S1','S2','S3') NOT NULL,
  `bentuk_wajah` int(3) NOT NULL,
  `jenis_rambut` int(3) NOT NULL,
  `status_pernikahan` enum('Menikah','Belum Menikah','Janda','Duda') NOT NULL,
  `jabatan` int(3) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `golongan_darah` enum('AB','A','B','O') NOT NULL,
  `tinggi_badan` int(3) NOT NULL,
  `berat_badan` int(3) NOT NULL,
  `warna_kulit` enum('Putih Bersih','Putih Kecoklatan','Coklat','Coklat Sawo Matang') NOT NULL,
  `no_ktp` int(32) NOT NULL,
  `npwp` int(32) NOT NULL,
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nip`, `nama`, `email`, `password`, `agama`, `tanggal_lahir`, `bulan_lahir`, `tahun_lahir`, `jenis_kelamin`, `status_pegawai`, `tanggal_masuk`, `bulan_masuk`, `tahun_masuk`, `alamat`, `kelurahan`, `kecamatan`, `kota`, `propinsi`, `kode_pos`, `pendidikan_terakhir`, `bentuk_wajah`, `jenis_rambut`, `status_pernikahan`, `jabatan`, `foto`, `golongan_darah`, `tinggi_badan`, `berat_badan`, `warna_kulit`, `no_ktp`, `npwp`, `is_admin`) VALUES
(6, 130102023, 'Bagas Pramudita', 'hrd@maingames.com', 'ee776a18253721efe8a62e4abd29dc47', 5, 31, 'Juli', 1995, 'Laki-laki', '2', 8, 'Januari', 1995, 'Jalan Bambu No. 79', 'Kreo', 'Larangan', 'tangerang', 'Banten', 15156, 'SMA', 2, 3, 'Belum Menikah', 9, 'BAGAS 3x4.jpg', 'B', 173, 70, 'Putih Kecoklatan', 123456789, 987654321, 1),
(20, 130102022, 'Ali Sadewo', 'pegawai@maingames.com', 'ee776a18253721efe8a62e4abd29dc47', 6, 31, 'Februari', 1996, 'Laki-laki', '5', 31, 'Juni', 2014, 'Palmerah', 'Kreo', 'Larangan', 'Tangerang', 'Banten', 15156, 'SMA', 4, 3, 'Menikah', 4, 'alisadewo.jpg', 'AB', 170, 70, 'Coklat Sawo Matang', 123123123, 123123123, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`agama_id`);

--
-- Indexes for table `bentuk_wajah`
--
ALTER TABLE `bentuk_wajah`
  ADD PRIMARY KEY (`bentuk_id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`cuti_id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `jenis_rambut`
--
ALTER TABLE `jenis_rambut`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indexes for table `klaim`
--
ALTER TABLE `klaim`
  ADD PRIMARY KEY (`klaim_id`);

--
-- Indexes for table `log_cuti`
--
ALTER TABLE `log_cuti`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `lowongan`
--
ALTER TABLE `lowongan`
  ADD PRIMARY KEY (`lowongan_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`rekening_id`);

--
-- Indexes for table `status_pegawai`
--
ALTER TABLE `status_pegawai`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `suami_istri`
--
ALTER TABLE `suami_istri`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `agama_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `bentuk_wajah`
--
ALTER TABLE `bentuk_wajah`
  MODIFY `bentuk_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `cuti_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `jenis_rambut`
--
ALTER TABLE `jenis_rambut`
  MODIFY `jenis_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `klaim`
--
ALTER TABLE `klaim`
  MODIFY `klaim_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `log_cuti`
--
ALTER TABLE `log_cuti`
  MODIFY `log_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `lowongan`
--
ALTER TABLE `lowongan`
  MODIFY `lowongan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `rekening_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `status_pegawai`
--
ALTER TABLE `status_pegawai`
  MODIFY `status_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
