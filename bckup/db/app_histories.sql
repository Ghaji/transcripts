-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2015 at 05:59 PM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mis_transcript`
--

-- --------------------------------------------------------

--
-- Table structure for table `app_histories`
--

CREATE TABLE IF NOT EXISTS `app_histories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `application_no` varchar(15) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `mode` tinyint(4) NOT NULL,
  `city_or_state` int(4) NOT NULL,
  `receiving_address` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `app_visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `application_no` (`application_no`,`applicant_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `app_histories`
--

INSERT INTO `app_histories` (`id`, `application_no`, `applicant_id`, `type`, `mode`, `city_or_state`, `receiving_address`, `create_at`, `updated_at`, `app_visible`) VALUES
(1, 'app12345678', 1, 2, 2, 1, 'London West 23  Chelsea street ', '2015-09-02 03:10:10', '2015-09-09 02:08:09', 1),
(2, 'app12345671', 2, 2, 2, 1, 'London West 23  Chelsea street ', '2015-09-02 03:10:10', '2015-09-09 02:08:09', 1),
(3, 'app12345673', 1, 2, 2, 1, 'London West 23  Chelsea street ', '2015-09-02 03:10:10', '2015-09-09 02:08:09', 1),
(4, 'app12345679', 1, 2, 2, 1, 'London West 23  Chelsea street ', '2015-09-02 03:10:10', '2015-09-09 02:08:09', 1),
(5, 'app12345675', 1, 2, 2, 1, 'London West 23  Chelsea street ', '2015-09-02 03:10:10', '2015-09-09 02:08:09', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
