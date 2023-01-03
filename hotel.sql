-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2022 at 12:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `email`, `username`, `password`, `akses`) VALUES
(1, 'admin1@admin1', 'admin1', 'admin1', 'admin'),
(2, 'admin2@admin2', 'admin2', 'admin2', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id` int(11) NOT NULL,
  `no` int(11) NOT NULL,
  `fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id`, `no`, `fasilitas`) VALUES
(1, 1, 'Sarapan Gratis'),
(2, 1, 'Restoran'),
(3, 3, 'Wi-Fi Internet Gratis'),
(4, 4, 'Parkir'),
(5, 5, 'Kolam Renang');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fasilitas` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `tipe_kamar` int(11) NOT NULL,
  `fasilitas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fasilitas`, `no_kamar`, `tipe_kamar`, `fasilitas`) VALUES
(5, 1, 1, 'Makan Siang Gratis'),
(6, 2, 1, 'Restoran'),
(7, 0, 2, 'Makan Siang Gratis'),
(8, 0, 3, 'Makan Siang Gratis'),
(9, 0, 2, 'Sarapan Gratis');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `kode` int(11) NOT NULL,
  `no_kamar` int(11) NOT NULL,
  `id_fasilitas` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `id_resepsionis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `no_kamar` int(11) NOT NULL,
  `tipe_kamar` int(11) NOT NULL,
  `harga_kamar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`no_kamar`, `tipe_kamar`, `harga_kamar`) VALUES
(121, 1, '300.000'),
(122, 2, '400.000'),
(123, 2, '400.000'),
(131, 1, '250.000'),
(141, 1, '250.000'),
(151, 1, '250.000'),
(222, 3, '400.000'),
(223, 3, '400.000'),
(224, 3, '400.000'),
(225, 3, '400.000');

-- --------------------------------------------------------

--
-- Table structure for table `resepsionis`
--

CREATE TABLE `resepsionis` (
  `id_resepsionis` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `akses` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resepsionis`
--

INSERT INTO `resepsionis` (`id_resepsionis`, `email`, `username`, `password`, `akses`) VALUES
(1, 'resepsionis1@resepsionis1', 'resepsionis1', 'resepsionis1', 'resepsionis'),
(2, 'res2@res2', 'res2', 'res2', 'resepsionis'),
(3, 'resepsionis3@res', 'resepsionis3', 'resepsionis3', 'resepsionis');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` int(100) NOT NULL,
  `telp` int(100) NOT NULL,
  `tgl_cekin` date NOT NULL,
  `tgl_cekout` date NOT NULL,
  `tipe_kamar` int(11) NOT NULL,
  `kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id`, `nama`, `nik`, `telp`, `tgl_cekin`, `tgl_cekout`, `tipe_kamar`, `kamar`) VALUES
(12, 'Kayla', 123, 123, '2022-08-30', '2022-08-31', 2, 123),
(13, 'Figo', 123, 123, '2022-08-31', '2022-09-01', 1, 121),
(14, 'Fauzi', 122, 122, '2022-09-03', '2022-09-04', 1, 131),
(15, 'Saya', 1212, 1212, '2022-09-04', '2022-09-05', 2, 123),
(16, 'Kayla Inara Putri', 32093, 123123123, '2022-09-08', '2022-09-09', 1, 121),
(17, 'Kayla Inara Putri', 32093, 123123123, '2022-09-08', '2022-09-09', 1, 121),
(18, 'Figo Arbiansyah Pratama', 1234321, 895363817, '2022-09-08', '2022-09-09', 2, 122),
(19, 'figooo', 12026721, 2147483647, '2022-09-09', '2022-09-10', 1, 131),
(20, 'Figo Arbiansyah Pratama', 1234321, 895363817, '2022-09-09', '2022-09-10', 1, 121),
(21, 'Figo Arbiansyah Pratama', 1234321, 895363817, '2022-09-09', '2022-09-10', 1, 121),
(22, 'figooo', 12026721, 2147483647, '2022-09-09', '2022-09-10', 1, 141),
(23, 'Figo Arbiansyah Pratama', 1234321, 895363817, '2022-09-09', '2022-09-10', 1, 121),
(24, 'Hanif', 121212, 121212, '2022-09-09', '2022-09-10', 1, 121);

-- --------------------------------------------------------

--
-- Table structure for table `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL,
  `nik` int(30) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nik`, `nama`, `telp`, `email`, `username`, `password`) VALUES
(1, 12026721, 'Figo Arbiansyah Pratama', '0895358905664', 'figo@go', 'figooo', 'figoarbiansyah'),
(2, 1212, 'user', '123', 'user@gmail.com', 'user', 'user'),
(3, 123123, 'Kayla Inara Putri', '123123', 'kayla@kayla', 'kayla', 'kaylakayla'),
(4, 32093, 'Kayla Inara Putri', '123123123', 'kayla@la', 'Kayla Inara Putri', 'kayla'),
(5, 1234321, 'Figo Arbiansyah Pratama', '0895363817', 'figo@saya.com', 'Figo Arbiansyah Pratama', 'figoarbiansyah'),
(6, 0, 'admin1', '', '', 'admin1', 'admin1'),
(7, 121212, 'Hanif', '121212', 'hanif@hanif', 'Hanif', 'hanif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `id_kamar` (`no_kamar`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`kode`),
  ADD KEY `id_kamar` (`no_kamar`),
  ADD KEY `id_fasilitas` (`id_fasilitas`),
  ADD KEY `id` (`id`),
  ADD KEY `id_tamu` (`id_tamu`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_resepsionis` (`id_resepsionis`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`no_kamar`);

--
-- Indexes for table `resepsionis`
--
ALTER TABLE `resepsionis`
  ADD PRIMARY KEY (`id_resepsionis`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `no_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `resepsionis`
--
ALTER TABLE `resepsionis`
  MODIFY `id_resepsionis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `hotel_ibfk_1` FOREIGN KEY (`id_resepsionis`) REFERENCES `resepsionis` (`id_resepsionis`),
  ADD CONSTRAINT `hotel_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `hotel_ibfk_3` FOREIGN KEY (`id_tamu`) REFERENCES `tamu` (`id_tamu`),
  ADD CONSTRAINT `hotel_ibfk_4` FOREIGN KEY (`id`) REFERENCES `fasilitas_hotel` (`id`),
  ADD CONSTRAINT `hotel_ibfk_5` FOREIGN KEY (`id_fasilitas`) REFERENCES `fasilitas_kamar` (`id_fasilitas`),
  ADD CONSTRAINT `hotel_ibfk_6` FOREIGN KEY (`no_kamar`) REFERENCES `kamar` (`no_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
