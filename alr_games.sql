# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.41)
# Database: alr_games
# Generation Time: 2023-02-06 13:37:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table games
# ------------------------------------------------------------

DROP TABLE IF EXISTS `games`;

CREATE TABLE `games` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `year` year(4) NOT NULL,
  `developers` varchar(255) NOT NULL DEFAULT '',
  `imdb_rating` float unsigned NOT NULL,
  `image` varchar(600) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;

INSERT INTO `games` (`id`, `name`, `year`, `developers`, `imdb_rating`, `image`)
VALUES
	(1,'The Elder Scrolls V: Skyrim','2011','Bethesda Game Studios',9.4,'https://upload.wikimedia.org/wikipedia/en/thumb/1/15/The_Elder_Scrolls_V_Skyrim_cover.png/220px-The_Elder_Scrolls_V_Skyrim_cover.png'),
	(2,'Elden Ring','2022','FromSoftware',9.4,'https://upload.wikimedia.org/wikipedia/en/thumb/b/b9/Elden_Ring_Box_art.jpg/220px-Elden_Ring_Box_art.jpg'),
	(3,'Final Fantasy VII Remake','2020','Square Enix',9,'https://upload.wikimedia.org/wikipedia/en/thumb/c/ce/FFVIIRemake.png/220px-FFVIIRemake.png'),
	(4,'The Legend of Zelda: Ocarina of Time','1998','Nintendo',9.6,'https://upload.wikimedia.org/wikipedia/en/thumb/5/57/The_Legend_of_Zelda_Ocarina_of_Time.jpg/220px-The_Legend_of_Zelda_Ocarina_of_Time.jpg'),
	(5,'Stardew Valley','2016','ConcernedApe',8.5,'https://upload.wikimedia.org/wikipedia/en/thumb/f/fd/Logo_of_Stardew_Valley.png/220px-Logo_of_Stardew_Valley.png');

/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
