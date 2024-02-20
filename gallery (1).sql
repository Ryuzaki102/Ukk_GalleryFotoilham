-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8111
-- Waktu pembuatan: 18 Feb 2024 pada 00.46
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggaldibuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggaldibuat`, `userid`) VALUES
(1, 'Foto Saya', 'jhhnmmm', '2024-02-09', 2),
(3, 'JKT48', 'JASK', '2024-02-10', 2),
(4, 'JKT48', 'JKSFS', '2024-02-16', 3),
(5, 'Kenangan', 'dfasfsa', '2024-02-17', 4),
(6, 'Me', 'dfsfds', '2024-02-17', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(2, 'Saya ini bang ', '            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, nam!', '2024-02-09', '850665166_1.jpg', 1, 2),
(17, 'Geert Wilders ', 'Politisi Belanda keturunan indonesia dari Partai PVV : Geert Wilders #antiimigran #politik', '2024-02-10', '1772055109_231124-rothkopf-geert-wilder-hero_boykb0.jpg', 1, 2),
(19, 'Ella JKT48', 'Gabriella Abigail Mawengkang Foto #JKT48 #ella', '2024-02-10', '1453928156_IMG_20230807_114446-4028594398.jpg', 3, 2),
(20, 'cfdasfnafnam,fa', 'kfalj', '2024-02-16', '418015020_Beans-of-Yustianus.jpg', 4, 3),
(22, 'dfsfsg', 'vcx', '2024-02-16', '1997413673_main-qimg-7c338671ec20ac9ead9b7e15421c55f6.jpg', 4, 3),
(23, 'vbczcsdfsfz', 'czxczvzvd', '2024-02-16', '1878181460_20230823_audisi-jkt48.jpg', 4, 3),
(24, 'dsfsgcvx', 'fdfsfdzx', '2024-02-16', '50568699_amit-kumar-ct4wxa5jfku-unsplash-1-62bafd540428243f774e1453.jpg', 4, 3),
(25, 'fdsvcv', 'dfscxvx', '2024-02-16', '1902262012_okodiemvumqkmv9hpalnhn.jpg', 4, 3),
(27, 'Mountain', 'fasfa', '2024-02-17', '707638654_mountain.jpg', 5, 4),
(30, 'Nazi', 'dsadadas', '2024-02-17', '1991419827_image4.jpg', 5, 4),
(37, 'cxvvx', 'xcvx', '2024-02-17', '1381998865_20171012_012317sumber-foto-national-geogaphic-indonesia.jpg', 5, 4),
(38, 'xcvxvx', 'xcvx', '2024-02-17', '302012954_image.jpg', 5, 4),
(39, '  cccx', 'fsdfsd', '2024-02-17', '1896450060_images (4).jpg', 5, 4),
(40, 'asdadas', 'dsada', '2024-02-17', '724439161_download (2).jpg', 5, 4),
(41, 'dsfads', 'fdsfs', '2024-02-17', '1888612168_images (5).jpg', 5, 4),
(42, 'rwrwe', 'rwrw', '2024-02-17', '1376156939_elang-1-571aa253369773180d9c76e7.jpg', 6, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(2, 2, 2, ' fsdfs', '2024-02-10'),
(3, 17, 2, ' aku suka kamu ditolak juga tidak apa-apa', '2024-02-10'),
(4, 2, 2, ' aman', '2024-02-10'),
(5, 17, 2, ' hilangkan bergembira semua lalalala mari bersuka ria', '2024-02-10'),
(6, 17, 2, ' hilangkan bergembira semua lalalala mari bersuka ria', '2024-02-10'),
(7, 2, 2, '  cerita ini membuat saya merinding', '2024-02-10'),
(11, 19, 2, ' Oshi ku', '2024-02-10'),
(12, 19, 3, 'waduh\r\n', '2024-02-16'),
(13, 20, 3, 'jesus', '2024-02-16'),
(14, 20, 3, ' waduh', '2024-02-16'),
(15, 20, 3, 'xvcx', '2024-02-16'),
(16, 20, 3, '  cvcfd', '2024-02-16'),
(17, 20, 3, 'vcxv', '2024-02-16'),
(18, 19, 3, 'vxvcx', '2024-02-16'),
(19, 19, 3, 'vc', '2024-02-16'),
(20, 19, 3, 'vx', '2024-02-16'),
(21, 17, 3, 'hallo', '2024-02-16'),
(22, 17, 4, '>////<', '2024-02-17'),
(23, 30, 4, 'p', '2024-02-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(2, 2, 2, '2024-02-09'),
(4, 19, 2, '2024-02-10'),
(5, 17, 2, '2024-02-10'),
(9, 19, 3, '2024-02-16'),
(10, 17, 3, '2024-02-16'),
(11, 17, 4, '2024-02-17'),
(12, 20, 4, '2024-02-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(1, 'user1', '12345', 'user1@gmail.com', 'User 01', 'Kajen'),
(2, 'ilham', '12345', 'ilham@gmail.com', 'arifin ilham', 'kfakjf'),
(3, 'Ella', '12345', 'ella@gmail.com', 'Gabriella Abigail', 'djkab'),
(4, 'gracie', '12345', 'gracie@gmail.com', 'Gracie Oktaviani', 'jkbzfdksb');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
