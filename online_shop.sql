-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2019 at 04:51 PM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.33-0+deb9u6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_shop`
--
CREATE DATABASE IF NOT EXISTS `online_shop` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online_shop`;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Artikelnummer` int(255) NOT NULL,
  `Bild` varchar(255) NOT NULL,
  `Beschreibung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`ID`, `Name`, `Artikelnummer`, `Bild`, `Beschreibung`) VALUES
(5, 'Logitech Maus M705 Marathon ', 484256, 'Logitech-Maus-M705-Marathon-H-003.xxl.jpg', 'Maus-Typ: Standard, Bedienungsseite: Rechtshänder'),
(6, 'Microsoft Tastatur Natural Ergonomic 4000', 86059, 'microsoft-natural-ergo-keyboard-4000-001.xxl.jpg', 'Tastatur Typ: Ergonomisch, Tastaturlayout: QWERTZ (CH)'),
(7, 'HP Taschenrechner HP 35s Wissenschaftlicher Taschenrechner', 859748, 'null-H-002.xxl.jpg', 'Anwendungsbereich: Wissenschaftlicher Rechner; Schulrechner '),
(8, 'Razer Gaming-Maus Razer Naga Trinity', 782552, 'Razer-GamingMaus-Razer-Naga-Trinity-H-003.xxl.jpg', 'Maus Features: Daumentaste; Hotkeys, Bedienungsseite: Rechtshänder'),
(9, 'Panasonic SIP Zusatzmobilteil KX-TPA68CEB CAT-iq 2.0', 912765, 'Panasonic-SIP-Zusatzmobilteil-KXTPA68CEB-CATiq-20-H-003.xxl.jpg', 'CAT-iq 2.0, HD wideband audio (G.722)');

-- --------------------------------------------------------

--
-- Table structure for table `benutzer`
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
-- Dumping data for table `benutzer`
--

INSERT INTO `benutzer` (`UserID`, `Benutzername`, `Passwort`, `Vorname`, `Nachname`, `Strasse`, `Hausnummer`, `PLZ`, `Email`, `Telefonnummer`, `passwortcode`, `passwortcode_time`) VALUES
(1, 'a', '$2y$10$Qh6XBLjz9ZqUV/suGrDj2utypApzpImp1FIiruvwZcfND7FzlRHiS', 'a', 'a', 'a', 0, 0, 'a@a.ch', 0, NULL, NULL),
(2, 'Valentin', '$2y$10$XBoZAQsBO/5S75EgKX3bDOhR7z8yPx5bh2cIpTMiKVpX86lRoipCi', 'Valentin', 'Leiggener', 'Talstrasse', 19, 3924, 'valentin.leiggener@gmx.ch', 799271811, '256b4b6fd59c3eb8a6b675a3eba41454', '2019-12-08 15:27:22'),
(3, 'Jonas', '$2y$10$jCZB1IgSXxYbuKnlMyR0H.grck.WPNqiZRBmRgCjFutK4Hfut4NNC', 'Jonas', 'Berchtold', 'Dorfstrasse', 58, 3930, 'jonas.berchtold@hotmail.com', 79, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
