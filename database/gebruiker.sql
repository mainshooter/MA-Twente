-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 07 apr 2017 om 15:15
-- Serverversie: 10.1.21-MariaDB
-- PHP-versie: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ma-twente`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `idgebruiker` int(11) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `wachtwoord` text NOT NULL,
  `voorletter` varchar(45) DEFAULT NULL,
  `achternaam` varchar(100) DEFAULT NULL,
  `geslacht` char(2) DEFAULT NULL,
  `telefoonnummer_idtelefoonnummer` int(11) DEFAULT NULL,
  `afdeling_idafdeling` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `gebruiker`
--

INSERT INTO `gebruiker` (`idgebruiker`, `mail`, `wachtwoord`, `voorletter`, `achternaam`, `geslacht`, `telefoonnummer_idtelefoonnummer`, `afdeling_idafdeling`) VALUES
(2, 'test@test.nl', '$2y$10$eem6t0BctLUmt2H83kQ7Cudrb7ZOoMPX/ePaoe6hT/khqN47W9ON6', NULL, NULL, NULL, NULL, NULL);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`idgebruiker`),
  ADD KEY `telefoonnummer_idtelefoonnummer` (`telefoonnummer_idtelefoonnummer`),
  ADD KEY `afdeling_idafdeling` (`afdeling_idafdeling`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `idgebruiker` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD CONSTRAINT `gebruiker_ibfk_1` FOREIGN KEY (`telefoonnummer_idtelefoonnummer`) REFERENCES `telefoonnummer` (`idtelefoonnummer`),
  ADD CONSTRAINT `gebruiker_ibfk_2` FOREIGN KEY (`afdeling_idafdeling`) REFERENCES `afdeling` (`idafdeling`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
