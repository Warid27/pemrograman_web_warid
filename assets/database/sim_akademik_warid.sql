-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Nov 2024 pada 16.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_akademik_warid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(10) NOT NULL,
  `mata_pelajaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `mata_pelajaran`) VALUES
(1, 'Matematika'),
(2, 'PKWU'),
(3, 'PPKn'),
(4, 'Kejuruan'),
(5, 'DKV');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_siswa`
--

CREATE TABLE `nilai_siswa` (
  `id_nilai_siswa` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `nilai` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `nilai_siswa`
--

INSERT INTO `nilai_siswa` (`id_nilai_siswa`, `id_siswa`, `id_mapel`, `nilai`) VALUES
(1, 1000, 1, 50),
(2, 1001, 2, 90),
(3, 1004, 4, 100),
(4, 1002, 3, 88),
(5, 1009, 2, 15),
(6, 1013, 5, 14),
(7, 1003, 1, 100),
(8, 1000, 2, 98);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_siswa`
--

CREATE TABLE `pembayaran_siswa` (
  `id_pembayaran_siswa` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL,
  `pembayaran` varchar(10) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `jumlah_bayar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran_siswa`
--

INSERT INTO `pembayaran_siswa` (`id_pembayaran_siswa`, `id_siswa`, `pembayaran`, `bulan`, `jumlah_bayar`) VALUES
(4, 1002, 'SPP', 'Januari', 1000000),
(5, 1011, 'SPP', 'November', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(255) NOT NULL,
  `kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `kelas`) VALUES
(1000, 'IPAN', 'XI PPLG 1'),
(1001, 'Robby', 'XI PPLG 2'),
(1002, 'Rava', 'X PPLG 1'),
(1003, 'Gifari', 'XI AKL 3'),
(1004, 'Warid', 'XI PPLG 1'),
(1005, 'Yossa', 'X PM 2'),
(1006, 'Ridho', 'XI PM 1'),
(1007, 'Adit', 'XII PPLG 3'),
(1008, 'Linda', 'XII PM 2'),
(1009, 'Bagas Dwi', 'XI MPLB 2'),
(1010, 'Yulia', 'XII AKL 3'),
(1011, 'Haidar', 'XI PPLG 1'),
(1012, 'Iqbal', 'XI PPLG 1'),
(1013, 'Sodiq', 'X PPLG 1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD PRIMARY KEY (`id_nilai_siswa`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_mapel` (`id_mapel`);

--
-- Indeks untuk tabel `pembayaran_siswa`
--
ALTER TABLE `pembayaran_siswa`
  ADD PRIMARY KEY (`id_pembayaran_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  MODIFY `id_nilai_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_siswa`
--
ALTER TABLE `pembayaran_siswa`
  MODIFY `id_pembayaran_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `nilai_siswa`
--
ALTER TABLE `nilai_siswa`
  ADD CONSTRAINT `nilai_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_siswa_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran_siswa`
--
ALTER TABLE `pembayaran_siswa`
  ADD CONSTRAINT `pembayaran_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
