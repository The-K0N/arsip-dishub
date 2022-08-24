-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Agu 2022 pada 10.17
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arsip`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `arsip_dokumen`
--

CREATE TABLE `arsip_dokumen` (
  `id_arsip_dokumen` int(11) NOT NULL,
  `kode_rak` varchar(30) NOT NULL,
  `kode_box` varchar(30) NOT NULL,
  `kode_ordner` varchar(30) NOT NULL,
  `kode_arsip` varchar(200) NOT NULL,
  `no_akun` varchar(30) NOT NULL,
  `bidang` varchar(250) NOT NULL,
  `sub_bidang` varchar(200) NOT NULL,
  `kegiatan` varchar(200) NOT NULL,
  `tahun` int(4) NOT NULL,
  `status_arsip` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `id_bidang` int(11) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `sub_bidang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bidang`
--

INSERT INTO `bidang` (`id_bidang`, `bidang`, `sub_bidang`) VALUES
(18, 'Bagian Umum', 'Kepegawaian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kode_arsip`
--

CREATE TABLE `kode_arsip` (
  `id_kode_arsip` int(11) NOT NULL,
  `kode_arsip` varchar(100) NOT NULL,
  `deskripsi_arsip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kode_arsip`
--

INSERT INTO `kode_arsip` (`id_kode_arsip`, `kode_arsip`, `deskripsi_arsip`) VALUES
(1, 'BU-1', 'Bagian Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(350) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `akses` enum('administrator','pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `nip`, `akses`) VALUES
(1, 'dishub', '$2y$10$gLpa2L3FmGVAeFjWs.5zhOjBkGw2SL1TdU7F.w3jWVZwd/LQ3KVHO', 'DISHUB', '', 'administrator'),
(2, 'pegawai', '$2y$10$dY5O5JnwQpd2hOqZAQgff.juggRffZRGseEsLYq4EF/gd6SH95w..', 'Surya', '1901010036', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arsip_dokumen`
--
ALTER TABLE `arsip_dokumen`
  ADD PRIMARY KEY (`id_arsip_dokumen`);

--
-- Indeks untuk tabel `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id_bidang`);

--
-- Indeks untuk tabel `kode_arsip`
--
ALTER TABLE `kode_arsip`
  ADD PRIMARY KEY (`id_kode_arsip`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `arsip_dokumen`
--
ALTER TABLE `arsip_dokumen`
  MODIFY `id_arsip_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kode_arsip`
--
ALTER TABLE `kode_arsip`
  MODIFY `id_kode_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
