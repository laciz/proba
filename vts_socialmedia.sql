-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2019 at 04:42 PM
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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` text NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`, `username`) VALUES
(1, 'adminpw1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`com_id`, `post_id`, `user_id`, `comment`, `comment_author`, `date`) VALUES
(1, 73, 23, '       HozzdadaÃ¡szÃ³lok\r\n', 'valcso', '2019-06-26 15:53:21'),
(2, 73, 23, '       HozzÃ¡szÃ³lok\r\ndada', 'valcso', '2019-06-26 15:54:29'),
(3, 68, 23, '       HozzÃ¡szÃ³lok123\r\n', 'valcso', '2019-06-26 15:54:44'),
(4, 73, 23, '      1\r\n', 'valcso', '2019-06-26 16:03:14'),
(5, 73, 23, '      XXX\r\n', 'valcso', '2019-06-26 16:43:22'),
(6, 73, 23, '      \r\nXXXXX', 'valcso', '2019-06-26 16:44:59'),
(7, 73, 23, '      dda\r\n', 'valcso', '2019-06-26 16:55:03'),
(8, 73, 23, '      \r\ndasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasda', 'valcso', '2019-06-26 17:04:47'),
(9, 73, 23, '      dasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasdadasda\r\n', 'valcso', '2019-06-26 17:12:31'),
(10, 75, 23, '      Hah kiralysag\r\n', 'valcso', '2019-06-26 17:25:47'),
(11, 79, 23, '   JÃ³ mese!', 'valcso', '2019-06-26 17:31:16'),
(12, 80, 23, '      \r\nUUUh Ã¶reg ez  nan jÃ³ kÃ©p :D ', 'valcso', '2019-06-26 17:31:54'),
(13, 81, 23, '      \r\nUh oreg ez nnan jo kep :D ', 'valcso', '2019-06-26 17:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `post_comment` varchar(3000) NOT NULL,
  `upload_image` varchar(255) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `post_comment`, `upload_image`, `post_date`) VALUES
(68, 23, 'Miiiily meghat&oacute; pillanat ez, ez az elsÅ‘ poszt a platformon &#128513 &#128513 &#128513 &#128513 ', '37.62365191_1615532908586997_9202529621424209920_n.png', '2019-06-25 23:09:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` mediumtext NOT NULL,
  `l_name` mediumtext NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `szakirany` varchar(255) NOT NULL,
  `user_image` varchar(111) NOT NULL,
  `posts` varchar(3) NOT NULL,
  `recovery_account` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cover_image` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `f_name`, `l_name`, `username`, `password`, `email`, `szakirany`, `user_image`, `posts`, `recovery_account`, `reg_date`, `cover_image`) VALUES
(23, 'Horvath ', 'Valentin', 'valcso', 'e6361e15145d1593dd17494c74827689', 'valcso@gmail.com', 'Informatika', '89.2.jpg', 'yes', 'lol', '2019-06-24 22:18:18', '14.07b1bfdf9c70a156380531e8b4faf75f.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_messages`
--

DROP TABLE IF EXISTS `user_messages`;
CREATE TABLE IF NOT EXISTS `user_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `msg_body` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `msg_seen` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_messages`
--

INSERT INTO `user_messages` (`id`, `user_to`, `user_from`, `msg_body`, `date`, `msg_seen`) VALUES
(22, 44, 23, ' csa', '2019-06-28 10:51:35', 'no'),
(21, 23, 44, ' Csa valcso', '2019-06-28 10:51:09', 'no');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
