-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 11:00 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventp`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `datum` datetime NOT NULL,
  `tekst` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `novost` int(11) NOT NULL,
  `roditelj` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `autor`, `datum`, `tekst`, `novost`, `roditelj`) VALUES
(1, 1, '2016-06-05 00:00:00', 'komentarrr', 2, NULL),
(2, 2, '2016-06-05 00:00:00', 'pametni komentar', 9, NULL),
(3, 2, '2016-06-05 00:00:00', 'još neki komentarrr', 9, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime_prezime` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_slovenian_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime_prezime`, `username`, `password`) VALUES
(1, 'adna tahic', 'adna', 'b8d76db177b6e9b1e009b60b59ff7d30'),
(2, 'eldar kurtic', 'eldar', '9b8b2dc00a2331d386c6d6b2696072a9'),
(3, 'maida bakovic', 'maida', 'ee5961493190e3e345d4be45c535a4a1'),
(4, 'admin admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `novost`
--

CREATE TABLE `novost` (
  `datum` date NOT NULL,
  `datum_kreiranja` datetime NOT NULL,
  `id` int(11) NOT NULL,
  `korisnik` int(11) NOT NULL,
  `link` varchar(500) COLLATE utf8_slovenian_ci NOT NULL,
  `naziv` varchar(100) COLLATE utf8_slovenian_ci NOT NULL,
  `opis` varchar(1000) COLLATE utf8_slovenian_ci NOT NULL,
  `url_slike` varchar(500) COLLATE utf8_slovenian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovenian_ci;

--
-- Dumping data for table `novost`
--

INSERT INTO `novost` (`datum`, `datum_kreiranja`, `id`, `korisnik`, `link`, `naziv`, `opis`, `url_slike`) VALUES
('2016-06-15', '2016-06-05 00:00:00', 1, 1, 'www.facebook.com', 'Event1', 'opis1', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Snow_on_the_Carpathian_Mountains%2C_Romania.JPG/255px-Snow_on_the_Carpathian_Mountains%2C_Romania.JPG'),
('2016-06-17', '2016-06-05 00:00:00', 2, 2, 'www.facebook.com', 'Event2', 'opis2', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Snow_on_the_Carpathian_Mountains%2C_Romania.JPG/255px-Snow_on_the_Carpathian_Mountains%2C_Romania.JPG'),
('2016-06-18', '2016-06-05 00:00:00', 9, 3, 'www.facebook.com', 'Event3', 'opis3', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Snow_on_the_Carpathian_Mountains%2C_Romania.JPG/255px-Snow_on_the_Carpathian_Mountains%2C_Romania.JPG'),
('2016-06-22', '2016-06-05 00:00:00', 10, 4, 'www.facebook.com', 'Event4', 'opis4', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/08/Snow_on_the_Carpathian_Mountains%2C_Romania.JPG/255px-Snow_on_the_Carpathian_Mountains%2C_Romania.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `novost` (`novost`),
  ADD KEY `autor` (`autor`) USING BTREE;

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `novost`
--
ALTER TABLE `novost`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnik` (`korisnik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `novost`
--
ALTER TABLE `novost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`autor`) REFERENCES `korisnik` (`id`),
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`novost`) REFERENCES `novost` (`id`);

--
-- Constraints for table `novost`
--
ALTER TABLE `novost`
  ADD CONSTRAINT `novost_ibfk_1` FOREIGN KEY (`korisnik`) REFERENCES `korisnik` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
