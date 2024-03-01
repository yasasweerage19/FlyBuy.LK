-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Data exporting was unselected.

-- Data exporting was unselected.

-- Data exporting was unselected.

-- Data exporting was unselected.

-- Data exporting was unselected.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;

CREATE TABLE `category` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`categoryName` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`img` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `feedback` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`userID` INT(11) NULL DEFAULT NULL,
	`ProductID` INT(11) NULL DEFAULT NULL,
	`stars` INT(11) NULL DEFAULT NULL,
	`description` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `item` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`itemName` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`qty` INT(11) NULL DEFAULT NULL,
	`img` VARCHAR(50) NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`price` FLOAT NULL DEFAULT NULL,
	`description` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`addDate` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`category` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `order` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`itemID` INT(11) NOT NULL DEFAULT '0',
	`userId` INT(11) NOT NULL DEFAULT '0',
	`qty` INT(11) NOT NULL DEFAULT '0',
	`price` INT(11) NOT NULL DEFAULT '0',
	`status` VARCHAR(50) NULL DEFAULT 'pending' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

CREATE TABLE `user` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`fullName` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`email` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`address` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`type` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`propic` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`password` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`tel` INT(10) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=InnoDB
AUTO_INCREMENT=1
;

