-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 19, 2018 at 02:41 AM
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
  `title` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `intro1` text COLLATE utf8_unicode_ci NOT NULL,
  `intro2` text COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `hobby` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_admin`
--

INSERT INTO `ct_admin` (`id`, `realname`, `nickname`, `email`, `title`, `position`, `avatar`, `intro1`, `intro2`, `lang`, `hobby`) VALUES
(1, 'Jianfei Zhao', 'Jianfei', 'jzhao11@mail.sfsu.edu', 'Team Lead', 'Back End', 'public/img/avatar_jianfei.jpg', 'Hi, my name is Jianfei. I am the lead of team 08.', 'There are 7 members in our team. It is a pleasure to work with my teammates.                          Hopefully, we can make progress together during the development of our website.', 'Javascript, HTML, PHP', 'Soccer, Chess'),
(2, 'Feras Alazzeh', 'Feras', 'falazzeh@mail.sfsu.edu', 'Head Back End Engineer', 'Back End', 'public/img/avatar_feras.jpg', 'My name is Feras Alazzeh and I am from Northern California. ', 'I am a Senior at San Francisco State University and I plan on graduating in the Fall of 2019 with a degree in Computer Science and a minor in Mathemantics.                          I am currently working as a Software Engineer at SFMTA.', 'Python, Javascript, Java, CSS, HTML', 'Football'),
(3, 'Lileana Wright', 'Lily', 'lwright1@mail.sfsu.edu', 'Front End Engineer', 'Front End', '', 'My name is Lileana Wright and I am from Southern California. ', 'I am a Senior at San Francisco State University and I plan on graduating in the Spring of 2019 with a degree in Computer Science and a minor in Labor Studies.', 'PHP, Javascript', 'Swimming, Cooking'),
(4, 'Edward Baraja', 'Edward', 'ebaraja1@mail.sfsu.edu', 'Front-end Engineer', 'Front-end', '', 'My name is Edward Barajas and I\'m a member of team 8.', 'I\'m currently attending SFSU and majoring in computer science.', 'Java', 'Basketball, Video games'),
(5, 'Tommy Lik', 'Tommy', 'tlik@mail.sfsu.edu', 'Front-End Lead', 'Front End', '', 'Hello! My name is Tommy Lik and I am a senior computer science student.', 'I enjoy reading books and playing video games. ', 'PHP, Javascript', 'Videogames, books'),
(6, 'Alex Li', 'Alex', 'awexli@mail.sfsu.edu', 'Front-end Engineer', 'Front-end', '', 'Hey there! I\'m a second generation Asian-American born and raised in San Francisco,                                 California. I\'m a senior student finishing my degree in Computer Science at SFSU.                                 Besides having a full time career in studying, I also enjoy making videos of my friends                                 and                                 I goofing around in our gaming sessions. Whenever I wan\'t to get away from it all, I                                 like                                 to lay down and enjoy a nice fantasy audiobook.', '', 'Javascript', 'audiobook'),
(7, 'Jiawei Xu', 'Jiawei', 'x1780375010@gmail.com', 'Back-end Engineer', 'Back-End Engineer', '', 'Hello! My name is Jiawei, a graduate student.', 'I like reading, running and coding.', 'PHP, Javascript', 'reading, running and coding');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
