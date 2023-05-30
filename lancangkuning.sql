-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2023 pada 16.43
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

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
-- Struktur dari tabel `pangkat`
--

CREATE TABLE `pangkat` (
  `id` int(255) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `gol` varchar(255) NOT NULL,
  `no_sk` varchar(255) NOT NULL,
  `tgl_sk` date NOT NULL,
  `sk` varchar(255) NOT NULL,
  `tgl_skp` date NOT NULL,
  `skp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pangkat`
--

INSERT INTO `pangkat` (`id`, `NIP`, `status`, `gol`, `no_sk`, `tgl_sk`, `sk`, `tgl_skp`, `skp`) VALUES
(6, '1234567890', 'qa', 'qa', 'qa', '2023-01-12', 'Latihan_Soal_Linux6.pdf', '2023-01-26', 'Latihan_Soal_Linux7.pdf'),
(7, '1234567890', '311', '311', '311', '0021-02-21', 'Ijazah_SMA2.pdf', '0002-02-02', 'Ijazah_SMA1.pdf'),
(8, '11111111', '3', '3', '3', '0002-02-02', 'android_valorant1.pdf', '0002-02-02', 'android_valorant2.pdf'),
(9, '11111111', '1', '1', '1', '0001-01-01', 'android_valorant3.pdf', '0001-01-01', 'android_valorant4.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_keluar`
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
-- Dumping data untuk tabel `surat_keluar`
--

INSERT INTO `surat_keluar` (`id`, `NIP`, `no_surat`, `tgl_keluar`, `pengirim`, `perihal`, `surat`) VALUES
(1, '1234567890', '31', '0002-02-02', '2', '2', 'Latihan_Evaluasi_Edisi_Lebaran.docx'),
(4, '11111111', '12333', '0001-01-01', '12', '21', 'android_valorant6.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat_masuk`
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
-- Dumping data untuk tabel `surat_masuk`
--

INSERT INTO `surat_masuk` (`id`, `NIP`, `no_surat`, `tgl_kirim`, `tgl_terima`, `pengirim`, `perihal`, `surat`) VALUES
(4, '1234567890', '31', '0001-03-31', '0001-03-31', '31', '31', 'Latihan_Soal_Linux1.docx'),
(7, '11111111', '1222234', '0001-01-01', '0001-01-12', '1351', '11', 'android_valorant.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
  `unit_kerja` varchar(255) NOT NULL,
  `pendidikan_terakhir` varchar(255) NOT NULL,
  `status_aktif` varchar(255) NOT NULL,
  `pin_presensi` varchar(255) NOT NULL,
  `tgl_akhir` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`NIP`, `nama`, `password`, `gambar`, `role`, `status_pegawai`, `pangkat`, `jenis_jabatan`, `jabatan`, `unit_kerja`, `pendidikan_terakhir`, `status_aktif`, `pin_presensi`, `tgl_akhir`) VALUES
('11111111', 'del', '$2y$10$3YotZ9dPo1ArrGn8HeCpEOPGHY3Gwh/3xvL7/b8PjOpFLUjWaUl66', 'dlw.jpeg', 'User', '2', '2', '2', '2', '2', '2', '2', '2', '0002-02-02'),
('1234512345', 'da', '$2y$10$dV7w3kK9ybwI7.7PGt.XI.7WYi5SK6MUzEJfB6wemZV9vz3/lDk2G', 'default.png', 'User', '', '', '', '', '', '', '', '', '0000-00-00'),
('12345678', 'admin', '$2y$10$wTfzF3Adz747uapQCYYYBuzGyivbNnRmt0ZTlAlUAULsFAaTU7Qdu', 'default.png', 'Admin', '1', '1', '1', '1', '1', '1', '1', '1', '0001-01-01'),
('1234567890', 'Laurin Madelau', '$2y$10$hs3g1GPeZO1SX.0FAZBRtOZCsLr2cGAUxLi024Il4ygUqEp6V26WW', 'Laurin_Madelau_20553010671.JPG', 'User', '2', 'KETUA PCR PELALAWAN', 'KETUA PCR PELALAWAN', 'KETUA PCR PELALAWAN', '31', '2', '2', '2', '2021-01-30'),
('12345678900', 'delau', '$2y$10$9Q.mIVp9r6XE7WCvqlJowuCL/MVxuA2LNDPKoD47oLC9zoU5yFbcW', 'default.png', 'User', '', '', '', '', '', '', '', '', '0000-00-00'),
('22222222', 'Jett', '$2y$10$Kx5edIx7cYauSn1wyX1D9eB1B.MmbcG9KgRH.obxkvoSqbCOhkcue', 'default.png', 'User', '', '', '', '', '', '', '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip` (`NIP`);

--
-- Indeks untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip2` (`NIP`);

--
-- Indeks untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nip1` (`NIP`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`NIP`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pangkat`
--
ALTER TABLE `pangkat`
  ADD CONSTRAINT `nip` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD CONSTRAINT `nip2` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`);

--
-- Ketidakleluasaan untuk tabel `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD CONSTRAINT `nip1` FOREIGN KEY (`NIP`) REFERENCES `user` (`NIP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
