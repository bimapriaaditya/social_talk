-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2020 at 11:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `social_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `aduan`
--

CREATE TABLE `aduan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tanggal` date NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_kode_pos` int(11) NOT NULL,
  `keterangan_tempat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `img_bukti_1` varchar(255) DEFAULT NULL,
  `img_bukti_2` varchar(255) DEFAULT NULL,
  `img_bukti_3` varchar(255) DEFAULT NULL,
  `sifat` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `aduan_masyarakat`
--

CREATE TABLE `aduan_masyarakat` (
  `id` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `aduan_petugas`
--

CREATE TABLE `aduan_petugas` (
  `id` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `aduan_tanggapan`
--

CREATE TABLE `aduan_tanggapan` (
  `id` int(11) NOT NULL,
  `id_aduan` int(11) NOT NULL,
  `tanggapan` enum('1','2','3') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bagian`
--

CREATE TABLE `bagian` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bagian`
--

INSERT INTO `bagian` (`id`, `nama`) VALUES
(1, 'Humas Pemprov Jawa Barat'),
(2, 'Humas Permrprov DKI Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'Kekerasan Dalam Rumah Tangga (KDRT)'),
(2, 'Bencana Alam (Banjir)');

-- --------------------------------------------------------

--
-- Table structure for table `kode_pos`
--

CREATE TABLE `kode_pos` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_pos`
--

INSERT INTO `kode_pos` (`id`, `nama`) VALUES
(1, '40113'),
(2, '40114');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `nama`) VALUES
(1, 'Bandung'),
(2, 'Surabaya');

-- --------------------------------------------------------

--
-- Table structure for table `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_kode_pos` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(11) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `no_telepon` varchar(255) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_kode_pos` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `usia` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`) VALUES
(1, 'Jawa Barat'),
(2, 'Jawa Tengah');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aduan`
--
ALTER TABLE `aduan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_kota` (`id_kota`),
  ADD KEY `id_kode_pos` (`id_kode_pos`);

--
-- Indexes for table `aduan_masyarakat`
--
ALTER TABLE `aduan_masyarakat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aduan` (`id_aduan`),
  ADD KEY `id_masyarakat` (`id_masyarakat`);

--
-- Indexes for table `aduan_petugas`
--
ALTER TABLE `aduan_petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aduan` (`id_aduan`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `aduan_tanggapan`
--
ALTER TABLE `aduan_tanggapan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aduan` (`id_aduan`);

--
-- Indexes for table `bagian`
--
ALTER TABLE `bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kode_pos`
--
ALTER TABLE `kode_pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_kota` (`id_kota`),
  ADD KEY `id_kode_pos` (`id_kode_pos`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bagian` (`id_bagian`),
  ADD KEY `id_provinsi` (`id_provinsi`),
  ADD KEY `id_kota` (`id_kota`),
  ADD KEY `id_kode_pos` (`id_kode_pos`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
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
-- AUTO_INCREMENT for table `aduan`
--
ALTER TABLE `aduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aduan_masyarakat`
--
ALTER TABLE `aduan_masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aduan_petugas`
--
ALTER TABLE `aduan_petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aduan_tanggapan`
--
ALTER TABLE `aduan_tanggapan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bagian`
--
ALTER TABLE `bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kode_pos`
--
ALTER TABLE `kode_pos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `aduan`
--
ALTER TABLE `aduan`
  ADD CONSTRAINT `aduan_ibfk_3` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`),
  ADD CONSTRAINT `aduan_ibfk_4` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`),
  ADD CONSTRAINT `aduan_ibfk_5` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `aduan_ibfk_6` FOREIGN KEY (`id_kode_pos`) REFERENCES `kode_pos` (`id`);

--
-- Constraints for table `aduan_masyarakat`
--
ALTER TABLE `aduan_masyarakat`
  ADD CONSTRAINT `aduan_masyarakat_ibfk_1` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id`),
  ADD CONSTRAINT `aduan_masyarakat_ibfk_2` FOREIGN KEY (`id_masyarakat`) REFERENCES `masyarakat` (`id`);

--
-- Constraints for table `aduan_petugas`
--
ALTER TABLE `aduan_petugas`
  ADD CONSTRAINT `aduan_petugas_ibfk_1` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id`),
  ADD CONSTRAINT `aduan_petugas_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id`);

--
-- Constraints for table `aduan_tanggapan`
--
ALTER TABLE `aduan_tanggapan`
  ADD CONSTRAINT `aduan_tanggapan_ibfk_1` FOREIGN KEY (`id_aduan`) REFERENCES `aduan` (`id`);

--
-- Constraints for table `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`),
  ADD CONSTRAINT `masyarakat_ibfk_2` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`),
  ADD CONSTRAINT `masyarakat_ibfk_3` FOREIGN KEY (`id_kode_pos`) REFERENCES `kode_pos` (`id`),
  ADD CONSTRAINT `masyarakat_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_bagian`) REFERENCES `bagian` (`id`),
  ADD CONSTRAINT `petugas_ibfk_2` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id`),
  ADD CONSTRAINT `petugas_ibfk_3` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id`),
  ADD CONSTRAINT `petugas_ibfk_4` FOREIGN KEY (`id_kode_pos`) REFERENCES `kode_pos` (`id`),
  ADD CONSTRAINT `petugas_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
