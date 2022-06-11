-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 12, 2021 at 01:44 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentid` int(11) DEFAULT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `parentid`, `title`, `keywords`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(14, 0, 'cabanes', 'cabanes', 'cabanes', NULL, 'True', NULL, NULL),
(15, 0, 'cabanes dans les arbres', 'cabanes dans les arbres', 'cabanes dans les arbres', NULL, 'True', NULL, NULL),
(16, 0, 'LA YOURTE', 'LA YOURTE', 'LA YOURTE', NULL, 'True', NULL, NULL),
(17, 0, 'LA MAISON CONTAINER', 'LA MAISON CONTAINER', 'LA MAISON CONTAINER', NULL, 'True', NULL, NULL),
(18, 0, 'LA MAISON-SCULPTURE', 'LA MAISON-SCULPTURE', 'LA MAISON-SCULPTURE', NULL, 'True', NULL, NULL),
(19, 0, 'cabanes', 'Maison flottante', 'cabanes', NULL, 'True', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `subject`, `comment`, `status`, `ip`, `userid`, `created_at`, `updated_at`, `rate`, `hotelid`) VALUES
(5, 'Very Good swimpool', 'Very good and clean swim pool, thank you', 'True', '127.0.0.1', 1, NULL, NULL, 4, 2),
(6, 'google', 'good', 'New', '::1', 10, NULL, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci,
  `userid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3535ED912469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `category_id`, `title`, `keywords`, `description`, `image`, `star`, `address`, `city`, `phone`, `email`, `fax`, `country`, `location`, `status`, `created_at`, `updated_at`, `detail`, `userid`) VALUES
(1, 15, 'Monchâteau Etoilé, hébergement insolite', 'Monchâteau Etoilé, hébergement insolite', 'Monchâteau Etoilé, hébergement insolite', 'd0de8523f1efa80113e3c22043bac62e.jpg', 5, '2 impasse Monchâteau38620, MERLAS', 'Paris', NULL, NULL, NULL, 'Frans', NULL, 'True', NULL, NULL, '<h3>ACTIVITÉS</h3>\r\n<h2>Sur place :</h2>\r\n<ul>\r\n	<li> - Activités sur place : randonnées, raquettes, VTT, pêche\r\n\r\n</li>\r\n	<li>\r\n- Activités nautiques : les lacs de Paladru et Aiguebelette sont à 20 minutes\r\n\r\n</li>\r\n	<li>\r\n- Activités \"montagne\" : les 1ères stations de ski de fond et alpin sont à 30 minutes, possibilité parapente, canyoning...\r\n\r\n</li>\r\n	<li>\r\n- Activités culturelles et touristiques : découverte des villes de Voiron (cathédrale, Caves de Chartreuse, Marché...), Grenoble (capitale du Dauphiné) ou Chambéry et Annecy (villes médiévales), Monastère de la Grande Chartreuse...)\r\n</li>\r\n	<li>\r\n- Activités \"récréatives\" : Parc Walibi à 40 minutes, Zoo de Fitilieu à 20 minutes\r\n</li>\r\n Le domaine est situé à Merlas au 2 impasse Monchâteau (38620), dans le Parc Naturel Régional de Chartreuse.\r\n	<li>- Voiron : 15 minutes\r\n\r\n</li>\r\n	<li>- Grenoble : 30 minutes\r\n\r\n</li>\r\n	<li>- Chambéry : 40 minutes\r\n\r\n</li>\r\n	<li>- Annecy : 1h\r\n\r\n</li>\r\n<li> - Genève : 1h15</li>\r\n	<li>Wifi dans les espaces communs</li>\r\n    <li><h2></h2></li>\r\n    <li> Accrobranche\r\n</li>\r\n    <li>Balade à vélo\r\n</li>\r\n    <li>Canoë-kayak\r\n</li>\r\n    <li>Château de Beynac-et-Cazenac\r\n</li>\r\n    <li>Château de Castelnaud\r\n</li>\r\n    <li>Gouffre de Padirac\r\n</li>\r\n    <li> Grotte de Lascaux\r\n</li>\r\n    <li>Jardins de Marqueyssac\r\n</li>\r\n	\r\n	<li>\r\n	<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n		<tbody>\r\n			<tr>\r\n				<td>&nbsp;</td>\r\n				<td>&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td>&nbsp;</td>\r\n				<td>&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td>&nbsp;</td>\r\n				<td>&nbsp;</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n\r\n	<p><img alt=\"\" src=\"http://127.0.0.1:8000/uploads/images/43ffd64ecae6cf5fed04324e02361333.jpeg\" style=\"height:533px; width:800px\" /></p>\r\n	</li>\r\n</ul>', 2),
(2, 15, 'Ma p’tite Cabane en Lozère', 'Ma p’tite Cabane en Lozère', 'Ma p’tite Cabane en Lozère', 'd968c45cbc669ed89eb53d4986edd718.jpg', 4, '515avis de voyageurs Rue Lou Sourel, 48400, VEBRON, Occitanie', 'Paris', '04 66 44 09 94', 'mydream@gmail.com', '04 66 44 09 94', 'Frans', NULL, 'True', NULL, NULL, '<h3>ACTIVITÉS</h3>\r\n<h2>Sur place :</h2>\r\n<ul>\r\n	<li>Barbecue\r\n</li>\r\n	<li>Footing\r\n</li>\r\n	<li>Internet\r\n</li>\r\n	<li>Jacuzzi\r\n</li>\r\n	<li>Jeux de société\r\n</li>\r\n	<li>Massages\r\n</li>\r\n	<li>Ping pong\r\n</li>\r\n	<li>Piscine\r\n</li>\r\n	<li>Vélos à disposition\r\n</li>\r\n	<li>Wifi dans les espaces communs</li>\r\n    <li><h2>Dans les environs</h2></li>\r\n    <li> Accrobranche\r\n</li>\r\n    <li>Balade à vélo\r\n</li>\r\n    <li>Canoë-kayak\r\n</li>\r\n    <li>Château de Beynac-et-Cazenac\r\n</li>\r\n    <li>Château de Castelnaud\r\n</li>\r\n    <li>Gouffre de Padirac\r\n</li>\r\n    <li> Grotte de Lascaux\r\n</li>\r\n    <li>Jardins de Marqueyssac\r\n</li>\r\n	\r\n	<li>\r\n	<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n		<tbody>\r\n			<tr>\r\n				<td>&nbsp;</td>\r\n				<td>&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td>&nbsp;</td>\r\n				<td>&nbsp;</td>\r\n			</tr>\r\n			<tr>\r\n				<td>&nbsp;</td>\r\n				<td>&nbsp;</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n\r\n	<p><img alt=\"\" src=\"http://127.0.0.1:8000/uploads/images/43ffd64ecae6cf5fed04324e02361333.jpeg\" style=\"height:533px; width:800px\" /></p>\r\n	</li>\r\n</ul>', 2),
(3, 14, 'Cabane le Renard', 'Cabane le Renard – Ma p’tite Cabane en Lozère', 'Nous vous proposons un hébergement de qualité en cabane tout confort, isolée et chauffée, dans un cadre de pleine nature.', 'e2ef1cf1732fd7e45f82e29179131cc5.jpg', 3, 'Rue Lou Sourel, 48400, VEBRON, Occitanie', 'Paris', '04 66 44 09 94', '1212', 'goldbutik@mynet.c0om', 'Frans', NULL, 'True', NULL, NULL, NULL, NULL),
(4, 17, 'Gîte la Licorne Voyageuse', 'Gîte la Licorne Voyageuse', 'Le Gîte la Licorne Voyageuse peut accueillir  6 adultes et 5 enfants. Cet ancien relais diligence entièrement rénové  est une invitation au voyage, chaque pièce est un pays, des recettes du monde entier sont affichées en cuisine, des carnets de voyages…ob', 'c0b189971b81db26a138658edde21b82.jpg', 4, 'Rue Lou Sourel, 48400, VEBRON, Occitanie (itinéraire)', 'Paris', '1241234', NULL, NULL, 'Frans', NULL, 'True', NULL, NULL, '<p>aaaaaaaaaaaaaaaa</p>\r\n\r\n<p><span style=\"font-size:20px\"><strong>asdasdasd</strong></span></p>\r\n\r\n<p><span style=\"background-color:#c0392b\">asdasdasdasdasd</span></p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>asdas</td>\r\n			<td>asdasd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>asd</td>\r\n			<td>asd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>asd</td>\r\n			<td>asd</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>', NULL),
(5, 16, 'Pyramide de l’Aigle', 'Pyramide de l’Aigle', 'a vue depuis le sommet est exceptionnelle, le ciel grandissime et noir, vous offre un spectacle étoilé éblouissant. Classé plus beau ciel étoilé du monde et labellisé depuis juillet 2018.  Un lit bien douillet, une décoration soignée, pour un lieu excepti', '074056090cd4b3752e5ca27d18d8e2f4.jpg', 5, 'Rue Lou Sourel, 48400, VEBRON, Occitanie (itinéraire)', 'Paris', '04 66 44 09 94', NULL, '04 66 44 09 94', 'Frans', NULL, 'True', NULL, NULL, '<pPyramide de l’Aiglel</p>', 1),
(6, 15, 'Cabane l’Ecureuil', 'Cabane l’Ecureuil', 'Cabane l’Ecureuil', '2a6a5b485d04d50f289bef0a910853e7.jpg', 4, 'Rue Lou Sourel, 48400, VEBRON, Occitanie', 'Paris', NULL, NULL, NULL, 'Frans', NULL, 'True', NULL, NULL, '<p><a dir=\"ltr\" href=\"https://www.google.com/url?sa=i&amp;source=images&amp;cd=&amp;ved=2ahUKEwiz-IzJ-armAhXQ2qQKHRGICXIQjhx6BAgBEAI&amp;url=https%3A%2F%2Fwww.tatilyum.net%2Fotel%2Fgonluferah-thermal-spa-hotel%2F&amp;psig=AOvVaw2Em2GYrA8wO5xndjEa_Ega&amp;ust=1576062754666460\" rel=\"noopener\" tabindex=\"0\" target=\"_blank\">G&ouml;nl&uuml;ferah Thermal &amp; Spa Hotel</a></p>\r\n\r\n<p>G&ouml;rseller telif hakkına tabi olabilir.&nbsp;<a href=\"https://support.google.com/legal/answer/3463239\" rel=\"noopener\" tabindex=\"0\" target=\"_blank\">Daha Fazla Bilgi</a></p>', 1),
(7, 15, 'Les cabanes du Moulin – Cabanes Spa', 'Les cabanes du Moulin – Cabanes Spa', 'Trois cabanes perchées dans les arbres  près de Paris, une halte étonnante avec des prestations tel que le jacuzzi perché sur des cabanes aux architectures exceptionnelles.', '8885a392bab9fbda9a0687b8285180c9.jpg', 3, '328 Route d\'Orly 77750 Orly-sur-Morin  Busserolles (77750)', 'Paris', '06 84 61 21 51', NULL, NULL, 'Frans', '328 Route d\'Orly 777', 'True', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hotel_id` int(11) DEFAULT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C53D045F3243BB18` (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `hotel_id`, `title`, `image`) VALUES
(19, 2, 'cabane', 'd2d717bb90eda116b143e188365e3957.jpg'),
(20, 2, 'La Cabane de la Rivière', 'aac4d2f800e42ca20d543b42e0c48f2d.jpg'),
(21, 1, 'La Cabane de la Rivière', '687f6c29d1a66003501ccc3d127c233e.jpg'),
(22, 1, 'La Cabane de la Rivière', 'bd7e252347728259b356f176bf995fd5.jpg'),
(23, 3, 'Cabane le Renard', '0f01528a2bd01166e0c2937fe1a1dbd2.jpg'),
(24, 3, 'Cabane le Renard', 'fe4a6349111e182374e162043342379d.jpg'),
(26, 5, 'Pyramide de l’Aigle', '6f09b195625c49895a6eb6f7e9efd85d.jpg'),
(29, 5, 'Pyramide de l’Aigle', 'ab35ae7870f14e8a0a12bef5f1c9e4a7.jpg'),
(30, 5, 'Pyramide de l’Aigle', 'e402cd2ae67ab60faeb1da5141b98053.jpg'),
(31, 4, 'Gîte la Licorne Voyageuse', '5ec13f998e4b2e188e0eb77dd4a7cc7a.jpg'),
(32, 4, 'Gîte la Licorne Voyageuse', 'cff28d0d55c3108f939a7f7b7353f439.jpg'),
(33, 6, 'Cabane l’Ecureuil', '42ece4f93a7a241ba489970c7911df69.jpg'),
(34, 6, 'Cabane l’Ecureuil', '977e2c7d8ab38f03b20b95c32bd98b73.jpg'),
(35, 7, 'Les cabanes du Moulin – Cabanes Spa', '1fc161e10d9d3c4106e88aeb56a82acc.jpg'),
(36, 7, 'Les cabanes du Moulin – Cabanes Spa', '100f8ed659bd0c80ea90126ccf976947.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `image_image`
--

DROP TABLE IF EXISTS `image_image`;
CREATE TABLE IF NOT EXISTS `image_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL,
  `roomid` int(11) DEFAULT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkin` datetime DEFAULT NULL,
  `checkout` datetime DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `userid`, `hotelid`, `roomid`, `name`, `surname`, `email`, `phone`, `checkin`, `checkout`, `days`, `total`, `ip`, `message`, `note`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 2, 4, 'Ayse', 'CAN', 'ayse@gmail.com', NULL, '2019-01-01 00:00:00', '2019-01-06 00:00:00', 1, 75, '127.0.0.1', NULL, NULL, 'New', '2019-12-25 16:33:34', '2019-12-25 16:33:33'),
(9, 1, 2, 5, 'Ayse', 'CAN', 'ayse@gmail.com', NULL, '2019-01-01 00:00:00', '2019-01-04 00:00:00', 3, 360, '127.0.0.1', NULL, NULL, 'New', '2019-12-25 16:44:32', '2019-12-25 16:44:32'),
(10, 1, 2, 5, 'Hoşbaht', 'Ahmedli', 'ayse@gmail.com', '123', '2019-01-01 00:00:00', '2019-01-04 00:00:00', 3, 360, '127.0.0.1', 'Hoş bir rezervasyon', NULL, 'New', '2019-12-25 16:46:36', '2019-12-25 16:46:36'),
(11, 1, 2, 4, 'Ayse', 'CAN', 'ayse@gmail.com', NULL, '2019-01-01 00:00:00', '1975-10-13 00:00:00', 3, 3, '127.0.0.1', NULL, NULL, 'New', '2019-12-26 22:04:09', '2019-12-26 22:04:09'),
(12, 1, 2, 4, 'Ayse', 'CAN', 'ayse@gmail.com', NULL, '2020-01-15 00:00:00', '2020-01-20 00:00:00', 5, 375, '127.0.0.1', NULL, NULL, 'New', '2019-12-26 22:43:43', '2019-12-26 22:43:43'),
(13, 1, 1, 1, 'Yüksel', 'ÇELİk', 'yuksel@gmail.com', '12345', '2020-01-10 00:00:00', '2020-01-13 00:00:00', 3, 300, '127.0.0.1', '3456', NULL, 'New', '2019-12-26 22:46:16', '2019-12-26 22:46:16'),
(14, 1, 2, 4, 'Cansu', 'CAN', 'cansu@gmail.com', '123456789', '2020-01-15 00:00:00', '2020-01-20 00:00:00', 5, 375, '127.0.0.1', 'Gece yarısı gelecem.', NULL, 'New', '2019-12-26 23:10:42', '2019-12-26 23:10:42'),
(15, 10, 2, 4, 'hajjajihajer', 'hajjajihajer20', 'hajjajihajer24@gmail.com', NULL, '2021-04-10 00:00:00', '2021-05-20 00:00:00', 40, 3000, '::1', 'please accept me', NULL, 'Accepted', '2021-03-11 19:35:31', NULL),
(16, 10, 1, 6, 'hajjajihajer', 'hajjajihajer20', 'hajjajihajer24@gmail.com', NULL, '2021-04-12 00:00:00', '2021-04-14 00:00:00', 2, 380, '::1', 'bonjour', NULL, 'New', '2021-03-11 21:39:45', NULL),
(17, 10, 1, 6, 'hajjajihajer', 'hajjajihajer20', 'hajjajihajer24@gmail.com', NULL, '2021-04-08 00:00:00', '2021-04-20 00:00:00', 12, 2280, '::1', NULL, NULL, 'New', '2021-03-12 10:47:59', NULL),
(18, 10, 6, 11, 'hajjajihajer', 'hajjajihajer20', 'hajjajihajer24@gmail.com', NULL, '2021-04-21 00:00:00', '2021-08-05 00:00:00', 106, 4240, '::1', 'goood', NULL, 'New', '2021-03-12 11:29:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotelid` int(11) DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `title`, `hotelid`, `description`, `image`, `price`, `status`, `number`) VALUES
(6, 'La Cabane de la Rivière', 1, 'La Cabane de la Rivière', '8f9e9f65234d56923266d5d0d2a02714.jpg', 190, 'True', 1),
(7, 'La Cabane', 2, 'La Cabane', '9fbfc48004c34a001005791defa6d5d3.jpg', 35, 'True', 1),
(8, 'Cabane le Renard', 3, 'Cabane le Renard', '85d93ea99feaf3e97380611d25ff0c7a.jpg', 70, 'True', 5),
(9, 'Gîte la Licorne Voyageuse', 4, 'Gîte la Licorne Voyageuse', '3b18c61daf18fe2cfa85be3432252242.jpg', 40, 'True', 10),
(10, 'Pyramide de l’Aigle', 5, 'Pyramide de l’Aigle', '0c596b05797c11f0d492598c80589b4e.jpg', 101, 'True', 2),
(11, 'Cabane l’Ecureuil', 6, 'Cabane l’Ecureuil', '6ad4c00393906f0a6f5674802cb1eb38.jpg', 40, 'True', 4),
(12, 'Les cabanes du Moulin – Cabanes Spa', 7, 'Les cabanes du Moulin – Cabanes Spa', '07bd79d592b29d7cf1e783787774628d.jpg', 70, 'True', 5);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `smtpserver` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtpemail` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtppassword` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtpport` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(75) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aboutus` longtext COLLATE utf8mb4_unicode_ci,
  `contact` longtext COLLATE utf8mb4_unicode_ci,
  `reference` longtext COLLATE utf8mb4_unicode_ci,
  `status` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `keywords`, `description`, `company`, `address`, `phone`, `fax`, `email`, `smtpserver`, `smtpemail`, `smtppassword`, `smtpport`, `facebook`, `instagram`, `twitter`, `aboutus`, `contact`, `reference`, `status`) VALUES
(1, 'Agence de voyage AtypikHouse', 'voyage Cabane Habitat', 'Meilleure agence de voyage du monde. Hôtels les moins chers, solutions de vacances', 'AtpikHouse', 'France', '2432134234', '234234234', 'info@travelall.com', 'gmail', 'karabuktest@gmail.com', 'Marabalar2019*', '578', 'https://www.facebook.com/krbkuni', 'https://www.instagram.com/karabukuniv/', 'https://twitter.com/krbkuni', '<ul>\r\n<li>\r\n<div class = \"taitle\" style = \"margin-bottom: 30px\"> <span style = \"color: # d35400\"> <strong> <span style = \"font-size: 24px\"> Chaque individu mérite un site Web </ span> </strong> </span> </div>\r\n\r\n<p> <span style = \"font-size: 16px\"> <span style = \"color: # 000000\"> Nous pensons que chaque individu devrait avoir le pouvoir de créer son propre site Web ou boutique en ligne. Si vous pouvez pointer et cliquer, vous pouvez créer un site Web professionnel ou une boutique en ligne à l\'aide de nos outils gratuits et intuitifs. </span> </span> </p>\r\n</li>\r\n<li>\r\n<div class = \"title\" style = \"margin-bottom: 30px\"> <span style = \"color: # e67e22\"> <span style = \"font-size: 24px\"> Nos clients signifient le monde </span> < / span> </div>\r\n\r\n<p> <span style = \"font-size: 16px\"> <span style = \"color: # 000000\"> Chez Website.com, nous nous efforçons de fournir exactement ce que nos clients recherchent. Une grande partie de notre processus de brainstorming consiste à examiner les commentaires de nos clients pour nous assurer que vous êtes bien pris en charge. </span> </span> </p>\r\n</li>\r\n<li>\r\n<div class = \"title\" style = \"margin-bottom: 30px\"> <span style = \"color: # d35400\"> <u> <strong> <span style = \"font-size: 24px\"> Fabriqué en interne </span></ensus</u></span> </div>\r\n\r\n<p> <span style = \"font-size: 16px\"> <span style = \"color: # 000000\"> Nous nous engageons personnellement à offrir le meilleur. Tout, du support client à la conception et au développement de produits, est fourni par notre équipe dévouée (et adorable) dans la magnifique Colombie-Britannique, au Canada. </span> </span> </p>\r\n</li>\r\n</ul>', '<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><strong>Adres</strong></td>\r\n			<td>France<br />\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Telefon</strong></td>\r\n			<td><a href=\"tel:4440478\">444 0 478</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>E-mail</strong></td>\r\n			<td><a href=\"mailto:iletisim@karabuk.edu.tr\">iletisim@atypikHouse.edu.fr</a></td>\r\n		</tr>\r\n		<tr>\r\n			<td><strong>Web</strong></td>\r\n			<td>www.AtypikHouse.edu.fr</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p><iframe frameborder=\"0\" height=\"450\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3001.2550114756!2d32.64944681495948!3d41.21621291455287!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x408354ac4492953f%3A0xab3b48ed0392a743!2sKarab%C3%BCk+%C3%9Cniversitesi!5e0!3m2!1str!2str!4v1471528432043\" width=\"100%\"></iframe></p>\r\n\r\n<p>&nbsp;<strong>Ali & Salma</strong>&nbsp;9.10.2017 / 09:54</p>', '<ul>\r\n<li>\r\n<h1> Akım Metal </h1>\r\n\r\n<p> 40 yılı aşkın işleme tecr & uuml; besine sahip Akım Metal, Tuzla & ndash; İstanbul & rsquo; daki işletmesinde beyaz eşya, otomotiv, end & uuml; striyel motor, havacılık veilemine sanayml par cıtılırışılışırışırışırışılış 2011 yılı itibariyle yeni bir & uuml; r & uuml; n & uuml; retmek, pazarda farklılaşmak ... </p>\r\n<a href=\"http://www.a-group.com.tr/en/grup_sirketleri/akim-metal-1\"> suite </a> </li>\r\n<li>\r\n<p> <img src = \"http://www.a-group.com.tr/media/images/akplas-gorsel.jpg\" /> </p>\r\n\r\n<h1> Akplas </h1>\r\n\r\n<p> Akplas & nbsp; a été fondée à Istanbul en 1989, pour la production de moulage par injection plastique. Déménagement plus tard à son site de Gebze en 1996, alors que la société développait son approche des systèmes qualité, ses investissements technologiques et sa R ​​& amp; D études. Dans les années à venir, sérigraphie sérigraphique, peinture plastique humide, soufflage et chaleur ... </p>\r\n<a href=\"http://www.a-group.com.tr/en/grup_sirketleri/akplas-2\"> suite </a> </li>\r\n<li>\r\n<p> <img src = \"http://www.a-group.com.tr/media/images/aksem-gorsel.jpg\" /> </p>\r\n\r\n<h1> Aksem Kalıp </h1>\r\n\r\n<p> Notre société sœur, AtypikHouse travaille depuis longtemps dans le secteur des plastiques au service des produits blancs, des appareils électroménagers et des industries automobiles et a créé une division d\'outillage pour élargir la satisfaction de la clientèle en 1997. Cette division est devenue plus grande, s\'est développée en peu de temps et s\'est établie en tant que société sœur d\'AKPLAS avec ... </p>\r\n<a href=\"http://www.a-group.com.tr/en/grup_sirketleri/aksem-kalip-3\"> suite </a> </li>\r\n<li>\r\n<p> <img src = \"http://www.a-group.com.tr/media/images/ymb-gorsel_1.jpg\" /> </p>\r\n\r\n<h1> Ymb </h1>\r\n\r\n<p> YMB Teknolojik & Uuml; r & uuml; nler Pazarlama şirketi, A GRUP B & uuml; nyesindeki & ouml; zg & uuml; n & uuml; r & uuml; nlerin satışı, pazarlanması ve & ccedum; ularin u rlasit & uuml; nlerin satışı, pazarlanması ve & ccedum; ularus u rlasit & ccedil; ul faaliyetlerini s & uuml; rd & uuml; rmek amacıyla 2013 yılında kurulmuştur. YMB, & uuml; lkemize ve sanayi sekt & ouml; rlerine .. </p>\r\n</li>\r\n</ul>', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `name`, `surname`, `image`, `status`, `created_at`, `updated_at`) VALUES
(10, 'hajjajihajer24@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$NUJ4WlhsSnhQSk1uZ0p3bA$YWOXzggV4b7zqFctoqpf2WZ4/gMJXyJIEzEMONBFPC0', 'hajjajihajer', 'hajjajihajer20', 'd29a0e7948dd1860a7b8b186ac303105.jpg', 'True', NULL, NULL),
(11, 'hajjajihajer@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$bTUuUFFSTFJRU1c4b1RHMA$E67qiO5wcVl1pP2aBt8sCCpIOgN2JPV0u+B7P6wY4gU', 'hajjajihajer20', NULL, NULL, 'True', NULL, NULL),
(12, 'hajjaji@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$Tm1HODBQTktqWWtOWlN2eg$ejL9iUjC58awp53nAZyKQ++DIfMlKSMjWmlEWnNUVgY', 'hajjajihajer', 'hajer20', NULL, 'True', NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotel`
--
ALTER TABLE `hotel`
  ADD CONSTRAINT `FK_3535ED912469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `FK_C53D045F3243BB18` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
