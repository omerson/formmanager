-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.17 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             8.3.0.4694
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for formmanager_db
DROP DATABASE IF EXISTS `formmanager_db`;
CREATE DATABASE IF NOT EXISTS `formmanager_db` /*!40100 DEFAULT CHARACTER SET latin2 */;
USE `formmanager_db`;


-- Dumping structure for table formmanager_db.fields
DROP TABLE IF EXISTS `fields`;
CREATE TABLE IF NOT EXISTS `fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form` int(11) NOT NULL,
  `namelabel` varchar(50) NOT NULL,
  `value` varchar(50) DEFAULT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `FK_fields_forms` (`form`),
  KEY `FK_fields_fieldtypes` (`type`),
  CONSTRAINT `FK_fields_fieldtypes` FOREIGN KEY (`type`) REFERENCES `fieldtypes` (`id`),
  CONSTRAINT `FK_fields_forms` FOREIGN KEY (`form`) REFERENCES `forms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=383 DEFAULT CHARSET=latin2;

-- Dumping data for table formmanager_db.fields: ~1 rows (approximately)
DELETE FROM `fields`;
/*!40000 ALTER TABLE `fields` DISABLE KEYS */;
/*!40000 ALTER TABLE `fields` ENABLE KEYS */;


-- Dumping structure for table formmanager_db.fieldtypes
DROP TABLE IF EXISTS `fieldtypes`;
CREATE TABLE IF NOT EXISTS `fieldtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `datatype` varchar(50) NOT NULL,
  `ismultivalue` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin2;

-- Dumping data for table formmanager_db.fieldtypes: ~5 rows (approximately)
DELETE FROM `fieldtypes`;
/*!40000 ALTER TABLE `fieldtypes` DISABLE KEYS */;
INSERT INTO `fieldtypes` (`id`, `name`, `datatype`, `ismultivalue`) VALUES
	(1, 'textbox', 'varchar', b'0'),
	(2, 'textarea', 'text', b'0'),
	(3, 'select', 'varchar', b'1'),
	(4, 'checkbox', 'boolean', b'0'),
	(5, 'radio', 'varchar', b'1');
/*!40000 ALTER TABLE `fieldtypes` ENABLE KEYS */;


-- Dumping structure for table formmanager_db.forms
DROP TABLE IF EXISTS `forms`;
CREATE TABLE IF NOT EXISTS `forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `creationdate` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin2;

-- Dumping data for table formmanager_db.forms: ~1 rows (approximately)
DELETE FROM `forms`;
/*!40000 ALTER TABLE `forms` DISABLE KEYS */;
/*!40000 ALTER TABLE `forms` ENABLE KEYS */;


-- Dumping structure for table formmanager_db.multifields
DROP TABLE IF EXISTS `multifields`;
CREATE TABLE IF NOT EXISTS `multifields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `field` int(11) NOT NULL DEFAULT '0',
  `optionlabel` varchar(50) NOT NULL DEFAULT '0',
  `selected` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `FK_multifields_fields` (`field`),
  CONSTRAINT `FK_multifields_fields` FOREIGN KEY (`field`) REFERENCES `fields` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=826 DEFAULT CHARSET=latin2;

-- Dumping data for table formmanager_db.multifields: ~1 rows (approximately)
DELETE FROM `multifields`;
/*!40000 ALTER TABLE `multifields` DISABLE KEYS */;
/*!40000 ALTER TABLE `multifields` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
