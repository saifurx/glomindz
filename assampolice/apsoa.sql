-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2013 at 12:41 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apsoa`
--

-- --------------------------------------------------------

--
-- Table structure for table `member_master`
--

CREATE TABLE IF NOT EXISTS `member_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `po` varchar(20) NOT NULL,
  `ps` varchar(20) NOT NULL,
  `batch_no` varchar(20) NOT NULL,
  `year` year(4) NOT NULL,
  `mobile_one` varchar(20) NOT NULL,
  `mobile_two` varchar(20) NOT NULL,
  `email_one` varchar(20) NOT NULL,
  `email_two` varchar(20) NOT NULL,
  `spouse` varchar(20) NOT NULL,
  `child_one` varchar(20) NOT NULL,
  `child_two` varchar(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `member_master`
--

INSERT INTO `member_master` (`id`, `profile_id`, `name`, `f_name`, `address`, `po`, `ps`, `batch_no`, `year`, `mobile_one`, `mobile_two`, `email_one`, `email_two`, `spouse`, `child_one`, `child_two`, `date`) VALUES
(1, 1, 'kallol pratim saikia', 'P. Saikia', 'Guwahati', 'Dispur', 'dispur', '00987', 2010, '9706913741', '9706724546', 'xyz@gmail.com', 'yyy@gmail.com', 'computer', 'mouse', 'keyboard', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_comment_details`
--

CREATE TABLE IF NOT EXISTS `newsfeed_comment_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `newsfeed_id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `newsfeed_master`
--

CREATE TABLE IF NOT EXISTS `newsfeed_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `data_type` enum('pdf','jpeg') NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `newsfeed_master`
--

INSERT INTO `newsfeed_master` (`id`, `profile_id`, `content`, `data_type`, `last_update`) VALUES
(3, 1, 'Glomindz is a guwahati based Tech Startup. We build\r\nmobile and web application for Government, Private and\r\nNon-Profit organisations in North East India', 'jpeg', '2013-11-20 10:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email_one` varchar(20) NOT NULL,
  `mobile_one` varchar(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `user_type` enum('general','admin') NOT NULL,
  `status` int(4) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `name`, `email_one`, `mobile_one`, `password`, `user_type`, `status`, `last_login`) VALUES
(1, 'kallol pratim saikia', 'xyz@gmail.com', '9706913741', 'fcedcef9e36506e812ebf414a7d8d175', 'general', 1, '2013-11-11 20:33:58');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
