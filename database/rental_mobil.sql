-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Nov 2020 pada 05.53
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(144) NOT NULL,
  `password` varchar(144) NOT NULL,
  `nama_admin` varchar(144) NOT NULL,
  `email` varchar(144) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `email`, `no_hp`, `alamat`) VALUES
(1, 'admin123', '12345', 'Admin Nando', 'admin@gmail.com', '2147483647', 'Seleman, Yogyakarta');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `nama_mobil` varchar(144) NOT NULL,
  `jenis_mobil` enum('SEDAN','MINIBUS','CABIN','SUV') NOT NULL,
  `harga_sewa` double NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(144) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `nama_mobil`, `jenis_mobil`, `harga_sewa`, `deskripsi`, `gambar`, `status`) VALUES
(1, 'KIJANG INOVA', 'SEDAN', 750000, 'Mobil Keluarga yang nyaman untuk jalan-jalan ramai', '77f57d84-477b-4d53-b7c8-ef7889adf15a.jpeg', 0),
(2, 'AVANZA', 'SUV', 500000, 'Mobil Keluarga yang nyaman untuk jalan-jalan', 'avanza.jpg', 0),
(3, 'PANTHER', 'CABIN', 500000, 'Mobil turing untuk melakukan kegiatan di alam liar', 'isuzu-panther-2002.jpeg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_detail_sewa` int(11) NOT NULL,
  `nama_sewa` varchar(144) NOT NULL,
  `bukti_ktp` varchar(144) NOT NULL,
  `bukti_bayar` varchar(144) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `status` enum('KONFIRMASI','BELUM KONFIRMASI') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_detail_sewa`, `nama_sewa`, `bukti_ktp`, `bukti_bayar`, `tanggal_bayar`, `status`) VALUES
(1, 3, 'Arya Surya Pratama', 'bjgn.png', 'Ea3gmNDUwAE0QjK.jpg', '2020-11-25', 'KONFIRMASI'),
(2, 7, 'Arya Surya Pratama', 'EdCAb4TXoAE_ur7.jpg', 'bjgn.png', '2020-11-25', 'KONFIRMASI'),
(3, 10, 'Arya Surya Pratama', 'EdCAb4TXoAE_ur7.jpg', 'Ea3gmNDUwAE0QjK.jpg', '2020-11-26', 'BELUM KONFIRMASI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_sewa`
--

CREATE TABLE `tb_detail_sewa` (
  `id_detail_sewa` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `waktu_sewa` date NOT NULL,
  `waktu_penggunaan` date NOT NULL,
  `banyak_hari` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_sewa`
--

INSERT INTO `tb_detail_sewa` (`id_detail_sewa`, `id_sewa`, `waktu_sewa`, `waktu_penggunaan`, `banyak_hari`, `total_harga`) VALUES
(3, 3, '2020-11-25', '2020-11-26', 2, 1000000),
(9, 8, '2020-11-26', '0000-00-00', 3, 2250000),
(10, 10, '2020-11-26', '2020-11-27', 2, 1500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id_sewa` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sewa`
--

INSERT INTO `tb_sewa` (`id_sewa`, `id_mobil`, `id_user`) VALUES
(3, 3, 1),
(8, 1, 1),
(9, 1, 1),
(10, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(144) NOT NULL,
  `password` varchar(144) NOT NULL,
  `nama_user` varchar(144) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `email` varchar(144) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `gambar` varchar(144) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama_user`, `tanggal_lahir`, `email`, `no_hp`, `alamat`, `gambar`) VALUES
(1, 'aryasurya', '123456', 'Arya Surya Pratama', '0000-00-00', 'aryasurya@gmail.com', '62835567778912', 'Sleman, Sedangadi Yogyakarta', 'kontol.jpg'),
(2, 'aryasurya', '1111', 'Arya Surya Pratama', '0000-00-00', 'aryasurya@gmail.com', '2', 'Klaten', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_detail_sewa`
--
ALTER TABLE `tb_detail_sewa`
  ADD PRIMARY KEY (`id_detail_sewa`),
  ADD KEY `id_sewa` (`id_sewa`);

--
-- Indeks untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_sewa`
--
ALTER TABLE `tb_detail_sewa`
  MODIFY `id_detail_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_sewa`
--
ALTER TABLE `tb_detail_sewa`
  ADD CONSTRAINT `tb_detail_sewa_ibfk_1` FOREIGN KEY (`id_sewa`) REFERENCES `tb_sewa` (`id_sewa`);

--
-- Ketidakleluasaan untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD CONSTRAINT `tb_sewa_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `tb_sewa_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
