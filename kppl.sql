-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10 Des 2017 pada 00.57
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username_admin` varchar(256) NOT NULL,
  `password_admin` varchar(256) NOT NULL,
  `type` enum('futsal','basket','badminton') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username_admin`, `password_admin`, `type`) VALUES
('admin169', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'futsal'),
('admincahaya', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'badminton'),
('admincls', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'basket'),
('admindbl', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'basket'),
('admindynasty', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'futsal'),
('admingrand', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'badminton'),
('adminhayamwuruk', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'basket'),
('adminhiqua', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'badminton'),
('adminits', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'basket'),
('adminmayasi', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'basket'),
('adminmikasa', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'badminton'),
('adminoleole', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'futsal'),
('adminpertamina', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'futsal'),
('adminpln', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'futsal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
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
  `nota_pembayaran` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`no`, `type`, `nama`, `admin`, `kategori`, `nomer_identitas`, `nama_lapangan`, `tanggal`, `jam`, `lama_sewa`, `nota_pembayaran`, `status`) VALUES
('1506941920', 'futsal', 'Nur laili', 'admin169', 'Pelajar', '5215100000', 'Lapangan C', '2017-10-02', '01:00:00', 1, '', 1),
('1508373366', 'basket', 'Putra', 'adminmayasi', 'Pelajar', '05241150000020', 'Lapangan Bayasi ', '2017-10-19', '09:00:00', 1, '', 0),
('1512409830', 'futsal', 'Lailis', 'admin169', 'Pelajar', '', 'Lapangan B', '2018-10-01', '07:00:00', 2, '', 0),
('1512451068', 'basket', 'laili cantik', 'adminmayasi', 'Pelajar', '', 'Lapangan Bayasi', '2017-12-19', '09:55:00', 1, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompetisi`
--

CREATE TABLE `kompetisi` (
  `id_kompetisi` varchar(200) NOT NULL,
  `nama_kompetisi` varchar(200) NOT NULL,
  `tanggal_kompetisi` date NOT NULL,
  `penyelenggara` varchar(200) NOT NULL,
  `lokasi_kompetisi` varchar(200) NOT NULL,
  `gambar_kompetisi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kompetisi`
--

INSERT INTO `kompetisi` (`id_kompetisi`, `nama_kompetisi`, `tanggal_kompetisi`, `penyelenggara`, `lokasi_kompetisi`, `gambar_kompetisi`) VALUES
('40001', 'Futsal 169 AYECOYYY', '2018-02-14', 'Futsal 169', 'Jl.bulak sari No.6 SURABAYA BARAT', 'http://localhost/GIT/SpotyFast/./assets/lapangan/image/home-bg.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
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
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id_lapangan`, `type`, `pemilik`, `nama_lapangan`, `detail_lapangan`, `tarif_student`, `tarif_umum`, `gambar_lapangan`) VALUES
(1001, 'futsal', 'admin169', 'Lapangan A', 'Lapangan Futsal 169 A', '70000', '120000', 'http://localhost/GIT/SpotyFast/./assets/lapangan/image/lap14.jpg'),
(1002, 'futsal', 'admin169', 'Lapangan B', 'Lapangan Futsal 169 B', '70000', '120000', 'http://localhost/GIT/SpotyFast/./assets/lapangan/image/lapfutB.jpg'),
(1003, 'basket', 'admindbl', 'DBL Arena', 'DBL Arena terletak di Jl. Frontage Ahmad Yani Siwalankerto No.88, Ketintang, Gayungan, Kota SBY, Jawa Timur 60231.  Lapangan berstandar internasional dengan kapasitasnya 5.000 penonton', 'per shift Rp. 600.000', 'per shift Rp. 600.000', 'http://localhost/SportyFast/./assets/lapangan/image/535898442.jpg'),
(1004, 'futsal', 'nurlailiis', 'Lapangan A', 'Lapangan Futsal 169 B', 'Rp. 70.000,00/jam untuk Pelajar', 'Rp. 120.000,00/jam untuk Umum', 'http://localhost/GIT/SpotyFast/./assets/lapangan/image/lap13.jpg'),
(1005, 'basket', 'admincls', 'GOR CLS KERTAJAYA', 'Berlokasi di Kertajaya Indah Timur I No.1, Manyar Sabrangan, Mulyorejo, Kota SBY, Jawa Timur 60116.', 'Rp. 500.000/jam', 'Rp. 500.000/jam', 'http://localhost/SportyFast/./assets/lapangan/image/009366500_1507886895-20838145_143872139532100_1750186219498635264_n.jpg'),
(1006, 'basket', '', 'Lapangan ITS a', ' Campus ITS 60111, Jl. ITS Raya, Keputih, Sukolilo, Kota SBY, Jawa Timur 6011', 'Rp.60.000', 'Rp.80.000', 'http://localhost/SportyFast/./assets/lapangan/image/CXoK4c5UoAAJVn9.jpg'),
(1007, 'basket', '', 'Lapangan ITS b', ' Campus ITS 60111, Jl. ITS Raya, Keputih, Sukolilo, Kota SBY, Jawa Timur 6011', 'Rp.60.000', 'Rp.80.000', 'http://localhost/SportyFast/./assets/lapangan/image/14073120_285681635139240_1975018378_n.jpg'),
(1008, '', '', 'GOR Kodam Brawijaya', 'Terletak di Jalan Hayam Wuruk No.17-42, Sawunggaling, Wonokromo, Sawunggaling, Wonokromo, Kota SBY, Jawa Timur 60242', 'Rp. 200.000/jam', 'Rp. 200.000/jam', 'http://localhost/SportyFast/./assets/lapangan/image/59899168_R6ZLD1uPJ4YZiJOmKc5j-ZwSKEBDQn92Nx7gZR5CG7Q.jpg'),
(1009, 'futsal', '', 'Lapangan Dynasty', 'Terletak Jl. Raya Ngagel No.75, Ngagel, Wonokromo, Kota SBY, Jawa Timur 60246', 'Rp. 200.000/jam', 'Rp. 200.000/jam', 'http://localhost/SportyFast/./assets/lapangan/image/unnamed2.jpg'),
(1222, 'futsal', '', 'Ole Ole futsal Ngagel', 'Terletak di Jl. Upa Jiwa No.1, Ngagel, Wonokromo, Kota SBY, Jawa Timur 60246', 'Rp. 200.000/jam', 'Rp. 200.000/jam', 'http://localhost/SportyFast/./assets/lapangan/image/index.jpg'),
(1234, 'futsal', '', 'Lapangan Futsal PLN ITS', 'Terletak di  Campus ITS 60111, Jalan ITS Raya, Sukolilo, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111', 'Rp. 60.000', 'Rp. 60.000', 'http://localhost/SportyFast/./assets/lapangan/image/main-futsal.jpg'),
(1456, 'futsal', '', 'Gor Pertamina ITS', 'Terletak di Jalan Raya ITS Campus ITS Sukolilo Surabaya Jawa Timur 60111, Keputih, Sukolilo, Kota SBY, Jawa Timur 60117', 'Rp. 280.000/jam', 'Rp. 300.000/jam', 'http://localhost/SportyFast/./assets/lapangan/image/fasor-its.jpg'),
(2001, 'basket', 'adminmayasi', 'Lapangan Bayasi', 'Mayasi Basketball', '200000', '300000', 'http://localhost/GIT/SpotyFast/./assets/lapangan/image/lapAbas.jpg'),
(2345, '', '', 'GOR Hi-Qua Wijaya', 'Terletak di Jalan Puri Lidah Kulon Indah (Depan perumahan Puri Lidah Kulon). Contact person : 081316041316 (Lina). Jumlah lapangan 17 lapangan dan tipenya full karpet. ', 'Rp. 60.000/jam', 'Rp. 60.000/jam', 'http://localhost/SportyFast/./assets/lapangan/image/1.jpg'),
(4567, '', '', 'Gor mikasa', 'Terletak di Jalan Baratajaya XXI/3.A. Kriteria lapangan full karpet dan kayu. Contact person : 031-5010592/08179624828 (Elis)', 'Rp. 100.000/jam', 'Rp. 100.000/jam', 'http://localhost/SportyFast/./assets/lapangan/image/IMG_20170123_174538_HDR.jpg'),
(5678, '', '', 'GOR CAHAYA', 'Terletak di Jl. Raya Tengger KAndangan Blok 59 G No. 92, Surabaya Barat/Sambikerep. Dengan Fasilitas fitness/kebugaran. Tempatnya cukup luas dan berlantai keramik. Maka dari itu lantainya keramik. Contact person : 7410850', 'Rp. 200.000/jam', 'Rp. 200.000/jam', 'http://localhost/SportyFast/./assets/lapangan/image/3.jpg'),
(6789, '', '', 'GRAND Badminton HALL', 'Terletak di  Jl. Tandes Lor No. 17 B Surabaya Utara/Tandes. Lapangan Karpet. Fasilitas : Toko Perlengkapan Badminton, Lapangan parkir yang luas. Lokasinya 200 meter arah timur (Sebelah Kiri Jalan) dari pertigaan jalan (Tandes Lor-Margomulyo). Contact Person : 7481991', 'Rp. 200.000/jam', 'Rp. 200.000/jam', 'http://localhost/SportyFast/./assets/lapangan/image/2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password_user` varchar(130) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
