-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2013 at 05:59 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testps`
--
CREATE DATABASE IF NOT EXISTS `testps` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `testps`;

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `accounttype` enum('a','u','n') NOT NULL,
  `emailactivated` tinyint(1) NOT NULL,
  `twitterid` varchar(255) NOT NULL,
  `facebookid` varchar(256) NOT NULL,
  `youth` tinyint(1) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `firstname`, `surname`, `email`, `password`, `lastlogin`, `accounttype`, `emailactivated`, `twitterid`, `facebookid`, `youth`, `mobile`, `phone`, `paid`) VALUES
(1, 'a', 'b', 'a@a.com', 'aaaaaa', '0000-00-00 00:00:00', 'a', 0, '', '', 0, '1111', '22222', 0),
(2, 'a', 'b', 'b@a.com', 'aa', '0000-00-00 00:00:00', 'a', 0, '', '', 0, '0764654', '', 0),
(4, 'Alastair', 'Dick', 'b@b.com', '65ba841e01d6db7733e90a5b7f9e6f80', '0000-00-00 00:00:00', 'a', 1, 'alastaid', '', 0, '07802881727', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
