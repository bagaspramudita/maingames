-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2016 at 05:03 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

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
(7, 'Budha');

-- --------------------------------------------------------

--
-- Table structure for table `bentuk_wajah`
--

CREATE TABLE `bentuk_wajah` (
  `id` int(2) NOT NULL,
  `bentuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bentuk_wajah`
--

INSERT INTO `bentuk_wajah` (`id`, `bentuk`) VALUES
(2, 'Kotak'),
(3, 'Oval (Lonjong)');

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
(2, 'CEO (Chief Technical Officer)'),
(3, 'CEO (Chief Executive Officer)'),
(4, 'Office Boy (OB)');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_rambut`
--

CREATE TABLE `jenis_rambut` (
  `id` int(2) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_rambut`
--

INSERT INTO `jenis_rambut` (`id`, `jenis`) VALUES
(3, 'Ikal Lurus'),
(4, 'Kribo');

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
(1, 'PT MP Games', 'Gandaria City', '021-5851234', 12240, 'mini-logo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `status_pegawai`
--

CREATE TABLE `status_pegawai` (
  `id` int(5) NOT NULL,
  `status_pegawai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_pegawai`
--

INSERT INTO `status_pegawai` (`id`, `status_pegawai`) VALUES
(2, 'Karyawan Tetap'),
(3, 'Honorer');

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
(6, 130102023, 'Bagas Pramudita', 'bagas@gmail.com', 'ee776a18253721efe8a62e4abd29dc47', 5, 31, 'Juli', 1995, 'Laki-laki', '2', 8, 'Januari', 1995, 'Jalan Bambu No. 79', 'Kreo', 'Larangan', 'tangerang', 'Banten', 15156, 'SMA', 2, 3, 'Menikah', 3, 'idm-logo.png', 'B', 173, 70, 'Putih Kecoklatan', 123456789, 987654321, 1),
(7, 130102022, 'Ali Sadewo', 'ali@gmail.com', '86318e52f5ed4801abe1d13d509443de', 5, 12, 'Juni', 1995, 'Laki-laki', '2', 13, 'April', 1919, 'Cipondoh', 'Palmerah', 'Jakut', 'Jakarta', 'DKI Jakarta', 12312, 'SMP', 2, 4, 'Belum Menikah', 2, '', 'B', 172, 90, 'Putih Kecoklatan', 12938123, 1923812931, 1);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`jabatan_id`);

--
-- Indexes for table `jenis_rambut`
--
ALTER TABLE `jenis_rambut`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_pegawai`
--
ALTER TABLE `status_pegawai`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `agama_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `bentuk_wajah`
--
ALTER TABLE `bentuk_wajah`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `jabatan_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_rambut`
--
ALTER TABLE `jenis_rambut`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status_pegawai`
--
ALTER TABLE `status_pegawai`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
