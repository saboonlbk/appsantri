-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 05:28 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pondok`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `angkatan` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `asal_sekolah`
--

CREATE TABLE `asal_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `diterima_di_kelas` varchar(50) DEFAULT NULL,
  `nilai` varchar(50) DEFAULT NULL,
  `santri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catatan_santri`
--

CREATE TABLE `catatan_santri` (
  `id` int(11) NOT NULL,
  `catatan` text,
  `jenis` enum('Prestasi','Kasus') DEFAULT NULL,
  `keterangan` text,
  `tgl_awal` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `tempo` int(11) DEFAULT NULL,
  `santri_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orang_tua`
--

CREATE TABLE `orang_tua` (
  `id` int(11) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `umur_ayah` int(11) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `umur_ibu` int(11) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `santri_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `santri`
--

CREATE TABLE `santri` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL DEFAULT 'laki-laki',
  `anak_ke` varchar(50) NOT NULL DEFAULT '0',
  `saudara_kandung` varchar(50) NOT NULL DEFAULT '0',
  `saudara_tiri` varchar(50) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `status` enum('baru','lama') NOT NULL DEFAULT 'baru',
  `kelas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL DEFAULT 'L',
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `level` enum('SA','A') DEFAULT 'A',
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `jenis_kelamin`, `username`, `password`, `level`, `foto`) VALUES
(2, 'Administrator', 'L', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'SA', NULL),
(3, 'ahmad syahbandi', 'L', 'ratxens', '531e4452e956bca26d8d26aef437a2e9', 'A', '');

-- --------------------------------------------------------

--
-- Table structure for table `wali`
--

CREATE TABLE `wali` (
  `id` int(11) NOT NULL,
  `nama_wali_1` varchar(50) DEFAULT NULL,
  `status_kekeluargaan_1` varchar(50) DEFAULT NULL,
  `alamat_1` text,
  `no_hp_1` varchar(50) DEFAULT NULL,
  `nama_wali_2` varchar(50) DEFAULT NULL,
  `status_kekeluargaan_2` varchar(50) DEFAULT NULL,
  `alamat_2` text,
  `no_hp_2` varchar(50) DEFAULT NULL,
  `santri_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali`
--

INSERT INTO `wali` (`id`, `nama_wali_1`, `status_kekeluargaan_1`, `alamat_1`, `no_hp_1`, `nama_wali_2`, `status_kekeluargaan_2`, `alamat_2`, `no_hp_2`, `santri_id`) VALUES
(2, '', '', '', '', '', '', '', '', NULL),
(4, '', '', '', '', '', '', '', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `asal_sekolah`
--
ALTER TABLE `asal_sekolah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_asal_sekolah_santri` (`santri_id`);

--
-- Indexes for table `catatan_santri`
--
ALTER TABLE `catatan_santri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_catatan_santri_santri` (`santri_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_orang_tua_santri` (`santri_id`);

--
-- Indexes for table `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wali`
--
ALTER TABLE `wali`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__santri` (`santri_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `asal_sekolah`
--
ALTER TABLE `asal_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catatan_santri`
--
ALTER TABLE `catatan_santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orang_tua`
--
ALTER TABLE `orang_tua`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE `santri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wali`
--
ALTER TABLE `wali`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asal_sekolah`
--
ALTER TABLE `asal_sekolah`
  ADD CONSTRAINT `FK_asal_sekolah_santri` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `catatan_santri`
--
ALTER TABLE `catatan_santri`
  ADD CONSTRAINT `FK_catatan_santri_santri` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orang_tua`
--
ALTER TABLE `orang_tua`
  ADD CONSTRAINT `FK_orang_tua_santri` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wali`
--
ALTER TABLE `wali`
  ADD CONSTRAINT `FK__santri` FOREIGN KEY (`santri_id`) REFERENCES `santri` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
