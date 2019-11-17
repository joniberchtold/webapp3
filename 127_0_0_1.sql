-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Nov 2019 um 16:35
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `online_shop`
--
CREATE DATABASE IF NOT EXISTS `online_shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online_shop`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `artikel`
--

CREATE TABLE `artikel` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Artikelnummer` int(255) NOT NULL,
  `Bild` varchar(255) NOT NULL,
  `Beschreibung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `artikel`
--

INSERT INTO `artikel` (`ID`, `Name`, `Artikelnummer`, `Bild`, `Beschreibung`) VALUES
(1, 'Produkt 1', 12345645, 'bild', 'Dies ist eine Produktbeschreibung');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `UserID` int(255) NOT NULL,
  `Benutzername` varchar(255) NOT NULL,
  `Passwort` varchar(255) NOT NULL,
  `Vorname` varchar(255) NOT NULL,
  `Nachname` varchar(255) NOT NULL,
  `Strasse` varchar(255) NOT NULL,
  `Hausnummer` int(255) NOT NULL,
  `PLZ` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Telefonnummer` int(255) NOT NULL,
  `passwortcode` varchar(255) DEFAULT NULL,
  `passwortcode_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`UserID`, `Benutzername`, `Passwort`, `Vorname`, `Nachname`, `Strasse`, `Hausnummer`, `PLZ`, `Email`, `Telefonnummer`, `passwortcode`, `passwortcode_time`) VALUES
(1, 'a', '$2y$10$Yx3rz1dgy7hyXWKCprq8/OQhXSj0q2IsVUgaGPMbZVJyqLV54gVgO', 'a', 'a', 'a', 0, 0, 'a@a.ch', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `passwort`
--

CREATE TABLE `passwort` (
  `pwID` int(255) NOT NULL,
  `UserID` int(255) NOT NULL,
  `Hash` varchar(255) NOT NULL,
  `Time` time(6) NOT NULL,
  `done` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`UserID`);

--
-- Indizes für die Tabelle `passwort`
--
ALTER TABLE `passwort`
  ADD PRIMARY KEY (`pwID`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `artikel`
--
ALTER TABLE `artikel`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT für Tabelle `passwort`
--
ALTER TABLE `passwort`
  MODIFY `pwID` int(255) NOT NULL AUTO_INCREMENT;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `passwort`
--
ALTER TABLE `passwort`
  ADD CONSTRAINT `passwort_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `benutzer` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
