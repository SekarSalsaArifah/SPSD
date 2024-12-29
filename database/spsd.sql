-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2024 at 11:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spsd`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_server`
--

CREATE TABLE `app_server` (
  `id_appserver` bigint(11) NOT NULL,
  `id_server` bigint(11) DEFAULT NULL,
  `jenis_server` varchar(128) NOT NULL,
  `versi` varchar(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `app_server`
--

INSERT INTO `app_server` (`id_appserver`, `id_server`, `jenis_server`, `versi`, `keterangan`) VALUES
(5, 53, 'Server Web Apache', '2.4', 'server app apache'),
(13, 53, 'coba', '2', ''),
(14, 56, 'a', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` bigint(11) NOT NULL,
  `nama_instansi` varchar(128) NOT NULL,
  `alamat_instansi` varchar(255) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `instansi_active` enum('N','Y') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `alamat_instansi`, `no_telepon`, `keterangan`, `instansi_active`) VALUES
(1, 'Dinas Kominfo Sleman', 'Jl. Parasamya No.1, Beran, Tridadi, Kec. Sleman, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55511', '(0274) 868405', '', ''),
(2, 'Dinas Lingkungan Hidup', 'alamat', '(0274) 868772', 'Dinas Lingkungan Hidup Kabupaten Sleman', '');

-- --------------------------------------------------------

--
-- Table structure for table `server`
--

CREATE TABLE `server` (
  `id_server` bigint(11) NOT NULL,
  `nama_server` varchar(128) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `os` varchar(30) NOT NULL,
  `versi_os` varchar(10) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `server`
--

INSERT INTO `server` (`id_server`, `nama_server`, `ip`, `os`, `versi_os`, `keterangan`) VALUES
(53, 'Database Server', '192.168.10.1', 'CentOS', '7', 'server fisik 1'),
(56, 'server fisik', '123456789', 'ygdwjwo', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `subdomain`
--

CREATE TABLE `subdomain` (
  `id_subdomain` bigint(11) NOT NULL,
  `website` varchar(255) NOT NULL,
  `layanan` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `tahun` datetime NOT NULL,
  `no_surat` varchar(128) NOT NULL,
  `buktiupload` varchar(128) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `subdomain` varchar(128) NOT NULL,
  `status` enum('P','Y') NOT NULL,
  `id_instansi` bigint(11) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `statusAktif` enum('N','Y') NOT NULL,
  `id_appserver` bigint(11) DEFAULT NULL,
  `id_server` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subdomain`
--

INSERT INTO `subdomain` (`id_subdomain`, `website`, `layanan`, `email`, `url`, `pemilik`, `tahun`, `no_surat`, `buktiupload`, `keterangan`, `subdomain`, `status`, `id_instansi`, `no_telepon`, `statusAktif`, `id_appserver`, `id_server`) VALUES
(15, 'dlh.slemankab.go.id', 'kebersihan', '', '', '', '0000-00-00 00:00:00', '', 'dlh.slemankab.go.id-buktiupload.pdf', 'Surat permohonan server dan domain dinas lingkungan hidup kabupaten sleman', '', 'P', 2, NULL, 'N', NULL, NULL),
(18, 'ssd', 'xx', 'asd@g.d', '', '', '0000-00-00 00:00:00', '', 'ssd-buktiupload.pdf', 'xkl;', 'a', 'Y', NULL, NULL, 'N', 5, 53);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(11) NOT NULL,
  `id_instansi` bigint(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` int(3) NOT NULL,
  `id_role` bigint(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_instansi`, `username`, `password`, `is_active`, `id_role`) VALUES
(1, 1, 'admin', '$2y$10$AAlnoEkVBrS9J/K055uVG.DoSpqG9TrZd4lxpfVI2v2Ct.c8rHxcC', 0, 1),
(2, 1, 'dinas', '$2y$10$/N/99qGHoJz3dgGyj2/qgelGwPrkvy3rtiZ9fnGcTNvBOtswu16Hy', 0, 2),
(3, 2, 'lingkungan', '$2y$10$YvMHQX0KAMCK70dwxWnK/.3XhwAN2Fa5MYqmC3vOfcMLFoubuvQSi', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'dinas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `app_server`
--
ALTER TABLE `app_server`
  ADD PRIMARY KEY (`id_appserver`),
  ADD KEY `id_server_fkb` (`id_server`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`id_server`);

--
-- Indexes for table `subdomain`
--
ALTER TABLE `subdomain`
  ADD PRIMARY KEY (`id_subdomain`),
  ADD KEY `id_instansi` (`id_instansi`),
  ADD KEY `no_telepon` (`no_telepon`),
  ADD KEY `id_appserver_fk` (`id_appserver`),
  ADD KEY `id_server_fk` (`id_server`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `app_server`
--
ALTER TABLE `app_server`
  MODIFY `id_appserver` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `server`
--
ALTER TABLE `server`
  MODIFY `id_server` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `subdomain`
--
ALTER TABLE `subdomain`
  MODIFY `id_subdomain` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `app_server`
--
ALTER TABLE `app_server`
  ADD CONSTRAINT `id_server_fkb` FOREIGN KEY (`id_server`) REFERENCES `server` (`id_server`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subdomain`
--
ALTER TABLE `subdomain`
  ADD CONSTRAINT `id_appserver_fk` FOREIGN KEY (`id_appserver`) REFERENCES `app_server` (`id_appserver`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_server_fk` FOREIGN KEY (`id_server`) REFERENCES `server` (`id_server`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subdomain_ibfk_1` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `id_instansi_fk` FOREIGN KEY (`id_instansi`) REFERENCES `instansi` (`id_instansi`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `user_role` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
