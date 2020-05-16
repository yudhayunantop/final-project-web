-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 01:16 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

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
-- Table structure for table `iklan`
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
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id`, `noTelp`, `nama`, `email`, `alamat`, `gambar`, `deskripsi`, `username`) VALUES
(1, '42142421424', 'nagasari', 'yudha@gmail.com', 'Sistem Informasi', '5eba8213892d4.jpeg', '', 'admin'),
(2, '18082010035', 'klepon', 'helmy@gmail.com', 'Sistem Informasi', 'klepon.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'admin'),
(3, '18082010039', 'lemper', 'antok@gmail.com', 'Sistem Informasi', 'lemper.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'hasan'),
(12, '18082010026', 'koci-koci', 'saladinalyubbi@gmail.com', 'Sistem Informasi', 'kocikoci.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod                 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,                 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo                 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse                 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non                 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'hasan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(4, 'admin', '$2y$10$aSZD5gvoEnKBnBrjFIfBqOqcxdRnsAOuWkr.hCh/FTMPsT0fkJKpe'),
(7, 'hasan', '$2y$10$Wzrgdy5Tcm0YjJfYYL0n6ePGPO8R2oA7QRlEuAcMyVF4vm1gVnZm2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
