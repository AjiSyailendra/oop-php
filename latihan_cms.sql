-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Okt 2022 pada 03.31
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `latihan_cms`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `iduser` int(7) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register` datetime NOT NULL,
  `lastlogin` datetime NOT NULL,
  `type` char(1) NOT NULL,
  `cek` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`iduser`, `username`, `password`, `register`, `lastlogin`, `type`, `cek`) VALUES
(9, 'Syailendro', 'Syailendra', '2022-09-22 15:55:12', '2022-10-03 14:47:08', 'U', '-'),
(10, 'Endro', 'ef05b2e33a99fd856b0167b53c73f89f', '2022-10-03 14:47:18', '2022-10-10 13:15:43', 'U', '0'),
(11, 'Megawati', '9426f98216c5962fffb68b0b61216bbc', '2022-10-06 08:56:56', '2022-10-06 11:04:20', 'U', '1'),
(13, 'thesyailendra_', 'edf8e5d6cf415e0fca9ca5c983ac369f', '2022-10-10 13:51:45', '0000-00-00 00:00:00', 'A', '0'),
(14, 'endro31', 'd38bc08d4751051be069dd14b88a51f9', '2022-10-10 13:51:56', '0000-00-00 00:00:00', 'A', '0'),
(15, '16528', 'cceafeaa5a753f129eb1aa664ec80a80', '2022-10-10 13:52:06', '0000-00-00 00:00:00', 'A', '0'),
(16, 'aziz', 'b85dc795ba17cb243ab156f8c52124e1', '2022-10-10 13:52:19', '0000-00-00 00:00:00', 'A', '0'),
(17, 'juned', '4769ad580a03eae7501b5852ea17b82a', '2022-10-10 13:52:25', '0000-00-00 00:00:00', 'A', '0'),
(18, 'dulltod', 'f396b6237515088ac2a977c055151eac', '2022-10-10 13:52:33', '0000-00-00 00:00:00', 'A', '0'),
(19, 'aaaa', '594f803b380a41396ed63dca39503542', '2022-10-10 14:55:45', '0000-00-00 00:00:00', 'A', '0');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
