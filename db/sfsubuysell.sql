-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2018 at 06:09 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfsubuysell`
--

-- --------------------------------------------------------

--
-- Table structure for table `ct_admin`
--

DROP TABLE IF EXISTS `ct_admin`;
CREATE TABLE IF NOT EXISTS `ct_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `realname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `nickname` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `intro` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_admin`
--

INSERT INTO `ct_admin` (`id`, `realname`, `nickname`, `email`, `position`, `intro`) VALUES
(1, 'Jianfei Zhao', 'jianfei', 'jzhao11@mail.sfsu.edu', 'Team Lead', ''),
(2, 'Feras Alazzeh', 'alazzeh', 'falazzeh@mail.sfsu.edu', 'Back-end Lead', ''),
(3, 'Lileana Wright', 'lily', 'lwright1@mail.sfsu.edu', 'Front-end Engineer', ''),
(4, 'Edward Baraja', 'edward', 'ebaraja1@mail.sfsu.edu', 'Front-end Engineer', ''),
(5, 'Tommy Lik', 'tom', 'tommylik1@gmail.com', 'Front-end Lead', ''),
(6, 'Alex Li', 'alex', 'awexli@mail.sfsu.edu', 'Front-end Engineer', ''),
(7, 'Jiawei Xu', 'jiawei', 'x1780375010@gmail.com', 'Back-end Engineer', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
