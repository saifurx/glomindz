-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2013 at 03:15 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schoolreport`
--

-- --------------------------------------------------------

--
-- Table structure for table `sr_student_master`
--

CREATE TABLE IF NOT EXISTS `sr_student_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `mobile_no` varchar(40) NOT NULL,
  `email` varchar(80) NOT NULL,
  `f_name` varchar(80) NOT NULL,
  `m_name` varchar(80) NOT NULL,
  `class` varchar(80) NOT NULL,
  `section` varchar(80) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `address` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sr_student_master`
--

INSERT INTO `sr_student_master` (`id`, `profile_id`, `name`, `mobile_no`, `email`, `f_name`, `m_name`, `class`, `section`, `roll_no`, `address`) VALUES
(4, 7, 'Saurav Saikia', '9632145632', 'ss@gmail.com', 'D. Mazumdar', 'B. Mazumdar', 'FIVE', 'A', '001', 'Guwahati'),
(5, 8, 'Liza Borah', '9645785236', 'lb@gmail.com', 'L.Borah', 'M..Borah', 'SIX', 'B', '002', 'tezpur'),
(6, 9, 'Abinash Kumar', '9754863214', 'ab@gmail.com', 'A.Saikia', 'M.Saikia', 'SEVEN', 'B', '003', 'dibrugrah'),
(7, 10, 'Sonu saikia', '8854632147', 'sb@gmail.com', 'D.Saikia', 'B.Saikia', 'EIGHT', 'A', '004', 'tinsukia'),
(8, 11, 'Kunal Hazarika', '8874569321', 'kh@gmail.com', 'M.Borah', 'L.Borah', 'NINE', 'B', '005', 'Jorhat');

-- --------------------------------------------------------

--
-- Table structure for table `sr_teacher_master`
--

CREATE TABLE IF NOT EXISTS `sr_teacher_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profile_id` int(11) NOT NULL,
  `faculty_code` varchar(20) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mobile_no` varchar(40) NOT NULL,
  `qualification` varchar(80) NOT NULL,
  `designnation` varchar(40) NOT NULL,
  `address` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sr_teacher_master`
--

INSERT INTO `sr_teacher_master` (`id`, `profile_id`, `faculty_code`, `name`, `email`, `mobile_no`, `qualification`, `designnation`, `address`) VALUES
(1, 2, '00A1', 'Pratim Bordoloi', 'pratim@gmail.com', '9706724646', 'BCom', 'subject teacher', 'Guwahati'),
(2, 3, '00A2', 'Hemanta Dutta', 'hd@gmail.com', '9424651233', 'M.Com', 'assistant teacher', 'Guwahati'),
(3, 4, '00A3', 'Jurismita Deka', 'jd@gmail.com', '9874563214', 'MA', 'subject teacher', 'Tezpur'),
(4, 5, '00A4', 'Basanta Baruah', 'bb@gmail.com', '9632145879', 'BCom', 'assistant teacher', 'Tezpur'),
(5, 6, '00A5', 'Harshmita Saikia', 'h.sarma@gmail.com', '9632145621', 'MA', 'accountant', 'Dibrugrah'),
(6, 12, '00A5', 'Gautam Borkakaoti', 'gb@gmail.coom', '8854678912', 'MSc', 'subject teacher', 'Tezpur');

-- --------------------------------------------------------

--
-- Table structure for table `sr_user_master`
--

CREATE TABLE IF NOT EXISTS `sr_user_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mobile_no` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `user_type` enum('admin','teacher','general','') NOT NULL,
  `status` int(4) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `sr_user_master`
--

INSERT INTO `sr_user_master` (`id`, `name`, `email`, `mobile_no`, `password`, `user_type`, `status`, `last_login`) VALUES
(1, 'admin', 'admin@gmail.com', '9706913741', '88f2dccb02b2a20615211e5492f85204', 'admin', 1, '2013-09-25 08:18:36'),
(2, 'Pratim Bordoloi', 'pratim@gmail.com', '9706724646', '', 'teacher', 1, '2013-09-28 07:02:23'),
(3, 'Hemanta Dutta', 'hd@gmail.com', '9424651233', '', 'teacher', 1, '2013-09-28 07:04:39'),
(4, 'Jurismita Deka', 'jd@gmail.com', '9874563214', '', 'teacher', 1, '2013-09-28 07:05:41'),
(5, 'Basanta Baruah', 'bb@gmail.com', '9632145879', '', 'teacher', 1, '2013-09-28 07:06:44'),
(6, 'Harshmita Saikia', 'h.sarma@gmail.com', '9632145621', '', 'teacher', 1, '2013-09-28 07:08:05'),
(7, 'Saurav Saikia', 'ss@gmail.com', '9632145632', '', 'general', 1, '2013-09-28 07:16:05'),
(8, 'Liza Borah', 'lb@gmail.com', '9645785236', '', 'general', 1, '2013-09-28 07:17:14'),
(9, 'Abinash Kumar', 'ab@gmail.com', '9754863214', '', 'general', 1, '2013-09-28 07:18:07'),
(10, 'Sonu saikia', 'sb@gmail.com', '8854632147', '', 'general', 1, '2013-09-28 07:19:26'),
(11, 'Kunal Hazarika', 'kh@gmail.com', '8874569321', '', 'general', 1, '2013-09-28 07:20:30'),
(12, 'Gautam Borkakaoti', 'gb@gmail.coom', '8854678912', '', 'teacher', 1, '2013-09-28 10:47:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
