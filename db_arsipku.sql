-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Apr 2021 pada 05.34
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_arsipku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_arsip`
--

CREATE TABLE `tbl_arsip` (
  `id_arsip` int(11) NOT NULL,
  `no_arsip` varchar(11) DEFAULT NULL,
  `nama_arsip` varchar(225) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `deskrepsi` varchar(225) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL,
  `file_arsip` varchar(225) DEFAULT NULL,
  `id_departemen` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `ukuran_file` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_arsip`
--

INSERT INTO `tbl_arsip` (`id_arsip`, `no_arsip`, `nama_arsip`, `id_kategori`, `deskrepsi`, `tgl_upload`, `tgl_update`, `file_arsip`, `id_departemen`, `id_user`, `ukuran_file`) VALUES
(6, '2021040249C', 'Arip Desa Sengon', 4, 'Arsip Satu', '2021-04-02', '2021-04-02', '1617421452_e9bdd877e0715f36da1a.pdf', 1, 8, 687),
(7, '20210402168', 'Arsip Rt 01', 4, 'Rt 01', '2021-04-02', '2021-04-02', '1617421479_67400d4be23f644a90f8.pdf', 1, 8, 687),
(8, '2021040242c', 'Anggaran Pemuda', 3, 'pemuda', '2021-04-02', '2021-04-02', '1617421589_4eec175456f14062f4b0.pdf', 1, 1, 536);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_departemen`
--

CREATE TABLE `tbl_departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_departemen`
--

INSERT INTO `tbl_departemen` (`id_departemen`, `nama_departemen`) VALUES
(1, 'Keuangan'),
(2, 'Sosiall'),
(3, 'Olahraga'),
(4, 'Tata Ruang'),
(5, 'Budaya'),
(6, 'Agama'),
(8, 'Pemasaran'),
(9, 'Kemasyarakatan'),
(10, 'Kesehatan'),
(11, 'Penerangan'),
(12, 'Pemuda');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Surat Terbuka'),
(2, 'Surat Pindahan'),
(3, 'Surat Nikah'),
(4, 'Surat Rujukan '),
(5, 'Berhasil Di eDIT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(225) DEFAULT NULL,
  `email` varchar(225) DEFAULT NULL,
  `password` varchar(225) DEFAULT NULL,
  `level` int(2) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `id_departemen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `email`, `password`, `level`, `foto`, `id_departemen`) VALUES
(1, 'Admin Ganteng', 'admin@gmail.com', '12345', 1, 'admin.jpg', 1),
(6, 'Saka Aulia', 'saka@gmail.com', '12345', 1, '1616175549_4921590a2f36d1ac088e.png', 1),
(7, 'User Coba', 'usercoba@gmail.com', '12345', 2, '1616984384_ceb0fdc9906ea77d3561.png', 2),
(8, 'user biasa', 'user@gmail.com', '12345', 2, '1617418942_cc7a36477078c226a391.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indeks untuk tabel `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_arsip`
--
ALTER TABLE `tbl_arsip`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_departemen`
--
ALTER TABLE `tbl_departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
