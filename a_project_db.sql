-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2024 at 02:33 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom_category`, `uid`) VALUES
(3, 'Catégorie 3', '65a3a6751b8da'),
(4, 'catégorie 1', '65a50440af43e'),
(5, 'Catégorie 2', '65a50447e1282'),
(6, 'catégorie 4', '65a5044fcfec3'),
(7, 'Catégorie 5', '65a50461b8e4b'),
(8, 'categorie 6', '65a5b0f59695d');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `nom_contact`, `prenom_contact`, `email`, `tel`) VALUES
(1, 'Adeossi', 'Adeola', 'adeossi@gmail.com', '0773245234'),
(2, 'Aline Funmi', 'N\'DEKO', 'alinendeko30@gmail.com', '0773245234'),
(3, 'FOFO', 'Emile', 'fofo@gmail.com', '0774523644'),
(4, 'Aline F', 'Alina', 'alinendeko30@gmail.com', '066542343'),
(5, 'Ade', 'BABA', 'adebaba@gmail.com', '985552091');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE IF NOT EXISTS `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20240112122357', '2024-01-12 12:24:45', 412),
('DoctrineMigrations\\Version20240114090926', '2024-01-14 09:09:52', 13),
('DoctrineMigrations\\Version20240114091804', '2024-01-14 09:18:10', 12),
('DoctrineMigrations\\Version20240114092718', '2024-01-14 09:27:23', 13),
('DoctrineMigrations\\Version20240114092911', '2024-01-14 09:29:14', 12),
('DoctrineMigrations\\Version20240114093056', '2024-01-14 09:31:07', 37),
('DoctrineMigrations\\Version20240114225343', '2024-01-14 22:53:54', 17);

-- --------------------------------------------------------

--
-- Table structure for table `educateurs`
--

DROP TABLE IF EXISTS `educateurs`;
CREATE TABLE IF NOT EXISTS `educateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `licencier_id` int(11) DEFAULT NULL,
  `email_educateur` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `est_admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_CE18B2EE81002A8` (`licencier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `educateurs`
--

INSERT INTO `educateurs` (`id`, `licencier_id`, `email_educateur`, `mdp`, `est_admin`) VALUES
(1, 2, 'fomonlayo@gmail.com', 'Funmi@', 1),
(3, 1, 'ade@gmail.com', 'Aeeeee', 0),
(4, 4, 'fafaadmin@gmail.com', 'Azerty12345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `licenciers`
--

DROP TABLE IF EXISTS `licenciers`;
CREATE TABLE IF NOT EXISTS `licenciers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `nom_licencier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom_licencier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_licencier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_6F20966A526E8E58` (`contact_id_id`),
  KEY `IDX_6F20966A12469DE2` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licenciers`
--

INSERT INTO `licenciers` (`id`, `contact_id_id`, `category_id`, `nom_licencier`, `prenom_licencier`, `numero_licencier`) VALUES
(1, 1, 3, 'N\'DEKO', 'Aline', '65a3ac6a2856c'),
(2, 2, 3, 'JINADU', 'Adeola', '65a4024d8e9ac'),
(4, 5, 7, 'FAFA', 'FOFO', '65a5b15df4153');

-- --------------------------------------------------------

--
-- Table structure for table `mails_educateurs`
--

DROP TABLE IF EXISTS `mails_educateurs`;
CREATE TABLE IF NOT EXISTS `mails_educateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `educateurs_id` int(11) DEFAULT NULL,
  `date_denvoi` datetime NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_4B7A932A26C38` (`educateurs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails_educateurs`
--

INSERT INTO `mails_educateurs` (`id`, `educateurs_id`, `date_denvoi`, `objet`, `message`) VALUES
(1, NULL, '2024-01-12 00:00:00', 'Envoi', '<div>je vous envoie un mail pour une notification</div>'),
(2, NULL, '2024-01-16 00:00:00', 'DELEGUEMENT DES TACHES', '<div>Je vous contact dans le but de vous deleguer les tâches de collecte d\'information sur le terrain désormais&nbsp;<br><br>Cordialement&nbsp;</div>');

-- --------------------------------------------------------

--
-- Table structure for table `mails_educateurs_educateurs`
--

DROP TABLE IF EXISTS `mails_educateurs_educateurs`;
CREATE TABLE IF NOT EXISTS `mails_educateurs_educateurs` (
  `mails_educateurs_id` int(11) NOT NULL,
  `educateurs_id` int(11) NOT NULL,
  PRIMARY KEY (`mails_educateurs_id`,`educateurs_id`),
  KEY `IDX_205732FE6B6ED545` (`mails_educateurs_id`),
  KEY `IDX_205732FEA26C38` (`educateurs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mails_educateurs_educateurs`
--

INSERT INTO `mails_educateurs_educateurs` (`mails_educateurs_id`, `educateurs_id`) VALUES
(1, 1),
(2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `mail_contacts`
--

DROP TABLE IF EXISTS `mail_contacts`;
CREATE TABLE IF NOT EXISTS `mail_contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_denvoi` datetime NOT NULL,
  `objet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_contacts`
--

INSERT INTO `mail_contacts` (`id`, `date_denvoi`, `objet`, `message`) VALUES
(1, '2024-01-12 00:00:00', 'damande', '<div>je viens vous notifier</div>');

-- --------------------------------------------------------

--
-- Table structure for table `mail_contacts_licenciers`
--

DROP TABLE IF EXISTS `mail_contacts_licenciers`;
CREATE TABLE IF NOT EXISTS `mail_contacts_licenciers` (
  `mail_contacts_id` int(11) NOT NULL,
  `licenciers_id` int(11) NOT NULL,
  PRIMARY KEY (`mail_contacts_id`,`licenciers_id`),
  KEY `IDX_69749DDDC540C953` (`mail_contacts_id`),
  KEY `IDX_69749DDD3F7486FD` (`licenciers_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail_contacts_licenciers`
--

INSERT INTO `mail_contacts_licenciers` (`mail_contacts_id`, `licenciers_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `educateurs`
--
ALTER TABLE `educateurs`
  ADD CONSTRAINT `FK_CE18B2EE81002A8` FOREIGN KEY (`licencier_id`) REFERENCES `licenciers` (`id`);

--
-- Constraints for table `licenciers`
--
ALTER TABLE `licenciers`
  ADD CONSTRAINT `FK_6F20966A12469DE2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `FK_6F20966A526E8E58` FOREIGN KEY (`contact_id_id`) REFERENCES `contacts` (`id`);

--
-- Constraints for table `mails_educateurs`
--
ALTER TABLE `mails_educateurs`
  ADD CONSTRAINT `FK_4B7A932A26C38` FOREIGN KEY (`educateurs_id`) REFERENCES `educateurs` (`id`);

--
-- Constraints for table `mails_educateurs_educateurs`
--
ALTER TABLE `mails_educateurs_educateurs`
  ADD CONSTRAINT `FK_205732FE6B6ED545` FOREIGN KEY (`mails_educateurs_id`) REFERENCES `mails_educateurs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_205732FEA26C38` FOREIGN KEY (`educateurs_id`) REFERENCES `educateurs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mail_contacts_licenciers`
--
ALTER TABLE `mail_contacts_licenciers`
  ADD CONSTRAINT `FK_69749DDD3F7486FD` FOREIGN KEY (`licenciers_id`) REFERENCES `licenciers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_69749DDDC540C953` FOREIGN KEY (`mail_contacts_id`) REFERENCES `mail_contacts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
