# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.38)
# Database: mis_transcript
# Generation Time: 2015-10-19 08:34:11 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_users`;

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(60) NOT NULL,
  `staff_number` varchar(10) DEFAULT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_logged_in` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `activated` tinyint(1) DEFAULT NULL,
  `edit_status` tinyint(1) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `faculty_id` int(2) NOT NULL,
  `cat_id` int(3) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_id` (`faculty_id`),
  KEY `cat_id` (`cat_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;

INSERT INTO `admin_users` (`id`, `admin_name`, `staff_number`, `username`, `password`, `email`, `created_at`, `updated_at`, `last_logged_in`, `activated`, `edit_status`, `role_id`, `faculty_id`, `cat_id`, `visible`)
VALUES
	(1,'Ahmad Ghaji','4444','4444','01f302d24f0df74bceb9ce36ae35ffe7e3262330','mohammeda@unijos.edu.ng','0000-00-00 00:00:00','0000-00-00 00:00:00','2015-10-19 06:29:55',1,1,1,1,1,1),
	(2,'Ibrahim Mara','1223','1223','',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,0,0,0,0),
	(3,'Benjamin Jang','1234','1234','',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,0,0,0,1),
	(4,'David Oguche','2222','2222','',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,0,0,0,0,0,1);

/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
