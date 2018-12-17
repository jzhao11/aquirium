-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2018 at 04:58 AM
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
-- Table structure for table `about`
--

DROP TABLE IF EXISTS `about`;
CREATE TABLE IF NOT EXISTS `about` (
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
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `realname`, `nickname`, `email`, `title`, `position`, `avatar`, `intro1`, `intro2`, `lang`, `hobby`) VALUES
(1, 'Jianfei Zhao', 'Jianfei', 'jzhao11@mail.sfsu.edu', 'Team Lead', 'Back End', 'public/img/avatar_jianfei.jpg', 'Hi, my name is Jianfei. I am the lead of team 08.', 'There are 7 members in our team. It is a pleasure to work with my teammates.                          Hopefully, we can make progress together during the development of our website.', 'Javascript, HTML, PHP', 'Soccer, Chess'),
(2, 'Feras Alazzeh', 'Feras', 'falazzeh@mail.sfsu.edu', 'Head Back End Engineer', 'Back End', 'public/img/avatar_feras.jpg', 'My name is Feras Alazzeh and I am from Northern California. ', 'I am a Senior at San Francisco State University and I plan on graduating in the Fall of 2019 with a degree in Computer Science and a minor in Mathemantics.                          I am currently working as a Software Engineer at SFMTA.', 'Python, Javascript, Java, CSS, HTML', 'Football'),
(3, 'Lileana Wright', 'Lilly', 'lwright1@mail.sfsu.edu', 'Front End Engineer', 'Front End', '', 'My name is Lileana Wright and I am from Southern California. ', 'I am a Senior at San Francisco State University and I plan on graduating in the Spring of 2019 with a degree in Computer Science and a minor in Labor Studies.', 'PHP, Javascript', 'Swimming, Cooking'),
(4, 'Edward Baraja', 'Edward', 'ebaraja1@mail.sfsu.edu', 'Front-end Engineer', 'Front-end', '', 'My name is Edward Barajas and I\'m a member of team 8.', 'I\'m currently attending SFSU and majoring in computer science.', 'Java', 'Basketball, Video games'),
(5, 'Tommy Lik', 'Tommy', 'tlik@mail.sfsu.edu', 'Front-End Lead', 'Front End', '', 'Hello! My name is Tommy Lik and I am a senior computer science student.', 'I enjoy reading books and playing video games. ', 'PHP, Javascript', 'Videogames, books'),
(6, 'Alex Li', 'Alex', 'awexli@mail.sfsu.edu', 'Front-end Engineer', 'Front-end', '', 'Hey there! I\'m a second generation Asian-American born and raised in San Francisco,                                 California. I\'m a senior student finishing my degree in Computer Science at SFSU.                                 Besides having a full time career in studying, I also enjoy making videos of my friends                                 and                                 I goofing around in our gaming sessions. Whenever I wan\'t to get away from it all, I                                 like                                 to lay down and enjoy a nice fantasy audiobook.', '', 'Javascript', 'audiobook'),
(7, 'Jiawei Xu', 'Jiawei', 'x1780375010@gmail.com', 'Back-end Engineer', 'Back-End Engineer', '', 'Hello! My name is Jiawei, a graduate student.', 'I like reading, running and coding.', 'PHP, Javascript', 'reading, running and coding');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `depth` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `depth`) VALUES
(1, 'Clothes', 0),
(20, 'Entertainment', 0),
(9, 'Books', 0),
(12, 'Electronic Devices', 0),
(15, 'Furniture', 0),
(33, 'Fishes', 0);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `filter_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `title_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ct_item_user_id_index` (`user_id`),
  KEY `ct_item_category_id_index` (`category_id`),
  KEY `ct_item_filter_id_index` (`filter_id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `user_id`, `category_id`, `filter_id`, `title`, `description`, `price`, `title_img`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 10, 'Computer Science Book CSC510', 'This is the description of Computer Science Book 0.\r\nThis is the description of Computer Science Book 0.', 10.38, 'public/uploads/image/20181021/1540115039634.jpg', 1, '2018-10-22 00:43:59', '2018-10-22 01:10:33'),
(2, 3, 9, 10, 'Computer Science Book CSC413', 'This is the description of Computer Science Book 1.\r\nThis is the description of Computer Science Book 1.', 10.76, 'public/uploads/image/20181021/1540116544521.jpg', 1, '2018-10-22 01:09:04', '2018-10-22 01:11:30'),
(3, 4, 9, 10, 'Computer Science Book CSC848', 'This is the description of Computer Science Book 2.\r\nThis is the description of Computer Science Book 2.', 11.14, 'public/uploads/image/20181021/1540116568719.jpg', 1, '2018-10-22 01:09:28', '2018-10-22 01:11:42'),
(4, 5, 9, 10, 'Computer Science Book CSC220', 'This is the description of Computer Science Book 3.\r\nThis is the description of Computer Science Book 3.', 11.52, 'public/uploads/image/20181021/1540116589960.jpg', 1, '2018-10-22 01:09:49', '2018-10-22 01:11:52'),
(5, 6, 9, 10, 'Computer Science Book CSC648', 'This is the description of Computer Science Book 4.\r\nThis is the description of Computer Science Book 4.', 11.9, 'public/uploads/image/20181021/1540116604142.jpg', 1, '2018-10-22 01:10:04', '2018-10-22 01:12:02'),
(6, 7, 9, 11, 'Math Book MATH228', 'This is the description of Math Book 0.\r\nThis is the description of Math Book 0.', 12.28, 'public/uploads/image/20181022/1540158367133.jpg', 1, '2018-10-22 12:46:07', '2018-10-22 12:47:33'),
(7, 1, 9, 11, 'Math Book MATH324', 'This is the description of Math Book 1.\r\nThis is the description of Math Book 1.', 12.66, 'public/uploads/image/20181022/1540158381999.jpg', 1, '2018-10-22 12:46:21', '2018-10-22 12:48:18'),
(8, 2, 9, 11, 'Math Book MATH325', 'This is the description of Math Book 2.\r\nThis is the description of Math Book 2.', 13.04, 'public/uploads/image/20181022/1540158398350.jpg', 1, '2018-10-22 12:46:38', '2018-10-22 12:48:07'),
(9, 3, 9, 11, 'Math Book MATH227', 'This is the description of Math Book 3.\r\nThis is the description of Math Book 3.', 13.42, 'public/uploads/image/20181022/1540158412964.jpg', 1, '2018-10-22 12:46:52', '2018-10-22 12:48:00'),
(10, 4, 9, 11, 'Math Book MATH226', 'This is the description of Math Book 4.\r\nThis is the description of Math Book 4.', 13.8, 'public/uploads/image/20181022/1540158424120.jpg', 1, '2018-10-22 12:47:04', '2018-10-22 12:47:49'),
(11, 5, 9, 24, 'History Book HIST422', 'This is the description of History Book 0.\r\nThis is the description of History Book 0.', 14.18, 'public/uploads/image/20181022/1540172452553.jpg', 1, '2018-10-22 16:40:52', '2018-11-09 22:20:32'),
(12, 6, 9, 24, 'History Book HIST428', 'This is the description of History Book 1.\r\nThis is the description of History Book 1.', 14.56, 'public/uploads/image/20181022/1540172471205.jpg', 1, '2018-10-22 16:41:11', '2018-11-09 22:20:55'),
(13, 7, 9, 25, 'Physics Book PHYS222', 'This is the description of Physics Book 0.\r\nThis is the description of Physics Book 0.', 14.94, 'public/uploads/image/20181022/1540172496429.jpg', 1, '2018-10-22 16:41:36', '2018-11-09 22:21:29'),
(14, 1, 9, 25, 'Physics Book PHYS230', 'This is the description of Physics Book 1.\r\nThis is the description of Physics Book 1.', 15.32, 'public/uploads/image/20181022/1540172519235.jpg', 1, '2018-10-22 16:41:59', '2018-11-09 22:21:11'),
(15, 2, 20, 22, 'BasketBalls 0', 'This is the description of BasketBalls 0.\r\nThis is the description of BasketBalls 0.', 15.7, 'public/uploads/image/20181022/1540176871653.jpg', 1, '2018-10-22 17:54:31', '2018-10-22 17:54:31'),
(16, 3, 20, 22, 'BasketBalls 1', 'This is the description of BasketBalls 1.\r\nThis is the description of BasketBalls 1.', 16.08, 'public/uploads/image/20181022/1540176890322.jpg', 1, '2018-10-22 17:54:50', '2018-10-22 17:54:50'),
(17, 4, 20, 27, 'Boards Game 0', 'This is the description of Boards Game 0.\r\nThis is the description of Boards Game 0.', 16.46, 'public/uploads/image/20181022/1540176913237.jpg', 1, '2018-10-22 17:55:13', '2018-10-22 17:55:13'),
(18, 5, 20, 27, 'Boards Game 1', 'This is the description of Boards Game 1.\r\nThis is the description of Boards Game 1.', 16.84, 'public/uploads/image/20181022/1540176935838.jpg', 1, '2018-10-22 17:55:26', '2018-10-22 17:55:35'),
(19, 6, 20, 26, 'Cards Game 0', 'This is the description of Cards Game 0.\r\nThis is the description of Cards Game 0.', 17.22, 'public/uploads/image/20181022/1540176958712.jpg', 1, '2018-10-22 17:55:58', '2018-10-22 17:55:58'),
(20, 7, 20, 26, 'Cards Game 1', 'This is the description of Cards Game 1.\r\nThis is the description of Cards Game 1.', 17.6, 'public/uploads/image/20181022/1540176992599.jpg', 1, '2018-10-22 17:56:32', '2018-10-22 17:56:32'),
(21, 1, 20, 23, 'Skateboards 0', 'This is the description of Skateboards 0.\r\nThis is the description of Skateboards 0.', 17.98, 'public/uploads/image/20181022/1540177019582.jpg', 1, '2018-10-22 17:56:59', '2018-10-22 17:56:59'),
(22, 2, 20, 23, 'Skateboards 1', 'This is the description of Skateboards 1.\r\nThis is the description of Skateboards 1.', 18.36, 'public/uploads/image/20181022/1540177038944.jpg', 1, '2018-10-22 17:57:18', '2018-10-22 17:57:18'),
(23, 3, 12, 29, 'Adapters 0', 'This is the description of Adapters 0.\r\nThis is the description of Adapters 0.', 18.74, 'public/uploads/image/20181022/1540178717359.jpg', 1, '2018-10-22 18:25:17', '2018-10-22 18:25:17'),
(24, 4, 12, 29, 'Adapters 1', 'This is the description of Adapters 1.\r\nThis is the description of Adapters 1.', 19.12, 'public/uploads/image/20181022/1540178737318.jpg', 1, '2018-10-22 18:25:37', '2018-10-22 18:25:37'),
(25, 5, 12, 28, 'Cleaners 0', 'This is the description of Cleaners 0.\r\nThis is the description of Cleaners 0.', 19.5, 'public/uploads/image/20181022/1540178775811.jpg', 1, '2018-10-22 18:26:15', '2018-10-22 18:26:15'),
(26, 6, 12, 28, 'Cleaners 1', 'This is the description of Cleaners 1.\r\nThis is the description of Cleaners 1.', 19.88, 'public/uploads/image/20181022/1540178800646.jpg', 1, '2018-10-22 18:26:40', '2018-10-22 18:26:40'),
(27, 7, 12, 13, 'Game Controller 0', 'This is the description of Game Controller 0.\r\nThis is the description of Game Controller 0.', 20.26, 'public/uploads/image/20181022/1540178860377.jpg', 1, '2018-10-22 18:27:40', '2018-10-22 18:27:40'),
(28, 1, 12, 13, 'Game Controller 1', 'This is the description of Game Controller 1.\r\nThis is the description of Game Controller 1.', 20.64, 'public/uploads/image/20181022/1540178908658.jpg', 1, '2018-10-22 18:28:28', '2018-10-22 18:28:28'),
(29, 2, 12, 14, 'Kitchen 0', 'This is the description of kitchen 0.\r\nThis is the description of kitchen 0.', 21.02, 'public/uploads/image/20181022/1540179155429.jpg', 1, '2018-10-22 18:32:35', '2018-10-22 18:32:35'),
(30, 3, 12, 14, 'Kitchen 1', 'This is the description of kitchen 1.\r\nThis is the description of kitchen 1.', 21.4, 'public/uploads/image/20181022/1540179174351.jpg', 1, '2018-10-22 18:32:54', '2018-10-22 18:32:54'),
(31, 4, 15, 17, 'Chair 0', 'This is the description of chair 0.\r\nThis is the description of chair 0.', 21.78, 'public/uploads/image/20181022/1540181392573.jpg', 1, '2018-10-22 19:09:52', '2018-10-22 19:09:52'),
(32, 5, 15, 17, 'Chair 1', 'This is the description of chair 1.\r\nThis is the description of chair 1.', 22.16, 'public/uploads/image/20181022/1540181408731.jpg', 1, '2018-10-22 19:10:08', '2018-10-22 19:10:08'),
(33, 6, 15, 17, 'Chair 2', 'This is the description of chair 2.\r\nThis is the description of chair 2.', 22.54, 'public/uploads/image/20181022/1540182429809.jpg', 1, '2018-10-22 19:27:09', '2018-10-22 19:27:09'),
(34, 7, 15, 32, 'Mattress 0', 'This is the description of mattress 0.\r\nThis is the description of mattress 0.', 22.92, 'public/uploads/image/20181022/1540182452248.jpg', 1, '2018-10-22 19:27:32', '2018-10-22 19:27:32'),
(35, 1, 15, 32, 'Mattress 1', 'This is the description of mattress 1.\r\nThis is the description of mattress 1.', 23.3, 'public/uploads/image/20181022/1540182480296.jpg', 1, '2018-10-22 19:28:00', '2018-10-22 19:28:00'),
(36, 2, 15, 32, 'Mattress 2', 'This is the description of mattress 2.\r\nThis is the description of mattress 2.', 23.68, 'public/uploads/image/20181022/1540182508267.jpg', 1, '2018-10-22 19:28:28', '2018-10-22 19:28:28'),
(37, 3, 15, 16, 'Table 0', 'This is the description of table 0.\r\nThis is the description of table 0.', 24.06, 'public/uploads/image/20181022/1540182551966.jpg', 1, '2018-10-22 19:29:11', '2018-10-22 19:29:11'),
(38, 4, 15, 16, 'Table 1', 'This is the description of table 1.\r\nThis is the description of table 1.', 24.44, 'public/uploads/image/20181022/1540182568345.jpg', 1, '2018-10-22 19:29:28', '2018-10-22 19:29:28'),
(39, 5, 15, 16, 'Table 2', 'This is the description of table 2.\r\nThis is the description of table 2.', 24.82, 'public/uploads/image/20181022/1540182584464.jpg', 1, '2018-10-22 19:29:44', '2018-10-22 19:29:44'),
(40, 6, 1, 30, 'Cap 0', 'This is the description of cap 0.\r\nThis is the description of cap 0.', 25.2, 'public/uploads/image/20181022/1540183643180.jpg', 1, '2018-10-22 19:46:52', '2018-10-22 19:47:23'),
(41, 7, 1, 30, 'Cap 1', 'This is the description of cap 1.\r\nThis is the description of cap 1.', 25.58, 'public/uploads/image/20181022/1540183681226.jpg', 1, '2018-10-22 19:48:01', '2018-10-22 19:48:01'),
(42, 1, 1, 30, 'Cap 2', 'This is the description of cap 2.\r\nThis is the description of cap 2.', 25.96, 'public/uploads/image/20181022/1540183694535.jpg', 1, '2018-10-22 19:48:14', '2018-10-22 19:48:14'),
(43, 2, 1, 7, 'Shoes 0', 'This is the description of shoes 0.\r\nThis is the description of shoes 0.', 26.34, 'public/uploads/image/20181022/1540183757905.jpg', 1, '2018-10-22 19:49:17', '2018-10-22 19:49:17'),
(44, 3, 1, 7, 'Shoes 1', 'This is the description of shoes 1.\r\nThis is the description of shoes 1.', 26.72, 'public/uploads/image/20181022/1540183784117.jpg', 1, '2018-10-22 19:49:45', '2018-10-22 19:49:45'),
(45, 4, 1, 7, 'Shoes 2', 'This is the description of shoes 2.\r\nThis is the description of shoes 2.', 27.1, 'public/uploads/image/20181022/1540183802383.jpg', 1, '2018-10-22 19:50:02', '2018-10-22 19:50:02'),
(46, 5, 1, 2, 'T shirt 0', 'This is the description of t-shirt 0.\r\nThis is the description of t-shirt 0.', 27.48, 'public/uploads/image/20181022/1540183947792.jpg', 1, '2018-10-22 19:52:27', '2018-10-22 19:52:27'),
(47, 6, 1, 2, 'T shirt 1', 'This is the description of t-shirt 1.\r\nThis is the description of t-shirt 1.', 27.86, 'public/uploads/image/20181022/1540183964544.jpg', 1, '2018-10-22 19:52:44', '2018-11-09 22:21:47'),
(48, 7, 1, 2, 'T shirt 2', 'This is the description of t-shirt 2.\r\nThis is the description of t-shirt 2.', 28.24, 'public/uploads/image/20181022/1540183976532.jpg', 1, '2018-10-22 19:52:56', '2018-12-08 12:51:57'),
(49, 10, 33, 0, 'Decorative Fish 0', 'This is the description of Decorative Fish 0.\r\nThis is the description of Decorative Fish 0.', 12.35, 'public/uploads/image/20181208/1544256240691.jpg', 1, '2018-12-08 16:04:59', '2018-12-08 16:10:26'),
(50, 10, 33, 0, 'Decorative Fish 1', 'This is the description of Decorative Fish 1.\r\nThis is the description of Decorative Fish 1.', 16.99, 'public/uploads/image/20181208/1544256483968.jpg', 1, '2018-12-08 16:08:03', '2018-12-08 16:09:58'),
(51, 10, 33, 0, 'Decorative Fish 2', 'This is the description of Decorative Fish 2.\r\nThis is the description of Decorative Fish 2.', 18.15, 'public/uploads/image/20181208/1544257114356.jpg', 1, '2018-12-08 16:18:42', '2018-12-08 16:18:59'),
(52, 10, 33, 0, 'Decorative Fish 3', 'This is the description of Decorative Fish 3.\r\nThis is the description of Decorative Fish 3.', 17.5, 'public/uploads/image/20181208/1544257251278.jpg', 1, '2018-12-08 16:20:51', '2018-12-08 16:21:23'),
(53, 11, 1, 0, 'Black Shirt', 'This is a custom Gucci black shirt', 50, 'public/uploads/image/20181210/1544394046140.jpg', 0, '2018-12-10 06:20:46', '2018-12-13 19:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ct_message_item_id_index` (`item_id`),
  KEY `ct_message_from_user_id_index` (`from_user_id`),
  KEY `ct_message_to_usre_id_index` (`to_user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `item_id`, `from_user_id`, `to_user_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 47, 7, 6, 'Hello, is XL size available for this item?', '2018-12-07 02:05:50', '2018-12-07 02:05:50'),
(2, 46, 7, 5, 'Hi, do you have this T-shirt with white color?', '2018-12-07 02:08:26', '2018-12-07 02:08:26'),
(7, 1, 7, 2, 'Hi, is this the book for Prof. Wall\'s section?', '2018-12-16 12:01:03', '2018-12-16 12:01:03'),
(5, 44, 7, 3, 'Hi, do you have size 8 for this pair of shoes?', '2018-12-13 19:07:31', '2018-12-13 19:07:31'),
(6, 24, 7, 4, 'Hello,\nDo you have the power adapter for Thinkpad?', '2018-12-16 08:55:34', '2018-12-16 08:55:34'),
(8, 8, 7, 2, 'Hi, is this a book  closely related to calculus?', '2018-12-16 12:02:04', '2018-12-16 12:02:04'),
(9, 29, 7, 2, 'Could you tell me the volume of this cooking machine?', '2018-12-16 12:10:39', '2018-12-16 12:10:39'),
(10, 1, 5, 2, 'Hi,\ndo you have the reference answer keys for the exercises in this book?', '2018-12-16 12:13:59', '2018-12-16 12:13:59'),
(11, 36, 5, 2, 'Would you mind telling me the size of this mattress? Is it queen size or full size?', '2018-12-16 12:15:21', '2018-12-16 12:15:21'),
(12, 43, 5, 2, 'Hi, is size 8 available for this pair of shoes?', '2018-12-16 12:17:08', '2018-12-16 12:17:08'),
(13, 8, 5, 2, 'Excuse me. Do you have the corresponding exercises for this math book?', '2018-12-16 12:19:01', '2018-12-16 12:19:01'),
(14, 22, 5, 2, 'What is the width of this skateboard?', '2018-12-16 12:20:32', '2018-12-16 12:20:32');

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
('2018_10_21_163720_create_item_table', 2),
('2018_11_10_032735_create_user_table', 3),
('2018_11_10_075541_create_message_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `stu_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `priority` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `stu_id`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'nobodyknows', '96e79218965eb72c92a549dd5a330112', '999999001', 0, '2018-11-11 08:55:45', '2018-11-11 08:55:45'),
(2, 'naruto', 'e3ceb5881a0a1fdaad01296d7554868d', '999999002', 0, '2018-11-11 08:56:25', '2018-11-11 08:56:25'),
(3, 'sasuke', '1a100d2c0dab19c4430e7d73762b3423', '999999003', 0, '2018-11-11 08:58:21', '2018-11-11 08:58:21'),
(4, 'itachi', '550a141f12de6341fba65b0ad0433500', '999999004', 0, '2018-11-12 13:44:06', '2018-11-12 13:44:06'),
(5, 'tsunade', '5b1b68a9abf4d2cd155c81a9225fd158', '999999005', 0, '2018-11-22 15:52:36', '2018-11-22 15:52:36'),
(6, 'sakura', 'f379eaf3c831b04de153469d1bec345e', '999999006', 0, '2018-11-23 20:07:32', '2018-11-23 20:07:32'),
(7, 'jzhao11', '96e79218965eb72c92a549dd5a330112', '999999007', 1, '2018-12-01 23:39:56', '2018-12-01 23:39:56'),
(10, 'tommyl', '96e79218965eb72c92a549dd5a330112', '999999010', 0, '2018-12-08 16:04:59', '2018-12-08 16:04:59'),
(11, 'falazzeh', '366c6633bbba32cb0767a1fd4f738e7e', '999999011', 0, '2018-12-10 06:17:01', '2018-12-10 06:17:01'),
(12, 'Alex123', 'e10adc3949ba59abbe56e057f20f883e', '999999012', 0, '2018-12-10 06:23:40', '2018-12-10 06:23:40'),
(13, 'test', '96e79218965eb72c92a549dd5a330112', '111111111', 0, '2018-12-10 07:40:38', '2018-12-10 07:40:38'),
(14, 'qwerlol', '96e79218965eb72c92a549dd5a330112', '111111111', 0, '2018-12-10 08:46:15', '2018-12-10 08:46:15'),
(15, 'effy908', '96e79218965eb72c92a549dd5a330112', '', 0, '2018-12-16 12:30:02', '2018-12-16 12:30:02'),
(16, 'mercurydota', '96e79218965eb72c92a549dd5a330112', '', 0, '2018-12-16 12:35:28', '2018-12-16 12:35:28');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
