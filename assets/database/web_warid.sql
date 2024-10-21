-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2024 pada 18.03
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
(36, 'Abi', 'Jogja', 'Belum Memilih', 'Belum Memilih', 'Ya', '2024-10-10', 10, 0),
(41, 'Bagas', 'Jogja', 'Belum Memilih', 'Belum Memilih', 'Ya', '2024-10-10', 5, 0),
(44, 'Sodiq', 'Jogja', 'Bandung', 'Ekonomi', 'Tidak', '2024-10-10', 10, 2000000),
(45, 'Warid', 'Jogja', 'Surabaya', 'VIP', 'Ya', '2015-05-29', 100, 100050000),
(48, 'ipan', 'Jogja', 'Jakarta', 'VIP', 'Ya', '2005-02-20', 13, 19550000),
(56, 'warid', 'Jogja', 'Bandung', 'VIP', 'Ya', '2024-02-10', 10, 9050000);

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
(6, 'Supernova', 11, 11, 11);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `rapor`
--
ALTER TABLE `rapor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
