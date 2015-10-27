# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.38)
# Database: mis_transcript
# Generation Time: 2015-10-19 08:35:01 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table acceptance_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `acceptance_log`;

CREATE TABLE `acceptance_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` varchar(20) NOT NULL,
  `ResponseCode` varchar(10) NOT NULL,
  `ResponseDescription` varchar(100) NOT NULL,
  `Amount` int(6) NOT NULL,
  `returned_amount` varchar(10) NOT NULL,
  `CardNumber` varchar(20) NOT NULL,
  `MerchantReference` varchar(16) NOT NULL,
  `PaymentReference` varchar(50) NOT NULL,
  `returned_paymentreference` text NOT NULL,
  `RetrievalReferenceNumber` varchar(30) NOT NULL,
  `Initiating_date` datetime NOT NULL,
  `Interswitch_date` datetime NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `acceptance_log` WRITE;
/*!40000 ALTER TABLE `acceptance_log` DISABLE KEYS */;

INSERT INTO `acceptance_log` (`id`, `student_id`, `ResponseCode`, `ResponseDescription`, `Amount`, `returned_amount`, `CardNumber`, `MerchantReference`, `PaymentReference`, `returned_paymentreference`, `RetrievalReferenceNumber`, `Initiating_date`, `Interswitch_date`, `status`)
VALUES
	(1,'int73918151','021','Transaction Pending',19000,'','','','','','','0000-00-00 00:00:00','0000-00-00 00:00:00',''),
	(2,'app12345678','001','Sussesful',7000,'7000','','','','','','2015-10-01 04:11:09','0000-00-00 00:00:00','1'),
	(3,'app12345671','001','Sussesful',7000,'7000','','','','','','2015-10-01 04:11:09','0000-00-00 00:00:00','1'),
	(4,'app12345673','001','Sussesful',7000,'7000','','','','','','2015-10-01 04:11:09','0000-00-00 00:00:00','1'),
	(5,'app12345675','001','Sussesful',7000,'7000','','','','','','2015-10-01 04:11:09','0000-00-00 00:00:00','1'),
	(6,'app12345679','001','Sussesful',7000,'7000','','','','','','2015-10-01 04:11:09','0000-00-00 00:00:00','1'),
	(20,'int50028151','01','Approved',19000,'','','','','','','2015-10-06 13:38:16','0000-00-00 00:00:00',''),
	(21,'int60660151','021','Transaction Pending',19600,'','','','','','','2015-10-07 13:17:10','0000-00-00 00:00:00',''),
	(18,'int78159151','021','Transaction Pending',19600,'','','','','','','2015-10-06 13:37:28','0000-00-00 00:00:00',''),
	(17,'int15998151','01','Approved',19000,'','','','','','','2015-10-06 13:29:54','0000-00-00 00:00:00',''),
	(22,'int51665151','021','Transaction Pending',14100,'','','','','','','2015-10-07 15:19:52','0000-00-00 00:00:00',''),
	(23,'int63646151','021','Transaction Pending',19000,'','','','int63646151','a:3:{s:14:\"Processing Fee\";s:5:\"12500\";s:14:\"Postage Charge\";s:1:\"0\";s:18:\"Transaction Charge\";i:100;}','','2015-10-08 11:47:39','0000-00-00 00:00:00',''),
	(24,'int44203151','021','Transaction Pending',14100,'','','','int44203151','','','2015-10-08 11:54:36','0000-00-00 00:00:00',''),
	(25,'nat84253151','01','Approved',8600,'','','','nat84253151','a:3:{s:14:\"Processing Fee\";s:4:\"7500\";s:14:\"Postage Charge\";s:1:\"0\";s:18:\"Transaction Charge\";i:100;}','','2015-10-08 11:55:57','0000-00-00 00:00:00',''),
	(26,'int67897151','01','Approved',19000,'','','','int67897151','a:3:{s:14:\"Processing Fee\";s:5:\"12500\";s:14:\"Postage Charge\";s:1:\"0\";s:18:\"Transaction Charge\";i:100;}','','2015-10-13 14:43:25','0000-00-00 00:00:00','');

/*!40000 ALTER TABLE `acceptance_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table adm_access_code
# ------------------------------------------------------------

DROP TABLE IF EXISTS `adm_access_code`;

CREATE TABLE `adm_access_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jamb_rem_no` varchar(20) NOT NULL,
  `pin` varchar(40) NOT NULL,
  `amount` varchar(15) NOT NULL,
  `payment_date` datetime NOT NULL,
  `ip_addr` varchar(20) NOT NULL,
  `payment_code` varchar(20) NOT NULL,
  `branch_code` varchar(20) NOT NULL,
  `bank_code` varchar(10) NOT NULL,
  `reg_num` varchar(13) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `status` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `adm_access_code` WRITE;
/*!40000 ALTER TABLE `adm_access_code` DISABLE KEYS */;

INSERT INTO `adm_access_code` (`id`, `jamb_rem_no`, `pin`, `amount`, `payment_date`, `ip_addr`, `payment_code`, `branch_code`, `bank_code`, `reg_num`, `full_name`, `status`)
VALUES
	(1,'int12345871','986565565','7200','2015-10-14 03:10:09','','','','','','',''),
	(2,'nat12345671','786666555','50000','2015-10-05 03:06:10','','','','','','',''),
	(3,'int12345371','786666555','50000','2015-10-05 03:06:10','','','','','','',''),
	(4,'int12345691','786666555','50000','2015-10-05 03:06:10','','','','','','',''),
	(5,'nat12399671','786666555','50000','2015-10-05 03:06:10','','','','','','',''),
	(13,'int50028151','','19000','2015-10-06 12:38:23','','L7558061','','','int50028151','Mohammed Ahmed Ghaji',''),
	(12,'int15998151','','19000','2015-10-06 12:30:02','','','','','','',''),
	(14,'int50028151','','19000','2015-10-06 12:38:23','','L7558061','','','int50028151','Mohammed Ahmed Ghaji',''),
	(15,'nat84253151','nat84253151','8600','2015-10-08 10:56:03','','Q7558191','','','nat84253151','Mohammed Ahmed Ghaji',''),
	(18,'int67897151','int67897151','19000','2015-10-13 01:43:36','','O7558524','','','int67897151','Mohammed Ahmed Ghaji','');

/*!40000 ALTER TABLE `adm_access_code` ENABLE KEYS */;
UNLOCK TABLES;


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


# Dump of table app_histories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_histories`;

CREATE TABLE `app_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_no` varchar(15) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `type_id` tinyint(1) NOT NULL,
  `mode_id` tinyint(4) NOT NULL,
  `city_or_state` int(4) NOT NULL,
  `receiving_address` text NOT NULL,
  `application_flag` int(11) NOT NULL,
  `reason` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `app_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_no` (`application_no`,`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `app_histories` WRITE;
/*!40000 ALTER TABLE `app_histories` DISABLE KEYS */;

INSERT INTO `app_histories` (`id`, `application_no`, `applicant_id`, `type_id`, `mode_id`, `city_or_state`, `receiving_address`, `application_flag`, `reason`, `created_at`, `updated_at`, `app_visible`)
VALUES
	(1,'int12345871',1,2,2,1,'London West 23  Chelsea street ',1,'0','2015-09-02 04:10:10','2015-09-09 03:08:09',1),
	(2,'nat12345671',2,2,2,1,'London West 23  Chelsea street ',1,'0','2015-09-02 04:10:10','2015-09-09 03:08:09',1),
	(3,'int12345371',1,2,2,1,'London West 23  Chelsea street ',1,'0','2015-09-02 04:10:10','2015-09-09 03:08:09',1),
	(4,'int12345691',1,2,2,1,'London West 23  Chelsea street ',1,'0','2015-09-02 04:10:10','2015-09-09 03:08:09',1),
	(5,'nat12399671',1,2,2,1,'London West 23  Chelsea street ',1,'0','2015-09-02 04:10:10','2015-09-09 03:08:09',1),
	(6,'nat84253151',1,2,2,2,'London Manchester',1,'0','2015-10-13 14:11:55','2015-10-13 14:11:55',1),
	(7,'int67897151',1,2,4,1,'',0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',1);

/*!40000 ALTER TABLE `app_histories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table applicant_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `applicant_status`;

CREATE TABLE `applicant_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_no` varchar(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tracking_id` varchar(20) NOT NULL,
  `delivery_company_id` int(11) NOT NULL,
  `status_flag` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `applicant_id` (`application_no`,`status_id`,`delivery_company_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `applicant_status` WRITE;
/*!40000 ALTER TABLE `applicant_status` DISABLE KEYS */;

INSERT INTO `applicant_status` (`id`, `application_no`, `applicant_id`, `status_id`, `admin_id`, `created_at`, `updated_at`, `tracking_id`, `delivery_company_id`, `status_flag`, `visible`)
VALUES
	(1,'int12345691',1,1,1,'2015-10-13 16:05:34','2015-10-03 03:09:20','',0,0,1),
	(2,'int12345691',1,2,2,'2015-10-13 16:05:35','2015-10-03 03:09:09','',0,0,1),
	(11,'int12345691',1,3,3,'2015-10-13 16:05:37','2015-10-03 03:10:06','',0,0,1),
	(12,'int12345691',1,4,4,'2015-10-13 16:05:38','2015-10-04 03:06:09','6767',1,0,1),
	(14,'nat12399671',1,1,1,'2015-10-13 16:07:19','2015-10-04 03:06:09','',0,0,1),
	(15,'nat12399671',1,2,2,'2015-10-13 16:07:20','2015-10-10 03:06:09','',0,0,1);

/*!40000 ALTER TABLE `applicant_status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table application_status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `application_status`;

CREATE TABLE `application_status` (
  `id` int(11) NOT NULL,
  `application_open_date` varchar(10) NOT NULL,
  `application_open_time` varchar(5) NOT NULL,
  `application_close_date` varchar(10) NOT NULL,
  `application_close_time` varchar(5) NOT NULL,
  `session` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `application_status` WRITE;
/*!40000 ALTER TABLE `application_status` DISABLE KEYS */;

INSERT INTO `application_status` (`id`, `application_open_date`, `application_open_time`, `application_close_date`, `application_close_time`, `session`)
VALUES
	(1,'2015-07-29','10:00','2015-11-09','10:00','2015/2016');

/*!40000 ALTER TABLE `application_status` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `country_id` int(5) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;

INSERT INTO `cities` (`id`, `city_name`, `amount`, `country_id`, `visible`)
VALUES
	(1,'Leicester',6400,222,1),
	(2,'London',7000,222,1);

/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table countries
# ------------------------------------------------------------

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `country_id` int(6) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(250) NOT NULL DEFAULT '',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`country_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;

INSERT INTO `countries` (`country_id`, `country_name`, `visible`)
VALUES
	(1,'Afghanistan',1),
	(2,'Albania',1),
	(3,'Algeria',1),
	(4,'American Samoa',1),
	(5,'Andorra',1),
	(6,'Angola',1),
	(7,'Anguilla',1),
	(8,'Antarctica',1),
	(9,'Antigua And Barbuda',1),
	(10,'Argentina',1),
	(11,'Armenia',1),
	(12,'Aruba',1),
	(13,'Australia',1),
	(14,'Austria',1),
	(15,'Azerbaijan',1),
	(16,'Bahamas, The',1),
	(17,'Bahrain',1),
	(18,'Bangladesh',1),
	(19,'Barbados',1),
	(20,'Belarus',1),
	(21,'Belgium',1),
	(22,'Belize',1),
	(23,'Benin',1),
	(24,'Bermuda',1),
	(25,'Bhutan',1),
	(26,'Bolivia',1),
	(27,'Bosnia and Herzegovina',1),
	(28,'Botswana',1),
	(29,'Bouvet Island',1),
	(30,'Brazil',1),
	(31,'British Indian Ocean Territory',1),
	(32,'Brunei',1),
	(33,'Bulgaria',1),
	(34,'Burkina Faso',1),
	(35,'Burundi',1),
	(36,'Cambodia',1),
	(37,'Cameroon',1),
	(38,'Canada',1),
	(39,'Cape Verde',1),
	(40,'Cayman Islands',1),
	(41,'Central African Republic',1),
	(42,'Chad',1),
	(43,'Chile',1),
	(44,'China',1),
	(45,'China (Hong Kong S.A.R.)',1),
	(46,'China (Macau S.A.R.)',1),
	(47,'Christmas Island',1),
	(48,'Cocos (Keeling) Islands',1),
	(49,'Colombia',1),
	(50,'Comoros',1),
	(51,'Congo',1),
	(52,'Congo, Democractic Republic of the',1),
	(53,'Cook Islands',1),
	(54,'Costa Rica',1),
	(55,'Cote D\'Ivoire (Ivory Coast)',1),
	(56,'Croatia (Hrvatska)',1),
	(57,'Cuba',1),
	(58,'Cyprus',1),
	(59,'Czech Republic',1),
	(60,'Denmark',1),
	(61,'Djibouti',1),
	(62,'Dominica',1),
	(63,'Dominican Republic',1),
	(64,'East Timor',1),
	(65,'Ecuador',1),
	(66,'Egypt',1),
	(67,'El Salvador',1),
	(68,'Equatorial Guinea',1),
	(69,'Eritrea',1),
	(70,'Estonia',1),
	(71,'Ethiopia',1),
	(72,'Falkland Islands (Islas Malvinas)',1),
	(73,'Faroe Islands',1),
	(74,'Fiji Islands',1),
	(75,'Finland',1),
	(76,'France',1),
	(77,'French Guiana',1),
	(78,'French Polynesia',1),
	(79,'French Southern Territories',1),
	(80,'Gabon',1),
	(81,'Gambia, The',1),
	(82,'Georgia',1),
	(83,'Germany',1),
	(84,'Ghana',1),
	(85,'Gibraltar',1),
	(86,'Greece',1),
	(87,'Greenland',1),
	(88,'Grenada',1),
	(89,'Guadeloupe',1),
	(90,'Guam',1),
	(91,'Guatemala',1),
	(92,'Guinea',1),
	(93,'Guinea-Bissau',1),
	(94,'Guyana',1),
	(95,'Haiti',1),
	(96,'Heard and McDonald Islands',1),
	(97,'Honduras',1),
	(98,'Hungary',1),
	(99,'Iceland',1),
	(100,'India',1),
	(101,'Indonesia',1),
	(102,'Iran',1),
	(103,'Iraq',1),
	(104,'Ireland',1),
	(105,'Israel',1),
	(106,'Italy',1),
	(107,'Jamaica',1),
	(108,'Japan',1),
	(109,'Jordan',1),
	(110,'Kazakhstan',1),
	(111,'Kenya',1),
	(112,'Kiribati',1),
	(113,'Korea',1),
	(114,'Korea, North',1),
	(115,'Kuwait',1),
	(116,'Kyrgyzstan',1),
	(117,'Laos',1),
	(118,'Latvia',1),
	(119,'Lebanon',1),
	(120,'Lesotho',1),
	(121,'Liberia',1),
	(122,'Libya',1),
	(123,'Liechtenstein',1),
	(124,'Lithuania',1),
	(125,'Luxembourg',1),
	(126,'Macedonia',1),
	(127,'Madagascar',1),
	(128,'Malawi',1),
	(129,'Malaysia',1),
	(130,'Maldives',1),
	(131,'Mali',1),
	(132,'Malta',1),
	(133,'Marshall Islands',1),
	(134,'Martinique',1),
	(135,'Mauritania',1),
	(136,'Mauritius',1),
	(137,'Mayotte',1),
	(138,'Mexico',1),
	(139,'Micronesia',1),
	(140,'Moldova',1),
	(141,'Monaco',1),
	(142,'Mongolia',1),
	(143,'Montserrat',1),
	(144,'Morocco',1),
	(145,'Mozambique',1),
	(146,'Myanmar',1),
	(147,'Namibia',1),
	(148,'Nauru',1),
	(149,'Nepal',1),
	(150,'Netherlands Antilles',1),
	(151,'Netherlands, The',1),
	(152,'New Caledonia',1),
	(153,'New Zealand',1),
	(154,'Nicaragua',1),
	(155,'Niger',1),
	(156,'Nigeria',1),
	(157,'Niue',1),
	(158,'Norfolk Island',1),
	(159,'Northern Mariana Islands',1),
	(160,'Norway',1),
	(161,'Oman',1),
	(162,'Pakistan',1),
	(163,'Palau',1),
	(164,'Panama',1),
	(165,'Papua new Guinea',1),
	(166,'Paraguay',1),
	(167,'Peru',1),
	(168,'Philippines',1),
	(169,'Pitcairn Island',1),
	(170,'Poland',1),
	(171,'Portugal',1),
	(172,'Puerto Rico',1),
	(173,'Qatar',1),
	(174,'Reunion',1),
	(175,'Romania',1),
	(176,'Russia',1),
	(177,'Rwanda',1),
	(178,'Saint Helena',1),
	(179,'Saint Kitts And Nevis',1),
	(180,'Saint Lucia',1),
	(181,'Saint Pierre and Miquelon',1),
	(182,'Saint Vincent And The Grenadines',1),
	(183,'Samoa',1),
	(184,'San Marino',1),
	(185,'Sao Tome and Principe',1),
	(186,'Saudi Arabia',1),
	(187,'Senegal',1),
	(188,'Seychelles',1),
	(189,'Sierra Leone',1),
	(190,'Singapore',1),
	(191,'Slovakia',1),
	(192,'Slovenia',1),
	(193,'Solomon Islands',1),
	(194,'Somalia',1),
	(195,'South Africa',1),
	(196,'South Georgia',1),
	(197,'Spain',1),
	(198,'Sri Lanka',1),
	(199,'Sudan',1),
	(200,'Suriname',1),
	(201,'Svalbard And Jan Mayen Islands',1),
	(202,'Swaziland',1),
	(203,'Sweden',1),
	(204,'Switzerland',1),
	(205,'Syria',1),
	(206,'Taiwan',1),
	(207,'Tajikistan',1),
	(208,'Tanzania',1),
	(209,'Thailand',1),
	(210,'Togo',1),
	(211,'Tokelau',1),
	(212,'Tonga',1),
	(213,'Trinidad And Tobago',1),
	(214,'Tunisia',1),
	(215,'Turkey',1),
	(216,'Turkmenistan',1),
	(217,'Turks And Caicos Islands',1),
	(218,'Tuvalu',1),
	(219,'Uganda',1),
	(220,'Ukraine',1),
	(221,'United Arab Emirates',1),
	(222,'United Kingdom',1),
	(223,'United States',1),
	(224,'United States Minor Outlying Islands',1),
	(225,'Uruguay',1),
	(226,'Uzbekistan',1),
	(227,'Vanuatu',1),
	(228,'Vatican City State (Holy See)',1),
	(229,'Venezuela',1),
	(230,'Vietnam',1),
	(231,'Virgin Islands (British)',1),
	(232,'Virgin Islands (US)',1),
	(233,'Wallis And Futuna Islands',1),
	(234,'Western Sahara',1),
	(235,'Yemen',1),
	(236,'Yugoslavia',1),
	(237,'Zambia',1),
	(238,'Zimbabwe',1);

/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table delivery_companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `delivery_companies`;

CREATE TABLE `delivery_companies` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `delivery_company_name` varchar(100) DEFAULT NULL,
  `delivery_visible` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `delivery_companies` WRITE;
/*!40000 ALTER TABLE `delivery_companies` DISABLE KEYS */;

INSERT INTO `delivery_companies` (`id`, `delivery_company_name`, `delivery_visible`)
VALUES
	(1,'DHL',1),
	(2,'UPS',1);

/*!40000 ALTER TABLE `delivery_companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table delivery_cost
# ------------------------------------------------------------

DROP TABLE IF EXISTS `delivery_cost`;

CREATE TABLE `delivery_cost` (
  `dc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dm_id` int(11) NOT NULL,
  `dc_details` varchar(15) NOT NULL,
  `city_id` int(11) NOT NULL,
  `dc_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`dc_id`),
  KEY `dm_id` (`dm_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table delivery_mode
# ------------------------------------------------------------

DROP TABLE IF EXISTS `delivery_mode`;

CREATE TABLE `delivery_mode` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_id` int(11) NOT NULL,
  `dm_type` varchar(30) NOT NULL DEFAULT '',
  `dm_amount` float NOT NULL,
  `dm_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `delivery_mode` WRITE;
/*!40000 ALTER TABLE `delivery_mode` DISABLE KEYS */;

INSERT INTO `delivery_mode` (`id`, `dt_id`, `dm_type`, `dm_amount`, `dm_visible`)
VALUES
	(1,1,'Ordinary Post',200,1),
	(2,1,'Courier',0,1),
	(3,2,'Ordinary Post',1500,1),
	(4,2,'Courier',0,1);

/*!40000 ALTER TABLE `delivery_mode` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table delivery_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `delivery_type`;

CREATE TABLE `delivery_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt_name` varchar(60) NOT NULL,
  `dt_code` char(3) DEFAULT NULL,
  `dt_amount` float NOT NULL,
  `dt_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `delivery_type` WRITE;
/*!40000 ALTER TABLE `delivery_type` DISABLE KEYS */;

INSERT INTO `delivery_type` (`id`, `dt_name`, `dt_code`, `dt_amount`, `dt_visible`)
VALUES
	(1,'National','nat',7500,1),
	(2,'International','int',12500,1);

/*!40000 ALTER TABLE `delivery_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table departments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `departments`;

CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_id` int(11) NOT NULL DEFAULT '0',
  `department_name` varchar(100) NOT NULL DEFAULT '',
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;

INSERT INTO `departments` (`id`, `faculty_id`, `department_name`, `visible`)
VALUES
	(1,1,'English',1),
	(2,1,'History & Inter. Studies',1),
	(3,1,'Language and Linguistics',1),
	(4,1,'Religion and Philosophy',1),
	(5,1,'Theatre and Film Arts',1),
	(6,2,'Social Science Education',1),
	(7,2,'Science and Technology Education',1),
	(8,2,'Special Education and Rehabilitation Sciences',1),
	(9,3,'Architecture',1),
	(10,3,'Building',1),
	(11,3,'Geography and Planning',1),
	(12,4,'Law',1),
	(13,5,'Medicine',1),
	(14,6,'Botany',1),
	(15,6,'Chemistry',1),
	(16,6,'Geology and Mining',1),
	(17,6,'Mathematics',1),
	(18,6,'Microbiology',1),
	(19,6,'Physics',1),
	(20,6,'Zoology',1),
	(21,7,'Pharmacy',1),
	(22,11,'Accounting',1),
	(23,8,'Economics',1),
	(24,8,'General and Applied Psychology',1),
	(25,11,'Management Science',1),
	(26,8,'Political Science',1),
	(27,8,'Sociology',1),
	(28,5,'Biochemistry',1),
	(29,5,'Nursing',1),
	(30,9,'GS',1),
	(31,5,'Anatomy',0),
	(32,5,'Medical Laboratory Sciences',1),
	(33,1,'Mass Communication',1),
	(34,6,'Science Laboratory Technology(SLT)',1),
	(35,3,'former architecture',0),
	(36,2,'Educational Foundations',1),
	(37,3,'Fine & Applied Arts',1),
	(38,2,'Social Science Education',0),
	(39,2,'Arts Education',1),
	(40,2,'Christian Religious Studies Education',1),
	(41,11,'BANKING AND FINANCE',1),
	(53,1,'Archeology',1),
	(54,6,'Computer Science',1),
	(55,1,'Music',1),
	(56,3,'Estate Management',1),
	(57,3,'Uban & Regional Planing',1),
	(58,3,'Fine Arts',0),
	(59,3,'Quantity Surveying',1),
	(60,4,'Criminology & Security Studies',1),
	(61,11,'Insurance',1),
	(62,11,' Actuarial Science',1),
	(63,11,'Marketing',1),
	(64,12,'Civil Engineering',1),
	(65,12,'Mechanical Engineering',1),
	(66,12,'Electrical Electronics Engineering',1),
	(67,12,'Mining Engineering',1),
	(68,14,'Agricultural Economics & Extension',1),
	(69,14,'Animal Production',1),
	(70,14,'Crop Production',1),
	(71,13,'Veterinary Medicine',1),
	(72,2,'Integrated Science Education',1),
	(73,2,'Physical and Health Education',1),
	(74,14,'Agricultural Economics & Extension',0),
	(75,5,'Dental surgery',1);

/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table entry_modes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `entry_modes`;

CREATE TABLE `entry_modes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_name` varchar(11) NOT NULL,
  `entry_visible` tinyint(1) NOT NULL,
  `entry_created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `entry_updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `entry_modes` WRITE;
/*!40000 ALTER TABLE `entry_modes` DISABLE KEYS */;

INSERT INTO `entry_modes` (`id`, `entry_name`, `entry_visible`, `entry_created_at`, `entry_updated_at`)
VALUES
	(1,'UME',1,'2015-10-12 16:02:00','2015-10-12 16:02:00'),
	(2,'DE',1,'2015-10-12 16:02:00','2015-10-12 16:02:00');

/*!40000 ALTER TABLE `entry_modes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table faculties
# ------------------------------------------------------------

DROP TABLE IF EXISTS `faculties`;

CREATE TABLE `faculties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faculty_name` varchar(100) NOT NULL DEFAULT '',
  `faculty_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `faculties` WRITE;
/*!40000 ALTER TABLE `faculties` DISABLE KEYS */;

INSERT INTO `faculties` (`id`, `faculty_name`, `faculty_visible`)
VALUES
	(1,'Arts',1),
	(2,'Education',1),
	(3,'Environmental Sciences',1),
	(4,'Law',1),
	(5,'Medical Sciences',1),
	(6,'Natural Sciences',1),
	(7,'Pharmaceutical Sciences',1),
	(8,'Social Sciences',1),
	(9,'General Studies',0),
	(10,'Library',0),
	(11,'Management Sciences',1),
	(12,'Engineering',1),
	(13,'Veterinary Medicine',1),
	(14,'Agricultural Sciences',1);

/*!40000 ALTER TABLE `faculties` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table feedbacks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `feedbacks`;

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `applicant_id` int(11) NOT NULL,
  `programme_id` int(3) NOT NULL,
  `title` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `feedbacks` WRITE;
/*!40000 ALTER TABLE `feedbacks` DISABLE KEYS */;

INSERT INTO `feedbacks` (`id`, `applicant_id`, `programme_id`, `title`, `created_at`, `updated_at`, `visible`)
VALUES
	(1,1,0,'','0000-00-00 00:00:00','0000-00-00 00:00:00',0),
	(2,1,0,'','2015-10-08 15:45:28','2015-10-08 15:45:28',1),
	(3,1,0,'','2015-10-08 15:58:56','2015-10-08 15:58:56',1),
	(4,1,0,'','2015-10-08 15:59:55','2015-10-08 15:59:55',1),
	(5,1,1,'','2015-10-08 16:01:59','2015-10-08 16:01:59',1);

/*!40000 ALTER TABLE `feedbacks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gender
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gender`;

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(6) NOT NULL,
  `gender_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;

INSERT INTO `gender` (`gender_id`, `gender_name`, `gender_visible`)
VALUES
	(1,'Female',1),
	(2,'Male',1);

/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lga
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lga`;

CREATE TABLE `lga` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `lga_name` varchar(50) NOT NULL DEFAULT '',
  `lga_amount` float NOT NULL DEFAULT '1000',
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`),
  CONSTRAINT `lga_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `lga` WRITE;
/*!40000 ALTER TABLE `lga` DISABLE KEYS */;

INSERT INTO `lga` (`id`, `state_id`, `lga_name`, `lga_amount`, `visible`)
VALUES
	(1,1,'Aba North',1000,1),
	(2,1,'Aba South',1000,1),
	(3,1,'Arochukwu',1000,1),
	(4,1,'Bende',1000,1),
	(5,1,'Ikwuano',1000,1),
	(6,1,'Isiala-Ngwa North',1000,1),
	(7,1,'Isiala-Ngwa South',1000,1),
	(8,1,'Isikwuato',1000,1),
	(9,1,'Nneochi',1000,1),
	(10,1,'Obi-Ngwa',1000,1),
	(11,1,'Ohafia',1000,1),
	(12,1,'Osisioma',1000,1),
	(13,1,'Ugwunagbo',1000,1),
	(14,1,'Ukwa East',1000,1),
	(15,1,'Ukwa West',1000,1),
	(16,1,'Umuahia North',1000,1),
	(17,1,'Umuahia South',1000,1),
	(18,2,'Demsa',1000,1),
	(19,2,'Fufore',1000,1),
	(20,2,'Genye',1000,1),
	(21,2,'Girei',1000,1),
	(22,2,'Gombi',1000,1),
	(23,2,'guyuk',1000,1),
	(24,2,'Hong',1000,1),
	(25,2,'Jada',1000,1),
	(26,2,'Jimeta',1000,1),
	(27,2,'Lamurde',1000,1),
	(28,2,'Madagali',1000,1),
	(29,2,'Maiha',1000,1),
	(30,2,'Mayo Belwa',1000,1),
	(31,2,'Michika',1000,1),
	(32,2,'Mubi North',1000,1),
	(33,2,'Mubi South',1000,1),
	(34,2,'Numan',1000,1),
	(35,2,'Shelleng',1000,1),
	(36,2,'Song',1000,1),
	(37,2,'Toungo',1000,1),
	(38,2,'Yola',1000,1),
	(39,3,'Abak',1000,1),
	(40,3,'Eastern-Obolo',1000,1),
	(41,3,'Eket',1000,1),
	(42,3,'Ekpe-Atani',1000,1),
	(43,3,'Essien-Udim',1000,1),
	(44,3,'Esit Ekit',1000,1),
	(45,3,'Etim-Ekpo',1000,1),
	(46,3,'Etinan',1000,1),
	(47,3,'Ibeno',1000,1),
	(48,3,'Ibesikp-Asitan',1000,1),
	(49,3,'Ibiono-Ibom',1000,1),
	(50,3,'Ika',1000,1),
	(51,3,'Ikono',1000,1),
	(52,3,'Ikot-Abasi',1000,1),
	(53,3,'Ikot-Ekpene',1000,1),
	(54,3,'Ini',1000,1),
	(55,3,'Itu',1000,1),
	(56,3,'Mbo',1000,1),
	(57,3,'Mkpae-Enin',1000,1),
	(58,3,'Nsit-Ibom',1000,1),
	(59,3,'Nsit-Ubium',1000,1),
	(60,3,'Obot-Akara',1000,1),
	(61,3,'Okobo',1000,1),
	(62,3,'Onna',1000,1),
	(63,3,'Oron',1000,1),
	(64,3,'Oro-Anam',1000,1),
	(65,3,'Udung-Uko',1000,1),
	(66,3,'Ukanefun',1000,1),
	(67,3,'Uru Offong Oruko',1000,1),
	(68,3,'Uruan',1000,1),
	(69,3,'Uquo Ibene',1000,1),
	(70,3,'Uyo',1000,1),
	(71,4,'Aguata',1000,1),
	(72,4,'Anambra',1000,1),
	(73,4,'Anambra West',1000,1),
	(74,4,'Anocha',1000,1),
	(75,4,'Awka- North',1000,1),
	(76,4,'Awka-South',1000,1),
	(77,4,'Ayamelum',1000,1),
	(78,4,'Dunukofia',1000,1),
	(79,4,'Ekwusigo',1000,1),
	(80,4,'Idemili-North',1000,1),
	(81,4,'Idemili-South',1000,1),
	(82,4,'Ihiala',1000,1),
	(83,4,'Njikoka',1000,1),
	(84,4,'Nnewi-North',1000,1),
	(85,4,'Nnewi-South',1000,1),
	(86,4,'Ogbaru',1000,1),
	(87,4,'Onisha North',1000,1),
	(88,4,'Onitsha South',1000,1),
	(89,4,'Orumba North',1000,1),
	(90,4,'Orumba South',1000,1),
	(91,4,'Oyi',1000,1),
	(92,5,'Alkaleri',1000,1),
	(93,5,'Bauchi',1000,1),
	(94,5,'Bogoro',1000,1),
	(95,5,'Damban',1000,1),
	(96,5,'Darazo',1000,1),
	(97,5,'Dass',1000,1),
	(98,5,'Gamawa',1000,1),
	(99,5,'Ganjuwa',1000,1),
	(100,5,'Giade',1000,1),
	(101,5,'Itas/Gadau',1000,1),
	(102,5,'Jama\'are',1000,1),
	(103,5,'Katagum',1000,1),
	(104,5,'Kirfi',1000,1),
	(105,5,'Misau',1000,1),
	(106,5,'Ningi',1000,1),
	(107,5,'Shira',1000,1),
	(108,5,'Tafawa-Balewa',1000,1),
	(109,5,'Toro',1000,1),
	(110,5,'Warji',1000,1),
	(111,5,'Zaki',1000,1),
	(112,6,'Brass',1000,1),
	(113,6,'Ekerernor',1000,1),
	(114,6,'Kolokuma/Opokuma',1000,1),
	(115,6,'Nembe',1000,1),
	(116,6,'Ogbia',1000,1),
	(117,6,'Sagbama',1000,1),
	(118,6,'Southern-Ijaw',1000,1),
	(119,6,'Yenegoa',1000,1),
	(120,6,'Kembe',1000,1),
	(121,7,'Ado',1000,1),
	(122,7,'Agatu',1000,1),
	(123,7,'Apa',1000,1),
	(124,7,'Buruku',1000,1),
	(125,7,'Gboko',1000,1),
	(126,7,'Guma',1000,1),
	(127,7,'Gwer-East',1000,1),
	(128,7,'Gwer-West',1000,1),
	(129,7,'Katsina-Ala',1000,1),
	(130,7,'Konshisha',1000,1),
	(131,7,'Kwande',1000,1),
	(132,7,'Logo',1000,1),
	(133,7,'Makurdi',1000,1),
	(134,7,'Obi',1000,1),
	(135,7,'Ogbadibo',1000,1),
	(136,7,'Ohimini',1000,1),
	(137,7,'Oju',1000,1),
	(138,7,'Okpokwu',1000,1),
	(139,7,'Otukpo',1000,1),
	(140,7,'Tarkar',1000,1),
	(141,7,'Vandeikya',1000,1),
	(142,7,'Ukum',1000,1),
	(143,7,'Ushongo',1000,1),
	(144,8,'Abadan',1000,1),
	(145,8,'Askira-Uba',1000,1),
	(146,8,'Bama',1000,1),
	(147,8,'Bayo',1000,1),
	(148,8,'Biu',1000,1),
	(149,8,'Chibok',1000,1),
	(150,8,'Damboa',1000,1),
	(151,8,'Dikwa',1000,1),
	(152,8,'Gubio',1000,1),
	(153,8,'Guzamala',1000,1),
	(154,8,'Gwoza',1000,1),
	(155,8,'Hawul',1000,1),
	(156,8,'Jere',1000,1),
	(157,8,'Kaga',1000,1),
	(158,8,'Kala/Balge',1000,1),
	(159,8,'Kukawa',1000,1),
	(160,8,'Konduga',1000,1),
	(161,8,'Kwaya-Kusar',1000,1),
	(162,8,'Mafa',1000,1),
	(163,8,'Magumeri',1000,1),
	(164,8,'Maiduguri',1000,1),
	(165,8,'Marte',1000,1),
	(166,8,'Mobbar',1000,1),
	(167,8,'Monguno',1000,1),
	(168,8,'Ngala',1000,1),
	(169,8,'Nganzai',1000,1),
	(170,8,'Shani',1000,1),
	(171,9,'Abi',1000,1),
	(172,9,'Akamkpa',1000,1),
	(173,9,'Akpabuyo',1000,1),
	(174,9,'Bakassi',1000,1),
	(175,9,'Bekwara',1000,1),
	(176,9,'Biasi',1000,1),
	(177,9,'Boki',1000,1),
	(178,9,'Calabar-Municipal',1000,1),
	(179,9,'Calabar-South',1000,1),
	(180,9,'Etunk',1000,1),
	(181,9,'Ikom',1000,1),
	(182,9,'Obantiku',1000,1),
	(183,9,'Ogoja',1000,1),
	(184,9,'Ugep North',1000,1),
	(185,9,'Yakurr',1000,1),
	(186,9,'Yala',1000,1),
	(187,10,'Aniocha North',1000,1),
	(188,10,'Aniocha South',1000,1),
	(189,10,'Bomadi',1000,1),
	(190,10,'Burutu',1000,1),
	(191,10,'Ethiope East',1000,1),
	(192,10,'Ethiope West',1000,1),
	(193,10,'Ika North East',1000,1),
	(194,10,'Ika South',1000,1),
	(195,10,'Isoko North',1000,1),
	(196,10,'Isoko South',1000,1),
	(197,10,'Ndokwa East',1000,1),
	(198,10,'Ndokwa West',1000,1),
	(199,10,'Okpe',1000,1),
	(200,10,'Oshimili North',1000,1),
	(201,10,'Oshimili South',1000,1),
	(202,10,'Patani',1000,1),
	(203,10,'Sapele',1000,1),
	(204,10,'Udu',1000,1),
	(205,10,'Ughilli North',1000,1),
	(206,10,'Ughilli South',1000,1),
	(207,10,'Ukwuani',1000,1),
	(208,10,'Uvwie',1000,1),
	(209,10,'Warri Central',1000,1),
	(210,10,'Warri North',1000,1),
	(211,10,'Warri South',1000,1),
	(212,11,'Abakaliki',1000,1),
	(213,11,'Ofikpo North',1000,1),
	(214,11,'Ofikpo South',1000,1),
	(215,11,'Ebonyi',1000,1),
	(216,11,'Ezza North',1000,1),
	(217,11,'Ezza South',1000,1),
	(218,11,'ikwo',1000,1),
	(219,11,'Ishielu',1000,1),
	(220,11,'Ivo',1000,1),
	(221,11,'Izzi',1000,1),
	(222,11,'Ohaukwu',1000,1),
	(223,11,'Ohaozara',1000,1),
	(224,11,'Onicha',1000,1),
	(225,12,'Akoko Edo',1000,1),
	(226,12,'Egor',1000,1),
	(227,12,'Esan Central',1000,1),
	(228,12,'Esan North East',1000,1),
	(229,12,'Esan South East',1000,1),
	(230,12,'Esan West',1000,1),
	(231,12,'Etsako-Central',1000,1),
	(232,12,'Etsako-West',1000,1),
	(233,12,'Igueben',1000,1),
	(234,12,'Ikpoba-Okha',1000,1),
	(235,12,'Oredo',1000,1),
	(236,12,'Orhionmwon',1000,1),
	(237,12,'Ovia North East',1000,1),
	(238,12,'Ovia South West',1000,1),
	(239,12,'owan east',1000,1),
	(240,12,'Owan West',1000,1),
	(241,12,'Umunniwonde',1000,1),
	(242,13,'Ado Ekiti',1000,1),
	(243,13,'Aiyedire',1000,1),
	(244,13,'Efon',1000,1),
	(245,13,'Ekiti-East',1000,1),
	(246,13,'Ekiti-South West',1000,1),
	(247,13,'Ekiti West',1000,1),
	(248,13,'Emure',1000,1),
	(249,13,'Ido Osi',1000,1),
	(250,13,'Ijero',1000,1),
	(251,13,'Ikere',1000,1),
	(252,13,'Ikole',1000,1),
	(253,13,'Ilejemeta',1000,1),
	(254,13,'Irepodun/Ifelodun',1000,1),
	(255,13,'Ise Orun',1000,1),
	(256,13,'Moba',1000,1),
	(257,13,'Oye',1000,1),
	(258,14,'Aninri',1000,1),
	(259,14,'Awgu',1000,1),
	(260,14,'Enugu East',1000,1),
	(261,14,'Enugu North',1000,1),
	(262,14,'Enugu South',1000,1),
	(263,14,'Ezeagu',1000,1),
	(264,14,'Igbo Etiti',1000,1),
	(265,14,'Igbo Eze North',1000,1),
	(266,14,'Igbo Eze South',1000,1),
	(267,14,'Isi Uzo',1000,1),
	(268,14,'Nkanu East',1000,1),
	(269,14,'Nkanu West',1000,1),
	(270,14,'Nsukka',1000,1),
	(271,14,'Oji-River',1000,1),
	(272,14,'Udenu',1000,1),
	(273,14,'Udi',1000,1),
	(274,14,'Uzo Uwani',1000,1),
	(275,15,'Akko',1000,1),
	(276,15,'Balanga',1000,1),
	(277,15,'Billiri',1000,1),
	(278,15,'Dukku',1000,1),
	(279,15,'Funakaye',1000,1),
	(280,15,'Gombe',1000,1),
	(281,15,'Kaltungo',1000,1),
	(282,15,'Kwami',1000,1),
	(283,15,'Nafada/Bajoga',1000,1),
	(284,15,'Shomgom',1000,1),
	(285,15,'Yamltu/Deba',1000,1),
	(286,16,'Ahiazu-Mbaise',1000,1),
	(287,16,'Ehime-Mbano',1000,1),
	(288,16,'Ezinihtte',1000,1),
	(289,16,'Ideato North',1000,1),
	(290,16,'Ideato South',1000,1),
	(291,16,'Ihitte/Uboma',1000,1),
	(292,16,'Ikeduru',1000,1),
	(293,16,'Isiala-Mbano',1000,1),
	(294,16,'Isu',1000,1),
	(295,16,'Mbaitoli',1000,1),
	(296,16,'Ngor-Okpala',1000,1),
	(297,16,'Njaba',1000,1),
	(298,16,'Nkwerre',1000,1),
	(299,16,'Nwangele',1000,1),
	(300,16,'obowo',1000,1),
	(301,16,'Oguta',1000,1),
	(302,16,'Ohaji-Eggema',1000,1),
	(303,16,'Okigwe',1000,1),
	(304,16,'Onuimo',1000,1),
	(305,16,'Orlu',1000,1),
	(306,16,'Orsu',1000,1),
	(307,16,'Oru East',1000,1),
	(308,16,'Oru West',1000,1),
	(309,16,'Owerri Municipal',1000,1),
	(310,16,'Owerri North',1000,1),
	(311,16,'Owerri West',1000,1),
	(312,17,'Auyu',1000,1),
	(313,17,'Babura',1000,1),
	(314,17,'Birnin Kudu',1000,1),
	(315,17,'Birniwa',1000,1),
	(316,17,'Bosuwa',1000,1),
	(317,17,'Buji',1000,1),
	(318,17,'Dutse',1000,1),
	(319,17,'Gagarawa',1000,1),
	(320,17,'Garki',1000,1),
	(321,17,'Gumel',1000,1),
	(322,17,'Guri',1000,1),
	(323,17,'Gwaram',1000,1),
	(324,17,'Gwiwa',1000,1),
	(325,17,'Hadejia',1000,1),
	(326,17,'Jahun',1000,1),
	(327,17,'Kafin Hausa',1000,1),
	(328,17,'Kaugama',1000,1),
	(329,17,'Kazaure',1000,1),
	(330,17,'Kirikasanuma',1000,1),
	(331,17,'Kiyawa',1000,1),
	(332,17,'Maigatari',1000,1),
	(333,17,'Malam Maduri',1000,1),
	(334,17,'Miga',1000,1),
	(335,17,'Ringim',1000,1),
	(336,17,'Roni',1000,1),
	(337,17,'Sule Tankarkar',1000,1),
	(338,17,'Taura',1000,1),
	(339,17,'Yankwashi',1000,1),
	(340,18,'Birnin-Gwari',1000,1),
	(341,18,'Chikun',1000,1),
	(342,18,'Giwa',1000,1),
	(343,18,'Gwagwada',1000,1),
	(344,18,'Igabi',1000,1),
	(345,18,'Ikara',1000,1),
	(346,18,'Jaba',1000,1),
	(347,18,'Jema\'a',1000,1),
	(348,18,'Kachia',1000,1),
	(349,18,'Kaduna North',1000,1),
	(350,18,'Kagarko',1000,1),
	(351,18,'Kajuru',1000,1),
	(352,18,'Kaura',1000,1),
	(353,18,'Kauru',1000,1),
	(354,18,'Koka/Kawo',1000,1),
	(355,18,'Kubah',1000,1),
	(356,18,'Kudan',1000,1),
	(357,18,'Lere',1000,1),
	(358,18,'Makarfi',1000,1),
	(359,18,'Sabon Gari',1000,1),
	(360,18,'Sanga',1000,1),
	(361,18,'Sabo',1000,1),
	(362,18,'Tudun-Wada/Makera',1000,1),
	(363,18,'Zango-Kataf',1000,1),
	(364,18,'Zaria',1000,1),
	(365,19,'Ajingi',1000,1),
	(366,19,' Albasu',1000,1),
	(367,19,'Bagwai',1000,1),
	(368,19,'Bebeji',1000,1),
	(369,19,'Bichi',1000,1),
	(370,19,'Bunkure',1000,1),
	(371,19,'Dala',1000,1),
	(372,19,'Dambatta',1000,1),
	(373,19,'Dawakin Kudu',1000,1),
	(374,19,'Dawakin Tofa',1000,1),
	(375,19,'Doguwa',1000,1),
	(376,19,'Fagge',1000,1),
	(377,19,'Gabasawa',1000,1),
	(378,19,'Garko',1000,1),
	(379,19,'Garun-Mallam',1000,1),
	(380,19,'Gaya',1000,1),
	(381,19,'Gezawa',1000,1),
	(382,19,'Gwale',1000,1),
	(383,19,'Gwarzo',1000,1),
	(384,19,'Kabo',1000,1),
	(385,19,'Kano Municipal',1000,1),
	(386,19,'Karaye',1000,1),
	(387,19,'Kibiya',1000,1),
	(388,19,'Kiru',1000,1),
	(389,19,'Kumbotso',1000,1),
	(390,19,'Kunchi',1000,1),
	(391,19,'Kura',1000,1),
	(392,19,'Madobi',1000,1),
	(393,19,'Makoda',1000,1),
	(394,19,'Minjibir',1000,1),
	(395,19,'Nasarawa',1000,1),
	(396,19,'Rano',1000,1),
	(397,19,'Rimin Gado',1000,1),
	(398,19,'Rogo',1000,1),
	(399,19,'Shanono',1000,1),
	(400,19,'Sumaila',1000,1),
	(401,19,'Takai',1000,1),
	(402,19,'Tarauni',1000,1),
	(403,19,'Tofa',1000,1),
	(404,19,'Tsanyawa',1000,1),
	(405,19,'Tudun Wada',1000,1),
	(406,19,'Ngogo',1000,1),
	(407,19,'Warawa',1000,1),
	(408,19,'Wudil',1000,1),
	(409,20,'Bakori',1000,1),
	(410,20,'Batagarawa',1000,1),
	(411,20,'Batsari',1000,1),
	(412,20,'Baure',1000,1),
	(413,20,'Bindawa',1000,1),
	(414,20,'Charanchi',1000,1),
	(415,20,'Danja',1000,1),
	(416,20,'Danjume',1000,1),
	(417,20,'Dan-Musa',1000,1),
	(418,20,'Daura',1000,1),
	(419,20,'Dutsi',1000,1),
	(420,20,'Dutsinma',1000,1),
	(421,20,'Faskari',1000,1),
	(422,20,'Funtua',1000,1),
	(423,20,'Ingara',1000,1),
	(424,20,'Jibia',1000,1),
	(425,20,'Kafur',1000,1),
	(426,20,'Kaita',1000,1),
	(427,20,'Kankara',1000,1),
	(428,20,'Kankia',1000,1),
	(429,20,'Katsina',1000,1),
	(430,20,'Kurfi',1000,1),
	(431,20,'Kusada',1000,1),
	(432,20,'Mai Adua',1000,1),
	(433,20,'Malumfashi',1000,1),
	(434,20,'Mani',1000,1),
	(435,20,'Mashi',1000,1),
	(436,20,'Matazu',1000,1),
	(437,20,'Musawa',1000,1),
	(438,20,'Rimi',1000,1),
	(439,20,'Sabuwa',1000,1),
	(440,20,'Safana',1000,1),
	(441,20,'Sandamu',1000,1),
	(442,20,'Zango',1000,1),
	(443,21,'Aleira',1000,1),
	(444,21,'Arewa',1000,1),
	(445,21,'Argungu',1000,1),
	(446,21,'Augie',1000,1),
	(447,21,'Bagudo',1000,1),
	(448,21,'Birnin-Kebbi',1000,1),
	(449,21,'Bumza',1000,1),
	(450,21,'Dandi',1000,1),
	(451,21,'Danko',1000,1),
	(452,21,'Fakai',1000,1),
	(453,21,'Gwandu',1000,1),
	(454,21,'Jega',1000,1),
	(455,21,'Kalgo',1000,1),
	(456,21,'Koko-Besse',1000,1),
	(457,21,'Maiyama',1000,1),
	(458,21,'Ngaski',1000,1),
	(459,21,'Sakaba',1000,1),
	(460,21,'Shanga',1000,1),
	(461,21,'Suru',1000,1),
	(462,21,'Wasagu',1000,1),
	(463,21,'Yauri',1000,1),
	(464,21,'Zuru',1000,1),
	(465,22,'Adavi',1000,1),
	(466,22,'Ajaokuta',1000,1),
	(467,22,'Ankpa',1000,1),
	(468,22,'Bassa',1000,1),
	(469,22,'Dekina',1000,1),
	(470,22,'Ibaji',1000,1),
	(471,22,'Idah',1000,1),
	(472,22,'Igalamela',1000,1),
	(473,22,'Ijumu',1000,1),
	(474,22,'Kabba/Bunu',1000,1),
	(475,22,'Kogi',1000,1),
	(476,22,'Lokoja',1000,1),
	(477,22,'Mopa-Muro-Mopi',1000,1),
	(478,22,'Ofu',1000,1),
	(479,22,'Ogori/Magongo',1000,1),
	(480,22,'Okehi',1000,1),
	(481,22,'Okene',1000,1),
	(482,22,'Olamaboro',1000,1),
	(483,22,'Omala',1000,1),
	(484,22,'Oyi',1000,1),
	(485,22,'Yagba-East',1000,1),
	(486,22,'Yagba-West',1000,1),
	(487,23,'Asa',1000,1),
	(488,23,'Baruten',1000,1),
	(489,23,'Edu',1000,1),
	(490,23,'Ekiti',1000,1),
	(491,23,'Ifelodun',1000,1),
	(492,23,'Ilorin East',1000,1),
	(493,23,'Ilorin South',1000,1),
	(494,23,'Ilorin West',1000,1),
	(495,23,'Irepodun',1000,1),
	(496,23,'Isin',1000,1),
	(497,23,'Kaiama',1000,1),
	(498,23,'Moro',1000,1),
	(499,23,'Offa',1000,1),
	(500,23,'Oke-Ero',1000,1),
	(501,23,'Oyun',1000,1),
	(502,23,'Pategi',1000,1),
	(503,24,'Agege',1000,1),
	(504,24,'Ajeromi-Ifelodun',1000,1),
	(505,24,'Alimosho',1000,1),
	(506,24,'Amuwo-Odofin',1000,1),
	(507,24,'Apapa',1000,1),
	(508,24,'Bagagry',1000,1),
	(509,24,'Epe',1000,1),
	(510,24,'Eti-Osa',1000,1),
	(511,24,'Ibeju-Lekki',1000,1),
	(512,24,'Ifako-Ijaiye',1000,1),
	(513,24,'Ikeja',1000,1),
	(514,24,'Ikorodu',1000,1),
	(515,24,'Kosofe',1000,1),
	(516,24,'Lagos-Island',1000,1),
	(517,24,'Lagos-Mainland',1000,1),
	(518,24,'Mushin',1000,1),
	(519,24,'Ojo',1000,1),
	(520,24,'Oshodi-Isolo',1000,1),
	(521,24,'Shomolu',1000,1),
	(522,24,'Suru-Lere',1000,1),
	(523,25,'Akwanga',1000,1),
	(524,25,'Awe',1000,1),
	(525,25,'Doma',1000,1),
	(526,25,'Karu',1000,1),
	(527,25,'Keana',1000,1),
	(528,25,'Keffi',1000,1),
	(529,25,'Kokona',1000,1),
	(530,25,'Lafia',1000,1),
	(531,25,'Nassarawa',1000,1),
	(532,25,'Nassarawa Eggon',1000,1),
	(533,25,'Obi',1000,1),
	(534,25,'Toto',1000,1),
	(535,25,'Wamba',1000,1),
	(536,26,'Agaie',1000,1),
	(537,26,'Agwara',1000,1),
	(538,26,'Bida',1000,1),
	(539,26,'Borgu',1000,1),
	(540,26,'Bosso',1000,1),
	(541,26,'Chanchaga',1000,1),
	(542,26,'Edati',1000,1),
	(543,26,'Gbako',1000,1),
	(544,26,'Gurara',1000,1),
	(545,26,'Katcha',1000,1),
	(546,26,'Kontagora',1000,1),
	(547,26,'Lapai',1000,1),
	(548,26,'Lavum',1000,1),
	(549,26,'Magama',1000,1),
	(550,26,'Mariga',1000,1),
	(551,26,'Mashegu',1000,1),
	(552,26,'Mokwa',1000,1),
	(553,26,'Muya',1000,1),
	(554,26,'Paikoro',1000,1),
	(555,26,'Rafi',1000,1),
	(556,26,'Rajau',1000,1),
	(557,26,'Shiroro',1000,1),
	(558,26,'Suleja',1000,1),
	(559,26,'Tafa',1000,1),
	(560,26,'Wushishi',1000,1),
	(561,27,'Abeokuta -North',1000,1),
	(562,27,'Abeokuta -South',1000,1),
	(563,27,'Ado-Odu/Ota',1000,1),
	(564,27,'Yewa-North',1000,1),
	(565,27,'Yewa-South',1000,1),
	(566,27,'Ewekoro',1000,1),
	(567,27,'Ifo',1000,1),
	(568,27,'Ijebu East',1000,1),
	(569,27,'Ijebu North',1000,1),
	(570,27,'Ijebu North-East',1000,1),
	(571,27,'Ijebu-Ode',1000,1),
	(572,27,'Ikenne',1000,1),
	(573,27,'Imeko-Afon',1000,1),
	(574,27,'Ipokia',1000,1),
	(575,27,'Obafemi -Owode',1000,1),
	(576,27,'Odeda',1000,1),
	(577,27,'Odogbolu',1000,1),
	(578,27,'Ogun-Water Side',1000,1),
	(579,27,'Remo-North',1000,1),
	(580,27,'Shagamu',1000,1),
	(581,28,'Akoko-North-East',1000,1),
	(582,28,'Akoko-North-West',1000,1),
	(583,28,'Akoko-South-West',1000,1),
	(584,28,'Akoko-South-East',1000,1),
	(585,28,'Akure- South',1000,1),
	(586,28,'Akure-North',1000,1),
	(587,28,'Ese-Odo',1000,1),
	(588,28,'Idanre',1000,1),
	(589,28,'Ifedore',1000,1),
	(590,28,'Ilaje',1000,1),
	(591,28,'Ile-Oluji-Okeigbo',1000,1),
	(592,28,'Irele',1000,1),
	(593,28,'Odigbo',1000,1),
	(594,28,'Okitipupa',1000,1),
	(595,28,'Ondo-West',1000,1),
	(596,28,'Ondo East',1000,1),
	(597,28,'Ose',1000,1),
	(598,28,'Owo',1000,1),
	(599,29,'Atakumosa',1000,1),
	(600,29,'Atakumosa East',1000,1),
	(601,29,'Ayeda-Ade',1000,1),
	(602,29,'Ayedire',1000,1),
	(603,29,'Boluwaduro',1000,1),
	(604,29,'Boripe',1000,1),
	(605,29,'Ede',1000,1),
	(606,29,'Ede North',1000,1),
	(607,29,'Egbedore',1000,1),
	(608,29,'Ejigbo',1000,1),
	(609,29,'Ife',1000,1),
	(610,29,'Ife East',1000,1),
	(611,29,'Ife North',1000,1),
	(612,29,'Ife South',1000,1),
	(613,29,'Ifedayo',1000,1),
	(614,29,'Ifelodun',1000,1),
	(615,29,'Ila',1000,1),
	(616,29,'Ilesha',1000,1),
	(617,29,'Ilesha-West',1000,1),
	(618,29,'Irepodun',1000,1),
	(619,29,'Irewole',1000,1),
	(620,29,'Isokun',1000,1),
	(621,29,'Iwo',1000,1),
	(622,29,'Obokun',1000,1),
	(623,29,'Odo-Otin',1000,1),
	(624,29,'Ola Oluwa',1000,1),
	(625,29,'Olorunda',1000,1),
	(626,29,'Ori-Ade',1000,1),
	(627,29,'Orolu',1000,1),
	(628,29,'Osogbo',1000,1),
	(629,30,'Afijio',1000,1),
	(630,30,'Akinyele',1000,1),
	(631,30,'Atiba',1000,1),
	(632,30,'Atisbo',1000,1),
	(633,30,'Egbeda',1000,1),
	(634,30,'Ibadan-Central',1000,1),
	(635,30,'Ibadan-North-East',1000,1),
	(636,30,'Ibadan-North-West',1000,1),
	(637,30,'Ibadan-South-East',1000,1),
	(638,30,'Ibadan-South West',1000,1),
	(639,30,'Ibarapa-Central',1000,1),
	(640,30,'Ibarapa-East',1000,1),
	(641,30,'Ibarapa-North',1000,1),
	(642,30,'Ido',1000,1),
	(643,30,'Ifedayo',1000,1),
	(644,30,'Ifeloju',1000,1),
	(645,30,'Irepo',1000,1),
	(646,30,'Iseyin',1000,1),
	(647,30,'Itesiwaju',1000,1),
	(648,30,'Iwajowa',1000,1),
	(649,30,'Kajola',1000,1),
	(650,30,'Lagelu',1000,1),
	(651,30,'Odo-Oluwa',1000,1),
	(652,30,'Ogbomoso-North',1000,1),
	(653,30,'Ogbomosho-South',1000,1),
	(654,30,'Olorunsogo',1000,1),
	(655,30,'Oluyole',1000,1),
	(656,30,'Ona-Ara',1000,1),
	(657,30,'Orelope',1000,1),
	(658,30,'Ori-Ire',1000,1),
	(659,30,'Oyo East',1000,1),
	(660,30,'Oyo West',1000,1),
	(661,30,'saki east',1000,1),
	(662,30,'Saki West',1000,1),
	(663,30,'Surulere',1000,1),
	(664,31,'Barkin Ladi',1000,1),
	(665,31,'Bassa',1000,1),
	(666,31,'Bokkos',1000,1),
	(667,31,'Jos-East',1000,1),
	(668,31,'Jos-South',1000,1),
	(669,31,'Jos-North',1000,1),
	(670,31,'Kanam',1000,1),
	(671,31,'Kanke',1000,1),
	(672,31,'Langtang North',1000,1),
	(673,31,'Langtang South',1000,1),
	(674,31,'Mangu',1000,1),
	(675,31,'Mikang',1000,1),
	(676,31,'Pankshin',1000,1),
	(677,31,'Quan\'pan',1000,1),
	(678,31,'Riyom',1000,1),
	(679,31,'Shendam',1000,1),
	(680,31,'Wase',1000,1),
	(681,32,'Abua/Odual',1000,1),
	(682,32,'Ahoada East',1000,1),
	(683,32,'Ahoada West',1000,1),
	(684,32,'Akukutoru',1000,1),
	(685,32,'Andoni',1000,1),
	(686,32,'Asari-Toro',1000,1),
	(687,32,'Bonny',1000,1),
	(688,32,'Degema',1000,1),
	(689,32,'Eleme',1000,1),
	(690,32,'Emuoha',1000,1),
	(691,32,'Etche',1000,1),
	(692,32,'Gokana',1000,1),
	(693,32,'Ikwerre',1000,1),
	(694,32,'Khana',1000,1),
	(695,32,'Obio/Akpor',1000,1),
	(696,32,'Ogba/Egbama/Ndoni',1000,1),
	(697,32,'Ogu/Bolo',1000,1),
	(698,32,'Okrika',1000,1),
	(699,32,'Omuma',1000,1),
	(700,32,'Opobo/Nkoro',1000,1),
	(701,32,'Oyigbo',1000,1),
	(702,32,'Port-Harcourt',1000,1),
	(703,32,'Tai',1000,1),
	(704,33,'Binji',1000,1),
	(705,33,'Bodinga',1000,1),
	(706,33,'Dange-Shuni',1000,1),
	(707,33,'Gada',1000,1),
	(708,33,'Goronyo',1000,1),
	(709,33,'Gudu',1000,1),
	(710,33,'Gwadabawa',1000,1),
	(711,33,'Illela',1000,1),
	(712,33,'Isa',1000,1),
	(713,33,'Kebbe',1000,1),
	(714,33,'Kware',1000,1),
	(715,33,'Raba',1000,1),
	(716,33,'Sabon-Birni',1000,1),
	(717,33,'Shagari',1000,1),
	(718,33,'Silame',1000,1),
	(719,33,'Sokoto North',1000,1),
	(720,33,'Sokoto South',1000,1),
	(721,33,'Tambuwal',1000,1),
	(722,33,'Tanzaga',1000,1),
	(723,33,'Tureta',1000,1),
	(724,33,'Wamakko',1000,1),
	(725,33,'Wurno',1000,1),
	(726,33,'Yabo',1000,1),
	(727,34,'Ardo Kola',1000,1),
	(728,34,'Bali',1000,1),
	(729,34,'Donga',1000,1),
	(730,34,'Gashaka',1000,1),
	(731,34,'Gassol',1000,1),
	(732,34,'Ibi',1000,1),
	(733,34,'Jalingo',1000,1),
	(734,34,'Karim-Lamido',1000,1),
	(735,34,'Kurmi',1000,1),
	(736,34,'Lau',1000,1),
	(737,34,'Sardauna',1000,1),
	(738,34,'Takum',1000,1),
	(739,34,'Ussa',1000,1),
	(740,34,'Wukari',1000,1),
	(741,34,'Yarro',1000,1),
	(742,34,'Zing',1000,1),
	(743,35,'Bade',1000,1),
	(744,35,'Bursali',1000,1),
	(745,35,'Damaturu',1000,1),
	(746,35,'Fuka',1000,1),
	(747,35,'Fune',1000,1),
	(748,35,'Geidam',1000,1),
	(749,35,'Gogaram',1000,1),
	(750,35,'Gujba',1000,1),
	(751,35,'Gulani',1000,1),
	(752,35,'Jakusko',1000,1),
	(753,35,'Karasuwa',1000,1),
	(754,35,'Machina',1000,1),
	(755,35,'Nangere',1000,1),
	(756,35,'Nguru',1000,1),
	(757,35,'Potiskum',1000,1),
	(758,35,'Tarmua',1000,1),
	(759,35,'Yunisari',1000,1),
	(760,35,'Yusufari',1000,1),
	(761,36,'Anka',1000,1),
	(762,36,'Bakure',1000,1),
	(763,36,'Bukkuyum',1000,1),
	(764,36,'Bungudo',1000,1),
	(765,36,'Gumi',1000,1),
	(766,36,'Gusau',1000,1),
	(767,36,'Isa',1000,1),
	(768,36,'Kaura-Namoda',1000,1),
	(769,36,'Kiyawa',1000,1),
	(770,36,'Maradun',1000,1),
	(771,36,'Marau',1000,1),
	(772,36,'Shinkafa',1000,1),
	(773,36,'Talata-Mafara',1000,1),
	(774,36,'Tsafe',1000,1),
	(775,36,'Zurmi',1000,1),
	(776,9,'Obudu',1000,1),
	(777,37,'Abaji',1000,1),
	(778,37,'Bwari',1000,1),
	(779,37,'Gwagwalada',1000,1),
	(780,37,'Kuje',1000,1),
	(781,37,'Kwali',1000,1),
	(782,37,'Municipal',1000,1),
	(783,12,'Etsako-East',1000,1),
	(784,16,'Ahiazu-Mbaise',1000,1),
	(785,38,'Foreign',1000,1),
	(786,18,'Kaduna South',1000,1),
	(787,16,'Aboh-Mbaise',1000,1),
	(788,9,'Odukpani',1000,1),
	(789,9,'Obubra',1000,1),
	(790,4,'Anambra East',1000,1);

/*!40000 ALTER TABLE `lga` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table news_events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `news_events`;

CREATE TABLE `news_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `iType` tinyint(2) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `hot_news` tinyint(1) NOT NULL,
  `title` varchar(50) NOT NULL,
  `display_line` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `position` int(5) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `archived` tinyint(1) NOT NULL,
  `author` varchar(70) NOT NULL,
  `verified_by` varchar(70) NOT NULL,
  `created_year` year(4) NOT NULL,
  `created_time` time NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table personal_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `personal_details`;

CREATE TABLE `personal_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programme_id` int(3) NOT NULL,
  `matriculation_no` varchar(20) NOT NULL,
  `title_id` int(2) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `gender_id` tinyint(1) NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT '',
  `phone_number` varchar(15) NOT NULL DEFAULT '',
  `contact_address` text NOT NULL,
  `mode_of_entry_id` tinyint(1) NOT NULL,
  `year_of_graduation` year(4) NOT NULL,
  `year_of_entry` year(4) NOT NULL,
  `city_id` int(5) NOT NULL,
  `state_id` int(3) NOT NULL,
  `receiving_address` text NOT NULL,
  `applied` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `flag` tinyint(1) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `mail_validation` int(1) NOT NULL,
  `captcha` varchar(10) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `programme_id` (`programme_id`),
  KEY `title_id` (`title_id`),
  KEY `mode_of_entry_id` (`mode_of_entry_id`),
  KEY `gender_id` (`gender_id`),
  KEY `city_id` (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `personal_details` WRITE;
/*!40000 ALTER TABLE `personal_details` DISABLE KEYS */;

INSERT INTO `personal_details` (`id`, `programme_id`, `matriculation_no`, `title_id`, `full_name`, `gender_id`, `date_of_birth`, `email`, `password`, `phone_number`, `contact_address`, `mode_of_entry_id`, `year_of_graduation`, `year_of_entry`, `city_id`, `state_id`, `receiving_address`, `applied`, `created_at`, `updated_at`, `last_login`, `flag`, `visible`, `mail_validation`, `captcha`)
VALUES
	(1,1,'uj/2004/ns/0987',1,'Mohammed Ahmed Ghaji',2,'1985-10-03','mohammedghaji@gmail.com','daaeb0893724461ac083047b0bbb6160','08077766788','&lt;p&gt;University Staff Quarters, Jos, Plateau State&lt;/p&gt;',1,'2008','2004',0,0,'&lt;p&gt;University of Ibadan, Ibadan&lt;/p&gt;',1,'2015-09-29 00:00:00','2015-10-13 14:11:55','2015-10-16 07:58:13',0,1,1,'34XCVB');

/*!40000 ALTER TABLE `personal_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table programme_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `programme_category`;

CREATE TABLE `programme_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_description` varchar(60) NOT NULL,
  `cat_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table programmes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `programmes`;

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `programme_name` varchar(100) NOT NULL DEFAULT '',
  `department_id` int(11) NOT NULL DEFAULT '0',
  `qualificaton_type_id` int(11) NOT NULL DEFAULT '0',
  `programme_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `qualification_type_id` (`qualificaton_type_id`),
  KEY `department_id` (`department_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `programmes` WRITE;
/*!40000 ALTER TABLE `programmes` DISABLE KEYS */;

INSERT INTO `programmes` (`id`, `programme_name`, `department_id`, `qualificaton_type_id`, `programme_visible`)
VALUES
	(1,'English Language',1,1,1),
	(2,'English Literature',1,1,1),
	(3,'History/Intn\'l. Studies',2,1,1),
	(4,'French',3,1,1),
	(5,'French/Linguistics',3,1,1),
	(6,'Languages/Linguistics',3,1,1),
	(7,'Arabic Studies',4,1,1),
	(8,'Christian Religious Studies',4,1,1),
	(9,'Islamic Studies',4,1,1),
	(10,'Religion and Philosophy',4,1,1),
	(11,'African Traditional Religion',4,1,1),
	(12,'Theatre Arts',5,1,1),
	(13,'Mass Communication',33,1,1),
	(14,'Special Education',8,1,1),
	(15,'English Education',39,1,1),
	(16,'Economics Education',6,1,1),
	(17,'French Education',39,1,1),
	(18,'History/Intn\'l. Studies Education',39,1,1),
	(19,'Religion Education',39,1,1),
	(20,'Educational Administration and Planning',36,1,1),
	(21,'Adult Education',36,1,1),
	(22,'Guidance and Counselling',36,1,1),
	(23,'Social Studies',6,1,1),
	(24,'Biology Education',7,1,1),
	(25,'Chemistry Education',7,1,1),
	(26,'Geography Education',7,1,1),
	(27,'Mathematics Education',7,1,1),
	(28,'Physics Education',7,1,1),
	(29,'Special Education (Without Teaching Subjects)',8,1,1),
	(30,'Special Education (With Teaching Subjects)',8,1,1),
	(31,'Special Education (Rehabilitation Sciences)',8,1,1),
	(32,'Architecture',9,1,1),
	(33,'Building',10,1,1),
	(34,'Geography and Planning',11,1,1),
	(35,'Law',12,4,1),
	(36,'Anatomy',13,1,1),
	(37,'Medicine',13,1,1),
	(38,'Biochemistry',28,1,1),
	(39,'Plant Science And Technology',14,1,1),
	(40,'Chemistry',15,1,1),
	(41,'Geology',16,1,1),
	(42,'Computer Science',54,1,1),
	(43,'Mathematics',17,1,1),
	(44,'Statistics',17,1,1),
	(45,'Microbiology',18,1,1),
	(46,'Physics',19,1,1),
	(47,'Zoology',20,1,1),
	(48,'Pharmacy',21,5,1),
	(49,'Accounting',22,1,1),
	(50,'Economics',23,1,1),
	(51,'Psychology',24,1,1),
	(52,'Management Science',25,1,1),
	(53,'Political Science',26,1,1),
	(54,'Sociology',27,1,1),
	(56,'Nursing',29,1,1),
	(57,'Home Economics Education',7,3,1),
	(58,'Construction Technology Education',7,3,1),
	(59,'Industrial Chemistry',15,1,1),
	(60,'English/Linguistics',3,1,0),
	(61,'Special Education & Rehabilitation Sciences - LD(Biology)',8,1,1),
	(62,'Special Education & Rehabilitation Sciences - LD(Integrated Science)',8,1,1),
	(63,'Special Education & Rehabilitation Sciences - LD(Chemistry)',8,1,1),
	(64,'Special Education & Rehabilitation Sciences - LD(Geography)',8,1,1),
	(65,'Special Education & Rehabilitation Sciences - LD(Mathematics)',8,1,1),
	(66,'Special Education & Rehabilitation Sciences - LD(Physics)',8,1,1),
	(67,'Special Education & Rehabilitation Sciences - LD(History)',8,1,1),
	(68,'Special Education & Rehabilitation Sciences - LD(Economics)',8,1,1),
	(69,'Special Education & Rehabilitation Sciences - LD(Social Studies)',8,1,1),
	(70,'Special Education & Rehabilitation Sciences - LD(English)',8,1,1),
	(71,'Special Education & Rehabilitation Sciences - LD(Religous Studies)',8,1,1),
	(72,'Special Education & Rehabilitation Sciences - LD(French)',8,1,1),
	(73,'Special Education & Rehabilitation Sciences - HH(Biology)',8,1,1),
	(74,'Special Education & Rehabilitation Sciences - HH(Integrated Science)',8,1,1),
	(75,'Special Education & Rehabilitation Sciences - HH(Chemistry)',8,1,1),
	(76,'Special Education & Rehabilitation Sciences - HH(Geography)',8,1,1),
	(77,'Special Education & Rehabilitation Sciences - HH(Mathematics)',8,1,1),
	(78,'Special Education & Rehabilitation Sciences - HH(Physics)',8,1,1),
	(79,'Special Education & Rehabilitation Sciences - HH(History)',8,1,1),
	(80,'Special Education & Rehabilitation Sciences - HH(Economics)',8,1,1),
	(81,'Special Education & Rehabilitation Sciences - HH(Social Studies)',8,1,1),
	(82,'Special Education & Rehabilitation Sciences - HH(English)',8,1,1),
	(83,'Special Education & Rehabilitation Sciences - HH(Religous Studies)',8,1,1),
	(84,'Special Education & Rehabilitation Sciences - HH(French)',8,1,1),
	(85,'Special Education & Rehabilitation Sciences - VH(Biology)',8,1,1),
	(86,'Special Education & Rehabilitation Sciences - VH(Integrated Science)',8,1,1),
	(87,'Special Education & Rehabilitation Sciences - VH(Chemistry)',8,1,1),
	(88,'Special Education & Rehabilitation Sciences - VH(Geography)',8,1,1),
	(89,'Special Education & Rehabilitation Sciences - VH(Mathematics)',8,1,1),
	(90,'Special Education & Rehabilitation Sciences - VH(Physics)',8,1,1),
	(91,'Special Education & Rehabilitation Sciences - VH(History)',8,1,1),
	(92,'Special Education & Rehabilitation Sciences - VH(Economics)',8,1,1),
	(93,'Special Education & Rehabilitation Sciences - VH(Social Studies)',8,1,1),
	(94,'Special Education & Rehabilitation Sciences - VH(English)',8,1,1),
	(95,'Special Education & Rehabilitation Sciences - VH(Religous Studies)',8,1,1),
	(96,'Special Education & Rehabilitation Sciences - VH(French)',8,1,1),
	(97,'Linguistics(Major)',3,1,1),
	(98,'English Linguistics',3,1,1),
	(99,'Guidance and Counseling(Economics)',36,1,1),
	(100,'Guidance and Counseling(History)',36,1,1),
	(101,'Guidance and Counseling(English)',36,1,1),
	(102,'Guidance and Counseling(Social Studies)',36,1,1),
	(103,'Educational Administration and Planning(SOS)',36,1,1),
	(104,'Educational Administration and Planning(Economics)',36,1,1),
	(105,'Educational Administration and Planning(English)',36,1,1),
	(106,'Educational Administration and Planning(Religion)',36,1,1),
	(107,'Educational Administration and Planning(History)',36,1,1),
	(108,'Christian Religious Studies Education',40,1,1),
	(109,'Political Science Education',1,1,1),
	(110,'Library And Information Science',6,1,1),
	(111,'Medical Laboratory Sciences',32,6,1),
	(112,'Adult Education(Social Studies)',6,1,1),
	(113,'Adult Education(English)',6,1,1),
	(114,'Adult Education(Economics)',6,1,1),
	(115,'Adult Education(Religion)',6,1,1),
	(116,'Quantity Surveying',10,1,1),
	(117,'Estate Management',10,1,1),
	(118,'Guidance and Counseling(CRS)',36,1,1),
	(119,'Science Laboratory Technology(SLT)',34,6,1),
	(123,'Special Education Without Teaching Subjects(HH)',8,1,1),
	(124,'Special Education Without Teaching Subjects(LD)',8,1,1),
	(125,'Early Chilhood',36,1,1),
	(126,'Technical Education',7,1,1),
	(127,'M.A. English Language',1,1,0),
	(128,'M.A. Literature in English',1,1,0),
	(129,'M.Phil English Language',1,1,0),
	(130,'M.Phil Litreature in English',1,1,0),
	(131,'Ph.D English Language',1,1,0),
	(132,'Ph.D Litreature in English',1,1,0),
	(133,'M.A. Nigerian History(Central Nigeria)',2,1,0),
	(134,'M.A. Economic History',2,1,0),
	(135,'M.Phil/Ph.D Nigerian History(Central Nigeria)',2,1,0),
	(136,'M.Phil/Ph.D Economic History',2,1,0),
	(137,'Ph.D Nigerian History(Central Nigeria)',2,1,0),
	(138,'Ph.D Economic History',2,1,0),
	(139,'M.A. Ethics and Philosophy',4,1,0),
	(140,'M.A. African Traditional Religion',4,1,0),
	(141,'M.A.Church History',4,1,0),
	(142,'M.A. New Testament',4,1,0),
	(143,'M.A. Old Testament',4,1,0),
	(144,'M.A. Arabic',4,1,0),
	(145,'M.A. Islamic Studies',4,1,0),
	(146,'M.A. Interaction of Religion',4,1,0),
	(147,'M.A. Sociology of Religion',4,1,0),
	(148,'M.Phil African Traditional Religion',4,1,0),
	(149,'M.Phil/Ph.D Church History',4,1,0),
	(150,'M.Phil/Ph.D New Testament',4,1,0),
	(151,'M.Phil/Ph.D Old Testament',4,1,0),
	(152,'M.Phil/Ph.D Interaction of Religion',4,1,0),
	(153,'M.Phil Sociology of Religions',4,1,0),
	(154,'M.Phil/Ph.D Ethics and Philosophy',4,1,0),
	(155,'Ph.D African Traditional Religion',4,1,0),
	(156,'Ph.D Church History',4,1,0),
	(157,'Ph.D New Testament',4,1,0),
	(158,'Ph.D Old Testament',4,1,0),
	(159,'Ph.D Interaction of Religion',4,1,0),
	(160,'Ph.D Sociology of Religions',4,1,0),
	(161,'M.A. Play Directing/Production',5,1,0),
	(162,'M.A. Dramatic Litreature',5,1,0),
	(163,'M.A. Play Creating',5,1,0),
	(164,'M.Phil Dramatic Litreature',5,1,0),
	(165,'M.Phil Play Creating',5,1,0),
	(166,'M.Phil Play Directing/Production',5,1,0),
	(167,'Ph.D Play Directing/Production',5,1,0),
	(168,'Ph.D Dramatic Litreature',5,1,0),
	(169,'Ph.D Play Creating',5,1,0),
	(170,'M.ED Hearing Handicap',8,1,0),
	(171,'M.ED Learning Disabilities',8,1,0),
	(172,'M.ED Visual Handicaps',8,1,0),
	(173,'M.Phil/Ph.D Hearing Handicap',8,1,0),
	(174,'M.Phil/Ph.D Learning Disabilities',8,1,0),
	(175,'M.Phil/Ph.D Visual Handicaps',8,1,0),
	(176,'Ph.D Hearing Handicap',8,1,0),
	(177,'Ph.D Learning Disabilities',8,1,0),
	(178,'Ph.D Visual Handicaps',8,1,0),
	(179,'M.ED Guidance and Counseling',6,1,0),
	(180,'M.ED Social Studies Education',6,1,0),
	(181,'M.ED Philosophy of Education',6,1,0),
	(182,'M.ED Sociology of Education',6,1,0),
	(183,'M.ED Psycology of Education',6,1,0),
	(184,'M.ED Christian Religion Education',6,1,0),
	(185,'MA.ED History and International Studies Education',6,1,0),
	(186,'M.ED Test and Measurement',6,1,0),
	(187,'M.ED Educational Administration and Planning',6,1,0),
	(188,'M.Phil Guidance and Counseling',6,1,0),
	(189,'M.Phil Social Studies Education',6,1,0),
	(190,'M.Phil Philosophy of Education',6,1,0),
	(191,'M.ED English Education',6,1,0),
	(192,'M.Phil English Education',6,1,0),
	(193,'M.Phil Sociology of Education',6,1,0),
	(194,'M.Phil/Ph.d Educational Psychology',6,1,0),
	(195,'M.Phil Christian Religion Education',6,1,0),
	(196,'M.Phil History Education',6,1,0),
	(197,'M.Phil Test and Measurement',6,1,0),
	(198,'M.Phil Educational Administration and Planning',6,1,0),
	(199,'Ph.D Guidance and Counseling',6,1,0),
	(200,'Ph.D Social Studies Education',6,1,0),
	(201,'Ph.D Philosophy of Education',6,1,0),
	(202,'Ph.D English Education',6,1,0),
	(203,'Ph.D Sociology of Education',6,1,0),
	(204,'Ph.D Psycology of Education(Child Development)',6,1,0),
	(205,'Ph.D Christian Religion Education',6,1,0),
	(206,'Ph.D History Education',6,1,0),
	(207,'Ph.D Test and Measurement',6,1,0),
	(208,'Ph.D Educational Administration and Planning',6,1,0),
	(209,'M.ED Science Education',7,1,0),
	(210,'M.ED Curriculum Planning and Development',7,1,0),
	(211,'M.Sc. Education in Biology',7,1,0),
	(212,'M.Sc. Education in Chemistry',7,1,0),
	(213,'M.Sc. Education in Physics',7,1,0),
	(214,'M.Sc. Education in Geography',7,1,0),
	(215,'M.Sc. Education in Mathematics',7,1,0),
	(216,'M.Phil Curriculum Planning and Development',7,1,0),
	(217,'M.Phil/Ph.D Science Education',7,1,0),
	(218,'M.Phil/Ph.D Education in Biology',7,1,0),
	(219,'M.Phil/Ph.D Education in Chemistry',7,1,0),
	(220,'M.Phil/Ph.D Education in Physics',7,1,0),
	(221,'M.Phil Education in Geography',7,1,0),
	(222,'M.Phil Education in Mathematics',7,1,0),
	(223,'Ph.D Science Education',7,1,0),
	(224,'Ph.D Curriculum Planning and Development',7,1,0),
	(225,'Ph.D Education in Biology',7,1,0),
	(226,'Ph.D Education in Chemistry',7,1,0),
	(227,'Ph.D Education in Physics',7,1,0),
	(228,'M.Sc. Education in Geography',7,1,0),
	(229,'Ph.D Education in Mathematics',7,1,0),
	(230,'M.Sc. Architecture',9,1,0),
	(231,'Postgraduate Diploma in Architecture (PGDARCH)',9,1,0),
	(232,'M.Sc. Construction Management',10,1,0),
	(233,'M.Sc. Construction Technology',10,1,0),
	(234,'M.Phil/Ph.D Construction Management',10,1,0),
	(235,'M.Phil/Ph.D Construction Materials',10,1,0),
	(236,'Ph.D Construction Management',10,1,0),
	(237,'Ph.D Construction Materials',10,1,0),
	(238,'M.Sc. Environmental and Resources Planning (ERP)',11,1,0),
	(239,'M.Sc. Population and Man Power Planning(PMP)',11,1,0),
	(240,'M.Sc. Urban and Regional Planning(URP)',11,1,0),
	(241,'M.Phil Environmental and Resources Planning (ERP)',11,1,0),
	(242,'M.Phil Population and Man Power Planning(PMP)',11,1,0),
	(243,'M.Phil Urban and Regional Planning(URP)',11,1,0),
	(244,'Ph.D Environmental and Resources Planning (ERP)',11,1,0),
	(245,'Ph.D Population and Man Power Planning(PMP)',11,1,0),
	(246,'Ph.D Urban and Regional Planning(URP)',11,1,0),
	(247,'Masters Programme in Law(LLM)',12,1,0),
	(248,'M.Sc. Medical Microbiology',18,1,0),
	(249,'M.Phil Medical Microbiology',18,1,0),
	(250,'M.Phil/Ph.D Law',12,1,0),
	(251,'Ph.D Medical Microbiology',18,1,0),
	(252,'M.A Law and Diplomacy',12,1,0),
	(253,'M.Phil/Ph.D Law and Diplomacy',12,1,0),
	(254,'Ph.D Law(LLM)',12,1,0),
	(255,'Ph.D Law and Diplomacy',12,1,0),
	(256,'Masters Programme of Laws in Telecommunication Law',12,1,0),
	(257,'M.Sc. Biochemistry',28,1,0),
	(258,'M.Phil Biochemistry',28,1,0),
	(259,'Ph.D Biochemistry',28,1,0),
	(260,'M.Sc. Human Physiology',33,1,0),
	(261,'M.Phil Human Physiology',33,1,0),
	(262,'Ph.D Human Physiology',33,1,0),
	(263,'M.D Human Physiology',33,1,0),
	(264,'M.Sc. Cytogenetics and Plant Breeding',14,1,0),
	(265,'M.Sc. Applied Microbiology and Plant Pathology',14,1,0),
	(266,'M.Phil / Ph.D Cytogenetics and Plant Breeding',14,1,0),
	(267,'M.Phil/Ph.D Applied Microbiology and Plant Pathology',14,1,0),
	(268,'M.Sc. Applied Analytical Chemistry',15,1,0),
	(269,'M.Sc. Applied Inorganic Chemistry',15,1,0),
	(270,'M.Sc. Applied Organic Chemistry',15,1,0),
	(271,'M.Sc. Applied Physical Chemistry',15,1,0),
	(272,'M.Phil/Ph.D Applied Analytical Chemistry',15,1,0),
	(273,'M.Phil/Ph.D Applied Inorganic Chemistry',15,1,0),
	(274,'M.Phil/Ph.D Applied Organic Chemistry',15,1,0),
	(275,'M.Phil/Ph.D Applied Physical Chemistry',15,1,0),
	(276,'Ph.D Applied Organic Chemistry',15,1,0),
	(277,'Ph.D Applied Analytical Chemistry',15,1,0),
	(278,'Ph.D Applied Inorganic Chemistry',15,1,0),
	(279,'Ph.D Applied Physical Chemistry',15,1,0),
	(280,'Postgraduate Diploma in Environmental and Industrial Chemistry',15,1,0),
	(281,'M.Sc. Mineral Exploration',16,1,0),
	(282,'M.Sc. Engineering Geology and Hydrogeology',16,1,0),
	(283,'M.Phil Geophysics',16,1,0),
	(284,'M.Phil Ore Geology',16,1,0),
	(285,'M.Phil Geochemistry',16,1,0),
	(286,'Ph.D Geophysics',16,1,0),
	(287,'Ph.D Ore Geology',16,1,0),
	(288,'M.Phil Geochemistry',16,1,0),
	(289,'Postgraduate Diploma in Mining Geology(PDMG)',16,1,0),
	(290,'Postgraduate Diploma in Environmental Geology(PDEG)',16,1,0),
	(291,'M.Sc. Complex Analysis',17,1,0),
	(292,'M.Sc. Abstract Algebra',17,1,0),
	(293,'M.Sc. Numerical Analysis',17,1,0),
	(294,'M.Phil Numerical Analysis',17,1,0),
	(295,'M.Phil Abstract Algebra',17,1,0),
	(296,'M.Phil Complex Analysis',17,1,0),
	(297,'Ph.D Numerical Analysis',17,1,0),
	(298,'Ph.D Complex Analysis',17,1,0),
	(299,'Ph.D Abstract Algebra',17,1,0),
	(300,'Postgraduate Diploma in Statistics',17,1,0),
	(301,'M.Sc. Theoretical Solid State and Quantum Physics',19,1,0),
	(302,'M.Sc. Applied Physics(Acoustics)',19,1,0),
	(303,'M.Sc. Applied Physics(Atmospheric Physics)',19,1,0),
	(304,'M.Sc. Applied Physics(Biophysics)',19,1,0),
	(305,'M.Sc. Applied Physics(Electronics and Comunications)',19,1,0),
	(306,'M.Phil Physics(Atmospheric Aerosols and Pollution)',19,1,0),
	(307,'M.Phil Physics(Medical Physics)',19,1,0),
	(308,'M.Phil Physics(Applied Acoustics)',19,1,0),
	(309,'Ph.D Physics(Applied Acoustics)',19,1,0),
	(310,'Ph.D Physics(Medical Physics)',19,1,0),
	(311,'Ph.D Physics(Applied Acoustics)',19,1,0),
	(312,'Postgraduate Diploma in Electronics Electrical Technology and Physics',19,1,0),
	(313,'M.Sc. Applied Entomology and Parasitology',20,1,0),
	(314,'M.Sc. Applied Hybrobiology and Fisheries',20,1,0),
	(315,'M.Sc. Conservation Biology',20,1,0),
	(316,'M.Phil Parasitology',20,1,0),
	(317,'M.Phil Entomology',20,1,0),
	(318,'M.Phil Hydrobiology and Fisheries',20,1,0),
	(319,'M.Phil/Ph.D Animal Physiology',20,1,0),
	(320,'Ph.D Parasitology',20,1,0),
	(321,'Ph.D Entomology',20,1,0),
	(322,'Ph.D Hydrobiology and Fisheries',20,1,0),
	(323,'Ph.D Animal and Physiology',20,1,0),
	(324,'M.Sc. Pharmacology',21,1,0),
	(325,'M.Phil Pharmacology',21,1,0),
	(326,'Ph.D Pharmacology',21,1,0),
	(327,'M.Sc. Pharmaceutical Chemistry',39,1,0),
	(328,'M.Phil Pharmaceutical Chemistry',39,1,0),
	(329,'Ph.D Pharmaceutical Chemistry',21,1,0),
	(330,'M.Sc. Economics',23,1,0),
	(331,'M.Phil Economics',23,1,0),
	(332,'Ph.D Economics',23,1,0),
	(333,'Masters in Public Administration(MPA)',26,1,0),
	(334,'M.Sc. International Relations and Strategic Studies',26,1,0),
	(335,'M.Sc. Political Science',26,1,0),
	(336,'Ph.D International Relations and Strategic Studies',26,1,0),
	(337,'M.Phil/Ph.D Political Economy and Development Studies',26,1,0),
	(338,'M.Phil/Ph.D Public Administration',26,1,0),
	(339,'M.Sc. Clinical Psychology',34,1,0),
	(340,'M.Sc.Organizational Psychology',34,1,0),
	(341,'M.Phil/Ph.D Clinical Psychology',34,1,0),
	(342,'M.Phil/Ph.D Organizational Psychology',34,1,0),
	(343,'Ph.D Clinical Psycology',34,1,0),
	(344,'Ph.D Organizational Psycology',34,1,0),
	(345,'M.Sc. Sociology',27,1,0),
	(346,'M.Phil Sociology',27,1,0),
	(347,'M.Phil Social Work/MSSW',27,1,0),
	(348,'M.Sc. Social Work/MSSW',27,1,0),
	(349,'Ph.D Sociology',27,1,0),
	(350,'Ph.D Social Work/MSSW',27,1,0),
	(351,'Postgraduate Diploma in Social Work/PGDSW',27,1,0),
	(352,'Postgraduate Diploma in Hiv/Aids Studies',27,1,0),
	(353,'Masters in Business Administration MBA',25,1,0),
	(354,'MBA Executive',25,1,0),
	(355,'M.Phil Management Studies',25,1,0),
	(356,'Ph.D Management Studies',25,1,0),
	(357,'M.Phil/Ph.D Law(Commercial Law)',12,1,0),
	(358,'Ph.D Law (Intl Law and Jur)',12,1,0),
	(359,'Ph.D Law (Private Law)',12,1,0),
	(360,'Ph.D Law (Public Law)',12,1,0),
	(361,'Postgraduate diploma in ICT Policy and Regulations',12,1,0),
	(362,'M.A History',2,1,0),
	(363,'M.Phil/Ph.D Biochemistry',28,1,0),
	(364,'M.Phil/Ph.D Human Physiology',33,1,0),
	(365,'M.Phil/Ph.D Medical Microbiology',18,1,0),
	(366,'M.Phil/Ph.D Chemistry',15,1,0),
	(367,'M.Sc. Chemistry',15,1,0),
	(368,'M.Phil/Ph.D Applied Microbiology',14,1,0),
	(369,'M.Phil/Ph.D Conservation Biology',20,1,0),
	(370,'M.Phil/Ph.D Hydrobiology and Fishries',20,1,0),
	(371,'M.Phil/Ph.D Entomology and Parasitology',20,1,0),
	(372,'M.sc. Mathematics',17,1,0),
	(373,'M.sc. Physics',19,1,0),
	(374,'M.Phil/Ph.D Physics',19,1,0),
	(375,'M.Sc. Mineral Exploration and Mining Geology',16,1,0),
	(376,'M.Phil/Ph.D Pharmaceutical Chemistry',39,1,0),
	(377,'Postgraduate Diploma in Management Science(PGDM)',25,1,0),
	(378,'M.Phil/Ph.D Management Studies',25,1,0),
	(379,'M.Phil/Ph.D General and applied Psychology',34,1,0),
	(380,'Postgraduate diploma in Education(PGDE)',32,1,0),
	(381,'M.Phil/Ph.D Sociology of Religions',4,1,0),
	(382,'M.Phil/Ph.D African Traditional Religion',4,1,0),
	(383,'M.Phil/Ph.D Curriculum Studies Education',7,1,0),
	(384,'M.Phil/Ph.D Mathematics Education',7,1,0),
	(385,'M.Phil/Ph.D Educational Technology',7,1,0),
	(386,'M.SC.(ED) Educational Technology',7,1,0),
	(387,'M.SC.(ED) (CURRICULUM EDUCATION)',7,1,0),
	(388,'M.Phil/Ph.D English Language',1,1,0),
	(389,'M.Phil/PH.D Special Education & Rehabilitation Sciences',8,1,0),
	(390,'M.Phil/Ph.D Mathematics',17,1,0),
	(391,'M.Phil/Ph D Pharmaceutical Technology',40,1,0),
	(392,'Msc Pharmaceutical Technology',40,1,0),
	(393,'MA Theatre Arts',5,1,0),
	(394,'M Phil/PhD Political Science',26,1,0),
	(395,'M Phil/PhD Theatre Arts',5,1,0),
	(396,'M Phil/PhD Educational Administration and Planning',6,1,0),
	(397,'Msc Political Economy and Developmental Studies',26,1,0),
	(398,'M Phil/PhD English Education',6,1,0),
	(399,'M Phil/PhD Sociology of Education',6,1,0),
	(400,'M Phil/PhD Guidance and Counseling',6,1,0),
	(401,'M Phil/PhD Philosophy of Education',6,1,0),
	(402,'M Phil/PhD Social Studies Education',6,1,0),
	(403,'M Phil/PhD Religion Education',6,1,0),
	(404,'M Phil/PhD History and International Studies Education',6,1,0),
	(405,'M Phil/PhD Test and Measurement Evaluation',6,1,0),
	(406,'M.ED Religion',6,1,0),
	(407,'M.ED Economics Education',6,1,0),
	(408,'M Phil/PhD Environmental and Resources Planning (ERP)',11,1,0),
	(409,'M Phil/PhD Urban and Regional Planning(URP)',11,1,0),
	(410,'M.Phil/PhD M.Phil Population and Man Power Planning(PMP)',11,1,0),
	(411,'Postgraduate diploma in Conflict Management and Peace Studies',36,1,0),
	(412,'M.Phil/Ph.D Obstetrics and Gynaecology',35,1,0),
	(413,'M. ED Special Education',8,1,0),
	(414,'M.Phil/PhD Economics',23,1,0),
	(415,'M Phil/PhD Sociology',27,1,0),
	(416,'M Phil/PhD History And International Studies',2,1,0),
	(417,'M Phil/PhD Social Works',27,1,0),
	(418,'M Phil/PhD Geology and Mining',16,1,0),
	(419,'M.Phil/Ph.D Psychology of Education',6,1,0),
	(420,'M.Phil/Ph.D Pharmacology',21,1,0),
	(421,'M.Phil/Ph.D Islamic Studies',4,1,0),
	(422,'M.Phil/Ph.D International Relations and Strategic Studies',26,1,0),
	(423,'M.A. African History',2,1,0),
	(424,'M.Sc. Accounting And Finance',22,1,0),
	(425,'M.Phil/Ph.D Accounting And Finance',22,1,0),
	(426,'M.Sc. Conflict Management and Peace Studies',36,1,0),
	(427,'M.Sc. Applied Physics',19,1,0),
	(428,'Masters in Public Health',37,1,0),
	(429,'M.A. Mass Communication',38,1,0),
	(430,'M.Phil/Ph.D Architecture',9,1,0),
	(431,'M.Phil/Ph.D Literature in English',1,1,0),
	(432,'M. A Hausa Language',3,1,0),
	(433,'Post Graduate Diploma in Accounting(PGDA)',22,1,0),
	(434,'M.A. Languages And Linguistics',3,1,0),
	(435,'M.A. History & International Studies',2,1,0),
	(436,'M.Phil/PhD Construction Technology',10,1,0),
	(437,'M.Phil/Ph.D Mineral Exploration and Mining Geology',16,1,0),
	(438,'M.Sc. Hydrobiology And Fisheries',20,1,0),
	(439,'M.Phil/Ph.D Languages And Linguistics',3,1,0),
	(440,'M.Phil/PhD Economics Education',6,1,0),
	(441,'M.Sc. Human Anatomy',31,1,0),
	(442,'M.Phil/PhD Human Anatomy',31,1,0),
	(443,'M.ED English Education',41,1,0),
	(444,'M Phil/PhD English Education',41,1,0),
	(445,'M.A.Ed History and International Studies Education',41,1,0),
	(446,'M Phil/PhD History and International Studies Education',41,1,0),
	(447,'M.ED Religion',41,1,0),
	(448,'M Phil/PhD Religion Education',41,1,0),
	(449,'M.Phil/PhD Geography Education',7,1,0),
	(450,'M.Ed Educational Psychology',34,1,0),
	(451,'M.Ed Educational Psychology',34,1,0),
	(464,'BANKING AND FINANCE',41,1,1),
	(465,'Archaeology',53,1,1),
	(467,'Special Education Without Teaching Subjects(VH)',8,1,1),
	(468,'Music',55,1,1),
	(469,'Estate Management',56,1,1),
	(470,'Urban & Regional Planing(URP)',57,1,1),
	(471,'Fine & Applied Arts',37,1,1),
	(472,'Quantity Surveying',59,1,1),
	(473,'Criminology & Security Studies',60,1,1),
	(474,'Insurance',61,1,1),
	(475,'Actuarial Science',62,1,1),
	(476,'Marketing',63,1,1),
	(477,'Civil Engineering',64,1,1),
	(478,'Mechanical Engineering',65,1,1),
	(479,'Electrical Electronics Engineering',66,1,1),
	(480,'Mining Engineering',67,1,1),
	(481,'Agricultural Economics & Extension',68,1,1),
	(482,'Animal Production',69,1,1),
	(483,'Crop Production',70,1,1),
	(484,'Veterinary Medicine',71,1,1),
	(485,'Integrated Science Education',72,1,1),
	(486,'Physical and Health Education',73,1,1),
	(487,'Special Education (Visual Handicap)',8,1,1),
	(488,'Special Education (Learning Disabilities)',8,1,1),
	(489,'Special Education (Hearing Handicap)',8,1,1),
	(490,'Computer  Science Education',7,1,1),
	(491,'Dental surgery',75,0,1);

/*!40000 ALTER TABLE `programmes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table qualification
# ------------------------------------------------------------

DROP TABLE IF EXISTS `qualification`;

CREATE TABLE `qualification` (
  `qualificaton_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `qualification_type_name` varchar(100) NOT NULL,
  `qualification_type_code` varchar(10) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`qualificaton_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_description` varchar(30) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table state
# ------------------------------------------------------------

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `state_id` int(6) NOT NULL,
  `state_name` varchar(20) NOT NULL,
  `visible` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;

INSERT INTO `state` (`state_id`, `state_name`, `visible`)
VALUES
	(1,'Abia',1),
	(2,'Adamawa',1),
	(3,'Akwa Ibom',1),
	(4,'Anambra',1),
	(5,'Bauchi',1),
	(6,'Bayelsa',1),
	(7,'Benue',1),
	(8,'Borno',1),
	(9,'Cross River',1),
	(10,'Delta',1),
	(11,'Ebonyi',1),
	(12,'Edo',1),
	(13,'Ekiti',1),
	(14,'Enugu',1),
	(15,'Gombe',1),
	(16,'Imo',1),
	(17,'Jigawa',1),
	(18,'Kaduna',1),
	(19,'Kano',1),
	(20,'Katsina',1),
	(21,'Kebbi',1),
	(22,'Kogi',1),
	(23,'Kwara',1),
	(24,'Lagos',1),
	(25,'Nasarawa',1),
	(26,'Niger',1),
	(27,'Ogun',1),
	(28,'Ondo',1),
	(29,'Osun',1),
	(30,'Oyo',1),
	(31,'Plateau',1),
	(32,'Rivers',1),
	(33,'Sokoto',1),
	(34,'Taraba',1),
	(35,'Yobe',1),
	(36,'Zamfara',1),
	(37,'FCT',1),
	(38,'Foreign',1);

/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table status
# ------------------------------------------------------------

DROP TABLE IF EXISTS `status`;

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_description` varchar(15) NOT NULL,
  `status_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table themes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `themes`;

CREATE TABLE `themes` (
  `theme_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `institution_name` varchar(200) DEFAULT NULL,
  `institution_caption` varchar(200) DEFAULT NULL,
  `institution_text_color` varchar(10) DEFAULT NULL,
  `institution_caption_text_color` varchar(10) DEFAULT NULL,
  `header_bg_color` varchar(10) DEFAULT NULL,
  `logo_name` varchar(200) DEFAULT NULL,
  `logo_size` int(11) DEFAULT NULL,
  `logo_caption` varchar(20) DEFAULT NULL,
  `site_url` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`theme_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table title
# ------------------------------------------------------------

DROP TABLE IF EXISTS `title`;

CREATE TABLE `title` (
  `title_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_name` varchar(30) DEFAULT NULL,
  `title_visible` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`title_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `title` WRITE;
/*!40000 ALTER TABLE `title` DISABLE KEYS */;

INSERT INTO `title` (`title_id`, `title_name`, `title_visible`)
VALUES
	(1,'Mr',1),
	(2,'Miss',1),
	(3,'Mrs',1),
	(4,'Dr',1);

/*!40000 ALTER TABLE `title` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
