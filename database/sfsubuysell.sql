-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 21, 2018 at 10:00 AM
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
(3, 'Lileana Wright', 'Lilly', 'lwright1@mail.sfsu.edu', 'Front End Engineer', 'Front End', '', 'My name is Lileana Wright and I am from Southern California. ', 'I am a Senior at San Francisco State University and I plan on graduating in the Spring of 2019 with a degree in Computer Science and a minor in Labor Studies.', 'PHP, Javascript', 'Swimming, Cooking'),
(4, 'Edward Baraja', 'Edward', 'ebaraja1@mail.sfsu.edu', 'Front-end Engineer', 'Front-end', '', 'My name is Edward Barajas and I\'m a member of team 8.', 'I\'m currently attending SFSU and majoring in computer science.', 'Java', 'Basketball, Video games'),
(5, 'Tommy Lik', 'Tommy', 'tlik@mail.sfsu.edu', 'Front-End Lead', 'Front End', '', 'Hello! My name is Tommy Lik and I am a senior computer science student.', 'I enjoy reading books and playing video games. ', 'PHP, Javascript', 'Videogames, books'),
(6, 'Alex Li', 'Alex', 'awexli@mail.sfsu.edu', 'Front-end Engineer', 'Front-end', '', 'Hey there! I\'m a second generation Asian-American born and raised in San Francisco,                                 California. I\'m a senior student finishing my degree in Computer Science at SFSU.                                 Besides having a full time career in studying, I also enjoy making videos of my friends                                 and                                 I goofing around in our gaming sessions. Whenever I wan\'t to get away from it all, I                                 like                                 to lay down and enjoy a nice fantasy audiobook.', '', 'Javascript', 'audiobook'),
(7, 'Jiawei Xu', 'Jiawei', 'x1780375010@gmail.com', 'Back-end Engineer', 'Back-End Engineer', '', 'Hello! My name is Jiawei, a graduate student.', 'I like reading, running and coding.', 'PHP, Javascript', 'reading, running and coding');

-- --------------------------------------------------------

--
-- Table structure for table `ct_category`
--

DROP TABLE IF EXISTS `ct_category`;
CREATE TABLE IF NOT EXISTS `ct_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ct_category_parent_id_index` (`parent_id`),
  KEY `ct_category_lft_index` (`lft`),
  KEY `ct_category_rgt_index` (`rgt`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_category`
--

INSERT INTO `ct_category` (`id`, `title`, `priority`, `parent_id`, `lft`, `rgt`, `depth`) VALUES
(1, 'Clothes', 2, NULL, 1, 6, 0),
(2, 'T-shirts', 1, 1, 2, 3, 1),
(7, 'Shoes', 0, 1, 4, 5, 1),
(20, 'Sports', 0, NULL, 25, 30, 0),
(9, 'Books', 0, NULL, 7, 12, 0),
(10, 'Computer Science', 0, 9, 8, 9, 1),
(11, 'Math', 0, 9, 10, 11, 1),
(12, 'Electronic Devices', 0, NULL, 13, 18, 0),
(13, 'Laptops', 0, 12, 14, 15, 1),
(14, 'Appliances', 0, 12, 16, 17, 1),
(15, 'Furniture', 0, NULL, 19, 24, 0),
(16, 'Tables', 0, 15, 20, 21, 1),
(17, 'Chairs', 0, 15, 22, 23, 1),
(22, 'Basketballs', 0, 20, 26, 27, 1),
(23, 'Skateboards', 0, 20, 28, 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ct_item`
--

DROP TABLE IF EXISTS `ct_item`;
CREATE TABLE IF NOT EXISTS `ct_item` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail_img0` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail_img1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail_img2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail_img3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ct_item_user_id_index` (`user_id`),
  KEY `ct_item_category_id_index` (`category_id`),
  KEY `ct_item_filter_id_index` (`filter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_item`
--

INSERT INTO `ct_item` (`id`, `user_id`, `category_id`, `filter_id`, `title`, `description`, `price`, `unit`, `title_img`, `detail_img0`, `detail_img1`, `detail_img2`, `detail_img3`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 0, 'Computer Science Book 0', 'description this is\r\ndescription\r\ndescription\r\ndescription\r\ndescription\r\ndescription', 0, '', 'public/uploads/image/20181021/1540115039634.jpg', '', '', '', '', 1, '2018-10-22 00:43:59', '2018-10-22 00:54:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2018_10_21_100515_create_category_table', 1),
('2018_10_21_163720_create_item_table', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
