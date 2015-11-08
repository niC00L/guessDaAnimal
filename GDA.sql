-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.2.0.4947
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for gda
CREATE DATABASE IF NOT EXISTS `gda` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `gda`;


-- Dumping structure for table gda.animals
CREATE TABLE IF NOT EXISTS `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `svk_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eng_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_black` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gda.animals: ~9 rows (approximately)
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` (`id`, `svk_name`, `eng_name`, `img`, `img_black`, `category`) VALUES
	(1, 'Bizón', 'Bison', 'bison.jpg', 'bison.jpg', NULL),
	(2, 'Hroch', 'Hippopotamus', 'hippo.jpg', 'hippo.jpg', NULL),
	(3, 'Veverička', 'Squirrel', 'squirrel.jpg', 'squirrel.jpg', NULL),
	(4, 'Slon', 'Elephant', 'elephant.jpg', 'elephant.jpg', NULL),
	(5, 'Žirafa', 'Giraffee', 'giraffee.jpg', 'giraffee.jpg', NULL),
	(6, 'Gepard', 'Cheetah', 'cheetah.jpg', 'cheetah.jpg', NULL),
	(7, 'Šimpanz', 'Chimpanzee', 'chimpanzee.jpg', 'chimpanzee.jpg', NULL),
	(8, 'Jeleň', 'Deer', 'deer.jpg', 'deer.jpg', NULL),
	(9, 'Líška', 'Fox', 'fox.jpg', 'fox.jpg', NULL);
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;


-- Dumping structure for table gda.answers
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `correct_ans` int(11) DEFAULT NULL,
  `wrong_ans` int(11) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table gda.answers: ~2 rows (approximately)
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `name`, `correct_ans`, `wrong_ans`, `time`, `date`) VALUES
	(6, 'ja', 1, 2, '00:00:03', NULL),
	(7, 'srnka', 0, 11, '00:00:05', '2015-11-08 19:36:03');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
