-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2023 pada 09.08
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinik`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `kode_obat` text NOT NULL,
  `nama_obat` text NOT NULL,
  `jenis_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `kode_obat`, `nama_obat`, `jenis_obat`) VALUES
(1, 'BKR201', 'Paracetamol', 'Cair'),
(2, 'BKR02', 'Bodrek', 'Kapsul');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(200) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `umur` int(4) NOT NULL,
  `tinggi_badan` int(3) NOT NULL,
  `jenis_kelamin` varchar(6) NOT NULL,
  `alamat` text NOT NULL,
  `keluhan_utama` text NOT NULL,
  `riwayat_sebelumnya` text NOT NULL,
  `riwayat_sekarang` text NOT NULL,
  `berat_badan` int(4) NOT NULL,
  `nomor_telepon` bigint(14) NOT NULL,
  `rambut_kulit_kepala` text NOT NULL,
  `mata` text NOT NULL,
  `hidung` text NOT NULL,
  `leher` text NOT NULL,
  `jantung` text NOT NULL,
  `payudara_aksila` text NOT NULL,
  `genitilia_perkemihan` text NOT NULL,
  `kaki` text NOT NULL,
  `pola_istirahat_tidur` text NOT NULL,
  `telinga` text NOT NULL,
  `mulut` text NOT NULL,
  `paru_paru` text NOT NULL,
  `abdomen` text NOT NULL,
  `tangan` text NOT NULL,
  `rektum_anus` text NOT NULL,
  `punggung` text NOT NULL,
  `pola_aktivitas_harian` text NOT NULL,
  `hasil_pemeriksaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `tanggal_lahir`, `umur`, `tinggi_badan`, `jenis_kelamin`, `alamat`, `keluhan_utama`, `riwayat_sebelumnya`, `riwayat_sekarang`, `berat_badan`, `nomor_telepon`, `rambut_kulit_kepala`, `mata`, `hidung`, `leher`, `jantung`, `payudara_aksila`, `genitilia_perkemihan`, `kaki`, `pola_istirahat_tidur`, `telinga`, `mulut`, `paru_paru`, `abdomen`, `tangan`, `rektum_anus`, `punggung`, `pola_aktivitas_harian`, `hasil_pemeriksaan`) VALUES
(6, 'Weri', '1990-11-15', 40, 150, 'Wanita', '-', 'Gatal2', '-', 'Asma', 50, 877665544, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'Demam'),
(8, 'Lukmanul Hakim', '1992-07-16', 20, 150, 'Pria', '-', '-', '-', '-', 55, 86654341414, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` text NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telepon` bigint(14) NOT NULL,
  `jabatan` text NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nomor_telepon`, `jabatan`, `password`) VALUES
(1, 'Thahirudin', '2002-02-10', 'Pria', 'J. Kulim', 887645556, 'Dokter', '$2y$10$Tc55iuFCA69jNItB0pg/Vu9LqHKD7HkNY7XWmNYK4QtOQYvD9OriC'),
(2, 'Rianto', '2001-10-10', 'Pria', 'Panam', 8227654646, 'Perawat', '$2y$10$Wj2zkP/fRJtLZdAs2jthdesffjPkJHJhHbgAOiwtKBvGZaaZsjSHe'),
(6, 'Hasnah', '1989-11-30', 'Wanita', 'Jl. dugong', 8886262622, 'Dokter', '$2y$10$NCrY0fJLhsdt9Ove3N4qquep1XrNO7lfBrrSQES0D0TR/PJTmnTgK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rawat_inap`
--

CREATE TABLE `rawat_inap` (
  `id` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `kelas` text NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rawat_inap`
--

INSERT INTO `rawat_inap` (`id`, `id_pasien`, `id_petugas`, `kelas`, `tanggal_masuk`, `tanggal_keluar`) VALUES
(7, 8, 6, '9', '2023-06-06', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rawat_jalan`
--

CREATE TABLE `rawat_jalan` (
  `id` int(11) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `id_petugas` int(11) NOT NULL,
  `keluhan_pasien` text NOT NULL,
  `id_obat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rawat_jalan`
--

INSERT INTO `rawat_jalan` (`id`, `tahun_masuk`, `id_pasien`, `id_petugas`, `keluhan_pasien`, `id_obat`) VALUES
(6, 2023, 6, 1, 'demam', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `rawat_inap`
--
ALTER TABLE `rawat_inap`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `rawat_inap`
--
ALTER TABLE `rawat_inap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rawat_jalan`
--
ALTER TABLE `rawat_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
