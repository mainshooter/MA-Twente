-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Gegenereerd op: 07 apr 2017 om 09:20
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
-- Tabelstructuur voor tabel `afdeling`
--

CREATE TABLE `afdeling` (
  `idafdeling` int(11) NOT NULL,
  `afdelingsnaam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `configuratie`
--

CREATE TABLE `configuratie` (
  `idconfiguratie` int(11) NOT NULL,
  `RAM-idRAM` int(11) NOT NULL,
  `Processor_idProcessor` int(11) NOT NULL,
  `OS_idOS` int(11) NOT NULL,
  `videocard_idvideocard` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruiker`
--

CREATE TABLE `gebruiker` (
  `idgebruiker` int(11) NOT NULL,
  `voorletter` varchar(45) NOT NULL,
  `achternaam` varchar(100) NOT NULL,
  `geslacht` char(2) NOT NULL,
  `telefoonnummer_idtelefoonnummer` int(11) NOT NULL,
  `afdeling_idafdeling` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hardrive`
--

CREATE TABLE `hardrive` (
  `idharddrive` int(11) NOT NULL,
  `manufacture` varchar(100) NOT NULL,
  `size` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `hardrive_has_configuratie`
--

CREATE TABLE `hardrive_has_configuratie` (
  `idhardrive_has_configuratie` int(11) NOT NULL,
  `hardrive_idharddrive` int(11) NOT NULL,
  `configuratie_idconfiguratie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `melding`
--

CREATE TABLE `melding` (
  `idmelding` int(11) NOT NULL,
  `datum` date NOT NULL,
  `title` varchar(75) NOT NULL,
  `probleem` text NOT NULL,
  `oplossing` text NOT NULL,
  `invloedophoeveelheidgebruikers` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  `verantwoorlijke_idgebruiker` int(11) DEFAULT NULL,
  `gemelddoor_idgebruiker` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `OS`
--

CREATE TABLE `OS` (
  `idOS` int(11) NOT NULL,
  `OSName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `PC`
--

CREATE TABLE `PC` (
  `idPC` int(11) NOT NULL,
  `PCnummer` varchar(100) NOT NULL,
  `aanschafdatum` date NOT NULL,
  `gebruiker_idgebruiker` int(11) NOT NULL,
  `configuratie_idconfiguratie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `processor`
--

CREATE TABLE `processor` (
  `idprocessor` int(11) NOT NULL,
  `processor` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `RAM`
--

CREATE TABLE `RAM` (
  `idRAM` int(11) NOT NULL,
  `RAMGB` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `telefoonnummer`
--

CREATE TABLE `telefoonnummer` (
  `idtelefoonnummer` int(11) NOT NULL,
  `telefoonnummer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `urenverantwoording`
--

CREATE TABLE `urenverantwoording` (
  `idurenverantwoording` int(11) NOT NULL,
  `uren` int(11) NOT NULL,
  `melding_idmelding` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `videocard`
--

CREATE TABLE `videocard` (
  `idvideocard` int(11) NOT NULL,
  `videocardMemory` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `afdeling`
--
ALTER TABLE `afdeling`
  ADD PRIMARY KEY (`idafdeling`);

--
-- Indexen voor tabel `configuratie`
--
ALTER TABLE `configuratie`
  ADD PRIMARY KEY (`idconfiguratie`),
  ADD KEY `OS_idOS` (`OS_idOS`),
  ADD KEY `Processor_idProcessor` (`Processor_idProcessor`),
  ADD KEY `RAM-idRAM` (`RAM-idRAM`),
  ADD KEY `videocard_idvideocard` (`videocard_idvideocard`);

--
-- Indexen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD PRIMARY KEY (`idgebruiker`),
  ADD KEY `telefoonnummer_idtelefoonnummer` (`telefoonnummer_idtelefoonnummer`),
  ADD KEY `afdeling_idafdeling` (`afdeling_idafdeling`);

--
-- Indexen voor tabel `hardrive`
--
ALTER TABLE `hardrive`
  ADD PRIMARY KEY (`idharddrive`);

--
-- Indexen voor tabel `hardrive_has_configuratie`
--
ALTER TABLE `hardrive_has_configuratie`
  ADD PRIMARY KEY (`idhardrive_has_configuratie`),
  ADD KEY `hardrive_idharddrive` (`hardrive_idharddrive`),
  ADD KEY `configuratie_idconfiguratie` (`configuratie_idconfiguratie`);

--
-- Indexen voor tabel `melding`
--
ALTER TABLE `melding`
  ADD PRIMARY KEY (`idmelding`),
  ADD KEY `verantwoorlijke_idgebruiker` (`verantwoorlijke_idgebruiker`),
  ADD KEY `gemelddoor_idgebruiker` (`gemelddoor_idgebruiker`);

--
-- Indexen voor tabel `OS`
--
ALTER TABLE `OS`
  ADD PRIMARY KEY (`idOS`);

--
-- Indexen voor tabel `PC`
--
ALTER TABLE `PC`
  ADD PRIMARY KEY (`idPC`);

--
-- Indexen voor tabel `processor`
--
ALTER TABLE `processor`
  ADD PRIMARY KEY (`idprocessor`);

--
-- Indexen voor tabel `RAM`
--
ALTER TABLE `RAM`
  ADD PRIMARY KEY (`idRAM`);

--
-- Indexen voor tabel `telefoonnummer`
--
ALTER TABLE `telefoonnummer`
  ADD PRIMARY KEY (`idtelefoonnummer`);

--
-- Indexen voor tabel `urenverantwoording`
--
ALTER TABLE `urenverantwoording`
  ADD PRIMARY KEY (`idurenverantwoording`);

--
-- Indexen voor tabel `videocard`
--
ALTER TABLE `videocard`
  ADD PRIMARY KEY (`idvideocard`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `afdeling`
--
ALTER TABLE `afdeling`
  MODIFY `idafdeling` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  MODIFY `idgebruiker` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `hardrive`
--
ALTER TABLE `hardrive`
  MODIFY `idharddrive` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `hardrive_has_configuratie`
--
ALTER TABLE `hardrive_has_configuratie`
  MODIFY `idhardrive_has_configuratie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `melding`
--
ALTER TABLE `melding`
  MODIFY `idmelding` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `OS`
--
ALTER TABLE `OS`
  MODIFY `idOS` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `PC`
--
ALTER TABLE `PC`
  MODIFY `idPC` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT voor een tabel `telefoonnummer`
--
ALTER TABLE `telefoonnummer`
  MODIFY `idtelefoonnummer` int(11) NOT NULL AUTO_INCREMENT;
--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `configuratie`
--
ALTER TABLE `configuratie`
  ADD CONSTRAINT `configuratie_ibfk_1` FOREIGN KEY (`OS_idOS`) REFERENCES `OS` (`idOS`),
  ADD CONSTRAINT `configuratie_ibfk_2` FOREIGN KEY (`Processor_idProcessor`) REFERENCES `processor` (`idprocessor`),
  ADD CONSTRAINT `configuratie_ibfk_3` FOREIGN KEY (`RAM-idRAM`) REFERENCES `RAM` (`idRAM`),
  ADD CONSTRAINT `configuratie_ibfk_4` FOREIGN KEY (`videocard_idvideocard`) REFERENCES `videocard` (`idvideocard`);

--
-- Beperkingen voor tabel `gebruiker`
--
ALTER TABLE `gebruiker`
  ADD CONSTRAINT `gebruiker_ibfk_1` FOREIGN KEY (`telefoonnummer_idtelefoonnummer`) REFERENCES `telefoonnummer` (`idtelefoonnummer`),
  ADD CONSTRAINT `gebruiker_ibfk_2` FOREIGN KEY (`afdeling_idafdeling`) REFERENCES `afdeling` (`idafdeling`);

--
-- Beperkingen voor tabel `hardrive_has_configuratie`
--
ALTER TABLE `hardrive_has_configuratie`
  ADD CONSTRAINT `hardrive_has_configuratie_ibfk_1` FOREIGN KEY (`hardrive_idharddrive`) REFERENCES `hardrive` (`idharddrive`),
  ADD CONSTRAINT `hardrive_has_configuratie_ibfk_2` FOREIGN KEY (`configuratie_idconfiguratie`) REFERENCES `configuratie` (`idconfiguratie`);

--
-- Beperkingen voor tabel `melding`
--
ALTER TABLE `melding`
  ADD CONSTRAINT `melding_ibfk_1` FOREIGN KEY (`verantwoorlijke_idgebruiker`) REFERENCES `gebruiker` (`idgebruiker`),
  ADD CONSTRAINT `melding_ibfk_2` FOREIGN KEY (`gemelddoor_idgebruiker`) REFERENCES `gebruiker` (`idgebruiker`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
