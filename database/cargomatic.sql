-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 10:24 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cargomatic`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `id_konta` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `plec` varchar(100) NOT NULL,
  `data_urodzenia` date NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `miasto` varchar(100) NOT NULL,
  `czy_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konta`
--

INSERT INTO `konta` (`id_konta`, `email`, `haslo`, `plec`, `data_urodzenia`, `telefon`, `miasto`, `czy_admin`) VALUES
(1, 'admin', 'admin', 'mężczyzna', '1999-12-12', '732489219', 'Opole', 1),
(2, 'marek@onet.pl', 'qwertyuiop', 'mężczyzna', '1998-02-11', '123456789', 'Wrocław', 0),
(5, 'wielki@interia.eu', 'abcdef', 'KOBIETA', '2000-02-07', '839276397', 'Opole', 0),
(7, 'kacper@wp.pl', '1234', 'mężczyzna', '1997-01-01', '893734621', 'Ozimek', 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontakt`
--

CREATE TABLE `kontakt` (
  `id_wiadomosci` int(11) NOT NULL,
  `email_kontakt` varchar(100) NOT NULL,
  `wiadomosc` text NOT NULL,
  `kontakt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontakt`
--

INSERT INTO `kontakt` (`id_wiadomosci`, `email_kontakt`, `wiadomosc`, `kontakt_id`) VALUES
(1, 'marek@onet.pl', 'Witam, chciałbym zapytać o wolny termin dla BMW M2 Competition 2019.', 2),
(2, 'marek@onet.pl', 'Dzień dobry, co tam?', 2),
(10, 'marek@onet.pl', 'sad sad sad sad sad sad sad sa', 2),
(12, 'marek@onet.pl', 'sad sad sad sad sad sad', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rezerwacje`
--

CREATE TABLE `rezerwacje` (
  `id_rezerwacji` int(11) NOT NULL,
  `od` date NOT NULL,
  `do` date NOT NULL,
  `kontakt_id` int(11) NOT NULL,
  `samochody_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rezerwacje`
--

INSERT INTO `rezerwacje` (`id_rezerwacji`, `od`, `do`, `kontakt_id`, `samochody_id`) VALUES
(1, '2022-12-08', '2022-12-12', 2, 1),
(16, '2023-01-23', '2023-01-24', 2, 4),
(62, '2023-02-02', '2023-02-03', 2, 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `id_samochodu` int(11) NOT NULL,
  `marka` varchar(100) NOT NULL,
  `model` varchar(100) NOT NULL,
  `moc` int(11) NOT NULL,
  `nadwozie` varchar(100) NOT NULL,
  `paliwo` varchar(100) NOT NULL,
  `skrzynia` varchar(100) NOT NULL,
  `setka` float NOT NULL,
  `silnik` varchar(100) NOT NULL,
  `zdjecie_link` varchar(100) NOT NULL,
  `kolor` varchar(100) NOT NULL,
  `cena` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `samochody`
--

INSERT INTO `samochody` (`id_samochodu`, `marka`, `model`, `moc`, `nadwozie`, `paliwo`, `skrzynia`, `setka`, `silnik`, `zdjecie_link`, `kolor`, `cena`) VALUES
(1, 'BMW', 'M2 COMPETITION', 420, 'COUPE', 'BENZYNA', 'AUTOMATYCZNA', 2.5, '5.0', 'images/bmw.png', '#ffffff', 600),
(2, 'FORD', 'MUSTANG GT', 450, 'FASTBACK', 'BENZYNA', 'AUTOMATYCZNA', 4.3, '5.0 V8', 'images/mustang.png', '', 750),
(3, 'DODGE', 'CHAKKANGER 6.4 R/T', 492, 'COUPE', 'BENZYNA', 'AUTOMATYCZNA', 4.6, '6.4 V8', 'images/dodge.png', '', 600),
(4, 'AUDI', 'RS6 AVANT', 460, 'COMBI', 'BENZYNA', 'AUTOMATYCZNA', 4.2, '4.0 V8', 'images/audirs.png', '', 800),
(5, 'PORSCHE', '911 CARRERA 4S', 420, 'COUPE', 'BENZYNA', 'AUTOMATYCZNA', 3.9, '3.0', 'images/porshe.png', '', 1800);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`id_konta`);

--
-- Indeksy dla tabeli `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id_wiadomosci`),
  ADD KEY `kontakt_id` (`kontakt_id`);

--
-- Indeksy dla tabeli `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD PRIMARY KEY (`id_rezerwacji`),
  ADD KEY `kontakt_id` (`kontakt_id`),
  ADD KEY `samochody_id` (`samochody_id`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`id_samochodu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konta`
--
ALTER TABLE `konta`
  MODIFY `id_konta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id_wiadomosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  MODIFY `id_rezerwacji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `samochody`
--
ALTER TABLE `samochody`
  MODIFY `id_samochodu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kontakt`
--
ALTER TABLE `kontakt`
  ADD CONSTRAINT `kontakt_ibfk_1` FOREIGN KEY (`kontakt_id`) REFERENCES `konta` (`id_konta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rezerwacje`
--
ALTER TABLE `rezerwacje`
  ADD CONSTRAINT `rezerwacje_ibfk_1` FOREIGN KEY (`kontakt_id`) REFERENCES `konta` (`id_konta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rezerwacje_ibfk_2` FOREIGN KEY (`samochody_id`) REFERENCES `samochody` (`id_samochodu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
