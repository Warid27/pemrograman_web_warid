-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Okt 2024 pada 14.00
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
-- Database: `web_warid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `devisi` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `jam_kerja` int(10) NOT NULL,
  `total_bayar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `nama`, `devisi`, `jabatan`, `jam_kerja`, `total_bayar`) VALUES
(3, 'MasBro', 'Desktop', 'Senior Programmer', 5, 32500000),
(4, 'El Magang', 'Desktop', 'Magang', 2, 4600000),
(5, 'Bro?', 'Web', 'Belum Memilih Jabatan', 1, 0),
(7, 'El Junior e', 'Web', 'Junior Programmer', 8, 36000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kereta`
--

CREATE TABLE `kereta` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `asal` varchar(10) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `kelas` varchar(20) NOT NULL,
  `bagasi` enum('Ya','Tidak') NOT NULL,
  `tanggal` date NOT NULL,
  `jml_tiket` int(10) NOT NULL,
  `total_bayar` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kereta`
--

INSERT INTO `kereta` (`id`, `nama`, `asal`, `tujuan`, `kelas`, `bagasi`, `tanggal`, `jml_tiket`, `total_bayar`) VALUES
(44, 'Sodiq', 'Jogja', 'Bandung', 'Ekonomi', 'Tidak', '2024-10-10', 10, 2000000),
(45, 'Warid', 'Jogja', 'Surabaya', 'VIP', 'Ya', '2015-05-29', 100, 100050000),
(48, 'ipan', 'Jogja', 'Jakarta', 'VIP', 'Ya', '2005-02-20', 13, 19550000),
(56, 'warid', 'Jogja', 'Bandung', 'VIP', 'Ya', '2024-02-10', 10, 9050000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kwalifikasi`
--

CREATE TABLE `kwalifikasi` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `iq` int(10) NOT NULL,
  `kwalifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kwalifikasi`
--

INSERT INTO `kwalifikasi` (`id`, `nama`, `iq`, `kwalifikasi`) VALUES
(2, 'Warid', 200, 'Very Gifted / Highly Advanced'),
(3, 'Ipan', 180, 'Very Gifted / Highly Advanced'),
(4, 'Zeal', 120, 'Superior'),
(5, 'Walawe', 40, 'Moderately Impaired / Delayed'),
(6, 'Hehe', 70, 'Borderline Impaired / Delayed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rapor`
--

CREATE TABLE `rapor` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nilaiUH` int(10) NOT NULL,
  `nilaiUA` int(10) NOT NULL,
  `nilai_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rapor`
--

INSERT INTO `rapor` (`id`, `nama`, `nilaiUH`, `nilaiUA`, `nilai_total`) VALUES
(3, 'AWE123', 12, 3, 8),
(5, 'AKVB1234', 12, 34, 21),
(6, 'Supernova', 19, 25, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seragam`
--

CREATE TABLE `seragam` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `osis` varchar(50) NOT NULL,
  `pramuka` varchar(50) NOT NULL,
  `olahraga` varchar(50) NOT NULL,
  `identitas` varchar(50) NOT NULL,
  `bantuan` varchar(20) NOT NULL,
  `total_bayar` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `seragam`
--

INSERT INTO `seragam` (`id`, `nama`, `osis`, `pramuka`, `olahraga`, `identitas`, `bantuan`, `total_bayar`) VALUES
(6, 'AWE123', 'Rp. 100.000,00 (S)', 'Rp. 125.000,00 (M)', 'Rp. 125.000,00 (L)', 'Rp. 125.000,00 (XL)', 'Tidak Ada', 475000),
(10, 'Only (S)', 'Rp. 100.000,00 (S)', 'Rp. 100.000,00 (S)', 'Rp. 75.000,00 (S)', 'Rp. 50.000,00 (S)', 'Infak', 162500),
(11, 'Only (M)', 'Rp. 125.000,00 (M)', 'Rp. 125.000,00 (M)', 'Rp. 100.000,00 (M)', 'Rp. 75.000,00 (M)', 'Komite', 318750),
(12, 'Only (L)', 'Rp. 150.000,00 (L)', 'Rp. 150.000,00 (L)', 'Rp. 125.000,00 (L)', 'Rp. 100.000,00 (L)', 'Tidak Ada', 525000),
(13, 'Only (XL)', 'Rp. 175.000,00 (XL)', 'Rp. 175.000,00 (XL)', 'Rp. 150.000,00 (XL)', 'Rp. 125.000,00 (XL)', 'BOS', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kwalifikasi`
--
ALTER TABLE `kwalifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `seragam`
--
ALTER TABLE `seragam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `kwalifikasi`
--
ALTER TABLE `kwalifikasi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `rapor`
--
ALTER TABLE `rapor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `seragam`
--
ALTER TABLE `seragam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
