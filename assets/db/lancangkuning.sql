-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 12:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.17

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
  `id_pendukung` int(11) NOT NULL,
  `kronologi_Pencegahan` varchar(500) NOT NULL,
  `instansi_penindaklanjut` varchar(255) NOT NULL,
  `tgl_pelaksanaan` date DEFAULT NULL,
  `TKP` varchar(255) NOT NULL,
  `lokasi_shelter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_ilegal`
--

INSERT INTO `detail_ilegal` (`id_detail`, `no_korban`, `id_pelaku`, `id_pendukung`, `kronologi_Pencegahan`, `instansi_penindaklanjut`, `tgl_pelaksanaan`, `TKP`, `lokasi_shelter`) VALUES
(67, 'KR1685007639', 41, 38, 'ada', 'ads', NULL, '', '0'),
(68, 'KR1685007842', 40, 39, 'dia memata matain saya tapi sayangnya saya tidak percaya haha haha haha', 'polsekk semporr', NULL, '', '0'),
(69, 'KR1685007842', 42, 39, 'dia memata matain saya tapi sayangnya saya tidak percaya haha haha haha', 'polsekk semporr', NULL, '', '0'),
(70, 'KR1685007842', 43, 39, 'dia memata matain saya tapi sayangnya saya tidak percaya haha haha haha', 'polsekk semporr', NULL, '', '0'),
(71, 'KR1685008078', 41, 38, 'asda', 'adssa', NULL, '', '0'),
(72, 'KR1685064939', 40, 39, 'sangat jahat', 'polsek dumai', NULL, '', '0'),
(73, 'KR1685064939', 41, 39, 'sangat jahat', 'polsek dumai', NULL, '', '0'),
(74, 'KR1685069756', 42, 39, 'MUDHA ', 'polsek jombang', '2023-05-24', 'indrapura', '0'),
(75, 'KR1685073049', 47, 40, 'semua berjalan dengan baik', 'polsekk semporr', '2023-05-24', 'jalan kartika sari', '0'),
(76, 'KR1685073049', 48, 40, 'semua berjalan dengan baik', 'polsekk semporr', '2023-05-24', 'jalan kartika sari', '0'),
(77, 'KR1685073308', 46, 40, 'asad', 'polsekk semporr', '2023-05-17', 'bangko', '0'),
(78, 'KR1685073308', 47, 40, 'asad', 'polsekk semporr', '2023-05-17', 'bangko', '0'),
(79, 'KR1685073671', 40, 40, 'kjhk', 'polsekk semporr', '2023-05-11', 'asdas', '0'),
(80, 'KR1685073671', 42, 40, 'kjhk', 'polsekk semporr', '2023-05-11', 'asdas', '0'),
(81, 'KR1685082282', 49, 38, 'asdas', 'asdas', '2023-05-23', 'adsaas', '0'),
(82, 'KR1685082282', 50, 38, 'asdas', 'asdas', '2023-05-23', 'adsaas', '0'),
(83, 'KR1685086836', 41, 39, 'asas', 'asda', '2023-05-22', 'asdas', '0'),
(84, 'KR1685086836', 43, 39, 'asas', 'asda', '2023-05-22', 'asdas', '0'),
(85, 'KR1685094053', 42, 39, 'asda', 'asdas', '2023-05-30', 'asdsa', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

CREATE TABLE `kasus` (
  `id_kasus` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nama_pmi` varchar(255) NOT NULL,
  `no_paspor` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `negara_penempatan` varchar(255) NOT NULL,
  `jenis_kasus` varchar(255) NOT NULL,
  `p3mi` varchar(255) NOT NULL,
  `uraian_kasus` varchar(255) NOT NULL,
  `penyelesaian` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`id_kasus`, `tgl_pengaduan`, `nama_pmi`, `no_paspor`, `alamat`, `negara_penempatan`, `jenis_kasus`, `p3mi`, `uraian_kasus`, `penyelesaian`, `keterangan`) VALUES
(1, '2023-05-25', 'anwar1', 'sdf231', 'bangko kanan11', 'indrapura11', 'sakit1', 'ia lah tu1', 'entah engga tau1', 'sudah di eksekusi1', 'masih hidup orang nya1');

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
(19, '1212', 'pdfaSaaeasa', 'Data_Siswa1.xlsx'),
(20, '1212', 'segera di kirim ya', ''),
(23, '87654321', 'photo profile', 'IMG_0059_(1).PNG'),
(24, '987654321', 'sk', 'logo.png'),
(25, '87654321', 'barang bekas', 'logo1.png');

-- --------------------------------------------------------

--
-- Table structure for table `pelaku`
--

CREATE TABLE `pelaku` (
  `id_pelaku` int(11) NOT NULL,
  `nama_pelaku` varchar(255) NOT NULL,
  `peran` varchar(255) NOT NULL,
  `asal_daerah` varchar(255) NOT NULL,
  `keterangan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelaku`
--

INSERT INTO `pelaku` (`id_pelaku`, `nama_pelaku`, `peran`, `asal_daerah`, `keterangan`) VALUES
(40, 'anwar', '', '', ''),
(41, 'anwar', '', '', ''),
(42, 'indra', '', '', ''),
(43, 'yogaasa', '', '', ''),
(44, 'andi', 'penculik', '', ''),
(45, 'bagas', 'mata mata', '', ''),
(46, 'asda', 'adsa', '', ''),
(47, 'ardi', 'mata mata', '', ''),
(48, 'indra ', 'mata mata', '', ''),
(49, 'koko1', 'mata mata', '', ''),
(50, 'koko2', 'mata mata', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pkln`
--

CREATE TABLE `pkln` (
  `id_pkln` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `usia` int(11) NOT NULL,
  `daerah_asal` varchar(255) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `negara_tujuan` varchar(255) NOT NULL,
  `sektor_pekerjaan` varchar(255) NOT NULL,
  `no_kontak` int(20) NOT NULL,
  `informasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pkln`
--

INSERT INTO `pkln` (`id_pkln`, `nama`, `jenis_kelamin`, `usia`, `daerah_asal`, `pendidikan`, `negara_tujuan`, `sektor_pekerjaan`, `no_kontak`, `informasi`, `keterangan`) VALUES
(2, 'anwar', 'laki-laki', 12, 'pekanbaru', 's1', 'malaysia', 'industri', 23224, 'mati', 'ia ya');

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
(8, 'delau', 'laki-laki', '2023-03-23', 'malaysia', '2023-03-22', 'Pencegahan Penempatan ilegal', 'pekanbaru', 'jabar', 'dumai', 'asadadas', ''),
(10, 'budi', 'laki-laki', '2023-05-17', 'malaysia', '2023-05-16', 'desportasi', 'ada', 'riau', 'dumai', 'masih hidup', '');

-- --------------------------------------------------------

--
-- Table structure for table `pmi_ilegal`
--

CREATE TABLE `pmi_ilegal` (
  `id_ilegal` int(11) NOT NULL,
  `id_pendukung` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `daerah_asal_pmi` varchar(255) NOT NULL,
  `negara_tujuan` varchar(50) NOT NULL,
  `no_korban` varchar(20) NOT NULL,
  `instansi_penindaklanjut` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmi_ilegal`
--

INSERT INTO `pmi_ilegal` (`id_ilegal`, `id_pendukung`, `nama`, `daerah_asal_pmi`, `negara_tujuan`, `no_korban`, `instansi_penindaklanjut`) VALUES
(43, 39, 'anwar', 'bangko', 'malaysia', '', ''),
(44, 39, 'korban1', 'bangko', 'israil', '', ''),
(45, 38, 'anwar', 'bangko', 'asdsa', 'KR1685007639', ''),
(46, 39, 'andri', 'indramayu', 'malaysia', 'KR1685007842', ''),
(47, 38, 'asd', 'adsa', 'adsa', 'KR1685008078', ''),
(48, 39, 'jumaidi', 'banten', 'irlandia', 'KR1685064939', ''),
(49, 39, 'anwar', 'das', 'asdas', 'KR1685069756', ''),
(50, 40, 'korban1', 'bangko', 'indonesia', 'KR1685073049', ''),
(51, 40, 'korban1', 'bangko', 'adas', 'KR1685073308', ''),
(52, 40, 'adas', 'asdas', 'asdas', 'KR1685073671', ''),
(53, 38, 'werw', 'werw', 'werew', 'KR1685082282', ''),
(54, 39, 'asda', 'asdas', 'asd', 'KR1685086836', ''),
(55, 39, 'adas', 'asda', 'asdas', 'KR1685086836', ''),
(56, 39, 'asd', 'asda', 'asd', 'KR1685094053', '');

-- --------------------------------------------------------

--
-- Table structure for table `pmi_pendukung`
--

CREATE TABLE `pmi_pendukung` (
  `id_pendukung` int(11) NOT NULL,
  `nama_pelaksana` varchar(255) NOT NULL,
  `tgl_pelaksana` date NOT NULL,
  `TKP` varchar(255) NOT NULL,
  `lokasi_shelter` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmi_pendukung`
--

INSERT INTO `pmi_pendukung` (`id_pendukung`, `nama_pelaksana`, `tgl_pelaksana`, `TKP`, `lokasi_shelter`) VALUES
(38, '40', '2023-05-10', 'ada', 'asdas'),
(39, 'polsek semporr', '2023-05-14', 'indrapura', 'dumai'),
(40, 'polsek bangko pusako', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pmi_penempatan`
--

CREATE TABLE `pmi_penempatan` (
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `nik` int(50) NOT NULL,
  `no_paspor` varchar(50) NOT NULL,
  `skema` varchar(255) NOT NULL,
  `sektor_usaha` varchar(255) NOT NULL,
  `alamat_asal` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `negara_tujuan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `no_hp` int(50) NOT NULL,
  `proses` varchar(255) NOT NULL,
  `id_penempatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pmi_penempatan`
--

INSERT INTO `pmi_penempatan` (`nama`, `jenis_kelamin`, `pendidikan`, `nik`, `no_paspor`, `skema`, `sektor_usaha`, `alamat_asal`, `kabupaten`, `negara_tujuan`, `jabatan`, `company`, `no_hp`, `proses`, `id_penempatan`) VALUES
('as', 'laki-laki', 'asd', 22, 'c888', 'werw', 'werw', 'werw', 'werw', 'werew', 'wrwe', 'werwe', 232, 'wewr', 2);

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id` int(255) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `tujuan` varchar(255) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `NIP`, `no_surat`, `tgl_keluar`, `tujuan`, `perihal`, `surat`) VALUES
(4, '11111111', '12333', '0001-01-01', '12', '21', 'android_valorant6.pdf'),
(8, '12345678', 'asaas', '2023-05-18', 'asas', 'meninjau', 'android_valorant311.docx');

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
(7, '11111111', '1222234', '0001-01-01', '0001-01-12', '1351', '11', 'android_valorant.docx');

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
  `masa_kerja` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`NIP`, `nama`, `password`, `gambar`, `role`, `status_pegawai`, `pangkat`, `jenis_jabatan`, `jabatan`, `no_hp`, `pendidikan_terakhir`, `masa_kerja`, `email`, `tgl_akhir`) VALUES
('11111111', 'aaa', '$2y$10$3YotZ9dPo1ArrGn8HeCpEOPGHY3Gwh/3xvL7/b8PjOpFLUjWaUl66', 'environtment.png', 'PPNPN', 'PNS', '2a', 'fungsional', 'a', 0, 'a', '2023-04-19', '2a', '0002-02-02'),
('121', 'adas', '$2y$10$o6NKCZfjGXP.hTrQIv/1FumphrU5jZ7hg35zIgj2i/WJ98GsMHBhy', 'default.png', 'pns', '', '', '', '', 0, '', '', '', '0000-00-00'),
('1212', 'anwar32c', '$2y$10$EnOa4P3xVTaiaCj2hy5l5.Z952fI29ECBfOv19NVH0vz3lz3BO5Ba', 'latar_merah.jpg', 'PNS', 'pns', '7', 'struktural', 'kepala', 211313433, 'si', '2022-04-28', 'anwar@gmail.com', '2021-04-06'),
('1234', 'ANWAR2', '$2y$10$qtkpLzpcI0pIe2PIox/FiuLi.13yYNQ/4KinxX6Kyu4K/2S5pgTmq', 'latar_merah1.jpg', 'User', 'pns', '1', 'admin', 'analis tenaga kerja', 0, 'sma', '0', '2324', '2021-03-10'),
('12345678', 'admin', '$2y$10$wTfzF3Adz747uapQCYYYBuzGyivbNnRmt0ZTlAlUAULsFAaTU7Qdu', 'default.png', 'Admin', '1', '1', '1', '1', 1, '1', '1', '1', '0001-01-01'),
('1234567890', 'Laurin Madelau', '$2y$10$hs3g1GPeZO1SX.0FAZBRtOZCsLr2cGAUxLi024Il4ygUqEp6V26WW', 'Laurin_Madelau_20553010671.JPG', 'User', '2', 'KETUA PCR PELALAWAN', 'KETUA PCR PELALAWAN', 'KETUA PCR PELALAWAN', 31, '2', '2', '2', '2021-01-30'),
('87654321', 'mhd anwar', '$2y$10$PJg8cZK5VAm7ZpQTLGvGse8b1g2IJB3Kkp.NUBjdzSu0TWgl77jGC', 'logo_red.png', 'PNS', '', 'A3', 'pelaksana', 'ssss', 232323, 'asa2', '2023-05-24', 'aa@gmail.com', '2023-05-10'),
('987654321', 'agung', '$2y$10$RCrMmWWNQC7ORpDpVBaZZuVK2B2TKuw/s2uuOmqBuMCxzJUzFV1.G', 'photo_formal.jpg', 'PPNPN', '', '2a', 'struktural', 'kepala kasubag ', 2147483647, 'S1', '2021-05-19', 'AA@gmail.com', '2021-05-11');

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
-- Indexes for table `kasus`
--
ALTER TABLE `kasus`
  ADD PRIMARY KEY (`id_kasus`);

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
  ADD PRIMARY KEY (`id_pelaku`);

--
-- Indexes for table `pkln`
--
ALTER TABLE `pkln`
  ADD PRIMARY KEY (`id_pkln`);

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
-- Indexes for table `pmi_penempatan`
--
ALTER TABLE `pmi_penempatan`
  ADD PRIMARY KEY (`id_penempatan`);

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
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `kasus`
--
ALTER TABLE `kasus`
  MODIFY `id_kasus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pelaku`
--
ALTER TABLE `pelaku`
  MODIFY `id_pelaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `pkln`
--
ALTER TABLE `pkln`
  MODIFY `id_pkln` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pmi`
--
ALTER TABLE `pmi`
  MODIFY `id_pmi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pmi_ilegal`
--
ALTER TABLE `pmi_ilegal`
  MODIFY `id_ilegal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pmi_pendukung`
--
ALTER TABLE `pmi_pendukung`
  MODIFY `id_pendukung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `pmi_penempatan`
--
ALTER TABLE `pmi_penempatan`
  MODIFY `id_penempatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
