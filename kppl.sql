-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2017 at 05:41 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kppl`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username_admin` varchar(256) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `type` enum('futsal','basket') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`, `type`) VALUES
('admin169', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'futsal'),
('adminmayasi', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'basket');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `no` varchar(256) NOT NULL,
  `type` enum('futsal','basket') NOT NULL,
  `nama` varchar(50) NOT NULL,
  `admin` varchar(500) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nomer_identitas` varchar(20) NOT NULL,
  `nama_lapangan` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `lama_sewa` int(20) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`no`, `type`, `nama`, `admin`, `kategori`, `nomer_identitas`, `nama_lapangan`, `tanggal`, `jam`, `lama_sewa`, `status`) VALUES
('1506941920', 'futsal', 'Nur laili', 'admin169', 'Pelajar', '5215100000', 'Lapangan C', '2017-10-02', '01:00:00', 1, 1),
('1508373366', 'basket', 'Putra', 'adminmayasi', 'Pelajar', '05241150000020', 'Lapangan Bayasi ', '2017-10-19', '09:00:00', 1, 0),
('1512409830', 'futsal', 'Lailis', 'admin169', 'Pelajar', '', 'Lapangan B', '2018-10-01', '07:00:00', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kompetisi`
--

CREATE TABLE `kompetisi` (
  `id_kompetisi` varchar(200) NOT NULL,
  `nama_kompetisi` varchar(200) NOT NULL,
  `tanggal_kompetisi` date NOT NULL,
  `penyelenggara` varchar(200) NOT NULL,
  `lokasi_kompetisi` varchar(200) NOT NULL,
  `gambar_kompetisi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `type` enum('futsal','basket') NOT NULL,
  `pemilik` varchar(500) NOT NULL,
  `nama_lapangan` varchar(500) NOT NULL,
  `detail_lapangan` varchar(500) NOT NULL,
  `tarif_student` varchar(500) NOT NULL,
  `tarif_umum` varchar(500) NOT NULL,
  `gambar_lapangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `type`, `pemilik`, `nama_lapangan`, `detail_lapangan`, `tarif_student`, `tarif_umum`, `gambar_lapangan`) VALUES
(1001, 'futsal', 'admin169', 'Lapangan A', 'Lapangan Futsal 169 A', '70000', '120000', 'http://localhost/SportyFast/./assets/lapangan/image/lapfutA.jpg'),
(1002, 'futsal', 'admin169', 'Lapangan B', 'Lapangan Futsal 169 B', '70000', '120000', 'http://localhost/SportyFast/./assets/lapangan/image/lapfutB.jpg'),
(1003, 'futsal', 'admin169', 'Lapangan C', 'Lapangan Futsal 169 C', '70000', '120000', 'http://localhost/SportyFast/./assets/lapangan/image/lapfutC.jpg'),
(2001, 'basket', 'adminmayasi', 'Lapangan Bayasi', 'Mayasi Basketball', '200000', '300000', 'http://localhost/SportyFast/./assets/lapangan/image/lapAbas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password_user` varchar(130) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password_user`, `no_telp`) VALUES
('', '', '94e723dc305f28b58ba1aba04e14aade037baa95', ''),
('ada', 'adada', 'f76afd5806d7c8d41d890ad0321a2676d02a3292', '1233'),
('aisyahparamastri', 'aisyah paramastri khairina', '5663bec6b51338020c7ebc0d8d65b7689d19abed', '081234567890'),
('arakhrn', 'ara', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'coba'),
('knpooami', 'kttirvaq', '3beca18752e89129a0aff16d61918cca6f43274d', '555-666-0606'),
('modavidck', 'mohamad david', '5663bec6b51338020c7ebc0d8d65b7689d19abed', '085338436164'),
('nurlailiis', 'laili cantik', '5663bec6b51338020c7ebc0d8d65b7689d19abed', '085745907300');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `kompetisi`
--
ALTER TABLE `kompetisi`
  ADD PRIMARY KEY (`id_kompetisi`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id_lapangan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
