-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 05:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id_alternatif` int(10) NOT NULL,
  `alternatif` varchar(20) NOT NULL,
  `k1` varchar(20) NOT NULL,
  `k2` varchar(20) NOT NULL,
  `k3` varchar(20) NOT NULL,
  `k4` varchar(20) NOT NULL,
  `k5` varchar(20) NOT NULL,
  `k6` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id_alternatif`, `alternatif`, `k1`, `k2`, `k3`, `k4`, `k5`, `k6`) VALUES
(3, 'Puryanto', '3', '3', '2', '5', '2', '8'),
(4, 'Dedy Eka Tarakan Put', '3', '5', '2', '8', '8', '5'),
(5, 'Kasan', '3', '5', '5', '5', '2', '8'),
(6, 'Ruslan', '3', '3', '5', '10', '8', '8'),
(7, 'Mahfudz', '3', '5', '2', '8', '2', '8'),
(9, 'Rofi', '3', '3', '2', '10', '2', '8'),
(10, 'Mulyatin', '3', '3', '8', '10', '10', '8'),
(11, 'Giman', '3', '5', '8', '8', '8', '10'),
(12, 'Yani', '3', '5', '2', '8', '2', '10'),
(13, 'Yayuk', '3', '8', '5', '5', '2', '10'),
(14, 'Kohar', '5', '5', '2', '8', '2', '10'),
(15, 'Priyanto', '3', '3', '5', '10', '8', '8'),
(16, 'Khoirumbi', '3', '3', '2', '10', '2', '8'),
(17, 'Dedi Eko Karsono', '5', '10', '2', '10', '2', '8'),
(18, 'Efendi', '3', '5', '2', '8', '2', '8'),
(19, 'Titik Januwinarni', '5', '3', '5', '10', '10', '8'),
(20, 'Beni', '5', '3', '2', '10', '8', '10'),
(21, 'Toni', '3', '8', '2', '10', '8', '8'),
(22, 'Widi', '3', '5', '2', '8', '8', '8'),
(23, 'Kuncoro', '3', '3', '2', '10', '8', '8'),
(24, 'Soedjono', '3', '3', '8', '10', '10', '8'),
(25, 'Sutrisno', '5', '3', '2', '10', '8', '8'),
(26, 'Arif Widodo', '3', '10', '2', '10', '2', '10'),
(27, 'Sutrisno', '5', '3', '2', '10', '8', '8');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` varchar(20) NOT NULL,
  `kriteria` varchar(50) NOT NULL,
  `kepentingan` varchar(20) NOT NULL,
  `cost_benefit` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `kriteria`, `kepentingan`, `cost_benefit`) VALUES
('', 'Jumlah KK dalam 1 Rumah', '10', 'Benefit'),
('2', 'Jumlah Anggota Keluarga dalam 1 Rumah', '10', 'Benefit'),
('3', 'Pendidikan Kepala Keluarga', '8', 'Cost'),
('4', 'Jumlah Anggota Keluarga Masih Sekolah', '5', 'Benefit'),
('5', 'Transportasi', '3', 'Cost'),
('6', 'Sumber Air Bersih', '3', 'Cost');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id_alternatif` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
