-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 12:41 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw_tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternative`
--

CREATE TABLE `alternative` (
  `id` int(11) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alternative`
--

INSERT INTO `alternative` (`id`, `nama_tempat`, `alamat`, `kategori`, `foto`) VALUES
(5, 'Pantai Talise', 'Jl. Sultan Hasanuddin, Lolu Utara', 'Pantai', 'wisata-palu-11-Merdeka.jpg'),
(6, 'Pantai kaluku', 'Limboro, Banawa Tengah, Donggala Regency', 'Pantai', '2022-06-20.jpg'),
(7, 'taipa beach', 'Jl. Taipa Beach, Taipa, Palu Utara, Palu City', 'Pantai', '2022-01-30.jpg'),
(8, 'Museum Sulawesi Tengah', 'Jl. Kemiri No.23, Kamonji, Kec. Palu Barat', 'budaya', 'museum.jpg'),
(9, 'Gong Perdamaian', 'Jl. Soekarno Hatta, Tondo, Kec. Mantikulore, Kota Palu', 'budaya', '2021-07-28.jpg'),
(10, 'Gunung matantimali', 'Matantimali, Kec. Marawola Barat, Kabupaten Sigi', 'Gunung', '2022-05-27.jpg'),
(11, 'Bukit Gawalise', 'Salungkaenu, Kec. Banawa Sel., Kabupaten Donggala', 'Gunung', '2019-06-20.jpg'),
(12, 'Pusat laut', 'Jl. Sultan Hasanuddin, Lolu Utara, Kec. Palu Sel., Kota Palu, Sulawesi Tengah 94111', 'Pantai', 'pusat-laut.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id` int(10) NOT NULL,
  `biaya` double NOT NULL,
  `jarak` double NOT NULL,
  `waktu` double NOT NULL,
  `fasilitas` double NOT NULL,
  `usia` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id`, `biaya`, `jarak`, `waktu`, `fasilitas`, `usia`) VALUES
(1, 0.2, 0.2, 0.2, 0.2, 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `nama_tempat` varchar(100) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  `jarak` varchar(100) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `fasilitas` varchar(100) NOT NULL,
  `usia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`nama_tempat`, `biaya`, `jarak`, `waktu`, `fasilitas`, `usia`) VALUES
('Pusat laut', '2', '2', '2', '3', '5'),
('Pantai Talise', '3', '2', '4', '2', '3'),
('Pantai kaluku', '2', '4', '5', '3', '4'),
('taipa beach', '3', '2', '3', '3', '5'),
('Museum Sulawesi Tengah', '3', '3', '3', '3', '5'),
('Gong Perdamaian', '3', '4', '3', '2', '4'),
('Gunung matantimali', '4', '4', '4', '2', '3'),
('Bukit Gawalise', '3', '3', '4', '5', '5');

-- --------------------------------------------------------

--
-- Table structure for table `perangkingan`
--

CREATE TABLE `perangkingan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perangkingan`
--

INSERT INTO `perangkingan` (`id`, `nama`, `nilai`) VALUES
(1, 'Pusat laut', '0.7'),
(2, 'Pantai Talise', '0.593'),
(3, 'Pantai kaluku', '0.88'),
(4, 'taipa beach', '0.673'),
(5, 'Museum Sulawesi Tengah', '0.723'),
(6, 'Gong Perdamaian', '0.693'),
(7, 'Gunung matantimali', '0.66'),
(8, 'Bukit Gawalise', '0.843');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `gmail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `gmail`, `password`) VALUES
(1, 'Admin', 'admin@gmail.com', '123abc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternative`
--
ALTER TABLE `alternative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perangkingan`
--
ALTER TABLE `perangkingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternative`
--
ALTER TABLE `alternative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perangkingan`
--
ALTER TABLE `perangkingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
