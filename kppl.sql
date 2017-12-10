-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Des 2017 pada 17.56
-- Versi Server: 10.1.13-MariaDB
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
('adminoleole', '5663bec6b51338020c7ebc0d8d65b7689d19abed', 'futsal');

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
  `jam` varchar(500) NOT NULL,
  `nota_pembayaran` varchar(256) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`no`, `type`, `nama`, `admin`, `kategori`, `nomer_identitas`, `nama_lapangan`, `tanggal`, `jam`, `nota_pembayaran`, `status`) VALUES
('1512917634', 'futsal', 'laili cantik', 'admin169', 'Pelajar', '5215100020', 'Lapangan A', '2017-12-10', '07:00-08:00', '', 0),
('31231', 'basket', 'laili cantik', 'admindbl', 'Pelajar', '2789163', 'DBL Arena', '2017-12-10', '06:00-07:00', 'http://localhost/SportyFast/./assets/nota/1-hd-wallppers-3d-fantasy-sky-islands.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kompetisi`
--

CREATE TABLE `kompetisi` (
  `id_kompetisi` varchar(200) NOT NULL,
  `nama_kompetisi` varchar(200) NOT NULL,
  `tanggal_kompetisi` date NOT NULL,
  `detail_kompetisi` text NOT NULL,
  `penyelenggara` varchar(200) NOT NULL,
  `lokasi_kompetisi` varchar(200) NOT NULL,
  `gambar_kompetisi` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kompetisi`
--

INSERT INTO `kompetisi` (`id_kompetisi`, `nama_kompetisi`, `tanggal_kompetisi`, `detail_kompetisi`, `penyelenggara`, `lokasi_kompetisi`, `gambar_kompetisi`) VALUES
('20002', 'Libels Cup', '2018-03-17', 'DBL Arena Gool Mangga Dua', 'admindbl', 'DBL Arena Surabaya Jl. Frontage Ahmad Yani Siwalankerto No.88, Ketintang, Gayungan, Kota SBY, Jawa Timur 60231', 'http://localhost/SportyFast/./assets/lapangan/image/kompetbas1.jpg'),
('20003', 'DBL Turnamen Antarpelajar Empat Negara ', '2018-05-18', 'Jumat, 18 Mei 2018 15.00 – 16.00 : DBL Indonesia All Star vs Gold Coast Junior All-Stars (putri) 17.00 - 18.00 : DBL Indonesia All Star vs Siglap Basketball Club (putra) 18.00 – 19.00 : Bandar Utama Damansara 3 High School vs DBL Indonesia All Star (putri)', 'admindbl', 'DBL Arena Surabaya Jl. Frontage Ahmad Yani Siwalankerto No.88, Ketintang, Gayungan, Kota SBY, Jawa Timur 60231', 'http://localhost/SportyFast/./assets/lapangan/image/kompetbas2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id_lapangan` int(11) NOT NULL,
  `type` enum('futsal','basket','badminton') NOT NULL,
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
(1001, 'futsal', 'admin169', 'Lapangan A', 'Lapangan Futsal 169 A', '70000', '120000', 'http://localhost/SportyFast/./assets/lapangan/image/lap14.jpg'),
(1002, 'futsal', 'admin169', 'Lapangan B', 'Lapangan Futsal 169 B', '70000', '120000', 'http://localhost/SportyFast/./assets/lapangan/image/lapfutB.jpg'),
(1003, 'futsal', 'admin169', 'Lapangan C', 'Lapangan Futsal 169 C', '70000', '120000', 'http://localhost/SportyFast/./assets/lapangan/image/lapfutC.jpg'),
(1004, 'futsal', 'admindynasty', 'Lapangan Dynasty', 'Terletak Jl. Raya Ngagel No.75, Ngagel, Wonokromo, Kota SBY, Jawa Timur 60246', '200000', '200000', 'http://localhost/SportyFast/./assets/lapangan/image/unnamed2.jpg'),
(1005, 'futsal', 'adminoleole', 'Ole Ole futsal Ngagel', 'Terletak di Jl. Upa Jiwa No.1, Ngagel, Wonokromo, Kota SBY, Jawa Timur 60246', '200000', '200000', 'http://localhost/SportyFast/./assets/lapangan/image/index.jpg'),
(1006, 'futsal', 'adminits', 'Lapangan Futsal PLN ITS', 'Terletak di  Campus ITS 60111, Jalan ITS Raya, Sukolilo, Keputih, Sukolilo, Kota SBY, Jawa Timur 60111', '60000', '60000', 'http://localhost/SportyFast/./assets/lapangan/image/main-futsal.jpg'),
(1007, 'futsal', 'adminits', 'Gor Pertamina ITS', 'Terletak di Jalan Raya ITS Campus ITS Sukolilo Surabaya Jawa Timur 60111, Keputih, Sukolilo, Kota SBY, Jawa Timur 60117', '280000', '300000', 'http://localhost/SportyFast/./assets/lapangan/image/fasor-its.jpg'),
(2001, 'basket', 'adminmayasi', 'Lapangan Mayasi', 'Mayasi Basketball', '200000', '300000', 'http://localhost/SportyFast/./assets/lapangan/image/lapAbas.jpg'),
(2002, 'basket', 'admindbl', 'DBL Arena', 'DBL Arena terletak di Jl. Frontage Ahmad Yani Siwalankerto No.88, Ketintang, Gayungan, Kota SBY, Jawa Timur 60231.  Lapangan berstandar internasional dengan kapasitasnya 5.000 penonton', '600000', '600000', 'http://localhost/SportyFast/./assets/lapangan/image/535898442.jpg'),
(2003, 'basket', 'adminhayamwuruk', 'GOR Kodam Brawijaya', 'Terletak di Jalan Hayam Wuruk No.17-42, Sawunggaling, Wonokromo, Sawunggaling, Wonokromo, Kota SBY, Jawa Timur 60242', '200000', '200000', 'http://localhost/SportyFast/./assets/lapangan/image/59899168_R6ZLD1uPJ4YZiJOmKc5j-ZwSKEBDQn92Nx7gZR5CG7Q.jpg'),
(2004, 'basket', 'admincls', 'GOR CLS KERTAJAYA', 'Berlokasi di Kertajaya Indah Timur I No.1, Manyar Sabrangan, Mulyorejo, Kota SBY, Jawa Timur 60116.', '500000', '500000', 'http://localhost/SportyFast/./assets/lapangan/image/009366500_1507886895-20838145_143872139532100_1750186219498635264_n.jpg'),
(2005, 'basket', 'adminits', 'Lapangan ITS a', ' Campus ITS 60111, Jl. ITS Raya, Keputih, Sukolilo, Kota SBY, Jawa Timur 6011', '60000', '80000', 'http://localhost/SportyFast/./assets/lapangan/image/CXoK4c5UoAAJVn9.jpg'),
(2006, 'basket', 'adminits', 'Lapangan ITS b', ' Campus ITS 60111, Jl. ITS Raya, Keputih, Sukolilo, Kota SBY, Jawa Timur 6011', '60000', '80000', 'http://localhost/SportyFast/./assets/lapangan/image/14073120_285681635139240_1975018378_n.jpg'),
(3001, 'badminton', 'adminhiqua', 'GOR Hi-Qua Wijaya', 'Terletak di Jalan Puri Lidah Kulon Indah (Depan perumahan Puri Lidah Kulon). Contact person : 081316041316 (Lina). Jumlah lapangan 17 lapangan dan tipenya full karpet. ', '60000', '60000', 'http://localhost/SportyFast/./assets/lapangan/image/1.jpg'),
(3002, 'badminton', 'adminmikasa', 'Gor mikasa', 'Terletak di Jalan Baratajaya XXI/3.A. Kriteria lapangan full karpet dan kayu. Contact person : 031-5010592/08179624828 (Elis)', '100000', '100000', 'http://localhost/SportyFast/./assets/lapangan/image/IMG_20170123_174538_HDR.jpg'),
(3003, 'badminton', 'admincahaya', 'GOR CAHAYA', 'Terletak di Jl. Raya Tengger KAndangan Blok 59 G No. 92, Surabaya Barat/Sambikerep. Dengan Fasilitas fitness/kebugaran. Tempatnya cukup luas dan berlantai keramik. Maka dari itu lantainya keramik. Contact person : 7410850', '200000', '200000', 'http://localhost/SportyFast/./assets/lapangan/image/3.jpg'),
(3004, 'badminton', 'admingrand', 'GRAND Badminton HALL', 'Terletak di  Jl. Tandes Lor No. 17 B Surabaya Utara/Tandes. Lapangan Karpet. Fasilitas : Toko Perlengkapan Badminton, Lapangan parkir yang luas. Lokasinya 200 meter arah timur (Sebelah Kiri Jalan) dari pertigaan jalan (Tandes Lor-Margomulyo). Contact Person : 7481991', '200000', '200000', 'http://localhost/SportyFast/./assets/lapangan/image/2.jpg');

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
('ada', 'adada', 'f76afd5806d7c8d41d890ad0321a2676d02a3292', '1233'),
('aisyahparamastri', 'aisyah paramastri khairina', '5663bec6b51338020c7ebc0d8d65b7689d19abed', '081234567890'),
('nurlailiis', 'laili cantik', '5663bec6b51338020c7ebc0d8d65b7689d19abed', '085745907300'),
('saputra', 'Putra', '5663bec6b51338020c7ebc0d8d65b7689d19abed', '085338436164');

-- --------------------------------------------------------

--
-- Struktur dari tabel `waktu`
--

CREATE TABLE `waktu` (
  `no` int(11) NOT NULL,
  `jam` varchar(500) NOT NULL,
  `nama_lapangan` varchar(500) NOT NULL,
  `pemilik` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `waktu`
--

INSERT INTO `waktu` (`no`, `jam`, `nama_lapangan`, `pemilik`, `status`) VALUES
(1, '06:00-07:00', 'Lapangan A', 'admin169', 1),
(2, '07:00-08:00', 'Lapangan A', 'admin169', 1),
(3, '08:00-09:00', 'Lapangan A', 'admin169', 0),
(4, '09:00-10:00', 'Lapangan A', 'admin169', 0),
(5, '10:00-11:00', 'Lapangan A', 'admin169', 0),
(6, '13:00-14:00', 'Lapangan A', 'admin169', 0),
(7, '14:00-15:00', 'Lapangan A', 'admin169', 0),
(8, '15:00-16:00', 'Lapangan A', 'admin169', 0),
(9, '16:00-17:00', 'Lapangan A', 'admin169', 0),
(10, '17:00-18:00', 'Lapangan A', 'admin169', 0),
(11, '18:00-19:00', 'Lapangan A', 'admin169', 0),
(12, '19:00-20:00', 'Lapangan A', 'admin169', 0),
(13, '20:00-21:00', 'Lapangan A', 'admin169', 0),
(14, '21:00-22:00', 'Lapangan A', 'admin169', 0),
(16, '06:00-07:00', 'Lapangan B', 'admin169', 0),
(17, '07:00-08:00', 'Lapangan B', 'admin169', 0),
(18, '08:00-09:00', 'Lapangan B', 'admin169', 0),
(19, '09:00-10:00', 'Lapangan B', 'admin169', 0),
(20, '10:00-11:00', 'Lapangan B', 'admin169', 0),
(21, '13:00-14:00', 'Lapangan B', 'admin169', 0),
(22, '14:00-15:00', 'Lapangan B', 'admin169', 0),
(23, '15:00-16:00', 'Lapangan B', 'admin169', 0),
(24, '16:00-17:00', 'Lapangan B', 'admin169', 0),
(25, '17:00-18:00', 'Lapangan B', 'admin169', 0),
(26, '18:00-19:00', 'Lapangan B', 'admin169', 0),
(27, '19:00-20:00', 'Lapangan B', 'admin169', 0),
(28, '20:00-21:00', 'Lapangan B', 'admin169', 0),
(29, '21:00-22:00', 'Lapangan B', 'admin169', 0),
(31, '06:00-07:00', 'Lapangan C', 'admin169', 0),
(32, '07:00-08:00', 'Lapangan C', 'admin169', 0),
(33, '08:00-09:00', 'Lapangan C', 'admin169', 0),
(34, '09:00-10:00', 'Lapangan C', 'admin169', 0),
(35, '10:00-11:00', 'Lapangan C', 'admin169', 0),
(36, '13:00-14:00', 'Lapangan C', 'admin169', 0),
(37, '14:00-15:00', 'Lapangan C', 'admin169', 0),
(38, '15:00-16:00', 'Lapangan C', 'admin169', 0),
(39, '16:00-17:00', 'Lapangan C', 'admin169', 0),
(40, '17:00-18:00', 'Lapangan C', 'admin169', 0),
(41, '18:00-19:00', 'Lapangan C', 'admin169', 0),
(42, '19:00-20:00', 'Lapangan C', 'admin169', 0),
(43, '20:00-21:00', 'Lapangan C', 'admin169', 0),
(44, '21:00-22:00', 'Lapangan C', 'admin169', 0),
(46, '06:00-07:00', 'DBL Arena', 'admindbl', 0),
(47, '07:00-08:00', 'DBL Arena', 'admindbl', 0),
(48, '08:00-09:00', 'DBL Arena', 'admindbl', 0),
(49, '09:00-10:00', 'DBL Arena', 'admindbl', 0),
(50, '10:00-11:00', 'DBL Arena', 'admindbl', 0),
(51, '13:00-14:00', 'DBL Arena', 'admindbl', 0),
(52, '14:00-15:00', 'DBL Arena', 'admindbl', 0),
(53, '15:00-16:00', 'DBL Arena', 'admindbl', 0),
(54, '16:00-17:00', 'DBL Arena', 'admindbl', 0),
(55, '17:00-18:00', 'DBL Arena', 'admindbl', 0),
(56, '18:00-19:00', 'DBL Arena', 'admindbl', 0),
(57, '19:00-20:00', 'DBL Arena', 'admindbl', 0),
(58, '20:00-21:00', 'DBL Arena', 'admindbl', 0),
(59, '21:00-22:00', 'DBL Arena', 'admindbl', 0);

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

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
