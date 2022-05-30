-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 03:43 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minipbl`
--

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_sk`
--

CREATE TABLE `pengajuan_sk` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `alamat_lengkap` varchar(200) NOT NULL,
  `shgb` varchar(30) NOT NULL,
  `imb` varchar(30) NOT NULL,
  `sppt_pbb` varchar(30) NOT NULL,
  `biaya` varchar(25) NOT NULL,
  `status` varchar(100) NOT NULL,
  `updated_at` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_sk`
--

INSERT INTO `pengajuan_sk` (`id`, `id_user`, `id_petugas`, `id_admin`, `provinsi`, `kecamatan`, `kota`, `alamat_lengkap`, `shgb`, `imb`, `sppt_pbb`, `biaya`, `status`, `updated_at`) VALUES
(11, 2, 1, 0, 'Jawa Tengah', 'Kramat', 'Tegal', 'Kertayasa rt5/6', '629090f753e7a.docx', '629090f75418a.pdf', '629090f754448.pdf', '', 'Selesai', ''),
(12, 2, NULL, 0, 'Kepulauan Riau', 'Citra', 'Batam Centre', 'Indomaret Greenland', '62909647d123d.jpg', '62909647d2108.png', '62909647d23ab.pdf', '', 'Menunggu Konfirmasi', '');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id`, `nama`, `tempat_lahir`, `tanggal_lahir`, `email`, `telepon`, `alamat`) VALUES
(1, 'uidn', 'tegal', '2022-05-04', 'udin@gmail.com', '0865-6565-6511', 'Batam Centre, Jl. Ahmad Yani, Tlk. Tering, Kec. Batam Kota, Kota Batam, Kepulauan Riau 29461'),
(2, 'fdg', 'dfg', '2022-05-27', 'dfg@gmail.com', 'dfg', 'asderwv a fdsfsdf');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat_tanah`
--

CREATE TABLE `sertifikat_tanah` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_tanah`
--

CREATE TABLE `ukuran_tanah` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `dokumen_pl` varchar(25) NOT NULL,
  `ukuran_tanah` varchar(25) NOT NULL,
  `tanggal_pengukuran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_ktp` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `email`, `telepon`, `alamat`, `is_admin`) VALUES
(2, 'user', '$2y$10$QQdSjHGezozwZ48Z6mlcUeMl1AycAgQfF/oWlXvOCUFK7OjWfd95a', 'batam', '2022-05-10', 2147483647, 'user@gmail.com', '085161316855', 'btam', 0),
(3, 'admin', '$2y$10$3AOdseb53RYuXJUxlgBRhuhoZBd4z9129TRN/aEvfmirKbbHBRujW', 'admin', '2022-05-11', 2147483647, 'admin@gmail.com', '0851546545454', 'batam', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan_sk`
--
ALTER TABLE `pengajuan_sk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`,`id_petugas`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sertifikat_tanah`
--
ALTER TABLE `sertifikat_tanah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `ukuran_tanah`
--
ALTER TABLE `ukuran_tanah`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_pengajuan` (`id_pengajuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan_sk`
--
ALTER TABLE `pengajuan_sk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sertifikat_tanah`
--
ALTER TABLE `sertifikat_tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ukuran_tanah`
--
ALTER TABLE `ukuran_tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_sk`
--
ALTER TABLE `pengajuan_sk`
  ADD CONSTRAINT `pengajuan_sk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `pengajuan_sk_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`);

--
-- Constraints for table `sertifikat_tanah`
--
ALTER TABLE `sertifikat_tanah`
  ADD CONSTRAINT `sertifikat_tanah_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_sk` (`id`);

--
-- Constraints for table `ukuran_tanah`
--
ALTER TABLE `ukuran_tanah`
  ADD CONSTRAINT `ukuran_tanah_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_sk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;