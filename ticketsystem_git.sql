-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Nov 2017 um 16:45
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
-- Tabellenstruktur für Tabelle `login_attempts`
--

CREATE TABLE `login_attempts` (
  `user_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `login_attempts`
--

INSERT INTO `login_attempts` (`user_id`, `time`, `status`) VALUES
('0', '0000-00-00 00:00:00', 0),
('0', '0000-00-00 00:00:00', 0),
('asdfasdfasdfasdf@teasdf', '0000-00-00 00:00:00', 0),
('test@test', '2017-11-13 13:46:23', 0),
('asdfasdf@tasdasdf', '2017-11-13 13:46:42', 0),
('admin@surfmedia.de', '2017-11-13 13:58:21', 1),
('admin@surfmedia.de', '2017-11-13 14:13:15', 1),
('manager@surfmedia.de', '2017-11-13 14:35:39', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `permissions`
--

CREATE TABLE `permissions` (
  `rightsID` int(11) NOT NULL,
  `rightName` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `permissions`
--

INSERT INTO `permissions` (`rightsID`, `rightName`) VALUES
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
-- Tabellenstruktur für Tabelle `role_perm`
--

CREATE TABLE `role_perm` (
  `roleID` int(11) NOT NULL,
  `rightID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE `tickets` (
  `ticketsID` int(12) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isAssignedTo` int(12) NOT NULL DEFAULT '0',
  `isFinished` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `tickets`
--

INSERT INTO `tickets` (`ticketsID`, `name`, `email`, `message`, `created`, `isAssignedTo`, `isFinished`) VALUES
(2, 'Christoph', 'christoph.sczigiol@gmail.com', 'Hallo ich bin ein Test', '2017-11-08 12:45:55', 0, 0),
(3, 'asdf', 'asdf', 'asdf', '2017-11-08 12:45:55', 0, 0),
(5, 'asdf', 'asdf', 'asdf', '2017-11-08 13:32:57', 0, 0),
(6, 'test', 'test', 'SELECT * FROM users where id=1; DROP TABLE user;', '2017-11-08 15:31:20', 0, 0),
(12, 'asdfasdf', 'asdfasdf@test', 'asdfasdf', '2017-11-10 09:47:15', 0, 0),
(13, 'asdfa', 'asdfasdf@test', '&lt;b&gt;test&lt;/b&gt;', '2017-11-10 09:47:32', 0, 0),
(14, 'asdfas', 'test@test', '&lt;script&gt;alert(&quot;Huhu&quot;)&lt;/script&gt;', '2017-11-10 09:48:58', 0, 0),
(15, 'Test', 'asdfljka@test', 'test', '2017-11-10 10:31:49', 0, 0),
(16, 'asdf', 'asdfasdf@test', 'wqwerqwersadfadf', '2017-11-10 13:46:01', 0, 0),
(17, 'asd', 'asd@test', 'asdasd', '2017-11-13 13:29:39', 0, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastupdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `lastaction` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `firstname`, `lastname`, `role`, `created`, `lastupdate`, `lastaction`) VALUES
(12, 'admin@surfmedia.de', '$2y$10$yBIDAel7ZfGrZyupPuzFieRLV5ZxJeq.KcKD1Y0QWEBh7SM0Ychcu', 'Christoph', 'Sczigiol', 'Admin', '2017-11-09 15:15:57', NULL, NULL),
(13, 'manager@surfmedia.de', '$2y$10$XWGCc.CUSBTykF2LP1y2o.JSJ8AMeTOlBhKxsgZbcASkeiHAxAaEe', 'Karl', 'Schmidt', 'Manager', '2017-11-09 15:16:57', '2017-11-09 15:17:54', NULL),
(14, 'supporter1@surfmedia.de', '$2y$10$L8N8YGR0POvpKqba7SGzoe9ueAAqnORdPkUBLT5SEEuCpw8Lto5bi', 'Peter', 'Schmidt', 'Supporter', '2017-11-09 15:17:18', NULL, NULL),
(15, 'supporter2@surfmedia.de', '$2y$10$TRsEeU3Dv1S.OsNPBtX2kuVs3y1FgEL2cXBX0IBCX.zClk5QXisU2', 'Hans', 'Petersen', 'Supporter', '2017-11-09 15:18:47', NULL, NULL),
(16, 'supporter3@surfmedia.de', '$2y$10$4tqjNK41ysLx.7D9izFyKe534CRimE0iGOY857cLW7flyaJpwmsWy', 'Ulrich', 'JÃ¼rgensen', 'Supporter', '2017-11-09 15:57:38', NULL, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user_ticket`
--

CREATE TABLE `user_ticket` (
  `userID` int(11) NOT NULL,
  `ticketsID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `user_ticket`
--

INSERT INTO `user_ticket` (`userID`, `ticketsID`) VALUES
(12, 2);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`rightsID`);

--
-- Indizes für die Tabelle `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleID`);

--
-- Indizes für die Tabelle `role_perm`
--
ALTER TABLE `role_perm`
  ADD PRIMARY KEY (`roleID`,`rightID`),
  ADD KEY `roleID` (`roleID`,`rightID`);

--
-- Indizes für die Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketsID`),
  ADD KEY `isAssignedTo` (`isAssignedTo`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indizes für die Tabelle `user_ticket`
--
ALTER TABLE `user_ticket`
  ADD PRIMARY KEY (`ticketsID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `permissions`
--
ALTER TABLE `permissions`
  MODIFY `rightsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT für Tabelle `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticketsID` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
