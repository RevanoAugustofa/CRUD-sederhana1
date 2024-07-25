-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 24, 2024 at 11:39 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pekerja`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pekerja`
--

CREATE TABLE `tbl_pekerja` (
  `id_pekerja` int NOT NULL,
  `nama` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_hp` double NOT NULL,
  `jabatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `gaji` int NOT NULL,
  `lembur` int NOT NULL,
  `total` int NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pekerja`
--

INSERT INTO `tbl_pekerja` (`id_pekerja`, `nama`, `tgl_lahir`, `no_hp`, `jabatan`, `gaji`, `lembur`, `total`, `jenis_kelamin`, `alamat`, `foto`) VALUES
(19, 'galih', '2024-07-13', 111111111111, '3', 2000000, 4, 2048000, 'laki-laki', 'd', 'sayur.jpeg'),
(20, 'Kilua', '2024-07-05', 999999999999, '2', 3000000, 2, 3024000, 'laki-laki', 'jawss', 'dua.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pekerja`
--
ALTER TABLE `tbl_pekerja`
  ADD PRIMARY KEY (`id_pekerja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pekerja`
--
ALTER TABLE `tbl_pekerja`
  MODIFY `id_pekerja` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
