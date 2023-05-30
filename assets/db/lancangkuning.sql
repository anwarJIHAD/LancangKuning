-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2023 at 10:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lancangkuning`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_ilegal`
--

CREATE TABLE `detail_ilegal` (
  `id_detail` int(11) NOT NULL,
  `no_korban` varchar(20) NOT NULL,
  `id_pelaku` int(11) NOT NULL,
  `id_pendukung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_ilegal`
--

INSERT INTO `detail_ilegal` (`id_detail`, `no_korban`, `id_pelaku`, `id_pendukung`) VALUES
(14, 'P', 3, 1),
(15, 'PPPP', 5, 17),
(16, 'PL1676173107', 6, 1),
(26, 'KR1676176929', 9, 18),
(27, 'KR1676176929', 10, 18),
(36, 'KR1676213531', 21, 24),
(38, 'KR1678335246', 25, 26),
(39, 'KR1678335273', 25, 26),
(43, 'KR1678469650', 27, 28),
(44, 'KR1678469650', 28, 28),
(47, 'KR1678503615', 29, 2),
(48, 'KR1678503615', 30, 2),
(49, 'KR1678503889', 31, 1),
(50, 'KR1678590088', 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `id` int(255) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`id`, `NIP`, `keterangan`, `file`) VALUES
(8, '11111111', 'android_valorant1.pdf', 'android_valorant2.pdf'),
(9, '11111111', 'android_valorant3.pdf', 'android_valorant4.pdf'),
(10, '1234', 'MhdAnwar-AKJK-CSE-20TIC-2-certificate.pdf', 'MhdAnwar-AKJK-COA-20TIC-2-certificate.pdf'),
(12, '1212', 'berkas photo', 'adafsdfasasd'),
(13, '1212', 'asdassdas', ''),
(14, '1212', 'berkas ke 3', ''),
(15, '1212', 'berkas 4', 'pdf_(1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `pelaku`
--

CREATE TABLE `pelaku` (
  `id_pelaku` int(11) NOT NULL,
  `id_pendukung` int(11) NOT NULL,
  `nama_pelaku` varchar(255) NOT NULL,
  `peran` varchar(255) NOT NULL,
  `asal_daerah` varchar(255) NOT NULL,
  `pelaku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaku`
--

INSERT INTO `pelaku` (`id_pelaku`, `id_pendukung`, `nama_pelaku`, `peran`, `asal_daerah`, `pelaku`) VALUES
(3, 17, 'andi', 'utama', 'bangko', ''),
(4, 16, 'id_16', 'mata mata', 'bangko bang ardi', ''),
(5, 17, 'Anwor', 'HH', 'HH', ''),
(6, 17, 'wOr', 'rr', 'rr', ''),
(7, 17, 'joi', 'perantara', 'pekanbaru', ''),
(8, 17, 'asas', 'asda', 'adas', ''),
(9, 18, 'j', 'sdfsd', 'sdfsd', ''),
(10, 18, 'Anwor', 'cvbc', 'xcvxc', ''),
(11, 19, 'ardi', 'penculik', 'bandung', ''),
(12, 19, 'indri', 'pemantau', 'rokan', ''),
(13, 20, 'anwar', 'mata mata', 'bandung', ''),
(14, 20, 'joko', 'pembunuh', 'cikarang', ''),
(15, 21, 'anwar', 'petugas', 'indramayu', ''),
(16, 21, 'indro', 'pembunuh', 'indonesia', ''),
(17, 22, 'asd', 'asda', 'asd', ''),
(18, 22, 'asd', 'asda', 'as', ''),
(19, 23, 'asdsa', 'asda', 'asd', ''),
(20, 23, 'wee', 'wew', 'as', ''),
(21, 24, 'delau', 'fgd_', 'wq_', ''),
(22, 24, 'Anwor_9', 'sdfs_', 'sfdds_)_&', ''),
(23, 24, 'as', 'mata mata', 'duri', ''),
(24, 25, 'budi', 'penculik', 'bagan', ''),
(25, 26, 'anggi', 'asa', 'bangko', ''),
(27, 28, 'Anwor', 'asa', 'asda', ''),
(28, 28, 'asa', 'asda', 'asda', ''),
(29, 2, 'Anwor', 'asdas', 'asd', ''),
(30, 2, 'fgf', 'fgf', 'fgf', ''),
(31, 1, 'Anwor', 'dfd', 'dfgd', '');

-- --------------------------------------------------------

--
-- Table structure for table `pmi`
--

CREATE TABLE `pmi` (
  `id_pmi` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `negara_penempatan` varchar(50) NOT NULL,
  `tgl_datang` date NOT NULL,
  `jenis_pulang` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `debarkas` varchar(50) NOT NULL,
  `ket` varchar(1000) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmi`
--

INSERT INTO `pmi` (`id_pmi`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `negara_penempatan`, `tgl_datang`, `jenis_pulang`, `alamat`, `provinsi`, `debarkas`, `ket`, `file`) VALUES
(6, 'anwar2', 'laki-laki', '2023-02-08', 'melaysia', '2023-02-08', 'PMI TerkendalaEE', 'asa', 'riau', 'dumai', '2266', ''),
(7, 'anwar', 'laki-laki', '2023-03-08', 'indonesia', '2023-03-15', 'PMI Terkendala', 'bangko', 'riau', 'dumai', 'sakit', ''),
(8, 'delau', 'laki-laki', '2023-03-23', 'malaysia', '2023-03-22', 'Pencegahan Penempatan ilegal', 'pekanbaru', 'jabar', 'dumai', 'sudah selesai', ''),
(9, 'boby', 'laki-laki', '2023-03-15', 'melaysia', '2023-03-07', 'jenazah', 'asa', 'riau', 'dumai', 'dibu', '');

-- --------------------------------------------------------

--
-- Table structure for table `pmi_ilegal`
--

CREATE TABLE `pmi_ilegal` (
  `id_ilegal` int(11) NOT NULL,
  `id_pendukung` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_paspor` varchar(50) NOT NULL,
  `no_ktp` int(50) NOT NULL,
  `Daerah_asal_rekrut` varchar(50) NOT NULL,
  `negara_tujuan` varchar(50) NOT NULL,
  `no_korban` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmi_ilegal`
--

INSERT INTO `pmi_ilegal` (`id_ilegal`, `id_pendukung`, `nama`, `no_paspor`, `no_ktp`, `Daerah_asal_rekrut`, `negara_tujuan`, `no_korban`) VALUES
(22, 24, 'anwar-', 'bbbbb-', 121211, 'rohil_', 'inggris_', 'KR1676213531'),
(23, 26, 'anwar', '234242', 23423, 'dumai', 'indonesi', 'KR1678335246'),
(24, 26, 'adsa', '234234', 2324, 'medan', 'indonesia', 'KR1678335273'),
(28, 28, 'dedi__', 'd34reg', 121211, 'rohil', 'inggris', 'KR1678469650'),
(30, 2, 'anwar', 'c888', 121211, 'dss', 'inggris', 'KR1678503615'),
(31, 1, 'anwar', 'dfgfdre', 333, '33453', 'fhgfh', 'KR1678503889'),
(32, 1, 'fajar', 'bbbbb-', 2323, 'bangko', 'indonesia', 'KR1678590088');

-- --------------------------------------------------------

--
-- Table structure for table `pmi_pendukung`
--

CREATE TABLE `pmi_pendukung` (
  `id_pendukung` int(11) NOT NULL,
  `pelaksana` varchar(255) NOT NULL,
  `tgl_pelaksana` date NOT NULL,
  `TKP` varchar(255) NOT NULL,
  `lokasi_shelter` varchar(255) NOT NULL,
  `instansi_penindaklanjut` varchar(255) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmi_pendukung`
--

INSERT INTO `pmi_pendukung` (`id_pendukung`, `pelaksana`, `tgl_pelaksana`, `TKP`, `lokasi_shelter`, `instansi_penindaklanjut`, `keterangan`) VALUES
(1, 'pelaksana pertama', '2017-01-12', 'Sungai Senteng Parit Gantung Desa Kedabu Rapat Kec. Rangsang Pesisir Kab.  Meranti Provinsi Riau', 'BP3MI Riau', 'Polres Meranti', 'Terdakwa divonis 1 tahun penjara'),
(2, 'Polres Dumai', '2018-01-17', 'Penginapan Kurnia Jl. Pepaya Kel. Rimba Sekampung Kota Dumai ', 'P4MI Kota Dumai / BP3MI Riau', 'Polres Dumai ', 'Terdakwa I dan II divonis 1 Tahun 4 bulan penjara dan denda 1 M (1 bulan penjara). Terdakwa III divonis 1 tahun 6 bulan penjara dan denda 1 M (2 bulan penjara)'),
(3, 'polsek dumai', '2023-02-15', 'bangko', 'dumai', '', ''),
(12, 'asdas', '2023-02-18', 'asda', 'asdas', '', ''),
(13, 'rr', '2023-02-05', 'bangko', 'asdas', '', ''),
(14, 'GG', '2023-02-17', 'bangko', 'asda', '', ''),
(15, 'ardi', '2023-02-15', 'ada', 'adass', '', ''),
(16, 'anwor res', '2023-02-14', 'bangko', 'asda', '', ''),
(17, 'aldi', '2023-02-16', 'bandung', 'indonesia_', '', ''),
(18, 'sassas', '2023-02-09', 'asdas', 'asda', '', ''),
(19, 'polres batam__', '2023-02-15', 'bangko__', 'dumai__', '', ''),
(20, 'polsek mandau', '2023-02-15', 'pekanbaru', 'rumbai__', '', ''),
(21, 'polsek bangko', '2023-02-22', 'rumbai', 'pekanbaru_', '', ''),
(22, 'asdas', '2023-02-21', 'sds', 'sdfs', '', ''),
(23, 'asdas', '2023-02-08', 'bangko', 'asdas', '', ''),
(24, 'polsek dumai', '2023-02-08', 'bangko_', 'lokasi_', '', ''),
(25, 'polsek dumai', '2023-03-13', 'bengkalis', 'betam', '', ''),
(26, 'bareskrim', '2023-03-14', 'batam', 'dumai', '', ''),
(28, 'bissmillah', '2023-03-15', 'ada', 'dumai', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(255) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `NIP`, `no_surat`, `tgl_keluar`, `pengirim`, `perihal`, `surat`) VALUES
(1, '1234567890', '31', '0002-02-02', '2', '2', 'Latihan_Evaluasi_Edisi_Lebaran.docx'),
(4, '11111111', '12333', '0001-01-01', '12', '21', 'android_valorant6.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id` int(255) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `tgl_kirim` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `NIP`, `no_surat`, `tgl_kirim`, `tgl_terima`, `pengirim`, `perihal`, `surat`) VALUES
(4, '1234567890', '31', '0001-03-31', '0001-03-31', '31', '31', 'Latihan_Soal_Linux1.docx'),
(7, '11111111', '1222234', '0001-01-01', '0001-01-12', '1351', '11', 'android_valorant.docx'),
(8, '1234', '123', '2023-03-09', '2023-03-06', 'pmi pusat', 'pmi ilegal', 'LAPORAN_BON_PKM_PCR-ROHIL_(1).pdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `NIP` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `role` varchar(255) NOT NULL,
  `status_pegawai` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `jenis_jabatan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `no_hp` int(15) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `masa_kerja` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIP`, `nama`, `password`, `gambar`, `role`, `status_pegawai`, `pangkat`, `jenis_jabatan`, `jabatan`, `no_hp`, `pendidikan_terakhir`, `masa_kerja`, `email`, `tgl_akhir`) VALUES
('11111111', 'del', '$2y$10$3YotZ9dPo1ArrGn8HeCpEOPGHY3Gwh/3xvL7/b8PjOpFLUjWaUl66', 'dlw.jpeg', 'User', '2', '2', '2', '2', 2, '2', 2, '2', '0002-02-02'),
('1212', 'anwar32c', '$2y$10$EnOa4P3xVTaiaCj2hy5l5.Z952fI29ECBfOv19NVH0vz3lz3BO5Ba', 'latar_merah.jpg', 'User', 'pns', '1', 'struktural', 'kepala', 211313433, 'si', 34, 'anwar@gmail.com', '2021-10-20'),
('1234', 'ANWAR2', '$2y$10$qtkpLzpcI0pIe2PIox/FiuLi.13yYNQ/4KinxX6Kyu4K/2S5pgTmq', 'latar_merah1.jpg', 'User', 'pns', '1', 'admin', 'analis tenaga kerja', 0, 'sma', 0, '2324', '2021-03-10'),
('1234512345', 'da', '$2y$10$dV7w3kK9ybwI7.7PGt.XI.7WYi5SK6MUzEJfB6wemZV9vz3/lDk2G', 'default.png', 'User', '', '', '', '', 0, '', 0, '', '0000-00-00'),
('12345678', 'admin', '$2y$10$wTfzF3Adz747uapQCYYYBuzGyivbNnRmt0ZTlAlUAULsFAaTU7Qdu', 'default.png', 'Admin', '1', '1', '1', '1', 1, '1', 1, '1', '0001-01-01'),
('1234567890', 'Laurin Madelau', '$2y$10$hs3g1GPeZO1SX.0FAZBRtOZCsLr2cGAUxLi024Il4ygUqEp6V26WW', 'Laurin_Madelau_20553010671.JPG', 'User', '2', 'KETUA PCR PELALAWAN', 'KETUA PCR PELALAWAN', 'KETUA PCR PELALAWAN', 31, '2', 2, '2', '2021-01-30'),
('12345678900', 'delau', '$2y$10$9Q.mIVp9r6XE7WCvqlJowuCL/MVxuA2LNDPKoD47oLC9zoU5yFbcW', 'default.png', 'User', '', '', '', '', 0, '', 0, '', '0000-00-00'),
('22222222', 'Jett', '$2y$10$Kx5edIx7cYauSn1wyX1D9eB1B.MmbcG9KgRH.obxkvoSqbCOhkcue', 'default.png', 'User', '', '', '', '', 0, '', 0, '', '0000-00-00'),
('87654321', 'anwarjihad', '$2y$10$Yv3i2mMry.c7aDNt2bHdT.S14dy85RXUi4BEC2xruAJyWNjjM380C', 'latar_merah.jpg', 'User', 'pns', '1', 'analis', 'KELAPA', 0, 's1', 0, '2323', '2021-03-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_ilegal`
--
ALTER TABLE `detail_ilegal`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `pelaku` (`id_pelaku`),
  ADD KEY `pendukung` (`id_pendukung`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`NIP`);

--
-- Indexes for table `pelaku`
--
ALTER TABLE `pelaku`
  ADD PRIMARY KEY (`id_pelaku`),
  ADD KEY `id_pendukung` (`id_pendukung`);

--
-- Indexes for table `pmi`
--
ALTER TABLE `pmi`
  ADD PRIMARY KEY (`id_pmi`);

--
-- Indexes for table `pmi_ilegal`
--
ALTER TABLE `pmi_ilegal`
  ADD PRIMARY KEY (`id_ilegal`),
  ADD KEY `id_pendukung` (`id_pendukung`);

--
-- Indexes for table `pmi_pendukung`
--
ALTER TABLE `pmi_pendukung`
  ADD PRIMARY KEY (`id_pendukung`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip2` (`NIP`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip1` (`NIP`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_ilegal`
--
ALTER TABLE `detail_ilegal`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pelaku`
--
ALTER TABLE `pelaku`
  MODIFY `id_pelaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pmi`
--
ALTER TABLE `pmi`
  MODIFY `id_pmi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pmi_ilegal`
--
ALTER TABLE `pmi_ilegal`
  MODIFY `id_ilegal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pmi_pendukung`
--
ALTER TABLE `pmi_pendukung`
  MODIFY `id_pendukung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_ilegal`
--
ALTER TABLE `detail_ilegal`
  ADD CONSTRAINT `pelaku` FOREIGN KEY (`id_pelaku`) REFERENCES `pelaku` (`id_pelaku`),
  ADD CONSTRAINT `pendukung` FOREIGN KEY (`id_pendukung`) REFERENCES `pmi_pendukung` (`id_pendukung`);

--
-- Constraints for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD CONSTRAINT `nip` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`);

--
-- Constraints for table `pelaku`
--
ALTER TABLE `pelaku`
  ADD CONSTRAINT `pelaku_ibfk_1` FOREIGN KEY (`id_pendukung`) REFERENCES `pmi_pendukung` (`id_pendukung`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pmi_ilegal`
--
ALTER TABLE `pmi_ilegal`
  ADD CONSTRAINT `pmi_ilegal_ibfk_1` FOREIGN KEY (`id_pendukung`) REFERENCES `pmi_pendukung` (`id_pendukung`);

--
-- Constraints for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `nip2` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`);

--
-- Constraints for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `nip1` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
