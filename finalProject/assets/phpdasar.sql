-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2020 pada 14.01
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklan`
--

CREATE TABLE `iklan` (
  `id` int(11) NOT NULL,
  `noTelp` char(30) NOT NULL,
  `nama` char(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `alamat` varchar(20) NOT NULL,
  `gambar` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `iklan`
--

INSERT INTO `iklan` (`id`, `noTelp`, `nama`, `email`, `alamat`, `gambar`, `deskripsi`, `username`) VALUES
(2, '18082010035', 'klepon', 'helmy@gmail.com', 'Sistem Informasi', 'klepon.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'yudha'),
(3, '18082010039', 'lemper', 'antok@gmail.com', 'Sistem Informasi', 'lemper.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'hasan'),
(12, '18082010026', 'koci-koci', 'saladinalyubbi@gmail.com', 'Sistem Informasi', 'kocikoci.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'hasan'),
(19, '14045', 'nagasari', 'yudha.yunanto.2010@gmail.com', 'Sistem Informasi', 'nagasari.jpeg', 'ini nagasari', 'yudha'),
(23, '313131', 'a', 'g', 'g', '5ece1560531d5.jpg', '133131', 'yudha');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`) VALUES
('admin', '$2y$10$Zn0p36P29/tN0IFWraR7JeDU/pNHKV8z7iKGk7SQf7HBP.3sT82I6'),
('hasan', '$2y$10$Wzrgdy5Tcm0YjJfYYL0n6ePGPO8R2oA7QRlEuAcMyVF4vm1gVnZm2'),
('yudha', '$2y$10$0XpdSgs/DHtsRsFhxtg95.Iqfm4/PKjZWrm2n2zy8Kv4jPCZQQ/M.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memiliki` (`username`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `iklan`
--
ALTER TABLE `iklan`
  ADD CONSTRAINT `memiliki` FOREIGN KEY (`username`) REFERENCES `user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
