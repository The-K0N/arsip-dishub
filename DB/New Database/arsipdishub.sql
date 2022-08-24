-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Agu 2022 pada 04.07
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
-- Database: `arsipdishub`
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
  `status_arsip` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `arsip_dokumen`
--

INSERT INTO `arsip_dokumen` (`id_arsip_dokumen`, `kode_rak`, `kode_box`, `kode_ordner`, `kode_arsip`, `no_akun`, `bidang`, `sub_bidang`, `kegiatan`, `tahun`, `status_arsip`) VALUES
(1, '1', '1-1', '1-1-1', 'BU-Surat Perintah Dinas 2020', '1', 'Bagian Umum', 'Kepegawaian', 'Jaga Pagi', 2020, 'Tidak Ada'),
(2, '1', '1-1', '1-1-2', 'BU-Surat Perintah Dinas 2020', '1', 'Bagian Umum', 'Kepegawaian', 'SK Penunjukan Sopir Angkutan', 2020, 'Ada'),
(3, '1', '1-1', '1-1-2', 'BU-Surat Perintah Dinas 2020', '1', 'Bagian Umum', 'Kepegawaian', 'SK Penunjukan Sopir Angkutan', 2020, 'Ada');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `kode_berkas` varchar(255) NOT NULL,
  `file_berkas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `kode_berkas`, `file_berkas`) VALUES
(9, 'Angkutan', '4c0c7d6b6c4d2e57fdfabddf15db7f4f-Tarif Retribusi Pelayanan Kepelabuhan.pdf'),
(11, 'BU-Surat Perintah Dinas 2020', '3bab3e94c7b4d67fca9c6f3f2f4e290f-Tarif Retribusi Pelayanan Kepelabuhan.docx'),
(13, 'BU-Surat Perintah Dinas 2020', '0a400189bea0bd780dc259ff79372816-Tarif Retribusi Pelayanan Kepelabuhan.pdf'),
(14, 'Angkutan', '9e00eda506ffb1db42413ea225ab07f5-Tarif Retribusi Pelayanan Kepelabuhan.docx'),
(15, 'BU-Surat Perintah Dinas 2020', '014ed9ed45a6b74483c7a3e4c04b098d-Tarif Retribusi Pelayanan Kepelabuhan.docx'),
(16, 'BU-Surat Perintah Dinas 2020', '205dff78bfec01ff9071ac819a2823ac-Tarif Retribusi Pelayanan Kepelabuhan.pdf'),
(17, 'BU-Surat Perintah Dinas 2020', 'b3de346f6cc98bd95aeac4054c444f4a-Tarif Retribusi Pelayanan Kepelabuhan.pdf'),
(18, 'Angkutan', '3a3eac6c3eb5f152904798b08307e311-Tarif Retribusi Pelayanan Kepelabuhan.pdf'),
(19, 'BU-Surat Perintah Dinas 2020', '48addfeb704636972461312335131bec-TEST.xlsx');

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
(1, 'Bagian Umum', 'Kepegawaian'),
(2, 'Bagian Angkutan', 'Surat Perintah');

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
(1, 'BU-Surat Perintah Dinas 2020', 'Jaga Pagi'),
(2, 'Angkutan', 'SK Penunjukan Sopir Angkutan'),
(3, 'adfasd', 'fFD'),
(4, 'dfsa', 'sdFD'),
(5, 'ASF', 'adFAS'),
(6, 'adfasd', 'FADSDS'),
(8, 'ASFa', 'fass'),
(9, 'afda', 'dasfs'),
(10, 'adfads', 'fass'),
(11, 'fadsfasd', 'fasfs'),
(12, 'fasfas', 'fsafaf'),
(13, 'fsafs', 'safsaf'),
(14, 'fasfsaf', 'fsafsa'),
(15, 'fsafsaf', 'sfsaf');

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
(2, 'pegawai', '$2y$10$dY5O5JnwQpd2hOqZAQgff.juggRffZRGseEsLYq4EF/gd6SH95w..', 'Surya', '1901010036', 'pegawai'),
(3, 'coba', '$2y$10$w7z/iqJfgHjq755c8z3cMe0P28r67A1wF28FhL3.Z3bSevMqTM652', 'Coba', '123', 'pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `arsip_dokumen`
--
ALTER TABLE `arsip_dokumen`
  ADD PRIMARY KEY (`id_arsip_dokumen`);

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

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
  MODIFY `id_arsip_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kode_arsip`
--
ALTER TABLE `kode_arsip`
  MODIFY `id_kode_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
