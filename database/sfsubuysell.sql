-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 22, 2018 at 04:15 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_category`
--

INSERT INTO `ct_category` (`id`, `title`, `priority`, `parent_id`, `lft`, `rgt`, `depth`) VALUES
(1, 'Clothes', 2, NULL, 1, 8, 0),
(2, 'T-shirts', 1, 1, 2, 3, 1),
(7, 'Shoes', 0, 1, 4, 5, 1),
(20, 'Entertainment', 0, NULL, 37, 46, 0),
(9, 'Books', 0, NULL, 9, 18, 0),
(10, 'Computer Science', 0, 9, 10, 11, 1),
(11, 'Math', 0, 9, 12, 13, 1),
(12, 'Electronic Devices', 0, NULL, 19, 28, 0),
(13, 'Gaming', 0, 12, 20, 21, 1),
(30, 'Caps', 0, 1, 6, 7, 1),
(14, 'Kitchen', 0, 12, 22, 23, 1),
(15, 'Furniture', 0, NULL, 29, 36, 0),
(16, 'Tables', 0, 15, 30, 31, 1),
(17, 'Chairs', 0, 15, 32, 33, 1),
(22, 'Basketballs', 0, 20, 38, 39, 1),
(23, 'Skateboards', 0, 20, 40, 41, 1),
(24, 'History', 0, 9, 14, 15, 1),
(25, 'Physics', 0, 9, 16, 17, 1),
(26, 'Card Games', 0, 20, 42, 43, 1),
(27, 'Board Games', 0, 20, 44, 45, 1),
(28, 'Cleaners', 0, 12, 24, 25, 1),
(29, 'Adapters', 0, 12, 26, 27, 1),
(32, 'Mattresses', 0, 15, 34, 35, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ct_item`
--

INSERT INTO `ct_item` (`id`, `user_id`, `category_id`, `filter_id`, `title`, `description`, `price`, `unit`, `title_img`, `detail_img0`, `detail_img1`, `detail_img2`, `detail_img3`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 9, 10, 'Computer Science Book 0', 'This is the description of Computer Science Book 0.\r\nThis is the description of Computer Science Book 0.', 35.38, '', 'public/uploads/image/20181021/1540115039634.jpg', '', '', '', '', 1, '2018-10-22 00:43:59', '2018-10-22 01:10:33'),
(2, 0, 9, 10, 'Computer Science Book 1', 'This is the description of Computer Science Book 1.\r\nThis is the description of Computer Science Book 1.', 35.76, '', 'public/uploads/image/20181021/1540116544521.jpg', '', '', '', '', 0, '2018-10-22 01:09:04', '2018-10-22 01:11:30'),
(3, 0, 9, 10, 'Computer Science Book 2', 'This is the description of Computer Science Book 2.\r\nThis is the description of Computer Science Book 2.', 36.14, '', 'public/uploads/image/20181021/1540116568719.jpg', '', '', '', '', 0, '2018-10-22 01:09:28', '2018-10-22 01:11:42'),
(4, 0, 9, 10, 'Computer Science Book 3', 'This is the description of Computer Science Book 3.\r\nThis is the description of Computer Science Book 3.', 36.52, '', 'public/uploads/image/20181021/1540116589960.jpg', '', '', '', '', 0, '2018-10-22 01:09:49', '2018-10-22 01:11:52'),
(5, 0, 9, 10, 'Computer Science Book 4', 'This is the description of Computer Science Book 4.\r\nThis is the description of Computer Science Book 4.', 36.9, '', 'public/uploads/image/20181021/1540116604142.jpg', '', '', '', '', 0, '2018-10-22 01:10:04', '2018-10-22 01:12:02'),
(6, 0, 9, 11, 'Math Book 0', 'This is the description of Math Book 0.\r\nThis is the description of Math Book 0.', 37.28, '', 'public/uploads/image/20181022/1540158367133.jpg', '', '', '', '', 0, '2018-10-22 12:46:07', '2018-10-22 12:47:33'),
(7, 0, 9, 11, 'Math Book 1', 'This is the description of Math Book 1.\r\nThis is the description of Math Book 1.', 37.66, '', 'public/uploads/image/20181022/1540158381999.jpg', '', '', '', '', 0, '2018-10-22 12:46:21', '2018-10-22 12:48:18'),
(8, 0, 9, 11, 'Math Book 2', 'This is the description of Math Book 2.\r\nThis is the description of Math Book 2.', 38.04, '', 'public/uploads/image/20181022/1540158398350.jpg', '', '', '', '', 0, '2018-10-22 12:46:38', '2018-10-22 12:48:07'),
(9, 0, 9, 11, 'Math Book 3', 'This is the description of Math Book 3.\r\nThis is the description of Math Book 3.', 38.42, '', 'public/uploads/image/20181022/1540158412964.jpg', '', '', '', '', 0, '2018-10-22 12:46:52', '2018-10-22 12:48:00'),
(10, 0, 9, 11, 'Math Book 4', 'This is the description of Math Book 4.\r\nThis is the description of Math Book 4.', 38.8, '', 'public/uploads/image/20181022/1540158424120.jpg', '', '', '', '', 0, '2018-10-22 12:47:04', '2018-10-22 12:47:49'),
(11, 0, 9, 24, 'History Book 0', '', 39.18, '', 'public/uploads/image/20181022/1540172452553.jpg', '', '', '', '', 0, '2018-10-22 16:40:52', '2018-10-22 16:40:52'),
(12, 0, 9, 24, 'History Book 1', '', 39.56, '', 'public/uploads/image/20181022/1540172471205.jpg', '', '', '', '', 0, '2018-10-22 16:41:11', '2018-10-22 16:41:11'),
(13, 0, 9, 25, 'Physics Book 0', '', 39.94, '', 'public/uploads/image/20181022/1540172496429.jpg', '', '', '', '', 0, '2018-10-22 16:41:36', '2018-10-22 16:41:36'),
(14, 0, 9, 25, 'Physics Book 1', '', 40.32, '', 'public/uploads/image/20181022/1540172519235.jpg', '', '', '', '', 0, '2018-10-22 16:41:59', '2018-10-22 16:41:59'),
(15, 0, 20, 22, 'BasketBalls 0', 'This is the description of BasketBalls 0.\r\nThis is the description of BasketBalls 0.', 40.7, '', 'public/uploads/image/20181022/1540176871653.jpg', '', '', '', '', 0, '2018-10-22 17:54:31', '2018-10-22 17:54:31'),
(16, 0, 20, 22, 'BasketBalls 1', 'This is the description of BasketBalls 1.\r\nThis is the description of BasketBalls 1.', 41.08, '', 'public/uploads/image/20181022/1540176890322.jpg', '', '', '', '', 0, '2018-10-22 17:54:50', '2018-10-22 17:54:50'),
(17, 0, 20, 27, 'Boards Game 0', 'This is the description of Boards Game 0.\r\nThis is the description of Boards Game 0.', 41.46, '', 'public/uploads/image/20181022/1540176913237.jpg', '', '', '', '', 0, '2018-10-22 17:55:13', '2018-10-22 17:55:13'),
(18, 0, 20, 27, 'Boards Game 1', 'This is the description of Boards Game 1.\r\nThis is the description of Boards Game 1.', 41.84, '', 'public/uploads/image/20181022/1540176935838.jpg', '', '', '', '', 0, '2018-10-22 17:55:26', '2018-10-22 17:55:35'),
(19, 0, 20, 26, 'Cards Game 0', 'This is the description of Cards Game 0.\r\nThis is the description of Cards Game 0.', 42.22, '', 'public/uploads/image/20181022/1540176958712.jpg', '', '', '', '', 0, '2018-10-22 17:55:58', '2018-10-22 17:55:58'),
(20, 0, 20, 26, 'Cards Game 1', 'This is the description of Cards Game 1.\r\nThis is the description of Cards Game 1.', 42.6, '', 'public/uploads/image/20181022/1540176992599.jpg', '', '', '', '', 0, '2018-10-22 17:56:32', '2018-10-22 17:56:32'),
(21, 0, 20, 23, 'Skateboards 0', 'This is the description of Skateboards 0.\r\nThis is the description of Skateboards 0.', 42.98, '', 'public/uploads/image/20181022/1540177019582.jpg', '', '', '', '', 0, '2018-10-22 17:56:59', '2018-10-22 17:56:59'),
(22, 0, 20, 23, 'Skateboards 1', 'This is the description of Skateboards 1.\r\nThis is the description of Skateboards 1.', 43.36, '', 'public/uploads/image/20181022/1540177038944.jpg', '', '', '', '', 0, '2018-10-22 17:57:18', '2018-10-22 17:57:18'),
(23, 0, 12, 29, 'Adapters 0', 'This is the description of Adapters 0.\r\nThis is the description of Adapters 0.', 43.74, '', 'public/uploads/image/20181022/1540178717359.jpg', '', '', '', '', 0, '2018-10-22 18:25:17', '2018-10-22 18:25:17'),
(24, 0, 12, 29, 'Adapters 1', 'This is the description of Adapters 1.\r\nThis is the description of Adapters 1.', 44.12, '', 'public/uploads/image/20181022/1540178737318.jpg', '', '', '', '', 0, '2018-10-22 18:25:37', '2018-10-22 18:25:37'),
(25, 0, 12, 28, 'Cleaners 0', 'This is the description of Cleaners 0.\r\nThis is the description of Cleaners 0.', 44.5, '', 'public/uploads/image/20181022/1540178775811.jpg', '', '', '', '', 0, '2018-10-22 18:26:15', '2018-10-22 18:26:15'),
(26, 0, 12, 28, 'Cleaners 1', 'This is the description of Cleaners 1.\r\nThis is the description of Cleaners 1.', 44.88, '', 'public/uploads/image/20181022/1540178800646.jpg', '', '', '', '', 0, '2018-10-22 18:26:40', '2018-10-22 18:26:40'),
(27, 0, 12, 13, 'Game Controller 0', 'This is the description of Game Controller 0.\r\nThis is the description of Game Controller 0.', 45.26, '', 'public/uploads/image/20181022/1540178860377.jpg', '', '', '', '', 0, '2018-10-22 18:27:40', '2018-10-22 18:27:40'),
(28, 0, 12, 13, 'Game Controller 1', 'This is the description of Game Controller 1.\r\nThis is the description of Game Controller 1.', 45.64, '', 'public/uploads/image/20181022/1540178908658.jpg', '', '', '', '', 0, '2018-10-22 18:28:28', '2018-10-22 18:28:28'),
(29, 0, 12, 14, 'Kitchen 0', 'This is the description of kitchen 0.\r\nThis is the description of kitchen 0.', 46.02, '', 'public/uploads/image/20181022/1540179155429.jpg', '', '', '', '', 0, '2018-10-22 18:32:35', '2018-10-22 18:32:35'),
(30, 0, 12, 14, 'Kitchen 1', 'This is the description of kitchen 1.\r\nThis is the description of kitchen 1.', 46.4, '', 'public/uploads/image/20181022/1540179174351.jpg', '', '', '', '', 0, '2018-10-22 18:32:54', '2018-10-22 18:32:54'),
(31, 0, 15, 17, 'Chair 0', 'This is the description of chair 0.\r\nThis is the description of chair 0.', 46.78, '', 'public/uploads/image/20181022/1540181392573.jpg', '', '', '', '', 0, '2018-10-22 19:09:52', '2018-10-22 19:09:52'),
(32, 0, 15, 17, 'Chair 1', 'This is the description of chair 1.\r\nThis is the description of chair 1.', 47.16, '', 'public/uploads/image/20181022/1540181408731.jpg', '', '', '', '', 0, '2018-10-22 19:10:08', '2018-10-22 19:10:08'),
(33, 0, 15, 17, 'Chair 2', 'This is the description of chair 2.\r\nThis is the description of chair 2.', 47.54, '', 'public/uploads/image/20181022/1540182429809.jpg', '', '', '', '', 0, '2018-10-22 19:27:09', '2018-10-22 19:27:09'),
(34, 0, 15, 32, 'Mattress 0', 'This is the description of mattress 0.\r\nThis is the description of mattress 0.', 47.92, '', 'public/uploads/image/20181022/1540182452248.jpg', '', '', '', '', 0, '2018-10-22 19:27:32', '2018-10-22 19:27:32'),
(35, 0, 15, 32, 'Mattress 1', 'This is the description of mattress 1.\r\nThis is the description of mattress 1.', 48.3, '', 'public/uploads/image/20181022/1540182480296.jpg', '', '', '', '', 0, '2018-10-22 19:28:00', '2018-10-22 19:28:00'),
(36, 0, 15, 32, 'Mattress 2', 'This is the description of mattress 2.\r\nThis is the description of mattress 2.', 48.68, '', 'public/uploads/image/20181022/1540182508267.jpg', '', '', '', '', 0, '2018-10-22 19:28:28', '2018-10-22 19:28:28'),
(37, 0, 15, 16, 'Table 0', 'This is the description of table 0.\r\nThis is the description of table 0.', 49.06, '', 'public/uploads/image/20181022/1540182551966.jpg', '', '', '', '', 0, '2018-10-22 19:29:11', '2018-10-22 19:29:11'),
(38, 0, 15, 16, 'Table 1', 'This is the description of table 1.\r\nThis is the description of table 1.', 49.44, '', 'public/uploads/image/20181022/1540182568345.jpg', '', '', '', '', 0, '2018-10-22 19:29:28', '2018-10-22 19:29:28'),
(39, 0, 15, 16, 'Table 2', 'This is the description of table 2.\r\nThis is the description of table 2.', 49.82, '', 'public/uploads/image/20181022/1540182584464.jpg', '', '', '', '', 0, '2018-10-22 19:29:44', '2018-10-22 19:29:44'),
(40, 0, 1, 30, 'Cap 0', 'This is the description of cap 0.\r\nThis is the description of cap 0.', 50.2, '', 'public/uploads/image/20181022/1540183643180.jpg', '', '', '', '', 0, '2018-10-22 19:46:52', '2018-10-22 19:47:23'),
(41, 0, 1, 30, 'Cap 1', 'This is the description of cap 1.\r\nThis is the description of cap 1.', 50.58, '', 'public/uploads/image/20181022/1540183681226.jpg', '', '', '', '', 0, '2018-10-22 19:48:01', '2018-10-22 19:48:01'),
(42, 0, 1, 30, 'Cap 2', 'This is the description of cap 2.\r\nThis is the description of cap 2.', 50.96, '', 'public/uploads/image/20181022/1540183694535.jpg', '', '', '', '', 0, '2018-10-22 19:48:14', '2018-10-22 19:48:14'),
(43, 0, 1, 7, 'Shoes 0', 'This is the description of shoes 0.\r\nThis is the description of shoes 0.', 51.34, '', 'public/uploads/image/20181022/1540183757905.jpg', '', '', '', '', 0, '2018-10-22 19:49:17', '2018-10-22 19:49:17'),
(44, 0, 1, 7, 'Shoes 1', 'This is the description of shoes 1.\r\nThis is the description of shoes 1.', 51.72, '', 'public/uploads/image/20181022/1540183784117.jpg', '', '', '', '', 0, '2018-10-22 19:49:45', '2018-10-22 19:49:45'),
(45, 0, 1, 7, 'Shoes 2', 'This is the description of shoes 2.\r\nThis is the description of shoes 2.', 52.1, '', 'public/uploads/image/20181022/1540183802383.jpg', '', '', '', '', 0, '2018-10-22 19:50:02', '2018-10-22 19:50:02'),
(46, 0, 1, 2, 'T shirt 0', 'This is the description of t-shirt 0.\r\nThis is the description of t-shirt 0.', 52.48, '', 'public/uploads/image/20181022/1540183947792.jpg', '', '', '', '', 0, '2018-10-22 19:52:27', '2018-10-22 19:52:27'),
(47, 0, 1, 2, 'T shirt 1', 'This is the description of t-shirt 1.\r\nThis is the description of t-shirt 1.', 52.86, '', 'public/uploads/image/20181022/1540183964544.jpg', '', '', '', '', 0, '2018-10-22 19:52:44', '2018-10-22 19:52:44'),
(48, 0, 1, 2, 'T shirt 2', 'This is the description of t-shirt 2.\r\nThis is the description of t-shirt 2.', 53.24, '', 'public/uploads/image/20181022/1540183976532.jpg', '', '', '', '', 0, '2018-10-22 19:52:56', '2018-10-22 19:52:56');

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
