-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 04:49 AM
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
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `id_user`, `pesan`) VALUES
(2, 9, 'Menunggu Jadwal Pengukuran'),
(3, 5, 'Menunggu Hasil Ukur'),
(4, 5, 'Menunggu Hasil Konfirmasi Dari Petugas Pemeriksa'),
(5, 5, 'Menunggu Pembayaran'),
(6, 5, 'Sertifikat Tanah anda telah kami terima. Silahkan download sertifikat anda.');

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_ukur_tanah`
--

CREATE TABLE `pengajuan_ukur_tanah` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `shgb` varchar(30) NOT NULL,
  `imb` varchar(30) NOT NULL,
  `sppt_pbb` varchar(30) NOT NULL,
  `provinsi` varchar(15) NOT NULL,
  `kota` varchar(15) NOT NULL,
  `kecamatan` varchar(15) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_ukur_tanah`
--

INSERT INTO `pengajuan_ukur_tanah` (`id`, `id_user`, `shgb`, `imb`, `sppt_pbb`, `provinsi`, `kota`, `kecamatan`, `alamat_lengkap`, `status`) VALUES
(2, 5, '62a1a7c0cc074.pdf', '62a1a7c0cc36e.pdf', '62a1a7c0cc60f.pdf', 'Kepulauan Riau', 'Batam Centre', 'Batam Centre', 'Perumahan Citra Batam', 'Selesai'),
(13, 5, '62a69cbf6c45f.pdf', '62a69cbf6ccc7.pdf', '62a69cbf6cfd6.pdf', 'Kepulauan Riau', 'Tiban', 'Tiban Kampung', 'Rt6/2', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `sertifikat_tanah`
--

CREATE TABLE `sertifikat_tanah` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `biaya` varchar(30) NOT NULL,
  `bukti_pembayaran` varchar(30) DEFAULT NULL,
  `sertifikat_tanah` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sertifikat_tanah`
--

INSERT INTO `sertifikat_tanah` (`id`, `id_pengajuan`, `biaya`, `bukti_pembayaran`, `sertifikat_tanah`, `status`) VALUES
(1, 2, '500.000', '62a2b21988286.pdf', '62a2b31c5984d.pdf', 'Selesai'),
(2, 13, '600.000', '62a6a4e070e52.pdf', '62a6a4f31397d.pdf', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_tanah`
--

CREATE TABLE `ukuran_tanah` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `id_petugas` int(11) DEFAULT NULL,
  `waktu_pengukuran` date DEFAULT NULL,
  `lebar_tanah` int(11) DEFAULT NULL,
  `panjang_tanah` int(11) DEFAULT NULL,
  `dokumen_pl` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ukuran_tanah`
--

INSERT INTO `ukuran_tanah` (`id`, `id_pengajuan`, `id_petugas`, `waktu_pengukuran`, `lebar_tanah`, `panjang_tanah`, `dokumen_pl`) VALUES
(3, 2, 9, '2022-06-07', 100, 120, '62a2a9c076455.pdf'),
(5, 13, 9, '2022-06-23', 50, 50, '62a6a26d4b0e3.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(70) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_ktp`, `email`, `password`, `telepon`, `alamat`) VALUES
(5, 'user', 'user', 'user', '2022-06-09', '331212053010001', 'user@gmail.com', '$2y$10$7rTSXINRD3V.XEpnwhmyoOQf8y1JEG5eDAvYZsPIFkUZQ89Qlz5jK', '0856785612221', 'user'),
(6, 'admin', 'admin', 'admin', '2022-06-09', '22456584563210', 'admin@gmail.com', '$2y$10$6xzssgOvYLDDAkDZPMxl2.DUm/q7PAL3BIA.sjV5U1zS4Lfxuwfl2', '085646663254', 'admin'),
(8, 'petugas', 'petugas1', 'petugas1', '2022-06-09', '1111111111111111', 'petugas1@gmail.com', '$2y$10$d/0m4ksgoD3.HAE91jRPS.c1jU0vAAR8.YMDSENsgf.hXJQaYabXC', '111111111111', 'petugas1'),
(9, 'petugas', 'petugas2', 'petugas2', '2022-06-03', '22222222222222222', 'petugas2@gmail.com', '$2y$10$1Saktq5C1pin9yMvuHwbyul7JMQM6tJtn47i76IG/GNJfQNYt0phK', '222222222222', 'petugas2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `pengajuan_ukur_tanah`
--
ALTER TABLE `pengajuan_ukur_tanah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `sertifikat_tanah`
--
ALTER TABLE `sertifikat_tanah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pengajuan_2` (`id_pengajuan`);

--
-- Indexes for table `ukuran_tanah`
--
ALTER TABLE `ukuran_tanah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_petugas_2` (`id_petugas`),
  ADD KEY `id_pengajuan_2` (`id_pengajuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengajuan_ukur_tanah`
--
ALTER TABLE `pengajuan_ukur_tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sertifikat_tanah`
--
ALTER TABLE `sertifikat_tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ukuran_tanah`
--
ALTER TABLE `ukuran_tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pengajuan_ukur_tanah`
--
ALTER TABLE `pengajuan_ukur_tanah`
  ADD CONSTRAINT `pengajuan_ukur_tanah_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `sertifikat_tanah`
--
ALTER TABLE `sertifikat_tanah`
  ADD CONSTRAINT `sertifikat_tanah_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_ukur_tanah` (`id`);

--
-- Constraints for table `ukuran_tanah`
--
ALTER TABLE `ukuran_tanah`
  ADD CONSTRAINT `ukuran_tanah_ibfk_1` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_ukur_tanah` (`id`),
  ADD CONSTRAINT `ukuran_tanah_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
