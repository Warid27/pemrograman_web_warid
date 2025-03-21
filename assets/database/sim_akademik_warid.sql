-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jan 2025 pada 07.51
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
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `id_user`) VALUES
(1, 1),
(2, 127);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar`
--

CREATE TABLE `tb_bayar` (
  `id_bayar` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `jenis` enum('SPP','Tabungan','Extra','') NOT NULL,
  `bulan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `nis`, `jenis`, `bulan`, `jumlah`, `id_user`) VALUES
(13, 17325, 'SPP', 1, 2147483647, 3),
(14, 17325, 'Tabungan', 1, 2147483647, 3),
(15, 17325, 'Extra', 1, 2147483647, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `jenjang` enum('10','11','12','') NOT NULL,
  `jurusan` enum('PPLG','AKL','MPLB','PM') NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `jenjang`, `jurusan`, `nama_kelas`) VALUES
(1, '10', 'AKL', 'X AKL 1'),
(2, '10', 'AKL', 'X AKL 2'),
(3, '10', 'AKL', 'X AKL 3'),
(4, '10', 'MPLB', 'X MPLB 1'),
(5, '10', 'MPLB', 'X MPLB 2'),
(6, '10', 'MPLB', 'X MPLB 3'),
(7, '10', 'PM', 'X PM 1'),
(8, '10', 'PM', 'X PM 2'),
(9, '10', 'PPLG', 'X PPLG 1'),
(10, '10', 'PPLG', 'X PPLG 2'),
(11, '10', 'PPLG', 'X PPLG 3'),
(12, '11', 'AKL', 'XI AKL 1'),
(13, '11', 'AKL', 'XI AKL 2'),
(14, '11', 'AKL', 'XI AKL 3'),
(15, '11', 'MPLB', 'XI MPLB 1'),
(16, '11', 'MPLB', 'XI MPLB 2'),
(17, '11', 'MPLB', 'XI MPLB 3'),
(18, '11', 'PM', 'XI PM 1'),
(19, '11', 'PM', 'XI PM 2'),
(20, '11', 'PPLG', 'XI PPLG 1'),
(21, '11', 'PPLG', 'XI PPLG 2'),
(22, '11', 'PPLG', 'XI PPLG 3'),
(23, '12', 'AKL', 'XII AKL 1'),
(24, '12', 'AKL', 'XII AKL 2'),
(25, '12', 'AKL', 'XII AKL 3'),
(26, '12', 'MPLB', 'XII MPLB 1'),
(27, '12', 'MPLB', 'XII MPLB 2'),
(28, '12', 'MPLB', 'XII MPLB 3'),
(29, '12', 'PM', 'XII PM 1'),
(30, '12', 'PM', 'XII PM 2'),
(31, '12', 'PPLG', 'XII PPLG 1'),
(32, '12', 'PPLG', 'XII PPLG 2'),
(33, '12', 'PPLG', 'XII PPLG 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mapel`
--

CREATE TABLE `tb_mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_mapel`
--

INSERT INTO `tb_mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Pem. Web'),
(2, 'Basis Data'),
(3, 'OOP'),
(4, 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `nis`, `id_mapel`, `nilai`, `id_user`) VALUES
(24, 17696, 1, 100, 126),
(25, 17696, 2, 100, 126),
(26, 17696, 3, 100, 126),
(27, 17325, 1, 100, 129),
(28, 17325, 2, 80, 129),
(29, 17325, 3, 0, 129);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `jk` smallint(6) NOT NULL,
  `user` varchar(100) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `id_kelas`, `jk`, `user`, `pass`, `foto`) VALUES
(13934, 'TIARA EKA AGUSTINA', 17, 2, '13934', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16615, 'ALNISFA PRITANIA', 23, 2, '16615', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16616, 'AMALIA RIZQI ANI', 23, 2, '16616', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16617, 'AMIROTUN ROHMAH', 23, 2, '16617', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16618, 'ANASTASIA CHRISTA MEDIANA', 23, 2, '16618', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16619, 'ANIDATUL MUSHOFFA', 23, 2, '16619', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16620, 'ARDANIYAH', 23, 2, '16620', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16621, 'ARUM PUSPITASARI', 23, 2, '16621', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16622, 'ATTA MEYSA DEWI', 23, 2, '16622', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16623, 'DEVITA DWI SAPUTRI', 23, 2, '16623', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16624, 'DYAH AJENG RUSMALIA', 23, 2, '16624', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16625, 'DYAH WAHYU HAPSARI', 23, 2, '16625', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16626, 'ECHWANA FADLILA', 23, 2, '16626', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16627, 'ESNI RAHAYU LESTARI', 23, 2, '16627', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16628, 'EVA KURNIA RISQI', 23, 2, '16628', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16629, 'GENDHIS AYU SHELMA SURYADARMA', 23, 2, '16629', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16630, 'GITA SANIA ZAHROTUL UYYUN', 23, 2, '16630', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16631, 'HOMSA PEBRI NUGRAHENI', 23, 2, '16631', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16632, 'HUMMAIRA ROSESAFANY SANTOSO', 23, 2, '16632', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16633, 'LAETITIA DAMAYANTI', 23, 2, '16633', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16634, 'LAILATUL VA', 23, 2, '16634', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16635, 'LANA FAROKHATI', 23, 2, '16635', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16636, 'MUHAMMAD DENY KURNIAWAN', 23, 1, '16636', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16637, 'NADYA RIDZKIANA ASHARI', 23, 2, '16637', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16638, 'NAJWA ABIDA RAHMAN', 23, 2, '16638', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16639, 'MUHAMMAD RAIHAN ARAFAT', 23, 1, '16639', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16640, 'NUR ATHIYYAH RAHIMA', 23, 2, '16640', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16641, 'NURINA PUTRI HIDAYANTI', 23, 2, '16641', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16642, 'PUTRI PRASTIWI', 23, 2, '16642', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16643, 'RATNA KARTIKASARI', 23, 2, '16643', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16644, 'ROCHMATUL UMAH', 23, 2, '16644', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16645, 'SALMA LATIFAH', 23, 2, '16645', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16646, 'SILFI MUSTANIROH', 23, 2, '16646', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16647, 'SITI NOR JANAH', 23, 2, '16647', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16648, 'SYIVA ARUM SELVIYANI', 23, 2, '16648', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16649, 'VIVIN ADIKA PUTRI', 23, 2, '16649', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16650, 'WAHYU WIDYANINGRUM', 23, 2, '16650', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16651, 'ALIKA MARSHA OLIVIA', 24, 2, '16651', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16652, 'ANGELLA RISKA TRI NUGRAENI', 24, 2, '16652', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16653, 'ANISA LAILATUL MUNIROH', 24, 2, '16653', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16654, 'ARISKA YUKA NAOMI RAMADANI', 24, 2, '16654', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16655, 'AZZURA MAULIDYA MANAN', 24, 2, '16655', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16656, 'DESTYANA', 24, 2, '16656', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16657, 'DHINASTHI WIJI SUSANTO', 24, 1, '16657', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16658, 'DYAH CHOLI FATUL LATIFAH', 24, 2, '16658', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16659, 'ENDANG SETIA LARASATI', 24, 2, '16659', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16660, 'FAISA ADIN SAKINA', 24, 2, '16660', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16661, 'FRISILIA YULIANTI', 24, 2, '16661', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16662, 'GALANG ADRIYAN ADJI PURNOMO', 24, 1, '16662', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16663, 'INES CESYA KINANTI', 24, 2, '16663', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16664, 'KORNIA MAULISA', 24, 2, '16664', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16665, 'LEYNA VASTHI PRADEEPTA NANDIN', 24, 2, '16665', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16666, 'MUHAMMAD CHOIRUL ANAM', 24, 1, '16666', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16667, 'MUTIARA ZHAHRA CANTIKA', 24, 2, '16667', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16668, 'NADYA SYIFA KAMILA', 24, 2, '16668', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16669, 'NAFIZA HASNA PUTRI NURAINI', 24, 2, '16669', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16670, 'NAJWA SALSABILLA LESTARI PUTRI', 24, 2, '16670', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16671, 'NOVA FITRI SETIYANI', 24, 2, '16671', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16672, 'NUR ASRI MEYLISSIFA', 24, 2, '16672', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16674, 'RACHEILLA NOER SEPTIANA', 24, 2, '16674', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16675, 'RAHMA AYU SALSABILA', 24, 2, '16675', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16676, 'RIZKY AULIA NUR RACHMANI', 24, 2, '16676', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16677, 'RIZKYA YUSRIATI', 24, 2, '16677', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16678, 'ROSIFATUD DIANA LIGESA', 24, 2, '16678', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16679, 'SEPTIANA REZEQI SAPUTRI', 24, 2, '16679', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16680, 'SIFA AFIFATUL AULIA', 24, 2, '16680', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16681, 'SILFIA IKA PRATIWI', 24, 2, '16681', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16682, 'SILVIA EKA DAMAYANTY', 24, 2, '16682', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16683, 'WENI FITRIANSYAH', 24, 2, '16683', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16684, 'WIDYA SULISTYO BUDI', 24, 2, '16684', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16685, 'YUNITA SEPTY RAHAYU', 24, 2, '16685', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16686, 'ZALFA AZIZAH', 24, 2, '16686', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16687, 'AISYAH NURAINI', 25, 2, '16687', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16688, 'ALYA KHANSA RAMADHANI', 25, 2, '16688', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16689, 'ANGGUN NIDA ABADI', 25, 2, '16689', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16690, 'ANNAJMA DWINDA SHAHNAZIA', 25, 2, '16690', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16691, 'ASTYA ZAHRA ARNELITA', 25, 2, '16691', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16692, 'AURORA RULI EKA ZAHRA NOVIARUM', 25, 2, '16692', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16693, 'CLARYSSA ADELIA REGITA', 25, 2, '16693', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16694, 'DESTRIYANA', 25, 2, '16694', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16695, 'DWI ASTUTI', 25, 2, '16695', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16696, 'ERVINA ARNANDASARIE', 25, 2, '16696', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16697, 'EVA EVIANA', 25, 2, '16697', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16698, 'FATIMAH NURMAYDA 1NKHA', 25, 2, '16698', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16699, 'MARTHA HERVIASYA', 25, 2, '16699', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16700, 'MAULIDA AULIATUR ROHMAH', 25, 2, '16700', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16701, 'MAULINA HANDAYANI', 25, 2, '16701', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16702, 'MEISA YENI HANAFA', 25, 2, '16702', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16703, 'NABILA SETIAWANDA', 25, 2, '16703', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16704, 'NADINE DISFIA AULIA', 25, 2, '16704', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16705, 'NAILA AULIYA NASWA', 25, 2, '16705', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16706, 'NAJ\'MAFILLAH ANANDYA INDARTO', 25, 2, '16706', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16707, 'NAOUMIRA INDAH SARI', 25, 2, '16707', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16708, 'NIFAYOLA RUMAISHYA HIBBA', 25, 2, '16708', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16709, 'NURISMA SALSABILA', 25, 2, '16709', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16710, 'RACHMA ANAS TASYA', 25, 2, '16710', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16711, 'RINA HEPI PRATIWI', 25, 2, '16711', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16712, 'RISMAWATI FITRIANA', 25, 2, '16712', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16713, 'SAFARA FEBRIANA', 25, 2, '16713', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16714, 'SAFIRA DWI ANUGRAHANTI', 25, 2, '16714', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16715, 'SITI HASANAH', 25, 2, '16715', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16716, 'SITI KOTIJAH', 25, 2, '16716', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16717, 'SITI SALWA', 25, 2, '16717', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16718, 'SOFIATUL RAHMAWATI', 25, 2, '16718', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16719, 'SUNARTI', 25, 2, '16719', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16720, 'THIEN KHADIJAH MARTHA', 25, 2, '16720', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16721, 'TSABBITA YUMNI SHOBRINA PUTRI', 25, 2, '16721', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16722, 'YULIA SETIAWATI', 25, 2, '16722', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16723, 'AHMAD DANIS', 26, 1, '16723', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16724, 'ALYA AZ ZAHRA', 26, 2, '16724', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16725, 'ALYA AZIZAH', 26, 2, '16725', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16726, 'ALYSHA PUTRI AMANDA', 26, 2, '16726', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16727, 'ANANDA SEFINA PUTRI ARYAGUNA', 26, 2, '16727', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16728, 'ANIQI NABILA UTAMI', 26, 2, '16728', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16729, 'AN-NISA AZ-ZAHRA', 26, 2, '16729', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16730, 'ANNISA ILMA RAJWA WIDITOMO', 26, 2, '16730', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16731, 'ATHA RIFHA NIDAYANTI', 26, 2, '16731', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16732, 'AUFA SITIA NOVIASARI', 26, 2, '16732', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16733, 'AYU MARIFAH', 26, 2, '16733', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16734, 'DESTI WIDYANI', 26, 2, '16734', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16735, 'EKYSHITA KAYLA PUTRI', 26, 2, '16735', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16736, 'ELSA EVIDA', 26, 2, '16736', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16737, 'FADELIA SETYA NINGRUM', 26, 2, '16737', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16738, 'HABIBATUS SHOLIHAH', 26, 2, '16738', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16739, 'HANNI AMANDA TIPANI', 26, 2, '16739', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16740, 'IRZA RIANI SETYA WARDANI', 26, 2, '16740', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16741, 'ISMA FEBRIYANTI', 26, 2, '16741', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16742, 'KANIA FATIKA SARI DEWI', 26, 2, '16742', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16743, 'KEVIN ANDRIAN', 26, 1, '16743', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16744, 'LENI CAHYANI', 26, 2, '16744', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16745, 'MAKHYANA ULYA', 26, 2, '16745', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16746, 'MAULIDATUS SULASA', 26, 2, '16746', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16747, 'MIFTACHUL JANAH', 26, 2, '16747', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16748, 'NADIA PUTRI', 26, 2, '16748', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16749, 'NAILA AUFA NADIYYA', 26, 2, '16749', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16751, 'PUTRI WIDYAWATI HARTONO', 26, 2, '16751', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16752, 'RAHMATUL ULYA YULIANA', 26, 2, '16752', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16753, 'RIZKA AYU PRATIWI', 26, 2, '16753', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16754, 'SATRIA ADRIANANTA', 26, 1, '16754', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16755, 'SELVIANA RADINTA', 26, 2, '16755', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16756, 'TRISTIN OCTAFIANI', 26, 2, '16756', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16757, 'VANEZA DESTY MAESAROH', 26, 2, '16757', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16758, 'YANI URIP', 26, 2, '16758', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16759, 'ALDHILAH NOER HANIFAH', 27, 2, '16759', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16760, 'ANDREA PUTRI VIRGIN NINTA', 27, 2, '16760', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16761, 'ANINDA ELSA NURMALA', 27, 2, '16761', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16762, 'ANISA FATMASARI', 27, 2, '16762', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16763, 'ANNISA AZZAHRA', 27, 2, '16763', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16764, 'AYU ARIYANA PUTRI', 27, 2, '16764', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16765, 'CLARISTA AULYA PUTRI PAMBUDI', 27, 2, '16765', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16766, 'DEVI PUTRI NURCHOLIFAH', 27, 2, '16766', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16767, 'DEVI SOLECHA YATI', 27, 2, '16767', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16768, 'DINA RAHAYU', 27, 2, '16768', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16769, 'DINI HENDWI JAYA', 27, 2, '16769', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16770, 'FATIA ASYIFATU ZAHRA', 27, 2, '16770', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16771, 'HERLINDA TRI ASTUTI', 27, 2, '16771', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16772, 'INTAN APRILIA RIZQI', 27, 2, '16772', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16773, 'KAYLA PONTIA RAMADHANI', 27, 2, '16773', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16774, 'KHALIFAH NOOR SAFFA SUWARDIYAN', 27, 2, '16774', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16775, 'KHOIRUNISA NURUL KHASANAH', 27, 2, '16775', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16776, 'LIA RAMADHANI AKSA', 27, 2, '16776', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16778, 'MAHARAYNDRA PUTRA AGUNG', 27, 1, '16778', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16779, 'MAICHA DIAZ LARASHATI', 27, 2, '16779', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16780, 'MEIDA LIA ROSITA', 27, 2, '16780', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16781, 'NAUFALI DZACKY ANDRIKA', 27, 1, '16781', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16782, 'NINDIA MAHARANI', 27, 2, '16782', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16783, 'NOVALIA IRMA RAHMAWATI', 27, 2, '16783', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16784, 'RAHAYU ARIANTI', 27, 2, '16784', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16785, 'RENA AYU NIRMALASARI', 27, 2, '16785', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16786, 'RIDHAI GUSTINA', 27, 2, '16786', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16788, 'RIRIN FEBY LARASATI', 27, 2, '16788', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16789, 'SARALIE ANGGIA INSANI PUTRI', 27, 2, '16789', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16790, 'SERLY DEWI KUSUMA', 27, 2, '16790', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16791, 'SYAIFILA DWI AFIFAH', 27, 2, '16791', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16792, 'VEMALITA EXLINDA', 27, 2, '16792', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16793, 'WIDYA TIKA ANJANI', 27, 2, '16793', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16794, 'YULITA AGUSTINA', 27, 2, '16794', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16795, 'AAISYATUL AZIZAH', 28, 2, '16795', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16796, 'AFRIYANI VALENCIA MADAYANA', 28, 2, '16796', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16797, 'AISYAH ASHARI', 28, 2, '16797', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16798, 'AMANAH PRATITIS', 28, 2, '16798', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16799, 'AMELIA KHAVIFAH', 28, 2, '16799', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16800, 'ARINA NUR AFIFAH', 28, 2, '16800', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16801, 'ARLIKA ANINDIA', 28, 2, '16801', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16802, 'DEA AMALIA SHOLEHAH', 28, 2, '16802', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16803, 'DEFI INTAN PRASASTI', 28, 2, '16803', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16804, 'DESICA DINI SYAFITRI', 28, 2, '16804', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16805, 'DZAKIY\' YA LUTHFI HERYANTO', 28, 2, '16805', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16806, 'FATKHAN ANIF ULINNUHA', 28, 1, '16806', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16807, 'HIKMA RISMAWATI', 28, 2, '16807', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16808, 'ILMA YUNTAVA YUDANINGRUM', 28, 2, '16808', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16809, 'INTAN MAYZHARA PUTRI', 28, 2, '16809', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16810, 'JIHAN MAULANA YUSUF KARIMULLOH', 28, 1, '16810', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16811, 'JUMI KASTIYA', 28, 2, '16811', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16812, 'LINTANG KUMALA ICHTIARINI', 28, 2, '16812', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16813, 'MEILITA', 28, 2, '16813', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16814, 'MUTIARA ZAHRA GRISMAWATI', 28, 2, '16814', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16815, 'NABILA AMINATUS ZAHRA', 28, 2, '16815', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16816, 'NABILLA DWI AFRIHAPSARI', 28, 2, '16816', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16817, 'NAILA FARHA APRILIA', 28, 2, '16817', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16818, 'NAUFAL RADITYA CANNAVARO', 28, 1, '16818', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16820, 'NUR AULIA BUDIARTI', 28, 2, '16820', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16821, 'NURUL AROFI CHAMIDA', 28, 2, '16821', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16822, 'PUTRI RIZKA NURUL CHAMIDA', 28, 2, '16822', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16823, 'REFA LINDA AULIA AZZAHRA', 28, 2, '16823', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16824, 'REFIANA DEWANTY SETYAWAN', 28, 2, '16824', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16825, 'RIZQI NUR ANISA', 28, 2, '16825', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16826, 'SALWA MANISA SYUKRIYA', 28, 2, '16826', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16827, 'SINTA', 28, 2, '16827', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16828, 'VAZA MASRUROH', 28, 2, '16828', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16829, 'WAHYU NUR ALIN', 28, 2, '16829', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16830, 'ZAHRA MITHA KUSUMA ANDARI', 28, 2, '16830', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16831, 'ABRIAN DWI CAHYO', 29, 1, '16831', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16832, 'ACHMAD MUZAKI', 29, 1, '16832', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16833, 'ADHELIA MAYTA SUSANTI', 29, 2, '16833', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16834, 'ANGELYNA AGATHA NUGROHO', 29, 2, '16834', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16835, 'ARISKA BUDI LESTARI', 29, 2, '16835', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16836, 'BAGAS MUKTI WICAKSONO', 29, 1, '16836', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16837, 'DELVINO RAISSA MAHENDRA', 29, 1, '16837', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16838, 'DEMAZ HANIF PUTRA SETIAWAN', 29, 1, '16838', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16839, 'DHEA OCTAVIANI', 29, 2, '16839', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16840, 'EDI KURNIYAWAN', 29, 1, '16840', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16842, 'ELISNA DWI AGUSTIN', 29, 2, '16842', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16843, 'EVINAROTUL KHASANAH', 29, 2, '16843', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16844, 'EXSEL OSSY SAHARA', 29, 2, '16844', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16845, 'FIRDA RAHMANIA', 29, 2, '16845', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16846, 'LAELATUL FAIZAH', 29, 2, '16846', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16847, 'LINTANG DWI NOVARIANTO', 29, 1, '16847', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16848, 'LUDVIA SISTIA NURAIENI', 29, 2, '16848', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16849, 'MAGDALENA CHANDRA RISMAWATI', 29, 2, '16849', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16850, 'METALLIA RUSADY', 29, 2, '16850', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16851, 'MUHAMAD RASYID ARRA\'UF', 29, 1, '16851', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16852, 'MUHAMMAD EKA A1NTO', 29, 1, '16852', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16853, 'MUHAMMAD FAKHRY BAKHTIAR', 29, 1, '16853', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16854, 'NABILA DWI NASTARINA', 29, 2, '16854', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16855, 'NABILA PUSPITA SULISTIYAWATI', 29, 2, '16855', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16856, 'NACWA PUTRI WAHYU RADITA', 29, 2, '16856', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16857, 'NADIA DWI SEPTIANI', 29, 2, '16857', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16858, 'NAGHMA IQDAR LESTIANI', 29, 2, '16858', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16859, 'NAVISA DELIMA NUR CAHYANI', 29, 2, '16859', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16860, 'NAYA NUR CAHYANI', 29, 2, '16860', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16861, 'NESHA SYARAFANA NAZITA', 29, 2, '16861', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16862, 'RAHMA YUNITASARI', 29, 2, '16862', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16863, 'RESTU ANGGIA PUTRI', 29, 2, '16863', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16864, 'SYAQTI SANCHO SEBAYANG', 29, 1, '16864', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16865, 'SYIFA SALSABILA', 29, 2, '16865', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16866, 'VIONA RAHMAWATI', 29, 2, '16866', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16867, 'AKMALA HUSNAIDA', 30, 2, '16867', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16868, 'ALYA MUKHBITA', 30, 2, '16868', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16869, 'ANNAS SAMIH AR\'RASYIID', 30, 1, '16869', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16870, 'APRILIA MEGA UTAMI', 30, 2, '16870', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16871, 'ARDINE FATIMA ZAHWA', 30, 2, '16871', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16872, 'AZIZAH WANDA YUANISA', 30, 2, '16872', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16873, 'BAYU ANGGARA SATRIA WICAKSONO', 30, 1, '16873', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16874, 'CETTA UGAMA GUNAWAN', 30, 1, '16874', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16875, 'CHAIDA LARASATI UTAMI', 30, 2, '16875', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16876, 'CHRISTION RHEMANSA', 30, 1, '16876', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16878, 'ERINA ARDITA FIKA', 30, 2, '16878', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16879, 'EVA NUR FADHILAH', 30, 2, '16879', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16880, 'FABIAN SADINAR', 30, 2, '16880', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16881, 'IBNU FAJAR SIDIQ', 30, 1, '16881', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16882, 'ICHDA SEPTI ULIN NAFISA', 30, 2, '16882', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16883, 'IDA MUZAYINAH', 30, 2, '16883', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16885, 'LINTANG IBNI SANI', 30, 2, '16885', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16886, 'MAYNINDA AULIA PUTRI', 30, 2, '16886', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16887, 'MEILINDA DWI CAHYANI', 30, 2, '16887', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16888, 'MELANIE NURALITA', 30, 2, '16888', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16889, 'MELANIE SEVINA DEAN PRATISTA', 30, 2, '16889', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16890, 'MELLINDA PURNAMA SARI', 30, 2, '16890', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16891, 'MUHAMAD AZIZ ERIZAL', 30, 1, '16891', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16892, 'MUHAMMAD DYMAS BAGUS SAPUTRA', 30, 1, '16892', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16893, 'MUHAMMAD LUTHFI ZAMZAMI', 30, 1, '16893', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16894, 'MUHAMMAD RENO SETYAWAN', 30, 1, '16894', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16895, 'MUTIARA KUSUMA DEWI', 30, 2, '16895', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16896, 'RARA SAUSAN ZAKIYA RAFIDHIA', 30, 2, '16896', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16897, 'REVA AURILIA PUTRI', 30, 2, '16897', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16898, 'RIZKY RASYID ADI NUGRAHA', 30, 1, '16898', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16899, 'SINTA AYU LESTARI', 30, 2, '16899', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16900, 'TEGAR KURNIAWAN', 30, 1, '16900', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16901, 'ULFI AFIFAH', 30, 2, '16901', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16902, 'VANISA MELATI NUR CAHYANI', 30, 2, '16902', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16903, 'AINA RIZKI NABILA', 31, 2, '16903', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16904, 'ALIYA NUR NOVIYANTI', 31, 2, '16904', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16905, 'ANINDYA ANJARASTI', 31, 2, '16905', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16906, 'ASPASYA SALSABILA', 31, 2, '16906', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16907, 'AYU HANNA BINTI FAIZAH', 31, 2, '16907', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16908, 'BARA PARAMARTA WIDANOTO', 31, 1, '16908', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16909, 'BRILLIAN ANGGITA ARRACHMAN', 31, 2, '16909', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16911, 'CHAKIM GILANG SATRIO', 31, 1, '16911', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16912, 'CHELLONDIRA SEPTRIYANSA', 31, 2, '16912', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16913, 'DENDY NUR DWI FIRMANSYAH', 31, 1, '16913', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16914, 'DHAIFINA PRAMESTI ARYANI', 31, 2, '16914', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16915, 'EKA SEPTIANA DEWI', 31, 2, '16915', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16916, 'FENDY RAHMAT', 31, 1, '16916', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16917, 'HANDIKA PUTRA NUR ILHAMI', 31, 1, '16917', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16918, 'HAZEL RANSY KRISHNA', 31, 1, '16918', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16919, 'MACCREA REYNARDO GEOSANNA SANT', 31, 1, '16919', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16920, 'MUHAMMAD ALFA KHAKIM', 31, 1, '16920', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16921, 'MUHAMMAD FATAA KASYARA MAARIF', 31, 1, '16921', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16922, 'MUHAMMAD NABIL CAHYA FIRDAUS', 31, 1, '16922', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16923, 'MUHAMMAD SAVA ALFARISY', 31, 1, '16923', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16924, 'MUKHAMMAD MASOLIKHIN', 31, 1, '16924', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16925, 'NUR INDAH DEWI KUSUMA WARDANI', 31, 2, '16925', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16926, 'OKTAVIA PUTRI ARDANI', 31, 2, '16926', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16927, 'RAIHAN AZKA HIDAYAT', 31, 1, '16927', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16928, 'RAMAEYZA NADA NADHIFA', 31, 2, '16928', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16929, 'RENDITYA NEVAN HIDAYAT', 31, 1, '16929', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16930, 'RENDY PRATAMA', 31, 1, '16930', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16931, 'REVANDRA AFITRI PURNAMA DHANIE', 31, 2, '16931', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16932, 'SEVA MILANOMEZA HIDAYAT', 31, 1, '16932', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16933, 'TEGAR PUTRA PERMANA', 31, 1, '16933', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16934, 'TIARA LAUDYA NAYSILA', 31, 2, '16934', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16935, 'WILDAN MAULANA HABIBI', 31, 1, '16935', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16936, 'ZAHRA GILANG YUMAYAHSA', 31, 2, '16936', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16937, 'ZASKIA SALMA FADHILLAH', 31, 2, '16937', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16938, 'ZULFA UMUMARIA SADEWI', 31, 2, '16938', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16939, 'ANDIKA BIMA PRAMUDYA', 32, 1, '16939', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16940, 'AQIELA ABIMANYU', 32, 1, '16940', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16941, 'ASA ADIRATNA AULIA', 32, 2, '16941', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16942, 'AZMI AULIYA PUTRI', 32, 2, '16942', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16943, 'CANEZA LOSANDRA DEVA SAPUTRI', 32, 2, '16943', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16944, 'DAVI AFDHALURRAHMAN', 32, 1, '16944', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16945, 'DAVID ALAMSYAH PUTRA NUGRAHA', 32, 1, '16945', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16946, 'ERINA NELI AMALIA', 32, 2, '16946', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16947, 'ERLANDA RAFLY ALFIQRI', 32, 1, '16947', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16949, 'FIRLINO CANDRA PUTRA SARDITYAW', 32, 1, '16949', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16950, 'FIRMAN KHANAFI', 32, 1, '16950', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16951, 'HADAITA AFDHILA', 32, 2, '16951', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16952, 'HAZIQ MUHAMMAD IQBAL', 32, 1, '16952', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16953, 'ILYASA AL-MUMTAZ', 32, 1, '16953', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16954, 'IVANKA DUKE SUKAMTO', 32, 1, '16954', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16955, 'KEVIN SINATRA', 32, 1, '16955', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16956, 'MUH ISMAIL CHANIFUDIN ZUHRI', 32, 1, '16956', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16957, 'MUHAMAD SARIF', 32, 1, '16957', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16958, 'MUHAMMAD ARSYA RIZKI', 32, 1, '16958', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16959, 'MUHAMMAD BAGUS ANGGORO', 32, 1, '16959', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16960, 'MUHAMMAD FAKHRI AKBAR', 32, 1, '16960', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16961, 'MUHAMMAD HAFIDZ LUTHFI', 32, 1, '16961', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16962, 'MUHAMMAD RIZZWAR ARDIAN SYAH', 32, 1, '16962', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16963, 'NANANG AMIRUL CHOIRUDDIN', 32, 1, '16963', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16964, 'NAUFAL FADHIL HIDAYAT', 32, 1, '16964', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16965, 'NAYLA TRISTA YULIANA', 32, 2, '16965', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16966, 'NAZWA KAYLA PUTRI NUR AZIZAH', 32, 2, '16966', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16967, 'PUTRI AULIA YASMIN AZAHRA', 32, 2, '16967', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16968, 'RAYHAN WAHYU SAPUTRA', 32, 1, '16968', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16969, 'SABRINA BUNGA FAJRI AL-AUFA', 32, 2, '16969', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16970, 'SABRINA NOVA ANDINI', 32, 2, '16970', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16971, 'SANJAYA PRATAMA PUTRA', 32, 1, '16971', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16972, 'TONI INDRA KURNIAWAN', 32, 1, '16972', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16973, 'WAHYU PUJI ASTUTI', 32, 2, '16973', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16974, 'YASSER JUANG GUMULYA', 32, 1, '16974', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16975, 'ADITYA PUTRA KURNIAWAN', 33, 1, '16975', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16976, 'ADITYA RICKY PRATAMA', 33, 1, '16976', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16977, 'AHMAD FARID MINTO NUGROHO', 33, 1, '16977', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16978, 'ARINA MAZIYAH', 33, 2, '16978', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16979, 'BAGUS YOHAN SAPUTRA', 33, 1, '16979', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16980, 'DAFFA HILMI KURNIAWAN', 33, 1, '16980', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16981, 'DHEA ARNESYANINGSIH', 33, 2, '16981', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16982, 'DIMAS DWI KURNIAWAN', 33, 1, '16982', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16983, 'EARLY RETNO RAHAYU', 33, 2, '16983', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16984, 'FA\'IZ DEYASYA', 33, 1, '16984', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16985, 'FATTAN HAFIDZ ADIYATMA AZIRA', 33, 1, '16985', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16986, 'FIRYAWAN SHEVA PRATAMA', 33, 1, '16986', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16987, 'GILANG KURNIAWAN', 33, 1, '16987', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16988, 'GILANG SYAMSI QOLBI WALID', 33, 1, '16988', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16990, 'HENDRI CAHYA PRATAMA', 33, 1, '16990', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16991, 'KASIH ANDRIA VINATA', 33, 2, '16991', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16992, 'KHOIRUL INSAN', 33, 1, '16992', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png');
INSERT INTO `tb_siswa` (`nis`, `nama`, `id_kelas`, `jk`, `user`, `pass`, `foto`) VALUES
(16994, 'LUTFI DIAN FITRIA', 33, 2, '16994', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16995, 'MAULIA NOVITA DAMAYANTI', 33, 2, '16995', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16996, 'MILA DIA NUR AULIA', 33, 2, '16996', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16997, 'MUHAMAD LUCKY AS\'ARI', 33, 1, '16997', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16998, 'MUHAMAD TRI WINARNO', 33, 1, '16998', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(16999, 'MUHAMMAD EKA SATRIYA AFRIANDAR', 33, 1, '16999', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17000, 'MUHAMMAD FIKRI SAPUTRA', 33, 1, '17000', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17001, 'QUSAY ADYA GALAGHAZY', 33, 1, '17001', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17002, 'RADITYA CANDRA IBRAHIM', 33, 1, '17002', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17003, 'RAFELIN IHKSAN MAULANA', 33, 1, '17003', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17004, 'REVANIA ANGGRAHENI', 33, 2, '17004', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17005, 'RIS KUMALA SARI', 33, 2, '17005', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17006, 'RIZKIA DEVI NUR CHAIRINNISA', 33, 2, '17006', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17007, 'ROCHMAD SAPUTRO', 33, 1, '17007', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17008, 'SITI DEWI PUJI LESTARI', 33, 2, '17008', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17009, 'YOSANITA MAWAR DHANI', 33, 2, '17009', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17010, 'YUSUF CHOIRUL RIZA', 33, 1, '17010', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17011, 'ACHLIS NURAINI', 12, 2, '17011', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17012, 'AMALIA FAUZIA NURAINI', 12, 2, '17012', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17013, 'ANNISA KHOIRIAH RIZKY NUR FAIR', 12, 2, '17013', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17014, 'ARIVALIA RISMAYA DHANTI', 12, 2, '17014', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17015, 'ATIQAH FITRIA RAHMAZANNIS', 12, 2, '17015', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17016, 'BUNGA EKA RAMADHANI', 12, 2, '17016', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17017, 'DESI AOLIA ARDINA', 12, 2, '17017', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17018, 'DESNITA AYU SETYANINGSIH', 12, 2, '17018', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17019, 'DIAN AYU PUSPITASARI', 12, 2, '17019', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17020, 'DINDA TRISTA CAHYA KAYLA', 12, 2, '17020', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17021, 'DWI NUR WAHYU FITRIYATI', 12, 2, '17021', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17022, 'FATIMAH AZZAHRA', 12, 2, '17022', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17023, 'FATMA NUR AMALIA', 12, 2, '17023', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17024, 'FEBRI HIMATUL ALIYAH', 12, 2, '17024', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17025, 'FITRI AULIA', 12, 2, '17025', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17026, 'HANAFI', 12, 1, '17026', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17027, 'HANIFAH ALYA IKAWARDANI', 12, 2, '17027', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17028, 'HASNA QILLA IZZATUL AFIFAH', 12, 2, '17028', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17029, 'KAILA TUNJUNG KRISNAWATI', 12, 2, '17029', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17030, 'KAMIDIA BILQIST SHAYNA', 12, 2, '17030', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17031, 'KHANZA CALLYSTA PUTRI ARDIYA', 12, 2, '17031', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17032, 'LAYLA NUR KHASANAH', 12, 2, '17032', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17033, 'LILIS NUR AINI', 12, 2, '17033', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17034, 'LIRA SHOPI PRATANIA', 12, 2, '17034', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17035, 'LISTIA FADHILAH', 12, 2, '17035', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17036, 'NADIFA LAILA NASIKHATUL UMAH', 12, 2, '17036', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17037, 'NA\'ILAH ALTHAF IMTIYAZ', 12, 2, '17037', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17038, 'REVI AYU SUSANTI', 12, 2, '17038', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17039, 'RIFA AGHNIA MAGHFIROH', 12, 2, '17039', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17040, 'RIZKI FITRIA', 12, 2, '17040', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17041, 'SADINA AYU NAFISAH', 12, 2, '17041', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17042, 'SAFINA IKA ARYANI', 12, 2, '17042', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17043, 'SALSA ZAHRA MAULIDA', 12, 2, '17043', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17044, 'SATRIA ISYA PERDANA', 12, 1, '17044', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17045, 'SITI KOIRUL MANUR MABRROH', 12, 2, '17045', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17046, 'SUNLIFEA ANNABELLE SHOLEHA', 12, 2, '17046', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17047, 'ADZRA AQILA MAYSAPRIVA', 13, 2, '17047', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17048, 'AKHIRIN DINASTITI', 13, 2, '17048', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17049, 'ALEA VIXIDHA MUTIARA', 13, 2, '17049', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17050, 'ALFIA HIMMATUL \'ULYA', 13, 2, '17050', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17051, 'ANDHIKA HIMAWAN', 13, 1, '17051', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17052, 'ARISTA AULIA KHAIRUNISA', 13, 2, '17052', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17053, 'ARTATI SETYANINGRUM', 13, 2, '17053', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17054, 'AYESHYA NABILLA', 13, 2, '17054', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17055, 'AZZAHRA TUSYITA', 13, 2, '17055', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17056, 'BINTANG AULIA SURIANSYAH', 13, 2, '17056', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17057, 'CARISSA AULIA PERMATA', 13, 2, '17057', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17058, 'ERSA NUR SALSABILA', 13, 2, '17058', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17059, 'EVA FITRIANA', 13, 2, '17059', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17060, 'FITRIA AURANISSA PRADYA HADIST', 13, 2, '17060', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17061, 'FITRIA AYU RAMADHANI', 13, 2, '17061', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17062, 'GILANG GEMA MAHARDHIKA', 13, 1, '17062', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17063, 'IDZNI ZALFA\'AZATIL ALWAN', 13, 2, '17063', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17064, 'JARIMA SAFITRIYANTI', 13, 2, '17064', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17065, 'KEISHA INES LOLITA', 13, 2, '17065', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17066, 'KHANZAA AMALINA', 13, 2, '17066', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17067, 'MAWADDATUN NAFIISAH', 13, 2, '17067', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17068, 'MAY ERLSHA ASWANIA ACHMA', 13, 2, '17068', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17069, 'MUHAMMAD FATIH FATURRAHMAN', 13, 1, '17069', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17070, 'NUR FAZURA FEBRINA PUTRI', 13, 2, '17070', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17071, 'PUSPITA HIDAYATI NURANI', 13, 2, '17071', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17072, 'RADISSA AZKA MAZAYA', 13, 2, '17072', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17073, 'RATNA ANGGRAENI PUSPITASARI', 13, 2, '17073', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17074, 'RENATA CAHYANINGRUM', 13, 2, '17074', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17075, 'RESTU WIDY ASTUTI', 13, 2, '17075', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17076, 'RISKA AULA KHUMAIRAH', 13, 2, '17076', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17077, 'RISQI ADI NUGROHO', 13, 1, '17077', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17078, 'ROSALIA ANA DEWI', 13, 2, '17078', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17079, 'SILFI MAHFIROTUS SHOLIKHAH', 13, 2, '17079', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17080, 'THARA ASTA PUTRISYA', 13, 2, '17080', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17081, 'TSALSA WILDA YULIYANTI', 13, 2, '17081', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17082, 'VIDIA SELOMHITA PUTRI', 13, 2, '17082', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17083, 'ADINDA HILGA PUTRI WIRATAMI', 14, 2, '17083', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17084, 'AKBAR SURYO WICAKSONO', 14, 1, '17084', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17085, 'ANI SETIYA NINGRUM', 14, 2, '17085', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17086, 'ARINI AULIATHA NAJA', 14, 2, '17086', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17087, 'ARISTA WIDYA HAYU', 14, 2, '17087', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17088, 'AYRIN INDAH FARIKHATIN', 14, 2, '17088', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17089, 'AYUDIA SHINTA KARTIKA', 14, 2, '17089', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17090, 'AZZAHRA NURUL ROHMAH', 14, 2, '17090', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17091, 'DIVA MUHARROMAH JATI', 14, 2, '17091', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17092, 'DYSTI HELYA IBRIZA', 14, 2, '17092', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17093, 'ELVAIZA RAMADHANI', 14, 2, '17093', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17094, 'ERFA NUR FARHANA ALYA NABILA', 14, 2, '17094', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17095, 'IDAYANTI', 14, 2, '17095', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17096, 'KHALYANA PRITADINA', 14, 2, '17096', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17097, 'NABILLA RESY BRILLIANT PUTRI', 14, 2, '17097', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17098, 'NADIA RATNA SARI', 14, 2, '17098', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17099, 'NAILA MAHARANI', 14, 2, '17099', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17100, 'NAILU ELYA RAMADHANI', 14, 2, '17100', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17101, 'NAYLA DWI RAMADHANI', 14, 2, '17101', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17102, 'NESYA AZARA', 14, 2, '17102', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17103, 'NINDI FERNANDA', 14, 2, '17103', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17104, 'NOVIA ARFANI', 14, 2, '17104', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17105, 'NUR AINI NAJLA FATINA', 14, 2, '17105', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17106, 'OLIN WIDYARNI', 14, 2, '17106', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17107, 'RADISYA ARTANTI PUTRI WIDYANTO', 14, 2, '17107', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17108, 'RAJUA ARROUFA AZHZHAARA TAHAR', 14, 2, '17108', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17109, 'ROSITA AULIA SABILA', 14, 2, '17109', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17110, 'SINARA PUTRI', 14, 2, '17110', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17111, 'SINTA EFISTIANA', 14, 2, '17111', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17112, 'SOFIALIKA TEGUH SAPUTRI', 14, 2, '17112', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17113, 'SRI WIDYAWATI PUSPITASARI', 14, 2, '17113', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17114, 'VIKI DIAH ANGGRAINI', 14, 2, '17114', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17115, 'YAN PARTA IMAM GIFARI', 14, 1, '17115', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17116, 'YOVITA RISNA MAHELTA', 14, 2, '17116', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17117, 'YUNA AGUSTIN', 14, 2, '17117', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17118, 'YUNITA NURHIDAYAH', 14, 2, '17118', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17119, 'ADINDA WIDYA AYU', 15, 2, '17119', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17120, 'ALIFIA AGUSTINA', 15, 2, '17120', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17121, 'ALIFIA RAMADHANI SAPUTRI', 15, 2, '17121', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17123, 'APRILLIA NURAGNI RESYABANI', 15, 2, '17123', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17124, 'ARDAN AFRIZAL', 15, 1, '17124', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17125, 'ARISTITA VELANI', 15, 2, '17125', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17126, 'AULIA MARSHANDA', 15, 2, '17126', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17127, 'BUNGA RISMA ASSYAHARA', 15, 2, '17127', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17128, 'CHEYSA DEHAN MIFTAJANI', 15, 2, '17128', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17129, 'CICI WAHYU SABILA', 15, 2, '17129', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17130, 'DESY VALENTINA ASHARY', 15, 2, '17130', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17131, 'DEVITA FIBRIANI', 15, 2, '17131', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17132, 'DIAN TRI YAMANDANI', 15, 2, '17132', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17133, 'DWI WIDANIA', 15, 2, '17133', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17134, 'ENDANG SULISTYOWATI', 15, 2, '17134', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17135, 'FINNA PUTRI LARASATI', 15, 2, '17135', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17136, 'DEVANI CASILA', 15, 2, '17136', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17137, 'JIHAN APRILIA DEWI', 15, 2, '17137', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17138, 'LATHIFA AZAHRA PUTRIANI', 15, 2, '17138', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17139, 'NADYA AYU ANDARISMA', 15, 2, '17139', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17140, 'NAUFAL TSAQIIF SATRIANI', 15, 1, '17140', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17141, 'NAYA SITA PURNAMA', 15, 2, '17141', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17142, 'NAZWA ALEA AZAHRA', 15, 2, '17142', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17143, 'NESSA AYU SAPUTRI', 15, 2, '17143', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17144, 'NIA NOVITA SARI', 15, 2, '17144', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17145, 'NURAENI ZULAICHAH', 15, 2, '17145', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17146, 'RAIHANA SHABIRA', 15, 2, '17146', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17147, 'RIVATUL CAHYANINGTIAS', 15, 2, '17147', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17148, 'RIZQY REYHAN SAPUTRA', 15, 1, '17148', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17149, 'SARAH NUR FAIZAH', 15, 2, '17149', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17150, 'SHOFIA ZAHRATUNNISA BRATA', 15, 2, '17150', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17151, 'SILVANA AULIA NINGRUM', 15, 2, '17151', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17152, 'SITI NINING CHASANAH', 15, 2, '17152', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17153, 'WINDA SETYANINGSIH', 15, 2, '17153', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17154, 'ZAFIROL HUKMA', 15, 2, '17154', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17155, 'ADE ANING RAHAYU', 16, 2, '17155', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17156, 'ALFISYA KANIA BRILIANTI', 16, 2, '17156', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17157, 'ALIZA HIDAYAH', 16, 2, '17157', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17158, 'ANGGELLINA PUTRI SUBONDO', 16, 2, '17158', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17159, 'A1NI CINDY CAHYANING TYAS', 16, 2, '17159', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17160, 'ARIFFAH FEBRI WIDYA TALIA', 16, 2, '17160', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17161, 'BAGAS DWI CAHYO', 16, 1, '17161', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17162, 'CALISTA AZALIA PUTRI PRASETYA', 16, 2, '17162', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17163, 'DEWI AVINDA MUTIASANI', 16, 2, '17163', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17164, 'DIAH PUTRI KENCANA', 16, 2, '17164', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17165, 'DINI ERLYANA YASMIN', 16, 2, '17165', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17166, 'DIYAN AUFA NADIYYA', 16, 2, '17166', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17167, 'ETHALIA ANGGER LUHUNG ADI PRAS', 16, 2, '17167', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17168, 'FEBRINA PUTRI', 16, 2, '17168', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17169, 'FITRIANINGSIH', 16, 2, '17169', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17170, 'FRISIA WINA MALIK', 16, 2, '17170', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17171, 'HARDIAS MAYLISA CHANDRA', 16, 2, '17171', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17172, 'JESSICA ANABEL NADYA SISWOYO', 16, 2, '17172', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17173, 'JIHAN APRILIA EKASARI', 16, 2, '17173', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17174, 'LU\'LU\' SALMA TSALITSA', 16, 2, '17174', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17175, 'MAULIDATUL MUFIDA', 16, 2, '17175', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17176, 'MOZA RYEVA SEPTYASHA', 16, 2, '17176', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17177, 'NADHIMSYAH ZALFA ARIQ', 16, 2, '17177', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17178, 'NOVILIA INTAN AYU TIARA SAPUTR', 16, 2, '17178', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17179, 'NOVITA EKA AFRIANSA', 16, 2, '17179', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17180, 'RAHMA DWI AULIA', 16, 2, '17180', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17181, 'RATNA AULIA', 16, 2, '17181', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17182, 'RATNA AURELLIA FEBRIAN', 16, 2, '17182', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17183, 'SANDIAS DIAN ALFIANSAH', 16, 1, '17183', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17184, 'SEVI ZULIANI', 16, 2, '17184', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17185, 'SEVIA DELA AVISA', 16, 2, '17185', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17186, 'SHALUNA PHERAQUILA SAFRYNA KAR', 16, 2, '17186', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17187, 'SILA FEBRIANTI', 16, 2, '17187', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17188, 'SRI RAHAYU', 16, 2, '17188', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17189, 'ULFA WAFIQ AFIFAH', 16, 2, '17189', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17190, 'ULYA WULANDARI', 16, 2, '17190', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17191, 'ADINDA VATYA MAHESA', 17, 2, '17191', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17192, 'A\'ENI MASRUROH', 17, 2, '17192', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17193, 'ANISSA CINDY OKTAVIA', 17, 2, '17193', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17194, 'ANNISA RAMADHANI', 17, 2, '17194', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17195, 'AURA INNAYAH ZENTISA', 17, 2, '17195', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17196, 'DEWI KHOLISHOH', 17, 2, '17196', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17197, 'FELISA DWI HASTUTI', 17, 2, '17197', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17198, 'FIRA AYUNDA', 17, 2, '17198', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17199, 'GALUH DWI SAFITRI', 17, 2, '17199', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17200, 'HESTI GINA AYU MALA', 17, 2, '17200', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17201, 'INDAH INDARWATI', 17, 2, '17201', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17202, 'JUWITA DWI RAHAYU', 17, 2, '17202', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17203, 'KHUSNUL FAJRI', 17, 1, '17203', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17204, 'MARVA OTTA NATHANIA', 17, 2, '17204', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17205, 'METTY RITA NURJANAH', 17, 2, '17205', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17206, 'MUHAMAD DENI LUJAYEN', 17, 1, '17206', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17207, 'MUTHIA NAIMAH HILWA', 17, 2, '17207', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17208, 'NABILA FAIZATUZ ZAHRA', 17, 2, '17208', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17209, 'NADHIN NOVIA ANDINI', 17, 2, '17209', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17210, 'NADYA NORMA YUNITA', 17, 2, '17210', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17211, 'NAILA ASMAWATI', 17, 2, '17211', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17212, 'NAJMA JAMILLA', 17, 2, '17212', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17213, 'PUTRI ASDYAN NOVITA', 17, 2, '17213', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17214, 'RAFA DANIYS AMANDA', 17, 2, '17214', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17215, 'RASHYA NABIL ATTAYA', 17, 2, '17215', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17216, 'RIZKA ANGGRAENI', 17, 2, '17216', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17217, 'RIZKA NURUL HIDAYAH', 17, 2, '17217', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17218, 'SALWA VANI NURHALISAH', 17, 2, '17218', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17219, 'SITI NUR MUTHO HAROH', 17, 2, '17219', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17221, 'VINA LUSIANA DEWI', 17, 2, '17221', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17222, 'WAHIDAH NURAENI', 17, 2, '17222', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17223, 'WAHYU LILIK INDRAWATI', 17, 2, '17223', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17224, 'WAHYU OKTA WULANDARI', 17, 2, '17224', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17225, 'ZAHWA AZZUHRA SAEFUDIN', 17, 2, '17225', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17226, 'ZANIA NISRINA AFRA SALSABILA', 17, 2, '17226', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17227, 'ACHNYANA LATIFAH', 18, 2, '17227', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17229, 'ARSILA USDYA MEYANTI', 18, 2, '17229', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17232, 'DANIEL ANADITO KRISTIANNO', 18, 1, '17232', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17233, 'DEA AULIA FATHMAWATI', 18, 2, '17233', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17234, 'DELPHINIA DANISWARA DARMASTUTI', 18, 2, '17234', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17235, 'EVA MASRUROH', 18, 2, '17235', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17236, 'FITRIA DEWI NOVIANTI', 18, 2, '17236', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17237, 'HASNA NUR AWALIYA', 18, 2, '17237', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17238, 'IBNU AKMAL', 18, 1, '17238', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17239, 'IBRA PRADIPTA PUTRA', 18, 1, '17239', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17240, 'KANZA MUTIA FEBRICA HARDYANTI', 18, 2, '17240', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17241, 'MUHAMMAD AL FAUZAN SATYA PERMA', 18, 1, '17241', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17242, 'MUHAMMAD HAVI ARRAHMAN', 18, 1, '17242', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17243, 'MUHAMMAD PANGLIMA SYUHADA', 18, 1, '17243', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17244, 'NAFISATUN NAYA', 18, 2, '17244', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17245, 'NAILA APRILIA FAIZAH', 18, 2, '17245', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17246, 'NASYWA NUR TSABITA', 18, 2, '17246', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17247, 'RAFLY MAULANA SAPUTRA', 18, 1, '17247', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17248, 'RAHMAENI ASSYFA UL QOLBI', 18, 2, '17248', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17249, 'REYHAN PUTRA HERDIYANTO', 18, 1, '17249', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17250, 'RIDHO DAMAR HERDANUANSYAH', 18, 1, '17250', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17251, 'RIZKI NITA PUTRI AMELIA', 18, 2, '17251', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17252, 'SALMA NUR\'AINI', 18, 2, '17252', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17253, 'SALWA ETIKA RAHMAWATI', 18, 2, '17253', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17254, 'SALWA INAFA SABILA', 18, 2, '17254', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17255, 'SHELA MELINDA', 18, 2, '17255', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17256, 'SITI KHOERUNNISA\'', 18, 2, '17256', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17257, 'SYIFA LEONA HAYU ANGGRESIA', 18, 2, '17257', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17258, 'VARREL EGA NAUFAL', 18, 1, '17258', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17259, 'VIAN ZANUAR RIFAI', 18, 1, '17259', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17260, 'VICKI SATRIA NEYO PUTRA', 18, 1, '17260', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17261, 'YEHUDA PRIMA MORRARES', 18, 1, '17261', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17262, 'YUGA TRI NOVIANTORO', 18, 1, '17262', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17263, 'ACHMAD RIDHO HARYRIE', 19, 1, '17263', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17264, 'ALIFIA ABIDATILLAH', 19, 2, '17264', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17265, 'ALUNA SUKMA FARDA ILLIYYA', 19, 2, '17265', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17266, 'AZHAR KAMILA AUFA DHIYA', 19, 2, '17266', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17267, 'ETALIKA HANA BAROTA', 19, 2, '17267', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17268, 'FADLAN PRIMA', 19, 1, '17268', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17269, 'FAISEL DEFRANCE SABUNA', 19, 1, '17269', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17270, 'FEBI FERTIKA SARI', 19, 2, '17270', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17271, 'FEBRIAN ARIF KURNIAWAN', 19, 1, '17271', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17273, 'ILHAM HABIB WICAKSONO', 19, 1, '17273', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17274, 'IRFAN HIDAYAT', 19, 1, '17274', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17275, 'KHAIRA DANISH ARA KHANZA', 19, 2, '17275', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17276, 'LUKMA LAILATUL MASRURAH', 19, 2, '17276', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17277, 'MARSHA TRI HIDAYAH', 19, 2, '17277', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17278, 'MOHAMMAD ARJUNA DYNATA', 19, 1, '17278', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17279, 'NADIA SABILATURROHMAH', 19, 2, '17279', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17280, 'NADILLA NAZWA HANDAYANI', 19, 2, '17280', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17281, 'NAFISA RIZKY MAULIDA', 19, 2, '17281', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17282, 'NESSYA ALDIYANI PUTRI', 19, 2, '17282', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17283, 'NUR ISNAENI', 19, 2, '17283', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17284, 'PRITANUR JAYA', 19, 2, '17284', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17285, 'RATIH DIAN PERMATA', 19, 2, '17285', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17286, 'RAYKHAN AHESSA PRATAMA', 19, 1, '17286', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17287, 'REEDO FATHIR ZULMAELY', 19, 1, '17287', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17288, 'REIVAN ALFIN DWI MAHESA SISWAD', 19, 1, '17288', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17289, 'RICHO ALDIAN MAULANA', 19, 1, '17289', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17290, 'RISQI DEWI UTAMI', 19, 2, '17290', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17291, 'SALSHA DELLA ENDANG WULANSARI', 19, 2, '17291', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17292, 'SELLY RATNA AMELIA', 19, 2, '17292', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17293, 'SITI BUDIATUL FADILLAH', 19, 2, '17293', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17294, 'SUNNY SUSANTI', 19, 2, '17294', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17295, 'SYAHRIL PRASETYO', 19, 1, '17295', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17296, 'ULIN NI\'MAH RIZKINA', 19, 2, '17296', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17297, 'UMI NURJANAH', 19, 2, '17297', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17298, 'ZAHRA KAMEELA NURDIANTO', 19, 2, '17298', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17299, 'ABIMANYU ADENA MAULANA AKBAR', 20, 1, '17299', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17300, 'ABIMANYU BAGASKARA PUTRA PURNA', 20, 1, '17300', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17301, 'AILA RAHMA', 20, 2, '17301', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17302, 'ALDIANO VRYZAS SUDARSONO', 20, 1, '17302', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17303, 'ALSYA KANAYA DZIKRA', 20, 2, '17303', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17304, 'ANINDYA NUR RAHMA', 20, 2, '17304', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17305, 'ARIEF ARDIANTO NUGROHO', 20, 1, '17305', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17306, 'CIKA OKTI RAMDHANI', 20, 2, '17306', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17307, 'DENNIS ABHIESTA ARCHIEYASA', 20, 1, '17307', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17308, 'DESTANDRA BIYAN SAPUTRA', 20, 1, '17308', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17309, 'DEVITA WAHYU WULANDARI', 20, 2, '17309', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17310, 'ELFREDA FAIZ RADITYA PRATAMA', 20, 1, '17310', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17311, 'FENNY PRAVITA NURAINI', 20, 2, '17311', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17312, 'FINA ROHMATUL UMAH', 20, 2, '17312', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17313, 'GAVIN TYAGA DANISWARA', 20, 1, '17313', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17314, 'HAIDAR AGAM AFFANDANI', 20, 1, '17314', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17315, 'HELMI AQSHA FIRDAUSSI', 20, 1, '17315', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17316, 'IRFAN ARIF FADHILLAH', 20, 1, 'ipan', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17317, 'IRMA ALIFIYATUZ ZAHWA', 20, 2, '17317', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17318, 'IZZATUN NISSA', 20, 2, '17318', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17319, 'JASON GERARD ATMAJA', 20, 1, '17319', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17320, 'KANAKA RACHEL NASHITA', 20, 2, '17320', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17321, 'KHAYLILLA RYANA AGUSTIN', 20, 2, '17321', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17322, 'KURNIA AZ ZAHRA ILMI SYADZA', 20, 2, '17322', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17323, 'MADA ALVINO MAULANA RUKY', 20, 1, '17323', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17324, 'MIRZA ZAKY QASTHALANY', 20, 1, '17324', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17325, 'MOHAMAD SINATRYA AL WARID', 20, 1, 'warid', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17326, 'MUHAMMAD IQBAAL TAQI TSAAQIF', 20, 1, '17326', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17327, 'NAURRA CITRA RAHMAWATI', 20, 2, '17327', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17328, 'PUTRI ARUMARISTIANA AMALIA HID', 20, 2, '17328', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17329, 'RAIHAN BAGUS SAPUTRA', 20, 1, '17329', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17330, 'RASYA NELFI FABRIELE DELVINO', 20, 1, '17330', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17331, 'RAZINDRA ZAHYALWAAN BAADHILAH', 20, 1, '17331', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17332, 'SODIQ RAHMADTULLAH', 20, 1, '17332', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17333, 'WASFA NUR\'AINI', 20, 2, '17333', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17334, 'ZAHRA AULIA DESINTA', 20, 2, '17334', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17335, 'AULIA RAHMAWATI', 21, 2, '17335', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17336, 'AUREL GRISKA PUTRIA ERGA', 21, 2, '17336', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17337, 'DENNYSON HOSPERS', 21, 1, '17337', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17338, 'FADLAN ELRIZKY', 21, 1, '17338', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17339, 'FAHRI RIZKI RAMADHAN', 21, 1, '17339', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17340, 'FIDELA DAMA EKSANI', 21, 2, '17340', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17341, 'GWEN JINGGA STEFANI', 21, 2, '17341', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17342, 'HARIS SETIADI', 21, 1, '17342', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17343, 'HENDY PRASETIAWAN', 21, 1, '17343', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17344, 'HERLA BENAREAL ADNANTO', 21, 1, '17344', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17345, 'ILHAM UWAIS MAHNUGRA', 21, 1, '17345', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17346, 'JANNATAN ARKAN RAHMAWAN', 21, 1, '17346', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17347, 'KHOIRUL MUVII', 21, 1, '17347', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17348, 'KRISNA KURNIAWAN', 21, 1, '17348', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17349, 'MALA LAILATUL ARIFAH', 21, 2, '17349', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17350, 'MUHAMMAD ARDZAN ALVARESTHA', 21, 1, '17350', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17351, 'MUHAMMAD ARIFIN', 21, 1, '17351', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17352, 'MUHAMMAD SEVA HARDIAN', 21, 1, '17352', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17353, 'NABILA GHAITSA ZAIVA LALITA', 21, 2, '17353', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17354, 'NAGITA SOFYANA LINTANG PERMATA', 21, 2, '17354', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17355, 'NUR AFNA HIKMA OKTAVIA', 21, 2, '17355', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17356, 'NURUL AISAH', 21, 2, '17356', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17357, 'PRASTIKA', 21, 2, '17357', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17358, 'PRIMA YUDA PURNAMA', 21, 1, '17358', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17359, 'RAYSA AZAHRA PRATIWI', 21, 2, '17359', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17360, 'ROBBY ZIDAN A\'ROF', 21, 1, '17360', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17361, 'SALSABILA AYU PUSPITASARI', 21, 2, '17361', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17363, 'SHELLY EOUDIA SETYAWATI', 21, 2, '17363', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17364, 'SHERLI OKTAVIANI', 21, 2, '17364', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17365, 'SITI PUJI RAHAYU', 21, 2, '17365', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17366, 'SULTHAN MARZUQ MAZAYA', 21, 1, '17366', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17367, 'SYALISYU AZKA ADHAR', 21, 1, '17367', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png');
INSERT INTO `tb_siswa` (`nis`, `nama`, `id_kelas`, `jk`, `user`, `pass`, `foto`) VALUES
(17368, 'VENANT FORTUNATUS HERMAWAN PUT', 21, 1, '17368', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17369, 'WISNU PRATAMA', 21, 1, '17369', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17370, 'ZALFA KHALISA', 21, 2, '17370', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17371, 'ADIVA SEKAR MAHARANI', 22, 2, '17371', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17372, 'AFRYLIANO DEFRIANSYACH', 22, 1, '17372', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17373, 'AKHMAD IKHSANI', 22, 1, '17373', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17374, 'ALDO SATRIO WICAKSONO', 22, 1, '17374', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17375, 'ALGHIFARY PRADITYA PRATAMA', 22, 1, '17375', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17376, 'CHOLIFATUN RAMADHANI', 22, 2, '17376', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17377, 'DELA PRAYUDITA AGUSTIN', 22, 2, '17377', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17378, 'DESTA EZZAR ARLONXY', 22, 1, '17378', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17379, 'DICKY PUTRA DEWANTA', 22, 1, '17379', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17380, 'DODY IMAM ALFAYED', 22, 1, '17380', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17381, 'DWI NOVITA SARI', 22, 2, '17381', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17382, 'FATHA SURYA PRATAMA', 22, 1, '17382', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17383, 'FITRIA ERIN SUSANTI', 22, 2, '17383', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17384, 'INDAH CAHYA MURTI', 22, 2, '17384', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17385, 'KHOLISOTUL ANIFAH', 22, 2, '17385', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17386, 'KIREINA MAGHFIRA AZ ZAHRA', 22, 2, '17386', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17387, 'LAILATUL MAHRIFAH', 22, 2, '17387', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17388, 'MANASYE FEBRIAN NAFTALI', 22, 1, '17388', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17389, 'MASAYU SEKAR ANINDITA', 22, 2, '17389', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17390, 'MICKO EXA ERLANGGA', 22, 1, '17390', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17391, 'MOCHAMAD ALL CAESAR SINATRIA', 22, 1, '17391', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17392, 'MUHAMAD ARDHIANDRA VAREZA', 22, 1, '17392', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17393, 'MUHAMMAD INDRA MAULANA', 22, 1, '17393', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17394, 'NAJWA WULANDARI', 22, 2, '17394', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17395, 'NANDA HANIF ABYAN BROMO PUTRA', 22, 1, '17395', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17396, 'NAUFA YANUAR LUTFI NADZIR CHOE', 22, 1, '17396', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17397, 'NAUFAL MUWAFFAQ', 22, 1, '17397', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17398, 'NAYSILA RIFA HENINDRA', 22, 2, '17398', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17399, 'NICHOLAS CHRISTIAN HARTONO', 22, 1, '17399', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17400, 'PRADIPA EKA SAPUTRA', 22, 1, '17400', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17401, 'RAISSA VALENTYA NAOMI', 22, 2, '17401', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17402, 'REIFAN AHMAD MUHYIDIN', 22, 1, '17402', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17403, 'SYAFA RAHMA HIKA', 22, 2, '17403', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17404, 'TALITHA NISRINA MARDIYYAH', 22, 2, '17404', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17405, 'TAUFIQ HIDAYAT', 22, 1, '17405', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17406, 'YUAND ANGESTI RIZQIAJI', 22, 2, '17406', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17407, 'YUSAN PAMUNGKAS WIJAYA', 31, 1, '17407', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17408, 'ADINDA KAYLA YASMINE', 1, 2, '17408', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17409, 'ALIYA SALSABAIELA KUSUMA WARDA', 1, 2, '17409', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17410, 'ALVIE LARASATI', 1, 2, '17410', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17411, 'AMELIA LUNA RIMA', 1, 2, '17411', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17412, 'ARUM FEBIYANTI', 1, 2, '17412', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17413, 'ATANASIUS BANYU AJI PAMUNGKAS', 1, 1, '17413', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17414, 'CHUMAIROTUR ROCHIMAH', 1, 2, '17414', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17415, 'DANI ALFIANA', 1, 2, '17415', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17416, 'DESI NUR MULYANI', 1, 2, '17416', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17417, 'FIOLA NOVITASARI', 1, 2, '17417', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17418, 'FITRIYANI LAILA SEPTI', 1, 2, '17418', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17419, 'HILDA PUSPITA RAHMA', 1, 2, '17419', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17420, 'JASMINE KANAHAYA ANDRIE', 1, 2, '17420', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17421, 'KANAYA TABITA MAHARANI', 1, 2, '17421', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17422, 'KHARISMA PUTRI ASSYIFA', 1, 2, '17422', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17423, 'LIYA NUR AINI', 1, 2, '17423', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17424, 'MARTHA PUJIARTI', 1, 2, '17424', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17425, 'MEILANI DWI LESTARI', 1, 2, '17425', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17426, 'MELISA AYU PERMATASARI', 1, 2, '17426', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17427, 'MEPI SUSANI', 1, 2, '17427', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17428, 'NADYA BACHRUR RIZQY', 1, 2, '17428', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17429, 'NAVISA BINTANG MAHARANI', 1, 2, '17429', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17430, 'NIFA ANNISA', 1, 2, '17430', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17431, 'PUTRI RAE MAWASTI', 1, 2, '17431', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17432, 'RADITYA LUTHFI ANANTA', 1, 1, '17432', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17433, 'REGINA AMANDA PUTRI', 1, 2, '17433', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17434, 'RIS TINAWATI', 1, 2, '17434', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17435, 'RISKY NOVENDRA ADJI SAPUTRA', 1, 1, '17435', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17436, 'RISMA KURNIAWATI', 1, 2, '17436', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17437, 'RIZKINA ZAHWA NUR AFIANTI', 1, 2, '17437', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17438, 'RIZKY ANGGI NUR CAHYANI', 1, 2, '17438', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17439, 'SALSA FADILA AYUNINGRUM', 1, 2, '17439', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17440, 'SYAFA MAULIDA HARNIYATI', 1, 2, '17440', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17441, 'VINCENTIA ASMARANI GALUH AJENG', 1, 2, '17441', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17442, 'VIRALIA NUR AYUNI', 1, 2, '17442', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17443, 'ZAHRA LANA SA\'ADAH', 1, 2, '17443', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17444, 'AFRIYANI CHOERUNNISA', 2, 2, '17444', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17445, 'ALUNA PUSPA HURUL AINI', 2, 2, '17445', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17446, 'APRILIANA WIDYA SARI', 2, 2, '17446', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17447, 'AQILLA HANUN RAMADHANI', 2, 2, '17447', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17448, 'ARISKA AULIA AZ ZAHRA', 2, 2, '17448', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17449, 'ARKANA BAHAUDIN FAIZ', 2, 1, '17449', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17450, 'AUREL FATIMAH', 2, 2, '17450', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17451, 'BELKHISA YAHRATUSITA', 2, 2, '17451', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17452, 'CECILLIA AYUWARDANI BANUNAEK', 2, 2, '17452', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17453, 'DITA JULIANI', 2, 2, '17453', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17454, 'DZITA MAYMANA JAZILA', 2, 2, '17454', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17455, 'ERLINA FAIZZATUL KAMILA', 2, 2, '17455', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17456, 'FAIRUZ TRIYA RAHAYU', 2, 2, '17456', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17457, 'FARAH NUR HIDAYATURROHMAH', 2, 2, '17457', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17458, 'FIKA NURUL WAHIDAH', 2, 2, '17458', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17459, 'INDAH SARASWATI', 2, 2, '17459', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17460, 'INTAN AYU CAHYANINGRUM', 2, 2, '17460', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17461, 'JENYA DIDHA APRILIA', 2, 2, '17461', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17462, 'JIHAN SAPUTRI', 2, 2, '17462', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17463, 'KHALLISA NURUL AMALIA', 2, 2, '17463', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17464, 'KHURIN AENI', 2, 2, '17464', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17465, 'LIA FARKHATUL MUNIROH', 2, 2, '17465', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17466, 'NABILA ZASKIA', 2, 2, '17466', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17467, 'NADIA FADILA', 2, 2, '17467', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17468, 'NADIA RAMADHANTY', 2, 2, '17468', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17469, 'NAILA JAUZA APRILIA', 2, 2, '17469', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17470, 'RADINA NUR AFIFAH AZZAHRA', 2, 2, '17470', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17471, 'RAKHA BAHTIAR SETIAWAN', 2, 1, '17471', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17472, 'RIFKA ALISTIA NINGRUM', 2, 2, '17472', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17473, 'ROJIFAH', 2, 2, '17473', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17474, 'SALSABILA RINTIA WARDANI', 2, 2, '17474', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17475, 'SALSABILA YUMNA', 2, 2, '17475', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17476, 'SIVIANA PUTRI RAHMADANI', 2, 2, '17476', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17477, 'STEFA AZAHRA ELSA PUTRI', 2, 2, '17477', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17478, 'ZAHRINA LADANIA AMARA', 2, 2, '17478', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17479, 'ZAHROTUSSITA FIRDANI', 2, 2, '17479', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17480, 'ADELINA AULIA ZAHRA SIREGAR', 3, 2, '17480', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17481, 'ALIFKHA PUTRI RIZKIA', 3, 2, '17481', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17482, 'AMANDA SALSABILAH', 3, 2, '17482', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17483, 'AMELIA CARRISA PUTRI', 3, 2, '17483', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17484, 'ANDINI CANDRA NADIASARI', 3, 2, '17484', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17485, 'ANGGITA ZAHRANI', 3, 2, '17485', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17486, 'BERLIANA AZZAHRA', 3, 2, '17486', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17487, 'CHALYSTA DESCHEA ROSELLYTA', 3, 2, '17487', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17488, 'CHELSEA DWIYANTI', 3, 2, '17488', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17489, 'CHERYN FIA ISTIANA', 3, 2, '17489', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17490, 'CRISSDA AYU PRATIWI', 3, 2, '17490', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17491, 'DESYA AMIRA KINANTI', 3, 2, '17491', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17492, 'DIVA PERMATA SARI', 3, 2, '17492', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17493, 'EKYAN NGUJIWATI ADZIKRO', 3, 2, '17493', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17494, 'ERDI RIFKI ANZAH', 3, 1, '17494', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17495, 'FANYSA RAHMAWATI', 3, 2, '17495', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17496, 'FAUZIA ASYIFA', 3, 2, '17496', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17497, 'ISNA DEVIRA NAWA CHUSNA', 3, 2, '17497', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17498, 'JULYA NENY TRIANA PUTRI', 3, 2, '17498', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17499, 'KEISHA VINA PRIYANKA', 3, 2, '17499', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17500, 'KHALYLA AZEEZA MAULIDYA', 3, 2, '17500', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17501, 'MEYLA ZAHRA ANGGRAENI', 3, 2, '17501', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17502, 'MUHAMMAD RIFQI ALFINAZAR', 3, 1, '17502', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17503, 'NAJWA NATASYA PUTRI', 3, 2, '17503', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17504, 'NAYLA KHALISHA YUNESTYA', 3, 2, '17504', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17505, 'RAHMA AYU LESTARI', 3, 2, '17505', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17506, 'RAMADINA AULIA SUSANTO', 3, 2, '17506', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17507, 'RAYSHA RARA SAHAZISKA', 3, 2, '17507', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17508, 'RIZKA ADELINA', 3, 2, '17508', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17509, 'SALMA SABRINA RAHMAWATI', 3, 2, '17509', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17510, 'SALSABILA ROSAMADAFI', 3, 2, '17510', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17511, 'SEKAR INDAH NOVIANA', 3, 2, '17511', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17512, 'SYAFARA ARDIANA NILAMSARI', 3, 2, '17512', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17513, 'ULFI NUR ULUM', 3, 2, '17513', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17514, 'YESI AGUSTINA', 3, 2, '17514', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17515, 'YUMA AMIRA PUTRI PRIYANTO', 3, 2, '17515', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17516, 'AILA LISTA KHOIRUNNISA', 4, 2, '17516', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17517, 'A\'ISY TRI SAKANTI', 4, 2, '17517', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17518, 'ALFIN NURROHMAN', 4, 1, '17518', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17519, 'ANISATUL MUBAROKAH', 4, 2, '17519', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17520, 'AQSYAL RENDIANSYAH', 4, 1, '17520', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17521, 'AYUHAN SASKI YAKIYA LATIF', 4, 2, '17521', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17522, 'AZKA TUFFAEL FATURROHMAN', 4, 1, '17522', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17523, 'DESTRIA KARTIKA MAHARANI', 4, 2, '17523', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17524, 'DIVA LIA LATIFA', 4, 2, '17524', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17525, 'ERSA ARINA AURANDA PUTRI', 4, 2, '17525', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17526, 'FAHMI CHARLIE FARREL AUBERT', 4, 1, '17526', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17527, 'FALIHATU SIFAATUROHMAH', 4, 2, '17527', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17528, 'FARIDA LINTANG RAMADHANI', 4, 2, '17528', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17529, 'FAUZIYAH LAILATUL IZZA', 4, 2, '17529', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17530, 'FAZARISMA NURMAYANTI', 4, 2, '17530', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17531, 'GENDIS FATIMATUZZAHRO', 4, 2, '17531', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17532, 'HAYYINA MASLIKHATUL UMAMI', 4, 2, '17532', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17533, 'INTAN NURAINI', 4, 2, '17533', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17534, 'ISNAINY HURUL AIN', 4, 2, '17534', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17535, 'KELDY CINTIA', 4, 2, '17535', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17536, 'KHOLISNA ANGGRAENI', 4, 2, '17536', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17537, 'LATIFAH UTAMI', 4, 2, '17537', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17538, 'LUTHFIA NARESWARI PRIYAMBODO', 4, 2, '17538', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17539, 'NAFA NUR AINI', 4, 2, '17539', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17540, 'NATASYA BUNGA KARTIKA', 4, 2, '17540', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17541, 'NATHANIA POPPY DZAKIYAH', 4, 2, '17541', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17542, 'NINA LARASATI', 4, 2, '17542', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17543, 'NOVITA ARIFAH', 4, 2, '17543', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17544, 'NUR SANI', 4, 2, '17544', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17545, 'NURUL AZIZAH', 4, 2, '17545', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17546, 'PUPUT WULANDARI', 4, 2, '17546', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17547, 'PUSPA AGHE SACHIO CALLISTA', 4, 2, '17547', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17548, 'RARA DIARA', 4, 2, '17548', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17549, 'SANIA DWI SAPUTRI', 4, 2, '17549', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17551, 'ZAHRA KUSUMA MEGA', 4, 2, '17551', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17552, 'AIDA NAJWA AMALIA', 5, 2, '17552', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17553, 'ANINDITA AZ ZAHRA', 5, 2, '17553', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17554, 'ANTONI PRATAMA', 5, 1, '17554', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17555, 'ASIHATUR RAHMAH', 5, 2, '17555', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17556, 'AUFA RANA JAUZA', 5, 2, '17556', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17557, 'AULIA RAHMA DEWI', 5, 2, '17557', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17558, 'AULIA RAHMASARI', 5, 2, '17558', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17559, 'BILQIS SAZKIYA AZIZAH', 5, 2, '17559', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17560, 'BUNGA KARTINI', 5, 2, '17560', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17561, 'DESI ARUM MAWARNI', 5, 2, '17561', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17562, 'DEVINA ARDELIA', 5, 2, '17562', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17563, 'FAIZA RAHMA MAHIRA', 5, 2, '17563', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17564, 'FARHATA ADZKIA', 5, 2, '17564', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17565, 'I\'ANATUNNISA', 5, 2, '17565', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17566, 'IDA LAILATUL FADHILAH', 5, 2, '17566', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17567, 'JEANICE REVALINA RAHMAYANI', 5, 2, '17567', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17568, 'KEVIN TIMOTHY', 5, 1, '17568', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17569, 'KHOLIFATUS SAKDIAH FITRIANI', 5, 2, '17569', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17570, 'KINANTI SEKAR PUTRI', 5, 2, '17570', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17571, 'LINTANG ARUM MELATI', 5, 2, '17571', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17572, 'MAYA NUR AISYAH', 5, 2, '17572', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17573, 'MILTA DWI ALFATIKA', 5, 2, '17573', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17574, 'NABILA PRAWITA SIWI', 5, 2, '17574', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17575, 'NAJWA AULIA SARI', 5, 2, '17575', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17576, 'NOVIANA LARASATI', 5, 2, '17576', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17577, 'NURUL SAFA AZZAHRA', 5, 2, '17577', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17578, 'RAHAYU TRI UTAMI', 5, 2, '17578', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17579, 'RAHMA ATHAYA KHAIRUNNISA', 5, 2, '17579', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17580, 'REHAN IRIANTO ILAHUDE', 5, 1, '17580', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17581, 'SEKAR ARUM AYUNINGTIAS', 5, 2, '17581', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17582, 'SEKAR KARTINA', 5, 2, '17582', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17583, 'SETIA MEILINDA SAPUTRI', 5, 2, '17583', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17584, 'ULFAYATUN NUR CHASANAH', 5, 2, '17584', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17585, 'VANESA FLORENSIA', 5, 2, '17585', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17586, 'WILDAN GALIH SYAHPUTRA', 5, 1, '17586', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17587, 'WINDRIA PUTRI AYU ANJANI', 5, 2, '17587', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17588, 'ADITYA IRFAN PRATAMA', 6, 1, '17588', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17589, 'AFIFAH NUR MAULIDYA', 6, 2, '17589', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17590, 'AHMAD DWI FEBRIYANTO', 6, 1, '17590', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17591, 'AMANIAH LABIBAH', 6, 2, '17591', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17592, 'ANGELIA BUNGA FEBRIANTY', 6, 2, '17592', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17593, 'ARINA ALIFATUL ULA', 6, 2, '17593', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17594, 'ARUM MAISYA AGUSTIN', 6, 2, '17594', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17595, 'AULIA NEISHYA AZ ZAHRA', 6, 2, '17595', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17596, 'AURA FAATIN AINNAYA', 6, 2, '17596', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17598, 'BUNGA ADDIA ADHA', 6, 2, '17598', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17599, 'CAHYA RAMADHANI', 6, 2, '17599', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17600, 'CANNAVO KHANZA MASIA YUNA', 6, 2, '17600', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17601, 'FITARIA ADINDA RAHMA', 6, 2, '17601', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17602, 'GHAYZA ARDINA RADISTY', 6, 2, '17602', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17603, 'INDHRI JULIA ANGGITA NURLAILA', 6, 2, '17603', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17604, 'KEYSHA AGENG TIARA', 6, 2, '17604', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17605, 'KEYZA IMTIYAS', 6, 2, '17605', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17606, 'KHAAFKA TSANIA PUTRI', 6, 2, '17606', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17607, 'KHUSNUL KHOTIMAH', 6, 2, '17607', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17608, 'MEIFTA NAZWA', 6, 2, '17608', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17609, 'MUCHAMMAD ARDIANSYAH', 6, 1, '17609', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17610, 'NADIYA ULYA', 6, 2, '17610', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17611, 'NAFA FAJAR SULISTYAWATI', 6, 2, '17611', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17612, 'NAJLA TSURAYYA AL SHEMA', 6, 2, '17612', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17613, 'NAOVAL BAYU PRATAMA', 6, 1, '17613', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17614, 'OLIVIA EKA RAHMADANI', 6, 2, '17614', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17615, 'REYNZA CHAIRANI GUNAWAN', 6, 2, '17615', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17616, 'RIRIN DWI ARIYANI', 6, 2, '17616', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17617, 'RIRIZ KHAIRUN NISA OKTAVINA', 6, 2, '17617', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17618, 'RIZKI SUARASWATI', 6, 2, '17618', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17619, 'SAFIKA IRAWATI', 6, 2, '17619', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17620, 'SEPTI SAUMI SOLIKAH', 6, 2, '17620', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17621, 'SERLY RIYANA', 6, 2, '17621', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17622, 'SINDY AINNUR', 6, 2, '17622', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17623, 'TIARA LINDA VERDINA', 6, 2, '17623', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17624, 'ADHITYA SETYAWARDHANA', 7, 1, '17624', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17625, 'APRILIA DWI PUJI ASTUTI', 7, 2, '17625', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17626, 'ARDIAN TEGAR PRABOWO', 7, 1, '17626', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17627, 'ARSIANTIKA DECHA AMANDA', 7, 2, '17627', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17628, 'BIMA KHAFIDZ ASADULLOH', 7, 1, '17628', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17629, 'CARISSA SHERYL RAMADHANI', 7, 2, '17629', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17630, 'CHARINA AULIA NUGROHO', 7, 2, '17630', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17631, 'DESKA RISKT RITANTI', 7, 2, '17631', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17632, 'DIAN WULAN SARI', 7, 2, '17632', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17633, 'FEBRYAN MAULANA YUSUF', 7, 1, '17633', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17634, 'FIONA NADIA ANJANI', 7, 2, '17634', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17635, 'FITRI NURIL INAYAH', 7, 2, '17635', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17636, 'HAKIM ARIF RAHMAN', 7, 1, '17636', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17637, 'IBNU SABIL FADMIYANSAH', 7, 1, '17637', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17638, 'INDRA TRADA WAHYUNINGTYAS', 7, 2, '17638', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17639, 'LEONA WULAN KHALLIZA', 7, 2, '17639', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17640, 'MELVY ZAHRA SYAHRANI', 7, 2, '17640', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17641, 'MORENO ADI PRAKOSA', 7, 1, '17641', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17642, 'MUHAMAD RIDHO ADDIANSYAH', 7, 1, '17642', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17643, 'NABILA AULIA DEWI', 7, 2, '17643', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17644, 'NADIA NOVITASARI', 7, 2, '17644', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17645, 'NAIRLA ETHA KHANSA', 7, 2, '17645', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17646, 'NAJWA NIKMATUL KHASANAH', 7, 2, '17646', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17647, 'NAYSILA ISMI HAWARI', 7, 2, '17647', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17648, 'NERISA AYU RAMADANI', 7, 2, '17648', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17649, 'NOVIA ARDIYANI', 7, 2, '17649', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17650, 'RAHESYA MALIK GIBRALTAR NUGRAH', 7, 1, '17650', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17651, 'REFIANA WAHYU RAMANDANI', 7, 2, '17651', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17652, 'RENALITA MEISYA PUTRI', 7, 2, '17652', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17653, 'RISKA DIAH YULIA SARI', 7, 2, '17653', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17654, 'SALSA BILLA RAMADHANI', 7, 2, '17654', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17655, 'TITA RIZKY YULIANA', 7, 2, '17655', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17656, 'USWATUN KHASANAH', 7, 2, '17656', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17657, 'WARA HARJANTI KUSUMANINGTYAS', 7, 2, '17657', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17658, 'YOSSA KURNIAWAN ABADI', 7, 1, '17658', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17659, 'ZULVA ADININGTYAS', 7, 2, '17659', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17660, 'ANGGUN QINAYAH SAPUTRI', 8, 2, '17660', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17661, 'AFROK ROBIKHATUSSIFA', 8, 2, '17661', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17662, 'ALLYA NUR AINI', 8, 2, '17662', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17663, 'ALMIRA NOOR OCTAVIA', 8, 2, '17663', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17664, 'ARINA DINA KAMILA', 8, 2, '17664', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17665, 'AZZURA ANINDYA FRISKA', 8, 2, '17665', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17666, 'CHEVANYA JAUZA RAMADHANI', 8, 2, '17666', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17667, 'DESWITA KIKAN PRAMESTY', 8, 2, '17667', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17668, 'DIAJENG SYIFA AYUNINGTYAS', 8, 2, '17668', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17669, 'DIMAS TAUFIQURROHMAN NASUKHA', 8, 1, '17669', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17670, 'DINDA ASTI NINGRUM', 8, 2, '17670', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17671, 'ELYA RATNA PALUPI', 8, 2, '17671', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17672, 'ERLINTANG ALIEF VIAR', 8, 1, '17672', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17673, 'FADILA JHENY AMANDHA', 8, 2, '17673', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17674, 'KAFANA DWI SASMITA', 8, 2, '17674', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17675, 'LADYA CHERYL AULIA', 8, 2, '17675', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17676, 'LINDA AL KHUSNA', 8, 2, '17676', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17677, 'NABILA RAJWA AZZAHRA', 8, 2, '17677', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17678, 'NASYA PUTRI ANAYA', 8, 2, '17678', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17679, 'NATASYA DIAN SALMA', 8, 2, '17679', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17680, 'NAVSHILA WIDI SETYANINGRUM', 8, 2, '17680', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17681, 'NUR AINI LU\'LUATUL MUFIDAH', 8, 2, '17681', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17682, 'NUR RIMA ROSADI', 8, 2, '17682', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17683, 'RADITA AJENG MELANY', 8, 2, '17683', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17684, 'RAFIF PUTRA ARDIYANTO', 8, 1, '17684', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17685, 'RAHMAN ADI SETIAWAN', 8, 1, '17685', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17686, 'REGINA MUTIARA RAMADHANI', 8, 2, '17686', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17687, 'REINA AGISTA ENTRI DEWI', 8, 2, '17687', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17688, 'RENITA ARFIYANI', 8, 2, '17688', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17689, 'RISKA FEBIYANI', 8, 2, '17689', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17690, 'ROFIQOH ANJANI', 8, 2, '17690', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17691, 'SEKAR ATININGSIH', 8, 2, '17691', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17692, 'SEPTIANA YAMAN RAMADANI', 8, 1, '17692', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17693, 'SHINTA MAHARANI', 8, 2, '17693', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17694, 'SIFANADIN KHOIRUNNISA AZAHRA', 8, 2, '17694', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17695, 'SYAFINA MAGHFIROH', 8, 2, '17695', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17696, 'AGUNG SETYA BUDI', 9, 1, '17696', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17697, 'ALEO PUTRA HAMZAH', 9, 1, '17697', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17698, 'AMELIA ADHA KHAIRUN NISA', 9, 2, '17698', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17699, 'AYRA PUTRI AFANDI', 9, 2, '17699', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17700, 'AZ ZAHRA MAULIYA NEEDA', 9, 2, '17700', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17701, 'BERLIANA SRI KUSUMA HAPSARI', 9, 2, '17701', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17702, 'DIMAS WILDAN PUTRA ALVIAN', 9, 1, '17702', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17703, 'FARAH FAUZIYYAH HUSNA', 9, 2, '17703', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17704, 'GALAS NARAYANKALIH HANDOKO', 9, 1, '17704', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17705, 'GRESIA MAHARANI', 9, 2, '17705', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17706, 'HAFIZ RAYAN KURNIAWAN', 9, 1, '17706', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17707, 'HESTINING TYAS', 9, 2, '17707', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17708, 'HIBBAN SATRIO GUNARDO', 9, 1, '17708', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17709, 'HUNA NAFISA PUTRI', 9, 2, '17709', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17710, 'IKLIMA RAMADHANI', 9, 2, '17710', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17711, 'IVANA VANESSA MAHARANI', 9, 2, '17711', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17712, 'MUHAMAD ATHAR GHAISAN MADANI', 9, 1, '17712', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17713, 'MUHAMMAD SUB\'HI PANGESTU', 9, 1, '17713', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17714, 'NAJWA CHURIL AINI', 9, 2, '17714', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17715, 'NAMIRA LAYLA KHALIF', 9, 2, '17715', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17716, 'NATANAEL ALFADITA SETYA JATI S', 9, 1, '17716', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17717, 'NATHAN YOGA BAGASKARA', 9, 1, '17717', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17718, 'NAUFAL PINANDHITA ARDITAMA PUT', 9, 1, '17718', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17719, 'NAURA ULFA AGUSTIN', 9, 2, '17719', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17720, 'NAYA GIGA RADITYA', 9, 1, '17720', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17721, 'NOVIA CITRA NURANDARI', 9, 2, '17721', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17722, 'RAFAEL KEVIN PRATAMA SAKTI', 9, 1, '17722', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17723, 'RAVA PRAYOGA AL - GHIFARI', 9, 1, '17723', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17724, 'RIVA MUKTI FATIHAH', 9, 1, '17724', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17725, 'RIZKY YOVI ATTALLA', 9, 1, '17725', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17726, 'SABRINA AUFA SARWAHITA', 9, 2, '17726', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17727, 'SALSABILA MUTIARA CHAIRUNISA', 9, 2, '17727', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17728, 'SILVIA FAJRI', 9, 2, '17728', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17729, 'TIARA AYU TRI HAPSARI', 9, 2, '17729', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17730, 'ZANETA NASYWA PUTRI', 9, 2, '17730', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17731, 'AISHA AMELIA SAKHIY', 10, 2, '17731', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17732, 'ANINDYA PUTRI', 10, 2, '17732', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17733, 'APRILIA NUR AINY', 10, 2, '17733', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17734, 'ARNETA PUTRI HAMID', 10, 2, '17734', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17735, 'ARYA RIDHO SAPUTRA', 10, 1, '17735', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17736, 'ARYA SHAFA AKBAR', 10, 1, '17736', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17737, 'BEKTI RAHAYU', 10, 2, '17737', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17738, 'DAFFA SETYA HANDIKA', 10, 1, '17738', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17739, 'DEBYSA NURUL USTAROH', 10, 2, '17739', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png');
INSERT INTO `tb_siswa` (`nis`, `nama`, `id_kelas`, `jk`, `user`, `pass`, `foto`) VALUES
(17740, 'DIKA NURHIDAYAH', 10, 2, '17740', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17741, 'ERSAF SYIRAZI ARIFIN', 10, 1, '17741', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17742, 'FADLAN KAUTSAR ALBUKHARI', 10, 1, '17742', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17743, 'FATIKA NUR FAHRANI', 10, 2, '17743', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17744, 'FIKO ANGGARA PUTRA', 10, 1, '17744', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17745, 'HAFIZHA RAISYA KAMILA', 10, 2, '17745', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17746, 'KHARISMA INKA PUTRI', 10, 2, '17746', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17747, 'KIDUNG MABUMI PURWANING DUMADI', 10, 1, '17747', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17748, 'LAILY ARIEKA NURASYIFA', 10, 2, '17748', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17749, 'LILIS GAYUH SAPUTRI', 10, 2, '17749', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17750, 'MUFLIH RAFILESEPPA', 10, 1, '17750', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17751, 'MUHAMMAD \'IZZUDDIN ZAKI', 10, 1, '17751', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17752, 'MUHAMMAD ATSAL THARIQ RAMI', 10, 1, '17752', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17753, 'MUHAMMAD UBAIDILLAH MAULANA L', 10, 1, '17753', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17754, 'NABILA CAHYA NUGROHO', 10, 2, '17754', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17755, 'NABILA SAFINATUNNAJAH', 10, 2, '17755', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17756, 'NADHIF AMYRTA FAHMA', 10, 2, '17756', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17757, 'NAILA SETYANINGTYAS', 10, 2, '17757', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17758, 'NEYSA VASHTI RAMADANI', 10, 2, '17758', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17759, 'NINA EVELYN', 10, 2, '17759', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17760, 'PRANANDA ARKAN RAMADHAN', 10, 1, '17760', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17761, 'RAHMAT ADITYA LUTFI', 10, 1, '17761', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17762, 'RINA AULIA HUSNA', 10, 2, '17762', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17763, 'THOMAS ADHI PAMUNGKAS', 10, 1, '17763', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17764, 'TSANIA HASNA HANIFA', 10, 2, '17764', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17765, 'UBAIDILLAH ATA AUFA', 10, 1, '17765', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17766, 'AHMAD TAHER AL-ABIYYU', 11, 1, '17766', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17767, 'AMANDA YUFITA AGUSTINA', 11, 2, '17767', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17768, 'ANANDA NURUL AISYA', 11, 2, '17768', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17769, 'ARIQ RIFQI KURNIAWAN', 11, 1, '17769', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17770, 'AZAREL PRAYNANDO IMMANUEL', 11, 1, '17770', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17771, 'CHOLIDUN NIAM', 11, 1, '17771', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17772, 'CHOLISATUL ASTURIYAH', 11, 2, '17772', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17773, 'FINOLA RAYSHA CAMILLA', 11, 2, '17773', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17774, 'FIRYAAL NABIILAH SAKIINAH', 11, 2, '17774', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17775, 'FITRIA AGUSTINA', 11, 2, '17775', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17776, 'FITRIYA FRISKA AMALIYA', 11, 2, '17776', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17777, 'GABRIEL AGASTYA GANESHA NAREND', 11, 1, '17777', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17778, 'INTAN KUSUMAWATI', 11, 2, '17778', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17779, 'JIHAN KUSUMA DEWI', 11, 2, '17779', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17780, 'KEYZAHRA AULIA RAMADHANI', 11, 2, '17780', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17781, 'KHANSA MAURA FEBI', 11, 2, '17781', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17782, 'KHOSYI SUFI', 11, 2, '17782', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17783, 'LALA JENI RAFIKA', 11, 2, '17783', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17784, 'MOSES YUDA CHRISTIANO', 11, 1, '17784', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17785, 'MUHAMMAD FAUZAN FEBRIAN WIBOWO', 11, 1, '17785', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17786, 'MUHAMMAD IBRAHIMOVIC', 11, 1, '17786', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17787, 'MUHAMMAD KHOIRUL ANAM', 11, 1, '17787', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17788, 'MUHAMMAD RIDHO ARYA SATYA', 11, 1, '17788', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17789, 'NADIA FIDA AFITA SARI', 11, 2, '17789', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17790, 'NANDA ARIYANI DEVI', 11, 2, '17790', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17791, 'NISRINA ALMA LAURA', 11, 2, '17791', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17792, 'NOVA WIDYA MILASARI', 11, 2, '17792', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17793, 'PANDU WIBOWO', 11, 1, '17793', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17794, 'RAKHA ALVANDY MURGIARTONO', 11, 1, '17794', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17795, 'RARA ARKA NALA', 11, 2, '17795', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17796, 'RASTI AULIA RAMADANI', 11, 2, '17796', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17797, 'RIO NUGROHO', 11, 1, '17797', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17798, 'RIZKY KENZO SYAHDAYANA', 11, 1, '17798', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17799, 'SAKTI SELGINOV', 11, 1, '17799', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17800, 'SALSABILA MUYASAROH', 11, 2, '17800', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(17801, 'SELVI NOVELIA WULANDARI', 11, 2, '17801', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1732584748-images.png'),
(123689, 'siswa', 1, 1, 'siswa', '$2y$10$MnpH2UsRNknDFDDW/rHmM.Kqk/qk5pLnOJm/6DaMf67AgNElxdQnK', '1736789049-67854c39efd42-Hexagon Packaging Open.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `user` varchar(502) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `lvl` enum('admin','petugas','wakasek','walikelas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `user`, `pass`, `lvl`) VALUES
(1, 'Admin', '$2y$10$SSS7R54linkNLLjwHD.Uc.hifWNWzZUrwgcpM3yQjiPG3CSuQLZ8O', 'admin'),
(3, 'Petugas', '$2y$10$xIETuQdEN92f5F5D.nEsleNqXZFxxQlUlzDLDyOydTM4wErEfoGMq', 'petugas'),
(14, 'Pak Wildan', '$2y$10$PoNw1JHrIi0XRgYSsShdTOr.RrmdcpKFtVi9Krpq5T5Nmi2wzWNTy', 'walikelas'),
(125, 'Babe Agus', '$2y$10$jtrAIA73dmEZKf2n7.lWG.plJGNGKgYbXsS4aym5JFqwn5o8JKPF6', 'wakasek'),
(126, 'Bu Akrim', '$2y$10$G7s17v38vzljfnTyWkKQqenD8HEGAN4XXKAhhyvlxeBrY/3Mt4HLm', 'walikelas'),
(127, 'siswaAdmin', '$2y$10$pgU9iaxFidTpn0tfpiRaGOX.yn2WfSTMP1HRktCPDPLRGIw8DL8yG', 'admin'),
(128, 'Bu Yuana', '$2y$10$Xt0ltAP9u8MpyyK.E9yvluRxB1YOp6sYGbzcnhf7DuE9GskO9ohvC', 'wakasek'),
(129, 'Pak Ahmad', '$2y$10$SW6LuiDy4Njw48PJDQPXb.KbYOxJttGyTQ2UIUzqjR6atjivDEupK', 'wakasek'),
(130, 'Pak Antuk', '$2y$10$H74mJc/HX7uOVoQ00ajeae3ztC5IljROMAc6migpIKtmnzggr.rIe', 'wakasek'),
(131, 'IRFAN BESAR', '$2y$10$9gEYQHkGd2XV.piu8BN/keeA9Z8AZm.Hhqj6VongCC2z7QlR05Z5y', 'walikelas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_wakasek`
--

CREATE TABLE `tb_wakasek` (
  `id_wks` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `bidang` enum('1','2','3','4') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_wakasek`
--

INSERT INTO `tb_wakasek` (`id_wks`, `id_user`, `bidang`) VALUES
(3, 125, '2'),
(6, 128, '1'),
(7, 129, '3'),
(8, 130, '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_walikelas`
--

CREATE TABLE `tb_walikelas` (
  `id_wali` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_walikelas`
--

INSERT INTO `tb_walikelas` (`id_wali`, `id_user`, `id_kelas`) VALUES
(1, 14, 20),
(4, 126, 9),
(6, 131, 31);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `tb_admin_ibfk_1` (`id_user`);

--
-- Indeks untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD PRIMARY KEY (`id_bayar`),
  ADD KEY `nis` (`nis`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD UNIQUE KEY `nis_2` (`nis`,`id_mapel`),
  ADD KEY `nis` (`nis`,`id_mapel`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `tb_petugas_ibfk_1` (`id_user`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD UNIQUE KEY `user` (`user`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tb_wakasek`
--
ALTER TABLE `tb_wakasek`
  ADD PRIMARY KEY (`id_wks`),
  ADD KEY `tb_wks_ibfk_1` (`id_user`);

--
-- Indeks untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD PRIMARY KEY (`id_wali`),
  ADD KEY `tb_wali_ibfk_1` (`id_user`),
  ADD KEY `tb_wali_ibfk_2` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `tb_mapel`
--
ALTER TABLE `tb_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT untuk tabel `tb_wakasek`
--
ALTER TABLE `tb_wakasek`
  MODIFY `id_wks` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  MODIFY `id_wali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_bayar`
--
ALTER TABLE `tb_bayar`
  ADD CONSTRAINT `tb_bayar_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_bayar_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_2` FOREIGN KEY (`id_mapel`) REFERENCES `tb_mapel` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD CONSTRAINT `tb_petugas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_wakasek`
--
ALTER TABLE `tb_wakasek`
  ADD CONSTRAINT `tb_wakasek_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_walikelas`
--
ALTER TABLE `tb_walikelas`
  ADD CONSTRAINT `tb_walikelas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_walikelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
