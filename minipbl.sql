-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2022 at 05:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

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
(10, 'petugas', 'Azlan', 'Tegal', '2003-02-04', '3525015201880002', 'azlan@gmail.com', '$2y$10$JU/DksOl9uH6k7IsdoRsUegacHZNzpg1bbmpKz/GHWAiFr89bUCH2', '081233537492', 'Citra Batam, Batam Center'),
(11, 'petugas', 'Dicky', 'Batam', '2000-08-04', '3525010510930001', 'dicky@gmail.com', '$2y$10$vDvNo5GEavmcM/1zR0I7/OE.fz.p6/tAqf0hWt3Rx63//yKjaiiKe', '081364673820', 'Tiban Indah McDermott'),
(12, 'petugas', 'Rido ', 'Batam', '2002-10-04', '3525016005650004', 'rido@gmail.com', '$2y$10$z5gFFr3udhBc4YzSRYXFJee8bq8XPbe/cFEDOY3NczNOpz1OMLwYy', '087779596460', 'Tiban Indah, Sekupang'),
(13, 'petugas', 'Jessica', 'Batam', '2001-04-06', '3525015306780002', 'jess@gmail.com', '$2y$10$q/PGQXNwbaUQrCCI4utbtOY1.jEz2GcKVDCFuU9epoj1Liff1wg66', '086764611916', 'Bengkong indah atas'),
(14, 'petugas', 'Metri', 'Batam', '2000-12-11', '3525016501830002', 'metri@gmail.com', '$2y$10$AAgDuiDqiEntkpcylKZOh.P3mFji.eVMrp3hpFtgpPsU36dg7Nn1i', '087996582426', 'Bengkong Palapa, Tanjung guntung'),
(15, 'petugas', 'Manda', 'Batam', '2001-07-26', '3525011506830001', 'manda@gmail.com', '$2y$10$L.a4Bjij.KJf73iv.y9GleL1BRM/4.fHXy1Oiz9SuJ7nqflHAkejG', '085364987250', 'Batu Aji, tanjung uncang\r\n'),
(16, 'petugas', 'Depri', 'Batam', '2000-04-05', '3525017006650078', 'depri@gmail.com', '$2y$10$6b0.yW1Lac3/FR1ne673weYgcs09tBnPZoyylalURDaQSxwN3bzde', '081365829185', 'Sekupang, Tiban koperasi'),
(17, 'petugas', 'Tegar', 'Bengkulu', '2000-10-15', '3525017006620060', 'tegar@gmail.com', '$2y$10$fLxcGddCQrbW5XN3jIdbZe./WomH457mPuDSKJyXT.c16N3pRLTYe', '087996522845', 'Baloi, Tanjung Uma'),
(18, 'petugas', 'Hilal', 'Batam', '2000-04-08', '3525017006950028', 'hilal@gmail.com', '$2y$10$Zs0IP/0vjtz1hsfddwVSPuaZzgT6Des6syF2Uke6Zq.8fkODUcyYG', '081365287942', 'Batu besar , Nongsa , Kampung Melayu');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
