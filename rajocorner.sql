-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 17 Feb 2023 pada 07.13
-- Versi server: 8.0.31
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rajocorner`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lengkap` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jekel` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_hp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `jekel`, `nomor_hp`, `foto`) VALUES
('admin001', 'admin', '$2y$10$yGw7RE6UxM.TrX31vqViIO6u3SG1uz4Yz.a/9NIqIcUrJy6D6tv2e', 'admin', 'laki-laki', '09876543223', 'lightbulb-3104355_1920.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

DROP TABLE IF EXISTS `kasir`;
CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lengkap` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jekel` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_hp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_kasir`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `username`, `password`, `nama_lengkap`, `jekel`, `nomor_hp`, `foto`) VALUES
('kasir001', 'kasir', '$2y$10$uE/dC5Yp/vd0uMM6n9t76OqVyI7zPy7CTd0xpfjgx1PgrXA.3ZTrq', 'kasir', 'laki-laki', '09876543223', 'lightbulb-3104355_1920.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id_login` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `level` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_login`, `kode`, `username`, `password`, `level`) VALUES
('login0001', 'admin001', 'admin', '$2y$10$yGw7RE6UxM.TrX31vqViIO6u3SG1uz4Yz.a/9NIqIcUrJy6D6tv2e', 'admin'),
('login0002', 'kasir001', 'kasir', '$2y$10$uE/dC5Yp/vd0uMM6n9t76OqVyI7zPy7CTd0xpfjgx1PgrXA.3ZTrq', 'kasir'),
('login0003', 'pj001', 'pj_stand', '$2y$10$tudwYdIQLFpdVJwdUuzWtuuyIvTyPmmWR.RMFuBKICZxEmkitetoy', 'pj-stand'),
('login0004', 'pj002', 'pj_stand2', '$2y$10$MJATpt/6M/o4Q.qQROJpuO0MnEg9LDFZMnu/LwT4mowos70DwwYoS', 'pj-stand'),
('login0005', 'plg00001', 'pelanggan', '$2y$10$jTwAJ5N/SudW50NXemQnIek2iweJ4UjH0nDM1r5XA5/MvwehkR4sa', 'pelanggan'),
('login0006', 'pj003', 'a', '$2y$10$PTS2XhBbVxa1TmKUMsU5e.PLtQ1uD0lUb44movG.6GG1rWOcq691G', 'pj-stand');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

DROP TABLE IF EXISTS `meja`;
CREATE TABLE IF NOT EXISTS `meja` (
  `id_meja` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kode_meja` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`id_meja`, `kode_meja`) VALUES
('meja0002', '\0\002'),
('meja0003', '\0\003'),
('meja0004', '\0\004'),
('meja0005', '\0\005'),
('meja0006', '\0\006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id_menu` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_stand` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_menu` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  `tipe` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int NOT NULL,
  `foto` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `id_stand`, `nama_menu`, `deskripsi`, `tipe`, `harga`, `foto`) VALUES
('menu002', 'stand001', 'Nasi Goreng Ayam Petai', 'nasi goreng ayam petai adalah menu baru rajocorner  ', 'makanan', 20000, 'naspetai.jpg'),
('menu003', 'stand002', 'Jus alpukat', 'Jus alpukat ini merupakan menu terbaik dari rajocorner', 'minuman', 15000, 'alpukat.jpeg'),
('menu004', 'stand002', 'Jus Mangga', 'Jus mangga', 'minuman', 14000, 'jus mangga.jpg'),
('menu005', 'stand002', 'Jus Tomat', 'Jus Tomat', 'minuman', 14000, 'jus tomat.jpg'),
('menu006', 'stand002', 'Jus Wortel', 'Jus Wortel', 'minuman', 14000, 'jus wortel.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

DROP TABLE IF EXISTS `pelanggan`;
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lengkap` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jekel` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_hp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `username`, `password`, `nama_lengkap`, `jekel`, `nomor_hp`) VALUES
('plg00001', 'pelanggan', '$2y$10$jTwAJ5N/SudW50NXemQnIek2iweJ4UjH0nDM1r5XA5/MvwehkR4sa', 'pelanggan', 'laki-laki', '09876543223');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE IF NOT EXISTS `pemesanan` (
  `id_pemesanan` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_pelanggan` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_stand` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_menu` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_meja` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_pesan` int NOT NULL,
  `tanggal_pesan` date DEFAULT NULL,
  `total` int NOT NULL,
  `status_pesan` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pemesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pj_stand`
--

DROP TABLE IF EXISTS `pj_stand`;
CREATE TABLE IF NOT EXISTS `pj_stand` (
  `id_pj` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_lengkap` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jekel` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nomor_hp` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_pj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pj_stand`
--

INSERT INTO `pj_stand` (`id_pj`, `username`, `password`, `nama_lengkap`, `jekel`, `nomor_hp`, `foto`) VALUES
('pj001', 'pj_stand', '$2y$10$tudwYdIQLFpdVJwdUuzWtuuyIvTyPmmWR.RMFuBKICZxEmkitetoy', 'Pj Stand', 'laki-laki', '09876543223', 'lightbulb-3104355_1920.jpg'),
('pj002', 'pj_stand2', '$2y$10$MJATpt/6M/o4Q.qQROJpuO0MnEg9LDFZMnu/LwT4mowos70DwwYoS', 'Pj Stand 2', 'laki-laki', '09876543223', 'lightbulb-3104355_1920.jpg'),
('pj003', 'a', '$2y$10$PTS2XhBbVxa1TmKUMsU5e.PLtQ1uD0lUb44movG.6GG1rWOcq691G', 'a', 'laki-laki', '111', 'semua bisa.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stand`
--

DROP TABLE IF EXISTS `stand`;
CREATE TABLE IF NOT EXISTS `stand` (
  `id_stand` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_pj` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_stand` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `keterangan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`id_stand`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `stand`
--

INSERT INTO `stand` (`id_stand`, `id_pj`, `nama_stand`, `keterangan`) VALUES
('stand002', 'pj002', 'Minuman', 'Menyediakan beraneka ragam minuman');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
