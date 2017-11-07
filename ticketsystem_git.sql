-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 07. Nov 2017 um 17:07
-- Server-Version: 10.1.13-MariaDB
-- PHP-Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ticketsystem`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rights`
--

CREATE TABLE `rights` (
  `rightsID` int(11) NOT NULL,
  `rightName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `rights`
--

INSERT INTO `rights` (`rightsID`, `rightName`) VALUES
(1, 'Ticket erstellen'),
(2, 'Supporter anlegen'),
(3, 'Manager anlegen'),
(4, 'Anhänge einfuegen'),
(5, 'Alle Tickets einsehen');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `roles`
--

CREATE TABLE `roles` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `roles`
--

INSERT INTO `roles` (`roleID`, `roleName`) VALUES
(1, 'Supporter'),
(2, 'Manager'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `role_rights`
--

CREATE TABLE `role_rights` (
  `roleID` int(11) NOT NULL,
  `rightID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastupdate` timestamp NULL DEFAULT NULL,
  `lastaction` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `firstname`, `lastname`, `role`, `created`, `lastupdate`, `lastaction`) VALUES
(4, 'christoph.sczigiol@gmail.com', '$2y$10$H63WjNoPOsNeE50fkIaXx.qNm9MZ1Lndb0dEMOjw5WN5u1RC.s03i', 'Christoph', 'Sczigiol', 'Supporter', '2017-11-07 14:42:07', NULL, NULL);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `rights`
--
ALTER TABLE `rights`
  ADD PRIMARY KEY (`rightsID`);

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indizes für die Tabelle `role_rights`
--
ALTER TABLE `role_rights`
  ADD PRIMARY KEY (`roleID`,`rightID`),
  ADD KEY `roleID` (`roleID`,`rightID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `rights`
--
ALTER TABLE `rights`
  MODIFY `rightsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
