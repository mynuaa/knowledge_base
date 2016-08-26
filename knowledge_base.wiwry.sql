-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-08-26 20:08:27
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowledge_base`
--

-- --------------------------------------------------------

--
-- 表的结构 `kb_article`
--

CREATE TABLE IF NOT EXISTS `kb_article` (
  `ar_id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_bin NOT NULL,
  `author_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `thumbsup` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `content` varchar(1000) COLLATE utf8_bin NOT NULL,
  `type` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ar_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 插入之前先把表清空（truncate） `kb_article`
--

TRUNCATE TABLE `kb_article`;
--
-- 转存表中的数据 `kb_article`
--

INSERT INTO `kb_article` (`ar_id`, `uid`, `title`, `author_name`, `date`, `thumbsup`, `content`, `type`) VALUES
(1, 0, 'sda', 'asdasd', '2016-08-26 19:04:52', '111', 'sad', ''),
(2, 1, '', 'wiwry', '2016-08-26 19:49:36', NULL, '', ''),
(3, 1, '1', 'wiwry', '2016-08-26 19:54:36', NULL, '2', '3');

-- --------------------------------------------------------

--
-- 表的结构 `ke_article_comment`
--

CREATE TABLE IF NOT EXISTS `ke_article_comment` (
  `com_id` int(11) NOT NULL AUTO_INCREMENT,
  `reviewer_id` int(11) NOT NULL,
  `ar_id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 插入之前先把表清空（truncate） `ke_article_comment`
--

TRUNCATE TABLE `ke_article_comment`;
-- --------------------------------------------------------

--
-- 表的结构 `ke_user_info`
--

CREATE TABLE IF NOT EXISTS `ke_user_info` (
  `uid` int(11) NOT NULL,
  `socre` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 插入之前先把表清空（truncate） `ke_user_info`
--

TRUNCATE TABLE `ke_user_info`;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
