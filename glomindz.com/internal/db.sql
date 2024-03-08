-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 21, 2013 at 10:57 AM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gminternal`
--

-- --------------------------------------------------------

--
-- Table structure for table `mepo_assumption_master`
--

CREATE TABLE `mepo_assumption_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `boundary_value` tinyint(4) NOT NULL DEFAULT '0',
  `accuracy` int(11) NOT NULL,
  `value` float NOT NULL,
  `unit` enum('MD','HR','INR') NOT NULL,
  `status` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mepo_assumption_master`
--

INSERT INTO `mepo_assumption_master` (`id`, `name`, `boundary_value`, `accuracy`, `value`, `unit`, `status`, `user_id`, `last_update`) VALUES
(1, 'Daily Working Hours', 1, 5, 8, 'HR', 1, 1, '2013-05-04 13:42:01'),
(2, 'Daily Working Hours', 0, 5, 4.5, 'HR', 1, 1, '2013-05-04 13:41:53'),
(3, 'Monthly Earning', 0, 5, 20000, 'INR', 1, 1, '2013-05-04 13:44:24'),
(4, 'Monthly Earning', 1, 5, 100000, 'INR', 0, 1, '2013-05-04 13:59:17'),
(6, 'Task Duration', 1, 9, 5, 'HR', 1, 1, '2013-05-04 13:49:34'),
(7, 'Story Lenght(Iteration)', 1, 8, 12, 'MD', 1, 1, '2013-05-04 13:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `mepo_burndown_master`
--

CREATE TABLE `mepo_burndown_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_took` float NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `mepo_burndown_master`
--

INSERT INTO `mepo_burndown_master` (`id`, `task_id`, `user_id`, `time_took`, `last_update`) VALUES
(1, 1, 1, 0, '2013-08-18 10:38:14'),
(2, 2, 1, 0, '2013-08-18 10:39:46'),
(3, 3, 1, 0, '2013-08-18 12:07:19'),
(4, 3, 1, 3, '2013-08-18 12:10:17'),
(5, 4, 1, 0, '2013-08-18 12:15:00'),
(6, 5, 1, 0, '2013-08-18 12:15:31'),
(7, 6, 1, 0, '2013-08-18 12:15:58'),
(8, 7, 1, 0, '2013-08-20 10:12:21'),
(9, 7, 1, 1, '2013-08-20 10:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `mepo_contact_master`
--

CREATE TABLE `mepo_contact_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mepo_contact_master`
--

INSERT INTO `mepo_contact_master` (`id`, `name`, `mobile`, `email`, `comment`, `last_update`) VALUES
(1, 'dasd', '09854087006', 'support@glomindz.com', 'test', '2013-08-18 15:19:57'),
(2, 'admin@gmail.com', '09854087006', 'support@glomindz.com', 'jkjkkj', '2013-08-18 15:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `mepo_customer_address`
--

CREATE TABLE `mepo_customer_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NOT NULL,
  `address_type` enum('Billing','Transport') NOT NULL DEFAULT 'Transport',
  `address` text NOT NULL,
  `locality` varchar(40) NOT NULL,
  `city` varchar(40) NOT NULL,
  `state` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `pin` varchar(40) NOT NULL,
  `tel` varchar(40) NOT NULL,
  `fax` varchar(40) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mepo_customer_address`
--

INSERT INTO `mepo_customer_address` (`id`, `company_id`, `address_type`, `address`, `locality`, `city`, `state`, `country`, `pin`, `tel`, `fax`, `last_update`) VALUES
(1, 1, 'Billing', 'Down Town', 'Sorumatoria', 'Guwahati', 'Assam', 'India', '78006', '987', '098', '2013-05-24 04:40:39'),
(2, 2, '', '', '', '', '', '', '', '', '', '2013-08-18 09:05:51'),
(3, 3, '', '', '', '', '', '', '', '', '', '2013-08-18 09:06:14'),
(4, 4, '', '', '', '', '', '', '', '', '', '2013-08-18 10:08:53'),
(5, 5, '', '', '', '', '', '', '', '', '', '2013-08-18 10:09:36'),
(6, 6, '', '', '', '', '', '', '', '', '', '2013-08-18 10:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `mepo_customer_master`
--

CREATE TABLE `mepo_customer_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `company` varchar(80) NOT NULL,
  `customer_type` enum('Trade','Institutional','Government') NOT NULL DEFAULT 'Trade',
  `email` varchar(80) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `tel` varchar(40) NOT NULL,
  `fax` varchar(40) NOT NULL,
  `pan` varchar(40) NOT NULL,
  `vat` varchar(40) NOT NULL,
  `cst` varchar(40) NOT NULL,
  `cst_valid` varchar(40) NOT NULL,
  `bank_name` varchar(40) NOT NULL,
  `bank_branch` varchar(40) NOT NULL,
  `bank_city` varchar(40) NOT NULL,
  `bank_swift_code` varchar(40) NOT NULL,
  `bank_ac_no` varchar(40) NOT NULL,
  `rating` varchar(40) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mepo_customer_master`
--

INSERT INTO `mepo_customer_master` (`id`, `name`, `company`, `customer_type`, `email`, `mobile`, `tel`, `fax`, `pan`, `vat`, `cst`, `cst_valid`, `bank_name`, `bank_branch`, `bank_city`, `bank_swift_code`, `bank_ac_no`, `rating`, `user_id`, `last_update`) VALUES
(1, 'In-House', 'Glomindz Software ', 'Trade', 'saifur.rahman@glomindz.com', '9854087006', '987', '098', '', '', '44', '2013-05-24', 'SBI', 'Zoo Road', 'Guwahati', '09A', '1234567890', '4', 1, '2013-08-18 10:09:07'),
(2, 'Assam Police', 'Govt of Assam', 'Government', 'amitavasinha@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '4', 8, '2013-08-18 09:05:51'),
(3, 'AIIDC', 'Govt Of Assam', 'Government', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', 8, '2013-08-18 09:06:14'),
(4, 'SPL', 'SPL', 'Trade', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', 1, '2013-08-18 10:08:53'),
(5, 'GIT', 'GIT', 'Trade', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', 1, '2013-08-18 10:09:36'),
(6, 'JPPL', 'Janasadharan', 'Trade', '', '', '', '', '', '', '', '', '', '', '', '', '', '4', 1, '2013-08-18 10:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `mepo_customer_payments`
--

CREATE TABLE `mepo_customer_payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_date` date NOT NULL,
  `payment_mode` varchar(40) NOT NULL,
  `instrument_number` varchar(40) NOT NULL,
  `instrument_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mepo_deliverable_master`
--

CREATE TABLE `mepo_deliverable_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `category` varchar(80) NOT NULL,
  `optimum_man_days` int(2) DEFAULT NULL,
  `optimum_duration` int(3) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `mepo_deliverable_master`
--

INSERT INTO `mepo_deliverable_master` (`id`, `name`, `category`, `optimum_man_days`, `optimum_duration`, `user_id`, `last_update`) VALUES
(1, 'Planning', 'Consultancy', 15, 45, 0, '2013-05-13 02:23:50'),
(2, 'Prototype Design', 'Consultancy', 20, 60, 0, '2013-05-13 02:22:09'),
(3, 'Online Training', 'Training', 10, 6, 0, '2013-08-18 08:25:09'),
(4, 'Offline Training', 'Training', 5, 0, 0, '2013-08-18 08:25:18'),
(5, 'Design', 'Software Application', NULL, NULL, 0, '0000-00-00 00:00:00'),
(6, 'Web/Desktop Application Development', 'Software Application', NULL, NULL, 0, '0000-00-00 00:00:00'),
(7, 'Mobile application(Android)', 'Software Application', NULL, NULL, 0, '0000-00-00 00:00:00'),
(8, 'SMS and Voice Application', 'Software Application', NULL, NULL, 0, '0000-00-00 00:00:00'),
(9, 'Training Content Design', 'Software Application', NULL, NULL, 0, '0000-00-00 00:00:00'),
(10, 'Online Support', 'Support', 0, 0, 0, '2013-08-18 08:24:39'),
(11, 'Email Support', 'Support', 0, 0, 0, '2013-08-18 08:24:51'),
(12, 'On Call Support', 'Support', 0, 0, 0, '2013-08-18 08:24:58'),
(13, 'Operating System', 'Third party Service', NULL, NULL, 0, '0000-00-00 00:00:00'),
(14, 'Database', 'Third party Service', NULL, NULL, 0, '0000-00-00 00:00:00'),
(15, 'Hosting', 'Third party Service', NULL, NULL, 0, '0000-00-00 00:00:00'),
(16, 'Any other software', 'Third party Service', NULL, NULL, 0, '0000-00-00 00:00:00'),
(17, 'Other Expert Consultancy', 'Third party Service', NULL, NULL, 0, '0000-00-00 00:00:00'),
(18, 'Legal', 'Third party Service', NULL, NULL, 0, '0000-00-00 00:00:00'),
(19, 'Servers', 'Hardware', NULL, NULL, 0, '0000-00-00 00:00:00'),
(20, 'Laptop/Computer', 'Hardware', NULL, NULL, 0, '0000-00-00 00:00:00'),
(21, 'Mobile', 'Hardware', NULL, NULL, 0, '0000-00-00 00:00:00'),
(22, 'GPS Device', 'Hardware', NULL, NULL, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mepo_project_deleverables`
--

CREATE TABLE `mepo_project_deleverables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `deleverables_name` varchar(40) NOT NULL,
  `deleverables_id` int(11) NOT NULL,
  `estimate_man_days` float NOT NULL,
  `actual_man_days` float NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` enum('Open','Close','In-Progress','Hold','Not Required') NOT NULL DEFAULT 'Open',
  `user_id` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mepo_project_deleverables`
--

INSERT INTO `mepo_project_deleverables` (`id`, `project_id`, `name`, `deleverables_name`, `deleverables_id`, `estimate_man_days`, `actual_man_days`, `start_date`, `end_date`, `status`, `user_id`, `last_update`) VALUES
(1, 1, 'home page design', 'Design', 5, 5, 0, '0000-00-00', '0000-00-00', 'Open', 0, '2013-08-18 10:33:04'),
(2, 1, 'home page development', 'Web/Desktop Application Development', 6, 3, 0, '0000-00-00', '0000-00-00', 'Open', 0, '2013-08-18 10:36:32'),
(3, 5, 'Hotel Support', 'On Call Support', 12, 0, 0, '0000-00-00', '0000-00-00', 'Open', 0, '2013-08-18 12:13:05'),
(4, 5, 'about page', 'Web/Desktop Application Development', 6, 12, 12, '0000-00-00', '0000-00-00', 'Open', 0, '2013-08-19 10:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `mepo_project_master`
--

CREATE TABLE `mepo_project_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `traffic_daily` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `support_start` date NOT NULL,
  `support_end` date NOT NULL,
  `estimate_man_days` int(11) NOT NULL,
  `actual_man_days` int(11) NOT NULL,
  `reference` varchar(40) NOT NULL,
  `duration` int(11) NOT NULL,
  `approx_budget` int(11) NOT NULL,
  `requirment` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Open','Close') NOT NULL DEFAULT 'Open',
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `mepo_project_master`
--

INSERT INTO `mepo_project_master` (`id`, `name`, `customer_id`, `traffic_daily`, `start_date`, `end_date`, `support_start`, `support_end`, `estimate_man_days`, `actual_man_days`, `reference`, `duration`, `approx_budget`, `requirment`, `user_id`, `status`, `last_update`) VALUES
(1, 'Glomindz Internal', 1, 12, '2013-05-30', '2013-05-24', '2013-05-28', '2013-05-31', 23, 45, 'me', 90, 20000, 'etc.', 1, 'Open', '2013-08-18 11:45:18'),
(3, 'Mercuri', 4, 5, '2013-04-15', '2013-06-25', '2013-07-01', '2014-06-30', 60, 80, 'Mazibar', 90, 80000, '', 1, 'Open', '2013-08-18 10:14:58'),
(4, 'Resource Mapping Ph-I', 3, 100, '2012-08-15', '2012-12-10', '2013-01-01', '2013-12-31', 60, 60, 'Mazibar', 160, 300000, '', 1, 'Open', '2013-08-18 10:59:49'),
(5, 'Crimatrix', 2, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, '', 1, 'Open', '2013-08-18 11:19:54'),
(6, 'Office Internal', 6, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, '', 1, 'Open', '2013-08-18 11:46:22'),
(7, 'Website', 6, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, '', 1, 'Open', '2013-08-18 10:19:31'),
(8, 'Debsite reDesign', 4, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, '', 1, 'Open', '2013-08-18 11:45:57'),
(9, 'Human Resource Analysis and Mapping', 3, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, '', 1, 'Open', '2013-08-18 11:47:39'),
(10, 'Skill Development', 3, 0, '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 0, 0, '', 0, 0, '', 1, 'Open', '2013-08-18 11:48:06');

-- --------------------------------------------------------

--
-- Table structure for table `mepo_project_users`
--

CREATE TABLE `mepo_project_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_type` varchar(80) NOT NULL,
  `user_volume_daily` int(11) NOT NULL,
  `avg_engaged_time_daily` float NOT NULL,
  `user_activity` enum('R','W') NOT NULL DEFAULT 'R',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mepo_sale_ledger`
--

CREATE TABLE `mepo_sale_ledger` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_amount` float NOT NULL,
  `discount_amount` float NOT NULL,
  `tax_amount` float NOT NULL,
  `round_off` float NOT NULL,
  `bill_amount` float NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mepo_task_master`
--

CREATE TABLE `mepo_task_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `project_deliverable_id` int(11) NOT NULL,
  `task` varchar(100) NOT NULL,
  `priority` enum('H','L','M') NOT NULL DEFAULT 'H',
  `complexity` int(11) NOT NULL,
  `optimum_man_hrs` float NOT NULL,
  `demand_man_hrs` float NOT NULL,
  `estimate_man_hrs` float NOT NULL,
  `actual_man_hrs` float NOT NULL,
  `status` enum('Open','Assigned','In-progress','Hold') NOT NULL DEFAULT 'Open',
  `assign_to` int(11) NOT NULL,
  `assign_by` int(11) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mepo_task_master`
--

INSERT INTO `mepo_task_master` (`id`, `project_id`, `project_deliverable_id`, `task`, `priority`, `complexity`, `optimum_man_hrs`, `demand_man_hrs`, `estimate_man_hrs`, `actual_man_hrs`, `status`, `assign_to`, `assign_by`, `last_update`) VALUES
(1, 1, 1, 'product page', 'H', 1, 8, 0, 6, 0, 'Open', 12, 1, '2013-08-18 10:38:14'),
(2, 1, 1, 'media page', 'H', 1, 0, 0, 2, 0, 'Open', 12, 1, '2013-08-18 10:39:46'),
(3, 1, 1, 'test', 'H', 1, 0, 0, 16, 0, 'Open', 14, 1, '2013-08-18 12:07:18'),
(4, 5, 3, 'Assist Hotel to register and submit guestlist', 'H', 1, 0, 0, 10, 0, 'Open', 14, 1, '2013-08-18 12:15:00'),
(5, 5, 3, 'Assist Hotel to register and submit guestlist', 'H', 1, 0, 0, 40, 0, 'Open', 13, 1, '2013-08-18 12:15:31'),
(6, 5, 3, 'Assist Hotel to register and submit guestlist', 'H', 1, 0, 0, 20, 0, 'Open', 12, 1, '2013-08-18 12:15:58'),
(7, 5, 4, 'polie details', 'H', 1, 0, 0, 8, 0, 'Open', 12, 1, '2013-08-20 10:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `mepo_user_master`
--

CREATE TABLE `mepo_user_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `password` varchar(80) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'admin',
  `status` tinyint(2) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `mepo_user_master`
--

INSERT INTO `mepo_user_master` (`id`, `name`, `email`, `mobile`, `password`, `role`, `status`, `last_update`) VALUES
(1, 'Administrator', 'support@glomindz.com', '9854087006', '88f2dccb02b2a20615211e5492f85204', 'admin', 1, '2013-08-18 15:25:00'),
(7, 'kamaldev', 'kamal.dev@glomindz.com', '123', '88f2dccb02b2a20615211e5492f85204', 'admin', 1, '2013-05-21 04:10:57'),
(12, 'Sarfaraz Hassan', 'sarafaraz.hassan@glomindz.com', '9854087006', '88f2dccb02b2a20615211e5492f85204', 'admin', 1, '2013-08-18 10:06:22'),
(13, 'Kallol Saikia', 'kallol.saikia@glomindz.com', '', '88f2dccb02b2a20615211e5492f85204', 'user', 1, '2013-08-18 10:06:22'),
(14, 'Saifur Rahman', 'saifur.rahman@glomindz.com', '9854087006', '88f2dccb02b2a20615211e5492f85204', 'admin', 1, '2013-08-18 10:23:26'),
(15, 'Ajaoy Baisya', '', '', '', 'user', 1, '2013-08-18 10:27:57');
