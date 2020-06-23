-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Bulan Mei 2020 pada 05.52
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kelas`
--

CREATE TABLE `detail_kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(15) NOT NULL,
  `kelas` varchar(30) NOT NULL,
  `nis` varchar(30) NOT NULL,
  `ck` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_kelas`
--

INSERT INTO `detail_kelas` (`id`, `kode_kelas`, `kelas`, `nis`, `ck`) VALUES
(18, '123', 'IXB', '123', '0'),
(19, '123', 'IXB', '456', '0'),
(20, '123', 'IXB', '566', '0'),
(21, 'K-024', 'XC', '566', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pembayaran`
--

CREATE TABLE `detail_pembayaran` (
  `id` int(11) NOT NULL,
  `kode_pembayaran` varchar(50) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `bulan` int(2) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `biaya_spp` double NOT NULL DEFAULT '0',
  `status_spp` varchar(15) NOT NULL,
  `biaya_osis` double NOT NULL DEFAULT '0',
  `status_osis` varchar(15) NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pembayaran`
--

INSERT INTO `detail_pembayaran` (`id`, `kode_pembayaran`, `semester`, `bulan`, `kode_kelas`, `kelas`, `nis`, `nama`, `biaya_spp`, `status_spp`, `biaya_osis`, `status_osis`, `tanggal_jatuh_tempo`) VALUES
(1, 'P-11032020001', '2', 1, '123', 'IXB', '123', 'Eko Kurniadi', 150000, 'Belum Lunas', 30000, 'Belum Lunas', '2020-02-27'),
(2, 'P-11032020001', '2', 1, '123', 'IXB', '123', 'Risky', 150000, 'Belum Lunas', 30000, 'Belum Lunas', '2020-02-27'),
(3, 'P-11032020001', '2', 1, '123', 'IXB', '566', 'Ikang', 150000, 'Belum Lunas', 30000, 'Belum Lunas', '2020-02-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ekstrakurikuler`
--

CREATE TABLE `ekstrakurikuler` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `biaya_ekstrakurikuler` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(15) NOT NULL,
  `kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kode_kelas`, `kelas`) VALUES
(19, '123', 'IXB'),
(20, 'K-024', 'XC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komite`
--

CREATE TABLE `komite` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `biaya_komite` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komite`
--

INSERT INTO `komite` (`id`, `kode_kelas`, `kelas`, `biaya_komite`) VALUES
(7, '123', 'IXB', 150000),
(8, 'K-024', 'XC', 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `osis`
--

CREATE TABLE `osis` (
  `id` int(11) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `biaya_osis` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_spp`
--

CREATE TABLE `pembayaran_spp` (
  `id` int(11) NOT NULL,
  `kode_pembayaran` varchar(50) NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL,
  `semester` varchar(30) NOT NULL,
  `bulan` int(2) NOT NULL,
  `kode_kelas` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `status` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_spp`
--

INSERT INTO `pembayaran_spp` (`id`, `kode_pembayaran`, `tanggal_jatuh_tempo`, `semester`, `bulan`, `kode_kelas`, `kelas`, `status`) VALUES
(1, 'P-11032020001', '2020-02-27', '2', 1, '123', 'IXB', 'Belum Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_sekolah`
--

CREATE TABLE `profil_sekolah` (
  `id` int(11) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telp` varchar(200) NOT NULL,
  `nama_pimpinan` varchar(50) NOT NULL,
  `logo_kop` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil_sekolah`
--

INSERT INTO `profil_sekolah` (`id`, `nama_sekolah`, `email`, `alamat`, `nomor_telp`, `nama_pimpinan`, `logo_kop`, `active`) VALUES
(1, 'CV MULTI SARANA', 'multisarana2003@gmail.com', 'lkajsdlkajsdlkad', '0822 9796 2629', '-', 'profil1577376079.png', 'Active');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nis` varchar(50) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `no_telp_orang_tua` varchar(15) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nis`, `nama_siswa`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `nama_ayah`, `nama_ibu`, `no_telp_orang_tua`, `foto`) VALUES
(2, '123', 'Eko Kurniadi', 'Laki-laki', 'Islam', 'Jambi', '1995-02-02', '<p>Kartini</p>', 'Emi', 'Anisah', '085296072649', 'akdfj'),
(4, '456', 'Risky', 'Laki-laki', 'Islam', 'Jambi', '1995-01-04', '<p>ddsfasdf</p>', 'Joni', 'Ida', '08555555', 'aa'),
(5, '566', 'Ikang', 'Perempuan', 'Islam', 'JAMBI', '2020-03-04', '<p>dfasdfasdf</p>', 'a', 'b', '08555555', 'dfasdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun_akademik`
--

CREATE TABLE `tahun_akademik` (
  `id` int(11) NOT NULL,
  `tahun` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahun_akademik`
--

INSERT INTO `tahun_akademik` (`id`, `tahun`) VALUES
(1, '2020-2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`, `foto`) VALUES
(1, 'admin', 'admin', '12345', 'Admin', 'user1583332072.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_kelas`
--
ALTER TABLE `detail_kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komite`
--
ALTER TABLE `komite`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `osis`
--
ALTER TABLE `osis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_kelas`
--
ALTER TABLE `detail_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `detail_pembayaran`
--
ALTER TABLE `detail_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ekstrakurikuler`
--
ALTER TABLE `ekstrakurikuler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `komite`
--
ALTER TABLE `komite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `osis`
--
ALTER TABLE `osis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_spp`
--
ALTER TABLE `pembayaran_spp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `profil_sekolah`
--
ALTER TABLE `profil_sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tahun_akademik`
--
ALTER TABLE `tahun_akademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
