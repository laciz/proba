-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 25, 2019 at 02:46 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vts_socialmedia`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_comment` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `upload_image` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=64 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_comment`, `upload_image`, `post_date`) VALUES
(57, 33, 'x', 'cover.jpg.10', '2019-06-25 11:53:45'),
(58, 33, 'X33', '68.cover.jpg', '2019-06-25 11:54:50'),
(59, 33, 'X3232', '38.cover.jpg', '2019-06-25 12:06:47'),
(60, 33, 'X233232', '93.cover.jpg', '2019-06-25 12:12:28'),
(61, 33, 'X1', '94.cover.jpg', '2019-06-25 13:33:26'),
(62, 23, 'x', '24.cover.jpg', '2019-06-25 13:42:39'),
(63, 23, 'x', '49.cover.jpg', '2019-06-25 13:45:31'),
(50, 33, 'X', '300px-OSI_mod_2.png.96', '2019-06-25 11:36:54'),
(51, 33, 'X1', '300px-OSI_mod_2.png.49', '2019-06-25 11:37:40'),
(52, 33, 'X2', '300px-OSI_mod_2.png.72', '2019-06-25 11:38:41'),
(53, 33, 'X3', '2.jpg.48', '2019-06-25 11:44:33'),
(54, 33, 'X5', 'IMG_1087.jpg.63', '2019-06-25 11:46:29'),
(55, 33, 'xxx', '2.jpg.12', '2019-06-25 11:50:45'),
(56, 33, 'x111', '62365191_1615532908586997_9202529621424209920_n.png.3', '2019-06-25 11:50:55'),
(46, 33, 'No', 'IMG_1087.jpg.14', '2019-06-24 20:44:36'),
(47, 23, 'Na j&oacute; az ajax?', '62365191_1615532908586997_9202529621424209920_n.png.43', '2019-06-24 21:13:10'),
(48, 23, 'Most is?', 'IMG_1126.jpg.65', '2019-06-24 21:17:41'),
(49, 33, 'Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..Lorem ipsum..', '62365191_1615532908586997_9202529621424209920_n.png.19', '2019-06-24 23:15:22'),
(39, 33, 'dddd', '35.2.jpg', '2019-06-24 18:31:38'),
(40, 33, '1', '62365191_1615532908586997_9202529621424209920_n.png.97', '2019-06-24 19:37:16'),
(41, 33, 'A', '62365191_1615532908586997_9202529621424209920_n.png.82', '2019-06-24 20:03:53'),
(42, 33, '2', '2.jpg.78', '2019-06-24 20:05:01'),
(43, 33, 'No', '300px-OSI_mod_2.png.19', '2019-06-24 20:15:41'),
(44, 33, 'No', '62365191_1615532908586997_9202529621424209920_n.png.75', '2019-06-24 20:22:59'),
(45, 33, 'aNOTHER post,', '2.jpg.55', '2019-06-24 20:37:51'),
(38, 33, 'Ez pedig a mÃ¡sodik poooszt, yeah! ', '24.', '2019-06-24 15:47:49'),
(37, 23, 'Micsoda meghatÃ³ pillanat, ez az elsÅ‘ poszt ezen a platformon ! ', '43.62365191_1615532908586997_9202529621424209920_n.png', '2019-06-24 15:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` mediumtext COLLATE utf8_hungarian_ci NOT NULL,
  `l_name` mediumtext COLLATE utf8_hungarian_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `szakirany` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `user_image` varchar(111) COLLATE utf8_hungarian_ci NOT NULL,
  `posts` varchar(3) COLLATE utf8_hungarian_ci NOT NULL,
  `recovery_account` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cover_image` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `username`, `password`, `email`, `szakirany`, `user_image`, `posts`, `recovery_account`, `reg_date`, `cover_image`) VALUES
(1, 'dasdasdas', 'Name', 'valentin', 'e3ceb5881a0a1fdaad01296d7554868d', 'valentin@gmail.com', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(2, 'dasdasdas', 'dasdas', 'dasda', '8f4031bfc7640c5f267b11b6fe0c2507', 'dasda', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(3, '', '', 'valentin', '9558023908a317d43df925f373d917a4', '231231231231213', '', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(4, '', '', 'web84', '5f039b4ef0058a1d652f13d612375a5b', 'haha@gmail.com', '', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(5, '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'undefined', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(6, '2', '2', '2', 'c81e728d9d4c2f636f067f89cc14862c', '2', 'undefined', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(7, '3', '3', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', '', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(8, '4', '4', '4', 'a87ff679a2f3e71d9181a67b7542122c', '4', 'undefined', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(9, '7', '7', '7', '8f14e45fceea167a5a36dedd4bea2543', '7', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(10, '555555', '5555', '55555', '6074c6aa3488f3c2dddff2a7ca821aab', '5555', 'GÃ©pÃ©szet', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(11, 'ezuj', '32131', '312', '8335bf9d6e71a33e3806b16ed3a5b441', '21321', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(12, 'fffff', 'ffff', 'fffff', 'ece926d8c0356205276a45266d361161', 'ffff', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(13, 'd', 'd', 'ddadsada', 'ac6555bfe23f5fe7e98fdcc0cd5f2451', 'sdasdas', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(14, 'dsada', 'dasdas', 'dasdas', '688d3519dcc34b3a3b14ed9de33c9224', 'dasda', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(15, '3', '3', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', 'Mechatronika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(16, '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(17, '3', 'asdasdas', 'valentin', 'c81e728d9d4c2f636f067f89cc14862c', 'email@gmail.com', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(18, '213213123', '213123123', '21312312312', '8595d6443eeec147699633649de37c6a', '312312312', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(19, 'dsadsadasd', 'asdasdas', '12218202', '92f9e1836d558162b52f706152d73d6d', 'email@gmail.com', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(20, '21321312', '312312312', '12312312', 'fa61f827f0f5373133b11cc20d835a79', '321312', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(21, 'dsadsadasd', 'asdasdas', '12218202', 'e37f26658416715c88921a8b3b9d5203', 'email@gmail.com', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(22, '3', 'asdasdas', '12218202', '7f507090097f23714f6bdf79cb862af3', 'email@gmail.com', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(23, 'Horváth ', 'Valentin', 'valcso', 'e6361e15145d1593dd17494c74827689', 'valcso@gmail.com', 'Informatika', 'default.png', 'yes', 'lol', '2019-06-24 22:18:18', ''),
(24, '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'Mechatronika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(25, '2', '2', '2', 'c81e728d9d4c2f636f067f89cc14862c', '2', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(26, '1', 'dsa', 'das', '2a6571da26602a67be14ea8c5ab82349', 'das', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(27, '1', 'das', 'da', '5ca2aa845c8cd5ace6b016841f100d82', 'da', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(28, '11111', 'dada', 'dada', '7627cb9027e713e301e83a8f13057055', 'dasda', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(29, '11', 'dada', 'dada', '5ca2aa845c8cd5ace6b016841f100d82', 'da', 'Informatika', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(30, 'dada', 'dada', 'adada', '202cb962ac59075b964b07152d234b70', 'ada', 'Menedzsment', 'default.jpg', 'no', 'lol', '2019-06-24 22:18:18', ''),
(31, 'John', 'Smith', 'smith', '202cb962ac59075b964b07152d234b70', 'smith@gmail.com', 'Menedzsment', 'default.png', 'no', 'lol', '2019-06-24 22:18:18', ''),
(32, 'nemtom', 'nemtom', 'nemtom', '924492d1c8a823fb6cb4c6300c32a9ac', 'nemtom@nemtom.com', 'Mechatronika', 'default.png', 'no', 'lol', '2019-06-24 22:18:18', ''),
(33, 'Erik', 'Erikovic', 'erik', '6a42dd6e7ca9a813693714b0d9aa1ad8', 'erik@erik.com', 'Mechatronika', 'default.png', 'yes', 'lol', '2019-06-24 22:18:18', 'cover.jpg'),
(34, 'Darko', 'Larovic', 'larovic', 'd3c327c84f809a5330bbf0d74438500c', 'larovic@lara.com', 'Menedzsment', 'default.png', 'no', 'lol', '2019-06-24 23:29:30', 'cover.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
