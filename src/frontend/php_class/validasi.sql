-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2017 at 03:00 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `validasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `kabupaten`
--

CREATE TABLE `kabupaten` (
  `kode_kab` int(4) NOT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `kode_prov` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prediksi_potensi_banjir`
--

CREATE TABLE `prediksi_potensi_banjir` (
  `no` bigint(20) NOT NULL,
  `tgl_prediksi` date DEFAULT NULL,
  `kode_kab` int(4) DEFAULT NULL,
  `awas_banjir_pu` tinyint(1) DEFAULT NULL,
  `awas_banjir_sc` tinyint(1) DEFAULT NULL,
  `bmkg_7` tinyint(1) DEFAULT NULL,
  `bmkg_13` tinyint(1) DEFAULT NULL,
  `bmkg_19` tinyint(1) DEFAULT NULL,
  `sc_cuaca_7` tinyint(1) DEFAULT NULL,
  `sc_cuaca_13` tinyint(1) DEFAULT NULL,
  `sc_cuaca_19` tinyint(1) DEFAULT NULL,
  `sc_warning_7` tinyint(1) DEFAULT NULL,
  `sc_warning_13` tinyint(1) DEFAULT NULL,
  `sc_warning_19` tinyint(1) DEFAULT NULL,
  `vp_cuaca_7` tinyint(1) DEFAULT NULL,
  `vp_cuaca_13` tinyint(1) DEFAULT NULL,
  `vp_cuaca_19` tinyint(1) DEFAULT NULL,
  `vp_banjir_7` tinyint(1) DEFAULT NULL,
  `vp_banjir_13` tinyint(1) DEFAULT NULL,
  `vp_banjir_19` tinyint(1) DEFAULT NULL,
  `analisa` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prediksi_potensi_longsor`
--

CREATE TABLE `prediksi_potensi_longsor` (
  `no` bigint(20) NOT NULL,
  `tgl_prediksi` date DEFAULT NULL,
  `kode_kab` int(4) DEFAULT NULL,
  `awas_longsor_pu` tinyint(1) DEFAULT NULL,
  `awas_longsor_sc` tinyint(1) DEFAULT NULL,
  `bmkg_7` tinyint(1) DEFAULT NULL,
  `bmkg_13` tinyint(1) DEFAULT NULL,
  `bmkg_19` tinyint(1) DEFAULT NULL,
  `sc_cuaca_7` tinyint(1) DEFAULT NULL,
  `sc_cuaca_13` tinyint(1) DEFAULT NULL,
  `sc_cuaca_19` tinyint(1) DEFAULT NULL,
  `sc_warning_7` tinyint(1) DEFAULT NULL,
  `sc_warning_13` tinyint(1) DEFAULT NULL,
  `sc_warning_19` tinyint(1) DEFAULT NULL,
  `v_pusdalops_7` tinyint(1) DEFAULT NULL,
  `v_pusdalops_13` tinyint(1) DEFAULT NULL,
  `v_pusdalops_19` tinyint(1) DEFAULT NULL,
  `analisa` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `kode_prov` int(2) NOT NULL,
  `provinsi` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` text,
  `kode_prov` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD PRIMARY KEY (`kode_kab`),
  ADD KEY `kode_prov` (`kode_prov`);

--
-- Indexes for table `prediksi_potensi_banjir`
--
ALTER TABLE `prediksi_potensi_banjir`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kode_kab` (`kode_kab`);

--
-- Indexes for table `prediksi_potensi_longsor`
--
ALTER TABLE `prediksi_potensi_longsor`
  ADD PRIMARY KEY (`no`),
  ADD KEY `kode_kab` (`kode_kab`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`kode_prov`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`),
  ADD KEY `kode_prov` (`kode_prov`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prediksi_potensi_banjir`
--
ALTER TABLE `prediksi_potensi_banjir`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prediksi_potensi_longsor`
--
ALTER TABLE `prediksi_potensi_longsor`
  MODIFY `no` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kabupaten`
--
ALTER TABLE `kabupaten`
  ADD CONSTRAINT `kabupaten_ibfk_1` FOREIGN KEY (`kode_prov`) REFERENCES `provinsi` (`kode_prov`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prediksi_potensi_banjir`
--
ALTER TABLE `prediksi_potensi_banjir`
  ADD CONSTRAINT `prediksi_potensi_banjir_ibfk_2` FOREIGN KEY (`kode_kab`) REFERENCES `kabupaten` (`kode_kab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prediksi_potensi_longsor`
--
ALTER TABLE `prediksi_potensi_longsor`
  ADD CONSTRAINT `prediksi_potensi_longsor_ibfk_2` FOREIGN KEY (`kode_kab`) REFERENCES `kabupaten` (`kode_kab`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`kode_prov`) REFERENCES `provinsi` (`kode_prov`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
