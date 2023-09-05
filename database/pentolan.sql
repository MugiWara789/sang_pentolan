-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2023 at 05:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pentolan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `password` varchar(64) COLLATE utf8_bin NOT NULL,
  `divisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `divisi`) VALUES
(0, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0),
(1, 'admin1', '25f43b1486ad95a1398e3eeb3d83bc4010015fcc9bedb35b432e00298d5021f7', 1),
(2, 'admin2', '1c142b2d01aa34e9a36bde480645a57fd69e14155dacfab5a3f9257b77fdc8d8', 2),
(3, 'admin3', '4fc2b5673a201ad9b1fc03dcb346e1baad44351daa0503d5534b4dfdcc4332e0', 3),
(4, 'admin4', '110198831a426807bccd9dbdf54b6dcb5298bc5d31ac49069e0ba3d210d970ae', 4);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(0, 'Super Admin'),
(1, 'Pengemis'),
(2, 'Tunawisma'),
(3, 'Orang Terlantar'),
(4, 'Gelandangan');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `nama` varchar(64) COLLATE utf8_bin NOT NULL,
  `telpon` varchar(12) COLLATE utf8_bin NOT NULL,
  `alamat` varchar(256) COLLATE utf8_bin NOT NULL,
  `tujuan` int(11) NOT NULL,
  `isi` varchar(2048) COLLATE utf8_bin NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` varchar(255) COLLATE utf8_bin NOT NULL,
  `lokasi` varchar(255) COLLATE utf8_bin NOT NULL,
  `status` varchar(12) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id`, `nama`, `telpon`, `alamat`, `tujuan`, `isi`, `tanggal`, `foto`, `lokasi`, `status`) VALUES
(110, 'coba coba', '081234567899', 'Bukateja', 4, 'ada gelandangan', '2023-08-28 03:25:25', 'gambar/5946462_bc1398e0-28d4-4cf8-9ea6-069e42dfe3b3.jpg', 'Jl. Letnan Kilonel Isdiman, Dekat Kantor Kominfo', 'Menunggu'),
(112, 'coba ini', '087765432112', 'purwokerto', 1, 'ada pengemis', '2023-08-29 07:08:11', 'gambar/43613341_07f68449-8a94-4586-9fc3-a39c63abad93_700_700.jpg', 'Balai Desa Pamijen, Jalan Supardjo Rustam, Sokaraja Kulon, Banyumas, Central Java, Java, 53146, Indonesia', 'Menunggu'),
(2409, 'coba dan coba', '087765432112', 'purwokerto', 3, 'ada orang terlantar', '2023-08-30 06:29:00', 'gambar/Green-Tea-Png-Free-Download-1.png', 'Stadion Goentoer Darjono, Parkir, Purbalingga Food Center, Purbalingga Kidul, Purbalingga, Central Java, Java, 53311, Indonesia', 'Menunggu'),
(2618, 'coba cobaaaa', '087765432112', 'purwokerto', 1, 'pengemis', '2023-08-30 01:34:37', 'gambar/Go-Green-Forest.png', 'Jalan Letnan Kolonel Isdiman, Purbalingga, Central Java, Java, 53311, Indonesia', 'Menunggu'),
(4091, 'coba dan cobaaaaa', '098726761533', 'purwokerto', 1, 'faohefiaebgiyaegfuyae', '2023-08-30 06:40:39', 'gambar/images (1).jpeg', 'Klinik PMI Kab. Purbalingga, 116, Jalan Letnan Kolonel Isdiman, Purbalingga Food Center, Purbalingga, Central Java, Java, 53311, Indonesia', 'Menunggu'),
(4490, 'Dimas', '087765443231', 'Pemalang', 3, 'Saya melihat orang terlantar di dekat kantor kominfo', '2023-08-31 07:34:31', 'gambar/asus_rog_2-t2.jpg', 'Markas PMI Kab. Purbalingga, 116, Jalan Letnan Kolonel Isdiman, Purbalingga Food Center, Purbalingga, Central Java, Java, 53311, Indonesia', 'Menunggu'),
(6042, 'zhafran', '087765432112', 'candinata', 4, 'saya melihat gelandangan tiga orang di lampu merah.', '2023-08-30 04:55:42', 'gambar/1385091672.jpg', 'Klinik PMI Kab. Purbalingga, 116, Jalan Letnan Kolonel Isdiman, Purbalingga Food Center, Purbalingga, Central Java, Java, 53311, Indonesia', 'Ditanggapi');

-- --------------------------------------------------------

--
-- Table structure for table `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL,
  `admin` varchar(64) COLLATE utf8_bin NOT NULL,
  `isi_tanggapan` varchar(2048) COLLATE utf8_bin NOT NULL,
  `tanggal_tanggapan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_laporan`, `admin`, `isi_tanggapan`, `tanggal_tanggapan`) VALUES
(7, 6042, 'Admin', 'okee boss.... pengaduan anda akan segera kami tindak lanjuti', '2023-08-30 04:55:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `divisi` (`divisi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tujuan` (`tujuan`);

--
-- Indexes for table `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `laporan_ibfk_1` FOREIGN KEY (`tujuan`) REFERENCES `divisi` (`id_divisi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
