-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Mrz 2019 um 16:57
-- Server-Version: 10.1.38-MariaDB
-- PHP-Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr10_benjamin_schneider_biglibrary`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `authorFirstName` varchar(55) DEFAULT NULL,
  `authorSurName` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`author_id`, `authorFirstName`, `authorSurName`) VALUES
(1, 'J.K.', 'Rowling'),
(2, 'Stephen', 'King'),
(3, 'E.L.', 'James'),
(4, 'George', 'Orwell'),
(5, 'J.R.R.', 'Tolkien'),
(6, 'Stan', 'Lee'),
(7, 'Linkin', 'Park');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `library`
--

CREATE TABLE `library` (
  `library_id` int(11) NOT NULL,
  `libraryName` varchar(55) DEFAULT NULL,
  `libraryAddress` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `library`
--

INSERT INTO `library` (`library_id`, `libraryName`, `libraryAddress`) VALUES
(1, 'The Big Library', 'Kettenbrückengasse 23 / 2 / 12, 1050 Wien');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `media`
--

CREATE TABLE `media` (
  `media_id` int(11) NOT NULL,
  `mediaTitle` varchar(150) DEFAULT NULL,
  `mediaImage` varchar(500) DEFAULT NULL,
  `mediaISBN` varchar(25) DEFAULT NULL,
  `mediaDesc` varchar(500) DEFAULT NULL,
  `mediaPrice` float DEFAULT NULL,
  `mediaStatus` tinyint(1) DEFAULT NULL,
  `fk_library_id` int(11) NOT NULL,
  `fk_type_id` int(11) NOT NULL,
  `fk_author_id` int(11) NOT NULL,
  `fk_publisher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `media`
--

INSERT INTO `media` (`media_id`, `mediaTitle`, `mediaImage`, `mediaISBN`, `mediaDesc`, `mediaPrice`, `mediaStatus`, `fk_library_id`, `fk_type_id`, `fk_author_id`, `fk_publisher_id`) VALUES
(1, 'Harry Potter and the Order of the Phoenix', 'https://images-na.ssl-images-amazon.com/images/I/71xcuT33RpL._SY606_.jpg', '978-0747551003', 'Harry Potter is due to start his fifth year at Hogwarts School of Witchcraft and Wizadry. He is desperate to get back to school and find out why his friends Ron and Hermione have been so secretive all summer. However, what Harry is about to discover in his new year at Hogwarts will turn his whole world upside down...', 9.99, 0, 1, 1, 1, 1),
(2, 'It', 'https://img.thriftbooks.com/api/images/l/784ca38ec69d47fb0bc973439e10bfc17965a509.jpg', '978-1501175466', 'Welcome to Derry, Maine. Its a small city, a place as hauntingly familiar as your own hometown. Only in Derry the haunting is real. They were seven teenagers when they first stumbled upon the horror. Now they are grown-up men and women who have gone out into the big world to gain success and happiness.', 14.99, 1, 1, 1, 2, 3),
(3, 'Fifty Shades of Grey', 'https://images-na.ssl-images-amazon.com/images/I/51YNPg-gCjL._SL300_.jpg', '978-0345803481', 'When literature student Anastasia Steele goes to interview young entrepreneur Christian Grey, she encounters a man who is beautiful, brilliant, and intimidating. The unworldly, innocent Ana is startled to realize she wants this man and, despite his enigmatic reserve, finds she is desperate to get close to him.', 12.99, 0, 1, 1, 3, 2),
(4, 'Animal Farm', 'https://images-na.ssl-images-amazon.com/images/I/71RjpVEyscL.jpg', '860-1409685823', 'A farm is taken over by its overworked, mistreated animals. With flaming idealism and stirring slogans, they set out to create a paradise of progress, justice, and equality. Thus the stage is set for one of the most telling satiric fables ever penned a razor-edged fairy tale for grown-ups that records the evolution from revolution against tyranny to a totalitarianism just as terrible.', 4.99, 1, 1, 1, 4, 3),
(5, 'The Lord of the Rings', 'https://images-na.ssl-images-amazon.com/images/I/51EstVXM1UL._SX331_BO1,204,203,200_.jpg', '978-0395489321', 'The three volumes that make up Tolkien\'s epic classic The Lord of the Rings are here presented in their standard cloth editions including large format fold-out maps and an extensive appendices. Set contains The Fellowship of the Ring, The Two Towers, and The Return of the King, with jackets and a box designed by celebrated illustrator Alan Lee.', 4.99, 0, 1, 1, 5, 3),
(6, 'Spider-Man', 'https://images-na.ssl-images-amazon.com/images/I/51A1PHHRG1L._SY445_.jpg', 'Movie-01', 'Peter Parker is beset with troubles in his failing personal life as he battles a brilliant scientist named Doctor Otto Octavius.', 2.99, 1, 1, 2, 6, 2),
(7, 'The Avengers', 'https://terrigen-cdn-dev.marvel.com/content/prod/1x/theavengers_lob_crd_03.jpg', 'Movie-02', 'Earth\'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.', 2.99, 1, 1, 2, 6, 1),
(8, 'Captain America', 'https://m.media-amazon.com/images/M/MV5BMTYzOTc2NzU3N15BMl5BanBnXkFtZTcwNjY3MDE3NQ@@._V1_.jpg', 'Movie-03', 'The First Avenger. Steve Rogers (Chris Evans) is determined to enlist as a soldier for the impending second World War. But his weak and sickly appearance hinders his goal. ... At a show in Europe, he learns that Bucky and some soldiers are held captive at a HYDRA site.', 11.99, 0, 1, 2, 6, 2),
(9, 'Hybrid Theory', 'https://images-na.ssl-images-amazon.com/images/I/81iC%2BO0ec2L._SL1448_.jpg', 'CD-01', 'Music Album by the band Linkin Park', 7.99, 0, 1, 3, 7, 3),
(10, 'Meteora', 'https://images-na.ssl-images-amazon.com/images/I/81bkBmODx9L._SL1500_.jpg', 'CD-02', 'Music Album by the band Linkin Park', 5.99, 1, 1, 3, 7, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `publisherName` varchar(55) DEFAULT NULL,
  `publisherAddress` varchar(200) DEFAULT NULL,
  `publisherSize` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `publisherName`, `publisherAddress`, `publisherSize`) VALUES
(1, 'Dawnstar GMBH', 'Dawnstarway 7', 'medium'),
(2, 'Morthal Inc.', 'Morthal Street 13-14', 'small'),
(3, 'Solitude Co. KG', 'Solitude Avenue 1-5', 'large');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `typeName` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `type`
--

INSERT INTO `type` (`type_id`, `typeName`) VALUES
(1, 'Book'),
(2, 'DVD'),
(3, 'CD');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `userFirstName` varchar(55) DEFAULT NULL,
  `userLastName` varchar(55) DEFAULT NULL,
  `userEmail` varchar(55) DEFAULT NULL,
  `userPassword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `userFirstName`, `userLastName`, `userEmail`, `userPassword`) VALUES
(1, 'Benjamin', 'Schneider', 'benjamin@domain.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(3, 'Benjamin', 'Schneider', 'benjamin2@domain.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(4, 'Dude', 'DerDude', 'dude@domain.com', '60e77101e76950a9b1830fa107fd2f8fc545255b3e0f14b6a7797cf9ee005f07');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indizes für die Tabelle `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`library_id`);

--
-- Indizes für die Tabelle `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_id`),
  ADD KEY `fk_library_id` (`fk_library_id`),
  ADD KEY `fk_author_id` (`fk_author_id`),
  ADD KEY `fk_type_id` (`fk_type_id`),
  ADD KEY `fk_publisher_id` (`fk_publisher_id`);

--
-- Indizes für die Tabelle `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`);

--
-- Indizes für die Tabelle `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `library`
--
ALTER TABLE `library`
  MODIFY `library_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `media`
--
ALTER TABLE `media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`fk_library_id`) REFERENCES `library` (`library_id`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`fk_author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `media_ibfk_4` FOREIGN KEY (`fk_publisher_id`) REFERENCES `publisher` (`publisher_id`),
  ADD CONSTRAINT `media_ibfk_5` FOREIGN KEY (`fk_library_id`) REFERENCES `library` (`library_id`),
  ADD CONSTRAINT `media_ibfk_6` FOREIGN KEY (`fk_author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `media_ibfk_7` FOREIGN KEY (`fk_type_id`) REFERENCES `type` (`type_id`),
  ADD CONSTRAINT `media_ibfk_8` FOREIGN KEY (`fk_publisher_id`) REFERENCES `publisher` (`publisher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
