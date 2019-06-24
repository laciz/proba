-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 24, 2019 at 01:34 PM
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
  `post_comment` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `upload_image` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

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
  `posts` mediumtext COLLATE utf8_hungarian_ci NOT NULL,
  `recovery_account` varchar(255) COLLATE utf8_hungarian_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `username`, `password`, `email`, `szakirany`, `user_image`, `posts`, `recovery_account`) VALUES
(1, 'dasdasdas', 'Name', 'valentin', 'e3ceb5881a0a1fdaad01296d7554868d', 'valentin@gmail.com', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(2, 'dasdasdas', 'dasdas', 'dasda', '8f4031bfc7640c5f267b11b6fe0c2507', 'dasda', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(3, '', '', 'valentin', '9558023908a317d43df925f373d917a4', '231231231231213', '', 'default.jpg', 'no', 'lol'),
(4, '', '', 'web84', '5f039b4ef0058a1d652f13d612375a5b', 'haha@gmail.com', '', 'default.jpg', 'no', 'lol'),
(5, '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'undefined', 'default.jpg', 'no', 'lol'),
(6, '2', '2', '2', 'c81e728d9d4c2f636f067f89cc14862c', '2', 'undefined', 'default.jpg', 'no', 'lol'),
(7, '3', '3', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', '', 'default.jpg', 'no', 'lol'),
(8, '4', '4', '4', 'a87ff679a2f3e71d9181a67b7542122c', '4', 'undefined', 'default.jpg', 'no', 'lol'),
(9, '7', '7', '7', '8f14e45fceea167a5a36dedd4bea2543', '7', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(10, '555555', '5555', '55555', '6074c6aa3488f3c2dddff2a7ca821aab', '5555', 'GÃ©pÃ©szet', 'default.jpg', 'no', 'lol'),
(11, 'ezuj', '32131', '312', '8335bf9d6e71a33e3806b16ed3a5b441', '21321', 'Informatika', 'default.jpg', 'no', 'lol'),
(12, 'fffff', 'ffff', 'fffff', 'ece926d8c0356205276a45266d361161', 'ffff', 'Informatika', 'default.jpg', 'no', 'lol'),
(13, 'd', 'd', 'ddadsada', 'ac6555bfe23f5fe7e98fdcc0cd5f2451', 'sdasdas', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(14, 'dsada', 'dasdas', 'dasdas', '688d3519dcc34b3a3b14ed9de33c9224', 'dasda', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(15, '3', '3', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', '3', 'Mechatronika', 'default.jpg', 'no', 'lol'),
(16, '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'Informatika', 'default.jpg', 'no', 'lol'),
(17, '3', 'asdasdas', 'valentin', 'c81e728d9d4c2f636f067f89cc14862c', 'email@gmail.com', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(18, '213213123', '213123123', '21312312312', '8595d6443eeec147699633649de37c6a', '312312312', 'Informatika', 'default.jpg', 'no', 'lol'),
(19, 'dsadsadasd', 'asdasdas', '12218202', '92f9e1836d558162b52f706152d73d6d', 'email@gmail.com', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(20, '21321312', '312312312', '12312312', 'fa61f827f0f5373133b11cc20d835a79', '321312', 'Informatika', 'default.jpg', 'no', 'lol'),
(21, 'dsadsadasd', 'asdasdas', '12218202', 'e37f26658416715c88921a8b3b9d5203', 'email@gmail.com', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(22, '3', 'asdasdas', '12218202', '7f507090097f23714f6bdf79cb862af3', 'email@gmail.com', 'Informatika', 'default.jpg', 'no', 'lol'),
(23, 'Horváth ', 'Valentin', 'valcso', 'e6361e15145d1593dd17494c74827689', 'valcso@gmail.com', 'Informatika', 'default.png.58', 'no', 'lol'),
(24, '1', '1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'Mechatronika', 'default.jpg', 'no', 'lol'),
(25, '2', '2', '2', 'c81e728d9d4c2f636f067f89cc14862c', '2', 'Informatika', 'default.jpg', 'no', 'lol'),
(26, '1', 'dsa', 'das', '2a6571da26602a67be14ea8c5ab82349', 'das', 'Informatika', 'default.jpg', 'no', 'lol'),
(27, '1', 'das', 'da', '5ca2aa845c8cd5ace6b016841f100d82', 'da', 'Informatika', 'default.jpg', 'no', 'lol'),
(28, '11111', 'dada', 'dada', '7627cb9027e713e301e83a8f13057055', 'dasda', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(29, '11', 'dada', 'dada', '5ca2aa845c8cd5ace6b016841f100d82', 'da', 'Informatika', 'default.jpg', 'no', 'lol'),
(30, 'dada', 'dada', 'adada', '202cb962ac59075b964b07152d234b70', 'ada', 'Menedzsment', 'default.jpg', 'no', 'lol'),
(31, 'John', 'Smith', 'smith', '202cb962ac59075b964b07152d234b70', 'smith@gmail.com', 'Menedzsment', 'default.png', 'no', 'lol'),
(32, 'nemtom', 'nemtom', 'nemtom', '924492d1c8a823fb6cb4c6300c32a9ac', 'nemtom@nemtom.com', 'Mechatronika', 'default.png', 'no', 'lol');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
