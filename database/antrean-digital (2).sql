-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jun 2022 pada 16.55
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antrean-digital`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(128) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `password` varchar(40) NOT NULL,
  `is_active` int(4) NOT NULL,
  `image` varchar(255) NOT NULL,
  `tgl_input` datetime NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `nip`, `password`, `is_active`, `image`, `tgl_input`, `alamat`) VALUES
(1, 'indra', '01234', '$2y$10$VA2Ze2eC9qq1USaSQVQSh.0Ev1iX4aY/.', 1, 'default.jpg', '2022-05-29 10:22:06', ''),
(2, 'INDRA ARDIANSYAH', '11111', '$2y$10$B5UnnrFPjwy1GKJ1zxIOPeRRye6/Ffhds', 1, 'default.jpg', '2022-05-29 10:05:08', ''),
(3, 'namaku', '123', '123', 1, 'default.jpg', '2022-05-29 11:21:21', ''),
(4, '', '12345', '$2y$10$Dnt8zECWwlGs7ZEaxHilYedH3L5KBvZav', 1, 'default.jpg', '0000-00-00 00:00:00', ''),
(5, 'indra ardiansyah', '1234567890', '1234567890', 1, 'default.jpg', '2022-05-29 11:56:32', ''),
(6, 'indra ardiansyah', '13245', '13245', 1, 'default.jpg', '2022-05-29 12:05:19', ''),
(7, '', '19200437', '$2y$10$EUeY0TUXCJOxkl8ueVGwsexM9t1Z1fBn/', 1, 'default.jpg', '0000-00-00 00:00:00', ''),
(8, 'namaku', '121212', '121212', 1, 'default.jpg', '2022-05-29 12:24:48', ''),
(9, 'indra ardiansyah', '1223', '1223', 1, 'default.jpg', '2022-05-30 16:15:16', ''),
(10, 'iindra', '2000', '2000', 1, 'default.jpg', '2022-05-30 16:19:12', ''),
(11, 'iiindra', '2001', '2001', 1, 'default.jpg', '2022-05-30 16:22:56', ''),
(12, 'indra ardiansyah', '2003', '2003', 1, 'default.jpg', '2022-05-30 16:44:31', ''),
(13, 'indraindra', '2005', '2005', 1, 'default.jpg', '2022-05-31 17:59:45', ''),
(14, 'iinnddrraa', '2006', '2006', 1, 'default.jpg', '2022-05-31 18:04:09', ''),
(15, 'indra ardiansyah', '2004', '2004', 1, 'default.jpg', '2022-05-31 18:16:09', ''),
(16, 'indra ardiansyah', '2007', '2007', 1, 'default.jpg', '2022-05-31 18:17:46', ''),
(17, 'indra', '2009', '2009', 1, 'default.jpg', '2022-05-31 19:03:10', ''),
(18, 'indra', '2010', '2010', 1, 'default.jpg', '2022-05-31 19:06:36', ''),
(19, 'indra', '2011', '2011', 1, 'default.jpg', '2022-05-31 19:18:26', ''),
(20, 'indra', '2008', '2008', 1, 'default.jpg', '2022-05-31 19:35:55', ''),
(21, 'indra', '2012', '2012', 1, 'default.jpg', '2022-05-31 20:01:54', ''),
(22, 'indra', '2013', '2013', 1, 'default.jpg', '2022-06-01 05:11:46', ''),
(23, 'indra', '2002', '2002', 1, 'default.jpg', '2022-06-01 05:15:19', ''),
(24, 'indra', '2014', '2014', 1, 'default.jpg', '2022-06-01 05:24:06', ''),
(25, 'indra', '2015', '$2y$10$DGJxtE.yflHWjzR0W6IBSOCQMbc7UQret', 1, 'default.jpg', '2022-06-01 05:27:36', ''),
(26, 'indra ardiansyah', '2016', '$2y$10$9iBSAhRoflPUiDTyHynkXONdvBc7/3gSJ', 1, 'default.jpg', '2022-06-01 06:38:54', ''),
(27, 'indra ardiansyah', '2017', '$2y$10$H53s9aeXb1PFdi2Kv1w7k.H3MG38cA3XI', 1, 'default.jpg', '2022-06-01 06:52:44', ''),
(28, 'indra ardiansyah', '2022', '$2y$10$kC8BorNOKHahvpRaPkIxeOAYQDvZoYJRJ', 1, 'default.jpg', '2022-06-01 10:27:21', ''),
(29, 'indra ardiansyah', '2020', '$2y$10$JGUK54Z0mzLe5GTMLhNpZ.dWLHvJlJJJv', 1, 'default.jpg', '2022-06-01 10:54:32', ''),
(30, 'indra ardiansyah', '2222', '$2y$10$t7XlGinYRR5A5L8S.8kksukq3/VmsfwHd', 1, 'default.jpg', '2022-06-01 11:52:03', ''),
(31, 'indra ardiansyah', '3333', '3333', 1, 'default.jpg', '2022-06-01 11:56:54', ''),
(32, 'lismaya', '5555', '5555', 1, 'default.jpg', '2022-06-01 14:46:50', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(4) NOT NULL,
  `tgl_antrian` date NOT NULL,
  `poli` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `tgl_antrian`, `poli`) VALUES
(16, '2022-05-27', '4'),
(17, '2022-05-27', '1'),
(18, '2022-05-27', 'Poli Anak'),
(19, '2022-05-27', 'Poli Umum'),
(20, '2022-05-27', 'Poli Kesehatan Ibu dan Anak'),
(21, '2022-05-27', 'Poli Gigi'),
(22, '2022-05-28', 'Poli Gigi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `antrian_poli`
--

CREATE TABLE `antrian_poli` (
  `id_antrian_poli` int(4) NOT NULL,
  `id_antrian` int(4) NOT NULL,
  `id_pasien` int(4) NOT NULL,
  `poli` varchar(256) NOT NULL,
  `no_antrian_poli` varchar(10) NOT NULL,
  `tgl_antrian` date NOT NULL,
  `nama` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `umur` varchar(11) NOT NULL,
  `no_telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_poli`
--

CREATE TABLE `kategori_poli` (
  `id_poli` varchar(4) NOT NULL,
  `nama_poli` varchar(100) NOT NULL,
  `jumlah_maksimal` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_poli`
--

INSERT INTO `kategori_poli` (`id_poli`, `nama_poli`, `jumlah_maksimal`) VALUES
('PA', 'Poli Anak', '10'),
('PG', 'Poli Gigi', '10'),
('PKIA', 'Poli Kesehatan Ibu dan Anak', '10'),
('PU', 'Poli Umum', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `umur` varchar(20) NOT NULL,
  `no_telp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nik`, `nama`, `alamat`, `umur`, `no_telp`) VALUES
(1, '12345', 'indra', 'namaku', '21', '1234567890'),
(2, '3175066611080001', 'indra ardiansyah', 'magetan', '21', '1234567890'),
(3, '3327094409020007', 'INDRA ARDIANSYAH', 'magetan', '21', '1234567890'),
(4, '3175066611080001', 'indra', 'magetan', '11', '1234567890'),
(5, '3175066611080001', 'INDRA ARDIANSYAH', 'magetan', '21', '1234567890'),
(6, '3175066611080001', 'indra ardiansyah', 'magetan', '21', '1234567890'),
(7, '12345', 'indra', 'namaku', '12', '1234567890'),
(8, '12345', 'indra', 'magetan', '12', '1111'),
(9, '3175066611080001', 'indra ardiansyah', 'magetan', 'aa', '1234567890'),
(10, '3327094409020007', 'indra ardiansyah', 'magetan', '21', '1234567890'),
(11, '3327094409020007', 'namaku', 'namaku', '21', '1111'),
(12, '3175066611080001', 'indra ardiansyah', 'magetan', '21', '1234567890'),
(13, '3175066611080001', 'INDRA ARDIANSYAH', 'magetan', '21', '1234567890'),
(14, '12345', 'aaaaaaa', 'aaaa', '11', '1111'),
(15, '12345', 'aaaaaaa', 'aaaa', '11', '1111'),
(16, '2001', 'INDRA ARDIANSYAH', 'magetan', '21', '1234567890'),
(17, '2002', 'INDRA ARDIANSYAH', 'magetan', '21', '1234567890'),
(18, '2002', 'INDRA ARDIANSYAH', 'magetan', '21', '1234567890'),
(19, '2002', 'INDRA ARDIANSYAH', 'magetan', '21', '1234567890'),
(20, '2002', 'INDRA ARDIANSYAH', 'magetan', '21', '1234567890'),
(21, '2002', 'INDRA ARDIANSYAH', 'namaku', '21', '1234567890'),
(22, '3175066611080001', 'indra ardiansyah', 'magetan', '21', '1234567890');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indeks untuk tabel `antrian_poli`
--
ALTER TABLE `antrian_poli`
  ADD PRIMARY KEY (`id_antrian_poli`);

--
-- Indeks untuk tabel `kategori_poli`
--
ALTER TABLE `kategori_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `antrian_poli`
--
ALTER TABLE `antrian_poli`
  MODIFY `id_antrian_poli` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
