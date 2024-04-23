-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 04:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry_beni`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `keterangan` text NOT NULL,
  `harga_paket` int(11) NOT NULL,
  `total_harga` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail`, `id_transaksi`, `id_paket`, `qty`, `keterangan`, `harga_paket`, `total_harga`) VALUES
(53, 164, 23, 1, '', 50000, 50000),
(54, 166, 29, 10, '', 50000, 500000),
(55, 168, 23, 1, '', 50000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama`, `alamat`, `jenis_kelamin`, `tlp`) VALUES
(1, 'Benny', 'Jln. Danau Robot', 'Laki-laki', '082421512535'),
(2, 'Andi', 'Jln Naga Robot', 'Laki-laki', '082377538535'),
(3, 'Nyoman', 'Jln.Batu Karu', 'Perempuan', '089243525236');

-- --------------------------------------------------------

--
-- Table structure for table `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nama`, `alamat`, `tlp`) VALUES
(2, 'Sinar Buaya', 'Jln. Pulau Moyo', '08234567'),
(5, 'Sinar Bebek Angsa', 'Jln. Danau Tamblingan', '08124192414'),
(35, 'Sinar Naga', 'Jln. Danau Beratan', '0219431123314'),
(41, 'Maharaja', 'Jln. Gunung Agung', '08124125125');

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `jenis` enum('kiloan','selimut','bed_cover','kaos','lain') NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `id_outlet`, `jenis`, `nama_paket`, `harga`) VALUES
(23, 2, 'kaos', 'Kaos Ogoh Ogoh', 50000),
(27, 41, 'kaos', 'Kaos Ogoh Ogoh ', 30000),
(29, 41, 'kaos', 'Kaos Layang-Layang', 50000),
(30, 2, 'selimut', 'Selimut Tebal', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_invoice` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `biaya_tambahan` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(11) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `dibayar` enum('dibayar','belum_dibayar') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_outlet`, `kode_invoice`, `id_member`, `tgl`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `dibayar`, `id_user`) VALUES
(162, 2, 'INV/2024/04/15/1', 1, '2024-04-15 22:03:05', '2024-04-18 22:03:05', '0000-00-00 00:00:00', 0, 0, 0, 'proses', 'belum_dibayar', 5),
(163, 2, 'INV/2024/04/15/2', 1, '2024-04-15 22:37:56', '2024-04-18 22:37:56', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 5),
(164, 2, 'INV/2024/04/15/3', 1, '2024-04-15 22:38:21', '2024-04-18 22:38:21', '2024-04-16 08:43:49', 0, 0, 0, 'diambil', 'dibayar', 5),
(165, 2, 'INV/2024/04/16/4', 2, '2024-04-16 08:42:51', '2024-04-19 08:42:51', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 5),
(166, 41, 'INV/2024/04/16/5', 3, '2024-04-16 08:45:43', '2024-04-19 08:45:43', '0000-00-00 00:00:00', 0, 0, 0, 'proses', 'belum_dibayar', 19),
(167, 2, 'INV/2024/04/16/6', 2, '2024-04-16 08:59:37', '2024-04-19 08:59:37', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 5),
(168, 2, 'INV/2024/04/16/7', 1, '2024-04-16 08:59:44', '2024-04-19 08:59:44', '0000-00-00 00:00:00', 0, 0.1, 0, 'proses', 'belum_dibayar', 5),
(169, 2, 'INV/2024/04/16/8', 1, '2024-04-16 09:09:48', '2024-04-19 09:09:48', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 5),
(170, 41, 'INV/2024/04/16/9', 1, '2024-04-16 09:14:14', '2024-04-19 09:14:14', '0000-00-00 00:00:00', 0, 0, 0, 'baru', 'belum_dibayar', 19);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `id_outlet`, `role`) VALUES
(5, 'Benny', 'benny', '$2y$10$nQOKikJaWPwBP7p0J/rWW.Gl3QeuXoiKClXaSeIRslL9xX48BC2Gm', 2, 'admin'),
(17, 'kadek', 'kadek', '$2y$10$gZxEimT//hzXN9oNtNk1TeGAoxmxtKGE.P5Fl9E5bYdRunvaaBgRe', 41, 'admin'),
(18, 'kawan', 'kawan', '$2y$10$uDD4q.57m73BV/nQ7KhAMOSHc3kL2cg7A4KJDnZGnO.qzo5UQ9Glu', 2, 'kasir'),
(19, 'teman', 'teman', '$2y$10$m/FwtKsFcmAewO6G73OvceASUC.x2y/sriRocC/WLXoa1X47Fgeoa', 41, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_transaksi` (`id_transaksi`,`id_paket`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indexes for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_outlet` (`id_outlet`) USING BTREE;

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_member` (`id_member`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`),
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`);

--
-- Constraints for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`);

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`),
  ADD CONSTRAINT `tb_transaksi_ibfk_4` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
