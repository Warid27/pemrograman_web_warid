-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2024 pada 16.31
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
(41, 'Bagas', 'Jogja', 'Belum Memilih', 'Panoramic', 'Ya', '2024-10-10', 1, 0),
(44, 'Sodiq', 'Jogja', 'Bandung', 'Ekonomi', 'Tidak', '2024-10-10', 10, 2000000),
(45, 'Warid', 'Jogja', 'Surabaya', 'VIP', 'Ya', '2015-05-29', 100, 100050000),
(46, 'ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWX', 'Jogja', 'Jakarta', 'Belum Memilih', 'Ya', '1010-10-10', 1010101010, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kereta`
--
ALTER TABLE `kereta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kereta`
--
ALTER TABLE `kereta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
