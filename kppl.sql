-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2017 at 01:37 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

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
  `password_admin` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`) VALUES
('arakhrn', '1234'),
('mohamad', '1234'),
('nurlailiis', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `no` varchar(256) NOT NULL,
  `nama` varchar(50) NOT NULL,
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

INSERT INTO `jadwal` (`no`, `nama`, `kategori`, `nomer_identitas`, `nama_lapangan`, `tanggal`, `jam`, `lama_sewa`, `status`) VALUES
('1', 'David', 'Mahasiswa', '5215100069', 'Lapangan A', '2017-09-13', '14:00:00', 1, 1),
('2', 'ara', 'Mahasiswa', '5215100000', 'Lapangan B', '2017-09-07', '17:00:00', 2, 0),
('1506941920', 'Nur laili', 'Mahasiswa', '5215100000', 'Lapangan C', '2017-10-02', '01:00:00', 1, 0),
('1506963199', 'laili ara', 'Mahasiswa', '5263362325', 'Lapangan B', '2017-10-02', '02:00:00', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` varchar(30) NOT NULL,
  `nama_lapangan` varchar(30) NOT NULL,
  `detail_lapangan` varchar(256) NOT NULL,
  `tarif_mahasiswa` varchar(30) NOT NULL,
  `tarif_nonits` varchar(30) NOT NULL,
  `gambar_lapangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `nama_lapangan`, `detail_lapangan`, `tarif_mahasiswa`, `tarif_nonits`, `gambar_lapangan`) VALUES
('1004', 'Lapangan A', 'Lapangan Futsal Fasor ITS', '80000', '100000', 'http://localhost/GIT/./assets/lapangan/image/2015-11-30_07_53_10_11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password_user` varchar(130) NOT NULL,
  `sewa_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password_user`, `sewa_user`) VALUES
('arakhrn', 'ara', '1234', 'coba'),
('nurlailis', 'tukiyem', '1234', 'coba 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username_admin`);

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
