# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.40)
# Database: rush01
# Generation Time: 2015-04-16 15:43:22 +0000
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



# Dump of table games
# ------------------------------------------------------------

DROP TABLE IF EXISTS `games`;

CREATE TABLE `games` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `gameId` int(12) DEFAULT NULL,
  `timestamp` int(12) DEFAULT NULL,
  `winnerId` int(12) DEFAULT NULL,
  `state` int(12) NOT NULL DEFAULT '0',
  `playerTurn` int(12) DEFAULT NULL,
  `mapId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

LOCK TABLES `shipsmodel` WRITE;
/*!40000 ALTER TABLE `shipsmodel` DISABLE KEYS */;

INSERT INTO `shipsmodel` (`id`, `name`, `width`, `height`, `sprite`, `defaultPp`, `defaultHull`, `defaultShield`, `inertia`, `speed`, `category`)
VALUES
	(1,'Honorable Duty',1,4,NULL,10,5,0,4,15,'Fregate Imperiale'),
	(2,'Sword of Absolution',1,3,NULL,10,4,0,3,18,'Destroyer Imperial'),
	(3,'Hand Of The Emperor',1,4,NULL,10,5,0,4,15,'Fregate Imperial'),
	(4,'Imperator Deus',2,7,NULL,12,8,2,5,10,'Cuirasse Imperial'),
	(5,'Orktobre Roug',1,2,NULL,10,4,0,3,19,'Vesso d\'attak Ravajeur Ork'),
	(6,'Ork\'N\'Roll',1,5,NULL,10,6,0,4,12,'Vesso d\'attak Explozeur Ork');

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
  `posX` int(12) DEFAULT NULL,
  `posY` int(12) DEFAULT NULL,
  `charge` int(12) DEFAULT '0',
  `orientation` int(12) DEFAULT NULL,
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
  `state` int(12) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

LOCK TABLES `weaponsmodel` WRITE;
/*!40000 ALTER TABLE `weaponsmodel` DISABLE KEYS */;

INSERT INTO `weaponsmodel` (`id`, `name`, `shortRange`, `mediumRange`, `longRange`, `defaultCharge`, `dispersion`, `width`, `state`)
VALUES
	(1,'Batterie laser de flancs',10,20,30,0,1,2,0),
	(2,'Lance navale',30,60,90,0,0,1,0),
	(3,'Lance navale lourde',30,60,90,3,0,3,1),
	(4,'Mitrailleuses super lourdes de proximite',3,7,10,5,5,1,0),
	(5,'Macro canon',10,20,30,0,3,2,0);

/*!40000 ALTER TABLE `weaponsmodel` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table weaponsshipsrelations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weaponsshipsrelations`;

CREATE TABLE `weaponsshipsrelations` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `weaponId` int(11) DEFAULT NULL,
  `shipId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

LOCK TABLES `weaponsshipsrelations` WRITE;
/*!40000 ALTER TABLE `weaponsshipsrelations` DISABLE KEYS */;

INSERT INTO `weaponsshipsrelations` (`id`, `weaponId`, `shipId`)
VALUES
	(1,1,1),
	(2,1,2),
	(3,2,3),
	(4,2,4),
	(5,2,4),
	(6,1,5),
	(7,4,6),
	(8,5,6);

/*!40000 ALTER TABLE `weaponsshipsrelations` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
