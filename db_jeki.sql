-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2023 at 05:25 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jeki`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`id`, `tanggal`, `level`, `nama`) VALUES
(14, 'Jumat, 21 Juli 2023', 'mahasiswa', 'Keqing'),
(15, 'Minggu, 23 Juli 2023', 'mahasiswa', 'Keqing'),
(20, 'Rabu, 26 Juli 2023', 'mahasiswa', 'Keqing'),
(25, 'Rabu, 26 Juli 2023', 'admin', 'Mbah'),
(26, 'Rabu, 26 Juli 2023', 'karyawan', 'Nipon'),
(27, 'Rabu, 26 Juli 2023', 'dosen', 'Iqbal'),
(28, 'Rabu, 26 Juli 2023', 'mahasiswa', 'nyobaaa');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nid` char(10) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `nid`, `prodi`, `email`, `pendidikan`, `gambar`) VALUES
(6, 'Nazril irham', '0002', 'Sistem Informasi', 'ariel@gmail.com', 'S1 - Teknik Sipil', 'ariel.png'),
(10, 'Adinda Azani', '0003', 'Informasi', 'adinda@gmail.co.id', 'S1 - Teknik Informasi', 'dinda.png'),
(19, 'Iqbal', '40001', 'Informasi', 'iqbal@gmail.co.id', 'S1 - Bahasa Indonesia', '64b407aa329a4.png');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `niq` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tlp` int(12) NOT NULL,
  `posisi` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `niq`, `nama`, `alamat`, `email`, `tlp`, `posisi`, `gambar`) VALUES
(1, 50001, 'Mbah', 'Surabaya', 'mbah@gmail.com', 879876781, 'Admin', '64b3f4a5dd0a8.jpeg'),
(2, 50002, 'Nipon', 'Surabaya - Benowo', 'nipon@gmail.co.id', 122112, 'Karyawan', '64b3eabfabcba.png');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `NIM` char(9) NOT NULL,
  `hobby` varchar(225) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `fakultas` varchar(256) NOT NULL,
  `noTlp` varchar(20) NOT NULL,
  `jk` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `NIM`, `hobby`, `prodi`, `gambar`, `fakultas`, `noTlp`, `jk`) VALUES
(1, 'Rey Mbayang', '12345', 'Olahraga, Mendengarkan musik', 'Informatika', '64a6dc24b6022.png', 'FTIB', '083112345678', 'Laki-laki'),
(2, 'Aliando Syarief', '23456', 'Olahraga', 'Teknik Industri', 'aliandos.png', 'FTEIC', '083112345671', 'Laki-laki'),
(3, 'Adinda Azani', '34567', 'Jalan-jalan, Mancing', 'Bisnis Digital', 'dinda.png', 'FTIB', '083112345672', 'Perempuan'),
(33, 'Fahre', '24412', 'Membaca, Jalan-jalan, Mancing, Mancing', 'Informatika', 'fahre.jpg', 'FTIB', '081341242453', 'Laki-laki'),
(34, 'Suisei Hoshimachi', '12367', 'Mendengarkan musik, Bermain Game, Jalan-jalan, Mancing, Mancing', 'Bisnis Digital', 'Hoshimachi.Suisei.full.3833029.jpg', 'FTEIC', '085155011897', 'Perempuan'),
(35, 'Ezra', '12678', 'Mendengarkan musik, Bermain Game, Mancing', 'Informatika', '02035.png', 'FTIB', '081534124243', 'Laki-laki'),
(42, 'Keqing', '12011', 'Membaca, Jalan-jalan', 'Informatika', '105784031_p0_master1200.jpg', 'FTIB', '085155011895', 'Perempuan'),
(46, 'nyobaaa', '1945', 'Membaca, Jalan-jalan', 'sipil', '64c130ead08db.png', 'FTEIC', '081341242453', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `uid` int(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `uid`, `password`, `level`) VALUES
(1, 12011, '12011', 'mahasiswa'),
(2, 40001, '40001', 'dosen'),
(3, 50001, '50001', 'admin'),
(4, 50002, '50002', 'karyawan'),
(7, 1945, '1945', 'mahasiswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
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
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
