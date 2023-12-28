-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2023 pada 09.20
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `message` varchar(100) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id`, `nama`, `email`, `subject`, `message`, `status`) VALUES
(13, 'Kiel', 'kiel@gmail.com', 'Web', 'MANTAP BANG ', 'Finished'),
(14, 'Brisbane', 'bane@gmail.com', 'Matematika', 'HADIR BUKKKKK!', 'Finished'),
(15, 'Gladies', 'gladies@gmail.com', 'Barang', 'Produknya Keren!', 'Finished'),
(16, 'Jan', 'Jan@gmail.com', 'Alat', 'Barangnya Keren!', NULL),
(17, 'Evan', 'evan@gmail.com', 'Puas', 'Barangnya Nyaman dan Enak digunakan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `email` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `product_code`, `product_name`, `product_desc`, `price`, `units`, `total`, `date`, `email`, `status`) VALUES
(12, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 1, 200, '2023-12-04 05:27:41', 'sjobs@apple.com', 'Delivered'),
(58, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 1, 5000, '2023-12-11 14:33:17', 'evan@12', 'Processing'),
(57, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless .steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands', 1000, 2, 2000, '2023-12-08 02:55:10', 'evan@12', 'Pending'),
(56, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 1, 200, '2023-12-07 17:23:48', 'evan@12', 'Processing'),
(55, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless .steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands', 1000, 1, 1000, '2023-12-07 17:23:48', 'evan@12', 'Pending'),
(54, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless .steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands', 1000, 2, 2000, '2023-12-07 17:16:59', 'evan@12', ''),
(21, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 3, 600, '2023-12-04 10:21:57', 'patra@1234', ''),
(53, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless .steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands', 1000, 2, 2000, '2023-12-07 14:50:10', 'evan@12', ''),
(52, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 1, 200, '2023-12-07 14:28:08', 'evan@12', 'Pending'),
(51, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless .steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands', 1000, 2, 2000, '2023-12-07 14:28:08', 'evan@12', ''),
(25, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 1, 5000, '2023-12-04 13:00:40', 'patra@1234', ''),
(27, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands.', 1000, 2, 2000, '2023-12-04 14:41:54', 'patra@1234', 'Pending'),
(48, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 3, 15000, '2023-12-07 04:23:14', 'evan@12', 'Pending'),
(42, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 3, 15000, '2023-12-06 13:35:25', 'evan@12', ''),
(59, 'BOLT4', 'Celana Pendek', 'Enak & Nyaman', 3000, 1, 3000, '2023-12-23 02:58:51', 'user@gmail.com', 'Pending'),
(60, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 1, 200, '2023-12-23 04:05:49', 'user@gmail.com', ''),
(61, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 1, 200, '2023-12-23 04:12:13', 'user@gmail.com', 'Pending'),
(62, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 2, 10000, '2023-12-23 05:36:51', 'kok@12', 'Pending'),
(63, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 2, 10000, '2023-12-23 05:43:27', 'user@gmail.com', 'Pending'),
(64, 'BOLT5', 'Jacket', 'Melindungimu dari hujan', 16000, 2, 32000, '2023-12-23 05:49:09', 'user@gmail.com', 'Pending'),
(65, 'BOLT5', 'Jacket', 'Melindungimu dari hujan', 16000, 3, 48000, '2023-12-23 05:49:15', 'user@gmail.com', 'Pending'),
(66, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 5000, 1, 5000, '2023-12-23 05:51:47', 'koo@12', 'Pending'),
(67, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 200, 1, 200, '2023-12-23 05:51:47', 'koo@12', 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'BOLT1', 'Sports Shoes', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 'sports_shoes.jpg', 31, 5000.00),
(2, 'BOLT2', 'Cap', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 'cap.jpg', 24, 200.00),
(3, 'BOLT3', 'Sports Band', 'The Sports Band collection features highly polished stainless .steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands', 'sports_band.jpg', 29, 1000.00),
(24, 'BOLT4', 'Celana Pendek', 'Enak & Nyaman', 'celanapndek.jpg', 9, 3000.00),
(25, 'BOLT5', 'Jacket', 'Melindungimu dari hujan', 'jacket (1).jpg', 0, 16000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `pin` int(6) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  `hewanfavorit` varchar(50) NOT NULL,
  `warnafavorit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `city`, `pin`, `email`, `password`, `type`, `hewanfavorit`, `warnafavorit`) VALUES
(2, 'Admin', 'Webmaster', 'Internet', 'Electricity', 101010, 'admin@admin.com', '$2y$10$ECcSq6JP.n0OJGx7o0t8W.UYKiV5ysy9UPBCo3iYKen4HHkAGb0gi', 'admin', '', ''),
(11, 'Yehezkiel', 'Situmorang', 'Jalan Ayahanda No 5', 'Medan', 20012, 'kiel@gmail.com', '$2y$10$OwxktRyD/nCak7ubh1r8meoFdmlytx7o4KYpuaClaxHcOUYY3YHc6', 'user', '', ''),
(13, 'Evan', 'Gans', 'Jalan Abdul Hakim', 'Medan', 20013, 'evan@12', '$2y$10$RDjOO/v2XIFZsimhxQANp.RKBg083yjaT6J3C/MxMamZS6QDWrYJy', 'user', '', ''),
(23, 'User', '1', 'Jalan Tomat', 'Medan', 20112, 'user@gmail.com', '$2y$10$eO.dMoCEjoaNCIACABmuIe3LTYH3CCVO84R049S2xZMqjFJ9OoXEm', 'user', '', ''),
(29, 'Kok', '12', 'Jalan Tomat', 'Medan', 20012, 'kok@12', '$2y$10$lPJ2/Wq5Yv9FrCOx7F5H7ugfGN4N65x9yR2NFeMFNVGDAy4GBb0tq', 'user', '', ''),
(30, 'pass', '12', 'Jalan Tomat', 'Medan', 20112, 'pas@123', '$2y$10$afnlZDhr6SPzgIcVYr2yhOvzpa/qRF6TNHQ2z4iMFZlGlm2tSXvJm', 'user', '', ''),
(31, 'koo', '12', 'Jalan Tomat', 'Medan', 20012, 'koo@12', '$2y$10$3lK6SymCfE7Pulf2Nu2jvOf3CbHohQ24tCqx6rNZ6zn.lMUCQCTFq', 'user', '', ''),
(32, 'pas', 'ra', 'Jalan Tomat', 'Medan', 20012, 'dd@1', '$2y$10$LbAUylFMABb29JHUk8krgu6.BLFIyqW4pvHJ06soTbz/Fk96TaHei', 'user', '', ''),
(33, 'reeee', 'ree', 'jalan strasse', 'Medan', 20012, 'aaa@12', '$2y$10$AfkINFQSyFpKVbAcVIlgP.cDFIr0fVLnFk/2FUyf3KBUpmYngzEZe', 'user', '', ''),
(34, 'Paskalll', 'Mans', 'Jalan Tomat', 'Washington DC', 20012, 'paskalm30@gmail.com', '$2y$10$nap8aC4B3iTk7TMGLYNI9O1Hal/oGgPF.tS/EBOv.Po28HwdfLdRC', 'user', '', ''),
(35, 'kokok', 'mm', 'Jalan Tomat', 'Medan', 20012, 'koko@12', '$2y$10$Mf/GBO4vlCG/ZgYHieIVNeNTcpu6NKYRyw6vv9K038J27E2N85fmG', 'user', '', ''),
(36, 'rt', '12', 'jalan strasse', 'Medan', 20012, 'rt@12', '$2y$10$LGxrVjjAOZkwZXz4CV1EbOqRt7AkxABlrTkjU5/aI/KIRsQCvgL.q', 'user', '', ''),
(37, 'yu', 'yu', 'Jalan Tomat', 'Medan', 20012, 'yu@12', '$2y$10$L0VQ2nGczhq4dkJmRSo/POrOMfD8/jRfTDA/NFlkmqIbZEu32w5Cy', 'user', 'musang', 'kuning'),
(38, 'mus', '12', 'jalan strasse', 'Medan', 20012, 'mus@12', '$2y$10$2jWc3pgPTqXzOwBrFNvd1.5rr3bVs6j1oSgsEU3Xs/NkpnxJzQ2Ue', 'user', 'elang', 'merah'),
(39, 'mod', 'moi', 'Jalan Tomat', 'Medan', 20012, 'kk@gmail.com', '$2y$10$4Uifu5s9UHgyILO/32bxBumLbz7Tl.T0iLIt5ddUv7aw2H7KtP3dy', 'user', '', ''),
(40, 'daddad', 'dad', 'jalan strasse', 'Medan', 20012, 'ada@gmail.com', '$2y$10$YWd5PGpEgexY5izqY3eSXOLkQF3dkuluC3M37wXdh9vFWJSpZSyry', 'user', 'koala', 'kuning');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
