# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.40)
# Database: rush01
# Generation Time: 2015-04-19 13:08:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table elements
# ------------------------------------------------------------

DROP TABLE IF EXISTS `elements`;

CREATE TABLE `elements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(128) DEFAULT NULL,
  `x` int(12) DEFAULT NULL,
  `y` int(12) DEFAULT NULL,
  `width` int(12) DEFAULT NULL,
  `height` int(12) DEFAULT NULL,
  `mapId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `elements` WRITE;
/*!40000 ALTER TABLE `elements` DISABLE KEYS */;

INSERT INTO `elements` (`id`, `type`, `x`, `y`, `width`, `height`, `mapId`)
VALUES
	(1,'3',9,99,20,40,2),
	(2,'3',12,73,20,20,2),
	(3,'3',17,95,20,40,2),
	(4,'3',34,58,40,10,2),
	(5,'3',40,98,10,30,2),
	(6,'3',43,93,40,30,2),
	(7,'3',44,64,20,30,2),
	(8,'3',53,55,10,30,2),
	(9,'3',56,99,40,10,2),
	(10,'3',61,87,30,20,2),
	(11,'3',69,15,30,40,2),
	(12,'3',77,36,40,40,2),
	(13,'3',87,64,30,20,2),
	(14,'3',89,2,30,10,2),
	(15,'3',98,82,20,10,2),
	(16,'3',99,63,40,20,2),
	(17,'3',105,44,20,20,2),
	(18,'3',122,37,20,30,2),
	(19,'3',123,11,40,30,2),
	(20,'3',130,3,10,10,2),
	(21,'3',146,25,30,10,2),
	(22,'3',146,51,30,40,2),
	(23,'3',14,56,40,10,NULL),
	(24,'3',27,45,10,30,NULL),
	(25,'3',33,26,30,30,NULL),
	(26,'3',38,44,20,20,NULL),
	(27,'3',45,95,30,40,NULL),
	(28,'3',53,74,40,30,NULL),
	(29,'3',55,93,10,20,NULL),
	(30,'3',56,82,20,20,NULL),
	(31,'3',57,59,40,20,NULL),
	(32,'3',57,65,30,30,NULL),
	(33,'3',73,69,40,10,NULL),
	(34,'3',84,79,30,30,NULL),
	(35,'3',90,65,40,40,NULL),
	(36,'3',92,80,20,40,NULL),
	(37,'3',98,13,10,20,NULL),
	(38,'3',102,34,10,10,NULL),
	(39,'3',106,82,20,10,NULL),
	(40,'3',106,87,30,10,NULL),
	(41,'3',107,22,30,20,NULL),
	(42,'3',107,25,40,10,NULL),
	(43,'3',107,68,20,40,NULL),
	(44,'3',111,86,20,30,NULL),
	(45,'3',117,69,20,40,NULL),
	(46,'3',120,21,10,40,NULL),
	(47,'3',120,52,40,20,NULL),
	(48,'3',121,34,30,10,NULL),
	(49,'3',124,49,40,30,NULL),
	(50,'3',141,44,30,10,NULL),
	(51,'3',145,59,10,40,NULL),
	(52,'3',1,78,10,20,34),
	(53,'3',1,86,10,30,34),
	(54,'3',9,99,20,20,34),
	(55,'3',19,83,30,20,34),
	(56,'3',19,92,40,30,34),
	(57,'3',25,79,40,20,34),
	(58,'3',25,96,10,30,34),
	(59,'3',26,33,20,10,34),
	(60,'3',26,75,20,30,34),
	(61,'3',28,50,10,10,34),
	(62,'3',41,25,20,40,34),
	(63,'3',66,67,40,40,34),
	(64,'3',73,64,40,40,34),
	(65,'3',73,78,30,40,34),
	(66,'3',75,69,10,10,34),
	(67,'3',78,19,30,10,34),
	(68,'3',85,68,10,30,34),
	(69,'3',87,86,40,20,34),
	(70,'3',90,49,30,20,34),
	(71,'3',91,42,40,10,34),
	(72,'3',95,51,20,40,34),
	(73,'3',103,89,10,20,34),
	(74,'3',112,86,20,20,34),
	(75,'3',115,97,30,20,34),
	(76,'3',136,64,20,30,34);

/*!40000 ALTER TABLE `elements` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gameId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `data` int(11) DEFAULT NULL,
  `timestamp` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table games
# ------------------------------------------------------------

DROP TABLE IF EXISTS `games`;

CREATE TABLE `games` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) DEFAULT NULL,
  `winnerId` int(12) DEFAULT NULL,
  `state` int(12) NOT NULL DEFAULT '0',
  `playerTurn` int(12) DEFAULT NULL,
  `mapId` int(11) DEFAULT NULL,
  `bigTurn` int(11) DEFAULT NULL,
  `smallTurn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;

INSERT INTO `games` (`id`, `timestamp`, `winnerId`, `state`, `playerTurn`, `mapId`, `bigTurn`, `smallTurn`)
VALUES
	(1,NULL,0,0,0,31,0,0),
	(2,NULL,0,0,0,32,0,0),
	(3,NULL,0,0,0,33,0,0),
	(4,NULL,0,0,0,34,0,0);

/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table maps
# ------------------------------------------------------------

DROP TABLE IF EXISTS `maps`;

CREATE TABLE `maps` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `width` int(12) DEFAULT NULL,
  `height` int(12) DEFAULT NULL,
  `state` int(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `maps` WRITE;
/*!40000 ALTER TABLE `maps` DISABLE KEYS */;

INSERT INTO `maps` (`id`, `width`, `height`, `state`)
VALUES
	(1,150,100,0),
	(2,150,100,0),
	(3,150,100,0),
	(4,150,100,0),
	(5,150,100,0),
	(6,150,100,0),
	(7,150,100,0),
	(8,150,100,0),
	(9,150,100,0),
	(10,150,100,0),
	(11,150,100,0),
	(12,150,100,0),
	(13,150,100,0),
	(14,150,100,0),
	(15,150,100,0),
	(16,150,100,0),
	(17,150,100,0),
	(18,150,100,0),
	(19,150,100,0),
	(20,150,100,0),
	(21,150,100,0),
	(22,150,100,0),
	(23,150,100,0),
	(24,150,100,0),
	(25,150,100,0),
	(26,150,100,0),
	(27,150,100,0),
	(28,150,100,0),
	(29,150,100,0),
	(30,150,100,0),
	(31,150,100,0),
	(32,150,100,0),
	(33,150,100,0),
	(34,150,100,0);

/*!40000 ALTER TABLE `maps` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table players
# ------------------------------------------------------------

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(12) DEFAULT NULL,
  `gameId` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table savings
# ------------------------------------------------------------

DROP TABLE IF EXISTS `savings`;

CREATE TABLE `savings` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` int(12) DEFAULT NULL,
  `userId` int(12) DEFAULT NULL,
  `gameId` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ships
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ships`;

CREATE TABLE `ships` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idShipsModel` int(11) DEFAULT NULL,
  `playerID` int(11) DEFAULT NULL,
  `posX` int(11) DEFAULT NULL,
  `posY` int(11) DEFAULT NULL,
  `orientation` int(11) DEFAULT NULL,
  `moving` int(11) DEFAULT NULL,
  `pp` int(11) DEFAULT '0',
  `hull` int(11) DEFAULT '0',
  `shield` int(11) DEFAULT '0',
  `state` int(11) DEFAULT '1',
  `speed` int(11) DEFAULT NULL,
  `bigTurn` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table shipsmodel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `shipsmodel`;

CREATE TABLE `shipsmodel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(512) DEFAULT NULL,
  `width` int(12) DEFAULT NULL,
  `height` int(12) DEFAULT NULL,
  `sprite` varchar(512) DEFAULT NULL,
  `defaultPp` int(12) DEFAULT '0',
  `defaultHull` int(12) DEFAULT '0',
  `defaultShield` int(12) DEFAULT '0',
  `inertia` int(12) DEFAULT '0',
  `speed` int(12) DEFAULT '0',
  `category` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `shipsmodel` WRITE;
/*!40000 ALTER TABLE `shipsmodel` DISABLE KEYS */;

INSERT INTO `shipsmodel` (`id`, `name`, `width`, `height`, `sprite`, `defaultPp`, `defaultHull`, `defaultShield`, `inertia`, `speed`, `category`)
VALUES
	(1,'Honorable Duty',1,4,'a',10,5,0,4,15,'Fregate Imperiale'),
	(2,'Sword of Absolution',1,3,'b',10,4,0,3,18,'Destroyer Imperial'),
	(3,'Hand Of The Emperor',1,4,'c',10,5,0,4,15,'Fregate Imperial'),
	(4,'Imperator Deus',2,7,'d',12,8,2,5,10,'Cuirasse Imperial'),
	(5,'Orktobre Roug',1,2,'e',10,4,0,3,19,'Vesso d\'attak Ravajeur Ork'),
	(6,'Ork\'N\'Roll',1,5,'f',10,6,0,4,12,'Vesso d\'attak Explozeur Ork');

/*!40000 ALTER TABLE `shipsmodel` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(128) DEFAULT NULL,
  `password` varchar(512) DEFAULT NULL,
  `timestamp` int(12) DEFAULT NULL,
  `gameWon` int(12) DEFAULT NULL,
  `gameLost` int(12) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table weapons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weapons`;

CREATE TABLE `weapons` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idWeaponsModel` int(11) DEFAULT NULL,
  `charge` int(12) DEFAULT '0',
  `shipId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table weaponsmodel
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weaponsmodel`;

CREATE TABLE `weaponsmodel` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(528) DEFAULT NULL,
  `shortRange` int(12) DEFAULT '0',
  `mediumRange` int(12) DEFAULT '0',
  `longRange` int(12) DEFAULT '0',
  `defaultCharge` int(12) DEFAULT '0',
  `dispersion` int(12) DEFAULT '0',
  `width` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weaponsmodel` WRITE;
/*!40000 ALTER TABLE `weaponsmodel` DISABLE KEYS */;

INSERT INTO `weaponsmodel` (`id`, `name`, `shortRange`, `mediumRange`, `longRange`, `defaultCharge`, `dispersion`, `width`)
VALUES
	(1,'Batterie laser de flancs',10,20,30,0,1,2),
	(2,'Lance navale',30,60,90,0,0,1),
	(3,'Lance navale lourde',30,60,90,3,0,3),
	(4,'Mitrailleuses super lourdes de proximite',3,7,10,5,5,1),
	(5,'Macro canon',10,20,30,0,3,2);

/*!40000 ALTER TABLE `weaponsmodel` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table weaponsshipsrelations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weaponsshipsrelations`;

CREATE TABLE `weaponsshipsrelations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `weaponId` int(11) DEFAULT NULL,
  `shipId` int(11) DEFAULT NULL,
  `posX` int(11) DEFAULT NULL,
  `posY` int(11) DEFAULT NULL,
  `orientation` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `weaponsshipsrelations` WRITE;
/*!40000 ALTER TABLE `weaponsshipsrelations` DISABLE KEYS */;

INSERT INTO `weaponsshipsrelations` (`id`, `weaponId`, `shipId`, `posX`, `posY`, `orientation`)
VALUES
	(1,1,1,NULL,NULL,NULL),
	(2,1,2,NULL,NULL,NULL),
	(3,2,3,NULL,NULL,NULL),
	(4,2,4,NULL,NULL,NULL),
	(5,2,4,NULL,NULL,NULL),
	(6,1,5,NULL,NULL,NULL),
	(7,4,6,NULL,NULL,NULL),
	(8,5,6,NULL,NULL,NULL);

/*!40000 ALTER TABLE `weaponsshipsrelations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
